<style>
  .saya
   {
  border : 1px solid black;

  border-collapse: collapse;
}
.style5 {border: 1px solid black; border-collapse: collapse;  }
</style> <script>
  window.print();
</script>
<table width="100%" border="0">
  <tr>
    <td width="11%"><img src="<?php echo base_url(); ?>assets\img\logo.png" width="90" height="88" /></td>
    <td width="89%"><p align="center"><strong><font size="+3">PEMERINTAH KABUPATEN BANJAR</font><br />
      <font size="+2"> KECAMATAN KERTAK HANYAR</font></strong> <br />
      <font size="-2">Jl. A. Yani, Tatah Belayung Baru, Kec. Kertak Hanyar, Kabupaten Banjar, Kalimantan Selatan 70654</font> </p></td>
  </tr>
</table>
<br />
<div style='mso-element:para-border-div;border:none;border-top:solid windowtext 3.0pt;
padding:1.0pt 0cm 0cm 0cm'>
<?php
   $dari=$_POST['dari'];
   $sampai=$_POST['sampai'];
   $jenis=$_POST['jenis'];
    ?>
    <?php if($jenis==1): ?>
<p>
<center>DATA SURAT DOMISILI</center>
<center><?php echo date("d-m-Y",strtotime($dari)); ?>s/d<?php echo date("d-m-Y",strtotime($sampai)); ?>  </center>
<p/>

<table class="saya" width="100%" border="0">
                    <thead class="thead-light">
                      <tr>
                        <th class="style5">No</th>
                        <th class="style5">NIK</th>
                        <th class="style5">Nama</th>
                        <th class="style5">JK</th>
                        <th class="style5">TTL</th>
                        <th class="style5">Pekerjaan</th>
                        <th class="style5">Alamat Domisli</th>
                        <th class="style5">Tanggal Surat</th>
                        <th class="style5">Nomor Surat</th>
                        <th class="style5">Status</th>
                       
                      </tr>
                    </thead>
                   
                    <tbody>
                         <?php 
                                        $no=1;
                                        foreach ($dt_surat_domisili as $a): ?>
                      <tr>
                        <td align="center" class="style5"><?php echo $no++; ?></td>
                         <td align="center" class="style5"><?php echo $a['nik']; ?></td>
                        <td align="center" class="style5"><?php echo $a['nama']; ?></td>
                        <td align="center" class="style5"><?php echo $a['jkelamin']; ?></td>
                        <td align="center"class="style5"><?php echo $a['tempat_lahir']; ?>, <?php echo $a['tanggal_lahir']; ?></td>
                        <td align="center"class="style5"><?php echo $a['pekerjaan']; ?></td>
                        <td align="center"class="style5"><?php echo $a['alamat_domisili']; ?></td>
                        <td align="center"class="style5"><?php echo $a['tanggal_surat']; ?></td>
                        <td align="center"class="style5"><?php echo $a['no_surat']; ?></td>
                        <td align="center"class="style5"><?php echo $a['status']; ?></td>
                         
                    
                      </tr>
                       <?php endforeach; ?>
                    </tbody>
                  </table>
                  <p>
                  <?php endif; ?>
         <?php if($jenis==2): ?>         
