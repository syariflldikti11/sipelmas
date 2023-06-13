<style>
  .saya
   {
  border : 1px solid black;

  border-collapse: collapse;
}
.style5 {border: 1px solid black; border-collapse: collapse;  }
</style><script>
  window.print();
</script>
<table width="84%" border="0">
  <tr>
    <td width="11%"><img src="<?php echo base_url(); ?>assets\img\logo.png" width="90" height="88" /></td>
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
<center>DATA KTP</center>
<p/>
Tanggal Cetak <?php echo date('d-m-Y'); ?>
<table class="saya" width="100%" border="0">
                    <thead class="thead-light">
                      <tr>
                        <th class="style5">No</th>
                      
                        <th class="style5">NIK</th>
                        <th class="style5">Nama</th>
                         
                          <th class="style5">Alamat</th>
                        <th class="style5">Desa</th>
                        <th class="style5">RT</th>
                        <th class="style5">Agama</th>
                        <th class="style5">Tempat Lahir</th>
                        <th class="style5">Tanggal Lahir</th>
                        <th class="style5">JK</th>
                        <th class="style5">Kewarganegaraan</th>
                        <th class="style5">Pekerjaan</th>
                        <th class="style5">Status Nikah</th>
                        
                        
                      </tr>
                    </thead>
                   
                    <tbody>
                         <?php 
                                        $no=1;
                                        foreach ($dt_ktp as $d): ?>
                      <tr>
                        <td align="center"class="style5"><?php echo $no++; ?></td>
                         <td align="center"class="style5"><?php echo $d['nik']; ?></td>
                        <td align="center"class="style5"><?php echo $d['nama']; ?></td>
                        <td align="center"class="style5"><?php echo $d['alamat']; ?></td>
                        <td align="center"class="style5"><?php echo $d['desa']; ?></td>
                        <td align="center"class="style5"><?php echo $d['rt']; ?></td>
                        <td align="center"class="style5"><?php echo $d['agama']; ?></td>
                        <td align="center"class="style5"><?php echo $d['tempat_lahir']; ?></td>
                        <td align="center"class="style5"><?php echo $d['tanggal_lahir']; ?></td>
                        <td align="center"class="style5"><?php echo $d['jkelamin']; ?></td>
                        <td align="center"class="style5"><?php echo $d['wnegara']; ?></td>
                        <td align="center"class="style5"><?php echo $d['pekerjaan']; ?></td>
                        <td align="center"class="style5"><?php echo $d['snikah']; ?></td>
                     
                       
                      
                        
                    
                      </tr>
                       <?php endforeach; ?>
                    </tbody>
                  </table>
                  <p align="right">&nbsp;</p>
<p align="right">Tanda Tangan Kepala Desa Jaro</p>
<p align="right">&nbsp;</p>
<p align="right">(..............................................)</p>
