<?php
    include_once('../abs_path.php');
    include_once(ABSPATH . '/includes/session.php');
    include_once(ABSPATH . '/database/db_stories.php');

    if (!isset($_GET['id']))
        die("No id!");

    $_SESSION['curr_file'] = basename($_SERVER['PHP_SELF']) . '?id=' . $_GET['id'];
    $story = get_story_from_id($_GET['id']);
    $paragraphs = explode('\n', $story['content']);
    $comments_result = get_all_comments_from_story($_GET['id']);



    include(ABSPATH . '/templates/common/header.php');
    include(ABSPATH . '/templates/tpl_story.php');
    include(ABSPATH . '/templates/common/footer.php');
?>
