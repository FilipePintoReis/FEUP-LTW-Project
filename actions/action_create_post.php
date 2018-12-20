<?php

	include_once('../abs_path.php');
    include_once(ABSPATH . '/includes/session.php');
    include_once(ABSPATH . '/database/db_stories.php');
    include_once(ABSPATH . '/database/db_user.php');

    if(!isset($_SESSION['username'])) {
        $_SESSION['error_messages'][] = "You need to be logged in to vote!";
        die(header('Location: ../pages' . '/' . $_SESSION['curr_file']);
    }

	if ( !preg_match ("/^[\w\s-?!\.()]*$/", $_GET['title'])) {
		$_SESSION['error_messages'][] = "You need to be logged in to vote!";
		die(header('Location: ../pages' . '/' . $_SESSION['curr_file']);
	}

	if ( !preg_match ("/^[\w\s-?!\.()]*$/", $_GET['text'])) {
		$_SESSION['error_messages'][] = "ERROR: text can only contain letters, numbers and most common punctuaction";
		die(header('Location: ../pages' . '/' . $_SESSION['curr_file']);
	}

    $user = get_id_user_with_username($_SESSION['username']);
    $id_user = $user['id'];
    $title = $_POST['title'];
    $content = $_POST['text'];


    $date = date("Y-m-d h:i:s");



	$all_info = $_FILES['upfile'];
	$name = $all_info['name'];
    $path = "../post_images/$name";

    move_uploaded_file($all_info['tmp_name'], $path);


    $channel_name = $_POST['channel'];
    $channel_id = get_channel_id_from_name($channel_name);


    $id_channel = $channel_id['id'];

    insert_story($id_user, $id_channel, $title, $content, $date, $path);
    header('Location: ../pages/homepage.php');


?>
