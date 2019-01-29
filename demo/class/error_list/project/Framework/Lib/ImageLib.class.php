<?php

class ImageLib{
    private $error;
    /**
     * 获取error状态
     */
    public function getError(){
        return $this->error;
    }

    /**
     * 制作等比缩略图
     * @param $src_path string
     * @param $max_w string
     * @param $max_h string
     * @param bool $flag default=false
     * @param string $prefix
     */
    public function thumb($src_path,$max_w,$max_h,$prefix='s_',$flag=false){
        $ext=strtolower(strrchr($src_path,'.'));//获取图片的后缀
        $type='';
        switch($ext){
            case '.jpg':
                $type='jpeg';
                break;
            case '.gif':
                $type='gif';
                break;
            case '.png':
                $type='png';
                break;
            default:
                $this->error='文件格式不正确';
                return false;
        }
        $open_fn='imagecreatefrom'.$type;
        $src =$open_fn($src_path);//打开原图
        $dst=imagecreatetruecolor($max_w,$max_h); //创建目标图
        $src_w=imagesx($src); //源图宽度
        $src_h=imagesy($src); //源图高度
        if ($flag){ //如果是等比缩放图
            if ($max_w/$max_h<$src_w/$src_h)
            { //计算源图和目标图的等比缩放图宽高度
                $dst_w=$src_w;
                $dst_h=$max_w*$src_h/$src_w;
            }else
            {//计算源图和目标图的等比缩放图宽高度
                $dst_h=$max_h;
                $dst_w=$max_h*$src_w/$src_h;
            }
            $dst_x=(int)(($max_w-$dst_w)/2); //在目标图上的显示缩略图
            $dst_y=(int)(($max_h-$dst_h)/2);
        }else{ //不等比
            $dst_x=0;
            $dst_y=0;
            $dst_w=$max_w;
            $dst_h=$max_h;
        }
        //生成缩略图
        imagecopyresampled($dst,$src,$dst_x,$dst_y,0,0,$dst_w,$dst_h,$src_w,$src_h); //生成缩略图
        $filename=basename($src_path);//获取文件名
        $foldername=substr(dirname($src_path),-10);//获取文件夹名字
        $thumb_path=$GLOBALS['config']['application']['upload_path'].DS.$foldername.DS.$prefix.$filename;
        imagepng($dst,$thumb_path);
        imagedestroy($dst);
        imagedestroy($src);
        return $foldername.'/'.$prefix.$filename;

    }
}