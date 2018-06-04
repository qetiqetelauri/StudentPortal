<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Profile</title>

    <!-- vendor css -->
    <link href="<?php echo base_url();?>/front/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/front/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/front/lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/front/lib/jquery-switchbutton/jquery.switchButton.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/front/lib/rickshaw/rickshaw.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/front/lib/select2/css/select2.min.css" rel="stylesheet">
    <!-- Bracket CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>/front/css/bracket.css">
    <style media="screen">
      .logout-btn-my {
        background: none;
        color: inherit;
        border: none;
        padding: 0;
        font: inherit;
        cursor: pointer;
        outline: inherit;
      }
    </style>
  </head>

  <body>
    <?php
      $userdata = $_SESSION['logged_in'];
      $who = $userdata['who'];
      $pn = $userdata['pn'];
      $condition = "pn =" . "'" . $pn . "'";
      $this->db->select('*');
      $this->db->from('students');
      $this->db->where($condition);
      $this->db->limit(1);
      $query = $this->db->get();
      $result = $query->result();
      $UniID = $result[0]->UniversityID;
      $condition = "ID =" . "'" . $UniID . "'";
      $this->db->select('*');
      $this->db->from('universities');
      $this->db->where($condition);
      $this->db->limit(1);
      $query = $this->db->get();
      $result2 = $query->result();
      $universityName = $result2[0]->FullName;
     ?>
    <!-- ########## START: LEFT PANEL ########## -->
    <div class="br-logo"><a href=""><span>[</span>student <i>portal</i><span>]</span></a></div>
    <div class="br-sideleft overflow-y-auto">
      <label class="sidebar-label pd-x-10 mg-t-20 op-3">Navigation</label>
      <ul class="br-sideleft-menu">
        <li class="br-menu-item">
          <a href="" class="br-menu-link active">
            <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
            <span class="menu-item-label">Profile</span>
          </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->
        <li class="br-menu-item">
          <a href="" class="br-menu-link">
            <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
            <span class="menu-item-label">Settings</span>
          </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->
      </ul><!-- br-sideleft-menu -->
      <br>
    </div><!-- br-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    <div class="br-header">
      <div class="br-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="pd-10  rounded">
          <ul class="nav nav-gray-600 flex-column flex-sm-row" role="tablist">
            <!-- <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#" role="tab">Home</a></li> -->
            <li class="nav-item"><a class="nav-link"  href="<?php echo base_url();?>/index.php/lecturers/index" >Lecturers</a></li>
            <li class="nav-item"><a class="nav-link"  href="<?php echo base_url();?>/index.php/universities/index" >Universities</a></li>
    <!-- more menu here -->
          </ul>
      </div><!-- pd-10 -->
      </div><!-- br-header-left -->
      <div class="br-header-right">
        <nav class="nav">

          <div class="dropdown">
            <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
              <span class="logged-name hidden-md-down"><?php echo $result[0]->FullName ?></span>
              <img src="http://via.placeholder.com/500x500" class="wd-32 rounded-circle" alt="">
              <span class="square-10 bg-success"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-header wd-250">
              <div class="tx-center">
                <a href=""><img src="http://via.placeholder.com/500x500" class="wd-80 rounded-circle" alt=""></a>
                <h6 class="logged-fullname"><?php echo $result[0]->FullName ?></h6>
                <p><?php echo $result[0]->Email ?></p>
              </div>
              <ul class="list-unstyled user-profile-nav">
                <li><a href=""><i class="icon ion-ios-person"></i> Edit Profile</a></li>
                <li><a href=""><i class="icon ion-ios-gear"></i> Settings</a></li>
                <?php echo form_open('student_authentification/logout'); ?>
                <li><a href=""><i class="icon ion-power"></i> <button type="submit" class="logout-btn-my" name="logout">Sign Out</button></a></li>
                <?php echo form_close(); ?>
              </ul>
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
        </nav>
      </div><!-- br-header-right -->
    </div><!-- br-header -->
    <!-- ########## END: HEAD PANEL ########## -->

    <!-- ########## START: RIGHT PANEL ########## -->
    <!-- ########## END: RIGHT PANEL ########## --->

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
      <div class="card shadow-base bd-0 mg-t-20 widget-4">
        <div class="card-header">
          <div class="hidden-xs-down">
            <a href="" class="mg-r-10"></a>
            <a href=""></a>
          </div>
          <div class="tx-24 hidden-xss-down">
            <a href="" class="mg-r-10"></a>
            <a href=""></a>
          </div>
        </div><!-- card-header -->
        <div class="card-body">
          <div class="card-profile-img">
            <img src="http://via.placeholder.com/500x500" alt="">
          </div><!-- card-profile-img -->
          <h4 class="tx-normal tx-roboto tx-inverse"><?php echo $result[0]->FullName; ?></h4>
          <p class="mg-b-25">  <?php echo $result[0]->Email ?></p>
          <p class="mg-b-25">  <?php echo $result[0]->PhoneNumber ?></p>
          <br>
          <p class="mg-b-0 tx-24">
            <a href="" class="tx-primary mg-r-5"><i class="fa fa-facebook-official"></i></a>
            <a href="" class="tx-info mg-r-5"><i class="fa fa-twitter"></i></a>
            <a href="" class="tx-danger mg-r-5"><i class="fa fa-pinterest"></i></a>
            <a href="" class="tx-danger"><i class="fa fa-instagram"></i></a>
          </p>
          <div class="row no-gutters tx-center">
            <div class="col pd-y-15">
              <p  class="tx-20 tx-bold tx-lato d-block tx-gray-800 hover-info"><?php echo $universityName ?></p>
              <small class="tx-10 tx-mont tx-uppercase tx-medium">Univerisity</small>
            </div><!-- col -->
            <div class="col pd-y-15 bd-l bd-gray-200">
              <p  class="tx-20 tx-bold tx-lato d-block tx-gray-800 hover-info"><?php echo $result[0]->Faculty ?></p>
              <small class="tx-10 tx-mont tx-uppercase tx-medium">Faculty</small>
            </div><!-- col -->
            <div class="col pd-y-15 bd-l bd-gray-200">
              <p class="tx-20 tx-bold tx-lato d-block tx-gray-800 hover-info"><?php echo $result[0]->Degree ?></p>
              <small class="tx-10 tx-mont tx-uppercase tx-medium">Degree</small>
            </div><!-- col -->
            <div class="col pd-y-15 bd-l bd-gray-200">
              <p  class="tx-20 tx-bold tx-lato d-block tx-gray-800 hover-info"><?php echo $result[0]->Course ?></p>
              <small class="tx-10 tx-mont tx-uppercase tx-medium">Course</small>
            </div><!-- col -->
          </div><!-- row -->
          </div><!-- card-footer -->
        </div><!-- card-body -->


    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    <script src="<?php echo base_url();?>/front/lib/jquery/jquery.js"></script>
    <script src="<?php echo base_url();?>/front/lib/popper.js/popper.js"></script>
    <script src="<?php echo base_url();?>/front/lib/bootstrap/bootstrap.js"></script>
    <script src="<?php echo base_url();?>/front/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="<?php echo base_url();?>/front/lib/moment/moment.js"></script>
    <script src="<?php echo base_url();?>/front/lib/jquery-ui/jquery-ui.js"></script>
    <script src="<?php echo base_url();?>/front/lib/jquery-switchbutton/jquery.switchButton.js"></script>
    <script src="<?php echo base_url();?>/front/lib/peity/jquery.peity.js"></script>
    <script src="<?php echo base_url();?>/front/lib/d3/d3.js"></script>
    <script src="<?php echo base_url();?>/front/lib/rickshaw/rickshaw.min.js"></script>
    <script src="<?php echo base_url();?>/front/lib/Flot/jquery.flot.js"></script>
    <script src="<?php echo base_url();?>/front/lib/Flot/jquery.flot.resize.js"></script>
    <script src="<?php echo base_url();?>/front/lib/flot-spline/jquery.flot.spline.js"></script>
    <script src="<?php echo base_url();?>/front/lib/jquery.sparkline.bower/jquery.sparkline.min.js"></script>
    <script src="<?php echo base_url();?>/front/lib/echarts/echarts.min.js"></script>
    <script src="<?php echo base_url();?>/front/lib/select2/js/select2.full.min.js"></script>
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyCuWEQWfVkWfcUoSIZeGw5JioT9LVCwYkE"></script>
    <script src="<?php echo base_url();?>/front/lib/gmaps/gmaps.js"></script>

    <script src="<?php echo base_url();?>/front/js/bracket.js"></script>
    <script src="<?php echo base_url();?>/front/js/map.shiftworker.js"></script>
    <script src="<?php echo base_url();?>/front/js/ResizeSensor.js"></script>
    <script src="<?php echo base_url();?>/front/js/dashboard.js"></script>
    <script>
      $(function(){
        'use strict'

        // FOR DEMO ONLY
        // menu collapsed by default during first page load or refresh with screen
        // having a size between 992px and 1299px. This is intended on this page only
        // for better viewing of widgets demo.
        $(window).resize(function(){
          minimizeMenu();
        });

        minimizeMenu();

        function minimizeMenu() {
          if(window.matchMedia('(min-width: 992px)').matches && window.matchMedia('(max-width: 1299px)').matches) {
            // show only the icons and hide left menu label by default
            $('.menu-item-label,.menu-item-arrow').addClass('op-lg-0-force d-lg-none');
            $('body').addClass('collapsed-menu');
            $('.show-sub + .br-menu-sub').slideUp();
          } else if(window.matchMedia('(min-width: 1300px)').matches && !$('body').hasClass('collapsed-menu')) {
            $('.menu-item-label,.menu-item-arrow').removeClass('op-lg-0-force d-lg-none');
            $('body').removeClass('collapsed-menu');
            $('.show-sub + .br-menu-sub').slideDown();
          }
        }
      });
    </script>
  </body>
</html>
