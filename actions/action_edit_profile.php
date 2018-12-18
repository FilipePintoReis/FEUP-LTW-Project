<?php
    include_once('../abs_path.php');
    include_once(ABSPATH . '/includes/session.php');
    include_once(ABSPATH . '/database/db_user.php');

    //VERIFY using preg_match each parameter

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
