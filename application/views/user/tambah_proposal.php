<div class="container-fluid" id="container-wrapper">
<div class="row">

    <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-info">Form Tambah Proposal</h6>
                </div>
                <div class="card-body">
                
       <?php echo validation_errors();
                                                       
    echo form_open_multipart('user/simpan_proposal'); ?>
                    <div class="form-group">
                      <label for="exampleInputEmail1">NIK</label>
                      <select name="id_ktp" class="select2-single form-control" id="select2Single">
                    <?php 
                                      
                                        foreach ($dt_ktp as $d): ?>
                     <option value="<?php echo $d['id_ktp']; ?>"><?php echo $d['nik']; ?> <?php echo $d['nama']; ?></option>
                   <?php endforeach; ?>
                     </select>
                    
                    </div>
                    
                   
                  

                     
                      <div class="form-group">
                      <label for="exampleInputEmail1">Mengajukan</label>
                      <input type="text" name="mengajukan" class="form-control">
                    
                    </div>
                     <div class="form-group">
                      <label>File Proposal / Max 1MB</label>
                      <input type="file" name="proposal" class="form-control" id="exampleInputPasswordRepeat"
                        >
                    </div>

                     <div class="form-group">
                      <label for="exampleInputEmail1">No Telpon/Hp</label>
                      <input type="text" name="telp" class="form-control">
                    
                    </div>
                   
                 
                    <input type="submit"  class="btn btn-info" value="Tambah">
                  </form>
                </div>
              </div>


         
            </div>
</div>
</div>