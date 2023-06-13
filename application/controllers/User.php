<?php

class User extends CI_Controller {
		function __construct(){
    parent::__construct();
      
    $this->load->database();
    if($this->session->userdata('masuk') != TRUE){
            $url=base_url();
            redirect($url);
        }
  }

	function index() { 
	if($this->session->userdata('akses')=='2') {
	$data['page'] = 'home';
	$data['dt_pengaduan'] = $this->umum->pengaduan_masyarakat();
	$this->tampilkan($data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}

	

	function tambah_ktp() { 
	if($this->session->userdata('akses')=='2') {
	$data['page'] = 'tambah_ktp';
	$this->tampilkan($data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

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
	redirect('user/ktp');
	}
	

public function uploadKTP()
	{
    $config['upload_path']          = 'upload/file';
    $config['allowed_types']        = 'pdf|jpg|jpeg|png';
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
	function edit_ktp($id=NULL) { 
	if($this->session->userdata('akses')=='2') {
	$data['page']="edit_ktp";
	$data['d']=$this->umum->update_ktp($id);
	$this->tampilkan($data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }
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
			redirect('user/ktp');
		}else{
			echo "<h1>GAGAL</h1>";
		}
	}

		function informasi() { 
	if($this->session->userdata('akses')=='2') {
	$data['page'] = 'informasi';
	$data['dt_informasi'] = $this->umum->get_data('informasi');
	$this->tampilkan($data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}
	function ktp() { 
	if($this->session->userdata('akses')=='2') {
	$data['page'] = 'ktp';
	$data['dt_ktp'] = $this->umum->ambil_ktp('ktp');
	$this->tampilkan($data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}
	function pengaduan_masyarakat() { 
	if($this->session->userdata('akses')=='2') {
	$data['page'] = 'pengaduan_masyarakat';
	$data['dt_pengaduan'] = $this->umum->admin_pengaduan();
	$this->tampilkan($data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}
		function pengaduan() { 
	if($this->session->userdata('akses')=='2') {
	$data['page'] = 'pengaduan';
	$data['dt_pengaduan'] = $this->umum->pengaduan();
	$this->tampilkan($data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}
	function tambah_pengaduan() { 
		if($this->session->userdata('akses')=='2') {
	$data['page']="tambah_pengaduan";
	$data['dt_ktp'] = $this->umum->get_ktp();
	$this->db->set('id_pengaduan', 'UUID()', FALSE);
		$this->form_validation->set_rules('id_ktp','id_ktp','required');
		$this->form_validation->set_rules('mengadu','mengadu');

		$this->form_validation->set_rules('peng_telpon','peng_telpon');
	
		if($this->form_validation->run() === FALSE)
			$this->tampilkan($data);
		else
		{
			echo "<script>alert('Tambah data berhasil');</script>";
			$this->umum->set_data("pengaduan");
			redirect('user/pengaduan','refresh');
		}
	}
	else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
	function update_pengaduan($id=NULL)
	{
		if($this->session->userdata('akses')=='2') {
		$data['d']=$this->umum->update_pengaduan($id);
		$data['page'] = 'update_pengaduan';
		$this->form_validation->set_rules('id_pengaduan','id_pengaduan','required'); 
		$this->form_validation->set_rules('mengadu','mengadu','required');
		$this->form_validation->set_rules('peng_telpon','peng_telpon','required');
		
		if($this->form_validation->run() === FALSE)
			$this->tampilkan($data);
		else
		{
			echo "<script>alert('Update data berhasil');</script>";
			$this->umum->update_data("pengaduan");
			redirect('user/pengaduan','refresh');
		}
		}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
	function delete_pengaduan($id=NULL)
	{
			if($this->session->userdata('akses')=='2') {
		$this->umum->hapus('pengaduan','id_pengaduan',$id);
		redirect('user/pengaduan');
		}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
	function pengajuan_blt() { 
	if($this->session->userdata('akses')=='2') {
	$data['page'] = 'pengajuan_blt';
	$data['dt_pengajuan_blt'] = $this->umum->pengajuan_blt();
	$data['dt_informasi'] = $this->umum->get_data('informasi');
	$this->tampilkan($data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}
	function tambah_pengajuan_blt() { 
		if($this->session->userdata('akses')=='2') {
	$data['page']="tambah_pengajuan_blt";
	$data['dt_ktp'] = $this->umum->get_ktp();
	$data['dt_pegawai'] = $this->umum->get_data('pegawai');
	$this->db->set('id_pengajuan', 'UUID()', FALSE);
		$this->form_validation->set_rules('id_ktp','id_ktp','required');
		$this->form_validation->set_rules('pekerjaann','pekerjaann');
		$this->form_validation->set_rules('penghasilan','penghasilan');
		$this->form_validation->set_rules('tanggal','tanggal');
		$this->form_validation->set_rules('pengaju_telpon','pengaju_telpon');
	
		if($this->form_validation->run() === FALSE)
			$this->tampilkan($data);
		else
		{
			echo "<script>alert('Tambah data berhasil');</script>";
			$this->umum->set_data("pengajuan_blt");
			redirect('user/pengajuan_blt','refresh');
		}
	}
	else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
		function update_pengajuan_blt($id=NULL)
	{
		if($this->session->userdata('akses')=='2') {
			$data['dt_ktp'] = $this->umum->get_ktp();
	$data['dt_pegawai'] = $this->umum->get_data('pegawai');
		$data['d']=$this->umum->update_pengajuan_blt($id);
		$data['page'] = 'update_pengajuan_blt';
		$this->form_validation->set_rules('id_pengajuan','id_pengajuan','required'); 
		$this->form_validation->set_rules('id_ktp','id_ktp','required');
		$this->form_validation->set_rules('pekerjaann','pekerjaann');
		$this->form_validation->set_rules('penghasilan','penghasilan');
		$this->form_validation->set_rules('tanggal','tanggal');
		$this->form_validation->set_rules('pengaju_telpon','pengaju_telpon');
		
		if($this->form_validation->run() === FALSE)
			$this->tampilkan($data);
		else
		{
			echo "<script>alert('Update data berhasil');</script>";
			$this->umum->update_data("pengajuan_blt");
			redirect('user/pengajuan_blt','refresh');
		}
		}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
	function delete_pengajuan_blt($id=NULL)
	{
			if($this->session->userdata('akses')=='2') {
		$this->umum->hapus('pengajuan_blt','id_pengajuan',$id);
		redirect('user/pengajuan_blt');
		}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
	
	function proposal() { 
	if($this->session->userdata('akses')=='2') {
	$data['page'] = 'proposal';
	$data['dt_proposal'] = $this->umum->proposal();
	$this->tampilkan($data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}
	function tambah_proposal() { 
	if($this->session->userdata('akses')=='2') {
	$data['dt_ktp'] = $this->umum->get_ktp();
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
	redirect('user/proposal');
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
	if($this->session->userdata('akses')=='2') {
	$data['page']="edit_proposal";
	$data['dt_ktp'] = $this->umum->get_ktp();
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
			'proposal' => $proposal
		);
		$where = array('id_proposal' => $id_proposal);
		$res = $this->umum->UpdateData('proposal', $data_update, $where);
		if($res>=1){
			redirect('user/proposal');
		}else{
			echo "<h1>GAGAL</h1>";
		}
	}

	function delete_proposal($id=NULL)
	{
			if($this->session->userdata('akses')=='2') {
		$this->umum->hapus('proposal','id_proposal',$id);
		redirect('user/proposal');
		}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
	function surat_kematian() { 
	if($this->session->userdata('akses')=='2') {
	$data['page'] = 'surat_kematian';
	$data['dt_surat_kematian'] = $this->umum->surat_kematian();
	$this->tampilkan($data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}
	function tambah_surat_kematian() { 
		if($this->session->userdata('akses')=='2') {
	$data['page']="tambah_surat_kematian";
	$data['dt_ktp'] = $this->umum->get_ktp();
	$data['dt_pegawai'] = $this->umum->get_data('pegawai');
	$this->db->set('id_surat_kematian', 'UUID()', FALSE);
		$this->form_validation->set_rules('id_ktp','id_ktp','required');
	
		$this->form_validation->set_rules('hari','hari');
		$this->form_validation->set_rules('pukul','pukul');
		$this->form_validation->set_rules('bertempat','bertempat');
		$this->form_validation->set_rules('dimakamkan','dimakamkan');
		
	
		if($this->form_validation->run() === FALSE)
			$this->tampilkan($data);
		else
		{
			echo "<script>alert('Tambah data berhasil');</script>";
			$this->umum->set_data("surat_kematian");
			redirect('user/surat_kematian','refresh');
		}
	}
	else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
		function update_surat_kematian($id=NULL)
	{
		if($this->session->userdata('akses')=='2') {
			$data['dt_ktp'] = $this->umum->get_ktp();
	$data['dt_pegawai'] = $this->umum->get_data('pegawai');
		$data['d']=$this->umum->update_surat_kematian($id);
		$data['page'] = 'update_surat_kematian';
		$this->form_validation->set_rules('id_surat_kematian','id_surat_kematian','required'); 
			$this->form_validation->set_rules('id_ktp','id_ktp','required');
			$this->form_validation->set_rules('hari','hari');
		$this->form_validation->set_rules('pukul','pukul');
		$this->form_validation->set_rules('bertempat','bertempat');
		$this->form_validation->set_rules('dimakamkan','dimakamkan');
		if($this->form_validation->run() === FALSE)
			$this->tampilkan($data);
		else
		{
			echo "<script>alert('Update data berhasil');</script>";
			$this->umum->update_data("surat_kematian");
			redirect('user/surat_kematian','refresh');
		}
		}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
	function delete_surat_kematian($id=NULL)
	{
			if($this->session->userdata('akses')=='2') {
		$this->umum->hapus('surat_kematian','id_surat_kematian',$id);
		redirect('user/surat_kematian');
		}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
	function surat_belum_menikah() { 
	if($this->session->userdata('akses')=='2') {
	$data['page'] = 'surat_belum_menikah';
	$data['dt_surat_belum_menikah'] = $this->umum->surat_belum_menikah();
	$this->tampilkan($data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}

	
	function tambah_surat_belum_menikah() { 
		if($this->session->userdata('akses')=='2') {
	$data['page']="tambah_surat_belum_menikah";
	$data['dt_ktp'] = $this->umum->get_ktp();
	$data['dt_pegawai'] = $this->umum->get_data('pegawai');
	$this->db->set('id_surat_belum_menikah', 'UUID()', FALSE);
		$this->form_validation->set_rules('id_ktp','id_ktp','required');
	
		$this->form_validation->set_rules('status_nikah','status_nikah');
		$this->form_validation->set_rules('bin','bin');
		
	
		if($this->form_validation->run() === FALSE)
			$this->tampilkan($data);
		else
		{
			echo "<script>alert('Tambah data berhasil');</script>";
			$this->umum->set_data("surat_belum_menikah");
			redirect('user/surat_belum_menikah','refresh');
		}
	}
	else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
		function update_surat_belum_menikah($id=NULL)
	{
		if($this->session->userdata('akses')=='2') {
			$data['dt_ktp'] = $this->umum->get_ktp();
	$data['dt_pegawai'] = $this->umum->get_data('pegawai');
		$data['d']=$this->umum->update_surat_belum_menikah($id);
		$data['page'] = 'update_surat_belum_menikah';
		$this->form_validation->set_rules('id_surat_belum_menikah','id_surat_belum_menikah','required'); 
		$this->form_validation->set_rules('id_ktp','id_ktp','required');
		$this->form_validation->set_rules('bin','bin');
		$this->form_validation->set_rules('status_nikah','status_nikah');
		if($this->form_validation->run() === FALSE)
			$this->tampilkan($data);
		else
		{
			echo "<script>alert('Update data berhasil');</script>";
			$this->umum->update_data("surat_belum_menikah");
			redirect('user/surat_belum_menikah','refresh');
		}
		}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
	function delete_surat_belum_menikah($id=NULL)
	{
			if($this->session->userdata('akses')=='2') {
		$this->umum->hapus('surat_belum_menikah','id_surat_belum_menikah',$id);
		redirect('user/surat_belum_menikah');
		}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
	function surat_kurang_mampu() { 
	if($this->session->userdata('akses')=='2') {
	$data['page'] = 'surat_kurang_mampu';
	$data['dt_surat_kurang_mampu'] = $this->umum->surat_kurang_mampu();
	$this->tampilkan($data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}
	function tambah_surat_kurang_mampu() { 
		if($this->session->userdata('akses')=='2') {
	$data['page']="tambah_surat_kurang_mampu";
	$data['dt_ktp'] = $this->umum->get_ktp();
	$data['dt_pegawai'] = $this->umum->get_data('pegawai');
	$this->db->set('id_surat_kurang_mampu', 'UUID()', FALSE);
		$this->form_validation->set_rules('id_ktp','id_ktp','required');
		
		$this->form_validation->set_rules('peruntukan','peruntukan');
		$this->form_validation->set_rules('keperluan','keperluan');
		$this->form_validation->set_rules('penghasilan','penghasilan');
		
	
		if($this->form_validation->run() === FALSE)
			$this->tampilkan($data);
		else
		{
			echo "<script>alert('Tambah data berhasil');</script>";
			$this->umum->set_data("surat_kurang_mampu");
			redirect('user/surat_kurang_mampu','refresh');
		}
	}
	else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
		function update_surat_kurang_mampu($id=NULL)
	{
		if($this->session->userdata('akses')=='2') {
			$data['dt_ktp'] = $this->umum->get_ktp();
	$data['dt_pegawai'] = $this->umum->get_data('pegawai');
		$data['d']=$this->umum->update_surat_kurang_mampu($id);
		$data['page'] = 'update_surat_kurang_mampu';
		$this->form_validation->set_rules('id_surat_kurang_mampu','id_surat_kurang_mampu','required'); 
			$this->form_validation->set_rules('id_ktp','id_ktp','required');
	
		$this->form_validation->set_rules('peruntukan','peruntukan');
		$this->form_validation->set_rules('keperluan','keperluan');
		$this->form_validation->set_rules('penghasilan','penghasilan');
		if($this->form_validation->run() === FALSE)
			$this->tampilkan($data);
		else
		{
			echo "<script>alert('Update data berhasil');</script>";
			$this->umum->update_data("surat_kurang_mampu");
			redirect('user/surat_kurang_mampu','refresh');
		}
		}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
	function delete_surat_kurang_mampu($id=NULL)
	{
			if($this->session->userdata('akses')=='2') {
		$this->umum->hapus('surat_kurang_mampu','id_surat_kurang_mampu',$id);
		redirect('user/surat_kurang_mampu');
		}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
	function surat_domisili() { 
	if($this->session->userdata('akses')=='2') {
	$data['page'] = 'surat_domisili';
	$data['dt_surat_domisili'] = $this->umum->surat_domisili();
	$this->tampilkan($data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}
	function tambah_surat_domisili() { 
		if($this->session->userdata('akses')=='2') {
	$data['page']="tambah_surat_domisili";
	$data['dt_ktp'] = $this->umum->get_ktp();
	$data['dt_pegawai'] = $this->umum->get_data('pegawai');
	$this->db->set('id_surat_domisili', 'UUID()', FALSE);
		$this->form_validation->set_rules('id_ktp','id_ktp','required');
		
		$this->form_validation->set_rules('alamat_domisili','alamat_domisili','required');
		
	
		if($this->form_validation->run() === FALSE)
			$this->tampilkan($data);
		else
		{
			echo "<script>alert('Tambah data berhasil');</script>";
			$this->umum->set_data("surat_domisili");
			redirect('user/surat_domisili','refresh');
		}
	}
	else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
		function update_surat_domisili($id=NULL)
	{
		if($this->session->userdata('akses')=='2') {
			$data['dt_ktp'] = $this->umum->get_ktp();
	$data['dt_pegawai'] = $this->umum->get_data('pegawai');
		$data['d']=$this->umum->update_surat_domisili($id);
		$data['page'] = 'update_surat_domisili';
		$this->form_validation->set_rules('id_surat_domisili','id_surat_domisili','required'); 
		$this->form_validation->set_rules('id_ktp','id_ktp','required');
		$this->form_validation->set_rules('alamat_domisili','alamat_domisili','required');
		if($this->form_validation->run() === FALSE)
			$this->tampilkan($data);
		else
		{
			echo "<script>alert('Update data berhasil');</script>";
			$this->umum->update_data("surat_domisili");
			redirect('user/surat_domisili','refresh');
		}
		}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
	function delete_surat_domisili($id=NULL)
	{
			if($this->session->userdata('akses')=='2') {
		$this->umum->hapus('surat_domisili','id_surat_domisili',$id);
		redirect('user/surat_domisili');
		}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
	function surat_janda() { 
	if($this->session->userdata('akses')=='2') {
	$data['page'] = 'surat_janda';
	$data['dt_surat_janda'] = $this->umum->surat_janda();
	$this->tampilkan($data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}
	function tambah_surat_janda() { 
		if($this->session->userdata('akses')=='2') {
	$data['page']="tambah_surat_janda";
	$data['dt_ktp'] = $this->umum->get_ktp();
	$data['dt_pegawai'] = $this->umum->get_data('pegawai');
	$this->db->set('id_surat_janda', 'UUID()', FALSE);
		$this->form_validation->set_rules('id_ktp','id_ktp','required');
		
		
	
		if($this->form_validation->run() === FALSE)
			$this->tampilkan($data);
		else
		{
			echo "<script>alert('Tambah data berhasil');</script>";
			$this->umum->set_data("surat_janda");
			redirect('user/surat_janda','refresh');
		}
	}
	else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
		function update_surat_janda($id=NULL)
	{
		if($this->session->userdata('akses')=='2') {
			$data['dt_ktp'] = $this->umum->get_ktp();
	$data['dt_pegawai'] = $this->umum->get_data('pegawai');
		$data['d']=$this->umum->update_surat_janda($id);
		$data['page'] = 'update_surat_janda';
		$this->form_validation->set_rules('id_surat_janda','id_surat_janda','required'); 
		
		if($this->form_validation->run() === FALSE)
			$this->tampilkan($data);
		else
		{
			echo "<script>alert('Update data berhasil');</script>";
			$this->umum->update_data("surat_janda");
			redirect('user/surat_janda','refresh');
		}
		}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
	function delete_surat_janda($id=NULL)
	{
			if($this->session->userdata('akses')=='2') {
		$this->umum->hapus('surat_janda','id_surat_janda',$id);
		redirect('user/surat_janda');
		}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
	function surat_kehilangan() { 
	if($this->session->userdata('akses')=='2') {
	$data['page'] = 'surat_kehilangan';
	$data['dt_surat_kehilangan'] = $this->umum->surat_kehilangan();
	$this->tampilkan($data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}
	function tambah_surat_kehilangan() { 
		if($this->session->userdata('akses')=='2') {
	$data['page']="tambah_surat_kehilangan";
	$data['dt_ktp'] = $this->umum->get_ktp();
	$data['dt_pegawai'] = $this->umum->get_data('pegawai');
	$this->db->set('id_surat_kehilangan', 'UUID()', FALSE);
		$this->form_validation->set_rules('id_ktp','id_ktp','required');
		
		$this->form_validation->set_rules('kehilangan','kehilangan');
		$this->form_validation->set_rules('tgl_kehilangan','tgl_kehilangan');
		$this->form_validation->set_rules('tempat','tempat');
	
	
		if($this->form_validation->run() === FALSE)
			$this->tampilkan($data);
		else
		{
			echo "<script>alert('Tambah data berhasil');</script>";
			$this->umum->set_data("surat_kehilangan");
			redirect('user/surat_kehilangan','refresh');
		}
	}
	else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
		function update_surat_kehilangan($id=NULL)
	{
		if($this->session->userdata('akses')=='2') {
			$data['dt_ktp'] = $this->umum->get_ktp();
	$data['dt_pegawai'] = $this->umum->get_data('pegawai');
		$data['d']=$this->umum->update_surat_kehilangan($id);
		$data['page'] = 'update_surat_kehilangan';
		$this->form_validation->set_rules('id_surat_kehilangan','id_surat_kehilangan','required'); 
		$this->form_validation->set_rules('id_ktp','id_ktp','required');
		
		$this->form_validation->set_rules('kehilangan','kehilangan');
		$this->form_validation->set_rules('tgl_kehilangan','tgl_kehilangan');
		$this->form_validation->set_rules('tempat','tempat');
		if($this->form_validation->run() === FALSE)
			$this->tampilkan($data);
		else
		{
			echo "<script>alert('Update data berhasil');</script>";
			$this->umum->update_data("surat_kehilangan");
			redirect('user/surat_kehilangan','refresh');
		}
		}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
	function delete_surat_kehilangan($id=NULL)
	{
			if($this->session->userdata('akses')=='2') {
		$this->umum->hapus('surat_kehilangan','id_surat_kehilangan',$id);
		redirect('user/surat_kehilangan');
		}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
	function surat_usaha() { 
	if($this->session->userdata('akses')=='2') {
	$data['page'] = 'surat_usaha';
	$data['dt_surat_usaha'] = $this->umum->surat_usaha();
	$this->tampilkan($data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}

	function tambah_surat_usaha() { 
		if($this->session->userdata('akses')=='2') {
	$data['page']="tambah_surat_usaha";
	$data['dt_ktp'] = $this->umum->get_ktp();
	$data['dt_pegawai'] = $this->umum->get_data('pegawai');
	$this->db->set('id_surat_usaha', 'UUID()', FALSE);
		$this->form_validation->set_rules('id_ktp','id_ktp','required');
		
	
		
	
		if($this->form_validation->run() === FALSE)
			$this->tampilkan($data);
		else
		{
			echo "<script>alert('Tambah data berhasil');</script>";
			$this->umum->set_data("surat_usaha");
			redirect('user/surat_usaha','refresh');
		}
	}
	else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
		function update_surat_usaha($id=NULL)
	{
		if($this->session->userdata('akses')=='2') {
			$data['dt_ktp'] = $this->umum->get_ktp();
	$data['dt_pegawai'] = $this->umum->get_data('pegawai');
		$data['d']=$this->umum->update_surat_usaha($id);
		$data['page'] = 'update_surat_usaha';
		$this->form_validation->set_rules('id_surat_usaha','id_surat_usaha','required'); 
		$this->form_validation->set_rules('id_ktp','id_ktp','required');
		$this->form_validation->set_rules('usaha','usaha','required');
		if($this->form_validation->run() === FALSE)
			$this->tampilkan($data);
		else
		{
			echo "<script>alert('Update data berhasil');</script>";
			$this->umum->update_data("surat_usaha");
			redirect('user/surat_usaha','refresh');
		}
		}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
	function delete_surat_usaha($id=NULL)
	{
			if($this->session->userdata('akses')=='2') {
		$this->umum->hapus('surat_usaha','id_surat_usaha',$id);
		redirect('user/surat_usaha');
		}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
	


	function surat_pindah_datang() { 
	if($this->session->userdata('akses')=='2') {
	$data['page'] = 'surat_pindah_datang';
	$data['dt_surat_pindah_datang'] = $this->umum->surat_pindah_datang();
	$this->tampilkan($data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}
	function tambah_surat_pindah_datang() { 
		if($this->session->userdata('akses')=='2') {
	$data['page']="tambah_surat_pindah_datang";
	$data['dt_ktp'] = $this->umum->get_ktp();
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
			redirect('user/surat_pindah_datang','refresh');
		}
	}
	else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
	function update_surat_pindah_datang($id=NULL) { 
		if($this->session->userdata('akses')=='2') {
	$data['page']="update_surat_pindah_datang";
	$data['dt_ktp'] = $this->umum->get_ktp();
	
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
			redirect('user/surat_pindah_datang');
		}else{
			echo "<h1>GAGAL</h1>";
		}
	}
	function print_surat_pindah_datang($id=NULL) { 
	if($this->session->userdata('akses')=='2') {
	$data['d']=$this->umum->print_surat_pindah_datang($id);
		$this->load->view('admin/print_surat_pindah_datang',$data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}
	function delete_surat_pindah_datang($id=NULL)
	{
			if($this->session->userdata('akses')=='2') {
		$this->umum->hapus('surat_pindah_datang','id_surat_pindah_datang',$id);
		redirect('user/surat_pindah_datang');
		}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
function surat_pindah_keluar() { 
	if($this->session->userdata('akses')=='2') {
	$data['page'] = 'surat_pindah_keluar';
	$data['dt_surat_pindah_keluar'] = $this->umum->surat_pindah_keluar();
	$this->tampilkan($data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}
	function tambah_surat_pindah_keluar() { 
		if($this->session->userdata('akses')=='2') {
	$data['page']="tambah_surat_pindah_keluar";
	$data['dt_ktp'] = $this->umum->get_ktp();
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
			redirect('user/surat_pindah_keluar','refresh');
		}
	}
	else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
	function update_surat_pindah_keluar($id=NULL) { 
		if($this->session->userdata('akses')=='2') {
	$data['page']="update_surat_pindah_keluar";
	$data['dt_ktp'] = $this->umum->get_ktp();
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
			redirect('user/surat_pindah_keluar');
		}else{
			echo "<h1>GAGAL</h1>";
		}
	}
	function print_surat_pindah_keluar($id=NULL) { 
	if($this->session->userdata('akses')=='2') {
	$data['d']=$this->umum->print_surat_pindah_keluar($id);
		$this->load->view('admin/print_surat_pindah_keluar',$data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}
	function delete_surat_pindah_keluar($id=NULL)
	{
			if($this->session->userdata('akses')=='2') {
		$this->umum->hapus('surat_pindah_keluar','id_surat_pindah_keluar',$id);
		redirect('user/surat_pindah_keluar');
		}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
function tampilkan($data) { 
	$this->load->view('user/header',$data);
	$this->load->view('user/tampil',$data);
	$this->load->view('user/footer');
	}


function penerima_blt() { 
	if($this->session->userdata('akses')=='2') {
	$data['page'] = 'penerima_blt';
	$data['dt_penerima_blt'] = $this->umum->penerima_blt();
	$data['dt_informasi'] = $this->umum->get_data('informasi');
	$this->tampilkan($data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}
	function surat_skck() { 
	if($this->session->userdata('akses')=='2') {
	$data['page'] = 'surat_skck';
	$data['dt_surat_skck'] = $this->umum->surat_skck();
	$this->tampilkan($data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}
function tambah_surat_skck() { 
		if($this->session->userdata('akses')=='2') {
	$data['page']="tambah_surat_skck";
	$data['dt_ktp'] = $this->umum->get_ktp();
	$data['dt_pegawai'] = $this->umum->get_data('pegawai');
	$this->db->set('id_surat_skck', 'UUID()', FALSE);
		$this->form_validation->set_rules('id_ktp','id_ktp','required');
		
		
	
		if($this->form_validation->run() === FALSE)
			$this->tampilkan($data);
		else
		{
			echo "<script>alert('Tambah data berhasil');</script>";
			$this->umum->set_data("surat_skck");
			redirect('user/surat_skck','refresh');
		}
	}
	else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
		function update_surat_skck($id=NULL)
	{
		if($this->session->userdata('akses')=='2') {
			$data['dt_ktp'] = $this->umum->get_ktp();
	$data['dt_pegawai'] = $this->umum->get_data('pegawai');
		$data['d']=$this->umum->update_surat_skck($id);
		$data['page'] = 'update_surat_skck';
		$this->form_validation->set_rules('id_surat_skck','id_surat_skck','required'); 

		if($this->form_validation->run() === FALSE)
			$this->tampilkan($data);
		else
		{
			echo "<script>alert('Update data berhasil');</script>";
			$this->umum->update_data("surat_skck");
			redirect('user/surat_skck','refresh');
		}
		}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
	function delete_surat_skck($id=NULL)
	{
			if($this->session->userdata('akses')=='2') {
		$this->umum->hapus('surat_skck','id_surat_skck',$id);
		redirect('user/surat_skck');
		}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
	function surat_biodek() { 
	if($this->session->userdata('akses')=='2') {
	$data['page'] = 'surat_biodek';
	$data['dt_surat_biodek'] = $this->umum->surat_biodek();
	$this->tampilkan($data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}
function tambah_surat_biodek() { 
		if($this->session->userdata('akses')=='2') {
	$data['page']="tambah_surat_biodek";
	$data['dt_ktp'] = $this->umum->get_ktp();
	$data['dt_pegawai'] = $this->umum->get_data('pegawai');
	$this->db->set('id_surat_biodek', 'UUID()', FALSE);
		$this->form_validation->set_rules('id_ktp','id_ktp','required');
		
		
	
		if($this->form_validation->run() === FALSE)
			$this->tampilkan($data);
		else
		{
			echo "<script>alert('Tambah data berhasil');</script>";
			$this->umum->set_data("surat_biodek");
			redirect('user/surat_biodek','refresh');
		}
	}
	else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
		function update_surat_biodek($id=NULL)
	{
		if($this->session->userdata('akses')=='2') {
			$data['dt_ktp'] = $this->umum->get_ktp();
	$data['dt_pegawai'] = $this->umum->get_data('pegawai');
		$data['d']=$this->umum->update_surat_biodek($id);
		$data['page'] = 'update_surat_biodek';
		$this->form_validation->set_rules('id_surat_biodek','id_surat_biodek','required'); 

		if($this->form_validation->run() === FALSE)
			$this->tampilkan($data);
		else
		{
			echo "<script>alert('Update data berhasil');</script>";
			$this->umum->update_data("surat_biodek");
			redirect('user/surat_biodek','refresh');
		}
		}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
	function delete_surat_biodek($id=NULL)
	{
			if($this->session->userdata('akses')=='2') {
		$this->umum->hapus('surat_biodek','id_surat_biodek',$id);
		redirect('user/surat_biodek');
		}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
	function surat_izin_keramaian() { 
	if($this->session->userdata('akses')=='2') {
	$data['page'] = 'surat_izin_keramaian';
	$data['dt_surat_izin_keramaian'] = $this->umum->surat_izin_keramaian();
	$this->tampilkan($data);
	}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }

	}
function tambah_surat_izin_keramaian() { 
		if($this->session->userdata('akses')=='2') {
	$data['page']="tambah_surat_izin_keramaian";
	$data['dt_ktp'] = $this->umum->get_ktp();
	$data['dt_pegawai'] = $this->umum->get_data('pegawai');
	$this->db->set('id_surat_izin_keramaian', 'UUID()', FALSE);
		$this->form_validation->set_rules('id_ktp','id_ktp','required');
		
		
	
		if($this->form_validation->run() === FALSE)
			$this->tampilkan($data);
		else
		{
			echo "<script>alert('Tambah data berhasil');</script>";
			$this->umum->set_data("surat_izin_keramaian");
			redirect('user/surat_izin_keramaian','refresh');
		}
	}
	else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
		function update_surat_izin_keramaian($id=NULL)
	{
		if($this->session->userdata('akses')=='2') {
			$data['dt_ktp'] = $this->umum->get_ktp();
	$data['dt_pegawai'] = $this->umum->get_data('pegawai');
		$data['d']=$this->umum->update_surat_izin_keramaian($id);
		$data['page'] = 'update_surat_izin_keramaian';
		$this->form_validation->set_rules('id_surat_izin_keramaian','id_surat_izin_keramaian','required'); 

		if($this->form_validation->run() === FALSE)
			$this->tampilkan($data);
		else
		{
			echo "<script>alert('Update data berhasil');</script>";
			$this->umum->update_data("surat_izin_keramaian");
			redirect('user/surat_izin_keramaian','refresh');
		}
		}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
	function delete_surat_izin_keramaian($id=NULL)
	{
			if($this->session->userdata('akses')=='2') {
		$this->umum->hapus('surat_izin_keramaian','id_surat_izin_keramaian',$id);
		redirect('user/surat_izin_keramaian');
		}
		else {  echo "Anda tidak berhak mengakses halaman ini";
    }	
	}
}
