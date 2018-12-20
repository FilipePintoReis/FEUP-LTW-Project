<div id="alerts">
  <?php $errors = get_error_messages();foreach ($errors as $err) { ?>
  <div class="alert-top alert-error">
    <div class="small-container">
      <p><?=$error?></p>
    </div>
  </div>
  <?php } ?>
  <?php $successes = get_success_messages();foreach ($successes as $suc) { ?>
  <div class="alert-top alert-success">
    <div class="small-container">
      <p><?=$success?></p>
    </div>
  </div>
<?php } reset_messages(); ?>
</div>
