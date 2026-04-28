<?php 
    function square($x, $y, $image, $text) {
        $img = imagecreatefromjpeg($image);
        $background = imagecolorallocate($img, 0, 0, 0);
        $textcolor = imagecolorallocate($img, 255, 255, 255);
        imagestring($img, 5, $x, $y, $text, $textcolor);
        header("Content-Type: image/png");
        imagepng($img);
        imagedestroy($img);
    }

    square(500, 500, 'vesna.jpg', 'VESNAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA');
?>