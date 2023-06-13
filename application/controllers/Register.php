<?php

class Register extends CI_Controller {

	
	function index() { 
	$this->load->view('register');

	}

	function create()
	{
	$this->db->set('id_pengunjung', 'UUID()', FALSE);
	$nik = $this->input->post('nik');
	$password =sha1 ($this->input->post('password'));
	$email = $this->input->post('email');
	$telp = $this->input->post('telp');
	$data = array(
			'nik' => $nik,
			'password' => $password,
			'email' => $email,
			'telp' => $telp
			);
	echo "<script>alert('Registrasi Berhasil Silahkan Login');</script>";
	$this->umum->input_data($data,'pengunjung');
	redirect('login','refresh');
	}
	

public function uploadFile()
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
	
}
