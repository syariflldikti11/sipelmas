<div class="container-fluid" id="container-wrapper">
<div class="row">

	  <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-info">Form Update Data KTP</h6>
                </div>
                <div class="card-body">
                
       <?php echo validation_errors();
                                                       
    echo form_open_multipart('user/update_buat_ktp'); ?>
                    <div class="form-group">
                      <label>NIK</label>
                       <input type="hidden" name="id_buat_ktp" class="form-control" value="<?php echo $d['id_buat_ktp']; ?>" id="exampleInputFirstName">
                      <input type="text" name="nik" class="form-control" value="<?php echo $d['nik']; ?>" id="exampleInputFirstName">
                    </div>
                    
                    <div class="form-group">
                      <label>Nama</label>
                      <input type="text" name="nama" class="form-control" value="<?php echo $d['nama']; ?>" id="exampleInputLastName">
                    </div>
                    <div class="form-group">
                      <label>Alamat</label>
                      <input type="text" name="alamat" class="form-control" value="<?php echo $d['alamat']; ?>" id="exampleInputEmail" aria-describedby="emailHelp"
                        >
                    </div>
                    <div class="form-group">
                      <label>Desa</label>
                      <input type="text" name="desa" class="form-control" value="<?php echo $d['desa']; ?>" id="exampleInputPassword" >
                    </div>
                    <div class="form-group">
                      <label>RT</label>
                      <input type="text" name="rt" class="form-control" value="<?php echo $d['rt']; ?>" id="exampleInputPasswordRepeat"
                        >
                    </div>

                    <div class="form-group">
                      <label>Agama</label>
                      <select class="form-control" name="agama">
                        <option value="Islam" <?php if($d['agama']=='Islam') echo 'selected'; ?>>Islam</option>
                        <option value="Kristen" <?php if($d['agama']=='Kristen') echo 'selected'; ?>>Kristen</option>
                        <option value="Katolik" <?php if($d['agama']=='Katolik') echo 'selected'; ?>>Katolik</option>
                        <option value="Hindu" <?php if($d['agama']=='Hindu') echo 'selected'; ?>>Hindu</option>
                        <option value="Budha" <?php if($d['agama']=='Budha') echo 'selected'; ?>>Budha</option>
                        <option value="Konghucu" <?php if($d['agama']=='Konghucu') echo 'selected'; ?>>Konghucu</option>
                        <option value="Lainnya" <?php if($d['agama']=='Lainnya') echo 'selected'; ?>>Lainnya</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Tempat Lahir</label>
                      <input type="text" name="tempat_lahir" value="<?php echo $d['tempat_lahir']; ?>" class="form-control" id="exampleInputPasswordRepeat"
                        >
                    </div>
                    <div class="form-group">
                      <label>Tanggal Lahir</label>
                      <input type="date" name="tanggal_lahir" value="<?php echo $d['tanggal_lahir']; ?>" class="form-control" id="exampleInputPasswordRepeat"
                        >
                    </div>
                    <div class="form-group">
                      <label>JK</label>
                      <select class="form-control" name="jkelamin">
                        <option value="L" <?php if($d['jkelamin']=='L') echo 'selected'; ?>>Laki-laki</option>
                        <option value="P" <?php if($d['jkelamin']=='P') echo 'selected'; ?>>Perempuan</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Kewarganegaraan</label>
                      <select class="form-control" name="wnegara">
                        <option value="Indonesia" <?php if($d['wnegara']=='Indonesia') echo 'selected'; ?>>Indonesia</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Pekerjaan</label>
                      <input type="text" name="pekerjaan" value="<?php echo $d['pekerjaan']; ?>" class="form-control" id="exampleInputPasswordRepeat"
                        >
                    </div>

                    <div class="form-group">
                      <label>Status Pernikahan</label>
                      <select class="form-control" name="snikah">
                        <option value="Sudah Menikah" <?php if($d['snikah']=='Sudah Menikah') echo 'selected'; ?>>Sudah Menikah</option>
                        <option value="Belum Menikah" <?php if($d['snikah']=='Belum Menikah') echo 'selected'; ?>>Belum Menikah</option>
                        <option value="Duda" <?php if($d['snikah']=='Duda') echo 'selected'; ?>>Duda</option>
                        <option value="Janda" <?php if($d['snikah']=='Janda') echo 'selected'; ?>>Janda</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Upload KK</label>
                      <input type="file" name="kk" class="form-control" id="exampleInputPasswordRepeat"
                        >
                          <input type="hidden" name="old_image" value="<?php echo $d['kk']; ?>" class="form-control">
                    </div>
                     <div class="form-group">
                      <label>Upload Foto</label>
                      <input type="file" name="foto" class="form-control" id="exampleInputPasswordRepeat"
                        >
                          <input type="hidden" name="old_foto" value="<?php echo $d['foto']; ?>" class="form-control">
                    </div>
                 
                    <input type="submit" class="btn btn-info" value="Update">
                  </form>
                </div>
              </div>


         
            </div>
</div>
</div>