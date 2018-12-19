<?php
    include_once(dirname(__FILE__) . '/../abs_path.php');
    include_once(ABSPATH . '/database/db_stories.php');
    include_once(ABSPATH . '/includes/session.php');

    $_SESSION['curr_file'] = basename($_SERVER['PHP_SELF']);

    /*     ---> When user is logged in, present only channels he is subbed to?
    if(!isset($_SESSION['username'])
        $stories = get_all_stories();
    else {
    } */

    $stories = get_all_stories();

    include(ABSPATH . '/templates/common/header.php');
    include(ABSPATH . '/templates/tpl_list_stories.php');
    include(ABSPATH . '/templates/common/aside.php');
    include(ABSPATH . '/templates/common/footer.php');
?>
