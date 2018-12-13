<?php
    include_once('database/connection.php');
    include_once('database/db_stories.php');

    if (!isset($_GET['id']))
        die("No id!");

    $story = get_story_from_id($_GET['id']);
    $paragraphs = explode('\n', $story['content']);
    $comments_result = get_all_comments_from_story($_GET['id']);
    
    

    include('templates/common/header.php');
    include('templates/tpl_story.php');
    include('templates/common/footer.php');
?>
