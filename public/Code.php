<?php
$code = new Code();
$code->outImage();

class Code
{

    protected $number;

    protected $codeType;

    protected $width;

    protected $height;

    protected $image;

    protected $code;

    public function __construct($number = 4, $codeType = 0, $width = 100, $height = 32)
    {
        $this->number = $number;
        $this->codeType = $codeType;
        $this->width = $width;
        $this->height = $height;
        // 生成验证码函数
        $this->code = $this->createCode();
        // 存储code到服务器
        $this->saveCode();
    }

    public function __destruct()
    {
        imagedestroy($this->image);
    }

    public function __get($name)
    {
        if ($name == 'code')
            return $this->code;
        return FALSE;
    }

    protected function createCode()
    {
        // 判断验证码类型
        switch ($this->codeType) {
            case 0: // 纯数字
                $code = $this->getNumberCode();
                break;
            case 1: // 纯字母
                $code = $this->getCharCode();
                break;
            case 2: // 字母数字混合
                $code = $this->getNumCharCode();
                break;
            default:
                die('不支持该验证码类型');
        }
        return $code;
    }

    protected function saveCode()
    {
        session_start();
        $_SESSION['code'] = $this->code;
    }

    protected function getNumberCode()
    {
        $str = join('', range(0, 9));
        return substr(str_shuffle($str), 0, $this->number);
    }

    protected function getCharCode()
    {
        $str = join('', range('a', 'z'));
        $str = $str . strtoupper($str);
        return substr(str_shuffle($str), 0, $this->number);
    }

    protected function getNumCharCode()
    {
        // $numStr = join('', range(0, 9));
        // $str = join('', range('a', 'z'));
        // $str = $numStr.$str.strtoupper($str);
        // return substr(str_shuffle($str), 0, $this->number);
        // 建立库，去掉容易错误识别的字符
        $str = "3456789abcdefghjkmnpqrstuvwxyABCDEFGHJKLMNPQRSTUVWXY";
        return substr(str_shuffle($str), 0, $this->number);
    }

    public function outImage()
    {
        // 创建画布
        $this->createImage();
        // 填充背景色
        $this->fillBack();
        // 将验证码画到画布上
        $this->drawChar();
        // 添加干扰元素
        $this->drawDisturb();
        // 输出并显示
        $this->show();
    }

    protected function drawDisturb()
    {
        for ($i = 0; $i < 150; $i ++) {
            $x = mt_rand(0, $this->width);
            $y = mt_rand(0, $this->height);
            imagesetpixel($this->image, $x, $y, $this->lightColor());
        }
        for ($i = 0; $i < 3; $i ++) {
            $cx = mt_rand(10, $this->width);
            $cy = mt_rand(10, $this->height);
            $width = mt_rand(10, $this->width);
            $height = mt_rand(10, $this->height);
            $start = mt_rand(0, 10);
            $end = mt_rand(0, 270);
            imagearc($this->image, $cx, $cy, $width, $height, $start, $end, $this->lightColor());
        }
    }

    protected function show()
    {
        header('Content-Type:image/png');
        imagepng($this->image);
    }

    protected function createImage()
    {
        $this->image = imagecreatetruecolor($this->width, $this->height);
    }

    protected function fillBack()
    {
        // imagefill($this->image, 0, 0, $this->lightColor());
        imagefill($this->image, 0, 0, $this->whiteColor());
    }

    // 白色背景
    protected function whiteColor()
    {
        return imagecolorallocate($this->image, 255, 255, 255);
    }

    // 浅色
    protected function lightColor()
    {
        return imagecolorallocate($this->image, mt_rand(130, 255), mt_rand(130, 255), mt_rand(130, 255));
    }

    // 深色
    protected function deepColor()
    {
        return imagecolorallocate($this->image, mt_rand(0, 120), mt_rand(0, 120), mt_rand(0, 120));
    }

    protected function drawChar()
    {
        $width = ceil($this->width / $this->number);
        for ($i = 0; $i < $this->number; $i ++) {
            $x = mt_rand($i * $width + 5, ($i + 1) * $width - 10);
            $y = mt_rand(6, $this->height - 18);
            imagechar($this->image, 5, $x, $y, $this->code[$i], $this->deepColor());
        }
    }
}
?>