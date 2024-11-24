<?php
ini_set('memory_limit', '-1');
$old_filepath = 'jar.png';


$new_filepath = 'thumb_jar.png'; 

function nhg_resize_image($old_filepath,$new_filepath,$new_width,$new_height){
	list($width, $height) = getimagesize($old_filepath);
	$img = imagecreatefromstring(file_get_contents($old_filepath));
	if ($height > $width) {
	    $scale = $new_height/$height;
	} else {
	    $scale = $new_width/$width;
	}
	$new_w =  $width * $scale;
	$new_h =  $height * $scale;
	$offset_x = ($new_width - $new_w) / 2;
	$offset_y = ($new_height - $new_h) / 2;
	$new_img = imagecreatetruecolor($new_width, $new_height);
	$bgcolor = imagecolorallocate($new_img, 255, 255, 255);
	imagefill($new_img, 0, 0, $bgcolor);
	imagecopyresampled($new_img, $img, $offset_x, $offset_y, 0, 0, $new_w, $new_h, $width, $height);
	imagejpeg($new_img, $new_filepath, 80);
}

nhg_resize_image($old_filepath,$new_filepath,650,650);
?>