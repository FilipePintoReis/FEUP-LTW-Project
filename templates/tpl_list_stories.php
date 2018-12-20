<section id="stories">
    <div class="sorting">
        Sorting:
        <a href="../pages/homepage.php?sort=recent">Recent</a>
        <a href="../pages/homepage.php?sort=upvotes">UpVotes</a>
        <a href="../pages/homepage.php?sort=downvotes">DownVotes</a>
    </div>
    <?php foreach($stories as $story) { ?>
        <article id=<?=$story['id']?>>
            <header class="channel">
                <span><?=$story['name']?></span>
            </header>
            <script src="../js/main.js" defer></script>
            <div class="story_content">
                <div class="story_image">
                    <img src=<?=$story['url']?> alt=":/">
                </div>

                <div class="story_text">
                    <div class="story_title">
                        <a href="../pages/story.php?id=<?=$story['id']?>"><?=htmlspecialchars($story['title'])?></a>
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
            </div>
            <footer class="story_footer">
                <span id="vote">

                        <button type="submit" name="upvote" onclick="vote(<?=$story['id']?>, 1)" ><i class="fas fa-caret-square-up"></i></button>

                        <span class="vote_points_number">
                            <?php   $upvotes = get_story_upvotes($story['id']);
                            $downvotes = get_story_downvotes($story['id']); ?>
                            <?=intval($upvotes['n_upvotes']) -  intval($downvotes['n_downvotes'])?>
                        </span>

                        <button type="submit" name="downvote" onclick="vote(<?=$story['id']?>, -1)" ><i class="fas fa-caret-square-down"></i></button>

                </span>
                <span id="comment"><a class="comments" href="story.php?id=<?=$story['id']?>#comments">Comment</a></span>
            </footer>
        </article>
    <?php } ?>
</section>
