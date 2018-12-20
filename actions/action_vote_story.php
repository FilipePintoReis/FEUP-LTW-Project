<?php
    include_once('../abs_path.php');
    include_once(ABSPATH . '/includes/session.php');
    include_once(ABSPATH . '/database/db_stories.php');
    include_once(ABSPATH . '/database/db_user.php');
    header('Content-Type: application/json');
    
    if(!isset($_SESSION['username'])) {
        $_SESSION['error_messages'][] = 'You need to be logged in to vote!';
        die(header('Location: ../pages/login.php'));
    }
   
   
    $vote_type = $_POST['value'];
    $id_story = $_POST['id_story'];

    
    $id_user = get_id_user_with_username($_SESSION['username']);
    $story_vote = get_story_vote($id_story, $id_user['id']);

    $var = 0;

    if($story_vote == false || $story_vote == null) {
          $var = 1;
        add_story_vote($id_story, $id_user['id'], $vote_type);

    }
    else if($story_vote['value'] == $vote_type) {
         $var = 2;
        delete_story_vote($id_story, $id_user['id']);
    }
    else{
         $var = 3;
        update_story_vote($id_story, $id_user['id'], $vote_type);
    }
  



    $vote_points = get_story_upvotes($id_story)['n_upvotes'] - get_story_downvotes($id_story)['n_downvotes'];
    $user_value = get_story_vote($id_story, $id_user['id']);
    
    //header('Location: /pages' . '/' . $_SESSION['curr_file']);
    echo json_encode( array(
        'votes' => $vote_points,
        'id_story' => $id_story,
        'user_value'=> $user_value
    ));
 ?>
