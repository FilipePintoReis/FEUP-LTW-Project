<section id="story_content">

    <script src="../js/main.js" defer></script>
    <article id=<?=$story['id']?>>
        <header>
            <h2><?=$story['name']?></h2>
        </header>
        <div class="one_story_content">
            <div class="story_image">
                <h2>Image</h2>
            </div>
            <div class="story_title">
                <h1><a href="../pages/story.php?id=<?=$story['id']?>"><?=$story['title']?></a></h1>
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
            <div class="story_text">
                <?php foreach ($paragraphs as $paragraph) {?>
                    <p><?= htmlspecialchars($paragraph) ?></p>
                <?php } ?>
            </div>
        </div>
        <footer>
            <span id="vote">

                <div class="voting_buttons" method="post">
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

            </span>
            <span id="comment"><a class="comments" href="story.php?id=<?=$story['id']?>#comments">Comment</a></span>
        </footer>

    </article>

    <ul id="story_comments">
        <form class="add_comment" action='../actions/action_comment.php' method="post" enctype="multipart/form-data">
                <textarea name="comment_input" rows="3" cols="80" placeholder="Share your thoughts"></textarea>
                <input  type="hidden" name="id_story" value="<?=$story['id']?>">
                <input type="submit" name="submit" value="Submit">
        </form>
        <?php foreach ($comments_result as $comment) {?>
            
            <p><?= htmlspecialchars($comment['content']) ?></p>
            <p>by <?= $comment['username'] ?></p>
            
        <?php } ?>
    </ul>
</section>
