<?php
  include_once('database/connection.php');
  include_once('database/db_stories.php');
  include_once('templates/common.php');

  $stories = get_all_stories();

  draw_header(null);
  include('templates/tmp_list_stories.php');
  draw_footer();
?>
