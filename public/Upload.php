<?php

// $up = new Upload();
// $up->uploadFile('ts');
// var_dump($up->errorInfo);
class Upload
{

    // 文件保存路径
    protected $path = './upload/';

    protected $allowSuffix = [
        'jpg',
        'jpeg',
        'wbmp',
        'gif',
        'png'
    ];

    protected $allowMime = [
        'image/jpeg',
        'image/wbmp',
        'image/gif',
        'image/png'
    ];

    protected $maxSize = 2097152;

    protected $isRandName = true;

    protected $prefix = 'up_';

    // 错误号码和错误信息
    public $errorNumber;

    protected $errorInfo;

    // 文件信息
    protected $oldName;

    protected $suffix;

    protected $size;

    protected $mime;

    protected $tmpName;

    // 新名字
    protected $newName;

    public function __construct($arr = [])
    {
        foreach ($arr as $key => $value) {
            $this->setOption($key, $value);
        }
    }

    // 判断key是不是成员属性，如果是则设置
    protected function setOption($key, $value)
    {
        $keys = array_keys(get_class_vars(__CLASS__));
        if (in_array($key, $keys)) {
            $this->$key = $value;
        }
    }

    // 上传函数
    // $key 就是input框的name
    public function uploadFile($key)
    {
        // 判断有没有设置路径
        if (empty($this->path)) {
            $this->setOption('errorNumber', - 1);
            return false;
        }
        // 判断路径是否存在、是否可写
        if (! $this->check()) {
            $this->setOption('errorNumber', - 2);
            return false;
        }
        // 判断$_FILES里面的error是否为0
        $error = $_FILES[$key]['error'];
        if ($error) {
            $this->setOption('errorNumber', $error);
            return false;
        } else {
            $this->getFileInfo($key);
        }
        // 判断大小、mime、后缀是否符合
        if (! $this->checkSize() || ! $this->checkMime() || ! $this->checkSuffix()) {
            return false;
        }
        // 得到新的文件名字
        $this->newName = $this->createNewName();
        // 判断是否是上传文件，并且移动
        if (is_uploaded_file($this->tmpName)) {
            if (move_uploaded_file($this->tmpName, $this->path . $this->newName)) {
                return $this->path . $this->newName;
            } else {
                $this->setOption('errorNumber', - 7);
                return false;
            }
        } else {
            $this->setOption('errorNumber', - 6);
            return false;
        }
    }

    protected function check()
    {
        if (! file_exists($this->path) || ! is_dir($this->path)) {
            return mkdir($this->path, 0777, true);
        }
        if (! is_writeable($this->path)) {
            return chmod($this->path, 0777);
        }
        return true;
    }

    protected function getFileInfo($key)
    {
        $this->oldName = $_FILES[$key]['name'];
        $this->mime = $_FILES[$key]['type'];
        $this->tmpName = $_FILES[$key]['tmp_name'];
        $this->size = $_FILES[$key]['size'];
        $this->suffix = pathinfo($this->oldName)['extension'];
    }

    protected function checkSize()
    {
        if ($this->size > $this->maxSize) {
            $this->setOption('errorNumber', - 3);
            return false;
        }
        return true;
    }

    protected function checkMime()
    {
        if (! in_array($this->mime, $this->allowMime)) {
            $this->setOption('errorNumber', - 4);
            return false;
        }
        return true;
    }

    protected function checkSuffix()
    {
        if (! in_array($this->suffix, $this->allowSuffix)) {
            $this->setOption('errorNumber', - 5);
            return false;
        }
        return true;
    }

    protected function createNewName()
    {
        if ($this->isRandName) {
            $name = $this->prefix . uniqid() . '.' . $this->suffix;
        } else {
            $name = $this->prefix . $this->oldName;
        }
        return $name;
    }

    public function __get($name)
    {
        if ($name == 'errorNumber') {
            return $this->errorNumber;
        } else if ($name == 'errorInfo') {
            return $this->getErrorInfo();
        }
    }

    protected function getErrorInfo()
    {
        switch ($this->errorNumber) {
            case - 1:
                $str = "文件路径没有设置";
                break;
            case - 2:
                $str = "文件路径不是目录或者没有权限";
                break;
            case - 3:
                $str = "文件大小超过指定范围";
                break;
            case - 4:
                $str = "文件mime类型不符合";
                break;
            case - 5:
                $str = "文件后缀不符合";
                break;
            case - 6:
                $str = "不是上传文件";
                break;
            case - 7:
                $str = "文件上传失败";
                break;
            case 1:
                $str = '上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值';
                break;
            case 2:
                $str = '上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值';
                break;
            case 3:
                $str = '文件只有部分被上传';
                break;
            case 4:
                $str = '没有文件被上传';
                break;
            case 6:
                $str = '找不到临时文件夹';
                break;
            case 7:
                $str = '文件写入失败';
                break;
        }
        return $str;
    }
}