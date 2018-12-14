<?php
    include_once('../abs_path.php');
    include_once(ABSPATH . '/includes/session.php');
    include_once(ABSPATH . '/database/db_user.php');

    //VERIFY using preg_match each parameter

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if(user_already_exists($username)){
        $_SESSION['error_messages'][] = "Username already in use!";
        $referer = '/pages/signup.php';
    }
    else if(email_already_exists($email)){
        $_SESSION['error_messages'][] = "Email already in use!";
        $referer = '/pages/signup.php';
    }
    else if($confirm_password != $password){
        $_SESSION['error_messages'][] = "Passwords don't match";
        $referer = '/pages/signup.php';
    }
    else {
        add_user($username, $password, $email);
        $_SESSION['error_messages'][] = "Passwords don't match";
        $referer = '/pages/list_stories.php';
    }

    header('Location: ' . $referer);

 ?>
