<div class="container-fluid" id="container-wrapper">
<div class="row">

    <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-info">Form Tambah Surat Kehilangan</h6>
                </div>
                <div class="card-body">
                
       <?php echo validation_errors();
                                                       
    echo form_open('admin/tambah_surat_kehilangan'); ?>
                    <div class="form-group">
                      <label for="exampleInputEmail1">NIK</label>
                     <select name="id_ktp" id="id_ktp" class="select2-single form-control " onchange="changeValuee(this.value)" >
                                 <option value="">-Pilih-</option>        
               <?php

                $jsArrayy = "var prdNamee = new Array();\n";
              foreach ($dt_ktp as $row) {
                
                echo '<option   value="' . $row['id_ktp'] . '">' . $row['nik'] . ' ' . $row['nama'] . '</option>';  
 $jsArrayy .= "prdNamee['" . $row['id_ktp'] . "'] = {opt_alamat:'" . addslashes($row['alamat']) . "',opt_tempat_lahir:'".addslashes($row['tempat_lahir'])."',opt_tgl_lahir:'".addslashes($row['tanggal_lahir'])."'};\n";
                
              }
              ?>
               
                            </select>
                    
                    </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">Alamat </label>
                      <input type="text"  class="form-control" id="opt_alamat" readonly>
                    
                    </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">Tempat Lahir </label>
                      <input type="text"  class="form-control" id="opt_tempat_lahir" readonly>          
                    </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">Tanggal Lahir </label>
                      <input type="text"  class="form-control" id="opt_tgl_lahir" readonly>          
                    </div>
                    
                     <div class="form-group">
                      <label for="exampleInputEmail1">Kehilangan</label>
                      <input type="text" name="kehilangan" class="form-control" placeholder="masukan kehilangan....">
                    
                    </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">Tanggal Kehilangan</label>
                      <input type="date" name="tgl_kehilangan" class="form-control">
                    
                    </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">Tempat</label>
                      <input type="text" name="tempat" class="form-control" placeholder="tempat kehilangan terakhir kali....">
                    
                    </div>

                    
                     <div class="form-group">
                      <label for="exampleInputEmail1">Tanggal Surat</label>
                      <input type="date" name="tanggal_surat" class="form-control">
                    </div>
                    
                     
                      <div class="form-group">
                      <label for="exampleInputEmail1">Nomor Surat</label>
                      <input type="text" name="no_surat"  class="form-control">
                    
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
                 
                    <input type="submit" name="submit" class="btn btn-info" value="Tambah">
                  </form>
                </div>
              </div>


         
            </div>
</div>
</div>
<script type="text/javascript"> 
<?php echo $jsArrayy; ?>
function changeValuee(id){
    document.getElementById('opt_alamat').value = prdNamee[id].opt_alamat;
    document.getElementById('opt_tempat_lahir').value = prdNamee[id].opt_tempat_lahir;
        document.getElementById('opt_tgl_lahir').value = prdNamee[id].opt_tgl_lahir;
};
</script>