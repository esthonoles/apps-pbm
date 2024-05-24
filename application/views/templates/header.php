<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/summernote/summernote-bs4.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/toastr/toastr.min.css">

</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->

    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="<?= base_url() ?>" class="brand-link">
        <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
        <span class="brand-text font-weight-light">Bank PBM</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center">
          <div class="image">
            <img src="<?= base_url('assets/') ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info ">
            <a href="#" class="d-block mt-0"><?= $user['nama'] ?></a>

            <?php if ($user['role_id'] == 1) : ?>
              <sup class="badge badge-warning">administrator</sup>
            <?php elseif ($user['role_id'] == 2) : ?>
              <sup class="badge badge-success">Staff</sup>
            <?php endif; ?>
          </div>
        </div>
        <?php $role_id = $this->session->userdata('role_id') ?>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            <?php if ($user['role_id'] == 1) : ?>
              <li class="nav-item mb-2">
                <a href="<?= base_url('admin/dashboard') ?>" class="nav-link <?php if ($this->uri->segment(2) == 'dashboard') echo 'active' ?>">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/userapp') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'userapp') echo 'active' ?>">
                  <i class="nav-icon fas fa-user-cog"></i>
                  <p>Data Pegawai</p>
                </a>
              <li class="nav-item">
                <a href="<?= base_url('datasampah') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'datasampah') echo 'active' ?>">
                  <i class="nav-icon fas fa-recycle"></i>
                  <p>Data Sampah</p>
                </a>
              <li class="nav-item">
                <a href="<?= base_url('datamember') ?>" class="nav-link
                <?php if ($this->uri->segment(1) == 'datamember') echo 'active' ?>">
                  <i class="nav-icon fas fa-user-plus"></i>
                  <p>Data Nasabah</p>
                </a>
              <li class="nav-item">
                <a href="<?= base_url('transaksi') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'transaksi') echo 'active' ?>">

                  <i class="nav-icon fas fa-exchange-alt"></i>
                  <p>Data Transaksi</p>
                </a>
              <li class="nav-item">
                <a href="" class="nav-link <?php if ($this->uri->segment(1) == 'penjualan') echo 'active' ?>">
                  <i class="nav-icon fas fa-donate"></i>
                  <p>Detail Penjualan</p>
                </a>

              <?php elseif ($user['role_id'] == 2) : ?>
              <li class="nav-item mb-2">
                <a href="<?= base_url('admin/dashboard') ?>" class="nav-link <?php if ($this->uri->segment(2) == 'dashboard') echo 'active' ?>">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('datasampah') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'datasampah') echo 'active' ?>">
                  <i class="nav-icon fas fa-recycle"></i>
                  <p>Data Sampah</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('datamember') ?>" class="nav-link
                <?php if ($this->uri->segment(1) == 'datamember') echo 'active' ?>">
                  <i class="nav-icon fas fa-user-plus"></i>
                  <p>Data Nasabah</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="nav-icon fas fa-exchange-alt"></i>
                  <p>Data Transaksi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="nav-icon fas fa-donate"></i>
                  <p>Detail Penjualan</p>
                </a>
              </li>
            <?php endif; ?>
            <li class="nav-item">
              <a href="<?= base_url('auth/logout') ?>" class="nav-link btn-danger text-white">
                <i class="nav-icon fas  fa-sign-out"></i>
                <p>
                  Logout
                </p>
              </a>
            </li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0"><?= $title ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active"><?= $title ?></li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">