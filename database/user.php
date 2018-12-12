<?php
    function validate_login($u, $p) {
        global $db;
        $stmt = $db->prepare('SELECT * FROM User WHERE username = ? AND password = ?');
        $stmt->execute(array($u, sha1($p)));
        return $stmt->fetch() !== false;
      }

?>
