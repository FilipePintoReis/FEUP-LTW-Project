<?php
    include_once('../abs_path.php');
    include_once(ABSPATH . '/includes/session.php');
    include_once(ABSPATH . '/database/db_stories.php');
    include_once(ABSPATH . '/database/db_user.php');

    if(!isset($_SESSION['username'])){
        die(header('Location: ../pages/login.php'));
    }

    $user = get_id_user_with_username($_SESSION['username']);
    $stories = get_all_stories_from_user($user['id']); // é preciso meter aqui o id do user que se quer ver o profile

    include(ABSPATH . '/templates/common/header.php');
?>
<section class="profile_content">
    <?php
        include(ABSPATH . '/templates/tpl_profile_info.php');
        include(ABSPATH . '/templates/tpl_list_stories.php');
    ?>
</section>
<?php  include(ABSPATH . '/templates/common/footer.php');?>