<center>DATA SURAT USAHA</center>
<center><?php echo date("d-m-Y",strtotime($dari)); ?>s/d<?php echo date("d-m-Y",strtotime($sampai)); ?>  </center>
<p/>
                    <table class="saya" width="100%" border="0">
                    <thead class="thead-light">
                      <tr>
                        <th class="style5">No</th>
                        <th class="style5">NIK</th>
                        <th class="style5">Nama</th>
                        
                        <th class="style5">TTL</th>
                        <th class="style5">Alamat</th>
                         <th class="style5">Jenis Usaha</th>
                        <th class="style5">Nama Usaha</th>
                        <th class="style5">Alamat Usaha</th>
                       <th class="style5">Tanggal Surat</th>
                        <th class="style5">Nomor Surat</th>
                        <th class="style5">Status</th>
                        
                      </tr>
                    </thead>
                   
                    <tbody>
                         <?php 
                                        $noo=1;
                                        foreach ($dt_surat_usaha as $b): ?>
                      <tr>
                        <td align="center"class="style5"><?php echo $noo++; ?></td>
                         <td align="center"class="style5"><?php echo $b['nik']; ?></td>
                        <td align="center"class="style5"><?php echo $b['nama']; ?></td>
                        
                        <td align="center"class="style5"><?php echo $b['tempat_lahir']; ?>, <?php echo $b['tanggal_lahir']; ?></td>
                      
                        <td align="center"class="style5"><?php echo $b['alamat']; ?></td>
                        <td align="center"class="style5"><?php echo $b['jenis_usaha']; ?></td>
                        <td align="center"class="style5"><?php echo $b['nama_usaha']; ?></td>
                        <td align="center"class="style5"><?php echo $b['alamat_usaha']; ?></td>
                           <td align="center"class="style5"><?php echo $b['tanggal_surat']; ?></td>
                        <td align="center"class="style5"><?php echo $b['no_surat']; ?></td>
                        <td align="center"class="style5"><?php echo $b['status']; ?></td>
                        
                    
                      </tr>
                       <?php endforeach; ?>
                    </tbody>
                  </table>
                  <?php endif; ?>
                       <p>
  <?php if($jenis==3): ?>         
<center>DATA SURAT KEHILANGAN</center>
<center><?php echo date("d-m-Y",strtotime($dari)); ?>s/d<?php echo date("d-m-Y",strtotime($sampai)); ?>  </center>
<p/>
                  <table class="saya" width="100%" border="0">
                    <thead class="thead-light">
                      <tr>
                        <th class="style5">No</th>
                        <th class="style5">NIK</th>
                        <th class="style5">Nama</th>
                      
                        <th class="style5">TTL</th>
                        <th class="style5">Pekerjaan</th>
                        <th class="style5">Alamat</th>
                       
                        <th class="style5">Kehilangan</th>
                        <th class="style5">Tanggal Kehilangan</th>
                        <th class="style5">Tempat</th>
                         <th class="style5">Tanggal Surat</th>
                        <th class="style5">Nomor Surat</th>
                        <th class="style5">Status</th>
                     
                      </tr>
                    </thead>
                   
                    <tbody>
                         <?php 
                                        $nooo=1;
                                        foreach ($dt_surat_kehilangan as $c): ?>
                      <tr>
                        <td align="center"class="style5"><?php echo $nooo++; ?></td>
                         <td align="center"class="style5"><?php echo $c['nik']; ?></td>
                        <td align="center"class="style5"><?php echo $c['nama']; ?></td>
                      
                        <td align="center"class="style5"><?php echo $c['tempat_lahir']; ?>, <?php echo $c['tanggal_lahir']; ?></td>
                        <td align="center"class="style5"><?php echo $c['pekerjaan']; ?></td>
                        <td align="center"class="style5"><?php echo $c['alamat']; ?></td>
                       
                        <td align="center"class="style5"><?php echo $c['kehilangan']; ?></td>
                        <td align="center"class="style5"><?php echo $c['tgl_kehilangan']; ?></td>
                        <td align="center"class="style5"><?php echo $c['tempat']; ?></td>
                       <td align="center"class="style5"><?php echo $c['tanggal_surat']; ?></td>
                        <td align="center"class="style5"><?php echo $c['no_surat']; ?></td>
                        <td align="center"class="style5"><?php echo $c['status']; ?></td>
                         
                    
                      </tr>
                       <?php endforeach; ?>
                    </tbody>
                  </table>
                <?php endif; ?>
                   <p>

  <?php if($jenis==4): ?>         
