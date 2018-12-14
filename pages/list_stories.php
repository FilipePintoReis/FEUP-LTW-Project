<?php
    include_once(dirname(__FILE__) . '/../abs_path.php');
    include_once(ABSPATH . '/database/db_stories.php');
    include_once(ABSPATH . '/includes/session.php');

    $stories = get_all_stories();
    //$stories = get_all_stories_from_channel(1);
    //$stories = get_all_stories_from_user(3);

    include(ABSPATH . '/templates/common/header.php');
    include(ABSPATH . '/templates/tpl_list_stories.php');
    include(ABSPATH . '/templates/common/footer.php');
?>
