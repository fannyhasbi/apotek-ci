<!DOCTYPE html>
<html>
<head>
  <title>Admin | Apotek Berkah</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/main_admin.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/dist/css/skins/skin-green-light.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <!-- jQuery 3 -->
  <script src="<?= base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script type="text/javascript" src="<?= base_url();?>assets/js/bootstrap.min.js"></script>

  <!-- DataTable -->
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css"/>
</head>
<body class="hold-transition skin-green-light sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <a href="<?= site_url('admin');?>" class="logo">
      <span class="logo-mini"><b>A</b>A</span>
      <span class="logo-lg"><b>Admin </b>Apotek</span>
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
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?= base_url('assets'); ?>/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">Alexander Pierce</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?= base_url('assets'); ?>/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  Alexander Pierce - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <aside class="main-sidebar">
    <section class="sidebar">
      <ul class="sidebar-menu" data-widget="tree">
        <li class="treeview">
          <a href="#">
            <i class="fa fa fa-medkit"></i> <span>Daftar Obat</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= site_url('admin/obat'); ?>"><i class="fa fa-circle-o"></i> Daftar Obat</a></li>
            <li><a href="<?= site_url('admin/obat/tambah'); ?>"><i class="fa fa-circle-o"></i> Tambah Obat</a></li>
          </ul>
        </li>
        <li>
          <a href="<?= site_url('admin/transaksi');?>">
            <i class="fa fa-money"></i> <span>Transaksi</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-sign-out"></i> <span>Keluar</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= site_url('admin/logout');?>"><i class="fa fa-check-circle"></i>Ya</a></li>
            <li><a href="#"><i class="fa fa-times-circle"></i>TIdak</a></li>
          </ul>
        </li>
      </ul>
    </section>
  </aside>
  <div class="content-wrapper">
    <section class="content-header">
      <?= isset($view_title) ? '<h1>' . $view_title . '</h1>' : ''; ?>
    </section>
    <section class="content">
      <?php $this->load->view('admin/'. $view_name); ?>
    </section>
  </div>
</div>
<!-- ./wrapper -->

<!-- DataTable -->
<script src="<?= base_url(); ?>/assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>/assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?= base_url();?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url();?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url();?>assets/dist/js/adminlte.min.js"></script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree();
  });

  <?php if(uri_string() == 'admin/obat'){ ?>
    const x = (window.innerWidth > 768) ? false : true;
    $(function() {
      $("#tabeldata").DataTable({
        "scrollX": x,
        "pagingType": "first_last_numbers"
      });
    });

  <?php } ?>
</script>
</body>
</html>