<center>DATA SURAT KURANG MAMPU</center>
<center><?php echo date("d-m-Y",strtotime($dari)); ?>s/d<?php echo date("d-m-Y",strtotime($sampai)); ?>  </center>
<p/>
                  <table class="saya" width="100%" border="0">
                    <thead class="thead-light">
                      <tr>
                        <th class="style5">No</th>
                        <th class="style5">NIK</th>
                        <th class="style5">Nama</th>
                        <th class="style5">JK</th>
                        <th class="style5">TTL</th>
                        <th class="style5">Warga Negara/Agama</th>
                        <th class="style5">Pekerjaan</th>
                        <th class="style5">Alamat </th>
                        <th class="style5">Peruntukan </th>
                        <th class="style5">keperluan </th>
                        <th class="style5">Penghasilan </th>
                        <th class="style5">Tanggal Surat</th>
                        <th class="style5">Nomor Surat</th>
                        <th class="style5">Status</th>
                       
                      </tr>
                    </thead>
                   
                    <tbody>
                         <?php 
                                        $noooo=1;
                                        foreach ($dt_surat_kurang_mampu as $d): ?>
                      <tr>
                        <td align="center"class="style5"><?php echo $noooo++; ?></td>
                         <td align="center"class="style5"><?php echo $d['nik']; ?></td>
                        <td align="center"class="style5"><?php echo $d['nama']; ?></td>
                        <td align="center"class="style5"><?php echo $d['jkelamin']; ?></td>
                        <td align="center"class="style5"><?php echo $d['tempat_lahir']; ?>, <?php echo $d['tanggal_lahir']; ?></td>
                        <td align="center"class="style5"><?php echo $d['wnegara']; ?>/<?php echo $d['agama']; ?></td>
                        <td align="center"class="style5"><?php echo $d['pekerjaan']; ?></td>
                        <td align="center"class="style5"><?php echo $d['alamat']; ?></td>
                        <td align="center"class="style5"><?php echo $d['peruntukan']; ?></td>
                        <td align="center"class="style5"><?php echo $d['keperluan']; ?></td>
                        <td align="center"class="style5"><?php echo $d['penghasilan']; ?></td>
                         <td align="center"class="style5"><?php echo $d['tanggal_surat']; ?></td>
                        <td align="center"class="style5"><?php echo $d['no_surat']; ?></td>
                        <td align="center"class="style5"><?php echo $d['status']; ?></td>
                       
                       
                    
                      </tr>
                       <?php endforeach; ?>
                    </tbody>
                  </table>
                <?php endif; ?>
                    <p>
  <?php if($jenis==5): ?>         
<center>DATA SURAT KEMATIAN</center>
<center><?php echo date("d-m-Y",strtotime($dari)); ?>s/d<?php echo date("d-m-Y",strtotime($sampai)); ?>  </center>
<p/>
                  <table class="saya" width="100%" border="0">
                    <thead class="thead-light">
                      <tr>
                        <th class="style5">No</th>
                        <th class="style5">NIK</th>
                        <th class="style5">Nama</th>
                        <th class="style5">JK</th>
                        <th class="style5">TTL</th>
                        <th class="style5">Pekerjaan</th>
                        <th class="style5">Alamat </th>
                        <th class="style5">Hari </th>
                        <th class="style5">Pukul </th>
                        <th class="style5">Bertempat </th>
                        <th class="style5">Dimakamkan </th>
                        <th class="style5">Tanggal Surat</th>
                        <th class="style5">Nomor Surat</th>
                        <th class="style5">Status</th>
                       
                      </tr>
                    </thead>
                   
                    <tbody>
                         <?php 
                                        $nooooo=1;
                                        foreach ($dt_surat_kematian as $e): ?>
                      <tr>
                        <td align="center"class="style5"><?php echo $nooooo++; ?></td>
                         <td align="center"class="style5"><?php echo $e['nik']; ?></td>
                        <td align="center"class="style5"><?php echo $e['nama']; ?></td>
                        <td align="center"class="style5"><?php echo $e['jkelamin']; ?></td>
                        <td align="center"class="style5"><?php echo $e['tempat_lahir']; ?>, <?php echo $e['tanggal_lahir']; ?></td>
                        <td align="center"class="style5"><?php echo $e['pekerjaan']; ?></td>
                        <td align="center"class="style5"><?php echo $e['alamat']; ?></td>
                        <td align="center"class="style5"><?php echo $e['hari']; ?></td>
                        <td align="center"class="style5"><?php echo $e['pukul']; ?></td>
                        <td align="center"class="style5"><?php echo $e['bertempat']; ?></td>
                        <td align="center"class="style5"><?php echo $e['dimakamkan']; ?></td>
                        <td align="center"class="style5"><?php echo $e['tanggal_surat']; ?></td>
                        <td align="center"class="style5"><?php echo $e['no_surat']; ?></td>
                        <td align="center"class="style5"><?php echo $e['status']; ?></td>
                         
                    
                      </tr>
                       <?php endforeach; ?>
                    </tbody>
                  </table>
                <?php endif; ?>
<p>
  <?php if($jenis==6): ?>         
