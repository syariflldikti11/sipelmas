</style> <script>
  window.print();
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
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
<center>
  <p><strong><u><?php echo $d['peruntukan']; ?><br />
     <?php echo $d['no_surat']; ?>
  </u></strong>  </p>
</center><br> 
<p/>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Yang bertanda tangan dibawah ini : <p />
 
<table width="100%" border="0">
  <tr>
    <td width="53%">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Nama</td>
    <td width="47%">: <?php echo $d['nama_peg']; ?></td>
  </tr>
  <tr>
    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Jabatan</td>
    <td> : <?php echo $d['jabatan']; ?></td>
  </tr>

 
</table>
<p>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Menerangkan : </p>
<table width="100%" border="0">
  <tr>
    <td width="53%">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Nama</td>
    <td width="47%">: <?php echo $d['nama']; ?></td>
  </tr>
  <tr>
    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;NIK</td>
    <td>: <?php echo $d['nik']; ?></td>
  </tr>
   <tr>
    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Jenis Kelamin</td>
    <td>: <?php echo $d['jkelamin']; ?></td>
  </tr>
  <tr>
    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;TTL</td>
    <td>: <?php echo $d['tempat_lahir']; ?>, <?php echo $d['tanggal_lahir']; ?></td>
  </tr>
   <tr>
    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Warga negara/Agama</td>
    <td>: <?php echo $d['wnegara']; ?>, <?php echo $d['agama']; ?></td>
  </tr>
  <tr>
    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Pekerjaan</td>
    <td>: <?php echo $d['pekerjaan']; ?></td>
  </tr>
  <tr>
    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Alamat</td>
    <td>: <?php echo $d['alamat']; ?></td>
  </tr>
  <tr>
    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Keperluan</td>
    <td>: <?php echo $d['keperluan']; ?></td>
  </tr>
 
</table>
<p>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Bahwa nama yang bersangkutan di atas adalah benar warga Kecamatan Kertak Hanyar dan &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;termasuk keluarga kurang mampu</p>
<p>
  &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Demikian <?php echo $d['peruntukan']; ?> ini dibuat untuk dapat dipergunakan <br /> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;sebagaimana mestinya.</p> <br> 
<p align="right">Kertak Hanyar, <?php echo date('d-m-Y');?><br />
<?php echo $d['jabatan']; ?></p>
<div align="right">
  <?php if($d['status']=='Selesai') :?>
  <img width="100px" src="<?= base_url();?>/assets/images/<?=$d['qrcode']; ?>" />
  <?php endif; ?>
</div>
<p align="right"><?php echo $d['nama_peg']; ?></p>
<p/>

</body>
</html>