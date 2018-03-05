<!DOCTYPE html>
<html>
<head>
  <title>Apotek Berkah</title>
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css');?>">

  <style>
    body{
      margin: 0;
      padding: 0;
      height: 100%;
      width: 100%;
      color: #fff;
      overflow-y: hidden;
    }
    .vertical-center{
      min-height: 100%; /*Fallback for browsers do NOT support vh unit*/
      min-height: 100vh; /* These two lines are counted as one :-)       */
      text-align: center;
      display: flex;
      align-items: center;
      background-color: #4cb5f5;
    }
    h1{
      margin-bottom: 20px;
      color: #fff;
    }
    hr{
      padding: 0;
      border: none;
      border-top: 5px solid #fff;
      color: #fff;
      text-align: center;
      margin: 0px auto;
      width: 200px;
      height: 10px;
      z-index: -10;
    }
    .haz-btn{
      background-color: rgb( 255, 255, 255 );
      position: relative;
      display: inline-block;
      width: 358px;
      padding: 5px;
      z-index: 5;
      font-size: 25px;
      margin:0 auto;
      color:#4cb5f5;
      text-decoration: none;
      margin-right: 10px
    }
    .haz-btn:hover{
      color: #33cc99;
      text-decoration: none;
    }
  </style>
</head>
<body>
  <div class="jumbotron vertical-center">
    <div class="container">
      <h1>APOTEK BERKAH</h1>
      <hr>
      <h3>SITUS PEMBELIAN OBAT TERPERCAYA</h3>
      <a href="<?= site_url('obat'); ?>" class="haz-btn">LIHAT OBAT</a>
    </div>
  </div>
</body>
</html>