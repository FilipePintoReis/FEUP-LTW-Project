<?php
    include_once('../abs_path.php');
    include_once(ABSPATH . '/includes/session.php');
    include_once(ABSPATH . '/database/db_user.php');

    if (!isset($_SESSION['username'])) {
        die(header('Location: ../pages/' . $_SESSION['curr_file']));
    }

    $user = get_user_from_username($_SESSION['username']);

    include(ABSPATH . '/templates/common/header.php');
 ?>

 <section id="change_password">
     <h2>Change Password</h2>
     <form method="post" action="../actions/action_change_password.php">
            <div>
                <div class="form_parameter">
                    <label for="old_password">Old Password</label>
                    <input type="password" name="old_password" placeholder="Hope you haven't forgotten" required>
                </div>
                <div class="form_parameter">
                    <label for="new_password">New Password</label>
                    <input type="password" name="new_password" placeholder="Don't make it easy" required>
                </div>
                <div class="form_parameter">
                    <label for="confirm_password">Confirm New Password</label>
                    <input type="password" name="confirm_password" placeholder="Just to check" required>
                </div>
            </div>
            <div>
                <input class="button_submit" type="submit" value="Change">
            </div>
     </form>
 </section>

 <?php     include(ABSPATH . '/templates/common/footer.php'); ?>
