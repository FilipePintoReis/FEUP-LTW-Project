<?php function draw_login() {?>

    <section id="login">
        <h2>Login</h2>
        <form method="post" action="actions/action_login.php">
            <input type="text" name="username" placeholder="username" required>
            <input type="password" name="password" placeholder="password" required>
            <input type="submit" value="Login">
        </form>
    </section>
    <p>Don't have an account? <a href="signup.php">Sign Up!</a></p>

<?php } ?>

<?php function draw_signup() {?>

        <section id="signup">
            <h2>New Account</h2>
            <form method="post" action="actions/action_signup.php">
                <input type="text" name="username" placeholder="username" required>
                <input type="password" name="password" placeholder="password" required>
                <input type="submit" value="Sign Up">
            </form>
        </section>
        <p>Already have an account? <a href="login.php">Login!</a></p>
<?php } ?>
