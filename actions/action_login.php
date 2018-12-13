<?php

    include_once(dirname(__DIR__) . '../includes/session.php');
    include_once('../database/db_user.php');

    // CREATE SECURITY USING REGULAR EXPRESSION TO CHECK FOR INJECTION, ETCCC
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(validate_login($username, $password)) {
        echo "hi";
        set_current_user($username);
        $_SESSION['success_messages'][] = "*Login Successful*";
        $referer = '../index.php';
      } else {
        $_SESSION['error_messages'][] = "*Login Failed*";
        $referer = '../login.php';
      }

      header('Location: ' . $referer);
 ?>
