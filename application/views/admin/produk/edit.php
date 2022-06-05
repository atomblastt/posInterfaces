<div class="row">
  <div class="col-12">
      <div class="card">
          <div class="card-body">
              <!-- <h4 class="header-title"><?= $title ?></h4> -->

              <script type="text/javascript">
              function kategori(){
              var x=document.getElementById('cbkategori').value;
              document.getElementById('kode_produk').value=x;  
              }
              </script>
              <?php

              //error upload
              if(isset($error)){
                echo '<p class="alert alert-warning">';
                echo $error;
                echo '</p>';
              }

                // Notifikasi Error
              echo validation_errors('<div class="alert alert-warning">','</div>');

              // form open
              echo form_open_multipart(base_url('admin/produk/edit/').$produk->product_id,' class="form-horizontal"');
              ?>

                  <div class="form-group form-group-lg">
                    <label class="col-md-12 control-label">Nama Produk</label>
                    <div class="col-md-12">
                      <input type="text" class="form-control" placeholder="Nama Produk" name="nama_produk" value="<?php echo $produk->product_name ?>" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-12 control-label">Kategori Produk</label>
                    <div class="col-md-12">
                      <select class="form-control" data-toggle="select2" data-width="100%" name="id_kategori">
                        <option>Pilih</option>
                        <?php foreach ($kategori as $key) : ?>
                            <option value="<?= $key->category_id ?>" <?php if($key->category_id == $produk->category_id) {echo 'selected';} ?>><?= $key->category_name ?></option>
                          <?php endforeach; ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-12 control-label">Kode Produk</label>
                    <div class="col-md-12">
                      <input type="text" class="form-control" placeholder="Kode Produk" name="kode_produk" id="kode_produk" value="<?php echo $produk->product_code ?>" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-12 control-label">Harga Produk</label>
                    <div class="col-md-12">
                      <input type="number" class="form-control" placeholder="Harga" name="harga" value="<?php echo $produk->price ?>" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-12 control-label">Stok Produk</label>
                    <div class="col-md-12">
                      <input type="number" class="form-control" placeholder="Stok Produk" name="stok" value="<?php echo $produk->stock ?>" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-12 control-label">Keterangan Produk</label>
                    <div class="col-md-12">
                      <textarea name="keterangan" class="form-control" placeholder="Keterangan" id="snow-editor" style="height: 100px;"><?php echo $produk->description ?></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-12 control-label">Uplaod Gambar Produk</label>
                    <div class="col-md-12">
                      <!-- <input type="file" name="gambar" class="form-control" required="required"> -->
                      <input type="file" id="fileuploader" data-plugins="dropify" data-default-file="<?= base_url('assets/upload/image/').$produk->image?>" data-max-file-size="1M" name="gambar" class="form-control" data-allowed-file-extensions="jpg jpeg png" />
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-12 control-label">Status Produk</label>
                    <div class="col-md-2">
                      <select name="status_produk" class="form-control">
                        <option value="Publish">Publikasikan</option>
                        <option value="Draft">Simpan Sebagai Draft</option>
                      </select>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label class="col-md-12 control-label"></label>
                    <div class="col-md-12">
                      <button class="btn btn-success btn-lg" name="submit" type="submit">
                        <i class="fa fa-save"></i>Simpan
                      </button>
                      <button class="btn btn-info btn-lg" name="reset" type="reset">
                        <i class="fa fa-times"></i>Reset
                      </button>
                    </div>
                  </div>

              <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>

<script>

$('.dropify').dropify({
    messages: {
        'default': 'Drag and drop a file here or click',
        'replace': 'Drag and drop or click to replace',
        'remove':  'Remove',
        'error':   'Ooops, something wrong happended.'
    }
});

</script>