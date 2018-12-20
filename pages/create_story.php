<?php
    include_once('../abs_path.php');
    include_once(ABSPATH . '/database/db_stories.php');
    include_once(ABSPATH . '/includes/session.php');


    $channels = get_all_channels();

    include(ABSPATH . '/templates/common/header.php');
    include(ABSPATH . '/templates/common/alerts.php');
?>

 <section id="create_post">
     <h1>Create Post</h1>
     <form class="create_post" action='../actions/action_create_post.php' method="post" enctype="multipart/form-data">
         <select class="channel_selector" name="channel">
             <?php foreach ($channels as $channel) { ?>
                 <option value="<?=$channel['name']?>"><?=$channel['name']?></option>
             <?php } ?>
         </select>
         <p></p>
         <textarea name="title" rows="1" cols="80" placeholder="Title" required></textarea>
         <textarea name="text" rows="8" cols="80" placeholder="Text optional..."></textarea>
         <input type="file" name="upfile" id="id_file" accept="image/*">
         <input type="submit" name="submit" value="Submit">
     </form>
 </section>

<?php     include(ABSPATH . '/templates/common/footer.php'); ?>
