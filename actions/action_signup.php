<?php
    include_once('../abs_path.php');
    include_once(ABSPATH . '/includes/session.php');
    include_once(ABSPATH . '/database/db_user.php');

    //VERIFY using preg_match each parameter

    if ( !preg_match ("/^[a-zA-Z][\w-]{1,18}(?![-_])\w$/", $_POST['username'])) {
      die("ERROR: Username invalid");
    }

    if ( !preg_match ("/^[a-zA-Z0-9.!#$%&’*+\/\=?^_`{\|}~\-]+@[a-zA-Z0-9\-]+(?:\.[a-zA-Z0-9\-]+)*$/", $_POST['email'])) {
      die("ERROR: email invalid");
    }

    if ( !preg_match ("/^(?=.*\d)(?=.*[a-zA-Z])(?=.*[&quot;-_?!@#+*$%&\/\(\)=])[&quot;\w\-?!@#+*$%&\/\(\)=]{8,32}$/", $_POST['password'])) {
      die("ERROR: password invalid");
    }

    if ( !preg_match ("/^(?=.*\d)(?=.*[a-zA-Z])(?=.*[&quot;-_?!@#+*$%&\/\(\)=])[&quot;\w\-?!@#+*$%&\/\(\)=]{8,32}$/", $_POST['confirm_password'])) {
      die("ERROR: confirPassword invalid");
    }

    if ( !preg_match ("/^[a-zA-Z][\w-]{1,18}(?![-_])\w$/", $_POST['fullname'])) {
      die("ERROR: Username invalid");
    }

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
