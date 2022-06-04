<div class="row">
  <div class="col-12">
      <div class="card">
          <div class="card-body">
            <?php 
            echo validation_errors('<div class="alert alert-warning">','</div>');

            // form open
            echo form_open(base_url('admin/kategori/tambah'),' class="form-horizontal"');
            ?>

            <div class="form-group">
              <label class="col-md-12 control-label">Nama Kategori</label>
              <div class="col-md-12">
                <input type="text" class="form-control" placeholder="Nama Kategori" name="nama_kategori" value="<?php echo set_value('nama_kategori') ?>" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label"></label>
              <div class="col-md-5">
                <button class="btn btn-success btn-lg" name="submit" type="submit">
                  <i class="fa fa-save"></i> Simpan
                </button>
                <button class="btn btn-info btn-lg" name="reset" type="reset">
                  <i class="fa fa-times"></i> Reset
                </button>
              </div>
            </div>

            <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>