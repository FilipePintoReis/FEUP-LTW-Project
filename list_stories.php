<?php
  include_once('database/connection.php');
  include_once('database/stories.php');
  include_once('templates/common.php');

  $stories = getAllStories();

  draw_header(null);
  include('templates/tmp_list_stories.php');
  draw_footer();
?>
