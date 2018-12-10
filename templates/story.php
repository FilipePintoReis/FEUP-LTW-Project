<?php include_once('connection.php'); ?>

<?php function draw_stories() {

    global $db;
    $stmt = $db->prepare('SELECT * FROM Story');
    $stmt->execute();
    $stories = $stmt->fetchAll();

    
    ?>
    <section id="stories">
    <?php foreach($stories as $story) {
        $story_id = $story['id_story']; 
        $stmt = $db->prepare('SELECT * FROM Comment WHERE (Comment.id_story = ? AND Comment.id_parent == NULL)');
        $stmt->execute(array($story_id));
        $comments = $stmt->fetchAll();?>

        <article class="story">
            <h1><?=$story['title']?></h1>
            <p><?=$story['content']?></p>
            <section class="comments">
            <?php foreach($comments as $comment) { ?>
                <article class="comment">
                <span class="user">userName</span>
                <p><?=$comment['content']?></p>
                <span class="date">1m ago</span>
            </article>
            <?php } ?>
                <form action="action_comment.php" method="post">
                    <input type="text" name="comment" placeholder="Thought this was juicy?">
                    <input type="submit" value="Comment">
                </form>
            </section>
        </article>


        <article class="story">
            <header>
                <h1><?=$story['title']?></h1>
            </header>
            <footer>
                
                <span class="date"><?=date('Y-m-d H:i:s', $story['date_posted']);?></span>
            </footer>
        </article>
    </section>
<?php } ?>
<?php } ?>
