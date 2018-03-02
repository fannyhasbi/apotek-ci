<div class="jumbotron text-center">
  <h2><?= $obat->nama ?><small>(<?= $obat->kode_obat;?>)</small></h2>
</div>

<div class="container-fluid">
  <table class="table table-striped">
    <tbody>
      <tr>
        <td>Bentuk obat</td>
        <td>Dikonsumsi oleh</td>
        <td>Harga<small>/pcs</small></td>
      </tr>
      <tr>
        <td><?= $obat->bentuk;?></td>
        <td><?= $obat->konsumen;?></td>
        <td><?= number_format($obat->harga, 0, ',', '.'); ?></td>
      </tr>
    </tbody>
  </table>

  <h3>Manfaat</h3>
  <p><?= $obat->manfaat;?></p>

  <hr>
  <a href="javascript:history.go(-1)" class="btn btn-warning">Kembali</a>
</div>