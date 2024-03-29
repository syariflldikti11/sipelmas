<?php
	//----------------- CLASS MODELS -----------------------------
class Umum extends CI_model{
	 function qr_surat_domisili($id)

		 {
	 
			 return $this->db->get_where('surat_domisili',array('id_surat_domisili'=>$id));
	 
		 }
		  function qr_surat_belum_menikah($id)

		 {
	 
			 return $this->db->get_where('surat_belum_menikah',array('id_surat_belum_menikah'=>$id));
	 
		 }
		   function qr_surat_biodek($id)

		 {
	 
			 return $this->db->get_where('surat_biodek',array('id_surat_biodek'=>$id));
	 
		 }
		   function qr_surat_izin_keramaian($id)

		 {
	 
			 return $this->db->get_where('surat_izin_keramaian',array('id_surat_izin_keramaian'=>$id));
	 
		 }
		   function qr_surat_janda($id)

		 {
	 
			 return $this->db->get_where('surat_janda',array('id_surat_janda'=>$id));
	 
		 }
		   function qr_surat_kehilangan($id)

		 {
	 
			 return $this->db->get_where('surat_kehilangan',array('id_surat_kehilangan'=>$id));
	 
		 }
		   function qr_surat_kematian($id)

		 {
	 
			 return $this->db->get_where('surat_kematian',array('id_surat_kematian'=>$id));
	 
		 }
		   function qr_surat_kurang_mampu($id)

		 {
	 
			 return $this->db->get_where('surat_kurang_mampu',array('id_surat_kurang_mampu'=>$id));
	 
		 }
		   function qr_surat_pindah_datang($id)

		 {
	 
			 return $this->db->get_where('surat_pindah_datang',array('id_surat_pindah_datang'=>$id));
	 
		 }
		   function qr_surat_pindah_keluar($id)

		 {
	 
			 return $this->db->get_where('surat_pindah_keluar',array('id_surat_pindah_keluar'=>$id));
	 
		 }
		   function qr_surat_skck($id)

		 {
	 
			 return $this->db->get_where('surat_skck',array('id_surat_skck'=>$id));
	 
		 }
		   function qr_surat_usaha($id)

