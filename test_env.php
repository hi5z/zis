<?php
@include 'config.php';

// ПОДПИСЬ ВНИЗУ
Header("Content-type: image/png");
$image = imagecreatefromjpeg('http://zis.org.ua/p/o/1342479235.jpg');
$botpoint=imagesy($image)-20;
$textpoint=imagesy($image)-5;
$recty=imagesy($image);
$rectx=imagesx($image);
list($shyrina, $visota) = GetImageSize('http://zis.org.ua/p/o/1342479235.jpg');
$picsize = $shyrina.'x'.$visota;
$white = imagecolorallocate($image, 255, 255, 255);
$font='img/arial.ttf';
$text='Реальный размер картинки ['.$picsize.']';

$coord = imagettfbbox(10, 0, $font, $text);
$width = $coord[2] - $coord[0]; $height = $coord[1] - $coord[7];
$X = ($rectx - $width) / 2;

imagecolortransparent($image, $white);
//imagefilledrectangle ($image, 0, $recty, $rectx, $botpoint, $white);
imagettftext($image, 10, 0, $X, $textpoint, $black, $font, $text); 
ImagePng($image);
imagedestroy($image);
// /ПОДПИСЬ ВНИЗУ

?>

<?php
/***********************************************************************************
Функция img_resize(): генерация thumbnails
Параметры:
  $src             - имя исходного файла
  $dest            - имя генерируемого файла
  $width, $height  - ширина и высота генерируемого изображения, в пикселях
Необязательные параметры:
  $rgb             - цвет фона, по умолчанию - белый
  $quality         - качество генерируемого JPEG, по умолчанию - максимальное (100)
***********************************************************************************/

function img_resize($src, $dest, $width, $height, $rgb=0xFFFFFF, $quality=100)
{
  if (!file_exists($src)) return false;
  $size = getimagesize($src);
  if ($size === false) return false;
  // Определяем исходный формат по MIME-информации, предоставленной
  // функцией getimagesize, и выбираем соответствующую формату
  // imagecreatefrom-функцию.
  $format = strtolower(substr($size['mime'], strpos($size['mime'], '/')+1));
  $icfunc = "imagecreatefrom" . $format;
  if (!function_exists($icfunc)) return false;
  $x_ratio = $width / $size[0];
  $y_ratio = $height / $size[1];
  $ratio       = min($x_ratio, $y_ratio);
  $use_x_ratio = ($x_ratio == $ratio);
  $new_width   = $use_x_ratio  ? $width  : floor($size[0] * $ratio);
  $new_height  = !$use_x_ratio ? $height : floor($size[1] * $ratio);
  $new_left    = $use_x_ratio  ? 0 : floor(($width - $new_width) / 2);
  $new_top     = !$use_x_ratio ? 0 : floor(($height - $new_height) / 2);
  $isrc = $icfunc($src);
  $idest = imagecreatetruecolor($width, $height);
  imagefill($idest, 0, 0, $rgb);
  imagecopyresampled($idest, $isrc, $new_left, $new_top, 0, 0, 
    $new_width, $new_height, $size[0], $size[1]);
  imagejpeg($idest, $dest, $quality);
  imagedestroy($isrc);
  imagedestroy($idest);
  return true;
}
img_resize('img/petux.jpg', 'img/s.jpg', 300, 200);
?>