<div class="container-fluid" id="container-wrapper">
<div class="row">

	  <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-info">Form Update TTD Laporan</h6>
                </div>
                <div class="card-body">
                
       <?php echo validation_errors();
                                                       
    echo form_open_multipart('admin/update_ttd_laporan'); ?>
                   
                    
                    
                      <input type="hidden" name="id_ttd" value="<?php echo $d['id_ttd']; ?>" class="form-control">
                     

                     <div class="form-group">
                        <label for="exampleInputEmail1">Nama TTD</label>
                        <input type="text" class="form-control"  name="nama_ttd" value="<?php echo $d['nama_ttd']; ?>" required >
                        
                      </div>
                       <div class="form-group">
                        <label for="exampleInputEmail1">NIP</label>
                        <input type="text" class="form-control"  name="nip" value="<?php echo $d['nip']; ?>" required >
                        
                      </div>
                       <div class="form-group">
                        <label for="exampleInputEmail1">Jabatan</label>
                        <input type="text" class="form-control"  name="jabatan" value="<?php echo $d['jabatan']; ?>" required >
                        
                      </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">File</label>
                        <input type="file" class="form-control"  name="file" >
                        
                      </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Lebar TTD</label>
                        <input type="number" class="form-control"  name="lebar" value="<?php echo $d['lebar']; ?>" required >
                        
                      </div>
                      <input type="hidden" class="form-control" value="<?php echo $d['id_ttd']; ?>" name="old_file" required >

                    
                 
                    <input type="submit"  class="btn btn-info" value="Submit">
                  </form>
                </div>
              </div>


         
            </div>
</div>
</div>