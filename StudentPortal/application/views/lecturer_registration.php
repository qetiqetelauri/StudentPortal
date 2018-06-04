<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Sign Up</title>

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>/front/css/bracket.css">
    <link href="<?php echo base_url();?>/front/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/front/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/front/lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">

    <link href="<?php echo base_url();?>/front/lib/rickshaw/rickshaw.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/front/lib/select2/css/select2.min.css" rel="stylesheet">
    <!--  jQuery -->

    <link href="<?php echo base_url();?>/front/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/front/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/front/lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/front/lib/jquery-switchbutton/jquery.switchButton.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/front/lib/highlightjs/github.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/front/lib/select2/css/select2.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/front/lib/jquery-toggles/toggles-full.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/front/lib/jt.timepicker/jquery.timepicker.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/front/lib/spectrum/spectrum.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/front/lib/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/front/lib/ion.rangeSlider/css/ion.rangeSlider.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/front/lib/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet">

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

  <body  class=" bg-br-primary ">

    <?php if(validation_errors()) { ?>
      <div class="alert alert-danger">
        <?php echo validation_errors(); ?>
      </div>
    <?php } ?>
    <?php echo form_open('lecturer_authentification/lecturer_register_action'); ?>
    <?php
      echo "<div class='error_msg'>";
      if (isset($message_display)) {
        echo $message_display;
      }
      echo "</div>";
     ?>
    <div class="d-lg-flex align-items-center justify-content-center bg-br-primary">
      <div class="login-wrapper wd-300 wd-xs-400 pd-25 pd-xs-40 bg-white rounded shadow-base">
        <div class="signin-logo tx-center tx-28 tx-bold tx-inverse"><span class="tx-normal">[</span> Lecturer <span class="tx-info">portal</span> <span class="tx-normal">]</span></div>
        <br>
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Enter your Personal Number" name="pn">
        </div><!-- form-group -->
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Enter your Fullname" name="fullname">
        </div><!-- form-group -->
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Enter your Email" name="email" >
        </div><!-- form-group -->
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Enter your PhoneNumber" name="phonenumber">
        </div><!-- form-group -->
        <div class="form-group">
          <input type="password" class="form-control" placeholder="Enter your password" name="password">
        </div><!-- form-group -->
        <div class="form-group">
          <input type="password" class="form-control" placeholder="Repeat your password" name="confirm_password">
        </div><!-- form-group -->
        <div class="form-group">
          <div class=" mg-b-30">
            <div class="input-group">
              <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
              <input type="text" class="form-control fc-datepicker" placeholder="MM/DD/YYYY" name="birthdate">
            </div>
          </div><!-- wd-200 -->
        </div>
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Enter your Profession" name="profession">
        </div><!-- form-group -->



        <div class="form-group">
          <label class="d-block tx-11 tx-uppercase tx-medium tx-spacing-1">Title</label>
          <div class="row row-xs">
            <div class="col-sm-12">
              <select class="form-control" data-placeholder="Title" name="title">
                <option label="Title"></option>
                <option value="Professor">Professor</option>
                <option value="Associate professor">Associate professor</option>
                <option value="Assistant professor">Assistanst professor</option>
                <option value="Senior Lecturer">Senior Lecturer</option>
                <option value="Lecturer">Lecturer</option>
                <option value="Assistant Lecturer">Assistant Lecturer</option>
              </select>
            </div><!-- col-4 -->
          </div><!-- row -->
        </div><!-- form-group -->


        <div class="form-group tx-12">By clicking the Sign Up button below, you agreed to our privacy policy and terms of use of our website.</div>
        <button type="submit" class="btn btn-info btn-block">Sign Up</button>

        <div class="mg-t-40 tx-center">you are member? <a href="index" class="tx-info">Sign In</a></div>
      </div><!-- login-wrapper -->
    </div><!-- d-flex -->
    <?php echo form_close(); ?>

        <script src="<?php echo base_url();?>/front/lib/jquery/jquery.js"></script>
        <script src="<?php echo base_url();?>/front/lib/popper.js/popper.js"></script>
        <script src="<?php echo base_url();?>/front/lib/bootstrap/bootstrap.js"></script>
        <script src="<?php echo base_url();?>/front/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
        <script src="<?php echo base_url();?>/front/lib/moment/moment.js"></script>
        <script src="<?php echo base_url();?>/front/lib/jquery-ui/jquery-ui.js"></script>
        <script src="<?php echo base_url();?>/front/lib/jquery-switchbutton/jquery.switchButton.js"></script>
        <script src="<?php echo base_url();?>/front/lib/peity/jquery.peity.js"></script>
        <script src="<?php echo base_url();?>/front/lib/highlightjs/highlight.pack.js"></script>
        <script src="<?php echo base_url();?>/front/lib/select2/js/select2.min.js"></script>
        <script src="<?php echo base_url();?>/front/lib/jquery-toggles/toggles.min.js"></script>
        <script src="<?php echo base_url();?>/front/lib/jt.timepicker/jquery.timepicker.js"></script>
        <script src="<?php echo base_url();?>/front/lib/spectrum/spectrum.js"></script>
        <script src="<?php echo base_url();?>/front/lib/jquery.maskedinput/jquery.maskedinput.js"></script>
        <script src="<?php echo base_url();?>/front/lib/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
        <script src="<?php echo base_url();?>/front/lib/ion.rangeSlider/js/ion.rangeSlider.min.js"></script>

    <script>
      $(function(){
        'use strict';

        $('.select2').select2({
          minimumResultsForSearch: Infinity
        });
      });
      // Datepicker
      $('.fc-datepicker').datepicker({
        showOtherMonths: true,
        selectOtherMonths: true
      });

    </script>

  </body>
</html>
