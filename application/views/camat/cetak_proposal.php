<style>
  .saya
   {
  border : 1px solid black;

  border-collapse: collapse;
}
.style5 {border: 1px solid black; border-collapse: collapse;  }
</style>  <script>
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
<p>
<center>DATA PENGAJUAN PROPOSAL</center>
<p/>
Tanggal Cetak <?php echo date('d-m-Y'); ?>
<table class="saya" width="100%" border="0">
                    <thead class="thead-light">
                      <tr>
                        <th class="style5">No</th>
                        <th class="style5">NIK</th>
                        <th class="style5">Nama</th>
                          <th class="style5">Alamat</th>
                        <th class="style5">Tanggal</th>
                        <th class="style5">Mengajukan</th>
                        
                        <th class="style5">No Telp</th>
                        <th class="style5">Status</th>
                          
                      </tr>
                    </thead>
                   
                    <tbody>
                         <?php 
                                        $no=1;
                                        foreach ($dt_proposal as $d): ?>
                      <tr>
                        <td align="center"class="style5"><?php echo $no++; ?></td>
                         <td align="center"class="style5"><?php echo $d['nik']; ?></td>
                        <td align="center"class="style5"><?php echo $d['nama']; ?></td>
                        <td align="center"class="style5"><?php echo $d['alamat']; ?></td>
                        <td align="center"class="style5"><?php echo $d['tgl_proposal']; ?></td>
                       
                        <td align="center"class="style5"><?php echo $d['mengajukan']; ?></td>
                      
                        <td align="center"class="style5"><?php echo $d['telp']; ?></td>
                        <td align="center"class="style5"><?php echo $d['status']; ?></td>
                         
                    
                      </tr>
                       <?php endforeach; ?>
                    </tbody>
                  </table>
                 
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