<center>DATA SURAT BELUM MENIKAH</center>
<center><?php echo date("d-m-Y",strtotime($dari)); ?>s/d<?php echo date("d-m-Y",strtotime($sampai)); ?>  </center>
<p/>
                  <table class="saya" width="100%" border="0">
                    <thead class="thead-light">
                      <tr>
                        <th class="style5">No</th>
                        <th class="style5">NIK</th>
                        <th class="style5">Nama</th>
                        <th class="style5">Bin</th>
                        <th class="style5">JK</th>
                        <th class="style5">TTL</th>
                        <th class="style5">Agama</th>
                        <th class="style5">Pekerjaan</th>
                        <th class="style5">Status Nikah</th>
                       <th class="style5">Tanggal Surat</th>
                        <th class="style5">Nomor Surat</th>
                        <th class="style5">Status</th>
                        
                      </tr>
                    </thead>
                   
                    <tbody>
                         <?php 
                                        $noooooo=1;
                                        foreach ($dt_surat_belum_menikah as $f): ?>
                      <tr>
                        <td align="center"class="style5"><?php echo $noooooo++; ?></td>
                         <td align="center"class="style5"><?php echo $f['nik']; ?></td>
                        <td align="center"class="style5"><?php echo $f['nama']; ?></td>
                          <td align="center"class="style5"><?php echo $f['bin']; ?></td>
                        <td align="center"class="style5"><?php echo $f['jkelamin']; ?></td>
                        <td align="center"class="style5"><?php echo $f['tempat_lahir']; ?>, <?php echo $f['tanggal_lahir']; ?></td>
                        <td align="center"class="style5"><?php echo $f['agama']; ?></td>
                        <td align="center"class="style5"><?php echo $f['pekerjaan']; ?></td>
                        <td align="center"class="style5"><?php echo $f['status_nikah']; ?></td>
                        <td align="center"class="style5"><?php echo $f['tanggal_surat']; ?></td>
                        <td align="center"class="style5"><?php echo $f['no_surat']; ?></td>
                        <td align="center"class="style5"><?php echo $f['status']; ?></td>
                                             
                      </tr>
                       <?php endforeach; ?>
                    </tbody>
                  </table>
                <?php endif; ?>

               <?php if($jenis==7): ?>         
<center>DATA SURAT PINDAH DATANG</center>
<center><?php echo date("d-m-Y",strtotime($dari)); ?>s/d<?php echo date("d-m-Y",strtotime($sampai)); ?>  </center>
<p/>


                  <table class="saya" width="100%" border="0">
                    <thead class="thead-light">
                      <tr>
                        <th class="style5">No</th>
                        <th class="style5">NIK</th>
                        <th class="style5">Nama</th>
                        <th class="style5">No KK</th>
                        <th class="style5">Nama KK</th>
                        <th class="style5">Jenis Surat</th>
                        <th class="style5">Tanggal Surat</th>
                        <th class="style5">Nomor Surat</th>
                        <th class="style5">Status</th>
                       
                      </tr>
                    </thead>
                   
                    <tbody>
                         <?php 
                                        $no=1;
                                        foreach ($dt_surat_pindah_datang as $a): ?>
                      <tr>
                        <td align="center"class="style5"><?php echo $no++; ?></td>
                         <td align="center"class="style5"><?php echo $a['nik']; ?></td>
                        <td align="center"class="style5"><?php echo $a['nama']; ?></td>
                        <td align="center"class="style5"><?php echo $a['no_kk']; ?> </td>
                        <td align="center"class="style5"><?php echo $a['nama_kk']; ?></td>
                        <td align="center"class="style5"><?php echo $a['jenis_kepindahan']; ?></td>
                        <td align="center"class="style5"><?php echo $a['tanggal_surat']; ?></td>
                        <td align="center"class="style5"><?php echo $a['no_surat']; ?></td>
                        <td align="center"class="style5"><?php echo $a['status']; ?></td>
                         
                    
                      </tr>
                       <?php endforeach; ?>
                    </tbody>
                  </table>
                <?php endif; ?>
                  <p>
