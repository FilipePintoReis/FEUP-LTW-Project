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
        <form method="post" action="action_login.php">
            <input type="text" name="username" placeholder="username" required>
            <input type="password" name="password" placeholder="password" required>
            <input type="submit" value="Login">
        </form>
        <p>You don't have an account? <a href="signup.php">Sign Up!</a></p>
    </header>
    <section id="stories_feed">
        <article class="story">
            <h2>First Story Title</h2>
            <img src="images/story_image.jpeg" alt="tHe mEmEs">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris cursus felis nec felis posuere dignissim in euismod orci.
                Sed id est eu lacus pulvinar tempor. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                Vestibulum laoreet rutrum eleifend. Ut odio quam, lacinia ut hendrerit ac, vehicula eu erat. Sed a porta lectus, ut iaculis lacus.
                Suspendisse ut ex risus.
            </p>
            <section class="comments">
                <article class="comment">
                    <span class="user">userName</span>
                    <span class="date">1m ago</span>
                    <p>First Comment Nam sit amet ante ac mi sagittis scelerisque in quis libero. Phasellus vitae mattis elit. Integer finibus ornare tincidunt.
                        Nullam in dictum nulla, at gravida mauris.
                    </p>
                </article>
                <article class="comment">
                    <span class="user">userName</span>
                    <span class="date">1h ago</span>
                    <p>
                        Second Comment amet ante ac mi sagittis scelerisque in quis libero. Phasellus vitae mattis elit. Integer finibus ornare tincidunt.
                        Nullam in dictum nulla, at gravida mauris.
                    </p>
                </article>
                <form action="action_comment.php" method="post">
                    <input type="text" name="comment" placeholder="Your thoughts....">
                    <input type="submit" value="Comment">
                </form>
            </section>
        </article>
        <article class="story">
            <h2>Second Story Title</h2>
            <img src="images/story_image.jpeg" alt="tHe mEmEs">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris cursus felis nec felis posuere dignissim in euismod orci.
                Sed id est eu lacus pulvinar tempor. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                Vestibulum laoreet rutrum eleifend. Ut odio quam, lacinia ut hendrerit ac, vehicula eu erat. Sed a porta lectus, ut iaculis lacus.
                Suspendisse ut ex risus.
            </p>
            <section class="comments">
                <article class="comment">
                    <span class="user">userName</span>
                    <span class="date">1m ago</span>
                    <p>First Comment Nam sit amet ante ac mi sagittis scelerisque in quis libero. Phasellus vitae mattis elit. Integer finibus ornare tincidunt.
                        Nullam in dictum nulla, at gravida mauris.
                    </p>
                </article>
                <article class="comment">
                    <span class="user">userName</span>
                    <span class="date">1h ago</span>
                    <p>
                        Second Comment amet ante ac mi sagittis scelerisque in quis libero. Phasellus vitae mattis elit. Integer finibus ornare tincidunt.
                        Nullam in dictum nulla, at gravida mauris.
                    </p>
                </article>
                <form action="action_comment.php" method="post">
                    <input type="text" name="comment" placeholder="Your thoughts....">
                    <input type="submit" value="Comment">
                </form>
            </section>
        </article>
        <article class="story">
            <h2>Third Story Title</h2>
            <img src="images/story_image.jpeg" alt="tHe mEmEs">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris cursus felis nec felis posuere dignissim in euismod orci.
                Sed id est eu lacus pulvinar tempor. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                Vestibulum laoreet rutrum eleifend. Ut odio quam, lacinia ut hendrerit ac, vehicula eu erat. Sed a porta lectus, ut iaculis lacus.
                Suspendisse ut ex risus.
            </p>
            <section class="comments">
                <article class="comment">
                    <span class="user">userName</span>
                    <span class="date">1m ago</span>
                    <p>First Comment Nam sit amet ante ac mi sagittis scelerisque in quis libero. Phasellus vitae mattis elit. Integer finibus ornare tincidunt.
                        Nullam in dictum nulla, at gravida mauris.
                    </p>
                </article>
                <article class="comment">
                    <span class="user">userName</span>
                    <span class="date">1h ago</span>
                    <p>
                        Second Comment amet ante ac mi sagittis scelerisque in quis libero. Phasellus vitae mattis elit. Integer finibus ornare tincidunt.
                        Nullam in dictum nulla, at gravida mauris.
                    </p>
                </article>
                <form action="action_comment.php" method="post">
                    <input type="text" name="comment" placeholder="Your thoughts....">
                    <input type="submit" value="Comment">
                </form>
            </section>
        </article>
    </section>
    <footer>
        <p>Need more info? Travel to our help page! <a href="help.php">HELP</a></p>
        &copy; 2018 VoteIt
    </footer>
</body>

</html>