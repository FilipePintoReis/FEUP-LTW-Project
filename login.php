<?php

    include_once('./includes/session.php');

    if(isset($_SESSION['username'])){
        header('Location: ' . '../index.php');
    }

    include('./templates/common/header.php');
 ?>

 <section id="login">
     <h2>Login</h2>
     <form method="post" action="actions/action_login.php">
         <input type="text" name="username" placeholder="username" required>
         <input type="password" name="password" placeholder="password" required>
         <input type="submit" value="Login">
     </form>
 </section>
 <p>Don't have an account? <a href="signup.php">Sign Up!</a></p>

<?php     include('./templates/common/footer.php'); ?>
