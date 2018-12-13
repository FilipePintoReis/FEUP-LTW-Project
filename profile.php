<?php
    include_once('database/connection.php');
    include_once('database/db_stories.php');

    $stories = get_all_stories_from_user(2); 

    include('templates/common/header.php');
    include('templates/profiles.php');
    include('templates/common/footer.php');
?>
