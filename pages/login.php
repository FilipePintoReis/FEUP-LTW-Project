<?php
    include_once('../abs_path.php');
    include_once(ABSPATH . '/includes/session.php');

    if(isset($_SESSION['username'])){
        die(header('Location: ../pages/' . $_SESSION['curr_file']));
    }

    include(ABSPATH . '/templates/common/header.php');
 ?>

 <section id="login">
     <h2>Login</h2>
     <form method="post" action= "../actions/action_login.php">
         <input type="text" name="username" placeholder="username" required>
         <input type="password" name="password" placeholder="password" required>
         <input type="submit" value="Login">
     </form>
 </section>
 <p>Don't have an account? <a href="signup.php">Sign Up!</a></p>

<?php     include(ABSPATH . '/templates/common/footer.php'); ?>
