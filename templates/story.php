<?php include_once('connection.php'); ?>

<?php function draw_stories() {

    global $db;
    $stmt = $db->prepare('SELECT * FROM Story');
    $stmt->execute();
    $stories = $stmt->fetchAll();

    $paragraphs = explode("\n", $story['fulltext']);
    $categories = explode(",", $story['categories']); ?>
    <section id="stories">
    <?php foreach($stories as $story) {?>
        <article class="story">
            <header>
                <h1><?=$story['title']?></h1>
            </header>
            <?php foreach ($paragraphs as $paragraph) { ?>
                <p><?=$paragraph?></p>
            <?php } ?>
            <footer>
                <span id="categories">
                    <p>
                        <?php foreach ($categories as $category) { ?>
                            <?=$category?>
                        <?php } ?>
                    </p>
                </span>
                <span class="date"><?=date('Y-m-d H:i:s', $article['published']);?></span>
            </footer>
        </article>
    </section>
<?php } ?>
<?php } ?>
