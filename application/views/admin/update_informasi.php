<div class="container-fluid" id="container-wrapper">
<div class="row">

	  <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-info">Form Update Informasi</h6>
                </div>
                <div class="card-body">
                
       <?php echo validation_errors();
                                                       
    echo form_open_multipart('admin/simpan_informasi'); ?>
                   
                    
                     <div class="form-group">
                      <input type="hidden" name="id_informasi" value="<?php echo $d['id_informasi']; ?>" class="form-control">
                      <label for="exampleFormControlTextarea1">Isi Informasi</label>
                      <textarea class="form-control" name="isi_informasi" id="exampleFormControlTextarea1" rows="3"><?php echo $d['isi_informasi']; ?></textarea>
                    </div>

                  

                    <div class="form-group">
                    
                      <label for="exampleFormControlTextarea1">File</label>
                        <input type="hidden" name="old_image" value="<?php echo $d['file']; ?>" class="form-control">
                        <input type="file" name="file"  class="form-control">
                      
                    </div>

                    
                 
                    <input type="submit"  class="btn btn-info" value="Submit">
                  </form>
                </div>
              </div>


         
            </div>
</div>
</div>