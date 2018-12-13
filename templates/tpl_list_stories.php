<section id="stories">
    <?php foreach($stories as $story) { ?>
        <article>
            <header>
                <h2><?=$story['name']?></h2>
            </header>
            <div class="story_content">
                <div class="story_title">
                    <h1><a href="story.php?id=<?=$story['id']?>"><?=$story['title']?></a></h1>
                </div>
                <div class="story_image">
                    <h2>Image</h2>
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
            </div>
            <footer>
                <span id="vote">
                    <button type="submit" name="upvote" formaction="action_vote_story.php?id_story=<?=$story['id']?>" formmethod="post"><i class="fas fa-caret-square-up"></i></button>
                    <button type="submit" name="upvote" formaction="action_vote_story.php?id_story=<?=$story['id']?>id_user=1value=-1" formmethod="post"><i class="fas fa-caret-square-down"></i></button>
                    <span id="vote_points">Vote Points</span>
                </span>
                <span id="comment"><a class="comments" href="story.php?id=<?=$story['id']?>#comments">Comment</a></span>
            </footer>
        </article>
    <?php } ?>
</section>
