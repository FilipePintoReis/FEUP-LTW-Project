<?php
    include_once('../abs_path.php');
    include_once(ABSPATH . '/includes/session.php');
    include_once(ABSPATH . '/database/db_user.php');

    // CREATE SECURITY USING REGULAR EXPRESSION TO CHECK FOR INJECTION, ETCCC
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(validate_login($username, $password)) {
        set_current_user($username);
        $_SESSION['success_messages'][] = "*Login Successful*";
        $referer = '../pages/' . $_SESSION['curr_file'];
;
      } else {
        $_SESSION['error_messages'][] = "*Login Failed*";
        $referer = '../pages/login.php';
      }

      header('Location: ' . $referer);
 ?>
