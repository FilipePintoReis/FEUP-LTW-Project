<section id="story_content">
    <article>
        <header>
            <h2><?=$story['name']?></h2>
        </header>
        <div class="story_content">
            <div class="story_image">
                <h2>Image</h2>
            </div>
            <div class="story_title">
                <h1><a href="../pages/story.php?id=<?=$story['id']?>"><?=$story['title']?></a></h1>
            </div>
            <div class="story_details">
                <span id="user">Posted by <?=$story['username']?></span>
                <span id="date">
                    <?php   $time = strtotime($story['date_posted']);
                            $dbDate = new DateTime($story['date_posted']);
                            $currDate = new DateTime();
                            $interval = $currDate->diff($dbDate);

                            if($interval->y > 0)
                                $display_time = $interval->y. " years";
                            else if($interval->m > 0)
                                $display_time = $interval->m. " months";
                            else if($interval->d > 0)
                                $display_time = $interval->d. " days";
                            else if($interval->h > 0)
                                $display_time = $interval->h. " hours";
                            else if($interval->i > 0)
                                $display_time = $interval->i. " minutes";
                            else if($interval->s > 0)
                                $display_time = $interval->s. " seconds";
                    ?>
                    <?= $display_time. " ago" ?>
                </span>
            </div>
            <div class="story_text">
                <?php foreach ($paragraphs as $paragraph) {?>
                    <p><?= $paragraph ?></p>
                <?php } ?>
            </div>
        </div>
        <footer>
            <span id="vote">
                <form class="voting_buttons" method="post">
                    <button type="submit" name="upvote" formaction="../actions/action_vote_story.php?id_story=<?=$story['id']?>&type=up" formmethod="post"><i class="fas fa-caret-square-up"></i></button>
                    <button type="submit" name="downvote" formaction="../actions/action_vote_story.php?id_story=<?=$story['id']?>&type=down" formmethod="post"><i class="fas fa-caret-square-down"></i></button>
                </form>
                <span id="vote_points">Vote Points</span>
            </span>
            <span id="comment"><a class="comments" href="story.php?id=<?=$story['id']?>#comments">Comment</a></span>
        </footer>

    </article>
</section>
<section id="story_comments">
    <?php foreach ($comments_result as $comment) {?>
        <p><?= $comment['content'] ?></p>
        <p>by <?= $comment['username'] ?></p>
    <?php } ?>


</section>
