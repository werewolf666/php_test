<?php
//上传图像类
class UploadLib{

    private $path; //上传地址
    private $type; //上传类型
    private $size; //上传大小
    private $error; //错误类型

    //通过构造函数实例化变量成员
    public function __construct()
    {
        $this->path=$GLOBALS['config']['application']['upload_path'];
        $this->type=$GLOBALS['config']['application']['upload_type'];
        $this->size=$GLOBALS['config']['application']['upload_size'];
    }

    /**
     * 获取错误类型
     * @return mixed
     */
    public function getError(){
        return $this->error;
    }

    /**
     * @param $file
     * 判断文件上传是否合法
     */
    public function upload($file){
        $error=$file['error'];
        if ($error){
            switch ($error){
                case 1:
                    $this->error = '上传问价超过配置文件中允许的最大值';
                    return false;
                case 2:
                    $this->error = '上传文件超过表单允许的最大值';
                    return false;
                case 3:
                    $this->error = '文件上传不完整';
                    return false;
                case 4:
                    $this->error = '没有上传文件';
                    return false;
                case 6:
                    $this->error = '找不到临时文件';
                    return false;
                case 7:
                    $this->error = '文件写入失败';
                    return false;
                default:
                    $this->error = '未知错误';
                    return false;
            }
        }
        //验证格式
        if (!in_array($file['type'],$this->type)){
            $this->error='上传文件类型不正确，只能上传'.implode(',',$this->type).'类型的文件';
            return false;
        }
        //验证大小
        if ($file['size']>$this->size){
            $this->error='文件不能超过'.($this->size/1024/1024).'M';
            return false;
        }
        //验证是否是http上传
        if (!is_uploaded_file($file['tmp_name'])){
            $this->error='文件必须是http上传';
            return false;
        }
        //创建文件夹
        $foldername=date('Y-m-d'); //文件名称
        $folderpath=$this->path.DS.$foldername; //文件夹路径
        if (!file_exists($folderpath)){
            echo $folderpath;
            mkdir($folderpath);
        }
        //开始上传
        $filename=uniqid('upload_',true).strrchr($file['name'],'.');
        $filepath=$folderpath.DS.$filename;
        if(move_uploaded_file($file['tmp_name'],$filepath))
            return $foldername.DS.$filename;
        else
            $this->error='上传失败';
        return false;
        }
}