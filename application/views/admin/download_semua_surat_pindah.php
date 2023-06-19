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
 
<table width="84%" border="0" >
  <tr>
    <td width="19%"><img src="<?php echo base_url(); ?>assets\img\logo.png" width="90" height="88" /></td>
    <td width="89%"><p align="center"><strong>PEMERINTAH KABUPATEN TABALONG<br /> 
      KECAMATAN JARO<br />
      <font size="+2">KANTOR KEPALA DESA JARO</font></strong> <br />
      <font size="-2">Alamat:Jl. TK Pembina Negeri Jaro RT.15 Desa Jaro Kode Pos 71574</font>      </td>
  </tr>
</table>

<br />
<div style='mso-element:para-border-div;border:none;border-top:solid windowtext 3.0pt;
padding:1.0pt 0cm 0cm 0cm'>
<p>
<center>DATA SURAT PINDAH DATANG</center>
<p/>
Tanggal Cetak <?php echo date('d-m-Y'); ?>

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
                  <p>
<center>DATA SURAT PINDAH KELUAR</center>
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

                    <p align="right"><b>Tanda Tangan Kepala Desa Jaro</b></p>
<p align="right">&nbsp;</p>
<p align="right">(..............................................)</p>