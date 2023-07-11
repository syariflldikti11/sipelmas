<div class="container-fluid" id="container-wrapper">
<div class="row">

	  <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h3 class="m-0 font-weight-bold text-info">Form Tambah Data KK</h3>
                </div>
                <div class="card-body">
                
       <?php echo validation_errors();
                                                       
    echo form_open_multipart('admin/simpan_kk'); ?>
                    <div class="form-group">
                      <label for="exampleInputEmail1">NO KK</label>
                      <input type="text" name="no_kk" class="form-control">
                    
                    </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">Kepala Keluarga</label>
                      <input type="text" name="kepala_keluarga" class="form-control">
                    
                    </div>

                     <div class="form-group">
                      <label for="exampleInputEmail1">Alamat</label>
                      <input type="text" name="alamat_kk" class="form-control">
                    
                    </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">Desa</label>
                      <input type="text" name="desa_kk" class="form-control">
                    
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">RT</label>
                      <input type="text" name="rt_kk" class="form-control">
                    
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Kecamatan</label>
                      <input type="text" name="kecamatan" class="form-control">
                    
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Kabupaten</label>
                      <input type="text" name="kabupaten" class="form-control">
                    
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Kode Pos</label>
                      <input type="text" name="kode_pos" class="form-control">
                    
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Provinsi</label>
                      <input type="text" name="provinsi" class="form-control">
                    
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">File KK</label>
                      <input type="file" name="foto_kk" class="form-control">
                    
                    </div>
                 
                    <input type="submit" class="btn btn-info" value="Submit">
                  </form>
                </div>
              </div>


         
            </div>
</div>
</div>