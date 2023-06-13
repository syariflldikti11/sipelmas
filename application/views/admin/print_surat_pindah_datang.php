</style> <script>
  window.print();
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<style>
  .saya
   {
  border : 1px solid black;

  border-collapse: collapse;
}
.style5 {border: 1px solid black; border-collapse: collapse;  }
.box1{
width:350px;
height:20px;
border:1px solid;
padding-left: 3px;
}
.box2{
width:510px;
height:20px;
border:1px solid;
padding-left: 3px;
}
.box3{
width:200px;
height:20px;
border:1px solid;
padding-left: 3px;
}
.box4{
width:35px;
height:20px;
border:1px solid;
padding-left: 3px;
}
.box5{
width:190px;
height:20px;
border:1px solid;
padding-left: 3px;
}
.box6{
width:300px;
height:20px;
border:1px solid;
padding-left: 3px;
}
.box7{
width:50px;
height:20px;
border:1px solid;
padding-left: 3px;
}
.box8{
width:200px;
height:20px;
border:1px solid;
padding-left: 3px;
}
.box9{
width:70px;
height:20px;
border:1px solid;
padding-left: 3px;
}


</style>
<body>
<table width="100%" border="0">
  <tr>
    <td width="89%">&nbsp;</td>
    
  </tr>
</table>
<br />
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
<table width="100%" border="0">
  <tr>
    <td width="18%"><strong>PROVINSI</strong></td>
    <td width="82%">: Kalimantan Selatan</td>
  </tr>
  <tr>
    <td><strong>KABUPATEN/KOTA</strong></td>
    <td>: Barito Kuala</td>
  </tr>
  <tr>
    <td><strong>KECAMATAN</strong></td>
    <td>: Mandastana</td>
  </tr>
  <tr>
    <td><strong>DESA/KELURAHAN</strong></td>
    <td>: Pantai Hambawang</td>
  </tr>
  <tr>
    <td><strong>DUSUN/DUKUH/KAMPUNG</strong></td>
    <td>:</td>
  </tr>
</table>
<p>
<center>
  <strong><font size="+1"> <?php if ($d['jenis_permohonan']!='Antar Kabupaten/Kota Atau Provinsi') echo  "SURAT KETERANGAN PINDAH DATANG";
  else {
   echo  "FORMULIR PERMOHONAN PINDAH DATANG";  
  } ?></font></strong><br />
  <strong><u><?php echo $d['jenis_permohonan']; ?><br />
     <?php echo $d['no_surat']; ?>
  </u></strong>  </p>
</center>
<p/>
<p><font size="+3"><strong>DATA DAERAH ASAL</strong></font></p>
<table width="100%" border="0">
  <tr>
    <td width="22%">1. Nomor Kartu Keluarga</td>
    <td colspan="6"><div class="box1"> <?php echo $d['no_kk']; ?></div></td>
  </tr>
  <tr>
    <td>2. Nama Kepala Keluarga</td>
    <td colspan="6"><div class="box2"> <?php echo $d['nama_kk']; ?></div></td>
  </tr>
  <tr>
    <td>3. Alamat</td>
    <td width="30%" colspan="2"><div class="box3"> <?php echo $d['alamat_awal']; ?></div></td>
    <td width="14%">RT</td>
    <td width="13%"><div class="box4"> <?php echo $d['rt_awal']; ?></div></td>
    <td width="6%">RW</td>
    <td width="15%"><div class="box4"> <?php echo $d['rw_awal']; ?></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2">Dusun/Dukuh/Kampung </td>
    <td colspan="4"><div class="box6"> <?php echo $d['dusun_awal']; ?></div></td>
  </tr>
  <tr>
    <td>&ensp;a. Desa/Kelurahan</td>
    <td colspan="2"><div class="box3"> <?php echo $d['desa_awal']; ?></div></td>
    <td>c. Kab/Kota</td>
    <td colspan="3"><div class="box3"> <?php echo $d['kab_awal']; ?></div></td>
  </tr>
  <tr>
    <td>&ensp;b. Kecamatan</td>
    <td colspan="2"><div class="box3"> <?php echo $d['kec_awal']; ?></div></td>
    <td>d. Provinsi</td>
    <td colspan="3"><div class="box3"> <?php echo $d['prov_awal']; ?></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Kode Pos</td>
    <td><div class="box7"><?php echo $d['pos_awal']; ?></div></td>
    <td>Telp</td>
    <td colspan="3"><div class="box8"><?php echo $d['telp_awal']; ?></div></td>
  </tr>
  <tr>
    <td>4. NIK Pemohon</td>
    <td colspan="6"><div class="box1"> <?php echo $d['nik']; ?></div></td>
  </tr>
  <tr>
    <td>5. Nama Lengkap</td>
    <td colspan="6"><div class="box2"> <?php echo $d['nama']; ?></div></td>
  </tr>
