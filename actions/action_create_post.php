<?php
	
	$date = "hey";

	$all_info = $_FILES['upfile'];
	$name = $all_info['name'];
    $path = "../post_images/$name"; 

    move_uploaded_file($all_info['tmp_name'], $path);

    //insert_story($id_user, $id_channel, $title, $content, $date_posted, $url);	


?>
