<?php
    include_once('../abs_path.php');
    include_once(ABSPATH . '/includes/database.php');

    function validate_login($username, $password) {
        $db = Database::instance()->db();
        $stmt = $db->prepare('SELECT * FROM User WHERE username = ? AND password = ?');
        $stmt->execute(array($username, $password));
        return ($stmt->fetch() !== false);
      }

      function user_already_exists($username) {
          $db = Database::instance()->db();
          $stmt = $db->prepare('SELECT * FROM User WHERE username = ?');
          $stmt->execute(array($username));
          return ($stmt->fetch() !== false);
      }

      function email_already_exists($email) {
          $db = Database::instance()->db();
          $stmt = $db->prepare('SELECT * FROM User WHERE email = ?');
          $stmt->execute(array($email));
          return ($stmt->fetch() !== false);
      }

      function get_id_user_with_username($username) {
          $db = Database::instance()->db();
          $stmt = $db->prepare('SELECT id FROM User WHERE username = ?');
          $stmt->execute(array($username));
          return $stmt->fetch();
      }

      function get_user_from_username($username) {
          $db = Database::instance()->db();
          $stmt = $db->prepare('SELECT * FROM User WHERE username = ?');
          $stmt->execute(array($username));
          return $stmt->fetch();
      }

      function add_user($username, $password, $fullname, $email) {
          $db = Database::instance()->db();
          $stmt = $db->prepare('INSERT INTO USER VALUES (NULL, ?, ?, ?, ?, NULL, NULL);');
          $stmt->execute(array($username, $password, $fullname, $email));
          return $stmt->fetchAll();
      }

      function get_number_stories_posted($id_user) {
          $db = Database::instance()->db();
          $stmt = $db->prepare('SELECT count(*) as counter FROM Story WHERE id_user = ?');
          $stmt->execute(array($id_user));
          return $stmt->fetch();
      }
?>