</table>
<p><font size="+3"><strong>DATA DAERAH TUJUAN</strong></font></p>
<table width="100%" border="0">
  <tr>
    <td>1. Alasan Pindah</td>
    <td><div class="box4"><?php if ($d['alasan_pindah']=='Pekerjaan') echo  "1"; ?>
      <?php if ($d['alasan_pindah']=='Keamanan') echo  "3"; ?>
      <?php if ($d['alasan_pindah']=='Perumahan') echo  "5"; ?>
      <?php if ($d['alasan_pindah']=='Lainnya') echo  "7"; ?>
      <?php if ($d['alasan_pindah']=='Pendidikan') echo  "2"; ?>
      <?php if ($d['alasan_pindah']=='Kesehatan') echo  "4"; ?>
      <?php if ($d['alasan_pindah']=='Keluarga') echo  "6"; ?>
    </div></td>
    <td>1. Pekerjaan</td>
    <td>3. Keamanan</td>
    <td colspan="2">5. Perumahan</td>
    <td>7. Lainnya...</td>
  </tr>
  <tr>
    <td>&ensp;Bagi yang Pindah</td>
    <td>&nbsp;</td>
    <td>2. Pendidikan</td>
    <td>4. Kesehatan</td>
    <td colspan="2">6. Keluarga</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="438">2. Alamat Tujuan</td>
    <td colspan="2"><div class="box3"> <?php echo $d['alamat_pindah']; ?></div></td>
    <td width="145">RT</td>
    <td width="130"><div class="box4"> <?php echo $d['rt_pindah']; ?></div></td>
    <td width="75">RW</td>
    <td width="195"><div class="box4"> <?php echo $d['rw_pindah']; ?></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2">Dusun/Dukuh/Kampung </td>
    <td colspan="4"><div class="box6"> <?php echo $d['dusun_pindah']; ?></div></td>
  </tr>
  <tr>
    <td>&ensp;a. Desa/Kelurahan</td>
    <td colspan="2"><div class="box3"> <?php echo $d['desa_pindah']; ?></div></td>
    <td>c. Kab/Kota</td>
    <td colspan="3"><div class="box3"> <?php echo $d['kab_pindah']; ?></div></td>
  </tr>
  <tr>
    <td>&ensp;b. Kecamatan</td>
    <td colspan="2"><div class="box3"> <?php echo $d['kec_pindah']; ?></div></td>
    <td>d. Provinsi</td>
    <td colspan="3"><div class="box3"> <?php echo $d['prov_pindah']; ?></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td width="55">Kode Pos</td>
    <td width="170"><div class="box7"><?php echo $d['pos_pindah']; ?></div></td>
    <td>Telp</td>
    <td colspan="3"><div class="box8"><?php echo $d['telp_pindah']; ?></div></td>
  </tr>
  <tr>
    <td>3. Jenis Kepindahan</td>
    <td><div class="box4">
      <?php if ($d['jenis_kepindahan']=='Kepala Keluarga') echo  "1"; ?>
        <?php if ($d['jenis_kepindahan']=='Kepala Keluarga dan seluruh agt. Keluarga') echo  "2"; ?>
        <?php if ($d['jenis_kepindahan']=='Kepala Keluarga dan sebagian agt. Keluarga') echo  "3"; ?>
        <?php if ($d['jenis_kepindahan']=='Anggota Keluarga') echo  "4"; ?>
    </div></td>
    <td colspan="2"><p>1. Kepala Keluarga<br />
    </p>    </td>
    <td colspan="3">3. Kepala Keluarga dan sbg agt. Keluarga<br /></td>
  </tr>
  <tr>
    <td>4. Status KK Bagi</td>
    <td><div class="box4">
      <?php if ($d['status_kk_tidak_pindah']=='Numpang KK') echo  "1"; ?>
      <?php if ($d['status_kk_tidak_pindah']=='Membuat KK Baru') echo  "2"; ?>
      <?php if ($d['status_kk_tidak_pindah']=='Nomor KK Tetap') echo  "3"; ?>
      
    </div></td>
    <td>1. Numpang KK</td>
    <td colspan="3">2. Membuat KK Baru</td>
    <td>3. No KK Tetap</td>
  </tr>
  <tr>
    <td>&ensp;Yang Tidak Pindah</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td>5. Status KK Bagi</td>
    <td><div class="box4">
      <?php if ($d['status_kk_pindah']=='Numpang KK') echo  "1"; ?>
      <?php if ($d['status_kk_pindah']=='Membuat KK Baru') echo  "2"; ?>
      <?php if ($d['status_kk_pindah']=='Nomor KK Tetap') echo  "3"; ?>
      
    </div></td>
    <td>1. Numpang KK</td>
    <td colspan="3">2. Membuat KK Baru</td>
    <td>3. No KK Tetap</td>
  </tr>
   <tr>
     <td>&ensp;Yang  Pindah</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td colspan="2">&nbsp;</td>
     <td>&nbsp;</td>
   </tr>
  <tr>
    <td colspan="7">6. Keluarga Yang Pindah</td>
  </tr>
