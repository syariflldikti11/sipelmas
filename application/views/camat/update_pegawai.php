<div class="container-fluid" id="container-wrapper">
<div class="row">

	  <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-info">Form Update Data Pegawai</h6>
                </div>
                <div class="card-body">
                
       <?php echo validation_errors();
                                                       
    echo form_open('admin/update_pegawai'); ?>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama</label>
                         <input type="hidden" value="<?php echo $d['id_pgw'];?>"  name="id_pgw" class="form-control">
                      <input type="text" name="nama_peg" value="<?php echo $d['nama_peg'];?>" class="form-control">
                    
                    </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">NIK</label>
                      <input type="text" name="nik" value="<?php echo $d['nik'];?>" class="form-control">
                    
                    </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">Jabatan</label>
                      <select class="form-control" name="jabatan">
                        <option value="Kepala Desa" <?php if($d['jabatan']=='Kepala Desa') echo 'selected'; ?>>Kepala Desa</option>
                      <option value="Sekretaris Desa" <?php if($d['jabatan']=='Sekretaris Desa') echo 'selected'; ?>>Sekretaris Desa</option>
                        <option value="Kaur Keuangan" <?php if($d['jabatan']=='Kaur Keuangan') echo 'selected'; ?>>Kaur Keuangan</option>
                        <option value="Kaur Keuangan" <?php if($d['jabatan']=='Kaur Umum') echo 'selected'; ?>>Kaur Umum</option>
                        <option value="Kaur Keuangan" <?php if($d['jabatan']=='Kasi Pemerintahan') echo 'selected'; ?>>Kasi Pemerintahan</option>
                        <option value="Kaur Keuangan" <?php if($d['jabatan']=='Kasi Kesejahteraan') echo 'selected'; ?>>Kasi Kesejahteraan</option>
                        <option value="Kaur Keuangan" <?php if($d['jabatan']=='Kaur Pelayanan') echo 'selected'; ?>>Kasi Pelayanan</option>
                      </select>
                    
                    </div>

                     <div class="form-group">
                      <label for="exampleInputEmail1">Alamat</label>
                      <input type="text" name="alamat_peg" value="<?php echo $d['alamat_peg'];?>" class="form-control">
                    
                    </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">No HP</label>
                      <input type="number" name="telp_peg" value="<?php echo $d['telp_peg'];?>" class="form-control">
                    </div>


                    <!------------------------------------------------------------------------------------------------------->
                    
                     <div class="form-group">
                      <label for="exampleInputEmail1">No WA</label>
                      <input type="number" name="wa_peg" value="<?php echo $d['wa_peg'];?>" class="form-control">
                    </div>
                    <!------------------------------------------------------------------------------------------------------->

                    <input type="submit" name="submit" class="btn btn-info" value="Update">
                  </form>
                </div>
              </div>


         
            </div>
</div>
</div>