		 {
	 
			 return $this->db->get_where('surat_usaha',array('id_surat_usaha'=>$id));
	 
		 }


public function hitung_pengaduan()
{   
		$this->db->select('*');
		$this->db->from('pengaduan');
		$this->db->where('pengaduan.balasan=""');
		
    $query = $this->db->get();
    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
}
public function hitung($tabel)
{   
   $query = $this->db->get($tabel);
    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
}
public function hitung_lagi($tabel)
{   
  $this->db->select('*');
		$this->db->from($tabel);
		$this->db->where('status !="Ditolak"');
		
    $query = $this->db->get();
    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
}
public function hitung_surat($tabel, $kolom = FALSE, $id = FALSE)
{   
$query = $this->db->get_where($tabel, array($kolom => $id));
    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
}
public function hitung_surat_pending($tabel, $kolom = FALSE, $id = FALSE)
{   
$query = $this->db->get_where($tabel, array($kolom = $id));
    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
}

function get_peserta($id)
	{		
	   
		$this->db->select('*');
	   $this->db->from('peserta_penugasan a');
		$this->db->join('penugasan b','a.id_penugasan=b.id_penugasan','left');
			$this->db->join('pegawai c','a.id_pegawai=c.id_pgw','left');
				$this->db->where('a.id_penugasan',$id);
	   $query = $this->db->get();
	   return $query->result();
	}
	function get_user()
	{		
	   
		$this->db->select('*');
	   $this->db->from('pengguna a');
		$this->db->join('pegawai b','a.id_pegawai=b.id_pgw','left');

	   $query = $this->db->get();
	   return $query->result_array();
	}
	function get_pengaduan()
	{		
	   
		$this->db->select('*');
	   $this->db->from('pengaduan');
	   $this->db->order_by('tgl_pengaduan desc');
	
	   $query = $this->db->get();
	   return $query->result();
	}
function grafik_pengaduan()
 {
 $tgl=date('Y');
  $sql= $this->db->query("
  
  select distinct
  ifnull((SELECT count(id_pengaduan) FROM pengaduan WHERE((Month(tgl_pengaduan)=1)AND (YEAR(tgl_pengaduan)='$tgl'))),0) AS 'Januari',
  ifnull((SELECT count(id_pengaduan) FROM pengaduan WHERE((Month(tgl_pengaduan)=2)AND (YEAR(tgl_pengaduan)=$tgl))),0) AS 'Februari',
  ifnull((SELECT count(id_pengaduan) FROM pengaduan WHERE((Month(tgl_pengaduan)=3)AND (YEAR(tgl_pengaduan)=$tgl))),0) AS 'Maret',
  ifnull((SELECT count(id_pengaduan) FROM pengaduan WHERE((Month(tgl_pengaduan)=4)AND (YEAR(tgl_pengaduan)=$tgl))),0) AS 'April',
  ifnull((SELECT count(id_pengaduan) FROM pengaduan WHERE((Month(tgl_pengaduan)=5)AND (YEAR(tgl_pengaduan)=$tgl))),0) AS 'Mei',
  ifnull((SELECT count(id_pengaduan) FROM pengaduan WHERE((Month(tgl_pengaduan)=6)AND (YEAR(tgl_pengaduan)=$tgl))),0) AS 'Juni',
  ifnull((SELECT count(id_pengaduan) FROM pengaduan WHERE((Month(tgl_pengaduan)=7)AND (YEAR(tgl_pengaduan)=$tgl))),0) AS 'Juli',
  ifnull((SELECT count(id_pengaduan) FROM pengaduan WHERE((Month(tgl_pengaduan)=8)AND (YEAR(tgl_pengaduan)=$tgl))),0) AS 'Agustus',
  ifnull((SELECT count(id_pengaduan) FROM pengaduan WHERE((Month(tgl_pengaduan)=9)AND (YEAR(tgl_pengaduan)=$tgl))),0) AS 'September',
  ifnull((SELECT count(id_pengaduan) FROM pengaduan WHERE((Month(tgl_pengaduan)=10)AND (YEAR(tgl_pengaduan)=$tgl))),0) AS 'Oktober',
  ifnull((SELECT count(id_pengaduan) FROM pengaduan WHERE((Month(tgl_pengaduan)=11)AND (YEAR(tgl_pengaduan)=$tgl))),0) AS 'November',
  ifnull((SELECT count(id_pengaduan) FROM pengaduan WHERE((Month(tgl_pengaduan)=12)AND (YEAR(tgl_pengaduan)=$tgl))),0) AS 'Desember'
 from pengaduan GROUP BY YEAR(tgl_pengaduan) 
  
  ");
  
  return $sql;
  
 }
 function grafik_respon()
 {
 $tgl=date('Y');
  $sql= $this->db->query("
  
  select distinct
  ifnull((SELECT count(id_pengaduan) FROM pengaduan WHERE((Month(tgl_pengaduan)=1)AND balasan !='NULL' and (YEAR(tgl_pengaduan)='$tgl'))),0) AS 'Januari',
  ifnull((SELECT count(id_pengaduan) FROM pengaduan WHERE((Month(tgl_pengaduan)=2)AND balasan !='NULL' and (YEAR(tgl_pengaduan)=$tgl))),0) AS 'Februari',
  ifnull((SELECT count(id_pengaduan) FROM pengaduan WHERE((Month(tgl_pengaduan)=3)AND balasan !='NULL' and (YEAR(tgl_pengaduan)=$tgl))),0) AS 'Maret',
  ifnull((SELECT count(id_pengaduan) FROM pengaduan WHERE((Month(tgl_pengaduan)=4)AND balasan !='NULL' and (YEAR(tgl_pengaduan)=$tgl))),0) AS 'April',
  ifnull((SELECT count(id_pengaduan) FROM pengaduan WHERE((Month(tgl_pengaduan)=5)AND balasan !='NULL' and (YEAR(tgl_pengaduan)=$tgl))),0) AS 'Mei',
  ifnull((SELECT count(id_pengaduan) FROM pengaduan WHERE((Month(tgl_pengaduan)=6)AND balasan !='NULL' and (YEAR(tgl_pengaduan)=$tgl))),0) AS 'Juni',
  ifnull((SELECT count(id_pengaduan) FROM pengaduan WHERE((Month(tgl_pengaduan)=7)AND balasan !='NULL' and (YEAR(tgl_pengaduan)=$tgl))),0) AS 'Juli',
  ifnull((SELECT count(id_pengaduan) FROM pengaduan WHERE((Month(tgl_pengaduan)=8)AND balasan !='NULL' and (YEAR(tgl_pengaduan)=$tgl))),0) AS 'Agustus',
  ifnull((SELECT count(id_pengaduan) FROM pengaduan WHERE((Month(tgl_pengaduan)=9)AND balasan !='NULL' and (YEAR(tgl_pengaduan)=$tgl))),0) AS 'September',
  ifnull((SELECT count(id_pengaduan) FROM pengaduan WHERE((Month(tgl_pengaduan)=10)AND balasan !='NULL' and (YEAR(tgl_pengaduan)=$tgl))),0) AS 'Oktober',
  ifnull((SELECT count(id_pengaduan) FROM pengaduan WHERE((Month(tgl_pengaduan)=11)AND balasan !='NULL' and (YEAR(tgl_pengaduan)=$tgl))),0) AS 'November',
  ifnull((SELECT count(id_pengaduan) FROM pengaduan WHERE((Month(tgl_pengaduan)=12)AND balasan !='NULL' and (YEAR(tgl_pengaduan)=$tgl))),0) AS 'Desember'
 from pengaduan GROUP BY YEAR(tgl_pengaduan) 
  
  ");
  
  return $sql;
  
 }  

function get_ktp()
	{
		$a=$this->session->userdata('ses_id');
		$this->db->select('*');
		$this->db->from('ktp');
		$this->db->where('ktp.nik',$a);
	
		$query = $this->db->get();
		return $query->result_array();
	}
function ambil_ktp()
	{
		$a=$this->session->userdata('ses_id');
		$this->db->select('*');
		$this->db->from('pengunjung');
		$this->db->join('ktp','pengunjung.nik=ktp.nik','');
		$this->db->where('ktp.nik',$a);
	
		$query = $this->db->get();
		return $query->result_array();
	}
	function pengaduan_baru()
	{
		$a=$this->session->userdata('ses_id');
		$this->db->select('*');
		$this->db->from('pengaduan');
		$this->db->join('ktp','pengaduan.id_ktp=ktp.id_ktp','');
		$this->db->limit(5);
		
	
		$query = $this->db->get();
		return $query->result_array();
	}
function pengaduan()
	{
		$a=$this->session->userdata('ses_id');
		$this->db->select('*');
		$this->db->from('pengaduan');
		$this->db->join('ktp','pengaduan.id_ktp=ktp.id_ktp','');
		$this->db->where('ktp.nik',$a);

	
		$query = $this->db->get();
		return $query->result_array();
	}
	function pengaduan_masyarakat()
	{
		$a=$this->session->userdata('ses_id');
		$this->db->select('*');
		$this->db->from('pengaduan');
		$this->db->join('ktp','pengaduan.id_ktp=ktp.id_ktp','');
		$this->db->limit(5);
		

	
		$query = $this->db->get();
		return $query->result_array();
	}
	function get_penugasan()
	{
		$a=$this->session->userdata('ses_id');
		$this->db->select('*');
		$this->db->from('penugasan a');
		$this->db->join('jenis_kegiatan c','a.id_jenis_kegiatan=c.id_jenis_kegiatan','');
	
		$query = $this->db->get();
		return $query->result();
	}
	function pengajuan_blt()
	{
		$a=$this->session->userdata('ses_id');
		$this->db->select('*');
		$this->db->from('pengajuan_blt');
		$this->db->join('ktp','pengajuan_blt.id_ktp=ktp.id_ktp','');
		$this->db->where('ktp.nik',$a);
	
		$query = $this->db->get();
		return $query->result_array();
	}

	function admin_penerima_blt()
	{
		$a=$this->session->userdata('ses_id');
		$this->db->select('*');
		$this->db->from('pengajuan_blt');
		$this->db->join('ktp','pengajuan_blt.id_ktp=ktp.id_ktp','');
			$this->db->where('pengajuan_blt.status="Diterima"');
	
		$query = $this->db->get();
		return $query->result_array();
	}
function proposal()
	{
		$a=$this->session->userdata('ses_id');
		$this->db->select('*');
		$this->db->from('proposal');
		$this->db->join('ktp','proposal.id_ktp=ktp.id_ktp','');
		$this->db->where('ktp.nik',$a);
	
		$query = $this->db->get();
		return $query->result_array();
	}
	function surat_janda()
	{
		$a=$this->session->userdata('ses_id');
		$this->db->select('*');
		$this->db->from('surat_janda');
		$this->db->join('ktp','surat_janda.id_ktp=ktp.id_ktp','');
		$this->db->where('ktp.nik',$a);
	
		$query = $this->db->get();
		return $query->result_array();
	}
function surat_kematian()
	{
		$a=$this->session->userdata('ses_id');
		$this->db->select('*');
		$this->db->from('surat_kematian');
		$this->db->join('ktp','surat_kematian.id_ktp=ktp.id_ktp','');
		$this->db->where('ktp.nik',$a);
	
		$query = $this->db->get();
		return $query->result_array();
	}
	function surat_skck()
	{
		$a=$this->session->userdata('ses_id');
		$this->db->select('*');
		$this->db->from('surat_skck');
		$this->db->join('ktp','surat_skck.id_ktp=ktp.id_ktp','');
		$this->db->where('ktp.nik',$a);
	
		$query = $this->db->get();
		return $query->result_array();
	}
	function surat_biodek()
	{
		$a=$this->session->userdata('ses_id');
		$this->db->select('*');
		$this->db->from('surat_biodek');
		$this->db->join('ktp','surat_biodek.id_ktp=ktp.id_ktp','');
		$this->db->where('ktp.nik',$a);
	
		$query = $this->db->get();
		return $query->result_array();
	}
	function surat_izin_keramaian()
	{
		$a=$this->session->userdata('ses_id');
		$this->db->select('*');
		$this->db->from('surat_izin_keramaian');
		$this->db->join('ktp','surat_izin_keramaian.id_ktp=ktp.id_ktp','');
		$this->db->where('ktp.nik',$a);
	
		$query = $this->db->get();
		return $query->result_array();
	}
	function admin_surat_skck()
	{
		$a=$this->session->userdata('ses_id');
		$this->db->select('*');
		$this->db->from('surat_skck');
		$this->db->join('ktp','surat_skck.id_ktp=ktp.id_ktp','');

	
		$query = $this->db->get();
		return $query->result_array();
	}
	function admin_surat_janda()
	{
		$a=$this->session->userdata('ses_id');
		$this->db->select('*');
		$this->db->from('surat_janda');
		$this->db->join('ktp','surat_janda.id_ktp=ktp.id_ktp','');

	
		$query = $this->db->get();
		return $query->result_array();
	}
	function admin_surat_biodek()
	{
		$a=$this->session->userdata('ses_id');
		$this->db->select('*');
		$this->db->from('surat_biodek');
		$this->db->join('ktp','surat_biodek.id_ktp=ktp.id_ktp','');

	
		$query = $this->db->get();
		return $query->result_array();
	}
	function surat_belum_menikah()
	{
		$a=$this->session->userdata('ses_id');
		$this->db->select('*');
		$this->db->from('surat_belum_menikah');
		$this->db->join('ktp','surat_belum_menikah.id_ktp=ktp.id_ktp','');
		$this->db->where('ktp.nik',$a);
	
		$query = $this->db->get();
		return $query->result_array();
	}

	
function surat_kehilangan()
	{
		$a=$this->session->userdata('ses_id');
		$this->db->select('*');
		$this->db->from('surat_kehilangan');
		$this->db->join('ktp','surat_kehilangan.id_ktp=ktp.id_ktp','');
		$this->db->where('ktp.nik',$a);
	
		$query = $this->db->get();
		return $query->result_array();
	}

	function surat_kurang_mampu()
	{
		$a=$this->session->userdata('ses_id');
		$this->db->select('*');
		$this->db->from('surat_kurang_mampu');
		$this->db->join('ktp','surat_kurang_mampu.id_ktp=ktp.id_ktp','');
		$this->db->where('ktp.nik',$a);
	
		$query = $this->db->get();
		return $query->result_array();
	}
	function surat_domisili()
	{
		$a=$this->session->userdata('ses_id');
		$this->db->select('*');
		$this->db->from('surat_domisili');
		$this->db->join('ktp','surat_domisili.id_ktp=ktp.id_ktp','');
		$this->db->where('ktp.nik',$a);
	
		$query = $this->db->get();
		return $query->result_array();
	}
	function surat_pindah_keluar()
	{
		$a=$this->session->userdata('ses_id');
		$this->db->select('*');
		$this->db->from('surat_pindah_keluar');
		$this->db->join('ktp','surat_pindah_keluar.id_ktp=ktp.id_ktp','');
		$this->db->where('ktp.nik',$a);
	
		$query = $this->db->get();
		return $query->result_array();
	}
	function surat_pindah_datang()
	{
		$a=$this->session->userdata('ses_id');
		$this->db->select('*');
		$this->db->from('surat_pindah_datang');
		$this->db->join('ktp','surat_pindah_datang.id_ktp=ktp.id_ktp','');
		$this->db->where('ktp.nik',$a);
	
		$query = $this->db->get();
		return $query->result_array();
	}
	function ambil_data($tabel, $kolom = FALSE, $id = FALSE)		
	{
		if($id === FALSE)
		{
			$q = $this->db->get($tabel);	//ambil seluruh data tabel
			return $q->result();		//kembalikan
		}
		$q = $this->db->get_where($tabel,array($kolom=>$id)); //ambil satu baris data dengan $kolom=$id
		return $q->row_array();				//kembalikan
	}
	function ambil_datanew($tabel, $kolom = FALSE, $id = FALSE)		
	{
		if($id === FALSE)
		{
			$q = $this->db->get($tabel);	//ambil seluruh data tabel
			return $q->result();		//kembalikan
		}
		$q = $this->db->get_where($tabel,array($kolom=>$id)); //ambil satu baris data dengan $kolom=$id
		return $q->row();				//kembalikan
	}
	function ambil_datarow($tabel, $kolom = FALSE, $id = FALSE)		
	{
		if($id === FALSE)
		{
			$q = $this->db->get($tabel);	//ambil seluruh data tabel
			return $q->result();		//kembalikan
		}
		$q = $this->db->get_where($tabel,array($kolom=>$id)); //ambil satu baris data dengan $kolom=$id
		return $q->row();				//kembalikan
	}
	function surat_usaha()
	{
		$a=$this->session->userdata('ses_id');
		$this->db->select('*');
		$this->db->from('surat_usaha');
		$this->db->join('ktp','surat_usaha.id_ktp=ktp.id_ktp','');
		$this->db->where('ktp.nik',$a);
	
		$query = $this->db->get();
		return $query->result_array();
	}

	function admin_pengaduan()
	{
		$a=$this->session->userdata('ses_id');
		$this->db->select('*');
		$this->db->from('pengaduan');
		$this->db->join('ktp','pengaduan.id_ktp=ktp.id_ktp','left');
		
	
		$query = $this->db->get();
		return $query->result_array();
	}
	function admin_pengaduan_masyarakat()
	{
		$a=$this->session->userdata('ses_id');
		$this->db->select('*');
		$this->db->from('pengaduan');
		$this->db->join('ktp','pengaduan.id_ktp=ktp.id_ktp','');
		
		$this->db->limit(5);
	
		$query = $this->db->get();
		return $query->result_array();
	}
	function admin_pengajuan_blt()
	{
		$a=$this->session->userdata('ses_id');
		$this->db->select('*');
		$this->db->from('pengajuan_blt');
		$this->db->join('ktp','pengajuan_blt.id_ktp=ktp.id_ktp','');
		
	
		$query = $this->db->get();
		return $query->result_array();
	}
function admin_proposal()
	{
		$a=$this->session->userdata('ses_id');
		$this->db->select('*');
		$this->db->from('proposal');
		$this->db->join('ktp','proposal.id_ktp=ktp.id_ktp','');
		
	
		$query = $this->db->get();
		return $query->result_array();
	}
function admin_surat_kematian()
	{
		$a=$this->session->userdata('ses_id');
		$this->db->select('*');
		$this->db->from('surat_kematian');
		$this->db->join('ktp','surat_kematian.id_ktp=ktp.id_ktp','');
		
	
		$query = $this->db->get();
		return $query->result_array();
	}
	function admin_surat_izin_keramaian()
	{
		$a=$this->session->userdata('ses_id');
		$this->db->select('*');
		$this->db->from('surat_izin_keramaian');
		$this->db->join('ktp','surat_izin_keramaian.id_ktp=ktp.id_ktp','');
		
	
		$query = $this->db->get();
		return $query->result_array();
	}
	function admin_surat_pindah_keluar()
	{
		$a=$this->session->userdata('ses_id');
		$this->db->select('*');
		$this->db->from('surat_pindah_keluar');
		$this->db->join('ktp','surat_pindah_keluar.id_ktp=ktp.id_ktp','');
		
	
		$query = $this->db->get();
		return $query->result_array();
	}
	function admin_surat_pindah_datang()
	{
		$a=$this->session->userdata('ses_id');
		$this->db->select('*');
		$this->db->from('surat_pindah_datang');
		$this->db->join('ktp','surat_pindah_datang.id_ktp=ktp.id_ktp','');
		
	
		$query = $this->db->get();
		return $query->result_array();
	}
	function print_surat_janda($id = FALSE)
	{
	
	$this->db->select('*');
		$this->db->from('surat_janda');
		$this->db->join('ktp','surat_janda.id_ktp=ktp.id_ktp','');
		$this->db->join('pegawai','surat_janda.tanda_tangan=pegawai.id_pgw','');
		if($id === FALSE)
		{
	$query = $this->db->get();
			return $query->result_array();
		}
		$this->db->where('id_surat_janda', $id);
		$query = $this->db->get();
		return $query->row_array();
	}
	function print_surat_kematian($id = FALSE)
	{
	
	$this->db->select('*');
		$this->db->from('surat_kematian');
		$this->db->join('ktp','surat_kematian.id_ktp=ktp.id_ktp','');
		$this->db->join('pegawai','surat_kematian.tanda_tangan=pegawai.id_pgw','');
		if($id === FALSE)
		{
	$query = $this->db->get();
			return $query->result_array();
		}
		$this->db->where('id_surat_kematian', $id);
		$query = $this->db->get();
		return $query->row_array();
	}
	function print_surat_biodek($id = FALSE)
	{
	
	$this->db->select('*');
		$this->db->from('surat_biodek');
		$this->db->join('ktp','surat_biodek.id_ktp=ktp.id_ktp','');
		$this->db->join('pegawai','surat_biodek.tanda_tangan=pegawai.id_pgw','');
		if($id === FALSE)
		{
	$query = $this->db->get();
			return $query->result_array();
		}
		$this->db->where('id_surat_biodek', $id);
		$query = $this->db->get();
		return $query->row_array();
	}
	function print_surat_skck($id = FALSE)
	{
	
	$this->db->select('*');
		$this->db->from('surat_skck');
		$this->db->join('ktp','surat_skck.id_ktp=ktp.id_ktp','');
		$this->db->join('pegawai','surat_skck.tanda_tangan=pegawai.id_pgw','');
		if($id === FALSE)
		{
	$query = $this->db->get();
			return $query->result_array();
		}
		$this->db->where('id_surat_skck', $id);
		$query = $this->db->get();
		return $query->row_array();
	}
	function print_surat_pindah_keluar($id = FALSE)
	{
	
	$this->db->select('*');
		$this->db->from('surat_pindah_keluar');
		$this->db->join('ktp','surat_pindah_keluar.id_ktp=ktp.id_ktp','');
		$this->db->join('pegawai','surat_pindah_keluar.tanda_tangan=pegawai.id_pgw','');
		if($id === FALSE)
		{
	$query = $this->db->get();
			return $query->result_array();
		}
		$this->db->where('id_surat_pindah_keluar', $id);
		$query = $this->db->get();
		return $query->row_array();
	}
	function print_surat_pindah_datang($id = FALSE)
	{
	
	$this->db->select('*');
		$this->db->from('surat_pindah_datang');
		$this->db->join('ktp','surat_pindah_datang.id_ktp=ktp.id_ktp','');
		$this->db->join('pegawai','surat_pindah_datang.tanda_tangan=pegawai.id_pgw','');
		if($id === FALSE)
		{
	$query = $this->db->get();
			return $query->result_array();
		}
		$this->db->where('id_surat_pindah_datang', $id);
		$query = $this->db->get();
		return $query->row_array();
	}
	function admin_surat_belum_menikah()
	{
		$a=$this->session->userdata('ses_id');
		$this->db->select('*');
		$this->db->from('surat_belum_menikah');
		$this->db->join('ktp','surat_belum_menikah.id_ktp=ktp.id_ktp','');
		
	
		$query = $this->db->get();
		return $query->result_array();
	}
	function print_surat_belum_menikah($id = FALSE)
	{
	
	$this->db->select('*');
		$this->db->from('surat_belum_menikah');
		$this->db->join('ktp','surat_belum_menikah.id_ktp=ktp.id_ktp','');
		$this->db->join('pegawai','surat_belum_menikah.tanda_tangan=pegawai.id_pgw','');
		if($id === FALSE)
		{
	$query = $this->db->get();
			return $query->result_array();
		}
		$this->db->where('id_surat_belum_menikah', $id);
		$query = $this->db->get();
		return $query->row_array();
	}
function admin_surat_kehilangan()
	{
		$a=$this->session->userdata('ses_id');
		$this->db->select('*');
		$this->db->from('surat_kehilangan');
		$this->db->join('ktp','surat_kehilangan.id_ktp=ktp.id_ktp','');
		
	
		$query = $this->db->get();
		return $query->result_array();
	}
	function print_surat_kehilangan($id = FALSE)
	{
	
	$this->db->select('*');
		$this->db->from('surat_kehilangan');
		$this->db->join('ktp','surat_kehilangan.id_ktp=ktp.id_ktp','');
		$this->db->join('pegawai','surat_kehilangan.tanda_tangan=pegawai.id_pgw','');
		if($id === FALSE)
		{
	$query = $this->db->get();
			return $query->result_array();
		}
		$this->db->where('id_surat_kehilangan', $id);
		$query = $this->db->get();
		return $query->row_array();
	}
	function admin_surat_kurang_mampu()
	{
		$a=$this->session->userdata('ses_id');
		$this->db->select('*');
		$this->db->from('surat_kurang_mampu');
		$this->db->join('ktp','surat_kurang_mampu.id_ktp=ktp.id_ktp','');
		
	
		$query = $this->db->get();
		return $query->result_array();
	}
	function print_surat_kurang_mampu($id = FALSE)
	{
	
	$this->db->select('*');
		$this->db->from('surat_kurang_mampu');
		$this->db->join('ktp','surat_kurang_mampu.id_ktp=ktp.id_ktp','');
		$this->db->join('pegawai','surat_kurang_mampu.tanda_tangan=pegawai.id_pgw','');
		if($id === FALSE)
		{
	$query = $this->db->get();
			return $query->result_array();
		}
		$this->db->where('id_surat_kurang_mampu', $id);
		$query = $this->db->get();
		return $query->row_array();
	}
	function admin_surat_domisili()
	{
		$a=$this->session->userdata('ses_id');
		$this->db->select('*');
		$this->db->from('surat_domisili');
		$this->db->join('ktp','surat_domisili.id_ktp=ktp.id_ktp','');
		
	
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function print_surat_domisili($id = FALSE)
	{
	
	$this->db->select('*');
		$this->db->from('surat_domisili');
		$this->db->join('ktp','surat_domisili.id_ktp=ktp.id_ktp','');
		$this->db->join('pegawai','surat_domisili.tanda_tangan=pegawai.id_pgw','');
		if($id === FALSE)
		{
	$query = $this->db->get();
			return $query->result_array();
		}
		$this->db->where('id_surat_domisili', $id);
		$query = $this->db->get();
		return $query->row_array();
	}
	function print_surat_izin_keramaian($id = FALSE)
	{
	
	$this->db->select('*');
		$this->db->from('surat_izin_keramaian');
		$this->db->join('ktp','surat_izin_keramaian.id_ktp=ktp.id_ktp','');
		$this->db->join('pegawai','surat_izin_keramaian.tanda_tangan=pegawai.id_pgw','');
		if($id === FALSE)
		{
	$query = $this->db->get();
			return $query->result_array();
		}
		$this->db->where('id_surat_izin_keramaian', $id);
		$query = $this->db->get();
		return $query->row_array();
	}
	function admin_surat_usaha()
	{
		$a=$this->session->userdata('ses_id');
		$this->db->select('*');
		$this->db->from('surat_usaha');
		$this->db->join('ktp','surat_usaha.id_ktp=ktp.id_ktp','');
		
	
		$query = $this->db->get();
		return $query->result_array();
	}

	

	function print_surat_usaha($id = FALSE)
	{
	
	$this->db->select('*');
		$this->db->from('surat_usaha');
		$this->db->join('ktp','surat_usaha.id_ktp=ktp.id_ktp','');
		$this->db->join('pegawai','surat_usaha.tanda_tangan=pegawai.id_pgw','');
		if($id === FALSE)
		{
	$query = $this->db->get();
			return $query->result_array();
		}
		$this->db->where('id_surat_usaha', $id);
		$query = $this->db->get();
		return $query->row_array();
	}
	function update_informasi($id = FALSE)
	{
		if($id == FALSE){
			$query = $this->db->get('informasi');
			return $query->result_array();
		}	

		$query = $this->db->get_where('informasi', array('id_informasi' => $id));
        return $query->row_array();
	}
	function update_surat_janda($id = FALSE)
	{
		if($id == FALSE){
			$query = $this->db->get('surat_janda');
			return $query->result_array();
		}	

		$query = $this->db->get_where('surat_janda', array('id_surat_janda' => $id));
        return $query->row_array();
	}
	function update_pengaduan($id = FALSE)
	{
		if($id == FALSE){
			$query = $this->db->get('pengaduan');
			return $query->result_array();
		}	

		$query = $this->db->get_where('pengaduan', array('id_pengaduan' => $id));
        return $query->row_array();
	}
	
	function update_pegawai($id = FALSE)
	{
		if($id == FALSE){
			$query = $this->db->get('pegawai');
			return $query->result_array();
		}	

		$query = $this->db->get_where('pegawai', array('id_pgw' => $id));
        return $query->row_array();
	}
	function update_kk($id = FALSE)
	{
		if($id == FALSE){
			$query = $this->db->get('kk');
			return $query->result_array();
		}	

		$query = $this->db->get_where('kk', array('id_kk' => $id));
        return $query->row_array();
	}
	function update_ktp($id = FALSE)
	{
		if($id == FALSE){
			$query = $this->db->get('ktp');
			return $query->result_array();
		}	

		$query = $this->db->get_where('ktp', array('id_ktp' => $id));
        return $query->row_array();
	}
	function update_buat_ktp($id = FALSE)
	{
		if($id == FALSE){
			$query = $this->db->get('pelayanan_ktp');
			return $query->result_array();
		}	

		$query = $this->db->get_where('pelayanan_ktp', array('id_buat_ktp' => $id));
        return $query->row_array();
	}
	function update_surat_masuk($id = FALSE)
	{
		if($id == FALSE){
			$query = $this->db->get('surat_masuk');
			return $query->result_array();
		}	

		$query = $this->db->get_where('surat_masuk', array('id_surat_masuk' => $id));
        return $query->row_array();
	}
	function update_surat_keluar($id = FALSE)
	{
		if($id == FALSE){
			$query = $this->db->get('surat_keluar');
			return $query->result_array();
		}	

		$query = $this->db->get_where('surat_keluar', array('id_surat_keluar' => $id));
        return $query->row_array();
	}
	
	function ambil($tabel, $kolom = FALSE, $id = FALSE)
	{
		if ($id === FALSE) {
			$q = $this->db->get($tabel);	//ambil seluruh data tabel
			return $q->result();		//kembalikan
		}
		$q = $this->db->get_where($tabel, array($kolom => $id)); //ambil satu baris data dengan $kolom=$id
		return $q->row_array();				//kembalikan
	}
	function update_surat_domisili($id = FALSE)
	{
		if($id == FALSE){
			$query = $this->db->get('surat_domisili');
			return $query->result_array();
		}	

		$query = $this->db->get_where('surat_domisili', array('id_surat_domisili' => $id));
        return $query->row_array();
	}
	function update_surat_biodek($id = FALSE)
	{
		if($id == FALSE){
			$query = $this->db->get('surat_biodek');
			return $query->result_array();
		}	

		$query = $this->db->get_where('surat_biodek', array('id_surat_biodek' => $id));
        return $query->row_array();
	}
		function update_surat_skck($id = FALSE)
	{
		if($id == FALSE){
			$query = $this->db->get('surat_skck');
			return $query->result_array();
		}	

		$query = $this->db->get_where('surat_skck', array('id_surat_skck' => $id));
        return $query->row_array();
	}
	function update_surat_izin_keramaian($id = FALSE)
	{
		if($id == FALSE){
			$query = $this->db->get('surat_izin_keramaian');
			return $query->result_array();
		}	

		$query = $this->db->get_where('surat_izin_keramaian', array('id_surat_izin_keramaian' => $id));
        return $query->row_array();
	}
	function update_surat_usaha($id = FALSE)
	{
		if($id == FALSE){
			$query = $this->db->get('surat_usaha');
			return $query->result_array();
		}	

		$query = $this->db->get_where('surat_usaha', array('id_surat_usaha' => $id));
        return $query->row_array();
	}
	function update_surat_kehilangan($id = FALSE)
	{
		if($id == FALSE){
			$query = $this->db->get('surat_kehilangan');
			return $query->result_array();
		}	

		$query = $this->db->get_where('surat_kehilangan', array('id_surat_kehilangan' => $id));
        return $query->row_array();
	}
	function update_surat_kurang_mampu($id = FALSE)
	{
		if($id == FALSE){
			$query = $this->db->get('surat_kurang_mampu');
			return $query->result_array();
		}	

		$query = $this->db->get_where('surat_kurang_mampu', array('id_surat_kurang_mampu' => $id));
        return $query->row_array();
	}
	function update_surat_pindah_keluar($id = FALSE)
	{
		if($id == FALSE){
			$query = $this->db->get('surat_pindah_keluar');
			return $query->result_array();
		}	

		$query = $this->db->get_where('surat_pindah_keluar', array('id_surat_pindah_keluar' => $id));
        return $query->row_array();
	}
	function update_surat_pindah_datang($id = FALSE)
	{
		if($id == FALSE){
			$query = $this->db->get('surat_pindah_datang');
			return $query->result_array();
		}	

		$query = $this->db->get_where('surat_pindah_datang', array('id_surat_pindah_datang' => $id));
        return $query->row_array();
	}
	function update_surat_kematian($id = FALSE)
	{
		if($id == FALSE){
			$query = $this->db->get('surat_kematian');
			return $query->result_array();
		}	

		$query = $this->db->get_where('surat_kematian', array('id_surat_kematian' => $id));
        return $query->row_array();
	}
	function update_surat_belum_menikah($id = FALSE)
	{
		if($id == FALSE){
			$query = $this->db->get('surat_belum_menikah');
			return $query->result_array();
		}	

		$query = $this->db->get_where('surat_belum_menikah', array('id_surat_belum_menikah' => $id));
        return $query->row_array();
	}

	function update_proposal($id = FALSE)
	{
		if($id == FALSE){
			$query = $this->db->get('proposal');
			return $query->result_array();
		}	

		$query = $this->db->get_where('proposal', array('id_proposal' => $id));
        return $query->row_array();
	}
	function update_pengajuan_blt($id = FALSE)
	{
		if($id == FALSE){
			$query = $this->db->get('pengajuan_blt');
			return $query->result_array();
		}	

		$query = $this->db->get_where('pengajuan_blt', array('id_pengajuan' => $id));
        return $query->row_array();
	}
	
	

function get_data($tabel)
	{
		$query = $this->db->get($tabel);
		return $query->result_array();		
	}
	function get_table($tabel)
	{
		$query = $this->db->get($tabel);
		return $query->result();		
	}
	function set_data($tabel)
	{
		$data=$this->input->post(null,TRUE);
		array_pop($data);
		return $this->db->insert($tabel, $data);
	}
	function input_data($data,$table){
		$this->db->insert($table,$data);
	}
	function hapus($tabel,$kolom,$id)
	{
		$this->db->delete($tabel,array($kolom => $id));
	}
	
	function update_data($tabel)
	{
		$data=$this->input->post(null,TRUE);  	
		$primary=array_slice($data,0,1);	
		array_shift($data);		
		array_pop($data);		
	    $this->db->where($primary);
	    $this->db->update($tabel, $data);	
	}

	public function UpdateData($tabelName, $data, $where){
		$res = $this->db->update($tabelName, $data, $where);
		return $res;
	}

	//----------------------------------------------------------------------------------------
	function penerima_blt()
	{
		$a=$this->session->userdata('ses_id');
		$this->db->select('*');
		$this->db->from('pengajuan_blt');
		$this->db->join('ktp','pengajuan_blt.id_ktp=ktp.id_ktp','');
		$this->db->where('pengajuan_blt.status="Diterima"');
		$this->db->where('ktp.nik',$a);
	
		$query = $this->db->get();
		return $query->result_array();
	}
	//--------------------------------------------------------------------------------------
	
	//---------------------------------------------------------------------
	function admin_surat_pengadilan()
	{
		$a=$this->session->userdata('ses_id');
		$this->db->select('*');
		$this->db->from('surat_pengadilan');
		$this->db->join('ktp','surat_pengadilan.id_ktp=ktp.id_ktp','');
		
	
		$query = $this->db->get();
		return $query->result_array();
	}
	function update_surat_pengadilan($id = FALSE)
	{
		if($id == FALSE){
			$query = $this->db->get('surat_pengadilan');
			return $query->result_array();
		}	

		$query = $this->db->get_where('surat_pengadilan', array('id_surat_pengadilan' => $id));
        return $query->row_array();
	}
	//------------------------------------------------------------------------
	function download_ktp($rt)
	{
		
		$this->db->select('*');
		$this->db->from('ktp');
		$this->db->where('ktp.rt',$rt);
	
		$query = $this->db->get();
		return $query->result_array();
	}
	function lap_surat_masuk($dari,$sampai)
    {   
        $this->db->select('*');
$this->db->from('surat_masuk');
      $this->db->where('tgl_surat between "'.$dari.'" and "'.$sampai.'"');               
        $query = $this->db->get();
        return $query->result_array();
    }
    function lap_surat_keluar($dari,$sampai)
    {   
        $this->db->select('*');
$this->db->from('surat_keluar');
      $this->db->where('tgl_surat between "'.$dari.'" and "'.$sampai.'"');               
        $query = $this->db->get();
        return $query->result_array();
    }
 function lap_surat_janda($dari,$sampai)
    {   
        $this->db->select('*');
$this->db->from('surat_janda');
		$this->db->join('ktp','surat_janda.id_ktp=ktp.id_ktp','');
      $this->db->where('tanggal_surat between "'.$dari.'" and "'.$sampai.'"');               
        $query = $this->db->get();
        return $query->result_array();
    }
	 function lap_surat_usaha($dari,$sampai)
    {   
        $this->db->select('*');
$this->db->from('surat_usaha');
		$this->db->join('ktp','surat_usaha.id_ktp=ktp.id_ktp','');
      $this->db->where('tanggal_surat between "'.$dari.'" and "'.$sampai.'"');               
        $query = $this->db->get();
        return $query->result_array();
    }
     function lap_surat_kehilangan($dari,$sampai)
    {   
        $this->db->select('*');
$this->db->from('surat_kehilangan');
		$this->db->join('ktp','surat_kehilangan.id_ktp=ktp.id_ktp','');
      $this->db->where('tanggal_surat between "'.$dari.'" and "'.$sampai.'"');               
        $query = $this->db->get();
        return $query->result_array();
    }
     function lap_surat_kurang_mampu($dari,$sampai)
    {   
        $this->db->select('*');
$this->db->from('surat_kurang_mampu');
		$this->db->join('ktp','surat_kurang_mampu.id_ktp=ktp.id_ktp','');
      $this->db->where('tanggal_surat between "'.$dari.'" and "'.$sampai.'"');               
        $query = $this->db->get();
        return $query->result_array();
    }
     function lap_surat_biodek($dari,$sampai)
    {   
        $this->db->select('*');
$this->db->from('surat_biodek');
		$this->db->join('ktp','surat_biodek.id_ktp=ktp.id_ktp','');
      $this->db->where('tanggal_surat between "'.$dari.'" and "'.$sampai.'"');               
        $query = $this->db->get();
        return $query->result_array();
    }
     function lap_surat_skck($dari,$sampai)
    {   
        $this->db->select('*');
$this->db->from('surat_skck');
		$this->db->join('ktp','surat_skck.id_ktp=ktp.id_ktp','');
      $this->db->where('tanggal_surat between "'.$dari.'" and "'.$sampai.'"');               
        $query = $this->db->get();
        return $query->result_array();
    }
     function lap_surat_izin_keramaian($dari,$sampai)
    {   
        $this->db->select('*');
$this->db->from('surat_izin_keramaian');
		$this->db->join('ktp','surat_izin_keramaian.id_ktp=ktp.id_ktp','');
      $this->db->where('tanggal_surat between "'.$dari.'" and "'.$sampai.'"');               
        $query = $this->db->get();
        return $query->result_array();
    }
     function lap_surat_pindah_keluar($dari,$sampai)
    {   
        $this->db->select('*');
$this->db->from('surat_pindah_keluar');
		$this->db->join('ktp','surat_pindah_keluar.id_ktp=ktp.id_ktp','');
      $this->db->where('tanggal_surat between "'.$dari.'" and "'.$sampai.'"');               
        $query = $this->db->get();
        return $query->result_array();
    }
     function lap_surat_pindah_datang($dari,$sampai)
    {   
        $this->db->select('*');
$this->db->from('surat_pindah_datang');
		$this->db->join('ktp','surat_pindah_datang.id_ktp=ktp.id_ktp','');
      $this->db->where('tanggal_surat between "'.$dari.'" and "'.$sampai.'"');               
        $query = $this->db->get();
        return $query->result_array();
    }
     function lap_surat_belum_menikah($dari,$sampai)
    {   
        $this->db->select('*');
$this->db->from('surat_belum_menikah');
		$this->db->join('ktp','surat_belum_menikah.id_ktp=ktp.id_ktp','');
      $this->db->where('tanggal_surat between "'.$dari.'" and "'.$sampai.'"');               
        $query = $this->db->get();
        return $query->result_array();
    }
     function lap_surat_kematian($dari,$sampai)
    {   
        $this->db->select('*');
$this->db->from('surat_kematian');
		$this->db->join('ktp','surat_kematian.id_ktp=ktp.id_ktp','');
      $this->db->where('tanggal_surat between "'.$dari.'" and "'.$sampai.'"');               
        $query = $this->db->get();
        return $query->result_array();
    }
 function lap_surat_domisili($dari,$sampai)
    {   
        $this->db->select('*');
$this->db->from('surat_domisili');
		$this->db->join('ktp','surat_domisili.id_ktp=ktp.id_ktp','');
      $this->db->where('tanggal_surat between "'.$dari.'" and "'.$sampai.'"');               
        $query = $this->db->get();
        return $query->result_array();
    }
    function cetak_kegiatan($dari,$sampai)
    {   
        $this->db->select('*');
$this->db->from('penugasan a');
		$this->db->join('jenis_kegiatan b','a.id_jenis_kegiatan=b.id_jenis_kegiatan','');

      $this->db->where('a.tgl_mulai between "'.$dari.'" and "'.$sampai.'"');               
        $query = $this->db->get();
        return $query->result();
    }
    function cetak_proposal($dari,$sampai)
	{
		$this->db->select('*');
		$this->db->from('proposal');
		$this->db->join('ktp','proposal.id_ktp=ktp.id_ktp','');
		      $this->db->where('tgl_proposal between "'.$dari.'" and "'.$sampai.'"');               

	
		$query = $this->db->get();
		return $query->result_array();
	}
    function cetak_pengaduan($dari,$sampai)
	{
		$a=$this->session->userdata('ses_id');
		$this->db->select('*');
		$this->db->from('pengaduan');
		$this->db->join('ktp','pengaduan.id_ktp=ktp.id_ktp','left');
		     $this->db->where('tgl_pengaduan between "'.$dari.'" and "'.$sampai.'"');  
	
		$query = $this->db->get();
		return $query->result_array();
	}
}