<?php
/*-----------------------------------------------------------------------+
 * 				         	** sa-captcha **
 *
 * By Reza ramezanpour <reza.irdev@gmail.com>
 * Script url: http://www.softafzar.net/thread1756.html
 *
 * Copyright (C) 2014  Reza ramezanpour
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * See http://creativecommons.org/licenses/GPL/2.0/ for details
 *
 * *** If you redistribute and/or modify this software, you must attribute the
 * original authors. ***
 *
 *-----------------------------------------------------------------------*/
function generate_captcha ($width = 120, $height = 40, $chars = 5)
{
    header("Pragma: no-cache");
    header("Cache-Control: no-cache, must-revalidate");
    
    session_start();
    header('Content-Type: image/png');
    $width > 200 ? $width = 200 : $width = $width;
    $height > 100 ? $height = 100 : $height = $height;
    $chars > 6 ? $chars = 6 : $chars = $chars;
    $code = generateRandomString($chars);
    $_SESSION['sacaptchaCode'] = $code;
    $im = imagecreatetruecolor($width, $height);
    $bg = imagecolorallocate($im, rand(0, 80), rand(0, 80), rand(0, 80));
    
    imagefilledrectangle($im, 0, 0, $width, $height, $bg);
    
    $font = 'fonts/comic.ttf';
    $xspace = 10;
    $len = strlen($code);
    for ($index = 0; $index < $len; $index ++) {
        $numbers[] = substr($code, $index, 1);
    }
    foreach ($numbers as $value) {
        $fg = imagecolorallocate($im, rand(150, 255), rand(150, 255), 
                rand(150, 255));
        imagettftext($im, rand($width / ($chars + 2) - 5, $width / ($chars + 2) +
                 5), rand(- 40, 40), $xspace, ($height / 2) + 10, $fg, $font, 
                $value);
        $xspace += ($width / $chars) - 2;
    }
    imagepng($im);
    imagedestroy($im);
}
function generateRandomString ($length = 4)
{
    $characters = '1234567890';
    $randomString = '';
    for ($i = 0; $i < $length; $i ++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}
// generate_captcha(220,50,6);
generate_captcha(120,40,3);
?>