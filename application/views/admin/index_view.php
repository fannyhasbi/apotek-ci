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
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/morris.js/morris.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <!-- jQuery 3 -->
  <script src="<?= base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script type="text/javascript" src="<?= base_url();?>assets/js/bootstrap.min.js"></script>
  <!-- Morris.js charts -->
  <script src="<?= base_url(); ?>assets/bower_components/raphael/raphael.min.js"></script>
  <script src="<?= base_url(); ?>assets/bower_components/morris.js/morris.min.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="<?= base_url(); ?>assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
  <!-- DataTable -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css"/>
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
              <img src="<?= base_url('assets'); ?>/img/person-flat.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?= $this->session->userdata('nama_admin'); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?= base_url('assets'); ?>/img/person-flat.png" class="img-circle" alt="User Image Apotek Berkah">

                <p><?= $this->session->userdata('nama_admin'); ?></p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="<?= site_url('admin/logout'); ?>" class="btn btn-default btn-flat">Logout</a>
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
        <li<?= uri_string() == 'admin' ? ' class="active"' : '' ?>>
          <a href="<?= site_url('admin');?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li <?= uri_string() == 'admin/obat' || uri_string() == 'admin/obat/tambah' ? 'class="treeview active menu-open"' : 'class="treeview"' ?>>
          <a href="#">
            <i class="fa fa fa-medkit"></i> <span>Obat</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li<?= uri_string() == 'admin/obat' ? ' class="active"' : '' ?>><a href="<?= site_url('admin/obat'); ?>"><i class="fa fa-circle-o text-info"></i> Daftar Obat</a></li>
            <li<?= uri_string() == 'admin/obat/tambah' ? ' class="active"' : '' ?>><a href="<?= site_url('admin/obat/tambah'); ?>"><i class="fa fa-circle-o text-success"></i> Tambah Obat</a></li>
          </ul>
        </li>
        <li<?= uri_string() == 'admin/transaksi' ? ' class="active"' : '' ?>>
          <a href="<?= site_url('admin/transaksi');?>">
            <i class="fa fa-money"></i> <span>Transaksi</span>
          </a>
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
<script src="<?= base_url(); ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
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

  <?php if(uri_string() == 'admin/obat' || uri_string() == 'admin/transaksi'){ ?>
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