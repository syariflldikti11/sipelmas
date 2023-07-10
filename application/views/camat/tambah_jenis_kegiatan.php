<div class="container-fluid" id="container-wrapper">
<div class="row">

	  <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h3 class="m-0 font-weight-bold text-info">Form Tambah Data Jenis Kegiatan</h3>
                </div>
                <div class="card-body">
                
       <?php echo validation_errors();
                                                       
    echo form_open('admin/tambah_jenis_kegiatan'); ?>
    

                   
                     <div class="form-group">
                      <label for="exampleInputEmail1">Nama Jenis Kegiatan</label>
                      <input type="text" name="nama_jenis_kegiatan" class="form-control">
        
</div>
                    
               

                 
                    <input type="submit" name="submit" class="btn btn-info" value="Submit">
                  </form>
                </div>
              </div>


         
            </div>
</div>
</div>