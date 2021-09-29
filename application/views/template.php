<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="<?=base_url()?>img/logo.png">
  <title>Aplikasi Absensi Pegawai Dispersip</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <!-- =============================================== -->
  <header class="main-header">
    <a href="<?=base_url()?>" class="logo">
      <span class="logo-mini"><b>AP</b></span>
      <span class="logo-lg">Absensi <b>Pegawai</b></span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li>
            <a href="<?= base_url()?>">
              <i class="fa fa-home"> </i>
              Dashboard
              
            </a>
          </li>
          <!-- <li class="dropdown user user-menu">
          </li> -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- =============================================== -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=base_url()?>img/logo.png" alt="User Image">
        </div>
        <div class="pull-left info">
          <br>
          <p style="font-size:18px"><?=ucfirst($this->fungsi->user_login()->username)?></p>
        </div>
      </div>

      <?php if($this->fungsi->user_login()->level == 1) { ?>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Data Master</li>
        <li <?=$this->uri->segment(1) == 'data_pegawai' ? 'class="active"' : '' ?>>
          <a href="<?= site_url('data_pegawai')?>">
            <i class="fa fa-group"></i> <span>Data Pegawai</span>
          </a>
        </li>
        <li <?=$this->uri->segment(1) == 'data_absensi' ? 'class="active"' : '' ?>>
          <a href="<?= site_url('data_absensi')?>">
            <i class="fa fa-pencil-square-o"></i> <span>Absensi</span>
          </a>
        </li>
        <li class="header">Lainnya</li>
        <li <?=$this->uri->segment(1) == 'data_jam' ? 'class="active"' : '' ?>>
          <a href="<?= site_url('data_jam')?>">
            <i class="fa fa-clock-o"></i> <span>Jam Kerja</span>
          </a>
        </li>
        <li <?=$this->uri->segment(1) == 'data_cuti' ? 'class="active"' : '' ?>>
          <a href="<?= site_url('data_cuti')?>">
            <i class="fa fa-calendar-times-o"></i> <span>Cuti</span>
          </a>
        </li>
        <li <?=$this->uri->segment(1) == 'data_izin' ? 'class="active"' : '' ?>>
          <a href="<?= site_url('data_izin')?>">
            <i class="fa fa-user-times"></i> <span>Izin Keluar</span>
          </a>
        </li>
        <li <?=$this->uri->segment(1) == 'data_terlambat' ? 'class="active"' : '' ?>>
          <a href="<?= site_url('data_terlambat')?>">
            <i class="fa fa-exclamation"></i> <span>Keterlambatan</span>
          </a>
        </li>
        <li class="treeview <?=$this->uri->segment(1) == 'laporan' ? 'active' : '' ?>">
          <a href="#">
            <i class="fa fa-print"></i> <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?=$this->uri->segment(2) == 'laporan_pegawai' ? 'class="active"' : '' ?>><a href="<?=site_url('laporan/laporan_pegawai')?>"><i class="fa fa-dot-circle-o"></i> Pegawai</a></li>
            <li <?=$this->uri->segment(2) == 'laporan_absensi' ? 'class="active"' : '' ?>><a href="<?=site_url('laporan/laporan_absensi')?>"><i class="fa fa-dot-circle-o"></i> Absensi</a></li>
            <li <?=$this->uri->segment(2) == 'laporan_cuti' ? 'class="active"' : '' ?>><a href="<?=site_url('laporan/laporan_cuti')?>"><i class="fa fa-dot-circle-o"></i> Cuti</a></li>
            <li <?=$this->uri->segment(2) == 'laporan_izin' ? 'class="active"' : '' ?>><a href="<?=site_url('laporan/laporan_izin')?>"><i class="fa fa-dot-circle-o"></i> Izin</a></li>
            <li <?=$this->uri->segment(2) == 'laporan_terlambat' ? 'class="active"' : '' ?>><a href="<?=site_url('laporan/laporan_terlambat')?>"><i class="fa fa-dot-circle-o"></i> Keterlambatan</a></li>
          </ul>
        </li>
        <li class="header">Pengaturan</li>
        <li <?=$this->uri->segment(1) == 'ganti' ? 'class="active"' : '' ?>>
          <a href="<?= site_url('ganti')?>">
            <i class="fa fa-gear"></i> <span>Data Admin</span>
          </a>
        </li>
        <?php } ?>
        <!-- xx -->

        <?php if($this->fungsi->user_login()->level == 2) { ?>
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">Lainnya</li>
        <?php } ?>
        <li>
          <a href="<?=site_url('login/logout')?>">
            <i class="fa fa-sign-out"></i> <span>Logout</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <script src="<?=base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>

  <!-- =============================================== -->
  <div class="content-wrapper">
    <?=$contents?>
  </div>
  <!-- =============================================== -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2021 <a href="#"></a>.</strong> All rights
    reserved.
  </footer>
</div>

<script src="<?=base_url()?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?=base_url()?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<script src="<?=base_url()?>assets/dist/js/adminlte.min.js"></script>
<script src="<?=base_url()?>assets/dist/js/demo.js"></script>
<script src="<?=base_url()?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script>
  $(document).ready(function() {
    $('#table1').DataTable()
  })
</script>
</body>

</html>