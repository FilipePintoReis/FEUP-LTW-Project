<?php

    include_once('templates/common.php');
    include_once('templates/story.php');
    include_once('templates/authentication.php');

    draw_header(null);
    draw_login();
    draw_stories();
    draw_footer();
 ?>
