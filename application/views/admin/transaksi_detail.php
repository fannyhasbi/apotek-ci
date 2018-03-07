
<div class="box box-info">
  <div class="box-body">
    <table class="table table-bordered table-striped">
      <tr>
        <th>Nama Obat</th>
        <th>Jumlah</th>
        <th>Harga<small>/pcs</small></th>
        <th>Subtotal</th>
      </tr>
      <?php foreach($detail_pemesanan as $item): ?>
        <tr>
          <td><?= $item->nama; ?></td>
          <td><?= $item->jumlah; ?></td>
          <td><?= number_format($item->harga, 0, ',', '.'); ?></td>
          <td><?= number_format($item->subtotal, 0, ',', '.'); ?></td>
        </tr>
      <?php endforeach; ?>
    </table>

    <div class="row">
      <div class="col-md-6">
        <h4 class="lead">Keterangan Tambahan</h4>
        <?= strlen($pemesanan->keterangan) > 0 ? '<p>'. $pemesanan->keterangan .'</p>' : '<p class="text-muted">Kosong</p>' ?>
      </div>
      <div class="col-md-6">
        <h4 class="lead">Ringkasan Pembelian <small>(<?= $pemesanan->kode_pesan; ?>)</small></h4>
        <table class="table">
          <tr>
            <th>Nama Pemesan:</th>
            <td><?= $pembeli->nama; ?></td>
          </tr>
          <tr>
            <th>Tanggal:</th>
            <td><?= $pemesanan->tanggal; ?></td>
          </tr>
          <tr>
            <th>Total:</th>
            <td><?= 'Rp '. number_format($pemesanan->harga, 0, ',', '.'); ?></td>
          </tr>
          <tr>
            <th>Bukti:</th>
            <?php
            if($pemesanan->bukti == null){
              echo '<td>Belum mengirim bukti</td>';
            }
            else {
              echo '<td><a href="'. base_url('foto/bukti/'.$pemesanan->bukti) .'" target="_blank">Lihat bukti</a></td>';
            }
            ?>
          </tr>
          <?php
          if($pemesanan->status == 'B'){
            $temp_class = 'alert-danger';
            $temp_msg   = 'Belum dibayar';
          }
          elseif($pemesanan->status == 'T'){
            $temp_class = 'alert-warning';
            $temp_msg   = 'Menunggu konfirmasi';
          }
          else {
            $temp_class = 'alert-success';
            $temp_msg   = 'Lunas Dibayar';
          }
          ?>
          <tr class="alert <?= $temp_class; ?>">
            <th>Status:</th>
            <td><?= $temp_msg; ?></td>
          </tr>
        </table>
      </div>
    </div>

    <div class="clearfix"></div>
    <hr>

    <a href="javascript:history.go(-1)" class="btn btn-warning"><i class="fa fa-angle-double-left"></i> Kembali</a>
  </div>
</div>
