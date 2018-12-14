<?php
    include_once('../abs_path.php');
    include_once(ABSPATH . '/includes/session.php');
    include_once(ABSPATH . '/database/db_stories.php');

    if (!isset($_GET['id']))
        die("No id!");

    $story = get_story_from_id($_GET['id']);
    $paragraphs = explode('\n', $story['content']);

    include(ABSPATH . '/templates/common/header.php');
    include(ABSPATH . '/templates/tpl_story.php');
    include(ABSPATH . '/templates/common/footer.php');
?>