</table>
<table width="100%" border="0" class="saya">
  <tr>
    <td class="style5" width="3%"><div align="center">No</div></td>
    <td class="style5" width="35%"><div align="center">NIK</div></td>
    <td class="style5" width="32%"><div align="center">NAMA</div></td>
    <td class="style5" width="10%"><div align="center">MASA BERLAKU KTP</div></td>
    <td class="style5" colspan="2"><div align="center">SHDK</div></td>
  </tr>
  <tr>
    <td class="style5"><div align="center">1</div></td>
    <td class="style5"><?php echo $d['nik1']; ?></td>
    <td class="style5"><?php echo $d['nama1']; ?></td>
    <td class="style5">&nbsp;</td>
    <td class="style5" width="10%">&nbsp;</td>
    <td class="style5" width="10%">&nbsp;</td>
  </tr>
  <tr>
    <td class="style5"><div align="center">2</div></td>
    <td class="style5"><?php echo $d['nik2']; ?></td>
    <td class="style5"><?php echo $d['nama2']; ?></td>
    <td class="style5">&nbsp;</td>
    <td class="style5">&nbsp;</td>
    <td class="style5">&nbsp;</td>
  </tr>
  <tr>
    <td class="style5"><div align="center">3</div></td>
    <td class="style5"><?php echo $d['nik3']; ?></td>
    <td class="style5"><?php echo $d['nama3']; ?></td>
    <td class="style5">&nbsp;</td>
    <td class="style5">&nbsp;</td>
    <td class="style5">&nbsp;</td>
  </tr>
  <tr>
    <td class="style5"><div align="center">4</div></td>
    <td class="style5"><?php echo $d['nik4']; ?></td>
    <td class="style5"><?php echo $d['nama4']; ?></td>
    <td class="style5">&nbsp;</td>
    <td class="style5">&nbsp;</td>
    <td class="style5">&nbsp;</td>
  </tr>
  <tr>
    <td class="style5"><div align="center">5</div></td>
    <td class="style5"><?php echo $d['nik5']; ?></td>
    <td class="style5"><?php echo $d['nama5']; ?></td>
    <td class="style5">&nbsp;</td>
    <td class="style5">&nbsp;</td>
    <td class="style5">&nbsp;</td>
  </tr>
  <tr>
    <td class="style5"><div align="center">6</div></td>
    <td class="style5"><?php echo $d['nik6']; ?></td>
    <td class="style5"><?php echo $d['nama6']; ?></td>
    <td class="style5">&nbsp;</td>
    <td class="style5">&nbsp;</td>
    <td class="style5">&nbsp;</td>
  </tr>
  <tr>
    <td class="style5"><div align="center">7</div></td>
    <td class="style5"><?php echo $d['nik7']; ?></td>
    <td class="style5"><?php echo $d['nama7']; ?></td>
    <td class="style5">&nbsp;</td>
    <td class="style5">&nbsp;</td>
    <td class="style5">&nbsp;</td>
  </tr>
</table>
<br />
<p align="right">Pantai Hambawang, <?php echo date('d-m-Y');?><br />
  Dikeluarkan Oleh :<br />
  a.n Kepala Dinas Kependudukan dan Catatan Sipil<br />
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
