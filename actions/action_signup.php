<?php
    include_once('../abs_path.php');
    include_once(ABSPATH . '/includes/session.php');
    include_once(ABSPATH . '/database/db_user.php');

    //VERIFY using preg_match each parameter

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $fullname = $_POST['fullname'];

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
        add_user($username, $password, $fullname, $email);
        $_SESSION['success_messages'][] = "User added successfully";
        $referer = '../pages/' . $_SESSION['curr_file'];
;
    }

    header('Location: ' . $referer);

 ?>
