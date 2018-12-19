<?php
include_once('../abs_path.php');
include_once(ABSPATH . '/includes/session.php');
include_once(ABSPATH . '/database/db_stories.php');


$temp_image = imagecreatefromstring(file_get_contents($_POST['picture']));

$max_width = 1000;
$max_height = 1000;
$quality = 100; //The quality of your new image
list($width, $height) = getimagesize($_POST['picture']);

$new_width = $height * $max_width/$max_height;
$new_height = $width * $max_height/$max_width;

//if the new width is greater than the actual width of the image, then the height is too large and the rest cut off, or vice versa
$new_image = imagecreatetruecolor($max_width, $max_height);
if($new_width > $width) {
	$h_point = (($height - $new_height) / 2);
	imagecopyresampled($new_image, $temp_image, 0, 0, 0, $h_point, $max_width, $max_height, $width, $new_width);
} else {
	$w_point = (($width - $new_width) / 2);
	imagecopyresampled($new_image, $temp_image, 0, 0, $w_point, 0, $max_width, $max_height, $new_width, $height);
}

ob_start();
imagepng($new_image);
$contents =  ob_get_contents();
ob_end_clean();

$final_encoding = base64_encode($contents);
$final_image = "data:image/png;base64,$final_encoding";

if(update_picture_story($_POST[$id_story], $final_image))
	$_SESSION['success_messages'][] = "Image updated!";
else
  $_SESSION['error_messages'][] = "Error updating image!";

$referer = '../myprofile.php';
header('Location: ' . $referer);
?>
