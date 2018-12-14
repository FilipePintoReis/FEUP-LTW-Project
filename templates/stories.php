<?php function draw_stories_feed() {?>
    <section id="stories_feed">

        <article class="story">
            <h2>First Story Title</h2>
            <img src="../images/story_image.jpeg" alt="tHe mEmEs">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris cursus felis nec felis posuere dignissim in euismod orci.
                Sed id est eu lacus pulvinar tempor. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                Vestibulum laoreet rutrum eleifend. Ut odio quam, lacinia ut hendrerit ac, vehicula eu erat. Sed a porta lectus, ut iaculis lacus.
                Suspendisse ut ex risus.
            </p>
            <section class="comments">
                <article class="comment">
                    <span class="user">userName</span>
                    <p>First Comment Nam sit amet ante ac mi sagittis scelerisque in quis libero. Phasellus vitae mattis elit. Integer finibus ornare tincidunt.
                        Nullam in dictum nulla, at gravida mauris.
                    </p>
                    <span class="date">1m ago</span>
                </article>
                <article class="comment">
                    <span class="user">userName</span>
                    <p>
                        Second Comment amet ante ac mi sagittis scelerisque in quis libero. Phasellus vitae mattis elit. Integer finibus ornare tincidunt.
                        Nullam in dictum nulla, at gravida mauris.
                    </p>
                    <span class="date">1h ago</span>
                </article>
                <form action="action_comment.php" method="post">
                    <input type="text" name="comment" placeholder="Thought this was juicy?">
                    <input type="submit" value="Comment">
                </form>
            </section>
        </article>

        <article class="story">
            <h2>Second Story Title</h2>
            <img src="images/mandala.jpg" alt="tHe mEmEs">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris cursus felis nec felis posuere dignissim in euismod orci.
                Sed id est eu lacus pulvinar tempor. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                Vestibulum laoreet rutrum eleifend. Ut odio quam, lacinia ut hendrerit ac, vehicula eu erat. Sed a porta lectus, ut iaculis lacus.
                Suspendisse ut ex risus.
            </p>
            <section class="comments">
                <article class="comment">
                    <span class="user">userName</span>
                    <p>First Comment Nam sit amet ante ac mi sagittis scelerisque in quis libero. Phasellus vitae mattis elit. Integer finibus ornare tincidunt.
                        Nullam in dictum nulla, at gravida mauris.
                    </p>
                    <span class="date">1m ago</span>
                </article>
                <article class="comment">
                    <span class="user">userName</span>
                    <p>
                        Second Comment amet ante ac mi sagittis scelerisque in quis libero. Phasellus vitae mattis elit. Integer finibus ornare tincidunt.
                        Nullam in dictum nulla, at gravida mauris.
                    </p>
                    <span class="date">1h ago</span>
                </article>
                <form action="action_comment.php" method="post">
                    <input type="text" name="comment" placeholder="Your thoughts....">
                    <input type="submit" value="Comment">
                </form>
            </section>
        </article>

        <article class="story">
            <h2>Third Story Title</h2>
            <backg id = "backg"> </backg>
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
                    <p>First Comment Nam sit amet ante ac mi sagittis scelerisque in quis libero. Phasellus vitae mattis elit. Integer finibus ornare tincidunt.
                        Nullam in dictum nulla, at gravida mauris.
                    </p>
                    <span class="date">1m ago</span>
                </article>
                <article class="comment">
                    <span class="user">userName</span>
                    <p>
                        Second Comment amet ante ac mi sagittis scelerisque in quis libero. Phasellus vitae mattis elit. Integer finibus ornare tincidunt.
                        Nullam in dictum nulla, at gravida mauris.
                    </p>
                    <span class="date">1h ago</span>
                </article>
                <form action="action_comment.php" method="post">
                    <input type="text" name="comment" placeholder="Your thoughts....">
                    <input type="submit" value="Comment">
                </form>
            </section>
        </article>

    </section>
<?php } ?>
