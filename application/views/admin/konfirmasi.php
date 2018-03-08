
<?php if($message){ ?>
  <div class="callout callout-info">
    <p><?= $message; ?></p>
  </div>
<?php } ?>

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
            <?php if($item->bukti != null){ ?>
              <a href="<?= base_url('foto/bukti/'.$item->bukti); ?>" target="_blank" class="text-info"><i class="fa fa-eye"></i> Bukti</a> |
            <?php } ?>
            <a href="<?= site_url('admin/konfirmasi/'.$item->kode_pesan);?>" class="text-warning"><i class="fa fa-list"></i> Detail</a> |
            <a href="<?= site_url('admin/konfirmasi/'.$item->kode_pesan.'/confirm');?>" class="text-success"><i class="fa fa-check-square"></i> Konfirmasi</a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
