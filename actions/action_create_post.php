<?php

	include_once('../abs_path.php');
    include_once(ABSPATH . '/includes/session.php');
    include_once(ABSPATH . '/database/db_stories.php');
    include_once(ABSPATH . '/database/db_user.php');

    if(!isset($_SESSION['username'])) {
        $_SESSION['error_messages'][] = 'You need to be logged in to vote!';
        header('Location: ../pages' . '/' . $_SESSION['curr_file']);
    }

    $id_user = get_id_user_with_username($_SESSION['username']);

	$date = date("Y-m-d h-i-s");

	$all_info = $_FILES['upfile'];
	$name = $all_info['name'];
    $path = "../post_images/$name";

    move_uploaded_file($all_info['tmp_name'], $path);

    insert_story($id_user, $id_channel, $title, $content, $date, $path); //TO FINISH THIS YOU NEED TO EXTRACT ID_CHANNEL, TITLE AND CONTENT FROM HTML


?>
