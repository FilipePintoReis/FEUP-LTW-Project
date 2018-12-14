<?php
    header('Location: ../index.php');

    include_once('./database/db_sotries.php');

    $has_voted = get_story_vote($_GET['id_story'], $_GET['id_user']);

    echo $has_voted;



 ?>
