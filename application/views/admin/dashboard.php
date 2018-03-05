
<div class="row">
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-aqua"><i class="fa fa-medkit"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Obat</span>
        <span class="info-box-number"><?= $dashboard->jumlah_obat; ?></span>
      </div>
    </div>
  </div>

  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-green"><i class="fa fa-address-book-o"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Pembeli</span>
        <span class="info-box-number"><?= $dashboard->jumlah_pembeli; ?></span>
      </div>
    </div>
  </div>

  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-orange"><i class="fa fa-dollar"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Transaksi</span>
        <span class="info-box-number"><?= $dashboard->jumlah_transaksi; ?></span>
      </div>
    </div>
  </div>

  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-red"><i class="fa fa-shopping-cart"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Obat Terjual</span>
        <span class="info-box-number"><?= $dashboard->jumlah_obat_terjual; ?></span>
      </div>
    </div>
  </div>

</div>
