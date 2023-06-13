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
  <p><strong><u>SURAT PERNYATAAN BELUM MENIKAH<br />
     <?php echo $d['no_surat']; ?>
  </u></strong>  </p>
</center> <br>  
<p/>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Yang bertanda tangan dibawah ini :</p> <br>
 
<table width="100%" border="0">
  <tr>
    <td width="45%">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Nama</td>
    <td width="55%">: <?php echo $d['nama']; ?></td>
  </tr>
  <tr>
    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Bin</td>
    <td> : <?php echo $d['bin']; ?></td>
  </tr>
   <tr>
    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Jenis Kelamin</td>
    <td> : <?php echo $d['jkelamin']; ?></td>
  </tr>
  <tr>
    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;TTL</td>
    <td>: <?php echo $d['tempat_lahir']; ?>, <?php echo $d['tanggal_lahir']; ?></td>
  </tr>
   <tr>
    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Agama</td>
    <td>: <?php echo $d['agama']; ?></td>
  </tr>
  <tr>
    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Pekerjaan</td>
    <td>: <?php echo $d['pekerjaan']; ?></td>
  </tr>
  <tr>
    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Alamat</td>
    <td>: <?php echo $d['alamat']; ?></td>
  </tr>
  
 
</table>
<p>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; Dengan ini dalam keadaan sehat jasmani dan rohani menyatakan/menerangkan<br />
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;dengan sebenar-benarnya tanpa adanya paksaan dan tekanan dari siapa pun :<br />
</p>
<p>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;1.      Bahwa sampai saat ini masih berdomisili di Desa : Pantai Hambawang<br />
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;2.      Bahwa saya sampai saat ini betul-betul berstatus : <?php echo $d['status_nikah']; ?> </p>
<p><br />
  &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Apabila dikemudian hari timbul akibat hukum dari keterangan ini, maka saya<br />
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;bersedia diambil tindakan peraturan yang berlaku.</p>
<p><strong>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Pasal 242 (ayat) 1 KUHP yang berbunyi :<br />
  &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Barang siapa dengan sengaja memberi keterangan palsu baik dengan lisan atau tulisan, <br />
  &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;oleh saya sendiri maupun oleh kuasanya yang khusus ditunjuk untuk itu, di ancam<br /> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;dengan 
pidana penjara paling lama tujuh tahun.</strong></p> <br> <br>
<p>Saksi-saksi :</p>
<table width="100%" border="0">
  <tr>
    <td width="7%">1. </td>
    <td width="64%">(.........................................)</td>
    <td width="29%">Pantai Hambawang,<?php echo date('d-m-Y'); ?></td>
  </tr>
  <tr>
    <td>2.</td>
    <td>(.........................................)</td>
    <td><p>Yang Bersangkutan,</p>
    <p>&nbsp;</p>
    <p> <?php echo $d['nama']; ?></p></td>
  </tr>
</table>
<p align="center">Mengetahui,<br />
<?php echo $d['jabatan']; ?></p>
<div align="center">
  <?php if($d['status']=='Selesai') :?>
  <img width="100px" src="<?= base_url();?>/assets/images/<?=$d['qrcode']; ?>" />
  <?php endif; ?>
</div>
<p align="center"><?php echo $d['nama_peg']; ?>&nbsp;</p>
<p align="center">&nbsp;</p>
<p/>

</body>
</html>
