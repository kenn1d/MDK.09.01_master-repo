<?php

    function square($name) {
        $img = imagecreatetruecolor(200, 200);
        $background = imagecolorallocate($img, 0, 0, 0);
        $textcolor = imagecolorallocate($img, 255, 255, 255);
        imagefill($img, 0, 0, $background);
        $textContent = "hello, " . $name;
        imagestring($img, 5, 20, 90, $textContent, $textcolor);
        header("Content-Type: image/png");
        imagepng($img);
        imagedestroy($img);
    }

    square('User');
?>