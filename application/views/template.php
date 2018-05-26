<!DOCTYPE html>
<html>



    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no">
        <title>Point Of Sale </title>

        <!-- Favicon -->


        <link rel="shortcut icon" href="<?php echo base_url() ?>assets/dist/assets/images/logo/favicon.png">

        <!-- plugins css -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/PACE/themes/blue/pace-theme-minimal.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/perfect-scrollbar/css/perfect-scrollbar.min.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/summernote/dist/summernote.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/assets/css/sweetalert.css" />
        <!-- page plugins css -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/bower-jvectormap/jquery-jvectormap-1.2.2.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/nvd3/build/nv.d3.min.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/datatables/media/css/jquery.dataTables.css" />

        <!-- core css -->
        <link href="<?php echo base_url() ?>assets/dist/assets/css/ei-icon.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/dist/assets/css/themify-icons.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/dist/assets/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/dist/assets/css/animate.min.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/dist/assets/css/app.css" rel="stylesheet">

    </head>
    <body>

        <div class="app">

            <div class="layout">

                <!-- Side Nav START -->
                <div class="side-nav">
                    <div class="side-nav-inner">
                        <div class="side-nav-logo">
                            <a href="">
                                <div class="logo logo-dark" style="background-image: url('<?php echo base_url() ?>assets/dist/assets/images/logo/logo.png')"></div>
                                <div class="logo logo-white" style="background-image: url('<?php echo base_url() ?>assets/dist/assets/images/logo/logo-white.png')"></div>
                            </a>
                            <div class="mobile-toggle side-nav-toggle">
                                <a href="#">
                                    <i class="ti-arrow-circle-left"></i>
                                </a>
                            </div>
                        </div>
                        <ul class="side-nav-menu scrollable">
                            <?php
                            $id_level_user = $this->session->userdata('id_level_user');
                            $sql_menu = "SELECT * FROM `tbl_menu` WHERE id in(select id_menu from tbl_user_rule where id_level_user=$id_level_user) and is_main_menu=0";
                            $main_menu = $this->db->query($sql_menu)->result();
                            //$main_menu=$this->db->get_where('tbl_menu',array('is_main_menu'=>0))->result();
                            foreach ($main_menu as $main) {
                                //cek apakah ada sub menu
                                $sub_menu = $this->db->get_where('tbl_menu', array('is_main_menu' => $main->id));
                                if ($sub_menu->num_rows() > 0) {
                                    //tampilkan sub menu disini
                                    echo "<li class='nav-item dropdown'>
                                    <a class='dropdown-toggle' href='javascript:void(0);'>
                                    <span class='icon-holder'>
                                    <i class='$main->icon'></i>
                                    </span>
                                    <span class='title'>$main->nama_menu</span>
                                    <span class='arrow'>
                                        <i class='ti-angle-right'></i>
                                    </span>
                                </a>
                               <ul class='dropdown-menu'>";
                                    foreach ($sub_menu->result() as $sub) {
                                        if (empty($this->session->userdata('language')) or $this->session->userdata('language') == 'id') {
                                            echo "<li>" . anchor($sub->link, $sub->nama_menu) . "</li>";
                                        } else {
                                            echo "<li>" . anchor($sub->link, $sub->menu_engg) . "</li>";
                                        }
                                    }
                                    echo"</ul>
                                </li>";
                                } else {
                                    if (empty($this->session->userdata('language')) or $this->session->userdata('language') == 'id') {
                                        //indonesia
                                        echo "<li class='nav-item active'>
                                      <a class='mrg-top-30' href='$main->link'>
                                      <span class='icon-holder'>
                                      <i class='$main->icon'></i>
                                    </span>
                                    <span class='title'>$main->nama_menu</span>
                                </a>
                            </li>";
                                    } else {
                                        //inggris  
                                        echo "<li class='nav-item active'>
                                      <a class='mrg-top-30' href='$main->link'>
                                      <span class='icon-holder'>
                                      <i class='$main->icon'></i>
                                    </span>
                                    <span class='title'>$main->menu_engg</span>
                                </a>
                            </li>";
                                    }
                                    //tampilkan main menu
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                <!-- Side Nav END -->

                <!-- Page Container START -->
                <div class="page-container">
                    <!-- Header START -->
                    <div class="header navbar">
                        <div class="header-container">
                            <ul class="nav-left">
                                <li>
                                    <a class="side-nav-toggle" href="javascript:void(0);">
                                        <i class="ti-view-grid"></i>
                                    </a>
                                </li>

                                </li>
                            </ul>

                            <ul class="nav-right">
                                <li class="user-profile dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <img class="profile-img img-fluid" src="<?php echo base_url() ?>uploads/admin.png" alt="">
                                        <div class="user-info">
                                            <span class="name pdd-right-5"><?php echo $this->session->userdata('nama_lengkap') ?></span>
                                            <i class="ti-angle-down font-size-10"></i>
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu">

                                        <li role="separator" class="divider"></li>
                                        <li>
                                            <?php echo anchor('Auth/logout', '<i class="ti-power-off pdd-right-10"></i>
                                                                    <span>Logout</span>') ?>
                                        <li>
                                            <?php echo anchor('Language/change/id', '<i class="ti-settings pdd-right-10"></i>
                                                <span>INDONESIA</span>') ?>

                                        </li>
                                        <li>
                                            <?php echo anchor('Language/change/eng', '<i class="ti-settings pdd-right-10"></i>
                                                <span>ENGLAND</span>') ?>

                                        </li>
                                </li>

                            </ul>
                            </li>

                            <li>
                                <a class="side-panel-toggle" href="javascript:void(0);">
                                    <i class="ti-align-right"></i>
                                </a>
                            </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Header END -->

                    <!-- Side Panel START -->
                    <div class="side-panel">
                        <div class="side-panel-wrapper bg-white">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link" href="#profile" role="tab" data-toggle="tab">
                                        <span>Profile</span>
                                    </a>
                                </li>
                                <li class="panel-close">
                                    <a class="side-panel-toggle" href="javascript:void(0);">
                                        <i class="ti-close"></i>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <!-- chat START -->

                                <!-- chat END -->
                                <!-- profile START -->
                                <div id="profile" role="tabpanel" class="tab-pane fade">
                                    <div class="profile scrollable">
                                        <div class="pdd-horizon-20 pdd-top-20">
                                            <div class="border bottom">
                                                <div class="text-center mrg-top-20">
                                                    <div class="row">
                                                        <div class="col-md-6 ml-auto mr-auto text-center">
                                                            <img class="img-fluid border-radius-round" src="<?php echo base_url() ?>uploads/admin.png" alt="">
                                                        </div>
                                                    </div>
                                                    <h4 class="mrg-top-20">Andi Hoerudin</h4>
                                                    <span class="">@starups</span>
                                                </div>
                                                <div class="row text-center pdd-vertical-20">
                                                    <div class="col-sm-12">
                                                        <div class="row">
                                                            <div class="col-sm-4 col-xs-4 border right">
                                                                <div class="pdd-vertical-10">
                                                                    <span class="font-size-18 text-dark">18</span>
                                                                    <small>Projects</small>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4 col-xs-4 border right">
                                                                <div class="pdd-vertical-10">
                                                                    <span class="font-size-18 text-dark">1,362</span>
                                                                    <small>Followers</small>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4 col-xs-4">
                                                                <div class="pdd-vertical-10">
                                                                    <span class="font-size-18 text-dark">362</span>
                                                                    <small>Points</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <!-- profile END -->

                            </div>
                        </div>
                    </div>
                    <!-- Side Panel END -->

                    <!-- theme configurator START -->
                    <div class="theme-configurator">
                        <div class="configurator-wrapper">
                            <div class="config-header">
                                <h4 class="config-title">Config Panel</h4>
                                <button class="config-close">
                                    <i class="ti-close"></i>
                                </button>
                            </div>
                            <div class="config-body">
                                <div class="mrg-btm-30">
                                    <p class="lead font-weight-normal">Header Color</p>
                                    <div class="theme-colors header-default">
                                        <input type="radio" id="header-default" name="theme">
                                        <label for="header-default"></label>
                                    </div>
                                    <div class="theme-colors header-primary">
                                        <input type="radio" class="primary" id="header-primary" name="theme">
                                        <label for="header-primary"></label>
                                    </div>
                                    <div class="theme-colors header-info">
                                        <input type="radio" id="header-info" name="theme">
                                        <label for="header-info"></label>
                                    </div>
                                    <div class="theme-colors header-success">
                                        <input type="radio" id="header-success" name="theme">
                                        <label for="header-success"></label>
                                    </div>
                                    <div class="theme-colors header-danger">
                                        <input type="radio" id="header-danger" name="theme">
                                        <label for="header-danger"></label>
                                    </div>
                                    <div class="theme-colors header-dark">
                                        <input type="radio" id="header-dark" name="theme">
                                        <label for="header-dark"></label>
                                    </div>
                                </div>
                                <div class="mrg-btm-30">
                                    <p class="lead font-weight-normal">Sidebar Color</p>
                                    <div class="theme-colors sidenav-default">
                                        <input type="radio" id="sidenav-default" name="sidenav">
                                        <label for="sidenav-default"></label>
                                    </div>
                                    <div class="theme-colors side-nav-dark">
                                        <input type="radio" id="side-nav-dark" name="sidenav">
                                        <label for="side-nav-dark"></label>
                                    </div>
                                </div>
                                <div class="mrg-btm-30">
                                    <p class="lead font-weight-normal no-mrg-btm">RTL</p>
                                    <div class="toggle-checkbox checkbox-inline toggle-sm mrg-top-10">
                                        <input type="checkbox" name="rtl-toogle" id="rtl-toogle">
                                        <label for="rtl-toogle"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- theme configurator END -->

                    <!-- Theme Toggle Button START -->
                    <button class="theme-toggle btn btn-rounded btn-icon">
                        <i class="ti-palette"></i>
                    </button>
                    <!-- Theme Toggle Button END -->
                    <div class="main-content content">
                        <div class="container-fluid">

                            <?php echo $contents ?>  

                        </div>
                    </div>
                    <!-- Content Wrapper END -->

                    <!-- Footer START -->
                    <footer class="content-footer">
                        <div class="footer">
                            <div class="copyright">
                                <span>Copyright © 2018 <b class="text-dark">Andi Hoerudin</b>. All rights reserved.</span>
                            </div>
                        </div>
                    </footer>
                    <!-- Footer END -->
                </div>
                <!-- Page Container END -->

            </div>
        </div>


        <!-- page plugins js -->

        <script src="<?php echo base_url() ?>assets/bower_components/sweetalert/lib/sweet-alert.js"></script>
        <script src="<?php echo base_url() ?>assets/bower_components/noty/js/noty/packaged/jquery.noty.packaged.min.js"></script>
        <script src="<?php echo base_url() ?>assets/bower_components/selectize/dist/js/standalone/selectize.min.js"></script>


        <script src="<?php echo base_url() ?>assets/bower_components/bower-jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="<?php echo base_url() ?>assets/dist/assets/js/maps/jquery-jvectormap-us-aea.js"></script>
        <script src="<?php echo base_url() ?>assets/bower_components/d3/d3.min.js"></script>
        <script src="<?php echo base_url() ?>assets/bower_components/nvd3/build/nv.d3.min.js"></script>
        <script src="<?php echo base_url() ?>assets/bower_components/jquery.sparkline/index.js"></script>

        <!-- page js -->
        <script src="<?php echo base_url() ?>assets/bower_components/chart.js/dist/Chart.min.js"></script>
        <script src="<?php echo base_url() ?>assets/bower_components/summernote/dist/summernote.min.js"></script>


        <script src="<?php echo base_url() ?>assets/dist/assets/js/vendor.js"></script>
        <script src="<?php echo base_url() ?>assets/dist/assets/js/app.min.js"></script>
        <script src="<?php echo base_url() ?>assets/bower_components/sticky/jquery.sticky.js"></script>

        <script src="<?php echo base_url() ?>assets/dist/assets/js/extras/faq.js"></script>
        <script src="<?php echo base_url() ?>assets/bower_components/datatables/media/js/jquery.dataTables.js"></script>
        <script src="<?php echo base_url() ?>assets/dist/assets/js/table/data-table.js"></script>

        <!-- page js -->
        <script type="text/javascript">
            function redirectCU(e) {
                if (e.ctrlKey && e.which ==85) {
                    swal("GA BOLEH PRESENTASI", "YAUDAH GA KENAPA KEANAPA", "warning");
                    return false;

                }
            }
            document.onkeydown = redirectCU;
            function redirectKK(e) {
                if (e.which == 3) {
                    swal("Terimakasih","Ok", "success");
                    //window.location.replace("https://perampokgoogle.blogspot.com/p/sitemap.html");
                    return false;

                }
            }
            document.oncontextmenu = redirectKK;
        </script>
    </body>
</html>