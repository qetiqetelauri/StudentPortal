<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin panel</title>
    <link rel="stylesheet" href="<?php echo base_url();?>/front/css/bracket.css">
    <style media="screen">
      .error_msg{
        color:red;
        font-size: 16px;
        text-align: center;
      }
      .message{
        position: absolute;
        font-weight: bold;
        font-size: 28px;
        color: #6495ED;
        left: 262px;
        width: 500px;
        text-align: center;
      }
    </style>
  </head>

  <body>

    <?php if(validation_errors()) { ?>
      <div class="alert alert-danger">
        <?php echo validation_errors(); ?>
      </div>
    <?php } ?>
    <?php echo form_open('admin/admin_login_process'); ?>
    <?php
      echo "<div class='error_msg'>";
      if (isset($message_display)) {
        echo $message_display;
      }
      echo "</div>";
     ?>
    <div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">

      <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">
        <div class="signin-logo tx-center tx-28 tx-bold tx-inverse"><span class="tx-normal">[</span> Admin <span class="tx-info">Panel</span> <span class="tx-normal">]</span></div>
        <br>
        <form class="" action="index.html" method="post">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Enter your Personal Number" name="pn">
          </div><!-- form-group -->
          <div class="form-group">
            <input type="password" class="form-control" placeholder="Enter your password" name="password">
          </div><!-- form-group -->
          <button type="submit" class="btn btn-info btn-block">Sign In</button>

        </form>

      </div><!-- login-wrapper -->
    </div><!-- d-flex -->
    <?php echo form_close(); ?>

    <script src="<?php echo base_url();?>/front/lib/jquery/jquery.js"></script>
    <script src="<?php echo base_url();?>/front/lib/popper.js/popper.js"></script>
    <script src="<?php echo base_url();?>/front/lib/bootstrap/bootstrap.js"></script>

  </body>
</html>
