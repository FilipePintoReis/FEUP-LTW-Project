<?php
  include_once('database/connection.php');
  include_once('database/db_stories.php');

  //$stories = get_all_stories();
  $stories = get_all_stories_from_channel(1);

  include('templates/common/header.php');
  include('templates/tpl_list_stories.php');
  include('templates/common/footer.php');
?>
