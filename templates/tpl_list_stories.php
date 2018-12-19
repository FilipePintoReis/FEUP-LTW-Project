<section id="stories">
    <?php foreach($stories as $story) { ?>
        <article id=<?=$story['id']?>>
            <header class="channel">
                <h2><?=$story['name']?></h2>
            </header>
            <script src="../js/main.js" defer></script>
            <div class="story_content">
                <div class="story_title">
                    <h1><a href="../pages/story.php?id=<?=$story['id']?>"><?= htmlspecialchars($story['title'])?></a></h1>
                </div>
                <div class="story_image">
                    <h2>Image</h2>
                </div>
                <div class="story_details">
                    <span id="user">Posted by <?= htmlspecialchars($story['username']) ?></span>
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
            <footer class="story_footer">
                <span id="vote">

                    <div class="voting_buttons" >
                        <button type="submit" name="upvote" onclick="vote(<?=$story['id']?>, 1)" ><i class="fas fa-caret-square-up"></i></button>
                        <button type="submit" name="downvote" onclick="vote(<?=$story['id']?>, -1)" ><i class="fas fa-caret-square-down"></i></button>
                    </div>

                    <span id="vote_points">
                        Vote Points
                    </span>

                    <span class="vote_points_number">
                        <?php   $upvotes = get_story_upvotes($story['id']);
                        $downvotes = get_story_downvotes($story['id']); ?>
                        <?=intval($upvotes['n_upvotes']) -  intval($downvotes['n_downvotes'])?>
                    </span>
                    
                <span id="comment"><a class="comments" href="story.php?id=<?=$story['id']?>#comments">Comment</a></span>
            </footer>
        </article>
    <?php } ?>
</section>
