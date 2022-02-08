<!DOCTYPE html>
<html lang="en">

<head>
  <title>Sistem Rekomendasi Buku Bacaan Siswa </title>
  <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
  <!-- Meta -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="#">
  <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
  <meta name="author" content="#">
  <!-- Favicon icon -->
  <link rel="icon" href="<?= base_url('assets/dashboard/'); ?>assets\images\logo_buku.ico" type="image/x-icon">
  <!-- Google font-->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
  <!-- Required Fremwork -->
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/dashboard/'); ?>bower_components\bootstrap\css\bootstrap.min.css">
  <!-- feather Awesome -->
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/dashboard/'); ?>assets\icon\feather\css\feather.css">
  <!-- Style.css -->
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/dashboard/'); ?>assets\css\style.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/dashboard/'); ?>assets\css\jquery.mCustomScrollbar.css">
  <!-- datatable -->
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/dashboard/'); ?>bower_components\datatables.net-bs4\css\dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/dashboard/'); ?>assets\pages\data-table\css\buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/dashboard/'); ?>bower_components\datatables.net-responsive-bs4\css\responsive.bootstrap4.min.css">
</head>

<body>
  <!-- Pre-loader start -->
  <div class="theme-loader">
    <div class="ball-scale">
      <div class='contain'>
        <div class="ring">
          <div class="frame"></div>
        </div>
        <div class="ring">
          <div class="frame"></div>
        </div>
        <div class="ring">
          <div class="frame"></div>
        </div>
        <div class="ring">
          <div class="frame"></div>
        </div>
        <div class="ring">
          <div class="frame"></div>
        </div>
        <div class="ring">
          <div class="frame"></div>
        </div>
        <div class="ring">
          <div class="frame"></div>
        </div>
        <div class="ring">
          <div class="frame"></div>
        </div>
        <div class="ring">
          <div class="frame"></div>
        </div>
        <div class="ring">
          <div class="frame"></div>
        </div>
      </div>
    </div>
  </div>
  <!-- Pre-loader end -->
  <div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">

      <nav class="navbar header-navbar pcoded-header">
        <div class="navbar-wrapper">

          <div class="navbar-logo">
            <a class="mobile-menu" id="mobile-collapse" href="#!">
              <i class="feather icon-menu"></i>
            </a>
            <a href="index-1.htm">
              <img class="img-fluid" src="<?= base_url('assets/dashboard/'); ?>assets\images\sampul2.png" alt="Theme-Logo">
            </a>
            <a class="mobile-options">
              <i class="feather icon-more-horizontal"></i>
            </a>
          </div>

          <div class="navbar-container container-fluid">
            <ul class="nav-left">
              <li class="header-search">
                <div class="main-search morphsearch-search">
                  <div class="input-group">
                    <span class="input-group-addon search-close"><i class="feather icon-x"></i></span>
                    <input type="text" class="form-control" value="Maaf Belum Tersedia" readonly>
                    <span class="input-group-addon search-btn"><i class="feather icon-search"></i></span>
                  </div>
                </div>
              </li>
              <li>
                <a href="#!" onclick="javascript:toggleFullScreen()">
                  <i class="feather icon-maximize full-screen"></i>
                </a>
              </li>
            </ul>
            <ul class="nav-right">
              <li class="user-profile header-notification">
                <div class="dropdown-primary dropdown">
                  <div class="dropdown-toggle" data-toggle="dropdown">
                    <img src="<?= base_url('assets/dashboard/'); ?>assets\images\user.jpg" class="img-radius" alt="User-Profile-Image">
                    <span><?= $user['user_name']; ?></span>
                    <i class="feather icon-chevron-down"></i>
                  </div>
                  <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                    <li>
                      <a href="<?= base_url('auth/logout'); ?>">
                        <i class="feather icon-log-out"></i> Logout
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- Sidebar inner chat end-->
      <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
          <nav class="pcoded-navbar">
            <div class="pcoded-inner-navbar main-menu">
              <div class="pcoded-navigatio-lavel">Navigation</div>
              <ul class="pcoded-item pcoded-left-item">
                <?php $sidebar = $this->pst->getSidebar(); ?>
                <?php foreach ($sidebar as $s) : ?>
                  <?php if ($s['user_menu_title'] == $title_sidebar) : ?>
                    <li class="pcoded-hasmenu active pcoded-trigger">
                    <?php else : ?>
                    <li class="pcoded-hasmenu">
                    <?php endif; ?>
                    <a href="javascript:void(0)">
                      <span class="pcoded-micon"><i class="<?= $s['user_menu_icon']; ?>"></i></span>
                      <span class="pcoded-mtext"><?= $s['user_menu_title']; ?></span>
                    </a>
                    <?php
                    $menuID = $s['user_menu_id'];
                    $submenu = $this->pst->getSubmenu($menuID);
                    ?>
                    <ul class="pcoded-submenu">
                      <?php foreach ($submenu as $sm) : ?>
                        <?php if ($sm['user_sub_menu_title'] == $title_submenu) : ?>
                          <li class="active">
                          <?php else : ?>
                          <li class="">
                          <?php endif; ?>
                          <a href="<?= base_url() . $sm['user_sub_menu_url']; ?>">
                            <span class="pcoded-mtext"><?= $sm['user_sub_menu_title']; ?></span>
                          </a>
                          </li>
                        <?php endforeach; ?>
                    </ul>
                    </li>
                  <?php endforeach; ?>
                  <li class="">
                    <a href="<?= base_url('auth/logout'); ?>">
                      <span class="pcoded-micon"><i class="feather icon-menu"></i></span>
                      <span class="pcoded-mtext">Logout</span>
                    </a>
                  </li>
              </ul>
            </div>
          </nav>
          <?= $this->session->flashdata('message'); ?>