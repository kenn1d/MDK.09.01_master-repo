<?php 
    function redSquare($bgWidth, $bgHeight, $squareSize) {
        if ($squareSize > $bgWidth || $squareSize > $bgHeight) {
            $squareSize = min($bgWidth, $bgHeight);
        }
    
        $img = imagecreatetruecolor($bgWidth, $bgHeight);
    
        $black = imagecolorallocate($img, 0, 0, 0);
        $red   = imagecolorallocate($img, 255, 0, 0);
    
        imagefill($img, 0, 0, $black);
    
        $maxX = $bgWidth - $squareSize;
        $maxY = $bgHeight - $squareSize;
    
        $x = $maxX > 0 ? rand(0, $maxX) : 0;
        $y = $maxY > 0 ? rand(0, $maxY) : 0;
    
        imagefilledrectangle($img, $x, $y, $x + $squareSize - 1, $y + $squareSize - 1, $red);
    
        header('Content-Type: image/png');
        imagepng($img);
        imagedestroy($img);
    }

    redSquare(500, 500, 300);
?>