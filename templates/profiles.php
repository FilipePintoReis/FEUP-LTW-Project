<section id="profile">
    <h2> <?=$stories[0]['username']?> </h2> <!-- Estou a user a variável como $stories para poder reaproveitar o tpl_list_stories -->
    <img src="images/derp.png" alt="tHe dErPz">
    <section>
        <p>
            <?=$stories[0]['bio']?> 
        </p>
</section>


<?php
    include_once('tpl_list_stories.php'); 
?>

