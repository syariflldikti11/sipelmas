<div class="container-fluid" id="container-wrapper">
<div class="row">

    <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-info">Form Edit Proposal</h6>
                </div>
                <div class="card-body">
                
       <?php echo validation_errors();
                                                       
    echo form_open_multipart('admin/update_proposal'); ?>
                    <div class="form-group">
                      <label for="exampleInputEmail1">NIK</label>
                       <input type="hidden" name="id_proposal" value="<?php echo $d['id_proposal']; ?>" class="form-control">
                       <select name="id_ktp" class="select2-single form-control" id="select2Single">
                    <?php 
                                       $id_ktp=$d['id_ktp'];
                                        foreach ($dt_ktp as $a): ?>
                     <option value="<?php echo $a['id_ktp']; ?>" <?php if($a['id_ktp']==$id_ktp) { echo ' selected="selected"';}   ?>><?php echo $a['nik']; ?> <?php echo $a['nama']; ?></option>
                   <?php endforeach; ?>
                     </select>
                    
                    </div>
                    
                   
                  
                  
                     <div class="form-group">
                      <label for="exampleInputEmail1">Tanggal Proposal</label>
                      <input type="date" name="tgl_proposal" value="<?php echo $d['tgl_proposal']; ?>" class="form-control">
                    </div>
                 
                      <div class="form-group">
                      <label for="exampleInputEmail1">Mengajukan</label>
                      <input type="text" name="mengajukan" value="<?php echo $d['mengajukan']; ?>" class="form-control">
                    
                    </div>
                     <div class="form-group">
                      <label>File Proposal</label>
                      <input type="file" name="proposal" class="form-control" id="exampleInputPasswordRepeat"
                        >
                        <input type="hidden" name="old_image" value="<?php echo $d['proposal']; ?>" class="form-control">
                    </div>

                     <div class="form-group">
                      <label for="exampleInputEmail1">Telp</label>
                      <input type="text" name="telp" value="<?php echo $d['telp']; ?>" class="form-control">
                    
                    </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">Status</label>
                      <select name="status" class="form-control" >
                  
                     <option value="Proses" <?php if($d['status']=='Proses') echo 'selected'; ?>>Proses</option>
                     <option value="Ditolak" <?php if($d['status']=='Ditolak') echo 'selected'; ?>>Ditolak</option>
                       <option value="Validasi Pimpinan" <?php if($d['status']=='Validasi Pimpinan') echo 'selected'; ?>>Validasi Pimpinan</option>
                     <option value="Diterima" <?php if($d['status']=='Diterima') echo 'selected'; ?>>Diterima</option>
                
                     </select>
                    
                    </div>
                   
                 
                    <input type="submit"  class="btn btn-info" value="Update">
                  </form>
                </div>
              </div>


         
            </div>
</div>
</div>