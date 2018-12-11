<?php  ?>

<section id="create_post">
    <form class="create_post" action="actions/action_create_post.php" method="post">
        <select class="channel_selector" name="Channel">
            <?php foreach ($channels as $channel) { ?>
                <option value="<?php $channel ?>"><?php $channel ?></option>
            <?php } ?>
        </select>
        <textarea name="title" rows="1" cols="80" placeholder="Title" required></textarea>
        <textarea name="text" rows="8" cols="80" placeholder="Text optional..."></textarea>
        <input type="submit" name="submit" value="Submit">
    </form>
</section>
