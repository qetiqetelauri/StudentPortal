<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Admin panel</title>

    <!-- vendor css -->
    <link href="<?php echo base_url();?>/front/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/front/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/front/lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/front/lib/jquery-switchbutton/jquery.switchButton.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/front/lib/highlightjs/github.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/front/lib/datatables/jquery.dataTables.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/front/lib/select2/css/select2.min.css" rel="stylesheet">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>/front/css/bracket.css">
    <style media="screen">
      .logout-btn-my, .my-btn {
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
      if ($who == "lecturer") {
        $condition = "pn =" . "'" . $pn . "'";
        $this->db->select('*');
        $this->db->from('lecturers');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        $result = $query->result();
      } else {
        $condition = "pn =" . "'" . $pn . "'";
        $this->db->select('*');
        $this->db->from('students');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        $result = $query->result();
      }

     ?>
    <!-- ########## START: LEFT PANEL ########## -->
    <div class="br-logo"><a href=""><span>[</span>Student <i>portal</i><span>]</span></a></div>
    <div class="br-sideleft overflow-y-auto">
      <label class="sidebar-label pd-x-10 mg-t-20 op-3">Navigation</label>
      <ul class="br-sideleft-menu">
        <li class="br-menu-item">
          <a href="<?php
            if ($who == "lecturer") {
               echo base_url()."index.php/lecturer_authentification/";
            } else {
              echo base_url()."index.php/student_authentification/";
            }
          ?>open_profile" class="br-menu-link">
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
            <li class="nav-item"><a class="nav-link active" href="<?php echo base_url();?>/index.php/lecturers/index">Lecturers</a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>/index.php/universities/index" </a></li>
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
                <li><a href=""><i class="icon ion-ios-gear"></i> Settings</a></li>
                <?php
                if ($who == "lecturer") {
                  echo form_open('lecturer_authentification/logout');
                } else {
                  echo form_open('student_authentification/logout');
                }
                 ?>
                <li><a href=""><i class="icon ion-power"></i> <button type="submit" class="logout-btn-my" name="logout">Sign Out</button></a></li>
                <?php echo form_close(); ?>
              </ul>
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
        </nav>
      </div><!-- br-header-right -->
    </div><!-- br-header -->
    <!-- ########## END: HEAD PANEL ########## -->



    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
      <div class="br-pagetitle">
        <i class="icon icon ion-ios-bookmarks-outline"></i>
        <div>
          <h4>Lecturers</h4>
          <p class="mg-b-0">list of Lecturers</p>
        </div>
      </div><!-- d-flex -->

      <div class="br-pagebody">
        <div class="br-section-wrapper">

          <div class="table-wrapper">
            <?php echo form_open('lecturer_authentification/open_profile'); ?>
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr >
                  <th class="wd-15p">Full Name</th>
                  <th class="wd-20p">Profession</th>
                  <th class="wd-15p">Title</th>
                  <th class="wd-10p"></th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $this->db->select('*');
                  $this->db->from('lecturers');
                  $query = $this->db->get();
                  foreach ($query->result() as $row)
                  {
                    $lect_id = $row->ID;
                    $fullname = $row->FullName;
                    $proffesion = $row->Profession;
                    $title = $row->Title; ?>

                      <form class="" action="" method="post">
                        <tr>
                          <input type="hidden" name="this_pn" value="<?php echo $pn ?>">
                          <input type="hidden" name="who" value="<?php echo $who ?>">
                          <td><a style="text-decoration: none; color: grey;"> <button class="my-btn" name="lecturer_id" value="<?php echo $lect_id ?>" type="submit"><?php echo $fullname ?></button></a></td>
                          <td><?php echo $proffesion ?></td>
                          <td><?php echo $title ?></td>
                          <td></td>
                        </tr>
                      </form>

                  <?php }
                 ?>
              </tbody>
            </table>
            <?php echo form_close(); ?>
          </div><!-- table-wrapper -->

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
    <script src="<?php echo base_url();?>/front/lib/highlightjs/highlight.pack.js"></script>
    <script src="<?php echo base_url();?>/front/lib/datatables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url();?>/front/lib/datatables-responsive/dataTables.responsive.js"></script>
    <script src="<?php echo base_url();?>/front/lib/select2/js/select2.min.js"></script>

    <script src="<?php echo base_url();?>/front/js/bracket.js"></script>
    <script>
      $(function(){
        'use strict'
        $('#datatable1').DataTable({
          responsive: true,
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });

        // FOR DEMO ONLY
        // menu collapsed by default during first page load or refresh with screen
        // having a size between 992px and 1299px. This is intended on this page only
        // for better viewing of widgets demo.
        $(window).resize(function(){
          minimizeMenu();
        });
          $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

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
