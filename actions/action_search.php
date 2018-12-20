<?php
include_once('../abs_path.php');
include_once(ABSPATH . '/includes/session.php');
include_once(ABSPATH . '/database/db_stories.php');

$_SESSION['curr_file'] = basename($_SERVER['PHP_SELF']);

    $search = "%{$_POST['input']}%";
    $stories = search_story($search);

include(ABSPATH . '/templates/common/header.php');
include(ABSPATH . '/templates/common/alerts.php');
include(ABSPATH . '/templates/tpl_list_stories.php');
include(ABSPATH . '/templates/common/aside.php');
include(ABSPATH . '/templates/common/footer.php');

 ?>
