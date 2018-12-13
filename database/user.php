<?php
	include_once('./includes/database.php');

    function validate_login($u, $p) {
        $db = Database::instance()->db();
        $stmt = $db->prepare('SELECT * FROM User WHERE username = ? AND password = ?');
        $stmt->execute(array($u, sha1($p)));
        return $stmt->fetch() !== false;
      }

?>
