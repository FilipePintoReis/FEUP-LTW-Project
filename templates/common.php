<?php function draw_header($username) {?>
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
            <?php if($username != NULL) {?>
            <ul>
                <li><?=$username?></li>
                <li><a href="../actions/action_logout.php"></a>Logout</li>
            </ul>
            <?php } ?>
        </header>
<?php } ?>

<?php function draw_footer() { ?>
    <footer>
        &copy; 2018 VoteIt
    </footer>
</body>

</html>
<?php } ?>
