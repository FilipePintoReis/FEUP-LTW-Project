<!DOCTYPE html>
<html>

<head>
    <title>VoteIt</title>
    <meta charset="utf-8">
    <link rel=icon href="images/icon.jpeg">
</head>

<body>
    <header>
        <h1><a href="index.php">Vote It</a></h1>
    </header>

    <section id="signup">
        <h2>Login</h2>
        <form method="post" action="action_login.php">
            <input type="text" name="username" placeholder="username" required>
            <input type="password" name="password" placeholder="password" required>
            <input type="submit" value="Login">
        </form>
    </section>
    <footer>
        <p>Don't have an account? <a href="signup.php">Sign Up!</a></p>
        <p>Need more info? Travel to our help page! <a href="help.php">HELP</a></p>
        &copy; 2018 VoteIt
    </footer>
</body>

</html>
