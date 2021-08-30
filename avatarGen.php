<?php

define('FONT', 'font/comforta.ttf');
define('FONT_SIZE', 36);



$size = [200, 200];
$name = 'Avatar';

if (!empty($_GET['size'])) {
  $size = explode('x', $_GET['size']);
}

if (!empty($_GET['name'])) {
  $name = $_GET['name'];
}

// $name = (function_exists('mb_strtoupper')) ? mb_strtoupper($name) : strtoupper($name);
$name = mb_strtoupper($name);
$name = $name[0] ;

// PNG изображение
header('Content-type: image/png');
// 150x100
$im = imagecreatetruecolor($size[0], $size[1]);
$color = imageColorAllocate($im, 255, 255, 255); //Цвет шрифта
$w=(int)$size[0]; // ширина
$h=(int)$size[1]; // высота
$box = imagettfbbox(FONT_SIZE, 0, FONT, $name);
$x = ($w/2)-($box[2]-$box[0])/2; //по оси x
$y = ($h/2) + (FONT_SIZE / 2); //по оси y


$colorsFill = [];
// Определяем красный цвет #e91e63
$colorsFill[] = imagecolorallocate($im, 0xE9, 0x1E, 0x63);
//                                          #f44336
$colorsFill[] = imagecolorallocate($im, 0xF4, 0x43, 0x36);
//                                          #9c27b0
$colorsFill[] = imagecolorallocate($im, 0x9C, 0x27, 0xB0);
       //                                  #880e4f
$colorsFill[] = imagecolorallocate($im, 0x88, 0x0E, 0x4F);

// Определяем белый цвет
$white = imagecolorallocate($im, 0xFF, 0xFF, 0xFF);


$randomColor = $colorsFill[ random_int(0, count($colorsFill)) ];
// Делаем фон белым (по-умолчанию черный)
imagefill($im, 1, 1, $randomColor);

//Разметка самого текста
imagettftext($im, FONT_SIZE, 0, $x, $y, $color, FONT, $name);
 
// Выводим изображение
imagepng($im);

?>