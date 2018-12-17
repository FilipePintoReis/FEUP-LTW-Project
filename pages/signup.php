<?php
    include_once('../abs_path.php');
    include_once(ABSPATH . '/includes/session.php');

    if (isset($_SESSION['username'])) {
        die(header('Location: ../pages/' . $_SESSION['curr_file']));
    }

    include(ABSPATH . '/templates/common/header.php');
 ?>

 <section id="signup">
     <h2>New Account</h2>
     <form method="post" action="../actions/action_signup.php">
            <div>
                <div class="form_parameter">
                    <label for="username">Username</label>
                    <input type="text" name="username" placeholder="username" required>
                </div>
                <div class="form_parameter">
                    <label for="fullname">FullName</label>
                    <input type="text" name="fullname" placeholder="fullname" required>
                </div>
                <div class="form_parameter">
                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="chips@potato.eat" required>
                </div>
                <div class="form_parameter">
                    <label for="pasword">Password</label>
                    <input type="password" name="password" placeholder="Don't make it easy" required>
                </div>
                <div class="form_parameter">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" name="confirm_password" placeholder="Just to check" required>
                </div>
            </div>
            <div>
                <input class="button_submit" type="submit" value="Sign Up">
            </div>
     </form>
 </section>
 <p>Already have an account? <a href="login.php">Login!</a></p>

 <?php     include(ABSPATH . '/templates/common/footer.php'); ?>
