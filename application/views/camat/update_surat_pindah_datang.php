<div class="container-fluid" id="container-wrapper">
 <div class="row">
  <div class="col-lg-12">


              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-info">Form Update Surat Pindah Datang</h6>
                </div>
                <div class="card-body">
                   <?php echo validation_errors();
                                                       
    echo form_open_multipart('camat/simpan_surat_pindah_datang'); ?>
                     <div class="form-group">
                      <input type="hidden"  name="id_surat_pindah_datang" value="<?php echo $d['id_surat_pindah_datang']; ?>" class="form-control" id="exampleInputPassword1" >
                      <label for="exampleInputEmail1">Jenis Permohonan</label>
                      <select  name="jenis_permohonan" class="select2-single form-control" id="select2Single">
                   
                     <option value="Antar Desa dalam Satu Kecamatan" <?php if ($d['jenis_permohonan']=='Antar Desa dalam Satu Kecamatan') echo  "selected"; ?>>Antar Desa dalam Satu Kecamatan</option>
                   <option value="Antar Kecamatan dalam Satu Kabupaten" <?php if ($d['jenis_permohonan']=='Antar Desa dalam Satu Kabupaten') echo  "selected"; ?>>Antar Kecamatan dalam Satu Kabupaten</option>
                   <option value="Antar Kabupaten/Kota Atau Provinsi" <?php if ($d['jenis_permohonan']=='Antar Kabupaten/Kota Atau Provinsi') echo  "selected"; ?>>Antar Kabupaten/Kota Atau Provinsi</option>
                 
                     </select>
                    
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">No Surat</label>
                      <input type="text" value="<?php echo $d['no_surat']; ?>" name="no_surat" class="form-control" id="exampleInputPassword1" >
                    </div>

                   
                     <div class="form-group">
                      <label for="exampleInputPassword1">Tanggal Surat </label>
                      <input type="date" value="<?php echo $d['tanggal_surat']; ?>" name="tanggal_surat" class="form-control" id="exampleInputPassword1" >
                    </div>
                    
                    
   <div class="form-group">
                      <label for="exampleInputEmail1">Yang Bertanda Tangan</label>
                      <select name="tanda_tangan" class="form-control">
                    <?php 
                                     $tanda_tangan=$d['tanda_tangan'];  
                                        foreach ($dt_pegawai as $b): ?>
                     <option value="<?php echo $b['id_pgw']; ?>" <?php if($b['id_pgw'] ==$tanda_tangan) { echo ' selected="selected"';}   ?>><?php echo $b['nama_peg']; ?> - <?php echo $b['jabatan']; ?></option>
                   <?php endforeach; ?>
                     </select>
                    
                    </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">Status</label>
                      <select name="status" class="form-control" >
                  
                     <option value="Selesai" <?php if($d['status']=='Selesai') echo 'selected'; ?>>Selesai</option>
                     <option value="Ditolak" <?php if($d['status']=='Ditolak') echo 'selected'; ?>>Ditolak</option>
                     </select>
                    
                    </div>
                       <input type="hidden" name="file" class="form-control" id="exampleInputPasswordRepeat"
                        >
                         <input type="hidden" name="old_image" value="<?php echo $d['file']; ?>" class="form-control">
                 
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
                        value="<?php echo $d['no_kk']; ?>" name="no_kk">
                     
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Nama KK</label>
                      <input type="text" value="<?php echo $d['nama_kk']; ?>" name="nama_kk" class="form-control" id="exampleInputPassword1" >
                    </div>
                     <div class="form-group">
                      <label for="exampleInputPassword1">Alamat </label>
                      <input type="text" value="<?php echo $d['alamat_awal']; ?>" name="alamat_awal" class="form-control" id="exampleInputPassword1" >
                    </div>
                     <div class="form-group">
                      <label for="exampleInputPassword1">RT </label>
                      <input type="text" value="<?php echo $d['rt_awal']; ?>" name="rt_awal" class="form-control" id="exampleInputPassword1" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">RW</label>
                      <input type="text" value="<?php echo $d['rw_awal']; ?>" name="rw_awal" class="form-control" id="exampleInputPassword1" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Dusun</label>
                      <input type="text" value="<?php echo $d['dusun_awal']; ?>" name="dusun_awal" class="form-control" id="exampleInputPassword1" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Desa/Kelurahan</label>
                      <input type="text" value="<?php echo $d['desa_awal']; ?>" name="desa_awal" class="form-control" id="exampleInputPassword1" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Kecamatan</label>
                      <input type="text" value="<?php echo $d['kec_awal']; ?>" name="kec_awal" class="form-control" id="exampleInputPassword1" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Kabupaten/Kota</label>
                      <input type="text" value="<?php echo $d['kab_awal']; ?>" name="kab_awal" class="form-control" id="exampleInputPassword1" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Provinsi</label>
                      <input type="text" value="<?php echo $d['prov_awal']; ?>" name="prov_awal" class="form-control" id="exampleInputPassword1" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Kode Pos</label>
                      <input type="text" value="<?php echo $d['pos_awal']; ?>" name="pos_awal" class="form-control" id="exampleInputPassword1" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Telp</label>
                      <input type="text" value="<?php echo $d['telp_awal']; ?>" name="telp_awal" class="form-control" id="exampleInputPassword1" >
                    </div>
                  
                   <div class="form-group">
                      <label for="exampleInputEmail1">NIK Pemohon</label>
                     <select name="id_ktp" class="select2-single form-control" id="select2Single">
                    <?php 
                                       $id_ktp=$d['id_ktp'];
                                        foreach ($dt_ktp as $a): ?>
                     <option value="<?php echo $a['id_ktp']; ?>" <?php if($a['id_ktp']==$id_ktp) { echo ' selected="selected"';}   ?>><?php echo $a['nik']; ?> <?php echo $a['nama']; ?></option>
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
                      <select value="<?php echo $d['alasan_pindah']; ?>" name="alasan_pindah" class="form-control">
                   <option value="Pekerjaan"  <?php if ($d['alasan_pindah']=='Pekerjaan') echo  "selected"; ?>>Pekerjaan</option>
                   <option value="Pendidikan" <?php if ($d['alasan_pindah']=='Pendidikan') echo  "selected"; ?>>Pendidikan</option>
                   <option value="Keamanan" <?php if ($d['alasan_pindah']=='Keamanan') echo  "selected"; ?>>Keamanan</option>
                   <option value="Kesehatan" <?php if ($d['alasan_pindah']=='Kesehatan') echo  "selected"; ?>>Kesehatan</option>
                   <option value="Perumahan" <?php if ($d['alasan_pindah']=='Perumahan') echo  "selected"; ?>>Perumahan</option>
                   <option value="Keluarga" <?php if ($d['alasan_pindah']=='Keluarga') echo  "selected"; ?>>Keluarga</option>
                   <option value="Lainnya" <?php if ($d['alasan_pindah']=='Lainnya') echo  "selected"; ?>>Lainnya</option>
                     </select>
                    
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Alamat Tujuan Pindah</label>
                      <input type="text" value="<?php echo $d['alamat_pindah']; ?>" name="alamat_pindah" class="form-control" id="exampleInputPassword1" >
                    </div>
                     <div class="form-group">
                      <label for="exampleInputPassword1">RT </label>
                      <input type="text" value="<?php echo $d['rt_pindah']; ?>" name="rt_pindah" class="form-control" id="exampleInputPassword1" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">RW</label>
                      <input type="text" value="<?php echo $d['rw_pindah']; ?>" name="rw_pindah" class="form-control" id="exampleInputPassword1" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Dusun</label>
                      <input type="text" value="<?php echo $d['dusun_pindah']; ?>" name="dusun_pindah" class="form-control" id="exampleInputPassword1" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Desa/Kelurahan</label>
                      <input type="text" value="<?php echo $d['desa_pindah']; ?>" name="desa_pindah" class="form-control" id="exampleInputPassword1" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Kecamatan</label>
                      <input type="text" value="<?php echo $d['kec_pindah']; ?>" name="kec_pindah" class="form-control" id="exampleInputPassword1" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Kabupaten/Kota</label>
                      <input type="text" value="<?php echo $d['kab_pindah']; ?>" name="kab_pindah" class="form-control" id="exampleInputPassword1" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Provinsi</label>
                      <input type="text" value="<?php echo $d['prov_pindah']; ?>" name="prov_pindah" class="form-control" id="exampleInputPassword1" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Kode Pos</label>
                      <input type="text" value="<?php echo $d['pos_pindah']; ?>" name="pos_pindah" class="form-control" id="exampleInputPassword1" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Telp</label>
                      <input type="text" value="<?php echo $d['telp_pindah']; ?>" name="telp_pindah" class="form-control" id="exampleInputPassword1" >
                    </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">Jenis Kepindahan</label>
                      <select value="<?php echo $d['jenis_kepindahan']; ?>" name="jenis_kepindahan" class="form-control" >
                   <option value="Kepala Keluarga" <?php if ($d['jenis_kepindahan']=='Kepala Keluarga') echo  "selected"; ?>>Kepala Keluarga</option>
                   <option value="Kepala Keluarga dan seluruh agt. Keluarga" <?php if ($d['alasan_pindah']=='Kepala Keluarga dan seluruh agt. Keluarga') echo  "selected"; ?>>Kepala Keluarga dan seluruh agt. Keluarga</option>
                   <option value="Kepala Keluarga dan sebagian agt. Keluarga" <?php if ($d['alasan_pindah']=='Kepala Keluarga dan sebagian agt. Keluarga') echo  "selected"; ?>>Kepala Keluarga dan sebagian agt. Keluarga</option>
                   <option value="Anggota Keluarga" <?php if ($d['alasan_pindah']=='Anggota Keluarga') echo  "selected"; ?>>Anggota Keluarga</option>
               
                     </select>
                    
                    </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">Status KK Bagi Yang Tidak Pindah</label>
                      <select  name="status_kk_tidak_pindah" class="form-control" >
                   <option value="Numpang KK" <?php if ($d['status_kk_tidak_pindah']=='Numpang KK') echo  "selected"; ?>>Numpang KK</option>
                   <option value="Membuat KK Baru" <?php if ($d['status_kk_tidak_pindah']=='Membuat KK Baru') echo  "selected"; ?>>Membuat KK Baru</option>
                   <option value="Nomor KK Tetap" <?php if ($d['status_kk_tidak_pindah']=='Nomor KK Tetap') echo  "selected"; ?>>Nomor KK Tetap</option>
                  
               
                     </select>
                    
                    </div>
                         <div class="form-group">
                      <label for="exampleInputEmail1">Status KK Bagi Yang Pindah</label>
                      <select  name="status_kk_pindah" class="form-control">
                   <option value="Numpang KK" <?php if ($d['status_kk_pindah']=='Numpang KK') echo  "selected"; ?>>Numpang KK</option>
                   <option value="Membuat KK Baru" <?php if ($d['status_kk_pindah']=='Membuat KK Baru') echo  "selected"; ?>>Membuat KK Baru</option>
                   <option value="Nomor KK Tetap" <?php if ($d['status_kk_pindah']=='Nomor KK Tetap') echo  "selected"; ?>>Nomor KK Tetap</option>
                  
               
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
                      <input type="text" value="<?php echo $d['nik1']; ?>" name="nik1" class="form-control" id="exampleInputPassword1" >
                    </div>
                      <div class="form-group">
                      <label for="exampleInputPassword1">NIK</label>
                      <input type="text" value="<?php echo $d['nik2']; ?>" name="nik2" class="form-control" id="exampleInputPassword1" >
                    </div>
                      <div class="form-group">
                      <label for="exampleInputPassword1">NIK</label>
                      <input type="text" value="<?php echo $d['nik3']; ?>" name="nik3" class="form-control" id="exampleInputPassword1" >
                    </div>
                      <div class="form-group">
                      <label for="exampleInputPassword1">NIK</label>
                      <input type="text" value="<?php echo $d['nik4']; ?>" name="nik4" class="form-control" id="exampleInputPassword1" >
                    </div>
                      <div class="form-group">
                      <label for="exampleInputPassword1">NIK</label>
                      <input type="text" value="<?php echo $d['nik5']; ?>" name="nik5" class="form-control" id="exampleInputPassword1" >
                    </div>
                      <div class="form-group">
                      <label for="exampleInputPassword1">NIK</label>
                      <input type="text" value="<?php echo $d['nik6']; ?>" name="nik6" class="form-control" id="exampleInputPassword1" >
                    </div>
                      <div class="form-group">
                      <label for="exampleInputPassword1">NIK</label>
                      <input type="text" value="<?php echo $d['nik7']; ?>" name="nik7" class="form-control" id="exampleInputPassword1" >

