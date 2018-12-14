<?php
    include_once('../abs_path.php');
    include_once(ABSPATH . '/includes/session.php');

    if(isset($_SESSION['username'])){
        header('Location: ' . ABSPATH. '/index.php');
    }

    include(ABSPATH . '/templates/common/header.php');
 ?>

 <section id="signup">
     <h2>New Account</h2>
     <form method="post" action="../actions/action_signup.php">
         <input type="text" name="username" placeholder="username" required>
         <input type="password" name="password" placeholder="password" required>
         <input type="submit" value="Sign Up">
     </form>
 </section>
 <p>Already have an account? <a href="login.php">Login!</a></p>

 <?php     include(ABSPATH . '/templates/common/footer.php'); ?>
