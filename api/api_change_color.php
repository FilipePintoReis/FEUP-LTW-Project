<?php
  include_once('../includes/session.php');
  include_once('../database/db_stories.php');
  header('Content-Type: application/json');



  // Verify if user is logged in
  if (!isset($_SESSION['username']))
    die(json_encode(array('error' => 'not_logged_in')));

  $story_id = $_POST['item_id']; //o que é que tenho de ir buscar aqui?
  $story = getItem($item_id);

  // Verifies if item exists and user is owner
  /*if (!$story || !checkIsListOwner($_SESSION['username'], $story['list_id']))
    die(json_encode(array('error' => 'not_item_owner')));*/
  // Toggles the done state

  toggleItem($item_id);               //meter aqui a função da db_stories relativa atualizar o vote points

  // Gets the item from the database
  $story = getItem($item_id);
  // Returns the item as JSON
  echo json_encode($story);
?>