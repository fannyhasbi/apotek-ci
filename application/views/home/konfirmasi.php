<div class="box box-primary">
  <div class="box-body">
    <form action="" method="post" class="form-horizontal">
      <div class="form-group"><?= $message; ?></div>

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

      <input type="submit" class="col-sm-offset-2 btn btn-success" name="konfirmasi" value="Konfirmasi">
    </form>
  </div>
</div>