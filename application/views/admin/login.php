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
  <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/plugins/iCheck/square/blue.css">
  <script type="text/javascript" src="<?= base_url();?>assets/js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="<?= base_url();?>assets/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?= base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- <body> -->

<body class="hold-transition login-page">
 
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>Login</b>&nbsp;Admin</a>
  </div>
 
  <div class="login-box-body">
    <p class="login-box-msg">Login hanya untuk Admin saja</p>

    <form action="" method="post">
      <div class="form-group has-feedback">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username" required autofocus>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <label for="password">Kata Sandi</label>
        <input type="password" class="form-control" name="password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group">
        <input type="submit" class="btn btn-info" name="login" value="Masuk">
      </div>
    </form>
    <?= $message; ?>
  </div>

</div>

</body>
</html>