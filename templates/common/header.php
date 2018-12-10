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
        <h1><a href="index.php">Potatoe</a></h1>
        <?php if($username != NULL) {?>
        <ul>
            <li><?=$username?></li>
            <li><a href="../actions/action_logout.php"></a>Logout</li>
        </ul>
        <?php } ?>
    </header>

    <aside class="side_bar">
        <section>
            <img src="images/pic1.png" alt="tHe mEmEs">
        </section>
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
