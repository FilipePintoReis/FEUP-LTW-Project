<?php

    include_once('../abs_path.php');
    include_once(ABSPATH . '/includes/session.php');
    include_once(ABSPATH . '/database/db_stories.php');
    include_once(ABSPATH . '/database/db_user.php');
    header('Content-Type: application/json');



    if(!isset($_SESSION['username'])) {
        $_SESSION['error_messages'][] = 'You need to be logged in to comment!';
        die(header('Location: ../pages' . '/' . $_SESSION['curr_file']);
    }

    if ( !preg_match ("/^[\w\s-?!\.()]*$/", $_GET['a'])) {
        $_SESSION['error_messages'][] = "ERROR: comment can only contain letters, numbers and most common punctuaction";
        die(header('Location: ../pages' . '/' . $_SESSION['curr_file']);

    }

    $user = get_id_user_with_username($_SESSION['username']);
    $id_user = $user['id'];

    $content = $_POST['a'];
    $id_parent = $_POST['id_parent'];
    $id_story = $_POST['id_story'];
    $date_posted = date("Y-m-d h:i:s");

    //add_comment($id_story, $id_user, $id_parent, $content, $date_posted);

    if($id_parent == '0'){
        add_comment($id_story, $id_user, NULL, $content, $date_posted);
    } else{
        add_comment($id_story, $id_user, $id_parent, $content, $date_posted);
    }

    $user_name = get_username_from_user_id($id_user);
    $username = $user_name['username'];
    //header('Location: ../pages' . '/' . $_SESSION['curr_file']);

    echo json_encode(array(
        'content' => $content,
        'id_story' => $id_story,
        'user_name' => $username,
        'date_posted' =>$date_posted ));



 ?>
