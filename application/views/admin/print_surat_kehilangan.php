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
      <font size="-2">Jl. Pantai Hambawang RT.04 RW.02 Kecamatan Mandastana Kabupaten Barito Kuala</font>      </td>
  </tr>
</table>
<br />
<div style='mso-element:para-border-div;border:none;border-top:solid windowtext 3.0pt;
padding:1.0pt 0cm 0cm 0cm'>
<p>
<center>
  <p><strong><u>SURAT KETERANGAN KEHILANGAN<br />
     <?php echo $d['no_surat']; ?>
  </u></strong>  </p>
</center> <br>  
<p/>
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Yang bertanda tangan di bawah ini Kepala Desa Pantai Hambawang Kecamatan Mandastana<br />
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Kabupaten Barito Kuala, dengan ini menerangkan bahwa :<br />
<table width="100%" border="0">
  <tr>
    <td >&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Nama</td>
    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;: <?php echo $d['nama']; ?></td>
  </tr>
  <tr>
    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;TTL</td>
    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; : <?php echo $d['tempat_lahir']; ?>, <?php echo $d['tanggal_lahir']; ?></td>
  </tr>
  <tr>
    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Pekerjaan</td>
    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; : <?php echo $d['pekerjaan']; ?></td>
  </tr>
  <tr>
    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Alamat</td>
    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; : <?php echo $d['alamat']; ?></td>
  </tr>
   
</table>
<p>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Orang tersebut kehilangan <?php echo $d['kehilangan']; ?> </p>
<table width="100%" border="0">
  <tr>
    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Tanggal</td>
    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;: <?php echo $d['tgl_kehilangan']; ?></td>
  </tr>
  <tr>
    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Tempat</td>
    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; : <?php echo $d['tempat']; ?></td>
  </tr>
  
 
</table>
<p>&emsp;&emsp;<br />
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Demikian Surat Keterangan Kehilangan ini dibuat untuk dapat dipergunakan sebagaimana &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;mestinya.</p> <br> <br>  
<p align="right">Pantai Hambawang, <?php echo date('d-m-Y');?><br />
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
