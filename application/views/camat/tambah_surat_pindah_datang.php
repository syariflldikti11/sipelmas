<div class="container-fluid" id="container-wrapper">
 <div class="row">
  <div class="col-lg-12">


              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-info">Form Tambah Surat Pindah Datang</h6>
                </div>
                <div class="card-body">
                   <?php echo validation_errors();
                                                       
    echo form_open('admin/tambah_surat_pindah_datang'); ?>
                     <div class="form-group">
                      <label for="exampleInputEmail1">Jenis Permohonan</label>
                      <select name="jenis_permohonan" class="select2-single form-control" id="select2Single">
                   <option value="Dalam Satu Desa/Kelurahan">Dalam Satu Desa/Kelurahan</option>
                   <option value="Antar Desa dalam Satu Kecamatan">Antar Desa dalam Satu Kecamatan</option>
                   <option value="Antar Kecamatan dalam Satu Kabupaten">Antar Kecamatan dalam Satu Kabupaten</option>
                   <option value="Antar Kabupaten/Kota Atau Provinsi">Antar Kabupaten/Kota Atau Provinsi</option>
                   <option value="Antar Kabupaten/Kota Atau Provinsi">Antar Kabupaten/Kota Atau Provinsi</option>
                 
                     </select>
                    
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">No Surat</label>
                      <input type="text" name="no_surat"  class="form-control" id="exampleInputPassword1" >
                    </div>

                    
                     <div class="form-group">
                      <label for="exampleInputPassword1">Tanggal Surat </label>
                      <input type="date" name="tanggal_surat" class="form-control" id="exampleInputPassword1" >
                    </div>
                    
                     
                    
    <div class="form-group">
                      <label for="exampleInputEmail1">Yang Bertanda Tangan</label>
                      <select name="tanda_tangan" class="form-control">
                    <?php 
                                      
                                        foreach ($dt_pegawai as $d): ?>
                     <option value="<?php echo $d['id_pgw']; ?>"><?php echo $d['nama_peg']; ?> - <?php echo $d['jabatan']; ?></option>
                   <?php endforeach; ?>
                     </select>
                    
                    </div>
                 
                </div>
              </div>

              

           
            </div>
            <div class="col-lg-6">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-info">DATA DAERAH ASAL</h6>
                </div>
                <div class="card-body">
                  <form>
                    <div class="form-group">
                      <label for="exampleInputEmail1">NO KK</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        name="no_kk">
                     
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Nama KK</label>
                      <input type="text" name="nama_kk" class="form-control" id="exampleInputPassword1" >
                    </div>
                     <div class="form-group">
                      <label for="exampleInputPassword1">Alamat </label>
                      <input type="text" name="alamat_awal" class="form-control" id="exampleInputPassword1" >
                    </div>
                     <div class="form-group">
                      <label for="exampleInputPassword1">RT </label>
                      <input type="text" name="rt_awal" class="form-control" id="exampleInputPassword1" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">RW</label>
                      <input type="text" name="rw_awal" class="form-control" id="exampleInputPassword1" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Dusun</label>
                      <input type="text" name="dusun_awal" class="form-control" id="exampleInputPassword1" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Desa/Kelurahan</label>
                      <input type="text" name="desa_awal" class="form-control" id="exampleInputPassword1" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Kecamatan</label>
                      <input type="text" name="kec_awal" class="form-control" id="exampleInputPassword1" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Kabupaten/Kota</label>
                      <input type="text" name="kab_awal" class="form-control" id="exampleInputPassword1" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Provinsi</label>
                      <input type="text" name="prov_awal" class="form-control" id="exampleInputPassword1" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Kode Pos</label>
                      <input type="text" name="pos_awal" class="form-control" id="exampleInputPassword1" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Telp</label>
                      <input type="text" name="telp_awal" class="form-control" id="exampleInputPassword1" >
                    </div>
                  
                   <div class="form-group">
                      <label for="exampleInputEmail1">NIK Pemohon</label>
                      <select name="id_ktp" class="select2-single form-control" id="select2Single">
                    <?php 
                                      
                                        foreach ($dt_ktp as $d): ?>
                     <option value="<?php echo $d['id_ktp']; ?>"><?php echo $d['nik']; ?> <?php echo $d['nama']; ?></option>
                   <?php endforeach; ?>
                     </select>
                    
                    </div>

                  
                </div>
              </div>

              

           
            </div>
