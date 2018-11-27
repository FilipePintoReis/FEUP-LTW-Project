<?php
    include_once('templates/common.php');
    include_once('templates/stories.php');
    include_once('templates/authentication.php');

    draw_header(null);
    draw_login();
    draw_stories_feed();
    draw_footer();
 ?>
