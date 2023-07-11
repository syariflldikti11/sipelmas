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
<div align="right"><br />
</div>
<table width="100%" border="0">
  <tr>
    <td width="14%">Nomor</td>
    <td width="48%">: <?php echo $d['no_surat']; ?></td>
    <td width="38%">Kertak Hanyar, <?php echo date('d-m-Y');?></td>
  </tr>
  <tr>
    <td>Perihal </td>
    <td>: Mohon izin mengumpulkan </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>orang banyak </td>
    <td>Kepada Yth. </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><table border="0" cellspacing="0" cellpadding="0" width="0">
      <tr>
        <td width="593" valign="top"><p>Sektor    Kepolisian Kec. Kertak Hanyar<br />
          Di<br />
            -Tempat <br />
            <br />
        </p></td>
      </tr>
    </table></td>
  </tr>
</table>
<p>Yang bertanda tangan dibawah ini Camat Kertak Hanyar Kabupaten Banjar, dengan ini menerangkan bahwa :</p>
<table width="100%" border="0">
  <tr>
    <td width="9%" >&nbsp;</td>
    <td width="32%" >Nama</td>
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
<br>
<p>Yang  tersebut di atas diberikan kepadanya Surat Pengantar ke Kantor Polsek Kecamatan Kertak Hanyar untuk mendapatkan <strong>izin  keramaian/ mengumpulkan orang banyak, pagi 
</strong> dan <strong>siang hari </strong>dalam rangka <strong><?php echo $d['dalam_rangka']; ?> </strong>yang insyaallah akan dilaksanakan pada:</p>
<table width="100%" border="0">
  <tr>
    <td width="9%">&nbsp;</td>
    <td width="32%">Hari</td>
    <td width="59%">:<?php echo $d['hari']; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Tanggal</td>
    <td>:<?php echo $d['tanggal']; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Tempat</td>
    <td>:<?php echo $d['tempat']; ?></td>
  </tr>
</table>
<p>Demikian surat Permohonan ini disampaikan atas perhatian Bapak kami  ucapkan terima kasih</p>
<table width="100%" border="0">
  <tr>
    <td width="50%"><div align="center"></div></td>
    <td width="50%"><div align="center">
      <p>&nbsp;</p>
      <p>Mengetahui,</p>
    </div></td>
  </tr>
  <tr>
    <td><div align="center">Yang Memohon </div></td>
    <td><div align="center"><?php echo $d['jabatan']; ?></div></td>
  </tr>
  <tr>
    <td><p align="center">&nbsp;</p>
      <p align="center">&nbsp;</p>
      <div align="center"><?php echo $d['nama']; ?></div></td>
    <td><div align="center">
  <?php if($d['status']=='Selesai') :?>
  <img width="100px" src="<?= base_url();?>/assets/images/<?=$d['qrcode']; ?>" />
  <?php endif; ?>
</div>
    <p align="center"><?php echo $d['nama_peg']; ?></p></td>
  </tr>
</table>
<br><br><br>
<p align="right">&nbsp;</p>
</body>
</html>
