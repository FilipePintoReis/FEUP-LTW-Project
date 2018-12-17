<?php
    include_once('../abs_path.php');
    include_once(ABSPATH . '/includes/session.php');
    include_once(ABSPATH . '/database/db_stories.php');
    include_once(ABSPATH . '/database/db_user.php');

    if(!isset($_SESSION['username'])) {
        $_SESSION['error_messages'][] = 'You need to be logged in to vote!';
        die(header('Location: ../pages/login.php'));
    }

    $new_vote_type = $_GET['type'];
    $id_story = $_GET['id_story'];
    $id_user = get_id_user_with_username($_SESSION['username']);
    $has_voted = get_story_vote($id_story, $id_user['id']);

    switch($has_voted['value']) {
        case '1':
            $old_vote_type = 'up';
            break;
        case '-1':
            $old_vote_type = 'down';
            break;
        default:
            $old_vote_type = 'none';
            break;
    }

    if($old_vote_type == 'none') {
        switch($new_vote_type) {
            case 'up':
                $new_vote = 1;
                break;
            case 'down':
                $new_vote = -1;
                break;
        }
        add_story_vote($id_story, $id_user['id'], $new_vote);
    }
    else if($new_vote_type == $old_vote_type) {
        delete_story_vote($id_story, $id_user['id']);
    }
    if($new_vote_type == 'up'){
        update_story_vote($id_story, $id_user['id'], 1);
    }
    else if($new_vote_type == 'down'){
        update_story_vote($id_story, $id_user['id'], -1);
    }

    header('Location: /pages' . '/' . $_SESSION['curr_file']);
 ?>
