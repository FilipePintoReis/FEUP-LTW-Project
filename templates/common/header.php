<!DOCTYPE html>

<html>

<head>
    <title>VoteIt</title>
    <meta charset="utf-8">
    <link rel=icon href="../../images/icon.jpeg">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
</head>

<body>
    <header class = "head">
        <h1><a href="../index.php">Potatoe</a></h1>

        <?php echo isset($_SESSION['username']); if(!isset($_SESSION['username'])){ ?>
            <h3> <a href="pages/login.php">Login</a> </h3>
            <h3> <a href="pages/signup.php">Sign Up</a> </h3>
        <?php  } else { ?>
            <h3> <a class="button" href="actions/action_logout.php">Logout</a> </h3>
        <?php }?>
    </header>

    <aside class="side_bar">
        <section>
            <img src="images/pic1.png" alt="tHe mEmEs">
        </section>
        <section id="create_post">
            <p> <a href="create_story.php"> Create a Story</a></p>
        </section>
        <section id="trending_categories">
            <p>Trending Categories</p>
        </section>
        <section id="recent_posts">
            <p>Recent Posts</p>
        </section>
    </aside>
