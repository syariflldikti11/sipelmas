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
  <p><strong><u>SURAT KETERANGAN DOMISILI</u></strong>  <br />
   <?php echo $d['no_surat']; ?></p>
</center>
<p/> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Yang bertanda tangan dibawah ini Camat Kertak Hanyar  Kabupaten Banjar, <br /> 
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;  dengan ini menyatakan dengan sebenarnya : <br />
<br>
<table width="100%" border="0">
  <tr>
    <td width="34%" >&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Nama</td>
    <td width="66%" >: <?php echo $d['nama']; ?></td>
  </tr>
  <tr>
    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Jenis Kelamin</td>
    <td>: <?php echo $d['jkelamin']; ?></td>
  </tr>
  <tr>
    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;TTL</td>
    <td>: <?php echo $d['tempat_lahir']; ?>, <?php echo $d['tanggal_lahir']; ?></td>
  </tr>
  <tr>
    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Pekerjaan</td>
    <td>: <?php echo $d['pekerjaan']; ?></td>
  </tr>
  <tr>
    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Alamat</td>
    <td>: <?php echo $d['alamat_domisili']; ?></td>
  </tr>
</table> <br>
<p>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Bahwa nama tersebut di atas sampai saat ini  benar berdomisili di <?php echo $d['alamat_domisili']; ?><br />
  <br />
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Demikian Surat Keterangan Domisili ini dibuat sebagai pengganti Kartu Tanda<br />
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Penduduk ( KTP ) agar dapat dipergunakan sebagaimana mestinya.</p>
<br><br><br>
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
