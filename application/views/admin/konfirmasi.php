
<div class="box box-info">
  <div class="box-body">
    <table id="tabeldata" class="table table-striped table-hover">
      <thead>
        <tr>
          <th>#Kode</th>
          <th>Tanggal</th>
          <th>Total</th>
          <th>Pembeli</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($pemesanan as $item): ?>
        <tr>
          <td><?= $item->kode_pesan; ?></td>
          <td><?= $item->tanggal; ?></td>
          <td><?= 'Rp '. number_format($item->harga, 0, ',', '.'); ?></td>
          <td><?= $item->nama ;?></td>
          <td>
            <a href="<?= site_url('admin/konfirmasi/'.$item->kode_pesan);?>" class="text-info"><i class="fa fa-search"></i> Detail</a> | 
            <a href="<?= site_url('admin/konfirmasi/'.$item->kode_pesan.'/confirm');?>" class="text-success"><i class="fa fa-check-square"></i> Konfirmasi</a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
