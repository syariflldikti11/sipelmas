<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//ini sesuaikan foldernya ke file 3 ini
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
class Admin extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->database();

        $role = $this->session->userdata('role');
    
        if( $role <>2){
            $url=base_url();
            redirect($url);
        }
    }

    function qr($kodeqr)
{
    if($kodeqr){
        $filename = 'qr/'.$kodeqr;
        if (!file_exists($filename)) { 
                $this->load->library('ciqrcode');
                $params['data'] = $kodeqr;
                $params['level'] = 'H';
                $params['size'] = 10;
                $params['savename'] = FCPATH.'qr/'.$kodeqr.".png";
                return  $this->ciqrcode->generate($params);
        }
    }
}
	
	
	 function index()
    {
        $data = array(
            'menu' => 'Dashboard',
            'sub_menu' => '',
            'dt_pengaduan_baru' => $this->umum->pengaduan_masyarakat(),
            'hitung_pengaduan' => $this->umum->hitung_pengaduan(),
        );
        $this->template->load('admin/template', 'admin/home', $data);
    }
	function informasi() { 
	if($this->session->userdata('akses')=='1') {
	$data['page'] = 'informasi';
	$data['dt_informasi'] = $this->umum->get_data('informasi');
	$this->tampilkan($data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}
	function tambah_informasi() { 
		if($this->session->userdata('akses')=='1') {
	$data['page']="tambah_informasi";
	$this->db->set('id_informasi', 'UUID()', FALSE);
		$this->form_validation->set_rules('isi_informasi','isi_informasi','required');
		$this->form_validation->set_rules('informasi','informasi','required');
		if($this->form_validation->run() === FALSE)
			$this->tampilkan($data);
		else
		{
			echo "<script>alert('Tambah data berhasil');</script>";
			$this->umum->set_data("informasi");
			redirect('admin/informasi','refresh');
		}
	}
	else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
	function update_informasi($id=NULL)
	{
		if($this->session->userdata('akses')=='1') {
		$data['d']=$this->umum->update_informasi($id);
		$data['page'] = 'update_informasi';
			$this->tampilkan($data);
	
		}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
	function simpan_informasi(){
$id_informasi = $this->input->post('id_informasi');
$isi_informasi = $this->input->post('isi_informasi');
	$informasi = $this->input->post('informasi');
	
	if (!empty($_FILES["file"]["name"])) {
          $file = $this->uploadfileinfo();
        } else {
            $file = $this->input->post('old_image');
		}
	$data_update = array(
			'id_informasi' => $id_informasi,
			'isi_informasi' => $isi_informasi,
			'informasi' => $informasi,
			'file' => $file
		);
		$where = array('id_informasi' => $id_informasi);
		$res = $this->umum->UpdateData('informasi', $data_update, $where);
		if($res>=1){
			redirect('admin/informasi');
		}else{
			echo "<h1>GAGAL</h1>";
		}
	}
	
	function delete_informasi($id=NULL)
	{
			if($this->session->userdata('akses')=='1') {
		$this->umum->hapus('informasi','id_informasi',$id);
		redirect('admin/informasi');
		}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
	function ktp() { 
	
	$data['dt_ktp'] = $this->umum->get_data('ktp');
	$this->template->load('admin/template', 'admin/ktp', $data);
	}

	function cetak_ktp(){
	$data['dt_ktp'] = $this->umum->get_data('ktp');
	$this->load->view('admin/cetak_ktp',$data);
	}
	function tambah_ktp() { 

	$data['page'] = 'tambah_ktp';
	$this->template->load('admin/template', 'admin/tambah_ktp', $data);
    }

	
	function simpan_ktp()
	{
	$this->db->set('id_ktp', 'UUID()', FALSE);
	$nik = $this->input->post('nik');
	$nama = $this->input->post('nama');
	$alamat = $this->input->post('alamat');
	$desa = $this->input->post('desa');
	$rt = $this->input->post('rt');
	$agama = $this->input->post('agama');
	$tempat_lahir = $this->input->post('tempat_lahir');
	$tanggal_lahir = $this->input->post('tanggal_lahir');
	$jkelamin = $this->input->post('jkelamin');
	$wnegara = $this->input->post('wnegara');
	$pekerjaan = $this->input->post('pekerjaan');
	$snikah = $this->input->post('snikah');
	$ftoktp = $this->uploadKTP();
	$data = array(
			'nik' => $nik,
			'nama' => $nama,
			'alamat' => $alamat,
			'desa' => $desa,
			'rt' => $rt,
			'agama' => $agama,
			'tempat_lahir' => $tempat_lahir,
			'tanggal_lahir' => $tanggal_lahir,
			'jkelamin' => $jkelamin,
			'wnegara' => $wnegara,
			'pekerjaan' => $pekerjaan,
			'snikah' => $snikah,
			'ftoktp' => $ftoktp
			);
	echo "<script>alert('Registrasi Berhasil Silahkan Login');</script>";
	$this->umum->input_data($data,'ktp');
	redirect('admin/ktp');
	}
	

public function uploadKTP()
	{
    $config['upload_path']          = 'upload/file';
    $config['allowed_types']        = 'pdf|jpg|jpeg|png|doc|docx';
    $config['overwrite']			= false;
     $config['max_size']             = 5000; // 1MB


    $this->load->library('upload', $config);
	$this->upload->initialize($config);

	    if ($this->upload->do_upload('ftoktp')) 
	    {
	        return $this->upload->data("file_name");
	    }
	     $error = $this->upload->display_errors();
	     echo $error;
	     exit;
	    // return "default.jpg";
	}
	public function uploadfileinfo()
	{
    $config['upload_path']          = 'upload/file';
    $config['allowed_types']        = 'pdf|jpg|jpeg|png|doc|docx';
    $config['overwrite']			= false;
     $config['max_size']             = 5000; // 1MB


    $this->load->library('upload', $config);
	$this->upload->initialize($config);

	    if ($this->upload->do_upload('file')) 
	    {
	        return $this->upload->data("file_name");
	    }
	     $error = $this->upload->display_errors();
	     echo $error;
	     exit;
	    // return "default.jpg";
	}
	function edit_ktp($id=NULL) { 

	$data['page']="edit_ktp";
	$data['d']=$this->umum->update_ktp($id);
	$this->template->load('admin/template', 'admin/update_ktp', $data);
}
function update_ktp(){
$id_ktp = $this->input->post('id_ktp');
$nik = $this->input->post('nik');
	$nama = $this->input->post('nama');
	$alamat = $this->input->post('alamat');
	$desa = $this->input->post('desa');
	$rt = $this->input->post('rt');
	$agama = $this->input->post('agama');
	$tempat_lahir = $this->input->post('tempat_lahir');
	$tanggal_lahir = $this->input->post('tanggal_lahir');
	$jkelamin = $this->input->post('jkelamin');
	$wnegara = $this->input->post('wnegara');
	$pekerjaan = $this->input->post('pekerjaan');
	$snikah = $this->input->post('snikah');
	
	if (!empty($_FILES["file"]["name"])) {
          $ftoktp = $this->uploadKTP();
        } else {
            $ftoktp = $this->input->post('old_image');
		}
	$data_update = array(
			'id_ktp' => $id_ktp,
			'nik' => $nik,
			'nama' => $nama,
			'alamat' => $alamat,
			'desa' => $desa,
			'rt' => $rt,
			'agama' => $agama,
			'tempat_lahir' => $tempat_lahir,
			'tanggal_lahir' => $tanggal_lahir,
			'jkelamin' => $jkelamin,
			'wnegara' => $wnegara,
			'pekerjaan' => $pekerjaan,
			'snikah' => $snikah,
			'ftoktp' => $ftoktp
		);
		$where = array('id_ktp' => $id_ktp);
		$res = $this->umum->UpdateData('ktp', $data_update, $where);
		if($res>=1){
			redirect('admin/ktp');
		}else{
			echo "<h1>GAGAL</h1>";
		}
	}

	function delete_ktp($id=NULL)
	{
			if($this->session->userdata('akses')=='1') {
		$this->umum->hapus('ktp','id_ktp',$id);
		redirect('admin/ktp');
		}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
		function kk() { 
	
	$data['dt_kk'] = $this->umum->get_data('kk');
	$this->template->load('admin/template', 'admin/kk', $data);
	}
	function cetak_kk() { 
	
	$data['dt_kk'] = $this->umum->get_data('kk');
	$this->load->view('admin/cetak_kk',$data);

	}
	function simpan_kk()
	{
	$this->db->set('id_kk', 'UUID()', FALSE);
	$no_kk = $this->input->post('no_kk');
	$kepala_keluarga =$this->input->post('kepala_keluarga');
	$alamat_kk =$this->input->post('alamat_kk');
	$desa_kk =$this->input->post('desa_kk');
	$rt_kk =$this->input->post('rt_kk');
	$kecamatan =$this->input->post('kecamatan');
	$kabupaten =$this->input->post('kabupaten');
	$kode_pos =$this->input->post('kode_pos');
	$provinsi =$this->input->post('provinsi');
    $foto_kk = $this->uploadFile();
       

	$data = array(
			'no_kk' => $no_kk,
			'kepala_keluarga' => $kepala_keluarga,
			'alamat_kk' => $alamat_kk,
			'desa_kk' => $desa_kk,
			'rt_kk' => $rt_kk,
			'kecamatan' => $kecamatan,
			'kabupaten' => $kabupaten,
			'kode_pos' => $kode_pos,
			'provinsi' => $provinsi,
			'foto_kk' => $foto_kk
			);
	echo "<script>alert('Tambah Data Berhasil');</script>";
	$this->umum->input_data($data,'kk');
	redirect('admin/kk','refresh');
	}
	public function uploadFile()
	{
    $config['upload_path']          = 'upload/file';
    $config['allowed_types']        = 'pdf|jpg|png|jpeg';
    $config['overwrite']			= false;
     $config['max_size']             = 5000; // 1MB


    $this->load->library('upload', $config);
	$this->upload->initialize($config);

	    if ($this->upload->do_upload('foto_kk')) 
	    {
	        return $this->upload->data("file_name");
	    }
	     $error = $this->upload->display_errors();
	     echo $error;
	     exit;
	    // return "default.jpg";
	}
public function uploadSurat()
	{
    $config['upload_path']          = 'upload/file';
    $config['allowed_types']        = 'pdf|jpg|png|jpeg|doc|docx';
    $config['overwrite']			= false;
     $config['max_size']             = 5000; // 1MB


    $this->load->library('upload', $config);
	$this->upload->initialize($config);

	    if ($this->upload->do_upload('file')) 
	    {
	        return $this->upload->data("file_name");
	    }
	     $error = $this->upload->display_errors();
	     echo $error;
	     exit;
	    // return "default.jpg";
	}


	function tambah_kk() { 

	$data['page'] = 'tambah_kk';
	$this->template->load('admin/template', 'admin/tambah_kk', $data);

	}
function edit_kk($id=NULL) { 

	$data['page']="edit_kk";
	$data['d']=$this->umum->update_kk($id);
	$this->template->load('admin/template', 'admin/update_kk', $data);
}
function update_kk(){
	$id_kk = $this->input->post('id_kk');
	$kepala_keluarga = $this->input->post('kepala_keluarga');
	$alamat_kk = $this->input->post('alamat_kk');
	$desa_kk = $this->input->post('desa_kk');
	$rt_kk = $this->input->post('rt_kk');
	$kecamatan = $this->input->post('kecamatan');
	$kabupaten = $this->input->post('kabupaten');
	$kode_pos = $this->input->post('kode_pos');
	$provinsi = $this->input->post('provinsi');
	if (!empty($_FILES["file"]["name"])) {
          $foto_kk = $this->uploadFile();
        } else {
            $foto_kk = $this->input->post('old_image');
		}
		$data_update = array (
			'id_kk' => $id_kk, 
			'kepala_keluarga' => $kepala_keluarga,
			'alamat_kk' => $alamat_kk,
			'desa_kk' => $desa_kk,
			'rt_kk' => $rt_kk,
			'kecamatan' => $kecamatan,
			'kabupaten' => $kabupaten,
			'foto_kk' => $foto_kk,
			'kode_pos' => $kode_pos,
			'provinsi' => $provinsi
			
		);
		$where = array('id_kk' => $id_kk);
		$res = $this->umum->UpdateData('kk', $data_update, $where);
		if($res>=1){
			redirect('admin/kk');
		}else{
			echo "<h1>GAGAL</h1>";
		}
	}

	function delete_kk($id=NULL)
	{
			if($this->session->userdata('akses')=='1') {
		$this->umum->hapus('kk','id_kk',$id);
		redirect('admin/kk');
		}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}

		function pegawai() { 
	if($this->session->userdata('akses')=='1') {
	$data['page'] = 'pegawai';
	$data['dt_pegawai'] = $this->umum->get_data('pegawai');
	$this->tampilkan($data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}
	function cetak_pegawai() { 
	if($this->session->userdata('akses')=='1') {
	$data['page'] = 'pegawai';
	$data['dt_pegawai'] = $this->umum->get_data('pegawai');
	$this->load->view('admin/cetak_pegawai',$data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}
	function tambah_pegawai() { 
		if($this->session->userdata('akses')=='1') {
	$data['page']="tambah_pegawai";
	$this->db->set('id_pgw', 'UUID()', FALSE);
		$this->form_validation->set_rules('nama_peg','nama_peg','required');
		$this->form_validation->set_rules('jabatan','jabatan');
		$this->form_validation->set_rules('alamat_peg','alamat_peg');
		$this->form_validation->set_rules('telp_peg','telp_peg');
		$this->form_validation->set_rules('wa_peg','wa_peg');
		if($this->form_validation->run() === FALSE)
			$this->tampilkan($data);
		else
		{
			echo "<script>alert('Tambah data berhasil');</script>";
			$this->umum->set_data("pegawai");
			redirect('admin/pegawai','refresh');
		}
	}
	else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
	function update_pegawai($id=NULL)
	{
		if($this->session->userdata('akses')=='1') {
		$data['d']=$this->umum->update_pegawai($id);
		$data['page'] = 'update_pegawai';
		$this->form_validation->set_rules('id_pgw','id_pgw','required'); 
		$this->form_validation->set_rules('nama_peg','nama_peg','required');
		$this->form_validation->set_rules('jabatan','jabatan','required');
		$this->form_validation->set_rules('alamat_peg','alamat_peg','required');
		$this->form_validation->set_rules('telp_peg','telp_peg','required');
		$this->form_validation->set_rules('wa_peg','wa_peg','required');
		if($this->form_validation->run() === FALSE)
			$this->tampilkan($data);
		else
		{
			echo "<script>alert('Update data berhasil');</script>";
			$this->umum->update_data("pegawai");
			redirect('admin/pegawai','refresh');
		}
		}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
	
	function delete_pegawai($id=NULL)
	{
			if($this->session->userdata('akses')=='1') {
		$this->umum->hapus('pegawai','id_pgw',$id);
		redirect('admin/pegawai');
		}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}

	function pengaduan() { 
	if($this->session->userdata('akses')=='1') {
	$data['page'] = 'pengaduan';
	$data['dt_pengaduan'] = $this->umum->admin_pengaduan();
	$this->tampilkan($data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}
	function cetak_pengaduan() { 
	if($this->session->userdata('akses')=='1') {
	$data['page'] = 'pengaduan';
	$data['dt_pengaduan'] = $this->umum->admin_pengaduan();
		$this->load->view('admin/cetak_pengaduan',$data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}
	function update_pengaduan($id=NULL)
	{
		if($this->session->userdata('akses')=='1') {
		$data['d']=$this->umum->update_pengaduan($id);
		$data['page'] = 'update_pengaduan';
		$this->form_validation->set_rules('id_pengaduan','id_pengaduan','required'); 
		$this->form_validation->set_rules('balasan','balasan','required');
		if($this->form_validation->run() === FALSE)
			$this->tampilkan($data);
		else
		{
			echo "<script>alert('Update data berhasil');</script>";
			$this->umum->update_data("pengaduan");
			redirect('admin/pengaduan','refresh');
		}
		}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
	function delete_pengaduan($id=NULL)
	{
			if($this->session->userdata('akses')=='1') {
		$this->umum->hapus('pengaduan','id_pengaduan',$id);
		redirect('admin/pengaduan');
		}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
	function penerima_blt() { 
	if($this->session->userdata('akses')=='1') {
	$data['page'] = 'penerima_blt';
	$data['dt_penerima_blt'] = $this->umum->admin_penerima_blt();
	$this->tampilkan($data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}
	function cetak_penerima_blt() { 
	if($this->session->userdata('akses')=='1') {
	$data['page'] = 'penerima_blt';
	$data['dt_penerima_blt'] = $this->umum->admin_penerima_blt();
		$this->load->view('admin/cetak_penerima_blt',$data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}
	function pengajuan_blt() { 
	if($this->session->userdata('akses')=='1') {
	$data['page'] = 'pengajuan_blt';
	$data['dt_pengajuan_blt'] = $this->umum->admin_pengajuan_blt();
	$this->tampilkan($data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}
	function cetak_pengajuan_blt() { 
	if($this->session->userdata('akses')=='1') {
	$data['page'] = 'pengajuan_blt';
	$data['dt_pengajuan_blt'] = $this->umum->admin_pengajuan_blt();
		$this->load->view('admin/cetak_pengajuan_blt',$data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}
	function tambah_pengajuan_blt() { 
		if($this->session->userdata('akses')=='1') {
	$data['page']="tambah_pengajuan_blt";
	$data['dt_ktp'] = $this->umum->get_data('ktp');
	$data['dt_pegawai'] = $this->umum->get_data('pegawai');
	$this->db->set('id_pengajuan', 'UUID()', FALSE);
		$this->form_validation->set_rules('id_ktp','id_ktp','required');
		$this->form_validation->set_rules('penghasilan','penghasilan');
		$this->form_validation->set_rules('tanggal','tanggal');
		$this->form_validation->set_rules('pengaju_telpon','pengaju_telpon');
	
		if($this->form_validation->run() === FALSE)
			$this->tampilkan($data);
		else
		{
			echo "<script>alert('Tambah data berhasil');</script>";
			$this->umum->set_data("pengajuan_blt");
			redirect('admin/pengajuan_blt','refresh');
		}
	}
	else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
		function update_pengajuan_blt($id=NULL)
	{
		if($this->session->userdata('akses')=='1') {
			$data['dt_ktp'] = $this->umum->get_data('ktp');
	$data['dt_pegawai'] = $this->umum->get_data('pegawai');
		$data['d']=$this->umum->update_pengajuan_blt($id);
		$data['page'] = 'update_pengajuan_blt';
		$this->form_validation->set_rules('id_pengajuan','id_pengajuan','required'); 
		$this->form_validation->set_rules('id_ktp','id_ktp','required');
		$this->form_validation->set_rules('penghasilan','penghasilan');
		$this->form_validation->set_rules('tanggal','tanggal');
		$this->form_validation->set_rules('status','status');
		

		if($this->form_validation->run() === FALSE)
			$this->tampilkan($data);
		else
		{
			echo "<script>alert('Update data berhasil');</script>";
			$this->umum->update_data("pengajuan_blt");
			redirect('admin/pengajuan_blt','refresh');
		}
		}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}

	function simpan_pengajuan_blt(){
$id_pengajuan = $this->input->post('id_pengajuan');
$id_ktp = $this->input->post('id_ktp');
	$penghasilan = $this->input->post('penghasilan');
	$tanggal = $this->input->post('tanggal');
	$status = $this->input->post('status');
 $query=$this->db->query("Select * from ktp join pengunjung on ktp.nik=pengunjung.nik where 
  ktp.id_ktp= '$id_ktp'");
 foreach ($query->result() as $row) {
 $email=$row->email;
  }

                                                        
	if($status=='Diterima') {
	  $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'mban98413@gmail.com',  // Email gmail
            'smtp_pass'   => 'sma5banjarmasin',  // Password gmail
            'smtp_crypto' => 'ssl',
            'smtp_port'   => 465,
            'crlf'    => "\r\n",
            'newline' => "\r\n"
        ];

        // Load library email dan konfigurasinya
        $this->load->library('email', $config);

        // Email dan nama pengirim
        $this->email->from('mban98413@gmail.com', 'KANTOR DESA JARO');

        // Email penerima
        $this->email->to($email); // Ganti dengan email tujuan



        // Subject email
        $this->email->subject('Pemberitahuan Pengajuan BLT | KANTOR DESA JARO');

        // Isi email
        $this->email->message("Kami informasikan Pengajuan BLT Anda diterima.");
$this->email->send();
}



	$data_update = array(
			'id_pengajuan' => $id_pengajuan,
			'id_ktp' => $id_ktp,
			'penghasilan' => $penghasilan,
			'tanggal' => $tanggal,
			'status' => $status
		);
		$where = array('id_pengajuan' => $id_pengajuan);
		$res = $this->umum->UpdateData('pengajuan_blt', $data_update, $where);
		if($res>=1){
			redirect('admin/pengajuan_blt');
		}else{
			echo "<h1>GAGAL</h1>";
		}
	}

	function delete_pengajuan_blt($id=NULL)
	{
			if($this->session->userdata('akses')=='1') {
		$this->umum->hapus('pengajuan_blt','id_pengajuan',$id);
		redirect('admin/pengajuan_blt');
		}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}

	
	
	function proposal() { 
	if($this->session->userdata('akses')=='1') {
	$data['page'] = 'proposal';
	$data['dt_proposal'] = $this->umum->admin_proposal();
	$this->tampilkan($data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}
	function cetak_proposal() { 
	if($this->session->userdata('akses')=='1') {
	$data['page'] = 'proposal';
	$data['dt_proposal'] = $this->umum->admin_proposal();
		$this->load->view('admin/cetak_proposal',$data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}
	function tambah_proposal() { 
	if($this->session->userdata('akses')=='1') {
	$data['dt_ktp'] = $this->umum->get_data('ktp');
	$data['page'] = 'tambah_proposal';
	$this->tampilkan($data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}
	function simpan_proposal()
	{
	$this->db->set('id_proposal', 'UUID()', FALSE);
	$tgl_proposal = $this->input->post('tgl_proposal');
	$id_ktp = $this->input->post('id_ktp');
	$mengajukan = $this->input->post('mengajukan');
	$telp = $this->input->post('telp');
	$proposal = $this->uploadProposal();
	$data = array(
			'tgl_proposal' => $tgl_proposal,
			'id_ktp' => $id_ktp,
			'mengajukan' => $mengajukan,
			'telp' => $telp,
			'proposal' => $proposal
			);
	echo "<script>alert('Tambah Proposal Berhasil');</script>";
	$this->umum->input_data($data,'proposal');
	redirect('admin/proposal');
	}
	

public function uploadProposal()
	{
    $config['upload_path']          = 'upload/file';
    $config['allowed_types']        = 'pdf|jpg|jpeg|png|doc|docx';
    $config['overwrite']			= false;
     $config['max_size']             = 5000; // 1MB


    $this->load->library('upload', $config);
	$this->upload->initialize($config);

	    if ($this->upload->do_upload('proposal')) 
	    {
	        return $this->upload->data("file_name");
	    }
	     $error = $this->upload->display_errors();
	     echo $error;
	     exit;
	    // return "default.jpg";
	}
	function edit_proposal($id=NULL) { 
	if($this->session->userdata('akses')=='1') {
	$data['page']="edit_proposal";
	$data['dt_ktp'] = $this->umum->get_data('ktp');
	$data['d']=$this->umum->update_proposal($id);
	$this->tampilkan($data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }
}
function update_proposal(){
$id_proposal = $this->input->post('id_proposal');
$tgl_proposal = $this->input->post('tgl_proposal');
	$id_ktp = $this->input->post('id_ktp');
	$mengajukan = $this->input->post('mengajukan');
	$telp = $this->input->post('telp');
	$status = $this->input->post('status');
	$query=$this->db->query("Select * from ktp join pengunjung on ktp.nik=pengunjung.nik where 
  ktp.id_ktp= '$id_ktp'");
 foreach ($query->result() as $row) {
 $email=$row->email;
  }

                                                        
	if($status=='Diterima') {
	  $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'mban98413@gmail.com',  // Email gmail
            'smtp_pass'   => 'sma5banjarmasin',  // Password gmail
            'smtp_crypto' => 'ssl',
            'smtp_port'   => 465,
            'crlf'    => "\r\n",
            'newline' => "\r\n"
        ];

        // Load library email dan konfigurasinya
        $this->load->library('email', $config);

        // Email dan nama pengirim
        $this->email->from('mban98413@gmail.com', 'KANTOR DESA JARO');

        // Email penerima
        $this->email->to($email); // Ganti dengan email tujuan



        // Subject email
        $this->email->subject('Pemberitahuan Pengajuan Proposal  | KANTOR DESA JARO');

        // Isi email
        $this->email->message("Kami informasikan pengajuan proposal anda sudah diterima");
$this->email->send();
}
	
	if (!empty($_FILES["file"]["name"])) {
          $proposal = $this->uploadProposal();
        } else {
            $proposal = $this->input->post('old_image');
		}
	$data_update = array(
			'id_proposal' => $id_proposal,
			'tgl_proposal' => $tgl_proposal,
			'id_ktp' => $id_ktp,
			'mengajukan' => $mengajukan,
			'telp' => $telp,
			'status' => $status,
			'proposal' => $proposal
		);
		$where = array('id_proposal' => $id_proposal);
		$res = $this->umum->UpdateData('proposal', $data_update, $where);
		if($res>=1){
			redirect('admin/proposal');
		}else{
			echo "<h1>GAGAL</h1>";
		}
	}

	function delete_proposal($id=NULL)
	{
			if($this->session->userdata('akses')=='1') {
		$this->umum->hapus('proposal','id_proposal',$id);
		redirect('admin/proposal');
		}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
	function surat_kematian() { 
	if($this->session->userdata('akses')=='1') {
	$data['page'] = 'surat_kematian';
	$data['dt_surat_kematian'] = $this->umum->admin_surat_kematian();
	$this->tampilkan($data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}
	function print_surat_kematian($id=NULL) { 
	if($this->session->userdata('akses')!='0') {
	$data['d']=$this->umum->print_surat_kematian($id);
		$this->load->view('admin/print_surat_kematian',$data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}
	function cetak_surat_kematian() { 
	if($this->session->userdata('akses')=='1') {
	$data['page'] = 'surat_kematian';
	$data['dt_surat_kematian'] = $this->umum->admin_surat_kematian();
		$this->load->view('admin/cetak_surat_kematian',$data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}
	function tambah_surat_kematian() { 
		if($this->session->userdata('akses')=='1') {
	$data['page']="tambah_surat_kematian";
	$data['dt_ktp'] = $this->umum->get_data('ktp');
	$data['dt_pegawai'] = $this->umum->get_data('pegawai');
	$this->db->set('id_surat_kematian', 'UUID()', FALSE);
		$this->form_validation->set_rules('id_ktp','id_ktp','required');
		$this->form_validation->set_rules('no_surat','no_surat');
		$this->form_validation->set_rules('hari','hari');
		$this->form_validation->set_rules('pukul','pukul');
		$this->form_validation->set_rules('bertempat','bertempat');
		$this->form_validation->set_rules('dimakamkan','dimakamkan');
		$this->form_validation->set_rules('tanggal_surat','tanggal_surat');
		$this->form_validation->set_rules('tanda_tangan','tanda_tangan');
	
		if($this->form_validation->run() === FALSE)
			$this->tampilkan($data);
		else
		{
			echo "<script>alert('Tambah data berhasil');</script>";
			$this->umum->set_data("surat_kematian");
			redirect('admin/surat_kematian','refresh');
		}
	}
	else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}

		function update_surat_kematian($id=NULL)
	{
		if($this->session->userdata('akses')=='1') {
			$data['dt_ktp'] = $this->umum->get_data('ktp');
	$data['dt_pegawai'] = $this->umum->get_data('pegawai');
		$data['d']=$this->umum->update_surat_kematian($id);
		$data['page'] = 'update_surat_kematian';

			$this->tampilkan($data);
		}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
	function simpan_surat_kematian(){
$id_surat_kematian = $this->input->post('id_surat_kematian');
$id_ktp = $this->input->post('id_ktp');
	$no_surat = $this->input->post('no_surat');
	$hari = $this->input->post('hari');
	$pukul = $this->input->post('pukul');
	$bertempat = $this->input->post('bertempat');
	$dimakamkan = $this->input->post('dimakamkan');
	$tanggal_surat = $this->input->post('tanggal_surat');
	$tanda_tangan = $this->input->post('tanda_tangan');
	$status = $this->input->post('status');
	$query=$this->db->query("Select * from ktp join pengunjung on ktp.nik=pengunjung.nik where 
  ktp.id_ktp= '$id_ktp'");
 foreach ($query->result() as $row) {
 $email=$row->email;
  }

                                                        
	 $qrcode='';                                              
	if($status=='Selesai') {
		 $this->load->library('ciqrcode'); //pemanggilan library QR CODE
 
        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/'; //string, the default is application/logs/
        $config['imagedir']     = './assets/images/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);
 $link="http://192.168.2.211:8080/siapkades/qr/scan/$id_surat_kematian";
        $qrcode=$id_surat_kematian.'.png'; //buat name dari qr code sesuai dengan asal_pendapatan
 
        $params['data'] = $link; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$qrcode; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
        $mail = new PHPMailer(true);

try {
 //Server settings
 $mail->SMTPDebug = 2;                      //Enable verbose debug output
 $mail->isSMTP();                                            //Send using SMTP
 $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
 $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
 $mail->Username   = 'siapkades.pantaihambawang@gmail.com';                     //SMTP username
 $mail->Password   = 'dabdbgtuvbuehkus';                               //SMTP password
 $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
 $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

 //pengirim
 $mail->setFrom('siapkades.pantaihambawang@gmail.com', 'SIAPKADES');
 $mail->addAddress($email);     //Add a recipient

 //Content
 $mail->isHTML(true);                                  //Set email format to HTML
 $mail->Subject = 'Pelayanan Surat | SIAPKADES';
 $mail->Body    = 'Kami informasikan  permohonan surat kematian anda sudah selesai silahkan login ke website untuk download file suratnya.';
 $mail->AltBody ='' ;
 //$mail->AddEmbeddedImage('gambar/logo.png', 'logo'); //abaikan jika tidak ada logo
 //$mail->addAttachment(''); 

 $mail->send();
 echo 'Message has been sent';
	 
}
 catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

}
}
	
	
	if (!empty($_FILES["file"]["name"])) {
          $file = $this->uploadSurat();
        } else {
            $file = $this->input->post('old_image');
		}
	$data_update = array(
			'id_surat_kematian' => $id_surat_kematian,
			'id_ktp' => $id_ktp,
			'no_surat' => $no_surat,
			'hari' => $hari,
			'pukul' => $pukul,
			'bertempat' => $bertempat,
			'dimakamkan' => $dimakamkan,
			'tanggal_surat' => $tanggal_surat,
			'qrcode' => $qrcode,
			'tanda_tangan' => $tanda_tangan,
			'status' => $status,
			'file' => $file
		);
		$where = array('id_surat_kematian' => $id_surat_kematian);
		$res = $this->umum->UpdateData('surat_kematian', $data_update, $where);
		if($res>=1){
			redirect('admin/surat_kematian');
		}else{
			echo "<h1>GAGAL</h1>";
		}
	}
	function delete_surat_kematian($id=NULL)
	{
			if($this->session->userdata('akses')=='1') {
		$this->umum->hapus('surat_kematian','id_surat_kematian',$id);
		redirect('admin/surat_kematian');
		}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
	function surat_pindah_datang() { 
	if($this->session->userdata('akses')=='1') {
	$data['page'] = 'surat_pindah_datang';
	$data['dt_surat_pindah_datang'] = $this->umum->admin_surat_pindah_datang();
	$this->tampilkan($data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}
	
	function tambah_surat_pindah_datang() { 
		if($this->session->userdata('akses')=='1') {
	$data['page']="tambah_surat_pindah_datang";
	$data['dt_ktp'] = $this->umum->get_data('ktp');
	$data['dt_pegawai'] = $this->umum->get_data('pegawai');
	$this->db->set('id_surat_pindah_datang', 'UUID()', FALSE);
		$this->form_validation->set_rules('jenis_permohonan','jenis_permohonan','required');
		$this->form_validation->set_rules('no_surat','no_surat');
		$this->form_validation->set_rules('tanggal_surat','tanggal_surat');
		$this->form_validation->set_rules('tanda_tangan','tanda_tangan');
		$this->form_validation->set_rules('no_kk','no_kk');
		$this->form_validation->set_rules('nama_kk','nama_kk');
		$this->form_validation->set_rules('alamat_awal','alamat_awal');
		$this->form_validation->set_rules('rt_awal','rt_awal');
		$this->form_validation->set_rules('rw_awal','rw_awal');
		$this->form_validation->set_rules('dusun_awal','dusun_awal');
		$this->form_validation->set_rules('desa_awal','desa_awal');
		$this->form_validation->set_rules('kec_awal','kec_awal');
		$this->form_validation->set_rules('kab_awal','kab_awal');
		$this->form_validation->set_rules('prov_awal','prov_awal');
		$this->form_validation->set_rules('pos_awal','pos_awal');
		$this->form_validation->set_rules('telp_awal','telp_awal');
		$this->form_validation->set_rules('id_ktp','id_ktp');
		$this->form_validation->set_rules('alasan_pindah','alasan_pindah');	
		$this->form_validation->set_rules('alamat_pindah','alamat_pindah');
		$this->form_validation->set_rules('rt_pindah','rt_pindah');
		$this->form_validation->set_rules('rw_pindah','rw_pindah');
		$this->form_validation->set_rules('dusun_pindah','dusun_pindah');
		$this->form_validation->set_rules('desa_pindah','desa_pindah');
		$this->form_validation->set_rules('kec_pindah','kec_pindah');
		$this->form_validation->set_rules('kab_pindah','kab_pindah');
		$this->form_validation->set_rules('prov_pindah','prov_pindah');
		$this->form_validation->set_rules('pos_pindah','pos_pindah');
		$this->form_validation->set_rules('telp_pindah','telp_pindah');
		$this->form_validation->set_rules('jenis_kepindahan','jenis_kepindahan');
		$this->form_validation->set_rules('status_kk_tidak_pindah','status_kk_tidak_pindah');
		$this->form_validation->set_rules('status_kk_pindah','status_kk_pindah');
		$this->form_validation->set_rules('nik1','nik1');
		$this->form_validation->set_rules('nik2','nik2');
		$this->form_validation->set_rules('nik3','nik3');
		$this->form_validation->set_rules('nik4','nik4');
		$this->form_validation->set_rules('nik5','nik5');
		$this->form_validation->set_rules('nik6','nik6');
		$this->form_validation->set_rules('nik7','nik7');
		$this->form_validation->set_rules('nama1','nama1');
		$this->form_validation->set_rules('nama2','nama2');
		$this->form_validation->set_rules('nama3','nama3');
		$this->form_validation->set_rules('nama4','nama4');
		$this->form_validation->set_rules('nama5','nama5');
		$this->form_validation->set_rules('nama6','nama6');
		$this->form_validation->set_rules('nama7','nama7');
	
		if($this->form_validation->run() === FALSE)
			$this->tampilkan($data);
		else
		{
			echo "<script>alert('Tambah data berhasil');</script>";
			$this->umum->set_data("surat_pindah_datang");
			redirect('admin/surat_pindah_datang','refresh');
		}
	}
	else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
	function update_surat_pindah_datang($id=NULL) { 
		if($this->session->userdata('akses')=='1') {
	$data['page']="update_surat_pindah_datang";
	$data['dt_ktp'] = $this->umum->get_data('ktp');
	$data['dt_pegawai'] = $this->umum->get_data('pegawai');
	$data['d']=$this->umum->update_surat_pindah_datang($id);
	
			$this->tampilkan($data);
	}
	else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
	function simpan_surat_pindah_datang(){
$id_surat_pindah_datang = $this->input->post('id_surat_pindah_datang');
$jenis_permohonan = $this->input->post('jenis_permohonan');
	$no_surat = $this->input->post('no_surat');
	$no_kk = $this->input->post('no_kk');
	$nama_kk = $this->input->post('nama_kk');
		$alamat_awal=$this->input->post('alamat_awal');
		$rt_awal=$this->input->post('rt_awal');
		$rw_awal=$this->input->post('rw_awal');
		$dusun_awal=$this->input->post('dusun_awal');
		$desa_awal=$this->input->post('desa_awal');
		$kec_awal=$this->input->post('kec_awal');
		$kab_awal=$this->input->post('kab_awal');
		$prov_awal=$this->input->post('prov_awal');
		$pos_awal=$this->input->post('pos_awal');
		$qrcode=$this->input->post('qrcode');
		$telp_awal=$this->input->post('telp_awal');
		$id_ktp=$this->input->post('id_ktp');
		$alasan_pindah=$this->input->post('alasan_pindah');	
		$alamat_pindah=$this->input->post('alamat_pindah');
		$rt_pindah=$this->input->post('rt_pindah');
		$rw_pindah=$this->input->post('rw_pindah');
		$dusun_pindah=$this->input->post('dusun_pindah');
		$desa_pindah=$this->input->post('desa_pindah');
		$kec_pindah=$this->input->post('kec_pindah');
		$kab_pindah=$this->input->post('kab_pindah');
		$prov_pindah=$this->input->post('prov_pindah');
		$pos_pindah=$this->input->post('pos_pindah');
		$telp_pindah=$this->input->post('telp_pindah');
		$jenis_kepindahan=$this->input->post('jenis_kepindahan');
		$status_kk_tidak_pindah=$this->input->post('status_kk_tidak_pindah');
		$status_kk_pindah=$this->input->post('status_kk_pindah');
		$nik1=$this->input->post('nik1');
		$nik2=$this->input->post('nik2');
		$nik3=$this->input->post('nik3');
		$nik4=$this->input->post('nik4');
		$nik5=$this->input->post('nik5');
		$nik6=$this->input->post('nik6');
		$nik7=$this->input->post('nik7');
		$nama1=$this->input->post('nama1');
		$nama2=$this->input->post('nama2');
		$nama3=$this->input->post('nama3');
		$nama4=$this->input->post('nama4');
		$nama5=$this->input->post('nama5');
		$nama6=$this->input->post('nama6');
		$nama7=$this->input->post('nama7');
	
	$tanggal_surat = $this->input->post('tanggal_surat');
	$tanda_tangan = $this->input->post('tanda_tangan');
	$status = $this->input->post('status');
	$query=$this->db->query("Select * from ktp join pengunjung on ktp.nik=pengunjung.nik where 
  ktp.id_ktp= '$id_ktp'");
 foreach ($query->result() as $row) {
 $email=$row->email;
  }

                                                        
	 $qrcode='';                                              
	if($status=='Selesai') {
		 $this->load->library('ciqrcode'); //pemanggilan library QR CODE
 
        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/'; //string, the default is application/logs/
        $config['imagedir']     = './assets/images/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);
 $link="http://192.168.2.211:8080/siapkades/qr/scan/$id_surat_pindah_datang";
        $qrcode=$id_surat_pindah_datang.'.png'; //buat name dari qr code sesuai dengan asal_pendapatan
 
        $params['data'] = $link; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$qrcode; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
        $mail = new PHPMailer(true);

try {
 //Server settings
 $mail->SMTPDebug = 2;                      //Enable verbose debug output
 $mail->isSMTP();                                            //Send using SMTP
 $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
 $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
 $mail->Username   = 'siapkades.pantaihambawang@gmail.com';                     //SMTP username
 $mail->Password   = 'dabdbgtuvbuehkus';                               //SMTP password
 $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
 $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

 //pengirim
 $mail->setFrom('siapkades.pantaihambawang@gmail.com', 'SIAPKADES');
 $mail->addAddress($email);     //Add a recipient

 //Content
 $mail->isHTML(true);                                  //Set email format to HTML
 $mail->Subject = 'Pelayanan Surat | SIAPKADES';
 $mail->Body    = 'Kami informasikan  permohonan surat pindah datang anda sudah selesai silahkan login ke website untuk download file suratnya.';
 $mail->AltBody ='' ;
 //$mail->AddEmbeddedImage('gambar/logo.png', 'logo'); //abaikan jika tidak ada logo
 //$mail->addAttachment(''); 

 $mail->send();
 echo 'Message has been sent';
	 
}
 catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

}
}
	
	if (!empty($_FILES["file"]["name"])) {
          $file = $this->uploadSurat();
        } else {
            $file = $this->input->post('old_image');
		}
	$data_update = array(
			'id_surat_pindah_datang' => $id_surat_pindah_datang,
			'jenis_permohonan' => $jenis_permohonan,
			'no_surat' => $no_surat,
			'no_kk' => $no_kk,
			'nama_kk' => $nama_kk,
		'alamat_awal' => $alamat_awal,
		'rt_awal' => $rt_awal,
		'rw_awal' => $rw_awal,
		'dusun_awal' => $dusun_awal,
		'desa_awal' => $desa_awal,
		'kec_awal' => $kec_awal,
		'kab_awal' => $kab_awal,
		'prov_awal' => $prov_awal,
		'pos_awal' => $pos_awal,
		'telp_awal' => $telp_awal,
		'id_ktp' => $id_ktp,
		'alasan_pindah' => $alasan_pindah,	
		'alamat_pindah' => $alamat_pindah,
		'rt_pindah' => $rt_pindah,
		'rw_pindah' => $rw_pindah,
		'dusun_pindah' => $dusun_pindah,
		'desa_pindah' => $desa_pindah,
		'kec_pindah' => $kec_pindah,
		'kab_pindah' => $kab_pindah,
		'prov_pindah' => $prov_pindah,
		'pos_pindah' => $pos_pindah,
		'telp_pindah' => $telp_pindah,
		'jenis_kepindahan' => $jenis_kepindahan,
		'status_kk_tidak_pindah' => $status_kk_tidak_pindah,
		'status_kk_pindah' => $status_kk_pindah,
		'nik1' => $nik1,
		'nik2' => $nik2,
		'nik3' => $nik3,
		'nik4' => $nik4,
		'nik5' => $nik5,
		'nik6' => $nik6,
		'nik7' => $nik7,
		'nama1' => $nama1,
		'nama2' => $nama2,
		'nama3' => $nama3,
		'nama4' => $nama4,
		'nama5' => $nama5,
		'nama6' => $nama6,
		'nama7' => $nama7,
			'tanggal_surat' => $tanggal_surat,
			'tanda_tangan' => $tanda_tangan,
			'status' => $status,
			'file' => $file
		);
		$where = array('id_surat_pindah_datang' => $id_surat_pindah_datang);
		$res = $this->umum->UpdateData('surat_pindah_datang', $data_update, $where);
		if($res>=1){
			redirect('admin/surat_pindah_datang');
		}else{
			echo "<h1>GAGAL</h1>";
		}
	}
	function print_surat_pindah_datang($id=NULL) { 
	if($this->session->userdata('akses')!='0') {
	$data['d']=$this->umum->print_surat_pindah_datang($id);
		$this->load->view('admin/print_surat_pindah_datang',$data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}
	function delete_surat_pindah_datang($id=NULL)
	{
			if($this->session->userdata('akses')=='1') {
		$this->umum->hapus('surat_pindah_datang','id_surat_pindah_datang',$id);
		redirect('admin/surat_pindah_datang');
		}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
function surat_pindah_keluar() { 
	if($this->session->userdata('akses')=='1') {
	$data['page'] = 'surat_pindah_keluar';
	$data['dt_surat_pindah_keluar'] = $this->umum->admin_surat_pindah_keluar();
	$this->tampilkan($data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}
	function tambah_surat_pindah_keluar() { 
		if($this->session->userdata('akses')=='1') {
	$data['page']="tambah_surat_pindah_keluar";
	$data['dt_ktp'] = $this->umum->get_data('ktp');
	$data['dt_kk'] = $this->umum->get_data('kk');
	$data['dt_pegawai'] = $this->umum->get_data('pegawai');
	$this->db->set('id_surat_pindah_keluar', 'UUID()', FALSE);
		$this->form_validation->set_rules('jenis_permohonan','jenis_permohonan','required');
		$this->form_validation->set_rules('no_surat','no_surat');
		$this->form_validation->set_rules('tanggal_surat','tanggal_surat');
		$this->form_validation->set_rules('tanda_tangan','tanda_tangan');
		$this->form_validation->set_rules('no_kk','no_kk');
		$this->form_validation->set_rules('nama_kk','nama_kk');
		$this->form_validation->set_rules('alamat_awal','alamat_awal');
		$this->form_validation->set_rules('rt_awal','rt_awal');
		$this->form_validation->set_rules('rw_awal','rw_awal');
		$this->form_validation->set_rules('dusun_awal','dusun_awal');
		$this->form_validation->set_rules('desa_awal','desa_awal');
		$this->form_validation->set_rules('kec_awal','kec_awal');
		$this->form_validation->set_rules('kab_awal','kab_awal');
		$this->form_validation->set_rules('prov_awal','prov_awal');
		$this->form_validation->set_rules('pos_awal','pos_awal');
		$this->form_validation->set_rules('telp_awal','telp_awal');
		$this->form_validation->set_rules('id_ktp','id_ktp');
		$this->form_validation->set_rules('alasan_pindah','alasan_pindah');	
		$this->form_validation->set_rules('alamat_pindah','alamat_pindah');
		$this->form_validation->set_rules('rt_pindah','rt_pindah');
		$this->form_validation->set_rules('rw_pindah','rw_pindah');
		$this->form_validation->set_rules('dusun_pindah','dusun_pindah');
		$this->form_validation->set_rules('desa_pindah','desa_pindah');
		$this->form_validation->set_rules('kec_pindah','kec_pindah');
		$this->form_validation->set_rules('kab_pindah','kab_pindah');
		$this->form_validation->set_rules('prov_pindah','prov_pindah');
		$this->form_validation->set_rules('pos_pindah','pos_pindah');
		$this->form_validation->set_rules('telp_pindah','telp_pindah');
		$this->form_validation->set_rules('jenis_kepindahan','jenis_kepindahan');
		$this->form_validation->set_rules('status_kk_tidak_pindah','status_kk_tidak_pindah');
		$this->form_validation->set_rules('status_kk_pindah','status_kk_pindah');
		$this->form_validation->set_rules('nik1','nik1');
		$this->form_validation->set_rules('nik2','nik2');
		$this->form_validation->set_rules('nik3','nik3');
		$this->form_validation->set_rules('nik4','nik4');
		$this->form_validation->set_rules('nik5','nik5');
		$this->form_validation->set_rules('nik6','nik6');
		$this->form_validation->set_rules('nik7','nik7');
		$this->form_validation->set_rules('nama1','nama1');
		$this->form_validation->set_rules('nama2','nama2');
		$this->form_validation->set_rules('nama3','nama3');
		$this->form_validation->set_rules('nama4','nama4');
		$this->form_validation->set_rules('nama5','nama5');
		$this->form_validation->set_rules('nama6','nama6');
		$this->form_validation->set_rules('nama7','nama7');
	
		if($this->form_validation->run() === FALSE)
			$this->tampilkan($data);
		else
		{
			echo "<script>alert('Tambah data berhasil');</script>";
			$this->umum->set_data("surat_pindah_keluar");
			redirect('admin/surat_pindah_keluar','refresh');
		}
	}
	else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
	function update_surat_pindah_keluar($id=NULL) { 
		if($this->session->userdata('akses')=='1') {
	$data['page']="update_surat_pindah_keluar";
	$data['dt_ktp'] = $this->umum->get_data('ktp');
		$data['dt_kk'] = $this->umum->get_data('kk');
	$data['dt_pegawai'] = $this->umum->get_data('pegawai');
	$data['d']=$this->umum->update_surat_pindah_keluar($id);
	
			$this->tampilkan($data);
	}
	else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
	function simpan_surat_pindah_keluar(){
$id_surat_pindah_keluar = $this->input->post('id_surat_pindah_keluar');
$jenis_permohonan = $this->input->post('jenis_permohonan');
	$no_surat = $this->input->post('no_surat');
	$no_kk = $this->input->post('no_kk');
	$nama_kk = $this->input->post('nama_kk');
		$alamat_awal=$this->input->post('alamat_awal');
		$rt_awal=$this->input->post('rt_awal');
		$rw_awal=$this->input->post('rw_awal');
		$dusun_awal=$this->input->post('dusun_awal');
		$desa_awal=$this->input->post('desa_awal');
		$kec_awal=$this->input->post('kec_awal');
		$kab_awal=$this->input->post('kab_awal');
		$prov_awal=$this->input->post('prov_awal');
		$pos_awal=$this->input->post('pos_awal');
		$telp_awal=$this->input->post('telp_awal');
		$id_ktp=$this->input->post('id_ktp');
		$alasan_pindah=$this->input->post('alasan_pindah');	
		$alamat_pindah=$this->input->post('alamat_pindah');
		$rt_pindah=$this->input->post('rt_pindah');
		$rw_pindah=$this->input->post('rw_pindah');
		$dusun_pindah=$this->input->post('dusun_pindah');
		$desa_pindah=$this->input->post('desa_pindah');
		$kec_pindah=$this->input->post('kec_pindah');
		$kab_pindah=$this->input->post('kab_pindah');
		$prov_pindah=$this->input->post('prov_pindah');
		$pos_pindah=$this->input->post('pos_pindah');
		$telp_pindah=$this->input->post('telp_pindah');
		$jenis_kepindahan=$this->input->post('jenis_kepindahan');
		$status_kk_tidak_pindah=$this->input->post('status_kk_tidak_pindah');
		$status_kk_pindah=$this->input->post('status_kk_pindah');
		$nik1=$this->input->post('nik1');
		$nik2=$this->input->post('nik2');
		$nik3=$this->input->post('nik3');
		$nik4=$this->input->post('nik4');
		$nik5=$this->input->post('nik5');
		$nik6=$this->input->post('nik6');
		$nik7=$this->input->post('nik7');
		$nama1=$this->input->post('nama1');
		$nama2=$this->input->post('nama2');
		$nama3=$this->input->post('nama3');
		$nama4=$this->input->post('nama4');
		$nama5=$this->input->post('nama5');
		$nama6=$this->input->post('nama6');
		$nama7=$this->input->post('nama7');
	
	$tanggal_surat = $this->input->post('tanggal_surat');
	$tanda_tangan = $this->input->post('tanda_tangan');
	$status = $this->input->post('status');
	$query=$this->db->query("Select * from ktp join pengunjung on ktp.nik=pengunjung.nik where 
  ktp.id_ktp= '$id_ktp'");
 foreach ($query->result() as $row) {
 $email=$row->email;
  }

                                                        
	 $qrcode='';                                              
	if($status=='Selesai') {
		 $this->load->library('ciqrcode'); //pemanggilan library QR CODE
 
        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/'; //string, the default is application/logs/
        $config['imagedir']     = './assets/images/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);
 $link="http://192.168.2.211:8080/siapkades/qr/scan/$id_surat_pindah_keluar";
        $qrcode=$id_surat_keluar.'.png'; //buat name dari qr code sesuai dengan asal_pendapatan
 
        $params['data'] = $link; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$qrcode; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
        $mail = new PHPMailer(true);

try {
 //Server settings
 $mail->SMTPDebug = 2;                      //Enable verbose debug output
 $mail->isSMTP();                                            //Send using SMTP
 $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
 $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
 $mail->Username   = 'siapkades.pantaihambawang@gmail.com';                     //SMTP username
 $mail->Password   = 'dabdbgtuvbuehkus';                               //SMTP password
 $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
 $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

 //pengirim
 $mail->setFrom('siapkades.pantaihambawang@gmail.com', 'SIAPKADES');
 $mail->addAddress($email);     //Add a recipient

 //Content
 $mail->isHTML(true);                                  //Set email format to HTML
 $mail->Subject = 'Pelayanan Surat | SIAPKADES';
 $mail->Body    = 'Kami informasikan  permohonan surat pindah keluar anda sudah selesai silahkan login ke website untuk download file suratnya.';
 $mail->AltBody ='' ;
 //$mail->AddEmbeddedImage('gambar/logo.png', 'logo'); //abaikan jika tidak ada logo
 //$mail->addAttachment(''); 

 $mail->send();
 echo 'Message has been sent';
	 
}
 catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

}
}
	
	
	
	if (!empty($_FILES["file"]["name"])) {
          $file = $this->uploadSurat();
        } else {
            $file = $this->input->post('old_image');
		}
	$data_update = array(
			'id_surat_pindah_keluar' => $id_surat_pindah_keluar,
			'jenis_permohonan' => $jenis_permohonan,
			'no_surat' => $no_surat,
			'no_kk' => $no_kk,
			'nama_kk' => $nama_kk,
		'alamat_awal' => $alamat_awal,
		'rt_awal' => $rt_awal,
		'rw_awal' => $rw_awal,
		'dusun_awal' => $dusun_awal,
		'desa_awal' => $desa_awal,
		'kec_awal' => $kec_awal,
		'kab_awal' => $kab_awal,
		'prov_awal' => $prov_awal,
		'qrcode' => $qrcode,
		'pos_awal' => $pos_awal,
		'telp_awal' => $telp_awal,
		'id_ktp' => $id_ktp,
		'alasan_pindah' => $alasan_pindah,	
		'alamat_pindah' => $alamat_pindah,
		'rt_pindah' => $rt_pindah,
		'rw_pindah' => $rw_pindah,
		'dusun_pindah' => $dusun_pindah,
		'desa_pindah' => $desa_pindah,
		'kec_pindah' => $kec_pindah,
		'kab_pindah' => $kab_pindah,
		'prov_pindah' => $prov_pindah,
		'pos_pindah' => $pos_pindah,
		'telp_pindah' => $telp_pindah,
		'jenis_kepindahan' => $jenis_kepindahan,
		'status_kk_tidak_pindah' => $status_kk_tidak_pindah,
		'status_kk_pindah' => $status_kk_pindah,
		'nik1' => $nik1,
		'nik2' => $nik2,
		'nik3' => $nik3,
		'nik4' => $nik4,
		'nik5' => $nik5,
		'nik6' => $nik6,
		'nik7' => $nik7,
		'nama1' => $nama1,
		'nama2' => $nama2,
		'nama3' => $nama3,
		'nama4' => $nama4,
		'nama5' => $nama5,
		'nama6' => $nama6,
		'nama7' => $nama7,
			'tanggal_surat' => $tanggal_surat,
			'tanda_tangan' => $tanda_tangan,
			'status' => $status,
			'file' => $file
		);
		$where = array('id_surat_pindah_keluar' => $id_surat_pindah_keluar);
		$res = $this->umum->UpdateData('surat_pindah_keluar', $data_update, $where);
		if($res>=1){
			redirect('admin/surat_pindah_keluar');
		}else{
			echo "<h1>GAGAL</h1>";
		}
	}
	function print_surat_pindah_keluar($id=NULL) { 
	if($this->session->userdata('akses')!='0') {
	$data['d']=$this->umum->print_surat_pindah_keluar($id);
		$this->load->view('admin/print_surat_pindah_keluar',$data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}
	function delete_surat_pindah_keluar($id=NULL)
	{
			if($this->session->userdata('akses')=='1') {
		$this->umum->hapus('surat_pindah_keluar','id_surat_pindah_keluar',$id);
		redirect('admin/surat_pindah_keluar');
		}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
	function surat_belum_menikah() { 
	if($this->session->userdata('akses')=='1') {
	$data['page'] = 'surat_belum_menikah';
	$data['dt_surat_belum_menikah'] = $this->umum->admin_surat_belum_menikah();
	$this->tampilkan($data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}
		function print_surat_belum_menikah($id=NULL) { 
	if($this->session->userdata('akses')!='0') {
	$data['d']=$this->umum->print_surat_belum_menikah($id);
		$this->load->view('admin/print_surat_belum_menikah',$data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}
	function cetak_surat_belum_menikah() { 
	if($this->session->userdata('akses')=='1') {
	$data['page'] = 'surat_belum_menikah';
	$data['dt_surat_belum_menikah'] = $this->umum->admin_surat_belum_menikah();
		$this->load->view('admin/cetak_surat_belum_menikah',$data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}
	function tambah_surat_belum_menikah() { 
		if($this->session->userdata('akses')=='1') {
	$data['page']="tambah_surat_belum_menikah";
	$data['dt_ktp'] = $this->umum->get_data('ktp');
	$data['dt_pegawai'] = $this->umum->get_data('pegawai');
	$this->db->set('id_surat_belum_menikah', 'UUID()', FALSE);
		$this->form_validation->set_rules('id_ktp','id_ktp','required');
		$this->form_validation->set_rules('no_surat','no_surat');
		$this->form_validation->set_rules('bin','bin');
		$this->form_validation->set_rules('status_nikah','status_nikah');
		$this->form_validation->set_rules('tanggal_surat','tanggal_surat');
		$this->form_validation->set_rules('tanda_tangan','tanda_tangan');
	
		if($this->form_validation->run() === FALSE)
			$this->tampilkan($data);
		else
		{
			echo "<script>alert('Tambah data berhasil');</script>";
			$this->umum->set_data("surat_belum_menikah");
			redirect('admin/surat_belum_menikah','refresh');
		}
	}
	else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
		function update_surat_belum_menikah($id=NULL)
	{
		if($this->session->userdata('akses')=='1') {
			$data['dt_ktp'] = $this->umum->get_data('ktp');
	$data['dt_pegawai'] = $this->umum->get_data('pegawai');
		$data['d']=$this->umum->update_surat_belum_menikah($id);
		$data['page'] = 'update_surat_belum_menikah';
		
			$this->tampilkan($data);
		}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
	function simpan_surat_belum_menikah(){
$id_surat_belum_menikah = $this->input->post('id_surat_belum_menikah');
$id_ktp = $this->input->post('id_ktp');
	$no_surat = $this->input->post('no_surat');
	$bin = $this->input->post('bin');
	$status_nikah = $this->input->post('status_nikah');
	$tanggal_surat = $this->input->post('tanggal_surat');
	$tanda_tangan = $this->input->post('tanda_tangan');
	$status = $this->input->post('status');
	$query=$this->db->query("Select * from ktp join pengunjung on ktp.nik=pengunjung.nik where 
  ktp.id_ktp= '$id_ktp'");
 foreach ($query->result() as $row) {
 $email=$row->email;
  }

                                                        
	 $qrcode='';                                              
	if($status=='Selesai') {
		 $this->load->library('ciqrcode'); //pemanggilan library QR CODE
 
        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/'; //string, the default is application/logs/
        $config['imagedir']     = './assets/images/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);
 $link="http://192.168.2.211:8080/siapkades/qr/scan/$id_surat_belum_menikah";
        $qrcode=$id_surat_belum_menikah.'.png'; //buat name dari qr code sesuai dengan asal_pendapatan
 
        $params['data'] = $link; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$qrcode; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
        $mail = new PHPMailer(true);

try {
 //Server settings
 $mail->SMTPDebug = 2;                      //Enable verbose debug output
 $mail->isSMTP();                                            //Send using SMTP
 $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
 $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
 $mail->Username   = 'siapkades.pantaihambawang@gmail.com';                     //SMTP username
 $mail->Password   = 'dabdbgtuvbuehkus';                               //SMTP password
 $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
 $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

 //pengirim
 $mail->setFrom('siapkades.pantaihambawang@gmail.com', 'SIAPKADES');
 $mail->addAddress($email);     //Add a recipient

 //Content
 $mail->isHTML(true);                                  //Set email format to HTML
 $mail->Subject = 'Pelayanan Surat | SIAPKADES';
 $mail->Body    = 'Kami informasikan  permohonan surat belum menikah anda sudah selesai silahkan login ke website untuk download file suratnya.';
 $mail->AltBody ='' ;
 //$mail->AddEmbeddedImage('gambar/logo.png', 'logo'); //abaikan jika tidak ada logo
 //$mail->addAttachment(''); 

 $mail->send();
 echo 'Message has been sent';
	 
}
 catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

}
}
	
	
	if (!empty($_FILES["file"]["name"])) {
          $file = $this->uploadSurat();
        } else {
            $file = $this->input->post('old_image');
		}
	$data_update = array(
			'id_surat_belum_menikah' => $id_surat_belum_menikah,
			'id_ktp' => $id_ktp,
			'no_surat' => $no_surat,
			'bin' => $bin,
			'status_nikah' => $status_nikah,
			'tanggal_surat' => $tanggal_surat,
			'tanda_tangan' => $tanda_tangan,
			'status' => $status,
			'qrcode' => $qrcode,
			'file' => $file
		);
		$where = array('id_surat_belum_menikah' => $id_surat_belum_menikah);
		$res = $this->umum->UpdateData('surat_belum_menikah', $data_update, $where);
		if($res>=1){
			redirect('admin/surat_belum_menikah');
		}else{
			echo "<h1>GAGAL</h1>";
		}
	}
	function delete_surat_belum_menikah($id=NULL)
	{
			if($this->session->userdata('akses')=='1') {
		$this->umum->hapus('surat_belum_menikah','id_surat_belum_menikah',$id);
		redirect('admin/surat_belum_menikah');
		}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
	function surat_kurang_mampu() { 
	if($this->session->userdata('akses')=='1') {
	$data['page'] = 'surat_kurang_mampu';
	$data['dt_surat_kurang_mampu'] = $this->umum->admin_surat_kurang_mampu();
	$this->tampilkan($data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}
	function cetak_surat_kurang_mampu() { 
	if($this->session->userdata('akses')=='1') {
	$data['page'] = 'surat_kurang_mampu';
	$data['dt_surat_kurang_mampu'] = $this->umum->admin_surat_kurang_mampu();
		$this->load->view('admin/cetak_surat_kurang_mampu',$data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}
	function print_surat_kurang_mampu($id=NULL) { 
	if($this->session->userdata('akses')!='0') {
	$data['d']=$this->umum->print_surat_kurang_mampu($id);
		$this->load->view('admin/print_surat_kurang_mampu',$data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}
	function tambah_surat_kurang_mampu() { 
		if($this->session->userdata('akses')=='1') {
	$data['page']="tambah_surat_kurang_mampu";
	$data['dt_ktp'] = $this->umum->get_data('ktp');
	$data['dt_pegawai'] = $this->umum->get_data('pegawai');
	$this->db->set('id_surat_kurang_mampu', 'UUID()', FALSE);
		$this->form_validation->set_rules('id_ktp','id_ktp','required');
		$this->form_validation->set_rules('no_surat','no_surat');
		$this->form_validation->set_rules('peruntukan','peruntukan');
		$this->form_validation->set_rules('keperluan','keperluan');
		$this->form_validation->set_rules('penghasilan','penghasilan');
		$this->form_validation->set_rules('tanggal_surat','tanggal_surat');
		$this->form_validation->set_rules('tanda_tangan','tanda_tangan');
	
		if($this->form_validation->run() === FALSE)
			$this->tampilkan($data);
		else
		{
			echo "<script>alert('Tambah data berhasil');</script>";
			$this->umum->set_data("surat_kurang_mampu");
			redirect('admin/surat_kurang_mampu','refresh');
		}
	}
	else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
		function update_surat_kurang_mampu($id=NULL)
	{
		if($this->session->userdata('akses')=='1') {
			$data['dt_ktp'] = $this->umum->get_data('ktp');
	$data['dt_pegawai'] = $this->umum->get_data('pegawai');
		$data['d']=$this->umum->update_surat_kurang_mampu($id);
		$data['page'] = 'update_surat_kurang_mampu';
			$this->tampilkan($data);
		
		}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
	function simpan_surat_kurang_mampu(){
$id_surat_kurang_mampu = $this->input->post('id_surat_kurang_mampu');
$id_ktp = $this->input->post('id_ktp');
	$no_surat = $this->input->post('no_surat');
	$peruntukan = $this->input->post('peruntukan');
	$keperluan = $this->input->post('keperluan');
	$penghasilan = $this->input->post('penghasilan');
	$tanggal_surat = $this->input->post('tanggal_surat');
	$tanda_tangan = $this->input->post('tanda_tangan');
	$status = $this->input->post('status');
	$query=$this->db->query("Select * from ktp join pengunjung on ktp.nik=pengunjung.nik where 
  ktp.id_ktp= '$id_ktp'");
 foreach ($query->result() as $row) {
 $email=$row->email;
  }

                                                        
	    $qrcode='';                                              
	if($status=='Selesai') {
		 $this->load->library('ciqrcode'); //pemanggilan library QR CODE
 
        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/'; //string, the default is application/logs/
        $config['imagedir']     = './assets/images/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);
 $link="http://192.168.2.211:8080/siapkades/qr/scan/$id_surat_kurang_mampu";
        $qrcode=$id_surat_kurang_mampu.'.png'; //buat name dari qr code sesuai dengan asal_pendapatan
 
        $params['data'] = $link; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$qrcode; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
        $mail = new PHPMailer(true);

try {
 //Server settings
 $mail->SMTPDebug = 2;                      //Enable verbose debug output
 $mail->isSMTP();                                            //Send using SMTP
 $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
 $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
 $mail->Username   = 'siapkades.pantaihambawang@gmail.com';                     //SMTP username
 $mail->Password   = 'dabdbgtuvbuehkus';                               //SMTP password
 $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
 $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

 //pengirim
 $mail->setFrom('siapkades.pantaihambawang@gmail.com', 'SIAPKADES');
 $mail->addAddress($email);     //Add a recipient

 //Content
 $mail->isHTML(true);                                  //Set email format to HTML
 $mail->Subject = 'Pelayanan Surat | SIAPKADES';
 $mail->Body    = 'Kami informasikan  permohonan surat kurang mampu anda sudah selesai silahkan login ke website untuk download file suratnya.';
 $mail->AltBody ='' ;
 //$mail->AddEmbeddedImage('gambar/logo.png', 'logo'); //abaikan jika tidak ada logo
 //$mail->addAttachment(''); 

 $mail->send();
 echo 'Message has been sent';
	 
}
 catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

}
}
	
	if (!empty($_FILES["file"]["name"])) {
          $file = $this->uploadSurat();
        } else {
            $file = $this->input->post('old_image');
		}
	$data_update = array(
			'id_surat_kurang_mampu' => $id_surat_kurang_mampu,
			'id_ktp' => $id_ktp,
			'no_surat' => $no_surat,
			'peruntukan' => $peruntukan,
			'keperluan' => $keperluan,
			'penghasilan' => $penghasilan,
			'tanggal_surat' => $tanggal_surat,
			'tanda_tangan' => $tanda_tangan,
			'qrcode' => $qrcode,
			'status' => $status,
			'file' => $file
		);
		$where = array('id_surat_kurang_mampu' => $id_surat_kurang_mampu);
		$res = $this->umum->UpdateData('surat_kurang_mampu', $data_update, $where);
		if($res>=1){
			redirect('admin/surat_kurang_mampu');
		}else{
			echo "<h1>GAGAL</h1>";
		}
	}
	function delete_surat_kurang_mampu($id=NULL)
	{
			if($this->session->userdata('akses')=='1') {
		$this->umum->hapus('surat_kurang_mampu','id_surat_kurang_mampu',$id);
		redirect('admin/surat_kurang_mampu');
		}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
	function surat_domisili() { 
	if($this->session->userdata('akses')=='1') {
	$data['page'] = 'surat_domisili';
	$data['dt_surat_domisili'] = $this->umum->admin_surat_domisili();
	$this->tampilkan($data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}
	function cetak_surat_domisili() { 
	if($this->session->userdata('akses')=='1') {
	$data['page'] = 'surat_domisili';
	$data['dt_surat_domisili'] = $this->umum->admin_surat_domisili();
		$this->load->view('admin/cetak_surat_domisili',$data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}
	function print_surat_domisili($id=NULL) { 
	if($this->session->userdata('akses')!='0') {
	$data['d']=$this->umum->print_surat_domisili($id);
		$this->load->view('admin/print_surat_domisili',$data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}
	
	function tambah_surat_domisili() { 
		if($this->session->userdata('akses')=='1') {
	$data['page']="tambah_surat_domisili";
	$data['dt_ktp'] = $this->umum->get_data('ktp');
	$data['dt_pegawai'] = $this->umum->get_data('pegawai');
	$this->db->set('id_surat_domisili', 'UUID()', FALSE);
		$this->form_validation->set_rules('id_ktp','id_ktp','required');
		$this->form_validation->set_rules('no_surat','no_surat');
		$this->form_validation->set_rules('alamat_domisili','alamat_domisili','required');
		$this->form_validation->set_rules('tanggal_surat','tanggal_surat');
		$this->form_validation->set_rules('tanda_tangan','tanda_tangan');
		
	
		if($this->form_validation->run() === FALSE)
			$this->tampilkan($data);
		else
		{
			echo "<script>alert('Tambah data berhasil');</script>";
			$this->umum->set_data("surat_domisili");
			redirect('admin/surat_domisili','refresh');
		}
	}
	else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
		function update_surat_domisili($id=NULL)
	{
		if($this->session->userdata('akses')=='1') {
			$data['dt_ktp'] = $this->umum->get_data('ktp');
	$data['dt_pegawai'] = $this->umum->get_data('pegawai');
		$data['d']=$this->umum->update_surat_domisili($id);
		$data['page'] = 'update_surat_domisili';
			$this->tampilkan($data);
		}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
	function simpan_surat_domisili(){
$id_surat_domisili = $this->input->post('id_surat_domisili');
$id_ktp = $this->input->post('id_ktp');

	$no_surat = $this->input->post('no_surat');
	$alamat_domisili = $this->input->post('alamat_domisili');
	$tanggal_surat = $this->input->post('tanggal_surat');
	$tanda_tangan = $this->input->post('tanda_tangan');
	$status = $this->input->post('status');
	
 $query=$this->db->query("Select * from ktp join pengunjung on ktp.nik=pengunjung.nik where 
  ktp.id_ktp= '$id_ktp'");
 foreach ($query->result() as $row) {
 $email=$row->email;
  }

          $qrcode='';                                              
	if($status=='Selesai') {
		 $this->load->library('ciqrcode'); //pemanggilan library QR CODE
 
        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/'; //string, the default is application/logs/
        $config['imagedir']     = './assets/images/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);
 $link="http://192.168.2.211:8080/siapkades/qr/scan/$id_surat_domisili";
        $qrcode=$id_surat_domisili.'.png'; //buat name dari qr code sesuai dengan asal_pendapatan
 
        $params['data'] = $link; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$qrcode; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
        $mail = new PHPMailer(true);

try {
 //Server settings
 $mail->SMTPDebug = 2;                      //Enable verbose debug output
 $mail->isSMTP();                                            //Send using SMTP
 $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
 $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
 $mail->Username   = 'siapkades.pantaihambawang@gmail.com';                     //SMTP username
 $mail->Password   = 'dabdbgtuvbuehkus';                               //SMTP password
 $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
 $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

 //pengirim
 $mail->setFrom('siapkades.pantaihambawang@gmail.com', 'SIAPKADES');
 $mail->addAddress($email);     //Add a recipient

 //Content
 $mail->isHTML(true);                                  //Set email format to HTML
 $mail->Subject = 'Pelayanan Surat | SIAPKADES';
 $mail->Body    = 'Kami informasikan permohonan surat domisili anda sudah selesai silahkan login ke website untuk download file suratnya.';
 $mail->AltBody ='' ;
 //$mail->AddEmbeddedImage('gambar/logo.png', 'logo'); //abaikan jika tidak ada logo
 //$mail->addAttachment(''); 

 $mail->send();
 echo 'Message has been sent';
	 
}
 catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

}
}


	if (!empty($_FILES["file"]["name"])) {
          $file = $this->uploadSurat();
        } else {
            $file = $this->input->post('old_image');
		}
	$data_update = array(
			'id_surat_domisili' => $id_surat_domisili,
			'id_ktp' => $id_ktp,
			'no_surat' => $no_surat,
			'alamat_domisili' => $alamat_domisili,
			'tanggal_surat' => $tanggal_surat,
			'tanda_tangan' => $tanda_tangan,
			'status' => $status,
			'qrcode' => $qrcode,
			'file' => $file
		);
		$where = array('id_surat_domisili' => $id_surat_domisili);
		$res = $this->umum->UpdateData('surat_domisili', $data_update, $where);
		if($res>=1){
			redirect('admin/surat_domisili');
		}else{
			echo "<h1>GAGAL</h1>";
		}
	}
	function delete_surat_domisili($id=NULL)
	{
			if($this->session->userdata('akses')=='1') {
		$this->umum->hapus('surat_domisili','id_surat_domisili',$id);
		redirect('admin/surat_domisili');
		}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
	function surat_janda() { 
	if($this->session->userdata('akses')=='1') {
	$data['page'] = 'surat_janda';
	$data['dt_surat_janda'] = $this->umum->admin_surat_janda();
	$this->tampilkan($data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}
	function cetak_surat_janda() { 
	if($this->session->userdata('akses')=='1') {
	$data['page'] = 'surat_janda';
	$data['dt_surat_janda'] = $this->umum->admin_surat_janda();
		$this->load->view('admin/cetak_surat_janda',$data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}
	function print_surat_janda($id=NULL) { 
	if($this->session->userdata('akses')!='0') {
	$data['d']=$this->umum->print_surat_janda($id);
		$this->load->view('admin/print_surat_janda',$data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}
	
	function tambah_surat_janda() { 
		if($this->session->userdata('akses')=='1') {
	$data['page']="tambah_surat_janda";
	$data['dt_ktp'] = $this->umum->get_data('ktp');
	$data['dt_pegawai'] = $this->umum->get_data('pegawai');
	$this->db->set('id_surat_janda', 'UUID()', FALSE);
		$this->form_validation->set_rules('id_ktp','id_ktp','required');

		
	
		if($this->form_validation->run() === FALSE)
			$this->tampilkan($data);
		else
		{
			echo "<script>alert('Tambah data berhasil');</script>";
			$this->umum->set_data("surat_janda");
			redirect('admin/surat_janda','refresh');
		}
	}
	else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
		function update_surat_janda($id=NULL)
	{
		if($this->session->userdata('akses')=='1') {
			$data['dt_ktp'] = $this->umum->get_data('ktp');
	$data['dt_pegawai'] = $this->umum->get_data('pegawai');
		$data['d']=$this->umum->update_surat_janda($id);
		$data['page'] = 'update_surat_janda';
			$this->tampilkan($data);
		}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
	function simpan_surat_janda(){
$id_surat_janda = $this->input->post('id_surat_janda');
$id_ktp = $this->input->post('id_ktp');

	$no_surat = $this->input->post('no_surat');

	$tanggal_surat = $this->input->post('tanggal_surat');
	$tanda_tangan = $this->input->post('tanda_tangan');
	$status = $this->input->post('status');
	
 $query=$this->db->query("Select * from ktp join pengunjung on ktp.nik=pengunjung.nik where 
  ktp.id_ktp= '$id_ktp'");
 foreach ($query->result() as $row) {
 $email=$row->email;
  }

          $qrcode='';                                              
	if($status=='Selesai') {
		 $this->load->library('ciqrcode'); //pemanggilan library QR CODE
 
        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/'; //string, the default is application/logs/
        $config['imagedir']     = './assets/images/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);
 $link="http://192.168.2.211:8080/siapkades/qr/scan/$id_surat_janda";
        $qrcode=$id_surat_janda.'.png'; //buat name dari qr code sesuai dengan asal_pendapatan
 
        $params['data'] = $link; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$qrcode; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
        $mail = new PHPMailer(true);

try {
 //Server settings
 $mail->SMTPDebug = 2;                      //Enable verbose debug output
 $mail->isSMTP();                                            //Send using SMTP
 $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
 $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
 $mail->Username   = 'siapkades.pantaihambawang@gmail.com';                     //SMTP username
 $mail->Password   = 'dabdbgtuvbuehkus';                               //SMTP password
 $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
 $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

 //pengirim
 $mail->setFrom('siapkades.pantaihambawang@gmail.com', 'SIAPKADES');
 $mail->addAddress($email);     //Add a recipient

 //Content
 $mail->isHTML(true);                                  //Set email format to HTML
 $mail->Subject = 'Pelayanan Surat | SIAPKADES';
 $mail->Body    = 'Kami informasikan permohonan surat pernyataan janda anda sudah selesai silahkan login ke website untuk download file suratnya.';
 $mail->AltBody ='' ;
 //$mail->AddEmbeddedImage('gambar/logo.png', 'logo'); //abaikan jika tidak ada logo
 //$mail->addAttachment(''); 

 $mail->send();
 echo 'Message has been sent';
	 
}
 catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

}
}


	if (!empty($_FILES["file"]["name"])) {
          $file = $this->uploadSurat();
        } else {
            $file = $this->input->post('old_image');
		}
	$data_update = array(
			'id_surat_janda' => $id_surat_janda,
			'id_ktp' => $id_ktp,
			'no_surat' => $no_surat,
			
			'tanggal_surat' => $tanggal_surat,
			'tanda_tangan' => $tanda_tangan,
			'status' => $status,
			'qrcode' => $qrcode,
			'file' => $file
		);
		$where = array('id_surat_janda' => $id_surat_janda);
		$res = $this->umum->UpdateData('surat_janda', $data_update, $where);
		if($res>=1){
			redirect('admin/surat_janda');
		}else{
			echo "<h1>GAGAL</h1>";
		}
	}
	function delete_surat_janda($id=NULL)
	{
			if($this->session->userdata('akses')=='1') {
		$this->umum->hapus('surat_janda','id_surat_janda',$id);
		redirect('admin/surat_janda');
		}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
	function surat_izin_keramaian() { 
	if($this->session->userdata('akses')=='1') {
	$data['page'] = 'surat_izin_keramaian';
	$data['dt_surat_izin_keramaian'] = $this->umum->admin_surat_izin_keramaian();
	$this->tampilkan($data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}
	function cetak_surat_izin_keramaian() { 
	if($this->session->userdata('akses')=='1') {
	$data['page'] = 'surat_izin_keramaian';
	$data['dt_surat_izin_keramaian'] = $this->umum->admin_surat_izin_keramaian();
		$this->load->view('admin/cetak_surat_izin_keramaian',$data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}
	function print_surat_izin_keramaian($id=NULL) { 
	if($this->session->userdata('akses')!='0') {
	$data['d']=$this->umum->print_surat_izin_keramaian($id);
		$this->load->view('admin/print_surat_izin_keramaian',$data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}
	
	function tambah_surat_izin_keramaian() { 
		if($this->session->userdata('akses')=='1') {
	$data['page']="tambah_surat_izin_keramaian";
	$data['dt_ktp'] = $this->umum->get_data('ktp');
	$data['dt_pegawai'] = $this->umum->get_data('pegawai');
	$this->db->set('id_surat_izin_keramaian', 'UUID()', FALSE);
		$this->form_validation->set_rules('id_ktp','id_ktp','required');
		
		
	
		if($this->form_validation->run() === FALSE)
			$this->tampilkan($data);
		else
		{
			echo "<script>alert('Tambah data berhasil');</script>";
			$this->umum->set_data("surat_izin_keramaian");
			redirect('admin/surat_izin_keramaian','refresh');
		}
	}
	else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
		function update_surat_izin_keramaian($id=NULL)
	{
		if($this->session->userdata('akses')=='1') {
			$data['dt_ktp'] = $this->umum->get_data('ktp');
	$data['dt_pegawai'] = $this->umum->get_data('pegawai');
		$data['d']=$this->umum->update_surat_izin_keramaian($id);
		$data['page'] = 'update_surat_izin_keramaian';
			$this->tampilkan($data);
		}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
	function simpan_surat_izin_keramaian(){
$id_surat_izin_keramaian = $this->input->post('id_surat_izin_keramaian');
$id_ktp = $this->input->post('id_ktp');
	$no_surat = $this->input->post('no_surat');
	$tanggal_surat = $this->input->post('tanggal_surat');
	$dalam_rangka = $this->input->post('dalam_rangka');
	$hari = $this->input->post('hari');
	$tanggal = $this->input->post('tanggal');
	$tempat = $this->input->post('tempat');
	$tanda_tangan = $this->input->post('tanda_tangan');
	$status = $this->input->post('status');
 $query=$this->db->query("Select * from ktp join pengunjung on ktp.nik=pengunjung.nik where 
  ktp.id_ktp= '$id_ktp'");
 foreach ($query->result() as $row) {
 $email=$row->email;
  }

                                                        
	 $qrcode='';                                              
	if($status=='Selesai') {
		 $this->load->library('ciqrcode'); //pemanggilan library QR CODE
 
        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/'; //string, the default is application/logs/
        $config['imagedir']     = './assets/images/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);
 $link="http://192.168.2.211:8080/siapkades/qr/scan/$id_surat_izin_keramaian";
        $qrcode=$id_surat_izin_keramaian.'.png'; //buat name dari qr code sesuai dengan asal_pendapatan
 
        $params['data'] = $link; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$qrcode; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
        $mail = new PHPMailer(true);

try {
 //Server settings
 $mail->SMTPDebug = 2;                      //Enable verbose debug output
 $mail->isSMTP();                                            //Send using SMTP
 $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
 $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
 $mail->Username   = 'siapkades.pantaihambawang@gmail.com';                     //SMTP username
 $mail->Password   = 'dabdbgtuvbuehkus';                               //SMTP password
 $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
 $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

 //pengirim
 $mail->setFrom('siapkades.pantaihambawang@gmail.com', 'SIAPKADES');
 $mail->addAddress($email);     //Add a recipient

 //Content
 $mail->isHTML(true);                                  //Set email format to HTML
 $mail->Subject = 'Pelayanan Surat | SIAPKADES';
 $mail->Body    = 'Kami informasikan  permohonan surat izin mengumpulkan orang banyak/izin keramaian anda sudah selesai silahkan login ke website untuk download file suratnya.';
 $mail->AltBody ='' ;
 //$mail->AddEmbeddedImage('gambar/logo.png', 'logo'); //abaikan jika tidak ada logo
 //$mail->addAttachment(''); 

 $mail->send();
 echo 'Message has been sent';
	 
}
 catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

}
}
	


	if (!empty($_FILES["file"]["name"])) {
          $file = $this->uploadSurat();
        } else {
            $file = $this->input->post('old_image');
		}
	$data_update = array(
			'id_surat_izin_keramaian' => $id_surat_izin_keramaian,
			'id_ktp' => $id_ktp,
			'no_surat' => $no_surat,
			'dalam_rangka' => $dalam_rangka,
			'hari' => $hari,
			'tanggal' => $tanggal,
			'tempat' => $tempat,
			'tanggal_surat' => $tanggal_surat,
			'tanda_tangan' => $tanda_tangan,
			'status' => $status,
			'file' => $file
		);
		$where = array('id_surat_izin_keramaian' => $id_surat_izin_keramaian);
		$res = $this->umum->UpdateData('surat_izin_keramaian', $data_update, $where);
		if($res>=1){
			redirect('admin/surat_izin_keramaian');
		}else{
			echo "<h1>GAGAL</h1>";
		}
	}
	function delete_surat_izin_keramaian($id=NULL)
	{
			if($this->session->userdata('akses')=='1') {
		$this->umum->hapus('surat_izin_keramaian','id_surat_izin_keramaian',$id);
		redirect('admin/surat_izin_keramaian');
		}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
	function surat_skck() { 
	if($this->session->userdata('akses')=='1') {
	$data['page'] = 'surat_skck';
	$data['dt_surat_skck'] = $this->umum->admin_surat_skck();
	$this->tampilkan($data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}
	function cetak_surat_skck() { 
	if($this->session->userdata('akses')=='1') {
	$data['page'] = 'surat_skck';
	$data['dt_surat_skck'] = $this->umum->admin_surat_skck();
		$this->load->view('admin/cetak_surat_skck',$data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}
	function print_surat_skck($id=NULL) { 
	if($this->session->userdata('akses')!='0') {
	$data['d']=$this->umum->print_surat_skck($id);
		$this->load->view('admin/print_surat_skck',$data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}
	
	function tambah_surat_skck() { 
		if($this->session->userdata('akses')=='1') {
	$data['page']="tambah_surat_skck";
	$data['dt_ktp'] = $this->umum->get_data('ktp');
	$data['dt_pegawai'] = $this->umum->get_data('pegawai');
	$this->db->set('id_surat_skck', 'UUID()', FALSE);
		$this->form_validation->set_rules('id_ktp','id_ktp','required');
		
		
	
		if($this->form_validation->run() === FALSE)
			$this->tampilkan($data);
		else
		{
			echo "<script>alert('Tambah data berhasil');</script>";
			$this->umum->set_data("surat_skck");
			redirect('admin/surat_skck','refresh');
		}
	}
	else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
		function update_surat_skck($id=NULL)
	{
		if($this->session->userdata('akses')=='1') {
			$data['dt_ktp'] = $this->umum->get_data('ktp');
	$data['dt_pegawai'] = $this->umum->get_data('pegawai');
		$data['d']=$this->umum->update_surat_skck($id);
		$data['page'] = 'update_surat_skck';
			$this->tampilkan($data);
		}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
	function simpan_surat_skck(){
$id_surat_skck = $this->input->post('id_surat_skck');
$id_ktp = $this->input->post('id_ktp');
	$no_surat = $this->input->post('no_surat');
	$tanggal_surat = $this->input->post('tanggal_surat');
	$keperluan = $this->input->post('keperluan');
	
	$tanda_tangan = $this->input->post('tanda_tangan');
	$status = $this->input->post('status');
 $query=$this->db->query("Select * from ktp join pengunjung on ktp.nik=pengunjung.nik where 
  ktp.id_ktp= '$id_ktp'");
 foreach ($query->result() as $row) {
 $email=$row->email;
  }

                                                        
	 $qrcode='';                                              
	if($status=='Selesai') {
		 $this->load->library('ciqrcode'); //pemanggilan library QR CODE
 
        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/'; //string, the default is application/logs/
        $config['imagedir']     = './assets/images/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);
 $link="http://192.168.2.211:8080/siapkades/qr/scan/$id_surat_skck";
        $qrcode=$id_surat_skck.'.png'; //buat name dari qr code sesuai dengan asal_pendapatan
 
        $params['data'] = $link; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$qrcode; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
        $mail = new PHPMailer(true);

try {
 //Server settings
 $mail->SMTPDebug = 2;                      //Enable verbose debug output
 $mail->isSMTP();                                            //Send using SMTP
 $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
 $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
 $mail->Username   = 'siapkades.pantaihambawang@gmail.com';                     //SMTP username
 $mail->Password   = 'dabdbgtuvbuehkus';                               //SMTP password
 $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
 $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

 //pengirim
 $mail->setFrom('siapkades.pantaihambawang@gmail.com', 'SIAPKADES');
 $mail->addAddress($email);     //Add a recipient

 //Content
 $mail->isHTML(true);                                  //Set email format to HTML
 $mail->Subject = 'Pelayanan Surat | SIAPKADES';
 $mail->Body    = 'Kami informasikan  permohonan surat skck anda sudah selesai silahkan login ke website untuk download file suratnya.';
 $mail->AltBody ='' ;
 //$mail->AddEmbeddedImage('gambar/logo.png', 'logo'); //abaikan jika tidak ada logo
 //$mail->addAttachment(''); 

 $mail->send();
 echo 'Message has been sent';
	 
}
 catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

}
}
	

	if (!empty($_FILES["file"]["name"])) {
          $file = $this->uploadSurat();
        } else {
            $file = $this->input->post('old_image');
		}
	$data_update = array(
			'id_surat_skck' => $id_surat_skck,
			'id_ktp' => $id_ktp,
			'no_surat' => $no_surat,
			'keperluan' => $keperluan,
			'qrcode' => $qrcode,
		
			'tanggal_surat' => $tanggal_surat,
			'tanda_tangan' => $tanda_tangan,
			'status' => $status,
			'file' => $file
		);
		$where = array('id_surat_skck' => $id_surat_skck);
		$res = $this->umum->UpdateData('surat_skck', $data_update, $where);
		if($res>=1){
			redirect('admin/surat_skck');
		}else{
			echo "<h1>GAGAL</h1>";
		}
	}
	function delete_surat_skck($id=NULL)
	{
			if($this->session->userdata('akses')=='1') {
		$this->umum->hapus('surat_skck','id_surat_skck',$id);
		redirect('admin/surat_skck');
		}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}

	function surat_biodek() { 
	if($this->session->userdata('akses')=='1') {
	$data['page'] = 'surat_biodek';
	$data['dt_surat_biodek'] = $this->umum->admin_surat_biodek();
	$this->tampilkan($data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}
	function cetak_surat_biodek() { 
	if($this->session->userdata('akses')=='1') {
	$data['page'] = 'surat_biodek';
	$data['dt_surat_biodek'] = $this->umum->admin_surat_biodek();
		$this->load->view('admin/cetak_surat_biodek',$data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}
	function print_surat_biodek($id=NULL) { 
	if($this->session->userdata('akses')!='0') {
	$data['d']=$this->umum->print_surat_biodek($id);
		$this->load->view('admin/print_surat_biodek',$data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}
	
	function tambah_surat_biodek() { 
		if($this->session->userdata('akses')=='1') {
	$data['page']="tambah_surat_biodek";
	$data['dt_ktp'] = $this->umum->get_data('ktp');
	$data['dt_pegawai'] = $this->umum->get_data('pegawai');
	$this->db->set('id_surat_biodek', 'UUID()', FALSE);
		$this->form_validation->set_rules('id_ktp','id_ktp','required');
		
		
	
		if($this->form_validation->run() === FALSE)
			$this->tampilkan($data);
		else
		{
			echo "<script>alert('Tambah data berhasil');</script>";
			$this->umum->set_data("surat_biodek");
			redirect('admin/surat_biodek','refresh');
		}
	}
	else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
		function update_surat_biodek($id=NULL)
	{
		if($this->session->userdata('akses')=='1') {
			$data['dt_ktp'] = $this->umum->get_data('ktp');
	$data['dt_pegawai'] = $this->umum->get_data('pegawai');
		$data['d']=$this->umum->update_surat_biodek($id);
		$data['page'] = 'update_surat_biodek';
			$this->tampilkan($data);
		}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
	function simpan_surat_biodek(){
$id_surat_biodek = $this->input->post('id_surat_biodek');
$id_ktp = $this->input->post('id_ktp');
	$no_surat = $this->input->post('no_surat');
	$tanggal_surat = $this->input->post('tanggal_surat');
	$luas_tanah = $this->input->post('luas_tanah');
	$no_tanah = $this->input->post('no_tanah');
	
	$tanda_tangan = $this->input->post('tanda_tangan');
	$status = $this->input->post('status');
 $query=$this->db->query("Select * from ktp join pengunjung on ktp.nik=pengunjung.nik where 
  ktp.id_ktp= '$id_ktp'");
 foreach ($query->result() as $row) {
 $email=$row->email;
  }

                                                        
	 $qrcode='';                                              
	if($status=='Selesai') {
		 $this->load->library('ciqrcode'); //pemanggilan library QR CODE
 
        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/'; //string, the default is application/logs/
        $config['imagedir']     = './assets/images/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);
 $link="http://192.168.2.211:8080/siapkades/qr/scan/$id_surat_biodek";
        $qrcode=$id_surat_biodek.'.png'; //buat name dari qr code sesuai dengan asal_pendapatan
 
        $params['data'] = $link; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$qrcode; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
        $mail = new PHPMailer(true);

try {
 //Server settings
 $mail->SMTPDebug = 2;                      //Enable verbose debug output
 $mail->isSMTP();                                            //Send using SMTP
 $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
 $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
 $mail->Username   = 'siapkades.pantaihambawang@gmail.com';                     //SMTP username
 $mail->Password   = 'dabdbgtuvbuehkus';                               //SMTP password
 $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
 $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

 //pengirim
 $mail->setFrom('siapkades.pantaihambawang@gmail.com', 'SIAPKADES');
 $mail->addAddress($email);     //Add a recipient

 //Content
 $mail->isHTML(true);                                  //Set email format to HTML
 $mail->Subject = 'Pelayanan Surat | SIAPKADES';
 $mail->Body    = 'Kami informasikan  permohonan surat penguasaan fisik bidang tanah (Biodek) anda sudah selesai silahkan login ke website untuk download file suratnya.';
 $mail->AltBody ='' ;
 //$mail->AddEmbeddedImage('gambar/logo.png', 'logo'); //abaikan jika tidak ada logo
 //$mail->addAttachment(''); 

 $mail->send();
 echo 'Message has been sent';
	 
}
 catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

}
}
	
	if (!empty($_FILES["file"]["name"])) {
          $file = $this->uploadSurat();
        } else {
            $file = $this->input->post('old_image');
		}
	$data_update = array(
			'id_surat_biodek' => $id_surat_biodek,
			'id_ktp' => $id_ktp,
			'no_surat' => $no_surat,
			'luas_tanah' => $luas_tanah,
			'no_tanah' => $no_tanah,
		
			'tanggal_surat' => $tanggal_surat,
			'tanda_tangan' => $tanda_tangan,
			'status' => $status,
			'file' => $file
		);
		$where = array('id_surat_biodek' => $id_surat_biodek);
		$res = $this->umum->UpdateData('surat_biodek', $data_update, $where);
		if($res>=1){
			redirect('admin/surat_biodek');
		}else{
			echo "<h1>GAGAL</h1>";
		}
	}
	function delete_surat_biodek($id=NULL)
	{
			if($this->session->userdata('akses')=='1') {
		$this->umum->hapus('surat_biodek','id_surat_biodek',$id);
		redirect('admin/surat_biodek');
		}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
	function surat_kehilangan() { 
	if($this->session->userdata('akses')=='1') {
	$data['page'] = 'surat_kehilangan';
	$data['dt_surat_kehilangan'] = $this->umum->admin_surat_kehilangan();
	$this->tampilkan($data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}
	function print_surat_kehilangan($id=NULL) { 
	if($this->session->userdata('akses')!='0') {
	$data['d']=$this->umum->print_surat_kehilangan($id);
		$this->load->view('admin/print_surat_kehilangan',$data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}
	function cetak_surat_kehilangan() { 
	if($this->session->userdata('akses')=='1') {
	$data['page'] = 'surat_kehilangan';
	$data['dt_surat_kehilangan'] = $this->umum->admin_surat_kehilangan();
		$this->load->view('admin/cetak_surat_kehilangan',$data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}

	function tambah_surat_kehilangan() { 
		if($this->session->userdata('akses')=='1') {
	$data['page']="tambah_surat_kehilangan";
	$data['dt_ktp'] = $this->umum->get_data('ktp');
	$data['dt_pegawai'] = $this->umum->get_data('pegawai');
	$this->db->set('id_surat_kehilangan', 'UUID()', FALSE);
		$this->form_validation->set_rules('id_ktp','id_ktp','required');
		$this->form_validation->set_rules('no_surat','no_surat');
		$this->form_validation->set_rules('kehilangan','kehilangan');
		$this->form_validation->set_rules('tgl_kehilangan','tgl_kehilangan');
		$this->form_validation->set_rules('tempat','tempat');
		$this->form_validation->set_rules('tanggal_surat','tanggal_surat');
		$this->form_validation->set_rules('tanda_tangan','tanda_tangan');
	
		if($this->form_validation->run() === FALSE)
			$this->tampilkan($data);
		else
		{
			echo "<script>alert('Tambah data berhasil');</script>";
			$this->umum->set_data("surat_kehilangan");
			redirect('admin/surat_kehilangan','refresh');
		}
	}
	else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
		function update_surat_kehilangan($id=NULL)
	{
		if($this->session->userdata('akses')=='1') {
			$data['dt_ktp'] = $this->umum->get_data('ktp');
	$data['dt_pegawai'] = $this->umum->get_data('pegawai');
		$data['d']=$this->umum->update_surat_kehilangan($id);
		$data['page'] = 'update_surat_kehilangan';
	
	
			$this->tampilkan($data);
		}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
	function simpan_surat_kehilangan(){
$id_surat_kehilangan = $this->input->post('id_surat_kehilangan');
$id_ktp = $this->input->post('id_ktp');
	$no_surat = $this->input->post('no_surat');
	$kehilangan = $this->input->post('kehilangan');
	$tgl_kehilangan = $this->input->post('tgl_kehilangan');
	$tempat = $this->input->post('tempat');
	$tanggal_surat = $this->input->post('tanggal_surat');
	$tanda_tangan = $this->input->post('tanda_tangan');
	$status = $this->input->post('status');
	$query=$this->db->query("Select * from ktp join pengunjung on ktp.nik=pengunjung.nik where 
  ktp.id_ktp= '$id_ktp'");
 foreach ($query->result() as $row) {
 $email=$row->email;
  }

                                                        
	    $qrcode='';                                              
	if($status=='Selesai') {
		 $this->load->library('ciqrcode'); //pemanggilan library QR CODE
 
        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/'; //string, the default is application/logs/
        $config['imagedir']     = './assets/images/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);
 $link="http://192.168.2.211:8080/siapkades/qr/scan/$id_surat_kehilangan";
        $qrcode=$id_surat_kehilangan.'.png'; //buat name dari qr code sesuai dengan asal_pendapatan
 
        $params['data'] = $link; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$qrcode; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
        $mail = new PHPMailer(true);

try {
 //Server settings
 $mail->SMTPDebug = 2;                      //Enable verbose debug output
 $mail->isSMTP();                                            //Send using SMTP
 $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
 $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
 $mail->Username   = 'siapkades.pantaihambawang@gmail.com';                     //SMTP username
 $mail->Password   = 'dabdbgtuvbuehkus';                               //SMTP password
 $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
 $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

 //pengirim
 $mail->setFrom('siapkades.pantaihambawang@gmail.com', 'SIAPKADES');
 $mail->addAddress($email);     //Add a recipient

 //Content
 $mail->isHTML(true);                                  //Set email format to HTML
 $mail->Subject = 'Pelayanan Surat | SIAPKADES';
 $mail->Body    = 'Kami informasikan permohonan surat kehilangan anda sudah selesai silahkan login ke website untuk download file suratnya.';
 $mail->AltBody ='' ;
 //$mail->AddEmbeddedImage('gambar/logo.png', 'logo'); //abaikan jika tidak ada logo
 //$mail->addAttachment(''); 

 $mail->send();
 echo 'Message has been sent';
	 
}
 catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

}
}

	
	
	if (!empty($_FILES["file"]["name"])) {
          $file = $this->uploadSurat();
        } else {
            $file = $this->input->post('old_image');
		}
	$data_update = array(
			'id_surat_kehilangan' => $id_surat_kehilangan,
			'id_ktp' => $id_ktp,
			'no_surat' => $no_surat,
			'kehilangan' => $kehilangan,
			'tgl_kehilangan' => $tgl_kehilangan,
			'tempat' => $tempat,
			'tanggal_surat' => $tanggal_surat,
			'tanda_tangan' => $tanda_tangan,
			'qrcode' => $qrcode,
			'status' => $status,
			'file' => $file
		);
		$where = array('id_surat_kehilangan' => $id_surat_kehilangan);
		$res = $this->umum->UpdateData('surat_kehilangan', $data_update, $where);
		if($res>=1){
			redirect('admin/surat_kehilangan');
		}else{
			echo "<h1>GAGAL</h1>";
		}
	}
	function delete_surat_kehilangan($id=NULL)
	{
			if($this->session->userdata('akses')=='1') {
		$this->umum->hapus('surat_kehilangan','id_surat_kehilangan',$id);
		redirect('admin/surat_kehilangan');
		}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
	function surat_usaha() { 
	if($this->session->userdata('akses')=='1') {
	$data['page'] = 'surat_usaha';
	$data['dt_surat_usaha'] = $this->umum->admin_surat_usaha();
	$this->tampilkan($data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}

//--------------------------------------------------------------------------------------
	function surat_pengadilan() { 
	if($this->session->userdata('akses')=='1') {
	$data['page'] = 'surat_pengadilan';
	$data['dt_surat_pengadilan'] = $this->umum->admin_surat_pengadilan();
	$this->tampilkan($data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}

	function tambah_surat_pengadilan() { 
		if($this->session->userdata('akses')=='1') {
	$data['page']="tambah_surat_pengadilan";
	$data['dt_ktp'] = $this->umum->get_data('ktp');
	$data['dt_pegawai'] = $this->umum->get_data('pegawai');
	$this->db->set('id_surat_pengadilan', 'UUID()', FALSE);
		$this->form_validation->set_rules('id_ktp','id_ktp','required');
		$this->form_validation->set_rules('no_surat','no_surat');
		$this->form_validation->set_rules('pedidikan','pendidikan');
		$this->form_validation->set_rules('tanggal_surat','tanggal_surat');
		$this->form_validation->set_rules('tanda_tangan','tanda_tangan');
	
		if($this->form_validation->run() === FALSE)
			$this->tampilkan($data);
		else
		{
			echo "<script>alert('Tambah data berhasil');</script>";
			$this->umum->set_data("surat_pengadilan");
			redirect('admin/surat_pengadilan','refresh');
		}
	}
	else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
		function update_surat_pengadilan($id=NULL)
	{
		if($this->session->userdata('akses')=='1') {
			$data['dt_ktp'] = $this->umum->get_data('ktp');
	$data['dt_pegawai'] = $this->umum->get_data('pegawai');
		$data['d']=$this->umum->update_surat_pengadilan($id);
		$data['page'] = 'update_surat_pengadilan';
			$this->tampilkan($data);
		}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}

	function simpan_surat_pengadilan(){
    $id_surat_pengadilan = $this->input->post('id_surat_pengadilan');
    $id_ktp = $this->input->post('id_ktp');
	$no_surat = $this->input->post('no_surat');
	$pendidikan = $this->input->post('pendidikan');
	$tanggal_surat = $this->input->post('tanggal_surat');
	$tanda_tangan = $this->input->post('tanda_tangan');
	$status = $this->input->post('status');
	
	
	if (!empty($_FILES["file"]["name"])) {
          $file = $this->uploadSurat();
        } else {
            $file = $this->input->post('old_image');
		}
	$data_update = array(
			'id_surat_pengadilan' => $id_surat_pengadilan,
			'id_ktp' => $id_ktp,
			'no_surat' => $no_surat,
			'pendidikan' => $pendidikan,
			'tanggal_surat' => $tanggal_surat,
			'tanda_tangan' => $tanda_tangan,
			'status' => $status,
			'file' => $file
		);
		$where = array('id_surat_pengadilan' => $id_surat_pengadilan);
		$res = $this->umum->UpdateData('surat_pengadilan', $data_update, $where);
		if($res>=1){
			redirect('admin/surat_pengadilan');
		}else{
			echo "<h1>GAGAL</h1>";
		}
	}
//-----------------------------------------------------------------------------------------


	function print_surat_usaha($id=NULL) { 
	if($this->session->userdata('akses')!='0') {
	$data['d']=$this->umum->print_surat_usaha($id);
		$this->load->view('admin/print_surat_usaha',$data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}
	function cetak_surat_usaha() { 
	if($this->session->userdata('akses')=='1') {
	$data['page'] = 'surat_usaha';
	$data['dt_surat_usaha'] = $this->umum->admin_surat_usaha();
		$this->load->view('admin/cetak_surat_usaha',$data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}


	function tambah_surat_usaha() { 
		if($this->session->userdata('akses')=='1') {
	$data['page']="tambah_surat_usaha";
	$data['dt_ktp'] = $this->umum->get_data('ktp');
	$data['dt_pegawai'] = $this->umum->get_data('pegawai');
	$this->db->set('id_surat_usaha', 'UUID()', FALSE);
		$this->form_validation->set_rules('id_ktp','id_ktp','required');

	
		if($this->form_validation->run() === FALSE)
			$this->tampilkan($data);
		else
		{
			echo "<script>alert('Tambah data berhasil');</script>";
			$this->umum->set_data("surat_usaha");
			redirect('admin/surat_usaha','refresh');
		}
	}
	else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
		function update_surat_usaha($id=NULL)
	{
		if($this->session->userdata('akses')=='1') {
			$data['dt_ktp'] = $this->umum->get_data('ktp');
	$data['dt_pegawai'] = $this->umum->get_data('pegawai');
		$data['d']=$this->umum->update_surat_usaha($id);
		$data['page'] = 'update_surat_usaha';
			$this->tampilkan($data);
		}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
		function simpan_surat_usaha(){
$id_surat_usaha = $this->input->post('id_surat_usaha');
$id_ktp = $this->input->post('id_ktp');
	$no_surat = $this->input->post('no_surat');
	$jenis_usaha = $this->input->post('jenis_usaha');
	$nama_usaha = $this->input->post('nama_usaha');
	$alamat_usaha = $this->input->post('alamat_usaha');
	$tanggal_surat = $this->input->post('tanggal_surat');
	$tanda_tangan = $this->input->post('tanda_tangan');
	$status = $this->input->post('status');
	$query=$this->db->query("Select * from ktp join pengunjung on ktp.nik=pengunjung.nik where 
  ktp.id_ktp= '$id_ktp'");
 foreach ($query->result() as $row) {
 $email=$row->email;
  }

                                                        
	    $qrcode='';                                              
	if($status=='Selesai') {
		 $this->load->library('ciqrcode'); //pemanggilan library QR CODE
 
        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/'; //string, the default is application/logs/
        $config['imagedir']     = './assets/images/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);
 $link="http://192.168.2.211:8080/siapkades/qr/scan/$id_surat_usaha";
        $qrcode=$id_surat_usaha.'.png'; //buat name dari qr code sesuai dengan asal_pendapatan
 
        $params['data'] = $link; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$qrcode; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
        $mail = new PHPMailer(true);

try {
 //Server settings
 $mail->SMTPDebug = 2;                      //Enable verbose debug output
 $mail->isSMTP();                                            //Send using SMTP
 $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
 $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
 $mail->Username   = 'siapkades.pantaihambawang@gmail.com';                     //SMTP username
 $mail->Password   = 'dabdbgtuvbuehkus';                               //SMTP password
 $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
 $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

 //pengirim
 $mail->setFrom('siapkades.pantaihambawang@gmail.com', 'SIAPKADES');
 $mail->addAddress($email);     //Add a recipient

 //Content
 $mail->isHTML(true);                                  //Set email format to HTML
 $mail->Subject = 'Pelayanan Surat | SIAPKADES';
 $mail->Body    = 'Kami informasikan  permohonan surat usaha anda sudah selesai silahkan login ke website untuk download file suratnya.';
 $mail->AltBody ='' ;
 //$mail->AddEmbeddedImage('gambar/logo.png', 'logo'); //abaikan jika tidak ada logo
 //$mail->addAttachment(''); 

 $mail->send();
 echo 'Message has been sent';
	 
}
 catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

}
}
	
	
	if (!empty($_FILES["file"]["name"])) {
          $file = $this->uploadSurat();
        } else {
            $file = $this->input->post('old_image');
		}
	$data_update = array(
			'id_surat_usaha' => $id_surat_usaha,
			'id_ktp' => $id_ktp,
			'no_surat' => $no_surat,
			'jenis_usaha' => $jenis_usaha,
			'nama_usaha' => $nama_usaha,
			'alamat_usaha' => $alamat_usaha,
			'tanggal_surat' => $tanggal_surat,
			'tanda_tangan' => $tanda_tangan,
			'qrcode' => $qrcode,
			'status' => $status,
			'file' => $file
		);
		$where = array('id_surat_usaha' => $id_surat_usaha);
		$res = $this->umum->UpdateData('surat_usaha', $data_update, $where);
		if($res>=1){
			redirect('admin/surat_usaha');
		}else{
			echo "<h1>GAGAL</h1>";
		}
	}
	function delete_surat_usaha($id=NULL)
	{
			if($this->session->userdata('akses')=='1') {
		$this->umum->hapus('surat_usaha','id_surat_usaha',$id);
		redirect('admin/surat_usaha');
		}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
	

	
function tampilkan($data) { 

$data['hitung_pengaduan'] = $this->umum->hitung_pengaduan();
	$data['dt_pengaduan_baru'] = $this->umum->pengaduan_baru();
	$this->load->view('admin/header',$data);
	$this->load->view('admin/tampil',$data);
	$this->load->view('admin/footer');
	}
 function download_semua_surat() { 
	if($this->session->userdata('akses')=='1') {
		$jenis = $this->input->post('jenis');
		$dari = $this->input->post('dari');
		$sampai = $this->input->post('sampai');
	$data['dt_surat_domisili'] = $this->umum->lap_surat_domisili($dari,$sampai);
	$data['dt_surat_janda'] = $this->umum->lap_surat_janda($dari,$sampai);
	$data['dt_surat_usaha'] = $this->umum->lap_surat_usaha($dari,$sampai);
	$data['dt_surat_kehilangan'] = $this->umum->lap_surat_kehilangan($dari,$sampai);
	$data['dt_surat_kurang_mampu'] = $this->umum->lap_surat_kurang_mampu($dari,$sampai);
	$data['dt_surat_kematian'] = $this->umum->lap_surat_kematian($dari,$sampai);
	$data['dt_surat_belum_menikah'] = $this->umum->lap_surat_belum_menikah($dari,$sampai);
	$data['dt_surat_pindah_datang'] = $this->umum->lap_surat_pindah_datang($dari,$sampai);
	$data['dt_surat_pindah_keluar'] = $this->umum->lap_surat_pindah_keluar($dari,$sampai);
	$data['dt_surat_izin_keramaian'] = $this->umum->lap_surat_izin_keramaian($dari,$sampai);
	$data['dt_surat_skck'] = $this->umum->lap_surat_skck($dari,$sampai);
	$data['dt_surat_biodek'] = $this->umum->lap_surat_biodek($dari,$sampai);
	$this->load->view('admin/download_semua_surat',$data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}

	function download_semua_surat_pindah() { 
	if($this->session->userdata('akses')=='1') {
$data['dt_surat_pindah_datang'] = $this->umum->admin_surat_pindah_datang();
$data['dt_surat_pindah_keluar'] = $this->umum->admin_surat_pindah_keluar();
	$this->load->view('admin/download_semua_surat_pindah',$data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}
	 function download_ktp() { 
	if($this->session->userdata('akses')=='1') {
		$rt=$this->input->post('rt');
     $data['dt_ktp'] = $this->umum->download_ktp($rt);
	$this->load->view('admin/download_ktp',$data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}

	//-------------------------------------------------------------------------------
	function cetak_surat_pindah_datang() { 
	if($this->session->userdata('akses')=='1') {
	$data['page'] = 'surat_pindah_datang';
	$data['dt_surat_pindah_datang'] = $this->umum->admin_surat_pindah_datang();
		$this->load->view('admin/cetak_surat_pindah_datang',$data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}

	function cetak_surat_pindah_keluar() { 
	if($this->session->userdata('akses')=='1') {
	$data['page'] = 'surat_pindah_keluar';
	$data['dt_surat_pindah_keluar'] = $this->umum->admin_surat_pindah_keluar();
		$this->load->view('admin/cetak_surat_pindah_keluar',$data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}
	//-------------------------------------------------------------------------------------
	
}
