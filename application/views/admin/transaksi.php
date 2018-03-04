
<div class="box box-info">
  <div class="box-body">
    <table id="tabeldata" class="table table-striped table-hover">
      <thead>
        <tr>
          <th>#Kode</th>
          <th>Tanggal</th>
          <th>Total</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($transaksi as $item): ?>
        <tr>
          <td><?= $item->kode_pesan; ?></td>
          <td><?= $item->tanggal; ?></td>
          <td><?= 'Rp '. number_format($item->harga, 0, ',', '.'); ?></td>
          <td><?= $item->status == 'B' ? 'Belum konfirmasi' : 'Lunas' ;?></td>
          <td><a href="<?= site_url('admin/transaksi/'.$item->kode_pesan);?>" class="text-info"><i class="fa fa-search"></i> Detail</a></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
