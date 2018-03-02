<!DOCTYPE html>
<html>
<head>
  <title>Apotek Berkah</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/main.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/dist/css/skins/skin-blue-light.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <!-- jQuery 3 -->
  <script src="<?= base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script type="text/javascript" src="<?= base_url();?>assets/js/bootstrap.min.js"></script>

  <!-- DataTable -->
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css"/>
</head>
<body class="hold-transition skin-blue-light sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <a href="<?= base_url(); ?>" class="logo">
      <span class="logo-mini"><b>A</b>B</span>
      <span class="logo-lg"><b>Apotek&nbsp;</b>Berkah</span>
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
        </ul>
      </div>
    </nav>
  </header>
  <aside class="main-sidebar">
    <section class="sidebar">
      <ul class="sidebar-menu" data-widget="tree">
        <li>
          <a href="<?= site_url('konfirmasi');?>">
            <i class="fa fa-check-square-o"></i><span>KONFIRMASI PEMBAYARAN</span>
          </a>
        </li>
        <li>
          <a href="<?= site_url('cek');?>">
            <i class="fa fa-list-alt"></i><span>CEK PEMBELIAN</span>
          </a>
        </li>
        <li>
          <a href="<?= site_url('obat');?>">
            <i class="fa fa-plus-square"></i> <span>DAFTAR OBAT</span>
          </a>
        </li>
        <li>
          <a href="<?= site_url('beli');?>">
            <i class="fa fa-cart-plus"></i> <span>BELI</span>
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
      <?php $this->load->view('home/'. $view_name); ?>
    </section>
  </div>
  <div class="control-sidebar-bg"></div>
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
    $('.sidebar-menu').tree()
  });

  <?php if(uri_string() == 'obat'){ ?>

    $(function() {
      $("#tabeldata").DataTable({
        "pagingType": "first_last_numbers"
      });
    })

  <?php } ?>
</script>
</body>
</html>