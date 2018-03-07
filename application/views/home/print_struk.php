<!DOCTYPE html>
<html>
<head>
  <title>Struk Pembelian | <?= $kode_pesan; ?></title>
  <style>
    @media print{
    @page {
        size: a5 Landscape;
        margin: 0;
    }
}
body{
  font-size: 21px;
}
#kiri{
  text-align: left;
}

  </style>
</head>
<body onload="window.resizeTo(40,30);window.print()">
<center>
  <?php if($detail != NULL): ?>
  <h2><?= $kode_pesan; ?></h2>
  <hr>
  <div class="box box-primary">
    <div class="box-body">
      <table border="1px" cellpadding="2px" cellspacing="0">
        <thead>
          <tr>
            <th>Nama Obat</th>
            <th>Jumlah</th>
            <th>Harga<small>/pcs</small></th>
            <th>Subtotal</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($items as $item): ?>
            <tr>
              <td><?= $item->nama; ?></td>
              <td><?= $item->jumlah; ?></td>
              <td><?= number_format($item->harga, 0, ',', '.'); ?></td>
              <td><?= number_format($item->subtotal, 0, ',', '.') ; ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>

      <div class="col-md-offset-6 col-md-6">
        <h4 class="lead">Ringkasan Pembelian <small>(<?= $kode_pesan; ?>)</small></h4>
        <table id="kiri" class="table">
          <tr>
            <th>Nama Pemesan</th>
            <td>:</td>
            <td><?= $nama; ?></td>
          </tr>
          <tr>
            <th>Tanggal</th>
            <td>:</td>
            <td><?= $tanggal; ?></td>
          </tr>
          <tr>
            <th>Total</th>
            <td>:</td>
            <td><?= $harga; ?></td>
          </tr>
          <tr class="alert <?= $status == 'B' ? 'alert-danger' : 'alert-success' ?>">
            <th>Status</th>
            <td>:</td>
            <td><?= $status == 'B' ? 'Belum dibayar' : 'Lunas dibayar' ?></td>
          </tr>
          <tr>
            <?php if($status == 'B'): ?>
              <td colspan="2">
                <a href="konfirmasi" class="btn btn-success btn-block">KONFIRMASI DISINI</a>
              </td>
            <?php endif; ?>
          </tr>
        </table>
      </div>
    </div>
  </div>
  <?php endif; ?>
  </center>
</body>
</html>