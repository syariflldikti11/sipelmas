
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php 
$qr_surat_domisili = $this->umum->qr_surat_domisili($id);
        if ($qr_surat_domisili->num_rows() != 0) {
            echo "Valid";
        }
        else
        {
          echo "";
        }
        $qr_surat_belum_menikah = $this->umum->qr_surat_belum_menikah($id);
        if ($qr_surat_belum_menikah->num_rows() != 0) {
            echo "Valid";
        }
        else
        {
          echo "";
        }
        $qr_surat_biodek = $this->umum->qr_surat_biodek($id);
        if ($qr_surat_biodek->num_rows() != 0) {
            echo "Valid";
        }
        else
        {
          echo "";
        }
        $qr_surat_izin_keramaian = $this->umum->qr_surat_izin_keramaian($id);
        if ($qr_surat_izin_keramaian->num_rows() != 0) {
            echo "Valid";
        }
        else
        {
          echo "";
        }
        $qr_surat_janda = $this->umum->qr_surat_janda($id);
        if ($qr_surat_janda->num_rows() != 0) {
            echo "Valid";
        }
        else
        {
          echo "";
        }
        $qr_surat_kehilangan = $this->umum->qr_surat_kehilangan($id);
        if ($qr_surat_kehilangan->num_rows() != 0) {
            echo "Valid";
        }
        else
        {
          echo "";
        }
        $qr_surat_kematian = $this->umum->qr_surat_kematian($id);
        if ($qr_surat_kematian->num_rows() != 0) {
            echo "Valid";
        }
        else
        {
          echo "";
        }
         $qr_surat_kurang_mampu = $this->umum->qr_surat_kurang_mampu($id);
        if ($qr_surat_kurang_mampu->num_rows() != 0) {
            echo "Valid";
        }
        else
        {
          echo "";
        }
         $qr_surat_pindah_datang = $this->umum->qr_surat_pindah_datang($id);
        if ($qr_surat_pindah_datang->num_rows() != 0) {
            echo "Valid";
        }
        else
        {
          echo "";
        }
         $qr_surat_pindah_keluar = $this->umum->qr_surat_pindah_keluar($id);
        if ($qr_surat_pindah_keluar->num_rows() != 0) {
            echo "Valid";
        }
        else
        {
          echo "";
        }
         $qr_surat_skck = $this->umum->qr_surat_skck($id);
        if ($qr_surat_skck->num_rows() != 0) {
            echo "Valid";
        }
        else
        {
          echo "";
        }
         $qr_surat_usaha = $this->umum->qr_surat_usaha($id);
        if ($qr_surat_usaha->num_rows() != 0) {
            echo "Valid";
        }
        else
        {
          echo "";
        }
?>
</body>
</html>
