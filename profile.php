<?php
    include_once('templates/common.php');
    include_once('templates/profiles.php');
    include_once('templates/stories.php');

    draw_header(null);
    draw_profile(null);
    draw_stories_feed();
    draw_footer();
?>