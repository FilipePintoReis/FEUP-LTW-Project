<?php
    include_once('../abs_path.php');
    include_once(ABSPATH . '/includes/database.php');

    function validate_login($username, $password) {
        $db = Database::instance()->db();
        $stmt = $db->prepare('SELECT * FROM User WHERE username = ? AND password = ?');
        $stmt->execute(array($username, $password));
        $user = $stmt->fetch();
        return $user !== false;
      }

?>
