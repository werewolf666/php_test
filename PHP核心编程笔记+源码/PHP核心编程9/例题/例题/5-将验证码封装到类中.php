<?php
/**
*验证码封装类
*/
class CaptchaLib {
	private $length;	//验证码长度
	private $font=5;	//内置字体大小  1,2,3,4,5
	//通过构造函数赋值
	public function __construct($length=4,$font=5) {
		$this->length=$length;
		$this->font=$font;
	}
	//生成随机字符串
	private function generalCode() {
		$char_array=array_merge(range('A','Z'),range('a','z'),range(0,9));//生成一个字母和数字的数组
		$index=array_rand($char_array,$this->length);	//随机取4个字符，返回的是字符下标
		shuffle($index);	//打乱下标
		//拼接字符串
		$str='';
		foreach($index as $i) {
			$str.=$char_array[$i];
		}
		return $str;
	}
	//生成验证码
	public function generalCaptcha() {
		$str=$this->generalCode();
		//打开背景图
		$bg_path='./captcha/captcha_bg'.rand(1,5).'.jpg';	//背景图地址
		$img=imagecreatefromjpeg($bg_path);	//打开图片
		//定义前景色
		$color=imagecolorallocate($img,0,0,0);
		if(rand(1,2)==2)
			$color=imagecolorallocate($img,255,255,255);
		//将字符串写到图片上
		$x=(imagesx($img)-imagefontwidth($this->font)*strlen($str))/2;
		$y=(imagesy($img)-imagefontheight($this->font))/2;
		imagestring($img,$this->font,$x,$y,$str,$color);
		header('content-type:image/png');
		imagepng($img);
		imagedestroy($img);
	}
}
//测试
$captcha=new CaptchaLib(8,4);
$captcha->generalCaptcha();
