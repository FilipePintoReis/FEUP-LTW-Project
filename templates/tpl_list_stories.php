<section id="stories">
    <?php foreach($stories as $story) { ?>
        <article>
            <header>
                <h2><?=$story['name']?></h2>
            </header>
            <div class="story_content">
                <div class="story_image">
                    <h2>Image</h2>
                </div>
                <div class="story_title">
                    <h1><a href="story.php?id=<?=$story['id']?>"><?=$story['title']?></a></h1>
                </div>
                <div class="story_details">
                    <span id="user">Posted by <?=$story['username']?></span>
                    <span id="date"><?=date('Y-m-d H:i:s', $story['date_posted']);?></span>
                </div>
            </div>
            <footer>
                <span id="vote">
                    <form class="vote" action="action_vote_story.php" method="post">
                        <input type="button" name="Up" value="1">
                        <input type="button" name="Down" value="-1">
                    </form>
                    <span id="vote_points">Vote Points</span>
                </span>
                <span id="comment"><a class="comments" href="story.php?id=<?=$story['id']?>#comments">Comment</a></span>
            </footer>
        </article>
    <?php } ?>
</section>
