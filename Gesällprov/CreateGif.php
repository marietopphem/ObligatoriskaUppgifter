<?php

header ('Content-type:image/gif');
include('GIFEncoder.class.php');

$text = $_POST['text'];

$image = imagecreatefrompng($_FILES['file1']['tmp_name']);
$text_color = imagecolorallocate($image, 255, 0, 0);
imagestring($image, 10, 5, 5,  $text, $text_color);

ob_start();
imagegif($image);
$frames[]=ob_get_contents();
$framed[]=40; // Delay in the animation.
ob_end_clean();



$image = imagecreatefrompng($_FILES['file2']['tmp_name']);
$text_color = imagecolorallocate($image, 0, 255, 0);
imagestring($image, 10, 5, 5,  $text, $text_color);

ob_start();
imagegif($image);
$frames[]=ob_get_contents();
$framed[]=40; // Delay in the animation.
ob_end_clean();



$image = imagecreatefrompng($_FILES['file3']['tmp_name']);
$text_color = imagecolorallocate($image, 0, 0, 255);
imagestring($image, 10, 5, 5,  $text, $text_color);

ob_start();
imagegif($image);
$frames[]=ob_get_contents();
$framed[]=40; // Delay in the animation.
ob_end_clean();


// Generate the animated gif and output to screen.
$gif = new GIFEncoder($frames,$framed,0,2,0,0,0,'bin');
echo $gif->GetAnimation();

?>