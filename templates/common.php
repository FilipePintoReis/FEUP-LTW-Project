<?php function draw_header($username) {?>
    <!DOCTYPE html>

    <html>

    <head>
        <title>VoteIt</title>
        <meta charset="utf-8">
        <link rel=icon href="images/icon.jpeg">
        <link rel="stylesheet" href="css/style.css">
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

        <aside class="side_bar">
            <section id="create_post">
                <p>Create a Post</p>
            </section>
            <section id="trending_categories">
                <p>Trending Categories</p>
            </section>
            <section id="recent_posts">
                <p>Recent Posts</p>
            </section>
        </aside>
<?php } ?>

<?php function draw_footer() { ?>
    <footer>
        &copy; 2018 VoteIt
    </footer>
</body>

</html>
<?php } ?>