<?php if($jenis==8): ?>         
<center>DATA SURAT PINDAH KELUAR</center>
<center><?php echo date("d-m-Y",strtotime($dari)); ?>s/d<?php echo date("d-m-Y",strtotime($sampai)); ?>  </center>
<p/>
                     <table class="saya" width="100%" border="0">
                    <thead class="thead-light">
                      <tr>
                        <th class="style5">No</th>
                        <th class="style5">NIK</th>
                        <th class="style5">Nama</th>
                        <th class="style5">No KK</th>
                        <th class="style5">Nama KK</th>
                        <th class="style5">Jenis Surat</th>
                        <th class="style5">Tanggal Surat</th>
                        <th class="style5">Nomor Surat</th>
                        <th class="style5">Status</th>
                       
                      </tr>
                    </thead>
                   
                    <tbody>
                         <?php 
                                        $noo=1;
                                        foreach ($dt_surat_pindah_keluar as $b): ?>
                      <tr>
                        <td class="style5"><?php echo $noo++; ?></td>
                         <td class="style5"><?php echo $b['nik']; ?></td>
                        <td class="style5"><?php echo $b['nama']; ?></td>
                        <td class="style5"><?php echo $b['no_kk']; ?> </td>
                        <td class="style5"><?php echo $b['nama_kk']; ?></td>
                        <td class="style5"><?php echo $b['jenis_kepindahan']; ?></td>
                        <td class="style5"><?php echo $b['tanggal_surat']; ?></td>
                        <td class="style5"><?php echo $b['no_surat']; ?></td>
                        <td class="style5"><?php echo $b['status']; ?></td>
                         
                    
                      </tr>
                       <?php endforeach; ?>
                    </tbody>
                  </table>
                  <p>
                  <?php endif; ?>

                  <?php if($jenis==9): ?>         
<center>DATA SURAT IZIN KERAMAIAN</center>
<center><?php echo date("d-m-Y",strtotime($dari)); ?>s/d<?php echo date("d-m-Y",strtotime($sampai)); ?>  </center>
<p/>
                     <table class="saya" width="100%" border="0">
                    <thead class="thead-light">
                      <tr>
                        <th class="style5">No</th>

                        <th class="style5">Nama Lengkap</th>
                        <th class="style5">Alamat Rmh</th>
                        <th class="style5">RT</th>
                        <th class="style5">TTL</th>
                        <th class="style5">Dalam Rangka</th>
                        <th class="style5">Hari</th>
                        <th class="style5">Tanggal </th>
                        <th class="style5">Tempat</th>
                        <th class="style5">Tanggal_Surat</th>
                        <th class="style5">Nomor_Surat</th>
                      
                      
                      </tr>
                    </thead>
                   
                    <tbody>
                         <?php 
                                        $no=1;
                                        foreach ($dt_surat_izin_keramaian as $d): ?>
                      <tr>
                        <td class="style5"><?php echo $no++; ?></td>
                        
                        <td class="style5"><?php echo $d['nama']; ?></td>

                        <td class="style5"><?php echo $d['alamat']; ?></td>
                        <td class="style5"><?php echo $d['rt']; ?></td>
                        <td class="style5"><?php echo $d['tempat_lahir']; ?>, <?php echo $d['tanggal_lahir']; ?></td>
                        <td class="style5"><?php echo $d['dalam_rangka']; ?></td>
                        <td class="style5"><?php echo $d['hari']; ?></td>
                        <td class="style5"><?php echo $d['tanggal']; ?></td>
                        <td class="style5"><?php echo $d['tempat']; ?></td>
                        <td class="style5"><?php echo $d['tanggal_surat']; ?></td>
                        <td class="style5"><?php echo $d['no_surat']; ?></td>
                        <td class="style5"><?php echo $d['status']; ?></td>
                      </tr>
                       <?php endforeach; ?>
                    </tbody>
                  </table>
                  <p>
                  <?php endif; ?>

                         <?php if($jenis==10): ?>         
