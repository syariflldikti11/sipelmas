<div class="container-fluid" id="container-wrapper">
<div class="row">

	  <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-info">Form Update Data KK</h6>
                </div>
                <div class="card-body">
                
       <?php echo validation_errors();
                                                       
    echo form_open_multipart('admin/update_kk'); ?>
                    <div class="form-group">
                      <label for="exampleInputEmail1">NO KK</label>
                       <input type="hidden" name="id_kk" value="<?php echo $d['id_kk']; ?>" class="form-control">
                      <input type="text" name="no_kk" value="<?php echo $d['no_kk']; ?>" class="form-control">
                    
                    </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">Kepala Keluarga</label>
                      <input type="text" name="kepala_keluarga" value="<?php echo $d['kepala_keluarga']; ?>" class="form-control">
                    
                    </div>

                     <div class="form-group">
                      <label for="exampleInputEmail1">Alamat</label>
                      <input type="text" name="alamat_kk" value="<?php echo $d['alamat_kk']; ?>" class="form-control">
                    
                    </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">Desa</label>
                      <input type="text" name="desa_kk" value="<?php echo $d['desa_kk']; ?>" class="form-control">
                    
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">RT</label>
                      <input type="text" name="rt_kk" value="<?php echo $d['rt_kk']; ?>" class="form-control">
                    
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Kecamatan</label>
                      <input type="text" name="kecamatan" value="<?php echo $d['kecamatan']; ?>" class="form-control">
                    
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Kabupaten</label>
                      <input type="text" name="kabupaten" value="<?php echo $d['kabupaten']; ?>" class="form-control">
                    
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Kode Pos</label>
                      <input type="text" name="kode_pos" value="<?php echo $d['kode_pos']; ?>" class="form-control">
                    
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Provinsi</label>
                      <input type="text" name="provinsi" value="<?php echo $d['provinsi']; ?>" class="form-control">
                    
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">File KK</label>
                      <input type="file" name="foto_kk" class="form-control">
                       <input type="hidden" name="old_image" value="<?php echo $d['foto_kk']; ?>" class="form-control">
                    
                    </div>
                 
                    <input type="submit" class="btn btn-info" value="Update">
                  </form>
                </div>
              </div>


         
            </div>
</div>
</div>