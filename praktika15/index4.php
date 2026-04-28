<?php 
    function captcha($width = 150, $height = 50, $length = 6) {
        $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = '';
        for ($i = 0; $i < $length; $i++) {
            $code .= $chars[rand(0, strlen($chars) - 1)];
        }
        $img = imagecreatetruecolor($width, $height);
        $bg = imagecolorallocate($img, 255, 255, 255);
        $textColor = imagecolorallocate($img, 0, 0, 0);
        $lineColor = imagecolorallocate($img, 100, 100, 100);
        imagefill($img, 0, 0, $bg);
        $x = 10;
        $y = 25;
        for ($i = 0; $i < $length; $i++) {
            imagestring($img, 5, $x, $y + rand(-5, 5), $code[$i], $textColor);
            $x += imagefontwidth(5) + rand(2, 5);
        }
        header('Content-Type: image/png');
        imagepng($img);
        imagedestroy($img);
    }

    captcha(1000, 200, 1920);
?>