<?php
	
	$date = "hey";

	$all_info = $_FILES['upfile'];
	$name = $all_info['name'];
    $path = "../post_images/$name"; 

    if(move_uploaded_file($all_info['tmp_name'], $path))
    	var_dump($name);
    else
    	var_dump($date);
 ?>