<div class="col-lg-6">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-info">DATA DAERAH TUJUAN</h6>
                </div>
                <div class="card-body">
                
                    <div class="form-group">
                      <label for="exampleInputEmail1">Alasan Pindah</label>
                      <select name="alasan_pindah" class="form-control">
                   <option value="Pekerjaan">Pekerjaan</option>
                   <option value="Pendidikan">Pendidikan</option>
                   <option value="Keamanan">Keamanan</option>
                   <option value="Kesehatan">Kesehatan</option>
                   <option value="Perumahan">Perumahan</option>
                   <option value="Keluarga">Keluarga</option>
                   <option value="Lainnya">Lainnya</option>
                     </select>
                    
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Alamat Tujuan Pindah</label>
                      <input type="text" name="alamat_pindah" class="form-control" id="exampleInputPassword1" >
                    </div>
                     <div class="form-group">
                      <label for="exampleInputPassword1">RT </label>
                      <input type="text" name="rt_pindah" class="form-control" id="exampleInputPassword1" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">RW</label>
                      <input type="text" name="rw_pindah" class="form-control" id="exampleInputPassword1" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Dusun</label>
                      <input type="text" name="dusun_pindah" class="form-control" id="exampleInputPassword1" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Desa/Kelurahan</label>
                      <input type="text" name="desa_pindah" class="form-control" id="exampleInputPassword1" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Kecamatan</label>
                      <input type="text" name="kec_pindah" class="form-control" id="exampleInputPassword1" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Kabupaten/Kota</label>
                      <input type="text" name="kab_pindah" class="form-control" id="exampleInputPassword1" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Provinsi</label>
                      <input type="text" name="prov_pindah" class="form-control" id="exampleInputPassword1" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Kode Pos</label>
                      <input type="text" name="pos_pindah" class="form-control" id="exampleInputPassword1" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Telp</label>
                      <input type="text" name="telp_pindah" class="form-control" id="exampleInputPassword1" >
                    </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">Jenis Kepindahan</label>
                      <select name="jenis_kepindahan" class="form-control" >
                   <option value="Kepala Keluarga">Kepala Keluarga</option>
                   <option value="Kepala Keluarga dan seluruh agt. Keluarga">Kepala Keluarga dan seluruh agt. Keluarga</option>
                   <option value="Kepala Keluarga dan sebagian agt. Keluarga">Kepala Keluarga dan sebagian agt. Keluarga</option>
                   <option value="Anggota Keluarga">Anggota Keluarga</option>
               
                     </select>
                    
                    </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">Status KK Bagi Yang Tidak Pindah</label>
                      <select name="status_kk_tidak_pindah" class="form-control" >
                   <option value="Numpang KK">Numpang KK</option>
                   <option value="Membuat KK Baru">Membuat KK Baru</option>
                   <option value="Nomor KK Tetap">Nomor KK Tetap</option>
                  
               
                     </select>
                    
                    </div>
                         <div class="form-group">
                      <label for="exampleInputEmail1">Status KK Bagi Yang Pindah</label>
                      <select name="status_kk_pindah" class="form-control">
                   <option value="Numpang KK">Numpang KK</option>
                   <option value="Membuat KK Baru">Membuat KK Baru</option>
                   <option value="Nomor KK Tetap">Nomor KK Tetap</option>
                  
               
                     </select>
                    
                    </div>
                   
                </div>
              </div>

            </div>
              <div class="col-lg-12">

      <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-info">Keluarga Yang Pindah</h6>
                </div>
                <div class="card-body">
             
          <div class="row">
            <div class="col-md-6">
             <div class="form-group">
                      <label for="exampleInputPassword1">NIK</label>
                      <input type="text" name="nik1" class="form-control" id="exampleInputPassword1" >
                    </div>
                      <div class="form-group">
                      <label for="exampleInputPassword1">NIK</label>
                      <input type="text" name="nik2" class="form-control" id="exampleInputPassword1" >
                    </div>
                      <div class="form-group">
                      <label for="exampleInputPassword1">NIK</label>
                      <input type="text" name="nik3" class="form-control" id="exampleInputPassword1" >
                    </div>
                      <div class="form-group">
                      <label for="exampleInputPassword1">NIK</label>
                      <input type="text" name="nik4" class="form-control" id="exampleInputPassword1" >
                    </div>
                      <div class="form-group">
                      <label for="exampleInputPassword1">NIK</label>
                      <input type="text" name="nik5" class="form-control" id="exampleInputPassword1" >
                    </div>
                      <div class="form-group">
                      <label for="exampleInputPassword1">NIK</label>
                      <input type="text" name="nik6" class="form-control" id="exampleInputPassword1" >
                    </div>
                      <div class="form-group">
                      <label for="exampleInputPassword1">NIK</label>
                      <input type="text" name="nik7" class="form-control" id="exampleInputPassword1" >

</div>
              <!-- /.form-group -->
            
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
             <div class="form-group">
                      <label for="exampleInputPassword1">Nama</label>
                      <input type="text" name="nama1" class="form-control" id="exampleInputPassword1" >
                    </div>
                     <div class="form-group">
                      <label for="exampleInputPassword1">Nama</label>
                      <input type="text" name="nama2" class="form-control" id="exampleInputPassword1" >
                    </div>
                     <div class="form-group">
                      <label for="exampleInputPassword1">Nama</label>
                      <input type="text" name="nama3" class="form-control" id="exampleInputPassword1" >
                    </div>
                     <div class="form-group">
                      <label for="exampleInputPassword1">Nama</label>
                      <input type="text" name="nama4" class="form-control" id="exampleInputPassword1" >
                    </div>
                     <div class="form-group">
                      <label for="exampleInputPassword1">Nama</label>
                      <input type="text" name="nama5" class="form-control" id="exampleInputPassword1" >
                    </div>
                     <div class="form-group">
                      <label for="exampleInputPassword1">Nama</label>
                      <input type="text" name="nama6" class="form-control" id="exampleInputPassword1" >
                    </div>
                     <div class="form-group">
                      <label for="exampleInputPassword1">Nama</label>
                      <input type="text" name="nama7" class="form-control" id="exampleInputPassword1" >
                    </div>
  <input type="submit" name="submit" class="btn btn-info" value="Tambah">
              <!-- /.form-group -->
            </form>
            </div></div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>

              

           
            </div>
          </div>
</div>
</div>