
<div class="callout callout-info">
  <h4>Konfirmasi Pembayaran</h4>
  <p>Isi data-data dibawah ini dengan valid. Sehingga kami bisa melanjutkan pesanan Anda.</p>
</div>

<?php if($message){ ?>
  <div class="callout callout-info">
    <?= $message; ?>
  </div>
<?php } ?>

<div class="box box-info">
  <div class="box-body">
    <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
      <div class="form-group">
        <label for="kode_pesan" class="col-sm-2 control-label">Kode Pembelian</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="kode_pesan" required autofocus>
        </div>
      </div>
      <div class="form-group">
        <label for="identitas" class="col-sm-2 control-label">No. Identitas</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="identitas" required>
        </div>
      </div>
      <div class="form-group">
        <label for="bukti" class="col-sm-2 control-label">Foto Bukti Pembayaran</label>
        <div class="col-sm-10">
          <input type="file" name="bukti" required>
        </div>
      </div>

      <input type="submit" class="col-sm-offset-2 btn btn-success" name="konfirmasi" value="Kirim">
    </form>
  </div>
</div>
