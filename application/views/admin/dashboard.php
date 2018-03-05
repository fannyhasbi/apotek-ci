
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

<!-- solid sales graph -->
<div class="box box-solid bg-teal-gradient">
  <div class="box-header">
    <i class="fa fa-th"></i>
    <h3 class="box-title">Grafik Penjualan</h3>
  </div>

  <div class="box-body border-radius-none">
    <div class="chart" id="line-chart" style="height: 250px;"></div>
  </div>
</div>

<script>
var line = new Morris.Line({
  element          : 'line-chart',
  resize           : true,
  data             : [
    <?php
    foreach($grafik as $item){
      echo '{ tanggal: \''. $item->tanggal .'\', item1: '. $item->jumlah_obat_terjual .'},';
    }
    ?>
  ],
  xkey             : 'tanggal',
  ykeys            : ['item1'],
  labels           : ['Obat Terjual'],
  lineColors       : ['#efefef'],
  lineWidth        : 2,
  hideHover        : 'auto',
  gridTextColor    : '#fff',
  gridStrokeWidth  : 0.4,
  pointSize        : 4,
  pointStrokeColors: ['#efefef'],
  gridLineColor    : '#efefef',
  gridTextFamily   : 'Open Sans',
  gridTextSize     : 10
});
</script>