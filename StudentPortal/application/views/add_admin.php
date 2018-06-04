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
      $pn = $userdata['pn'];
      $condition = "pn =" . "'" . $pn . "'";
      $this->db->select('*');
      $this->db->from('admins');
      $this->db->where($condition);
      $this->db->limit(1);
      $query = $this->db->get();
      $result = $query->result();
     ?>
    <!-- ########## START: LEFT PANEL ########## -->
    <div class="br-logo"><a href=""><span>[</span>Admin <i>portal</i><span>]</span></a></div>
    <div class="br-sideleft overflow-y-auto">
      <label class="sidebar-label pd-x-10 mg-t-20 op-3">Navigation</label>
      <ul class="br-sideleft-menu">
        <li class="br-menu-item">
          <a href="" class="br-menu-link ">
            <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
            <span class="menu-item-label">Dashboard</span>
          </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->
        <li class="br-menu-item">
          <a href="<?php echo base_url();?>index.php/admin/add_admin" class="br-menu-link active">
            <i class="menu-item-icon icon ion-ios-list-outline tx-24"></i>
            <span class="menu-item-label">Admins</span>
          </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->
        <li class="br-menu-item">
          <a href="<?php echo base_url();?>index.php/admin/unis" class="br-menu-link">
            <i class="menu-item-icon icon ion-ios-list-outline tx-24"></i>
            <span class="menu-item-label">universities</span>
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
      </div><!-- pd-10 -->
      </div><!-- br-header-left -->
      <div class="br-header-right">
        <nav class="nav">

          <div class="dropdown">
            <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
              <span class="logged-name hidden-md-down"><?php echo $result[0]->PN ?></span>
              <img src="http://via.placeholder.com/500x500" class="wd-32 rounded-circle" alt="">
              <span class="square-10 bg-success"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-header wd-250">
              <div class="tx-center">
                <a href=""><img src="http://via.placeholder.com/500x500" class="wd-80 rounded-circle" alt=""></a>
                <h6 class="logged-fullname">Admin</h6>
                <p>Admin Panel</p>
              </div>
              <ul class="list-unstyled user-profile-nav">
                <li><a href="settings.html"><i class="icon ion-ios-gear"></i> Settings</a></li>
                <?php echo form_open('admin/logout'); ?>
                <li><a href=""><i class="icon ion-power"></i> <button type="submit" class="logout-btn-my" name="logout">Sign Out</button></a></li>
                <?php echo form_close(); ?>
              </ul>
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
        </nav>
      </div><!-- br-header-right -->
    </div><!-- br-header -->



    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
      <div class="br-pagetitle">
        <i class="icon icon ion-ios-bookmarks-outline"></i>
        <div>
          <h4>Admins</h4>
          <p class="mg-b-0">list of Admins</p>
        </div>
      </div><!-- d-flex -->

      <div class="br-pagebody">
        <div class="br-section-wrapper">

          <div class="table-wrapper">
            <?php echo form_open('admin/delete_admin'); ?>
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr >
                  <th class="wd-15p">Personal Number</th>
                  <th class="wd-10p">Remove</th>
                  <th></th>
                </tr>
                </a>
              </thead>
              <tbody>
                <?php
                    $this->db->select('*');
                    $this->db->from('admins');
                    $query = $this->db->get();
                    foreach ($query->result() as $row) {
                      $id = $row->ID;
                      $pn = $row->PN;
                      ?>
                        <tr>
                          <input type="hidden" name="id" value="<?php echo $id ?>">
                          <td><a href="" style="text-decoration: none; color: grey;"><?php echo $pn ?></a></td>
                          <td><button type="submit" class="btn btn-oblong btn-outline-danger">remove</button></td>
                          <td></td>
                        </tr>
                    <?php }
                 ?>
              </tbody>
            </table>
            <?php echo form_close(); ?>
          </div><!-- table-wrapper -->


          <div class="br-pagetitle">
        <i class="icon ion-ios-gear-outline"></i>
        <div>
          <h4>Add new admin</h4>
        </div>
      </div><!-- d-flex -->

      <div class="br-pagebody">
        <div class="br-section-wrapper">
          <?php echo form_open('admin/create_admin'); ?>
          <div class="form-layout form-layout-1">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Personal Number: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="pn"  placeholder="Enter fullname">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Password: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="password" name="password" placeholder="Enter Address">
                </div>
              </div><!-- col-4 -->

            </div><!-- row -->

            <div class="form-layout-footer">
              <button type="submit" class="btn btn-info">Create</button>
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
            <?php echo form_close(); ?>
        </div>
      </div>
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

    <script src="js/bracket.js"></script>
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