</div>
              <!-- /.form-group -->
            
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
             <div class="form-group">
                      <label for="exampleInputPassword1">Nama</label>
                      <input type="text" value="<?php echo $d['nama1']; ?>" name="nama1" class="form-control" id="exampleInputPassword1" >
                    </div>
                     <div class="form-group">
                      <label for="exampleInputPassword1">Nama</label>
                      <input type="text" value="<?php echo $d['nama2']; ?>" name="nama2" class="form-control" id="exampleInputPassword1" >
                    </div>
                     <div class="form-group">
                      <label for="exampleInputPassword1">Nama</label>
                      <input type="text" value="<?php echo $d['nama3']; ?>" name="nama3" class="form-control" id="exampleInputPassword1" >
                    </div>
                     <div class="form-group">
                      <label for="exampleInputPassword1">Nama</label>
                      <input type="text" value="<?php echo $d['nama4']; ?>" name="nama4" class="form-control" id="exampleInputPassword1" >
                    </div>
                     <div class="form-group">
                      <label for="exampleInputPassword1">Nama</label>
                      <input type="text" value="<?php echo $d['nama5']; ?>" name="nama5" class="form-control" id="exampleInputPassword1" >
                    </div>
                     <div class="form-group">
                      <label for="exampleInputPassword1">Nama</label>
                      <input type="text" value="<?php echo $d['nama6']; ?>" name="nama6" class="form-control" id="exampleInputPassword1" >
                    </div>
                     <div class="form-group">
                      <label for="exampleInputPassword1">Nama</label>
                      <input type="text" value="<?php echo $d['nama7']; ?>" name="nama7" class="form-control" id="exampleInputPassword1" >
                    </div>
  <input type="submit"  name="submit" class="btn btn-info" value="Update">
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