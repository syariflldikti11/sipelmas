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
    <td width="11%"><img src="<?php echo base_url(); ?>assets\img\logobatola.png" width="90" height="88" /></td>
    <td width="89%"><p align="center"><strong>PEMERINTAH KABUPATEN BARITO KUALA<br />
      KECAMATAN MANDASTANA<br />
      <font size="+2">DESA PANTAI HAMBAWANG</font></strong> <br />
      <font size="-2">Jl. Pantai Hambawang RT.04 RW.02 Kecamatan Mandastana Kabupaten Barito Kuala</font> </p></td>
  </tr>
</table>
<br />
<div style='mso-element:para-border-div;border:none;border-top:solid windowtext 3.0pt;
padding:1.0pt 0cm 0cm 0cm'>
<p>&nbsp; </p>
<center>
  <p><strong><u>SURAT KETERANGAN JANDA<br />
          <?php echo $d['no_surat']; ?> </u></strong> </p>
</center>
<br />
<p/>&nbsp;</p>
    
Yang bertanda tangan di bawah ini : <br />
<table width="100%" border="0">
  <tr>
    <td width="41%" >&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Nama</td>
    <td width="59%">: <?php echo $d['nama_peg']; ?></td>
  </tr>
  <tr>
    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Jabatan</td>
    <td>: <?php echo $d['jabatan']; ?></td>
  </tr>
</table>
<p>&emsp;&emsp;&emsp;&emsp;Dengan  ini menerangkan bahwa atas nama:<br />
</p>
<table width="100%" border="0">
  <tr>
    <td >&nbsp;</td>
    <td >NIK</td>
    <td >: <?php echo $d['nik']; ?></td>
  </tr>
  <tr>
    <td width="12%" >&nbsp;</td>
    <td width="29%" >Nama</td>
    <td width="59%" >: <?php echo $d['nama']; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Jenis Kelamin</td>
    <td>: <?php echo $d['jkelamin']; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>TTL</td>
    <td>: <?php echo $d['tempat_lahir']; ?>, <?php echo $d['tanggal_lahir']; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Pekerjaan</td>
    <td>: <?php echo $d['pekerjaan']; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Alamat</td>
    <td>: <?php echo $d['alamat']; ?></td>
  </tr>
</table>
<p>&emsp;&emsp;<br />
  &emsp;&emsp;&emsp;&emsp;Adalah benar nama tersebut diatas sampai saat ini berstatus Janda&emsp;<br>
  <br />
  &emsp;&emsp;&emsp;&emsp;Demikian Surat Keterangan  ini diberikan untuk dapat dipergunakan sebagaimana mestinya.</p>
<br />
<br />
<p align="right">Pantai Hambawang, <?php echo date('d-m-Y');?><br />
    <?php echo $d['jabatan']; ?></p>
<div align="right">
  <?php if($d['status']=='Selesai') :?>
  <img width="100px" src="<?= base_url();?>/assets/images/<?=$d['qrcode']; ?>" />
  <?php endif; ?>
</div>
<p align="right"><?php echo $d['nama_peg']; ?></p>
<p/>&nbsp;</p>
</body>
</html>
