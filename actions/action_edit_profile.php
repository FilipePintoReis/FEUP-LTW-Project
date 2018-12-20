<?php
    include_once('../abs_path.php');
    include_once(ABSPATH . '/includes/session.php');
    include_once(ABSPATH . '/database/db_user.php');

    //VERIFY using preg_match each parameter

    if ( !preg_match ("/^[a-zA-Z][\w-]{1,18}(?![-_])\w$/", $_POST['username'])) {
      $_SESSION['error_messages'][] = "ERROR: username invalid";
      die(header('Location: ../pages/edit_profile.php'));
    }

    if ( !preg_match ("/^[a-zA-Z0-9.!#$%&’*+\/\=?^_`{\|}~\-]+@[a-zA-Z0-9\-]+(?:\.[a-zA-Z0-9\-]+)*$/", $_POST['email'])) {
      $_SESSION['error_messages'][] = "ERROR: email invalid";
      die(header('Location: ../pages/edit_profile.php'));
    }

    if ( !preg_match ("/^[a-zA-Z ]+$/", $_POST['fullname'])) {
      $_SESSION['error_messages'][] = "ERROR: fullname can only contain space and letters";
      die(header('Location: ../pages/edit_profile.php'));
    }

    if ( !preg_match ("/^[\w\s-?!\.()]*$/", $_POST['bio'])) {
      $_SESSION['error_messages'][] = "ERROR: bio can only generic text";
      die(header('Location: ../pages/edit_profile.php'));
    }

    $username = $_POST['username'];
    $user = get_user_from_username($_SESSION['username']);
    $email = $_POST['email'];
    $fullname = $_POST['fullname'];
    $bio = $_POST['bio'];


    if(user_already_exists($username) && $username != $user['username']){
        $_SESSION['error_messages'][] = "Username already in use!";
        $referer = '/pages/edit_profile.php';
    }
    else if(email_already_exists($email) && $email != $user['email']){
        $_SESSION['error_messages'][] = "Email already in use!";
        $referer = '/pages/edit_profile.php';
    }
    else {
        update_user($user['id'], $username, $fullname, $email, $bio);
        $_SESSION['success_messages'][] = "User updated successfully";
        $referer = '../pages/profile.php';
;
    }

    header('Location: ' . $referer);

 ?>
