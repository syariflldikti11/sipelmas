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
<center>DATA PEGAWAI</center>
<p/>
Tanggal Cetak <?php echo date('d-m-Y'); ?>
<table class="saya" width="100%" border="0">
                    <thead class="thead-light">
                      <tr>
                        <th class="style5">No</th>
                      
                        <th class="style5">Nama</th>
                          <th class="style5">Jabataan</th>
                          <th class="style5">Alamat</th>
                        <th class="style5">No HP</th>
                        <th class="style5">No WA</th>
                        
                        
                      </tr>
                    </thead>
                   
                    <tbody>
                         <?php 
                                        $no=1;
                                        foreach ($dt_pegawai as $d): ?>
                      <tr>
                        <td align="center"class="style5"><?php echo $no++; ?></td>
                         <td align="center"class="style5"><?php echo $d['nama_peg']; ?></td>
                        <td align="center"class="style5"><?php echo $d['jabatan']; ?></td>
                        <td align="center"class="style5"><?php echo $d['alamat_peg']; ?></td>
                        <td align="center"class="style5"><?php echo $d['telp_peg']; ?></td>

                        <td align="center"class="style5"><?php echo $d['wa_peg']; ?></td>
                     
                       
                      
                        
                    
                      </tr>
                       <?php endforeach; ?>
                    </tbody>
                  </table>
               
