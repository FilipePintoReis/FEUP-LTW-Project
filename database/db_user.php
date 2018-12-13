<?php

    include_once(dirname(__DIR__) . '/includes/database.php');

    function validate_login($username, $password) {
        $db = Database::instance()->db();
        $stmt = $db->prepare('SELECT * FROM User WHERE username = ?');
        $stmt->execute(array($username));
        $user = $stmt->fetch();
        return $user !== false && password_verify($password, $user['password']);
      }

?>
