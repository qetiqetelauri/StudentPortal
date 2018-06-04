<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sign In</title>
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
      a {
        color: white;
        cursor: pointer;
      }
    </style>
  </head>

  <body>

    <?php if(validation_errors()) { ?>
      <div class="alert alert-danger">
        <?php echo validation_errors(); ?>
      </div>
    <?php } ?>
    <?php
      echo "<div class='error_msg'>";
      if (isset($message_display)) {
        echo $message_display;
      }
      echo "</div>";
     ?>
    <div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">
      <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">
        <div class="signin-logo tx-center tx-28 tx-bold tx-inverse"><span class="tx-normal">[</span> Student <span class="tx-info">Portal</span> <span class="tx-normal">]</span></div>
        <br>
        <form class=""  method="post">
          <button type="submit" class="btn btn-info btn-block"> <a href="index.php/student_authentification/index">Student</a> </button>
          <button type="submit" class="btn btn-info btn-block"> <a href="index.php/lecturer_authentification/index">Lecturer</a> </button>

        </form>
      </div><!-- login-wrapper -->
    </div><!-- d-flex -->

    <script src="<?php echo base_url();?>/front/lib/jquery/jquery.js"></script>
    <script src="<?php echo base_url();?>/front/lib/popper.js/popper.js"></script>
    <script src="<?php echo base_url();?>/front/lib/bootstrap/bootstrap.js"></script>

  </body>
</html>
