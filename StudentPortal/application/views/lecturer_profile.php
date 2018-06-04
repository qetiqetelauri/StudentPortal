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
    <link href="<?php echo base_url();?>/front/lib/highlightjs/github.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/front/lib/highlightjs/github.css" rel="stylesheet">

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
      $foreign_pn = $userdata['foreign_pn'];
      if ($who == "lecturer") {
        $condition = "PN =" . "'" . $pn . "'";
        $this->db->select('*');
        $this->db->from('lecturers');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        $result = $query->result();
      } else {
        $condition = "PN =" . "'" . $pn . "'";
        $this->db->select('*');
        $this->db->from('students');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        $result = $query->result();
      }
      $condition = "PN =" . "'" . $foreign_pn . "'";
      $this->db->select('*');
      $this->db->from('lecturers');
      $this->db->where($condition);
      $query = $this->db->get();
      $result_foreign = $query->result();
     ?>
    <!-- ########## START: LEFT PANEL ########## -->
    <div class="br-logo"><a href=""><span>[</span>student <i>portal</i><span>]</span></a></div>
    <div class="br-sideleft overflow-y-auto">
      <label class="sidebar-label pd-x-10 mg-t-20 op-3">Navigation</label>
      <ul class="br-sideleft-menu">
        <li class="br-menu-item">
          <a href="<?php
            if ($who == "lecturer") {
              $newdata = array(
                'who'  => $who,
                'pn'     => $this_pn,
                'foreign_pn' => $this_pn
              );
              $this->session->set_userdata('logged_in', $newdata);
              echo base_url()."index.php/lecturer_authentification/";
            } else {
              $newdata = array(
                'who'  => $who,
                'pn'     => $pn,
                'foreign_pn' => $pn
              );
              echo base_url()."index.php/student_authentification/";
            }
          ?>profile" class="br-menu-link active">
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
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" ><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" ><i class="icon ion-navicon-round"></i></a></div>
        <div class="pd-10  rounded">
          <ul class="nav nav-gray-600 flex-column flex-sm-row" role="tablist">
            <!-- <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#" role="tab">Home</a></li> -->
            <li class="nav-item"><a class="nav-link"  href="<?php echo base_url();?>/index.php/lecturers" >Lecturers</a></li>
            <li class="nav-item"><a class="nav-link"  href="<?php echo base_url();?>/index.php/universities" >Universities</a></li>
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
                <?php if ($who == "lecturer") {
                  echo form_open('lecturer_authentification/logout');
                } else {
                  echo form_open('student_authentification/logout');
                } ?>
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
          <h4 class="tx-normal tx-roboto tx-inverse"><?php echo $result_foreign[0]->FullName ?></h4>
          <form class="" action="" method="post" id="form_star">
          <?php echo form_open('lecturer_authentification/add_rating'); ?>

            <span class="tx-18 valign-top">
              <input type="text" name="submit_star" id="submit_star" value="" style="display:none;">
              <i class="icon ion-star tx-warning" class="mystar" ></i>
              <i class="icon ion-star tx-warning" class="mystar" ></i>
              <i class="icon ion-star tx-warning" class="mystar" ></i>
              <i class="icon ion-star tx-warning" class="mystar" ></i>
              <i class="icon ion-star tx-warning" class="mystar" ></i>
            </span>

          <?php echo form_close(); ?>
          </form>
          <form class="" action="" id="bliad" method="post">

          </form>
          <p class="mg-b-25">  <?php echo $result_foreign[0]->Email ?></p>
          <p class="mg-b-25">  <?php echo $result_foreign[0]->Birthdate ?></p>
          <p class="mg-b-25">  <?php echo $result_foreign[0]->PhoneNumber ?></p>
          <br>
          <p class="mg-b-0 tx-24">
            <a href="" class="tx-primary mg-r-5"><i class="fa fa-facebook-official"></i></a>
            <a href="" class="tx-info mg-r-5"><i class="fa fa-twitter"></i></a>
            <a href="" class="tx-danger mg-r-5"><i class="fa fa-pinterest"></i></a>
            <a href="" class="tx-danger"><i class="fa fa-instagram"></i></a>
          </p>
          <div class="row no-gutters tx-center">
            <div class="col pd-y-15">
              <p  class="tx-20 tx-bold tx-lato d-block tx-gray-800 hover-info"><?php echo $result_foreign[0]->Email ?></p>
              <small class="tx-10 tx-mont tx-uppercase tx-medium">Contact</small>
            </div><!-- col -->
            <div class="col pd-y-15 bd-l bd-gray-200">
              <p  class="tx-20 tx-bold tx-lato d-block tx-gray-800 hover-info"><?php echo $result_foreign[0]->Profession ?></p>
              <small class="tx-10 tx-mont tx-uppercase tx-medium">Profession</small>
            </div><!-- col -->
            <div class="col pd-y-15 bd-l bd-gray-200">
              <p class="tx-20 tx-bold tx-lato d-block tx-gray-800 hover-info"><?php echo $result_foreign[0]->Title ?></p>
              <small class="tx-10 tx-mont tx-uppercase tx-medium">Title</small>
            </div><!-- col -->
          </div><!-- row -->
          <span class="tx-18 valign-top">

          </span>

            <!-- this modal is static modal for presentation purpose. -->
            <!-- class .d-block annd .pos-relative in .modal is for demo only -->
          <?php echo form_open('lecturer_authentification/add_lecturer_comment'); ?>
          <div class=" tx-center">
            <a href="" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" data-toggle="modal" data-target="#modaldemo1">comment</a>
          </div><!-- pd-y-30 -->
          <div id="modaldemo1" class="modal fade">
            <div class="modal-dialog modal-dialog-vertical-center" role="document">
              <div class="modal-content bd-0 tx-14">
                <div class="modal-header pd-y-20 pd-x-25">
                  <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Comment</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                  <form class="" action="index.html" method="post">
                    <div class="modal-body pd-25">

                    <input type="hidden" name="lecturer_id" value="<?php echo $result_foreign[0]->ID ?>">
                    <p  class="tx-15 tx-bold tx-lato d-block tx-gray-800 hover-info">write comment</p>
                    <textarea rows="3" class="form-control" placeholder="comment" name="lecturer_comment"></textarea>

                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" name="save_lecturer_comment">Save comment</button>
                      <button type="button" class="btn btn-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" data-dismiss="modal">Close</button>
                    </div>
                  </form>
              </div>
            </div><!-- modal-dialog -->
          </div><!-- modal -->
          <?php echo form_close(); ?>

          </div><!-- card-footer -->
        </div><!-- card-body -->


        <div id="accordion" class="accordion" role="tablist" aria-multiselectable="true">
            <div class="card" style="border:0px;">
              <div class="card-header" role="tab" id="headingOne">
                <h6 class="mg-b-0">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="tx-gray-800 transition">
                    Show All Comments
                  </a>
                </h6>
              </div><!-- card-header -->

              <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                <div class="card-block pd-20">
                  <div class="card shadow-base widget-5">
                    <div class="card-header">
                      <span>Comments</span>
                    </div><!-- card-header -->
                    <div class="list-group list-group-flush">
                      <?php
                        $lecturerid = $result_foreign[0]->ID;
                        $condition = "LecturerID =" . "'" . $lecturerid . "'";
                        $this->db->select('*');
                        $this->db->from('comments');
                        $this->db->where($condition);
                        $query = $this->db->get();
                        if ($query->num_rows() != 0) {
                          foreach ($query->result() as $row)
                          {
                            $dt = $row->date;
                            $comment =  $row->Comment; ?>
                            <a href="" class="list-group-item list-group-item-action media">
                              <img src="http://via.placeholder.com/280x280" alt="">
                              <div class="media-body">
                                <div class="msg-top">
                                  <span><?php echo $comment ?></span>
                                  <span><?php echo $dt ?></span>
                                </div>
                                <p class="msg-summary"></p>
                              </div><!-- media-body -->
                            </a><!-- list-group-item -->
                          <?php }
                        }
                       ?>
                    </div><!-- list-group -->
                  </div><!-- card -->
              </div>
            </div>
          </div><!-- accordion -->
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

    <script src="<?php echo base_url();?>/front/js/bracket.js"></script>
    <script>
      $(function(){
        'use strict'

        // showing modal with effect
        $('.modal-effect').on('click', function(){
          var effect = $(this).attr('data-effect');
          $('#modaldemo1').addClass(effect, function(){
            $('#modaldemo1').modal('show');
          });
          return false;
        });

        // hide modal with effect
        $('#modaldemo1').on('hidden.bs.modal', function (e) {
          $(this).removeClass (function (index, className) {
              return (className.match (/(^|\s)effect-\S+/g) || []).join(' ');
          });
        });
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
      function addStars(star) {
        var x = document.getElementById("submit_star");
        x.setAttribute("value", star);
        document.getElementById("form_star").submit();
      }
    </script>

  </body>
</html>
