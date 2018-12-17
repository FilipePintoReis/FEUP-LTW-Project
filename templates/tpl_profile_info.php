<?php

    include_once(dirname(__FILE__) . '/../abs_path.php');
    include_once(ABSPATH . '/database/db_stories.php');
    include_once(ABSPATH . '/includes/session.php');

    $user = get_user_from_username($_SESSION['username']);
    $n_stories_posted = get_number_stories_posted($user['id']);


 ?>

<section class=profile_info>
    <img src="../../avatar_images/avatar.jpg" alt="Literaly Avatar">
    <ul class="social_data">
        <li class="username">
            <h1><?=$user['username']?></h1>
        </li>
        <li class="num_stories_posted">
            <span class="text">
                <span class="number"><?=$n_stories_posted['counter']?></span> stories posted
            </span>
        </li>
    </ul>
    <div class="description">
        <h1><?=$user['fullname']?></h1>
        <br>
        <span><?=$user['bio']?></span>
    </div>
</section>
