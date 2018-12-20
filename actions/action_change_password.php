<?php
    include_once('../abs_path.php');
    include_once(ABSPATH . '/includes/session.php');
    include_once(ABSPATH . '/database/db_user.php');

    //VERIFY using preg_match each parameter

    if ( !preg_match ("/^(?=.*\d)(?=.*[a-zA-Z])(?=.*[&quot;-_?!@#+*$%&\/\(\)=])[&quot;\w\-?!@#+*$%&\/\(\)=]{8,32}$/", $_POST['old_password'])) {
        $_SESSION['error_messages'][] = "ERROR: password invalid";
        die(header('Location: ../pages/change_password.php'));
    }

    if ( !preg_match ("/^(?=.*\d)(?=.*[a-zA-Z])(?=.*[&quot;-_?!@#+*$%&\/\(\)=])[&quot;\w\-?!@#+*$%&\/\(\)=]{8,32}$/", $_POST['new_password'])) {
        $_SESSION['error_messages'][] = "ERROR: confirm_password invalid";
        die(header('Location: ../pages/change_password.php'));
    }

    if ( !preg_match ("/^(?=.*\d)(?=.*[a-zA-Z])(?=.*[&quot;-_?!@#+*$%&\/\(\)=])[&quot;\w\-?!@#+*$%&\/\(\)=]{8,32}$/", $_POST['confirm_password'])) {
        $_SESSION['error_messages'][] = "ERROR: confirm_password invalid";
        die(header('Location: ../pages/change_password.php'));
    }

    $user = get_user_from_username($_SESSION['username']);
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if(!validate_login($_SESSION['username'], $old_password)){
        $_SESSION['error_messages'][] = "Old Password doesn't match.";
        $referer = '/pages/change_password.php';
    }
    else if($old_password == $new_password){
        $_SESSION['error_messages'][] = "New Password must be different from the old one.";
        $referer = '/pages/change_password.php';
    }
    else if($new_password != $confirm_password){
        $_SESSION['error_messages'][] = "New Passwords don't match.";
        $referer = '/pages/change_password.php';
    }
    else {
        update_password($user['id'], $new_password);
        $_SESSION['success_messages'][] = "User updated successfully";
        $referer = '../pages/profile.php';
;
    }

    header('Location: ' . $referer);

 ?>
