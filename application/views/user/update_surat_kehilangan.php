<div class="container-fluid" id="container-wrapper">
<div class="row">

    <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-info">Form Update Surat Kehilangan</h6>
                </div>
                <div class="card-body">
                
       <?php echo validation_errors();
                                                       
    echo form_open('user/update_surat_kehilangan'); ?>
                    <div class="form-group">
                      <label for="exampleInputEmail1">NIK</label>
                      <input type="hidden" name="id_surat_kehilangan" value="<?php echo $d['id_surat_kehilangan']; ?>" class="form-control">
                      <select name="id_ktp" class="select2-single form-control" id="select2Single">
                    <?php 
                                       $id_ktp=$d['id_ktp'];
                                        foreach ($dt_ktp as $a): ?>
                     <option value="<?php echo $a['id_ktp']; ?>" <?php if($a['id_ktp']==$id_ktp) { echo ' selected="selected"';}   ?>><?php echo $a['nik']; ?> <?php echo $a['nama']; ?></option>
                   <?php endforeach; ?>
                     </select>
                    
                    </div>
                    
                     <div class="form-group">
                      <label for="exampleInputEmail1">Kehilangan</label>
                      <input type="text" name="kehilangan" value="<?php echo $d['kehilangan']; ?>" class="form-control">
                    
                    </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">Tanggal Kehilangan</label>
                      <input type="date" name="tgl_kehilangan" value="<?php echo $d['tgl_kehilangan']; ?>" class="form-control">
                    
                    </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">Tempat</label>
                      <input type="text" name="tempat" value="<?php echo $d['tempat']; ?>" class="form-control">
                    
                    </div>

                   
                    <input type="submit" name="submit" class="btn btn-info" value="Update">
                  </form>
                </div>
              </div>


         
            </div>
</div>
</div>