<center>DATA SURAT SKCK</center>
<center><?php echo date("d-m-Y",strtotime($dari)); ?>s/d<?php echo date("d-m-Y",strtotime($sampai)); ?>  </center>
<p/>
                     <table class="saya" width="100%" border="0">
                    <thead class="thead-light">
                      <tr>
                                               <th class="style5">No</th>

                        <th class="style5">Nama Lengkap</th>
                        <th class="style5">Alamat Rmh</th>
                        <th class="style5">RT</th>
                        <th class="style5">TTL</th>
                        <th class="style5">Keperluan</th>
                        <th class="style5">Tanggal_Surat</th>
                        <th class="style5">Nomor_Surat</th>
                        <th class="style5">Status</th>
                   
                      </tr>
                    </thead>
                   
                    <tbody>
                         <?php 
                                        $no=1;
                                        foreach ($dt_surat_skck as $d): ?>
                      <tr>
                        <td class="style5"><?php echo $no++; ?></td>
                        
                        <td class="style5"><?php echo $d['nama']; ?></td>

                        <td class="style5"><?php echo $d['alamat']; ?></td>
                        <td class="style5"><?php echo $d['rt']; ?></td>
                        <td class="style5"><?php echo $d['tempat_lahir']; ?>, <?php echo $d['tanggal_lahir']; ?></td>
                        <td class="style5"><?php echo $d['keperluan']; ?></td>
                        <td class="style5"><?php echo $d['tanggal_surat']; ?></td>
                        <td class="style5"><?php echo $d['no_surat']; ?></td>
                        <td class="style5"><?php echo $d['status']; ?></td>
                      </tr>
                       <?php endforeach; ?>
                    </tbody>
                  </table>
                  <p>
                  <?php endif; ?>

                          <?php if($jenis==11): ?>         
<center>DATA SURAT PENGUSAAN FISIK BIDANG TANAH (BIODEK)</center>
<center><?php echo date("d-m-Y",strtotime($dari)); ?>s/d<?php echo date("d-m-Y",strtotime($sampai)); ?>  </center>
<p/>
                     <table class="saya" width="100%" border="0">
                    <thead class="thead-light">
                      <tr>
                                             <th class="style5">No</th>

                        <th class="style5">Nama Lengkap</th>
                        <th class="style5">Alamat Rmh</th>
                        <th class="style5">RT</th>
                        <th class="style5">TTL</th>
                        <th class="style5">No Penguasaan</th>
                        <th class="style5">Luas Tanah</th>
                        <th class="style5">Tanggal_Surat</th>
                        <th class="style5">Nomor_Surat</th>
                        <th class="style5">Status</th>

                      </tr>
                    </thead>
                   
                    <tbody>
                         <?php 
                                        $no=1;
                                        foreach ($dt_surat_biodek as $d): ?>
                      <tr>
                        <td class="style5"><?php echo $no++; ?></td>
                        
                        <td class="style5"><?php echo $d['nama']; ?></td>

                        <td class="style5"><?php echo $d['alamat']; ?></td>
                        <td class="style5"><?php echo $d['rt']; ?></td>
                        <td class="style5"><?php echo $d['tempat_lahir']; ?>, <?php echo $d['tanggal_lahir']; ?></td>
                        <td class="style5"><?php echo $d['no_tanah']; ?></td>
                        <td class="style5"><?php echo $d['luas_tanah']; ?></td>
                        <td class="style5"><?php echo $d['tanggal_surat']; ?></td>
                        <td class="style5"><?php echo $d['no_surat']; ?></td>
                        <td class="style5"><?php echo $d['status']; ?></td>
                      </tr>
                       <?php endforeach; ?>
                    </tbody>
                  </table>
                  <p>
                  <?php endif; ?>
                    <?php if($jenis==12): ?>         
<center>DATA SURAT KETERANGAN JANDA</center>
<center><?php echo date("d-m-Y",strtotime($dari)); ?>s/d<?php echo date("d-m-Y",strtotime($sampai)); ?>  </center>
<p/>
                     <table class="saya" width="100%" border="0">
                    <thead class="thead-light">
                      <tr>
                                     <th class="style5">No</th>
                                     <th class="style5">Nama_Lngkap</th>
                        <th class="style5">Alamat_Rmh</th>
                        <th class="style5">RT</th>
                        <th class="style5">Tmpt_Tgl_Lahir</th>
                        <th class="style5">Pekerjaan</th>
                        <th class="style5">Tanggal_Surat</th>
                        <th class="style5">Nomor_Surat</th>
                        <th class="style5">Status</th>
                     
                      </tr>
                    </thead>
                   
                    <tbody>
                         <?php 
                                        $no=1;
                                        foreach ($dt_surat_janda as $d): ?>
                      <tr>
                        <td class="style5"><?php echo $no++; ?></td>
                        
                        <td class="style5"><?php echo $d['nama']; ?></td>

                        <td class="style5"><?php echo $d['alamat']; ?></td>
                        <td class="style5"><?php echo $d['rt']; ?></td>
                        <td class="style5"><?php echo $d['tempat_lahir']; ?>, <?php echo $d['tanggal_lahir']; ?></td>
                        <td class="style5"><?php echo $d['pekerjaan']; ?></td>

                        <td class="style5"><?php echo $d['tanggal_surat']; ?></td>
                        <td class="style5"><?php echo $d['no_surat']; ?></td>
                        <td class="style5"><?php echo $d['status']; ?></td>
                      </tr>
                       <?php endforeach; ?>
                    </tbody>
                  </table>
                  <p>
                  <?php endif; ?>

                  <?php if($jenis==13): ?>         
