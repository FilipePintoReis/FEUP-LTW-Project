<?php
    include_once('../abs_path.php');
    include_once(ABSPATH . '/includes/session.php');
    include_once(ABSPATH . '/database/db_user.php');

    if (!isset($_SESSION['username'])) {
        die(header('Location: ../pages/' . $_SESSION['curr_file']));
    }

    $user = get_user_from_username($_SESSION['username']);
    echo $user['fullname'];

    include(ABSPATH . '/templates/common/header.php');
    include(ABSPATH . '/templates/common/alerts.php');
 ?>

 <section id="edit_profile">
     <h2>Edit Profile</h2>
     <form method="post" action="../actions/action_edit_profile.php">
            <div>
                <div class="form_parameter">
                    <label for="username">Username</label>
                    <input type="text" name="username" value="<?=$user['username']?>" required>
                </div>
                <div class="form_parameter">
                    <label for="fullname">FullName</label>
                    <?php echo $user['fullname'];?>
                    <input type="text" name="fullname" value="<?=$user['fullname']?>" required>
                </div>
                <div class="form_parameter">
                    <label for="email">Email</label>
                    <input type="email" name="email" value="<?=$user['email']?>" required>
                </div>
                <div class="form_parameter">
                    <label for="bio">Bio</label>
                    <textarea rows="3" cols="20" name="bio" required><?=$user['bio']?></textarea>
                </div>
            </div>
            <div>
                <input class="button_submit" type="submit" value="Edit it">
            </div>
     </form>
     <div class="change_password">
         <a href="./change_password.php">
             <button type="button">Change Password</button>
         </a>
     </div>
 </section>

 <?php     include(ABSPATH . '/templates/common/footer.php'); ?>
