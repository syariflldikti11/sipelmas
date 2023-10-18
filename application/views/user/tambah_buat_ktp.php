<div class="container-fluid" id="container-wrapper">
<div class="row">

	  <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-info">Form Tambah Pembuatan KTP</h6>
                </div>
                <div class="card-body">
                
       <?php echo validation_errors();
                                                       
    echo form_open_multipart('user/simpan_buat_ktp'); ?>
                    <div class="form-group">
                      <label>NIK</label>
                      <input type="text" name="nik" class="form-control" id="exampleInputFirstName">
                    </div>
                    
                    <div class="form-group">
                      <label>Nama</label>
                      <input type="text" name="nama" class="form-control" id="exampleInputLastName">
                    </div>
                    <div class="form-group">
                      <label>Alamat</label>
                      <input type="text" name="alamat" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp"
                        >
                    </div>
                    <div class="form-group">
                      <label>Desa</label>
                      <input type="text" name="desa" class="form-control" id="exampleInputPassword" >
                    </div>
                    <div class="form-group">
                      <label>RT</label>
                      <input type="text" name="rt" class="form-control" id="exampleInputPasswordRepeat"
                        >
                    </div>
                    <div class="form-group">
                      <label>Agama</label>
                      <select name="agama" class="form-control" >
                        <option value="">--Pilih---</option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                        <option value="Hindu">Konghucu</option>
                        <option value="Budha">Budha</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Tempat Lahir</label>
                      <input type="text" name="tempat_lahir" class="form-control" id="exampleInputPasswordRepeat"
                        >
                    </div>
                    <div class="form-group">
                      <label>Tanggal Lahir</label>
                      <input type="date" name="tanggal_lahir" class="form-control" id="exampleInputPasswordRepeat"
                        >
                    </div>
                    <div class="form-group">
                      <label>JK</label>
                      <select class="form-control" name="jkelamin">
                        <option value="">--Pilih---</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Kewarganegaraan</label>
                      <select class="form-control" name="wnegara">
                        <option value="">--Pilih---</option>
                        <option value="Indonesia">Indonesia</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Pekerjaan</label>
                      <input type="text" name="pekerjaan" class="form-control" id="exampleInputPasswordRepeat"
                        >
                    </div>
                    <div class="form-group">
                      <label>Status Pernikahan</label>
                      <select class="form-control" name="snikah">
                        <option value="">--Pilih---</option>
                        <option value="Sudah Menikah">Sudah Menikah</option>
                        <option value="Belum Menikah">Belum Menikah</option>
                        <option value="Duda">Duda</option>
                        <option value="Janda">Janda</option>
                      </select> 
                    </div>
                    <div class="form-group">
                      <label>Upload KK</label>
                      <input type="file" name="kk" class="form-control" id="exampleInputPasswordRepeat"
                        >
                    </div>
                      <div class="form-group">
                      <label>Pas Foto</label>
                      <input type="file" name="foto" class="form-control" id="exampleInputPasswordRepeat"
                        >
                    </div>
                 
                    <input type="submit" class="btn btn-info" value="Submit">
                  </form>
                </div>
              </div>


         
            </div>
</div>
</div>