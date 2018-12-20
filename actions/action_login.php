<?php
    include_once('../abs_path.php');
    include_once(ABSPATH . '/includes/session.php');
    include_once(ABSPATH . '/database/db_user.php');

    if ( !preg_match ("/^[a-zA-Z][\w-]{1,18}(?![-_])\w$/", $_POST['username'])) {
      die("ERROR: Username invalid");
    }

    if ( !preg_match ("/^(?=.*\d)(?=.*[a-zA-Z])(?=.*[&quot;-_?!@#+*$%&\/\(\)=])[&quot;\w\-?!@#+*$%&\/\(\)=]{8,32}$/", $_POST['password'])) {
      die("ERROR: password");
    }

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
