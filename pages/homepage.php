<?php
    include_once(dirname(__FILE__) . '/../abs_path.php');
    include_once(ABSPATH . '/database/db_stories.php');
    include_once(ABSPATH . '/includes/session.php');

    $_SESSION['curr_file'] = basename($_SERVER['PHP_SELF']);

    switch ($_GET['sort']) {
        case 'upvotes':
            $stories = get_all_stories_by_upvotes();
            break;
        case 'downvotes':
            $stories = get_all_stories_by_downvotes();
            break;
        default:
            $stories = get_all_stories();
            break;
    }

    include(ABSPATH . '/templates/common/header.php');
    include(ABSPATH . '/templates/common/alerts.php');
    include(ABSPATH . '/templates/tpl_list_stories.php');
    include(ABSPATH . '/templates/common/aside.php');
    include(ABSPATH . '/templates/common/footer.php');
?>
