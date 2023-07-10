<div class="container-fluid" id="container-wrapper">
<div class="row">

	  <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h3 class="m-0 font-weight-bold text-info">Form Tambah Data Pegawai</h3>
                </div>
                <div class="card-body">
                
       <?php echo validation_errors();
                                                       
    echo form_open('admin/tambah_pegawai'); ?>
     <div class="form-group">
                      <label for="exampleInputEmail1">NIK</label>
                      <input type="text" name="nik" class="form-control">
                    
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama</label>
                      <input type="text" name="nama_peg" class="form-control">
                    
                    </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">Jabatan</label>
                      <select name="jabatan" class="form-control" >
                        <option value="">--Pilih---</option>
                        <option value="Kepala Desa">Kepala Desa</option>
                        <option value="Sektretaris Desa">Sektretaris Desa</option>
                        <option value="Kaur Keuangan">Kaur Keuangan</option>
                        <option value="Kaur Keuangan">Kaur Umum</option>
                        <option value="Kaur Keuangan">Kasi Pemerintahan</option>
                        <option value="Kasi Kesejahteraan">Kasi Kesejahteraan</option>
                        <option value="Kaur Pelayanan">Kasi Pelayanan</option>
                      </select>
                    
                    </div>

                     <div class="form-group">
                      <label for="exampleInputEmail1">Alamat</label>
                      <input type="text" name="alamat_peg" class="form-control">
                    
                    </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">No HP</label>
                      <input type="number" name="telp_peg" class="form-control">
        

                   <!------------------------------------------------------------------------------------------------------->
                     <div class="form-group">
                      <label for="exampleInputEmail1">No WA</label>
                      <input type="number" name="wa_peg" class="form-control">
                    </div>
                    <!------------------------------------------------------------------------------------------------------->

                 
                    <input type="submit" name="submit" class="btn btn-info" value="Submit">
                  </form>
                </div>
              </div>


         
            </div>
</div>
</div>