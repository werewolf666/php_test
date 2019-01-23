<?php
/**
 * 封装验证码库
 */

class CaptchaLib{
    private $length; //验证码长度
    private $font=5; // 字体大小

    // 通过构造函数赋值
    public function __construct($length=4,$font=5)
    {
        $this->length=$length;
        $this->font=$font;
    }

    /**
     * 生成随机字符串
     */
    private function generalCode(){
        // 自定义验证码的信息
        $char_array=array_merge(range('A','Z'),range('a','z'),range(0,9)); //生成随机字符串
        $index=array_rand($char_array,$this->length); //随机选取4个字符串
        shuffle($index); // 乱序
        $str='';
        foreach($index as $i){
            $str.=$char_array[$i]; // 拼接选取的字符作为验证吗
        }
        return $str;
    }

    /**
     * 生成验证码
     */
    public function generalCaptcha(){
        $str=$this->generalCode();
        $_SESSION['code']=$str; //存放在回话中，方便取出来验证
        // 打开背景图片
        $bg_path=LIB_PATH.'captcha/captcha_bg'.rand(1,5).'.jpg';
        $img=imagecreatefromjpeg($bg_path);
        // 定义前景色
        $color=imagecolorallocate($img,0,0,0);
        if (rand(1,2)==2){
            $color=imagecolorallocate($img,255,255,255);
        }
        // 将字符串写到图片上
        $font=$this->font;   // 字体大小字号
        $x=(imagesx($img)-imagefontwidth($font)*strlen($str))/2; // 字符串验证码中心位置表示
        $y=(imagesy($img)-imagefontheight($font))/2;  // 字符串验证码上下位置表示
        imagestring($img,$font,$x,$y,$str,$color);	//将字符串写到图片上
        ob_clean(); //清空浏览器缓存,只在开发阶段使用，上线之后要删除该代码
        header('content-type:image/jpeg');   // 显示字符
        imagejpeg($img);
        imagedestroy($img);
    }

    /**
     * 检查验证码是否正确
     */
    public function checkCaptcha($code){
        return strtolower($code)==strtolower($_SESSION['code']);
    }
}