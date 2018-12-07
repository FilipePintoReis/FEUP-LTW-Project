<section id="stories">
    <?php foreach($stories as $story) { ?>
        <article>
            <header>
                <h2><?=$story['channel']?></h2>
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

                <a class="comments" href="story.php?id=<?=$story['id']?>#comments"></a>
            </footer>
        </article>
    <?php } ?>
</section>