<center>DATA SURAT MASUK</center>
<center><?php echo date("d-m-Y",strtotime($dari)); ?>s/d<?php echo date("d-m-Y",strtotime($sampai)); ?>  </center>
<p/>
                     <table class="saya" width="100%" border="0">
                    <thead class="thead-light">
                      <tr>
                                      <th class="style5">No</th>
                                <th class="style5">No Surat</th>
                                <th class="style5">Perihal</th>
                                <th class="style5">Pengirim</th>
                                <th class="style5">Tgl Surat</th>
                                <th class="style5">Tgl Diterima</th>
                     
                      </tr>
                    </thead>
                   
                    <tbody>
                         <?php 
                                        $no=1;
                                        foreach ($dt_surat_masuk as $d): ?>
                      <tr>
                        <td class="style5"><?php echo $no++; ?></td>
                         <td class="style5"><?php echo $d['no_surat']; ?></td>
                        <td class="style5"><?php echo $d['perihal']; ?></td>
                        <td class="style5"><?php echo $d['pengirim']; ?></td>
                        <td class="style5"><?php echo $d['tgl_surat']; ?></td>
                        <td class="style5"><?php echo $d['tgl_diterima']; ?></td>
                      </tr>
                       <?php endforeach; ?>
                    </tbody>
                  </table>
                  <p>
                  <?php endif; ?>

                  <?php if($jenis==14): ?>         
<center>DATA SURAT KELUAR</center>
<center><?php echo date("d-m-Y",strtotime($dari)); ?>s/d<?php echo date("d-m-Y",strtotime($sampai)); ?>  </center>
<p/>
                     <table class="saya" width="100%" border="0">
                    <thead class="thead-light">
                      <tr>
                                      <th class="style5">No</th>
                                <th class="style5">No Surat</th>
                                <th class="style5">Perihal</th>
                                <th class="style5">Tujuan</th>
                                <th class="style5">Tgl Surat</th>
                                <th class="style5">Tgl Kirim</th>
                     
                      </tr>
                    </thead>
                   
                    <tbody>
                         <?php 
                                        $no=1;
                                        foreach ($dt_surat_keluar as $d): ?>
                      <tr>
                        <td class="style5"><?php echo $no++; ?></td>
                         <td class="style5"><?php echo $d['no_surat']; ?></td>
                        <td class="style5"><?php echo $d['perihal']; ?></td>
                        <td class="style5"><?php echo $d['tujuan']; ?></td>
                        <td class="style5"><?php echo $d['tgl_surat']; ?></td>
                        <td class="style5"><?php echo $d['tgl_kirim_surat']; ?></td>
                      </tr>
                       <?php endforeach; ?>
                    </tbody>
                  </table>
                  <p>
                  <?php endif; ?>

                  <?php
 $ttd = $this->umum->ambil_datarow('ttd_laporan', 'id_ttd',1);
 ?>
 <br />
 <br />
<table width="100%" border="0">
  <tr>
    <td width="85%">&nbsp;</td>
    <td width="15%"> Kertak Hanyar, <?php echo date("d-m-Y"); ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><?= $ttd->jabatan; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><p>&nbsp;</p>

    <p><img src="<?= base_url();?>/upload/file/<?= $ttd->file; ?>" width="<?= $ttd->lebar; ?>px"></p></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><?= $ttd->nama_ttd; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><?= $ttd->nip; ?></td>
  </tr>
</table>