<?php

    include_once(dirname(__FILE__) . '/../abs_path.php');
    include_once(ABSPATH . '/database/db_stories.php');
    include_once(ABSPATH . '/includes/session.php');

    $user = get_user_from_username($_SESSION['username']);
    $n_stories_posted = get_number_stories_posted($user['id']);


 ?>

<section class=profile_info>
    <div class="profile_image">
        <img width="150" height="150" src=<?=$user['url']?> alt="Literaly Avatar">
    </div>
    <div class="profile_details">
        <div class="username">
            <span><?= htmlspecialchars($user['username']) ?></span>
            <a class="edit_profile_button" href="../pages/edit_profile.php">
                <button class="button" type="button">Edit Profile</button>
            </a>
        </div>
        <div class="social_data">
            <div class="num_stories_posted">
                <span class="text">
                    <span class="number"><?=$n_stories_posted['counter']?></span> stories posted
                </span>
            </div>
        </div>
        <div class="description">
            <span><?= htmlspecialchars($user['fullname']) ?></span>
            <span><?= htmlspecialchars($user['bio']) ?></span>
        </div>
    </div>
</section>
