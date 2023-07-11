<div class="container-fluid" id="container-wrapper">
<div class="row">

	  <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-info">Form Balas Pengaduan</h6>
                </div>
                <div class="card-body">
                
       <?php echo validation_errors();
                                                       
    echo form_open('operator/update_pengaduan'); ?>
                   
                     <div class="form-group">
                       <input type="hidden" value="<?php echo $d['id_pengaduan'];?>"  name="id_pengaduan" class="form-control">
                      <label for="exampleFormControlTextarea1">Mengadu</label>
                      <textarea readonly class="form-control" id="exampleFormControlTextarea1" rows="3"><?php echo $d['mengadu'];?></textarea>
                    </div>
                     <div class="form-group">
                      <label for="exampleFormControlTextarea1">Balasan</label>
                      <textarea class="form-control" name="balasan" id="exampleFormControlTextarea1" rows="3"><?php echo $d['balasan'];?></textarea>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">No Telpon/Hp</label>
                      <input type="text" name="peng_telpon" value="<?php echo $d['peng_telpon']; ?>" class="form-control">
                    </div>

                    
                    <input type="submit" name="submit" class="btn btn-info" value="Balas">
                  </form>
                </div>
              </div>


         
            </div>
</div>
</div>