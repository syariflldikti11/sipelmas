<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//ini sesuaikan foldernya ke file 3 ini
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
class Camat extends CI_Controller
{


	function __construct()
	{
		parent::__construct();
		$this->load->database();

		$role = $this->session->userdata('role');

		if ($role <> 4) {
			$url = base_url();
			redirect($url);
		}
	}

public function rupiah($angka){
  
  $hasil_rupiah = "" . number_format($angka,0,',','.');
  return $hasil_rupiah;
}

	function user()
    {
        $data = array(
            'judul' => 'Data Surat Masuk',
            'dt_user' => $this->m_camat->get_user(),
        );
        $this->template->load('camat/template', 'camat/user', $data);
    }
    function ttd_laporan()
    {
        $data = array(
            'judul' => 'Data TTD Laporan',
            'dt_ttd_laporan' => $this->m_camat->get_data('ttd_laporan'),
        );
        $this->template->load('camat/template', 'camat/ttd_laporan', $data);
    }
    function update_ttd_laporan(){
        $id_ttd = $this->input->post('id_ttd');
        $nama_ttd = $this->input->post('nama_ttd');
        $jabatan = $this->input->post('jabatan');
        $lebar = $this->input->post('lebar');
        $nip = $this->input->post('nip');
        $old = $this->input->post('old_file');
            
            if (!empty($_FILES["file"]["name"])) {
                  $file = $this->uploadFilettd();
                  unlink("./upload/file/$old");
                } else {
                    $file = $old;
                }
            $data_update = array(
                'id_ttd' => $id_ttd,
                'nama_ttd' => $nama_ttd,
                'jabatan' => $jabatan,
                'lebar' => $lebar,
                'nip' => $nip,
                'file' => $file
                );
                $where = array('id_ttd' => $id_ttd);
                $res = $this->m_camat->UpdateData('ttd_laporan', $data_update, $where);
                if($res>=1){
                   
                    $notif = "Update TTD Laporan Berhasil ";
                    $this->session->set_flashdata('update', $notif);
                    redirect('camat/ttd_laporan');
                }else{
                    echo "<h1>GAGAL</h1>";
                }
            }
             public function uploadFilettd()
    {
        $config['upload_path'] = 'upload/file';
        $config['allowed_types'] = 'pdf|doc|docx|xls|xlsx|jpg|jpeg|png';
        $config['overwrite'] = false;
        $config['max_size'] = 5000;


        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('file')) {
            return $this->upload->data("file_name");
        }
        $error = $this->upload->display_errors();
        echo $error;
        exit;

    }
    function edit_ttd($id = NULL)
	{

		$data['page'] = "edit_ttd";
		$data['d'] = $this->m_camat->ambil_data('ttd_laporan', 'id_ttd',1);
		$this->template->load('camat/template', 'camat/update_ttd', $data);
	}
    function tambah_user()
	{

	 $data['dt_pegawai'] = $this->m_camat->get_data('pegawai');
		$this->template->load('camat/template', 'camat/tambah_user',$data);
	}
	 function simpan_user()
    {
        $this->db->set('id_pengguna', 'UUID()', FALSE);
        $id_pegawai = $this->input->post('id_pegawai');
        $password = $this->input->post('password');
        $role = $this->input->post('role');
        $data = array(
            'id_pegawai' => $id_pegawai,
            'role' => $role,
            'password' => md5($password),
        );

        $this->m_camat->input_data($data, 'pengguna');
        $notif = "User Berhasil Ditambahkan";
        $this->session->set_flashdata('success', $notif);
        redirect('camat/user');

    }
    function delete_user($id)
    {

        $this->m_camat->hapus('pengguna', 'id_pengguna', $id);
        $notif = "User Berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect('camat/user');
    }
function surat_masuk()
    {
        $data = array(
            'judul' => 'Data Surat Masuk',
            'menu' => 'Manajemen Surat',
            'sub_menu' => 'Surat Masuk',
            'dt_surat_masuk' => $this->m_camat->get_data('surat_masuk'),
        );
        $this->template->load('camat/template', 'camat/surat_masuk', $data);
    }
function tambah_surat_masuk()
	{

	
		$this->template->load('camat/template', 'camat/tambah_surat_masuk');
	}
	function edit_surat_masuk($id = NULL)
	{

		 $data['d'] = $this->m_camat->ambil_data('surat_masuk', 'id_surat_masuk', $id);
		$this->template->load('camat/template', 'camat/update_surat_masuk', $data);
	}
    function simpan_surat_masuk()
    {
        $this->db->set('id_surat_masuk', 'UUID()', FALSE);
        $no_surat = $this->input->post('no_surat');
        $perihal = $this->input->post('perihal');
        $pengirim = $this->input->post('pengirim');
        $tgl_surat = $this->input->post('tgl_surat');
        $tgl_diterima = $this->input->post('tgl_diterima');
        $file = $this->uploadSurat();
        $data = array(
            'no_surat' => $no_surat,
            'perihal' => $perihal,
            'pengirim' => $pengirim,
            'tgl_surat' => $tgl_surat,
            'tgl_diterima' => $tgl_diterima,
            'file' => $file
        );

        $this->m_camat->input_data($data, 'surat_masuk');
        $notif = "Surat Masuk Berhasil Ditambahkan";
        $this->session->set_flashdata('success', $notif);
        redirect('camat/surat_masuk');

    }
    function update_surat_masuk(){
        $id_surat_masuk = $this->input->post('id_surat_masuk');
        $no_surat = $this->input->post('no_surat');
        $perihal = $this->input->post('perihal');
        $pengirim = $this->input->post('pengirim');
        $tgl_surat = $this->input->post('tgl_surat');
        $tgl_diterima = $this->input->post('tgl_diterima');
        $old = $this->input->post('old_file');
            
            if (!empty($_FILES["file"]["name"])) {
                  $file = $this->uploadSurat();
                  unlink("./upload/$old");
                } else {
                    $file = $old;
                }
            $data_update = array(
                'id_surat_masuk' => $id_surat_masuk,
                 'no_surat' => $no_surat,
            'perihal' => $perihal,
            'pengirim' => $pengirim,
            'tgl_surat' => $tgl_surat,
            'tgl_diterima' => $tgl_diterima,
                'file' => $file
                );
                $where = array('id_surat_masuk' => $id_surat_masuk);
                $res = $this->m_camat->UpdateData('surat_masuk', $data_update, $where);
                if($res>=1){
                   
                    $notif = "Update Surat Masuk Berhasil ";
                    $this->session->set_flashdata('update', $notif);
                    redirect('camat/surat_masuk');
                }else{
                    echo "<h1>GAGAL</h1>";
                }
            }
    function delete_surat_masuk($id,$file)
    {

        $this->m_camat->hapus('surat_masuk', 'id_surat_masuk', $id);
        unlink("./upload/$file");
        $notif = "Surat Masuk berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect('camat/surat_masuk');

    }
     function surat_keluar()
    {
        $data = array(
            'judul' => 'Data Surat Keluar',
            'menu' => 'Manajemen Surat',
            'sub_menu' => 'Surat Keluar',
            'dt_surat_keluar' => $this->m_camat->get_data('surat_keluar'),
        );
        $this->template->load('camat/template', 'camat/surat_keluar', $data);
    }
function tambah_surat_keluar()
	{

	
		$this->template->load('camat/template', 'camat/tambah_surat_keluar');
	}
	function edit_surat_keluar($id = NULL)
	{

		 $data['d'] = $this->m_camat->ambil_data('surat_keluar', 'id_surat_keluar', $id);
		$this->template->load('camat/template', 'camat/update_surat_keluar', $data);
	}
    function simpan_surat_keluar()
    {
        $this->db->set('id_surat_keluar', 'UUID()', FALSE);
        $no_surat = $this->input->post('no_surat');
        $perihal = $this->input->post('perihal');
        $tujuan = $this->input->post('tujuan');
        $tgl_surat = $this->input->post('tgl_surat');
        $tgl_kirim_surat = $this->input->post('tgl_kirim_surat');
        $file = $this->uploadSurat();
        $data = array(
            'no_surat' => $no_surat,
            'perihal' => $perihal,
            'tujuan' => $tujuan,
            'tgl_surat' => $tgl_surat,
            'tgl_kirim_surat' => $tgl_kirim_surat,
            'file' => $file
        );

        $this->m_camat->input_data($data, 'surat_keluar');
        $notif = "Surat Keluar Berhasil Ditambahkan";
        $this->session->set_flashdata('success', $notif);
        redirect('camat/surat_keluar');

    }
    function update_surat_keluar(){
        $id_surat_keluar = $this->input->post('id_surat_keluar');
        $no_surat = $this->input->post('no_surat');
        $perihal = $this->input->post('perihal');
        $tujuan = $this->input->post('tujuan');
        $tgl_surat = $this->input->post('tgl_surat');
        $tgl_kirim_surat = $this->input->post('tgl_kirim_surat');
        $old = $this->input->post('old_file');
            
            if (!empty($_FILES["file"]["name"])) {
                  $file = $this->uploadSurat();
                  unlink("./upload/$old");
                } else {
                    $file = $old;
                }
            $data_update = array(
                'id_surat_keluar' => $id_surat_keluar,
                 'no_surat' => $no_surat,
            'perihal' => $perihal,
            'tujuan' => $tujuan,
            'tgl_surat' => $tgl_surat,
            'tgl_kirim_surat' => $tgl_kirim_surat,
                'file' => $file
                );
                $where = array('id_surat_keluar' => $id_surat_keluar);
                $res = $this->m_camat->UpdateData('surat_keluar', $data_update, $where);
                if($res>=1){
                   
                    $notif = "Update Surat Keluar Berhasil ";
                    $this->session->set_flashdata('update', $notif);
                    redirect('camat/surat_keluar');
                }else{
                    echo "<h1>GAGAL</h1>";
                }
            }
    function delete_surat_keluar($id,$file)
    {

        $this->m_camat->hapus('surat_keluar', 'id_surat_keluar', $id);
        unlink("./upload/$file");
        $notif = "Surat Keluar berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect('camat/surat_keluar');

    }
	function qr($kodeqr)
	{
		if ($kodeqr) {
			$filename = 'qr/' . $kodeqr;
			if (!file_exists($filename)) {
				$this->load->library('ciqrcode');
				$params['data'] = $kodeqr;
				$params['level'] = 'H';
				$params['size'] = 10;
				$params['savename'] = FCPATH . 'qr/' . $kodeqr . ".png";
				return $this->ciqrcode->generate($params);
			}
		}
	}


	function index()
	{
		$data = array(
			'menu' => 'Dashboard',
			'sub_menu' => '',
			'surat_masuk' => $this->m_camat->hitung('surat_masuk'),
			'surat_keluar' => $this->m_camat->hitung('surat_keluar'),
			'penugasan' => $this->m_camat->hitung('penugasan'),
			'surat_domisili' => $this->m_camat->hitung_surat('surat_domisili', 'status','Selesai'),
			'surat_biodek' => $this->m_camat->hitung_surat('surat_biodek', 'status','Selesai'),
			'surat_belum_menikah' => $this->m_camat->hitung_surat('surat_belum_menikah', 'status','Selesai'),
			'surat_izin_keramaian' => $this->m_camat->hitung_surat('surat_izin_keramaian', 'status','Selesai'),
			'surat_janda' => $this->m_camat->hitung_surat('surat_janda', 'status','Selesai'),
			'surat_kehilangan' => $this->m_camat->hitung_surat('surat_kehilangan', 'status','Selesai'),
			'surat_kematian' => $this->m_camat->hitung_surat('surat_kematian', 'status','Selesai'),
			'surat_kurang_mampu' => $this->m_camat->hitung_surat('surat_kurang_mampu', 'status','Selesai'),
			'surat_pindah_datang' => $this->m_camat->hitung_surat('surat_pindah_datang', 'status','Selesai'),
			'surat_pindah_keluar' => $this->m_camat->hitung_surat('surat_pindah_keluar', 'status','Selesai'),
			'surat_skck' => $this->m_camat->hitung_surat('surat_skck', 'status','Selesai'),
			'surat_usaha' => $this->m_camat->hitung_surat('surat_usaha', 'status','Selesai'),
			'psurat_domisili' => $this->m_camat->hitung_surat('surat_domisili', 'status','Validasi Pimpinan'),
            'psurat_biodek' => $this->m_camat->hitung_surat('surat_biodek', 'status','Validasi Pimpinan'),
            'psurat_belum_menikah' => $this->m_camat->hitung_surat('surat_belum_menikah', 'status','Validasi Pimpinan'),
            'psurat_izin_keramaian' => $this->m_camat->hitung_surat('surat_izin_keramaian', 'status','Validasi Pimpinan'),
            'psurat_janda' => $this->m_camat->hitung_surat('surat_janda', 'status','Validasi Pimpinan'),
            'psurat_kehilangan' => $this->m_camat->hitung_surat('surat_kehilangan', 'status','Validasi Pimpinan'),
            'psurat_kematian' => $this->m_camat->hitung_surat('surat_kematian', 'status','Validasi Pimpinan'),
            'psurat_kurang_mampu' => $this->m_camat->hitung_surat('surat_kurang_mampu', 'status','Validasi Pimpinan'),
            'psurat_pindah_datang' => $this->m_camat->hitung_surat('surat_pindah_datang', 'status','Validasi Pimpinan'),
            'psurat_pindah_keluar' => $this->m_camat->hitung_surat('surat_pindah_keluar', 'status','Validasi Pimpinan'),
            'psurat_skck' => $this->m_camat->hitung_surat('surat_skck', 'status','Validasi Pimpinan'),
            'psurat_usaha' => $this->m_camat->hitung_surat('surat_usaha', 'status','Validasi Pimpinan'),

		);
		foreach($this->m_camat->grafik_pengaduan()->result_array() as $row)
   {
    $data['grafik_pengaduan'][]=(float)$row['Januari'];
    $data['grafik_pengaduan'][]=(float)$row['Februari'];
    $data['grafik_pengaduan'][]=(float)$row['Maret'];
    $data['grafik_pengaduan'][]=(float)$row['April'];
    $data['grafik_pengaduan'][]=(float)$row['Mei'];
    $data['grafik_pengaduan'][]=(float)$row['Juni'];
    $data['grafik_pengaduan'][]=(float)$row['Juli'];
    $data['grafik_pengaduan'][]=(float)$row['Agustus'];
    $data['grafik_pengaduan'][]=(float)$row['September'];
    $data['grafik_pengaduan'][]=(float)$row['Oktober'];
    $data['grafik_pengaduan'][]=(float)$row['November'];
    $data['grafik_pengaduan'][]=(float)$row['Desember'];
   }

   foreach($this->m_camat->grafik_respon()->result_array() as $roww)
   {
    $data['grafik_respon'][]=(float)$roww['Januari'];
    $data['grafik_respon'][]=(float)$roww['Februari'];
    $data['grafik_respon'][]=(float)$roww['Maret'];
    $data['grafik_respon'][]=(float)$roww['April'];
    $data['grafik_respon'][]=(float)$roww['Mei'];
    $data['grafik_respon'][]=(float)$roww['Juni'];
    $data['grafik_respon'][]=(float)$roww['Juli'];
    $data['grafik_respon'][]=(float)$roww['Agustus'];
    $data['grafik_respon'][]=(float)$roww['September'];
    $data['grafik_respon'][]=(float)$roww['Oktober'];
    $data['grafik_respon'][]=(float)$roww['November'];
    $data['grafik_respon'][]=(float)$roww['Desember'];
   }
		$this->template->load('camat/template', 'camat/home', $data);
	}
	function informasi()
	{

	
		$data['dt_informasi'] = $this->m_camat->get_data('informasi');
		$this->template->load('camat/template', 'camat/informasi', $data);


	}
	function tambah_informasi()
	{

	
		$this->db->set('id_informasi', 'UUID()', FALSE);
		$this->form_validation->set_rules('isi_informasi', 'isi_informasi', 'required');
		$this->form_validation->set_rules('informasi', 'informasi', 'required');
		if ($this->form_validation->run() === FALSE)
		$this->template->load('camat/template', 'camat/tambah_informasi', $data);
		else {
			
			$notif = "Tambah Data Berhasil";
			$this->session->set_flashdata('success', $notif);
			$this->m_camat->set_data("informasi");
			redirect('camat/informasi');
		}

	}
	function update_informasi($id = NULL)
	{

		$data['d'] = $this->m_camat->update_informasi($id);
		
		$this->template->load('camat/template', 'camat/update_informasi', $data);


	}
	function simpan_informasi()
	{
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
		$res = $this->m_camat->UpdateData('informasi', $data_update, $where);
		if ($res >= 1) {
			$notif = "Update Data Berhasil";
			$this->session->set_flashdata('update', $notif);
			redirect('camat/informasi');
		} else {
			echo "<h1>GAGAL</h1>";
		}
	}

	function delete_informasi($id = NULL)
	{

		$notif = "Delete Data Berhasil";
		$this->session->set_flashdata('delete', $notif);
		$this->m_camat->hapus('informasi', 'id_informasi', $id);
		redirect('camat/informasi');

	}
	function ktp()
	{

		$data['dt_ktp'] = $this->m_camat->get_data('ktp');
		$this->template->load('camat/template', 'camat/ktp', $data);
	}

	function cetak_ktp()
	{
		$data['dt_ktp'] = $this->m_camat->get_data('ktp');
		$this->load->view('camat/cetak_ktp', $data);
	}
	function tambah_ktp()
	{

	
		$this->template->load('camat/template', 'camat/tambah_ktp');
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

		$notif = "Tambah Data Berhasil";
		$this->session->set_flashdata('success', $notif);
		$this->m_camat->input_data($data, 'ktp');
		redirect('camat/ktp');
	}


	public function uploadKTP()
	{
		$config['upload_path'] = 'upload/file';
		$config['allowed_types'] = 'pdf|jpg|jpeg|png|doc|docx';
		$config['overwrite'] = false;
		$config['max_size'] = 5000; // 1MB


		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if ($this->upload->do_upload('ftoktp')) {
			return $this->upload->data("file_name");
		}
		$error = $this->upload->display_errors();
		echo $error;
		exit;
		// return "default.jpg";
	}
	public function uploadfileinfo()
	{
		$config['upload_path'] = 'upload/file';
		$config['allowed_types'] = 'pdf|jpg|jpeg|png|doc|docx';
		$config['overwrite'] = false;
		$config['max_size'] = 5000; // 1MB


		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if ($this->upload->do_upload('file')) {
			return $this->upload->data("file_name");
		}
		$error = $this->upload->display_errors();
		echo $error;
		exit;
		// return "default.jpg";
	}
	function edit_ktp($id = NULL)
	{

		$data['page'] = "edit_ktp";
		$data['d'] = $this->m_camat->update_ktp($id);
		$this->template->load('camat/template', 'camat/update_ktp', $data);
	}
	function update_ktp()
	{
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
		$res = $this->m_camat->UpdateData('ktp', $data_update, $where);
		if ($res >= 1) {

			redirect('camat/ktp');
			$notif = "Update Data Berhasil";
			$this->session->set_flashdata('update', $notif);
		} else {
			echo "<h1>GAGAL</h1>";
		}
	}

	function delete_ktp($id = NULL)
	{


		$this->m_camat->hapus('ktp', 'id_ktp', $id);
		redirect('camat/ktp');
		$notif = "Delete Data Berhasil";
		$this->session->set_flashdata('delete', $notif);
	}
	function kk()
	{

		$data['dt_kk'] = $this->m_camat->get_data('kk');
		$this->template->load('camat/template', 'camat/kk', $data);
	}
	function cetak_kk()
	{

		$data['dt_kk'] = $this->m_camat->get_data('kk');
		$this->load->view('camat/cetak_kk', $data);

	}
	function simpan_kk()
	{
		$this->db->set('id_kk', 'UUID()', FALSE);
		$no_kk = $this->input->post('no_kk');
		$kepala_keluarga = $this->input->post('kepala_keluarga');
		$alamat_kk = $this->input->post('alamat_kk');
		$desa_kk = $this->input->post('desa_kk');
		$rt_kk = $this->input->post('rt_kk');
		$kecamatan = $this->input->post('kecamatan');
		$kabupaten = $this->input->post('kabupaten');
		$kode_pos = $this->input->post('kode_pos');
		$provinsi = $this->input->post('provinsi');
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

		$this->m_camat->input_data($data, 'kk');
		$notif = "Tambah Data Berhasil";
		$this->session->set_flashdata('success', $notif);
		redirect('camat/kk');
	}
	public function uploadFile()
	{
		$config['upload_path'] = 'upload/file';
		$config['allowed_types'] = 'pdf|jpg|png|jpeg';
		$config['overwrite'] = false;
		$config['max_size'] = 5000; // 1MB


		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if ($this->upload->do_upload('foto_kk')) {
			return $this->upload->data("file_name");
		}
		$error = $this->upload->display_errors();
		echo $error;
		exit;
		// return "default.jpg";
	}
	public function uploadSurat()
	{
		$config['upload_path'] = 'upload/file';
		$config['allowed_types'] = 'pdf|jpg|png|jpeg';
		$config['overwrite'] = false;
		$config['max_size'] = 5000; // 1MB


		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if ($this->upload->do_upload('file')) {
			return $this->upload->data("file_name");
		}
		$error = $this->upload->display_errors();
		echo $error;
		exit;
		// return "default.jpg";
	}

	
	function tambah_kk()
	{

		$data['page'] = 'tambah_kk';
		$this->template->load('camat/template', 'camat/tambah_kk', $data);

	}
	function edit_kk($id = NULL)
	{

		$data['page'] = "edit_kk";
		$data['d'] = $this->m_camat->update_kk($id);
		$this->template->load('camat/template', 'camat/update_kk', $data);
	}
	function update_kk()
	{
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
		$data_update = array(
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
		$res = $this->m_camat->UpdateData('kk', $data_update, $where);
		if ($res >= 1) {

			redirect('camat/kk');
			$notif = "Update Data Berhasil";
			$this->session->set_flashdata('update', $notif);
		} else {
			echo "<h1>GAGAL</h1>";
		}
	}

	function delete_kk($id = NULL)
	{


		$this->m_camat->hapus('kk', 'id_kk', $id);
		$notif = "Delete Data Berhasil";
		$this->session->set_flashdata('delete', $notif);
		redirect('camat/kk');

	}

	function pegawai()
	{

		$data['dt_pegawai'] = $this->m_camat->get_data('pegawai');
		$this->template->load('camat/template', 'camat/pegawai', $data);
	}
	function cetak_pegawai()
	{

		$data['dt_pegawai'] = $this->m_camat->get_data('pegawai');
		$this->load->view('camat/cetak_pegawai', $data);

	}
	function tambah_pegawai()
	{


		$this->db->set('id_pgw', 'UUID()', FALSE);
		$this->form_validation->set_rules('nama_peg', 'nama_peg', 'required');
		$this->form_validation->set_rules('jabatan', 'jabatan');
		$this->form_validation->set_rules('alamat_peg', 'alamat_peg');
		$this->form_validation->set_rules('telp_peg', 'telp_peg');
		$this->form_validation->set_rules('wa_peg', 'wa_peg');
		if ($this->form_validation->run() === FALSE)
			$this->template->load('camat/template', 'camat/tambah_pegawai');
		else {

			$this->m_camat->set_data("pegawai");
			$notif = "Tambah Data Berhasil";
			$this->session->set_flashdata('success', $notif);
			redirect('camat/pegawai');
		}
	}
	function update_pegawai($id = NULL)
	{

		$data['d'] = $this->m_camat->update_pegawai($id);
		$data['page'] = 'update_pegawai';
		$this->form_validation->set_rules('id_pgw', 'id_pgw', 'required');
		$this->form_validation->set_rules('nama_peg', 'nama_peg', 'required');
		$this->form_validation->set_rules('jabatan', 'jabatan', 'required');
		$this->form_validation->set_rules('alamat_peg', 'alamat_peg', 'required');
		$this->form_validation->set_rules('telp_peg', 'telp_peg', 'required');
		$this->form_validation->set_rules('wa_peg', 'wa_peg', 'required');
		if ($this->form_validation->run() === FALSE)
			$this->template->load('camat/template', 'camat/update_pegawai', $data);
		else {


			$this->m_camat->update_data("pegawai");
			$notif = "Update Data Berhasil";
			$this->session->set_flashdata('update', $notif);
			redirect('camat/pegawai');
		}

	}

	function delete_pegawai($id = NULL)
	{


		$this->m_camat->hapus('pegawai', 'id_pgw', $id);
		$notif = "Delete Data Berhasil";
		$this->session->set_flashdata('delete', $notif);
		redirect('camat/pegawai');

	}
	function penugasan()
    {
        $data = array(
            'judul' => 'Data Penugasan Pegawai',
            'menu' => 'Penugasan Pegawai',
            'sub_menu' => '',
            'dt_penugasan' => $this->m_camat->get_penugasan(),
  
        );
        $this->template->load('camat/template', 'camat/penugasan', $data);
    }
    function tambah_penugasan()
    {
          $data['dt_jenis_kegiatan'] = $this->m_camat->get_table('jenis_kegiatan');
        $this->db->set('id_penugasan', 'UUID()', FALSE);
        $this->form_validation->set_rules('no_surat', 'no_surat', 'required');
        if ($this->form_validation->run() === FALSE)
                $this->template->load('camat/template', 'camat/tambah_penugasan', $data);
        else {

            $this->m_camat->set_data("penugasan");
            $notif = "Tambah Data Berhasil";
            $this->session->set_flashdata('success', $notif);
            redirect('camat/penugasan');
        }
    }
     function update_penugasan($id=false)
    {
$data['d'] = $this->m_camat->ambil_datanew('penugasan', 'id_penugasan', $id);
        $this->form_validation->set_rules('id_penugasan', 'id_penugasan', 'required');
        if ($this->form_validation->run() === FALSE)
                 $this->template->load('camat/template', 'camat/update_penugasan', $data);
        else {
            $this->m_camat->update_data("penugasan");
            $notif = " Update Data Berhasil";
            $this->session->set_flashdata('update', $notif);
            redirect('camat/penugasan');
        }
    }
    function delete_penugasan($id)
    {

        $this->m_camat->hapus('penugasan', 'id_penugasan', $id);
        $notif = "Delete Data Berhasil";
        $this->session->set_flashdata('delete', $notif);
        redirect('camat/penugasan');
    }
     function peserta_penugasan($id=false)
    {
        $data = array(
            'id' => $id,
        'dt_peserta' => $this->m_camat->get_peserta($id),
        'dt_pegawai' => $this->m_camat->get_table('pegawai'),
        );
        $this->template->load('camat/template', 'camat/peserta_penugasan', $data);
    }
     function tambah_peserta_penugasan()
    {

        $this->db->set('id_peserta_penugasan', 'UUID()', FALSE);
        $this->form_validation->set_rules('id_pegawai', 'id_pegawai', 'required');
        $id_penugasan = $this->input->post('id_penugasan');
        if ($this->form_validation->run() === FALSE)
      redirect(base_url() . "camat/peserta_penugasan/".$id_penugasan);
        else {

            $this->m_camat->set_data("peserta_penugasan");
            $notif = "Tambah Peserta Penugasan Berhasil";
            $this->session->set_flashdata('success', $notif);
             redirect(base_url() . "camat/peserta_penugasan/".$id_penugasan);
        }
    }

    
     function delete_peserta_penugasan($id,$id_penugasan)
    {

        $this->m_camat->hapus('peserta_penugasan', 'id_peserta_penugasan', $id);
        $notif = "Data Berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
      redirect(base_url() . "camat/peserta_penugasan/".$id_penugasan);
    }

	function jenis_kegiatan()
	{

		$data['dt_jenis_kegiatan'] = $this->m_camat->get_data('jenis_kegiatan');
		$this->template->load('camat/template', 'camat/jenis_kegiatan', $data);
	}
	function cetak_jenis_kegiatan()
	{

		
		$this->load->view('camat/cetak_jenis_kegiatan', $data);

	}
	function tambah_jenis_kegiatan()
	{


		$this->db->set('id_jenis_kegiatan', 'UUID()', FALSE);
	$this->form_validation->set_rules('nama_jenis_kegiatan', 'nama_jenis_kegiatan', 'required');
		if ($this->form_validation->run() === FALSE)
			$this->template->load('camat/template', 'camat/tambah_jenis_kegiatan');
		else {

			$this->m_camat->set_data("jenis_kegiatan");
			$notif = "Tambah Data Berhasil";
			$this->session->set_flashdata('success', $notif);
			redirect('camat/jenis_kegiatan');
		}
	}
	function update_jenis_kegiatan($id = NULL)
	{

	$data['d'] = $this->m_camat->ambil('jenis_kegiatan', 'id_jenis_kegiatan', $id);
		$this->form_validation->set_rules('id_jenis_kegiatan', 'id_jenis_kegiatan', 'required');
		if ($this->form_validation->run() === FALSE)
			$this->template->load('camat/template', 'camat/update_jenis_kegiatan', $data);
		else {


			$this->m_camat->update_data("jenis_kegiatan");
			$notif = "Update Data Berhasil";
			$this->session->set_flashdata('update', $notif);
			redirect('camat/jenis_kegiatan');
		}

	}

	function delete_jenis_kegiatan($id = NULL)
	{


		$this->m_camat->hapus('jenis_kegiatan', 'id_jenis_kegiatan', $id);
		$notif = "Delete Data Berhasil";
		$this->session->set_flashdata('delete', $notif);
		redirect('camat/jenis_kegiatan');

	}


	function pengaduan()
	{

	
		$data['dt_pengaduan'] = $this->m_camat->admin_pengaduan();
		$this->template->load('camat/template', 'camat/pengaduan', $data);


	}
	
	function update_pengaduan($id = NULL)
	{

		$data['d'] = $this->m_camat->update_pengaduan($id);
		$data['page'] = 'update_pengaduan';
		$this->form_validation->set_rules('id_pengaduan', 'id_pengaduan', 'required');
		$this->form_validation->set_rules('balasan', 'balasan', 'required');
		if ($this->form_validation->run() === FALSE)
			$this->template->load('camat/template', 'camat/update_pengaduan', $data);
		else {
			echo "<script>alert('Update data berhasil');</script>";
			$notif = "Update Data Berhasil";
			$this->session->set_flashdata('update', $notif);
			$this->m_camat->update_data("pengaduan");
			redirect('camat/pengaduan');
		}

	}
	function delete_pengaduan($id = NULL)
	{

		$notif = "Delete Data Berhasil";
		$this->session->set_flashdata('delete', $notif);
		$this->m_camat->hapus('pengaduan', 'id_pengaduan', $id);
		redirect('camat/pengaduan');

	}
	function penerima_blt()
	{

		$data['page'] = 'penerima_blt';
		$data['dt_penerima_blt'] = $this->m_camat->admin_penerima_blt();
		$this->tampilkan($data);


	}
	function cetak_penerima_blt()
	{

		$data['page'] = 'penerima_blt';
		$data['dt_penerima_blt'] = $this->m_camat->admin_penerima_blt();
		$this->load->view('camat/cetak_penerima_blt', $data);


	}
	function pengajuan_blt()
	{

		$data['page'] = 'pengajuan_blt';
		$data['dt_pengajuan_blt'] = $this->m_camat->admin_pengajuan_blt();
		$this->tampilkan($data);


	}
	function cetak_pengajuan_blt()
	{

		$data['page'] = 'pengajuan_blt';
		$data['dt_pengajuan_blt'] = $this->m_camat->admin_pengajuan_blt();
		$this->load->view('camat/cetak_pengajuan_blt', $data);


	}
	function tambah_pengajuan_blt()
	{

		$data['page'] = "tambah_pengajuan_blt";
		$data['dt_ktp'] = $this->m_camat->get_data('ktp');
		$data['dt_pegawai'] = $this->m_camat->get_data('pegawai');
		$this->db->set('id_pengajuan', 'UUID()', FALSE);
		$this->form_validation->set_rules('id_ktp', 'id_ktp', 'required');
		$this->form_validation->set_rules('penghasilan', 'penghasilan');
		$this->form_validation->set_rules('tanggal', 'tanggal');
		$this->form_validation->set_rules('pengaju_telpon', 'pengaju_telpon');

		if ($this->form_validation->run() === FALSE)
			$this->tampilkan($data);
		else {
			
			$notif = "Tambah Data Berhasil";
			$this->session->set_flashdata('success', $notif);
			$this->m_camat->set_data("pengajuan_blt");
			redirect('camat/pengajuan_blt');
		}

	}
	function update_pengajuan_blt($id = NULL)
	{

		$data['dt_ktp'] = $this->m_camat->get_data('ktp');
		$data['dt_pegawai'] = $this->m_camat->get_data('pegawai');
		$data['d'] = $this->m_camat->update_pengajuan_blt($id);
		$data['page'] = 'update_pengajuan_blt';
		$this->form_validation->set_rules('id_pengajuan', 'id_pengajuan', 'required');
		$this->form_validation->set_rules('id_ktp', 'id_ktp', 'required');
		$this->form_validation->set_rules('penghasilan', 'penghasilan');
		$this->form_validation->set_rules('tanggal', 'tanggal');
		$this->form_validation->set_rules('status', 'status');


		if ($this->form_validation->run() === FALSE)
			$this->tampilkan($data);
		else {
			echo "<script>alert('Update data berhasil');</script>";
			$notif = "Update Data Berhasil";
			$this->session->set_flashdata('update', $notif);
			$this->m_camat->update_data("pengajuan_blt");
			redirect('camat/pengajuan_blt');
		}

	}

	function simpan_pengajuan_blt()
	{
		$id_pengajuan = $this->input->post('id_pengajuan');
		$id_ktp = $this->input->post('id_ktp');
		$penghasilan = $this->input->post('penghasilan');
		$tanggal = $this->input->post('tanggal');
		$status = $this->input->post('status');
		$query = $this->db->query("Select * from ktp join pengunjung on ktp.nik=pengunjung.nik where 
  ktp.id_ktp= '$id_ktp'");
		foreach ($query->result() as $row) {
			$email = $row->email;
		}


		if ($status == 'Diterima') {
			$config = [
				'mailtype' => 'html',
				'charset' => 'utf-8',
				'protocol' => 'smtp',
				'smtp_host' => 'smtp.gmail.com',
				'smtp_user' => 'mban98413@gmail.com',
				// Email gmail
				'smtp_pass' => 'sma5banjarmasin',
				// Password gmail
				'smtp_crypto' => 'ssl',
				'smtp_port' => 465,
				'crlf' => "\r\n",
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
		$res = $this->m_camat->UpdateData('pengajuan_blt', $data_update, $where);
		if ($res >= 1) {
			$notif = "Update Data Berhasil";
			$this->session->set_flashdata('update', $notif);
			redirect('camat/pengajuan_blt');
		} else {
			echo "<h1>GAGAL</h1>";
		}
	}

	function delete_pengajuan_blt($id = NULL)
	{

		$notif = "Delete Data Berhasil";
		$this->session->set_flashdata('delete', $notif);
		$this->m_camat->hapus('pengajuan_blt', 'id_pengajuan', $id);
		redirect('camat/pengajuan_blt');

	}



	function proposal()
	{

		
		$data['dt_proposal'] = $this->m_camat->admin_proposal();
		$this->template->load('camat/template', 'camat/proposal', $data);


	}
	
	function tambah_proposal()
	{

		$data['dt_ktp'] = $this->m_camat->get_data('ktp');
		$data['page'] = 'tambah_proposal';
		$this->template->load('camat/template', 'camat/tambah_proposal', $data);


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
	
		$notif = "Tambah Data Berhasil";
		$this->session->set_flashdata('success', $notif);
		$this->m_camat->input_data($data, 'proposal');
		redirect('camat/proposal');
	}


	public function uploadProposal()
	{
		$config['upload_path'] = 'upload/file';
		$config['allowed_types'] = 'pdf|jpg|jpeg|png|doc|docx';
		$config['overwrite'] = false;
		$config['max_size'] = 5000; // 1MB


		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if ($this->upload->do_upload('proposal')) {
			return $this->upload->data("file_name");
		}
		$error = $this->upload->display_errors();
		echo $error;
		exit;
		// return "default.jpg";
	}
	function edit_proposal($id = NULL)
	{

		
		$data['dt_ktp'] = $this->m_camat->get_data('ktp');
		$data['d'] = $this->m_camat->update_proposal($id);
		$this->template->load('camat/template', 'camat/update_proposal', $data);

	}
	function update_proposal()
	{
		$id_proposal = $this->input->post('id_proposal');
		$tgl_proposal = $this->input->post('tgl_proposal');
		$id_ktp = $this->input->post('id_ktp');
		$mengajukan = $this->input->post('mengajukan');
		$telp = $this->input->post('telp');
		$status = $this->input->post('status');
		$query = $this->db->query("Select * from ktp join pengunjung on ktp.nik=pengunjung.nik where 
  ktp.id_ktp= '$id_ktp'");
		foreach ($query->result() as $row) {
			$email = $row->email;
		}


		if ($status == 'Diterima') {
			$config = [
				'mailtype' => 'html',
				'charset' => 'utf-8',
				'protocol' => 'smtp',
				'smtp_host' => 'smtp.gmail.com',
				'smtp_user' => 'mban98413@gmail.com',
				// Email gmail
				'smtp_pass' => 'sma5banjarmasin',
				// Password gmail
				'smtp_crypto' => 'ssl',
				'smtp_port' => 465,
				'crlf' => "\r\n",
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
		$res = $this->m_camat->UpdateData('proposal', $data_update, $where);
		if ($res >= 1) {
			$notif = "Update Data Berhasil";
			$this->session->set_flashdata('update', $notif);
			redirect('camat/proposal');
		} else {
			echo "<h1>GAGAL</h1>";
		}
	}

	function delete_proposal($id = NULL)
	{

		$notif = "Delete Data Berhasil";
		$this->session->set_flashdata('delete', $notif);
		$this->m_camat->hapus('proposal', 'id_proposal', $id);
		redirect('camat/proposal');

	}
	function surat_kematian()
	{

		$data['dt_surat_kematian'] = $this->m_camat->camat_surat_kematian();
		$this->template->load('camat/template', 'camat/surat_kematian', $data);


	}
	function print_surat_kematian($id = NULL)
	{

		$data['d'] = $this->m_camat->print_surat_kematian($id);
		$this->load->view('camat/print_surat_kematian', $data);


	}
	function cetak_surat_kematian()
	{


		$data['dt_surat_kematian'] = $this->m_camat->camat_surat_kematian();
		$this->load->view('camat/cetak_surat_kematian', $data);


	}
	function tambah_surat_kematian()
	{

		$data['page'] = "tambah_surat_kematian";
		$data['dt_ktp'] = $this->m_camat->get_data('ktp');
		$data['dt_pegawai'] = $this->m_camat->get_data('pegawai');
		$this->db->set('id_surat_kematian', 'UUID()', FALSE);
		$this->form_validation->set_rules('id_ktp', 'id_ktp', 'required');
		$this->form_validation->set_rules('no_surat', 'no_surat');
		$this->form_validation->set_rules('hari', 'hari');
		$this->form_validation->set_rules('pukul', 'pukul');
		$this->form_validation->set_rules('bertempat', 'bertempat');
		$this->form_validation->set_rules('dimakamkan', 'dimakamkan');
		$this->form_validation->set_rules('tanggal_surat', 'tanggal_surat');
		$this->form_validation->set_rules('tanda_tangan', 'tanda_tangan');

		if ($this->form_validation->run() === FALSE)
			$this->template->load('camat/template', 'camat/tambah_surat_kematian', $data);
		else {

			$notif = "Tambah Data Berhasil";
			$this->session->set_flashdata('success', $notif);
			$this->m_camat->set_data("surat_kematian");
			redirect('camat/surat_kematian');
		}

	}

	function update_surat_kematian($id = NULL)
	{

		$data['dt_ktp'] = $this->m_camat->get_data('ktp');
		$data['dt_pegawai'] = $this->m_camat->get_data('pegawai');
		$data['d'] = $this->m_camat->update_surat_kematian($id);
		$this->template->load('camat/template', 'camat/update_surat_kematian', $data);


	}
	function simpan_surat_kematian()
	{
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
		$query = $this->db->query("Select * from ktp join pengunjung on ktp.nik=pengunjung.nik where 
  ktp.id_ktp= '$id_ktp'");
		foreach ($query->result() as $row) {
			$email = $row->email;
		}

$localIP = getHostByName(getHostName());
		$qrcode = '';
		if ($status == 'Selesai') {
			$this->load->library('ciqrcode'); //pemanggilan library QR CODE

			$config['cacheable'] = true; //boolean, the default is true
			$config['cachedir'] = './assets/'; //string, the default is application/cache/
			$config['errorlog'] = './assets/'; //string, the default is application/logs/
			$config['imagedir'] = './assets/images/'; //direktori penyimpanan qr code
			$config['quality'] = true; //boolean, the default is true
			$config['size'] = '1024'; //interger, the default is 1024
			$config['black'] = array(224, 255, 255); // array, default is array(255,255,255)
			$config['white'] = array(70, 130, 180); // array, default is array(0,0,0)
			$this->ciqrcode->initialize($config);
			$link = "http://$localIP/sipelmas/qr/scan/$id_surat_kematian";
			$qrcode = $id_surat_kematian . '.png'; //buat name dari qr code sesuai dengan asal_pendapatan

			$params['data'] = $link; //data yang akan di jadikan QR CODE
			$params['level'] = 'H'; //H=High
			$params['size'] = 10;
			$params['savename'] = FCPATH . $config['imagedir'] . $qrcode; //simpan image QR CODE ke folder assets/images/
			$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
			$mail = new PHPMailer(true);

			try {
				//Server settings
				$mail->SMTPDebug = 2; //Enable verbose debug output
				$mail->isSMTP(); //Send using SMTP
				$mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
				$mail->SMTPAuth = true; //Enable SMTP authentication
				$mail->Username = 'mengajian.si.bjm@gmail.com'; //SMTP username
				$mail->Password = 'gmrzryemjjtxwnrw'; //SMTP password
				$mail->SMTPSecure = 'tls'; //Enable implicit TLS encryption
				$mail->Port = 587; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

				//pengirim
				$mail->setFrom('mengajian.si.bjm@gmail.com', 'SIPELMAS');
				$mail->addAddress($email); //Add a recipient

				//Content
				$mail->isHTML(true); //Set email format to HTML
				$mail->Subject = 'Pelayanan Surat | SIPELMAS';
				$mail->Body = 'Kami informasikan  permohonan surat kematian anda sudah selesai silahkan login ke website untuk download file suratnya.';
				$mail->AltBody = '';
				//$mail->AddEmbeddedImage('gambar/logo.png', 'logo'); //abaikan jika tidak ada logo
				//$mail->addAttachment(''); 

				$mail->send();
				echo 'Message has been sent';

			} catch (Exception $e) {
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
		$res = $this->m_camat->UpdateData('surat_kematian', $data_update, $where);
		if ($res >= 1) {
			$notif = "Update Data Berhasil";
			$this->session->set_flashdata('update', $notif);
			redirect('camat/surat_kematian');
		} else {
			echo "<h1>GAGAL</h1>";
		}
	}
	function delete_surat_kematian($id = NULL)
	{

		$notif = "Delete Data Berhasil";
		$this->session->set_flashdata('delete', $notif);
		$this->m_camat->hapus('surat_kematian', 'id_surat_kematian', $id);
		redirect('camat/surat_kematian');

	}
	function surat_pindah_datang()
	{

		$data['page'] = 'surat_pindah_datang';
		$data['dt_surat_pindah_datang'] = $this->m_camat->camat_surat_pindah_datang();
	$this->template->load('camat/template', 'camat/surat_pindah_datang', $data);


	}

	function tambah_surat_pindah_datang()
	{

		$data['page'] = "tambah_surat_pindah_datang";
		$data['dt_ktp'] = $this->m_camat->get_data('ktp');
		$data['dt_pegawai'] = $this->m_camat->get_data('pegawai');
		$this->db->set('id_surat_pindah_datang', 'UUID()', FALSE);
		$this->form_validation->set_rules('jenis_permohonan', 'jenis_permohonan', 'required');
		$this->form_validation->set_rules('no_surat', 'no_surat');
		$this->form_validation->set_rules('tanggal_surat', 'tanggal_surat');
		$this->form_validation->set_rules('tanda_tangan', 'tanda_tangan');
		$this->form_validation->set_rules('no_kk', 'no_kk');
		$this->form_validation->set_rules('nama_kk', 'nama_kk');
		$this->form_validation->set_rules('alamat_awal', 'alamat_awal');
		$this->form_validation->set_rules('rt_awal', 'rt_awal');
		$this->form_validation->set_rules('rw_awal', 'rw_awal');
		$this->form_validation->set_rules('dusun_awal', 'dusun_awal');
		$this->form_validation->set_rules('desa_awal', 'desa_awal');
		$this->form_validation->set_rules('kec_awal', 'kec_awal');
		$this->form_validation->set_rules('kab_awal', 'kab_awal');
		$this->form_validation->set_rules('prov_awal', 'prov_awal');
		$this->form_validation->set_rules('pos_awal', 'pos_awal');
		$this->form_validation->set_rules('telp_awal', 'telp_awal');
		$this->form_validation->set_rules('id_ktp', 'id_ktp');
		$this->form_validation->set_rules('alasan_pindah', 'alasan_pindah');
		$this->form_validation->set_rules('alamat_pindah', 'alamat_pindah');
		$this->form_validation->set_rules('rt_pindah', 'rt_pindah');
		$this->form_validation->set_rules('rw_pindah', 'rw_pindah');
		$this->form_validation->set_rules('dusun_pindah', 'dusun_pindah');
		$this->form_validation->set_rules('desa_pindah', 'desa_pindah');
		$this->form_validation->set_rules('kec_pindah', 'kec_pindah');
		$this->form_validation->set_rules('kab_pindah', 'kab_pindah');
		$this->form_validation->set_rules('prov_pindah', 'prov_pindah');
		$this->form_validation->set_rules('pos_pindah', 'pos_pindah');
		$this->form_validation->set_rules('telp_pindah', 'telp_pindah');
		$this->form_validation->set_rules('jenis_kepindahan', 'jenis_kepindahan');
		$this->form_validation->set_rules('status_kk_tidak_pindah', 'status_kk_tidak_pindah');
		$this->form_validation->set_rules('status_kk_pindah', 'status_kk_pindah');
		$this->form_validation->set_rules('nik1', 'nik1');
		$this->form_validation->set_rules('nik2', 'nik2');
		$this->form_validation->set_rules('nik3', 'nik3');
		$this->form_validation->set_rules('nik4', 'nik4');
		$this->form_validation->set_rules('nik5', 'nik5');
		$this->form_validation->set_rules('nik6', 'nik6');
		$this->form_validation->set_rules('nik7', 'nik7');
		$this->form_validation->set_rules('nama1', 'nama1');
		$this->form_validation->set_rules('nama2', 'nama2');
		$this->form_validation->set_rules('nama3', 'nama3');
		$this->form_validation->set_rules('nama4', 'nama4');
		$this->form_validation->set_rules('nama5', 'nama5');
		$this->form_validation->set_rules('nama6', 'nama6');
		$this->form_validation->set_rules('nama7', 'nama7');

		if ($this->form_validation->run() === FALSE)
			$this->template->load('camat/template', 'camat/tambah_surat_pindah_datang', $data);
		else {
			
			$notif = "Tambah Data Berhasil";
			$this->session->set_flashdata('success', $notif);
			$this->m_camat->set_data("surat_pindah_datang");
			redirect('camat/surat_pindah_datang');
		}

	}
	function update_surat_pindah_datang($id = NULL)
	{

		$data['page'] = "update_surat_pindah_datang";
		$data['dt_ktp'] = $this->m_camat->get_data('ktp');
		$data['dt_pegawai'] = $this->m_camat->get_data('pegawai');
		$data['d'] = $this->m_camat->update_surat_pindah_datang($id);

	$this->template->load('camat/template', 'camat/update_surat_pindah_datang', $data);

	}
	function simpan_surat_pindah_datang()
	{
		$id_surat_pindah_datang = $this->input->post('id_surat_pindah_datang');
		$jenis_permohonan = $this->input->post('jenis_permohonan');
		$no_surat = $this->input->post('no_surat');
		$no_kk = $this->input->post('no_kk');
		$nama_kk = $this->input->post('nama_kk');
		$alamat_awal = $this->input->post('alamat_awal');
		$rt_awal = $this->input->post('rt_awal');
		$rw_awal = $this->input->post('rw_awal');
		$dusun_awal = $this->input->post('dusun_awal');
		$desa_awal = $this->input->post('desa_awal');
		$kec_awal = $this->input->post('kec_awal');
		$kab_awal = $this->input->post('kab_awal');
		$prov_awal = $this->input->post('prov_awal');
		$pos_awal = $this->input->post('pos_awal');
		$qrcode = $this->input->post('qrcode');
		$telp_awal = $this->input->post('telp_awal');
		$id_ktp = $this->input->post('id_ktp');
		$alasan_pindah = $this->input->post('alasan_pindah');
		$alamat_pindah = $this->input->post('alamat_pindah');
		$rt_pindah = $this->input->post('rt_pindah');
		$rw_pindah = $this->input->post('rw_pindah');
		$dusun_pindah = $this->input->post('dusun_pindah');
		$desa_pindah = $this->input->post('desa_pindah');
		$kec_pindah = $this->input->post('kec_pindah');
		$kab_pindah = $this->input->post('kab_pindah');
		$prov_pindah = $this->input->post('prov_pindah');
		$pos_pindah = $this->input->post('pos_pindah');
		$telp_pindah = $this->input->post('telp_pindah');
		$jenis_kepindahan = $this->input->post('jenis_kepindahan');
		$status_kk_tidak_pindah = $this->input->post('status_kk_tidak_pindah');
		$status_kk_pindah = $this->input->post('status_kk_pindah');
		$nik1 = $this->input->post('nik1');
		$nik2 = $this->input->post('nik2');
		$nik3 = $this->input->post('nik3');
		$nik4 = $this->input->post('nik4');
		$nik5 = $this->input->post('nik5');
		$nik6 = $this->input->post('nik6');
		$nik7 = $this->input->post('nik7');
		$nama1 = $this->input->post('nama1');
		$nama2 = $this->input->post('nama2');
		$nama3 = $this->input->post('nama3');
		$nama4 = $this->input->post('nama4');
		$nama5 = $this->input->post('nama5');
		$nama6 = $this->input->post('nama6');
		$nama7 = $this->input->post('nama7');

		$tanggal_surat = $this->input->post('tanggal_surat');
		$tanda_tangan = $this->input->post('tanda_tangan');
		$status = $this->input->post('status');
		$query = $this->db->query("Select * from ktp join pengunjung on ktp.nik=pengunjung.nik where 
  ktp.id_ktp= '$id_ktp'");
		foreach ($query->result() as $row) {
			$email = $row->email;
		}

$localIP = getHostByName(getHostName());
		$qrcode = '';
		if ($status == 'Selesai') {
			$this->load->library('ciqrcode'); //pemanggilan library QR CODE

			$config['cacheable'] = true; //boolean, the default is true
			$config['cachedir'] = './assets/'; //string, the default is application/cache/
			$config['errorlog'] = './assets/'; //string, the default is application/logs/
			$config['imagedir'] = './assets/images/'; //direktori penyimpanan qr code
			$config['quality'] = true; //boolean, the default is true
			$config['size'] = '1024'; //interger, the default is 1024
			$config['black'] = array(224, 255, 255); // array, default is array(255,255,255)
			$config['white'] = array(70, 130, 180); // array, default is array(0,0,0)
			$this->ciqrcode->initialize($config);
			$link = "http://$localIP/sipelmas/qr/scan/$id_surat_pindah_datang";
			$qrcode = $id_surat_pindah_datang . '.png'; //buat name dari qr code sesuai dengan asal_pendapatan

			$params['data'] = $link; //data yang akan di jadikan QR CODE
			$params['level'] = 'H'; //H=High
			$params['size'] = 10;
			$params['savename'] = FCPATH . $config['imagedir'] . $qrcode; //simpan image QR CODE ke folder assets/images/
			$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
			$mail = new PHPMailer(true);

			try {
				//Server settings
				$mail->SMTPDebug = 2; //Enable verbose debug output
				$mail->isSMTP(); //Send using SMTP
				$mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
				$mail->SMTPAuth = true; //Enable SMTP authentication
				$mail->Username = 'mengajian.si.bjm@gmail.com'; //SMTP username
				$mail->Password = 'gmrzryemjjtxwnrw'; //SMTP password
				$mail->SMTPSecure = 'tls'; //Enable implicit TLS encryption
				$mail->Port = 587; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

				//pengirim
				$mail->setFrom('mengajian.si.bjm@gmail.com', 'SIPELMAS');
				$mail->addAddress($email); //Add a recipient

				//Content
				$mail->isHTML(true); //Set email format to HTML
				$mail->Subject = 'Pelayanan Surat | SIPELMAS';
				$mail->Body = 'Kami informasikan  permohonan surat pindah datang anda sudah selesai silahkan login ke website untuk download file suratnya.';
				$mail->AltBody = '';
				//$mail->AddEmbeddedImage('gambar/logo.png', 'logo'); //abaikan jika tidak ada logo
				//$mail->addAttachment(''); 

				$mail->send();
				echo 'Message has been sent';

			} catch (Exception $e) {
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
		$res = $this->m_camat->UpdateData('surat_pindah_datang', $data_update, $where);
		if ($res >= 1) {
			$notif = "Update Data Berhasil";
			$this->session->set_flashdata('update', $notif);
			redirect('camat/surat_pindah_datang');
		} else {
			echo "<h1>GAGAL</h1>";
		}
	}
	function print_surat_pindah_datang($id = NULL)
	{

		$data['d'] = $this->m_camat->print_surat_pindah_datang($id);
		$this->load->view('camat/print_surat_pindah_datang', $data);


	}
	function delete_surat_pindah_datang($id = NULL)
	{

		$notif = "Delete Data Berhasil";
		$this->session->set_flashdata('delete', $notif);
		$this->m_camat->hapus('surat_pindah_datang', 'id_surat_pindah_datang', $id);
		redirect('camat/surat_pindah_datang');

	}
	function surat_pindah_keluar()
	{

		$data['dt_surat_pindah_keluar'] = $this->m_camat->camat_surat_pindah_keluar();
		$this->template->load('camat/template', 'camat/surat_pindah_keluar', $data);


	}
	function tambah_surat_pindah_keluar()
	{

		$data['page'] = "tambah_surat_pindah_keluar";
		$data['dt_ktp'] = $this->m_camat->get_data('ktp');
		$data['dt_kk'] = $this->m_camat->get_data('kk');
		$data['dt_pegawai'] = $this->m_camat->get_data('pegawai');
		$this->db->set('id_surat_pindah_keluar', 'UUID()', FALSE);
		$this->form_validation->set_rules('jenis_permohonan', 'jenis_permohonan', 'required');
		$this->form_validation->set_rules('no_surat', 'no_surat');
		$this->form_validation->set_rules('tanggal_surat', 'tanggal_surat');
		$this->form_validation->set_rules('tanda_tangan', 'tanda_tangan');
		$this->form_validation->set_rules('no_kk', 'no_kk');
		$this->form_validation->set_rules('nama_kk', 'nama_kk');
		$this->form_validation->set_rules('alamat_awal', 'alamat_awal');
		$this->form_validation->set_rules('rt_awal', 'rt_awal');
		$this->form_validation->set_rules('rw_awal', 'rw_awal');
		$this->form_validation->set_rules('dusun_awal', 'dusun_awal');
		$this->form_validation->set_rules('desa_awal', 'desa_awal');
		$this->form_validation->set_rules('kec_awal', 'kec_awal');
		$this->form_validation->set_rules('kab_awal', 'kab_awal');
		$this->form_validation->set_rules('prov_awal', 'prov_awal');
		$this->form_validation->set_rules('pos_awal', 'pos_awal');
		$this->form_validation->set_rules('telp_awal', 'telp_awal');
		$this->form_validation->set_rules('id_ktp', 'id_ktp');
		$this->form_validation->set_rules('alasan_pindah', 'alasan_pindah');
		$this->form_validation->set_rules('alamat_pindah', 'alamat_pindah');
		$this->form_validation->set_rules('rt_pindah', 'rt_pindah');
		$this->form_validation->set_rules('rw_pindah', 'rw_pindah');
		$this->form_validation->set_rules('dusun_pindah', 'dusun_pindah');
		$this->form_validation->set_rules('desa_pindah', 'desa_pindah');
		$this->form_validation->set_rules('kec_pindah', 'kec_pindah');
		$this->form_validation->set_rules('kab_pindah', 'kab_pindah');
		$this->form_validation->set_rules('prov_pindah', 'prov_pindah');
		$this->form_validation->set_rules('pos_pindah', 'pos_pindah');
		$this->form_validation->set_rules('telp_pindah', 'telp_pindah');
		$this->form_validation->set_rules('jenis_kepindahan', 'jenis_kepindahan');
		$this->form_validation->set_rules('status_kk_tidak_pindah', 'status_kk_tidak_pindah');
		$this->form_validation->set_rules('status_kk_pindah', 'status_kk_pindah');
		$this->form_validation->set_rules('nik1', 'nik1');
		$this->form_validation->set_rules('nik2', 'nik2');
		$this->form_validation->set_rules('nik3', 'nik3');
		$this->form_validation->set_rules('nik4', 'nik4');
		$this->form_validation->set_rules('nik5', 'nik5');
		$this->form_validation->set_rules('nik6', 'nik6');
		$this->form_validation->set_rules('nik7', 'nik7');
		$this->form_validation->set_rules('nama1', 'nama1');
		$this->form_validation->set_rules('nama2', 'nama2');
		$this->form_validation->set_rules('nama3', 'nama3');
		$this->form_validation->set_rules('nama4', 'nama4');
		$this->form_validation->set_rules('nama5', 'nama5');
		$this->form_validation->set_rules('nama6', 'nama6');
		$this->form_validation->set_rules('nama7', 'nama7');

		if ($this->form_validation->run() === FALSE)
			$this->template->load('camat/template', 'camat/tambah_surat_pindah_keluar', $data);
		else {
			
			$notif = "Tambah Data Berhasil";
			$this->session->set_flashdata('success', $notif);
			$this->m_camat->set_data("surat_pindah_keluar");
			redirect('camat/surat_pindah_keluar');
		}

	}
	function update_surat_pindah_keluar($id = NULL)
	{

		$data['dt_ktp'] = $this->m_camat->get_data('ktp');
		$data['dt_kk'] = $this->m_camat->get_data('kk');
		$data['dt_pegawai'] = $this->m_camat->get_data('pegawai');
		$data['d'] = $this->m_camat->update_surat_pindah_keluar($id);
$this->template->load('camat/template', 'camat/update_surat_pindah_keluar', $data);

	}
	function simpan_surat_pindah_keluar()
	{
		$id_surat_pindah_keluar = $this->input->post('id_surat_pindah_keluar');
		$jenis_permohonan = $this->input->post('jenis_permohonan');
		$no_surat = $this->input->post('no_surat');
		$no_kk = $this->input->post('no_kk');
		$nama_kk = $this->input->post('nama_kk');
		$alamat_awal = $this->input->post('alamat_awal');
		$rt_awal = $this->input->post('rt_awal');
		$rw_awal = $this->input->post('rw_awal');
		$dusun_awal = $this->input->post('dusun_awal');
		$desa_awal = $this->input->post('desa_awal');
		$kec_awal = $this->input->post('kec_awal');
		$kab_awal = $this->input->post('kab_awal');
		$prov_awal = $this->input->post('prov_awal');
		$pos_awal = $this->input->post('pos_awal');
		$telp_awal = $this->input->post('telp_awal');
		$id_ktp = $this->input->post('id_ktp');
		$alasan_pindah = $this->input->post('alasan_pindah');
		$alamat_pindah = $this->input->post('alamat_pindah');
		$rt_pindah = $this->input->post('rt_pindah');
		$rw_pindah = $this->input->post('rw_pindah');
		$dusun_pindah = $this->input->post('dusun_pindah');
		$desa_pindah = $this->input->post('desa_pindah');
		$kec_pindah = $this->input->post('kec_pindah');
		$kab_pindah = $this->input->post('kab_pindah');
		$prov_pindah = $this->input->post('prov_pindah');
		$pos_pindah = $this->input->post('pos_pindah');
		$telp_pindah = $this->input->post('telp_pindah');
		$jenis_kepindahan = $this->input->post('jenis_kepindahan');
		$status_kk_tidak_pindah = $this->input->post('status_kk_tidak_pindah');
		$status_kk_pindah = $this->input->post('status_kk_pindah');
		$nik1 = $this->input->post('nik1');
		$nik2 = $this->input->post('nik2');
		$nik3 = $this->input->post('nik3');
		$nik4 = $this->input->post('nik4');
		$nik5 = $this->input->post('nik5');
		$nik6 = $this->input->post('nik6');
		$nik7 = $this->input->post('nik7');
		$nama1 = $this->input->post('nama1');
		$nama2 = $this->input->post('nama2');
		$nama3 = $this->input->post('nama3');
		$nama4 = $this->input->post('nama4');
		$nama5 = $this->input->post('nama5');
		$nama6 = $this->input->post('nama6');
		$nama7 = $this->input->post('nama7');

		$tanggal_surat = $this->input->post('tanggal_surat');
		$tanda_tangan = $this->input->post('tanda_tangan');
		$status = $this->input->post('status');
		$query = $this->db->query("Select * from ktp join pengunjung on ktp.nik=pengunjung.nik where 
  ktp.id_ktp= '$id_ktp'");
		foreach ($query->result() as $row) {
			$email = $row->email;
		}

$localIP = getHostByName(getHostName());
		$qrcode = '';
		if ($status == 'Selesai') {
			$this->load->library('ciqrcode'); //pemanggilan library QR CODE

			$config['cacheable'] = true; //boolean, the default is true
			$config['cachedir'] = './assets/'; //string, the default is application/cache/
			$config['errorlog'] = './assets/'; //string, the default is application/logs/
			$config['imagedir'] = './assets/images/'; //direktori penyimpanan qr code
			$config['quality'] = true; //boolean, the default is true
			$config['size'] = '1024'; //interger, the default is 1024
			$config['black'] = array(224, 255, 255); // array, default is array(255,255,255)
			$config['white'] = array(70, 130, 180); // array, default is array(0,0,0)
			$this->ciqrcode->initialize($config);
			$link = "http://$localIP/sipelmas/qr/scan/$id_surat_pindah_keluar";
			$qrcode = $id_surat_keluar . '.png'; //buat name dari qr code sesuai dengan asal_pendapatan

			$params['data'] = $link; //data yang akan di jadikan QR CODE
			$params['level'] = 'H'; //H=High
			$params['size'] = 10;
			$params['savename'] = FCPATH . $config['imagedir'] . $qrcode; //simpan image QR CODE ke folder assets/images/
			$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
			$mail = new PHPMailer(true);

			try {
				//Server settings
				$mail->SMTPDebug = 2; //Enable verbose debug output
				$mail->isSMTP(); //Send using SMTP
				$mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
				$mail->SMTPAuth = true; //Enable SMTP authentication
				$mail->Username = 'mengajian.si.bjm@gmail.com'; //SMTP username
				$mail->Password = 'gmrzryemjjtxwnrw'; //SMTP password
				$mail->SMTPSecure = 'tls'; //Enable implicit TLS encryption
				$mail->Port = 587; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

				//pengirim
				$mail->setFrom('mengajian.si.bjm@gmail.com', 'SIPELMAS');
				$mail->addAddress($email); //Add a recipient

				//Content
				$mail->isHTML(true); //Set email format to HTML
				$mail->Subject = 'Pelayanan Surat | SIPELMAS';
				$mail->Body = 'Kami informasikan  permohonan surat pindah keluar anda sudah selesai silahkan login ke website untuk download file suratnya.';
				$mail->AltBody = '';
				//$mail->AddEmbeddedImage('gambar/logo.png', 'logo'); //abaikan jika tidak ada logo
				//$mail->addAttachment(''); 

				$mail->send();
				echo 'Message has been sent';

			} catch (Exception $e) {
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
		$res = $this->m_camat->UpdateData('surat_pindah_keluar', $data_update, $where);
		if ($res >= 1) {
			$notif = "Update Data Berhasil";
			$this->session->set_flashdata('update', $notif);
			redirect('camat/surat_pindah_keluar');
		} else {
			echo "<h1>GAGAL</h1>";
		}
	}
	function print_surat_pindah_keluar($id = NULL)
	{

		$data['d'] = $this->m_camat->print_surat_pindah_keluar($id);
		$this->load->view('camat/print_surat_pindah_keluar', $data);


	}
	function delete_surat_pindah_keluar($id = NULL)
	{

		$notif = "Delete Data Berhasil";
		$this->session->set_flashdata('delete', $notif);
		$this->m_camat->hapus('surat_pindah_keluar', 'id_surat_pindah_keluar', $id);
		redirect('camat/surat_pindah_keluar');

	}
	function surat_belum_menikah()
	{

		
		$data['dt_surat_belum_menikah'] = $this->m_camat->camat_surat_belum_menikah();
		$this->template->load('camat/template', 'camat/surat_belum_menikah', $data);


	}
	function print_surat_belum_menikah($id = NULL)
	{

		$data['d'] = $this->m_camat->print_surat_belum_menikah($id);
		$this->load->view('camat/print_surat_belum_menikah', $data);


	}
	function cetak_surat_belum_menikah()
	{

		
		$data['dt_surat_belum_menikah'] = $this->m_camat->camat_surat_belum_menikah();
		$this->load->view('camat/cetak_surat_belum_menikah', $data);


	}
	function tambah_surat_belum_menikah()
	{

		$data['page'] = "tambah_surat_belum_menikah";
		$data['dt_ktp'] = $this->m_camat->get_data('ktp');
		$data['dt_pegawai'] = $this->m_camat->get_data('pegawai');
		$this->db->set('id_surat_belum_menikah', 'UUID()', FALSE);
		$this->form_validation->set_rules('id_ktp', 'id_ktp', 'required');
		$this->form_validation->set_rules('no_surat', 'no_surat');
		$this->form_validation->set_rules('bin', 'bin');
		$this->form_validation->set_rules('status_nikah', 'status_nikah');
		$this->form_validation->set_rules('tanggal_surat', 'tanggal_surat');
		$this->form_validation->set_rules('tanda_tangan', 'tanda_tangan');

		if ($this->form_validation->run() === FALSE)
			$this->template->load('camat/template', 'camat/tambah_surat_belum_menikah', $data);
		else {
			
			$notif = "Tambah Data Berhasil";
			$this->session->set_flashdata('success', $notif);
			$this->m_camat->set_data("surat_belum_menikah");
			redirect('camat/surat_belum_menikah');
		}

	}
	function update_surat_belum_menikah($id = NULL)
	{

		$data['dt_ktp'] = $this->m_camat->get_data('ktp');
		$data['dt_pegawai'] = $this->m_camat->get_data('pegawai');
		$data['d'] = $this->m_camat->update_surat_belum_menikah($id);
		$this->template->load('camat/template', 'camat/update_surat_belum_menikah', $data);

	}
	function simpan_surat_belum_menikah()
	{
		$id_surat_belum_menikah = $this->input->post('id_surat_belum_menikah');
		$id_ktp = $this->input->post('id_ktp');
		$no_surat = $this->input->post('no_surat');
		$bin = $this->input->post('bin');
		$status_nikah = $this->input->post('status_nikah');
		$tanggal_surat = $this->input->post('tanggal_surat');
		$tanda_tangan = $this->input->post('tanda_tangan');
		$status = $this->input->post('status');
		$query = $this->db->query("Select * from ktp join pengunjung on ktp.nik=pengunjung.nik where 
  ktp.id_ktp= '$id_ktp'");
		foreach ($query->result() as $row) {
			$email = $row->email;
		}

$localIP = getHostByName(getHostName());
		$qrcode = '';
		if ($status == 'Selesai') {
			$this->load->library('ciqrcode'); //pemanggilan library QR CODE

			$config['cacheable'] = true; //boolean, the default is true
			$config['cachedir'] = './assets/'; //string, the default is application/cache/
			$config['errorlog'] = './assets/'; //string, the default is application/logs/
			$config['imagedir'] = './assets/images/'; //direktori penyimpanan qr code
			$config['quality'] = true; //boolean, the default is true
			$config['size'] = '1024'; //interger, the default is 1024
			$config['black'] = array(224, 255, 255); // array, default is array(255,255,255)
			$config['white'] = array(70, 130, 180); // array, default is array(0,0,0)
			$this->ciqrcode->initialize($config);
			$link = "http://$localIP/sipelmas/qr/scan/$id_surat_belum_menikah";
			$qrcode = $id_surat_belum_menikah . '.png'; //buat name dari qr code sesuai dengan asal_pendapatan

			$params['data'] = $link; //data yang akan di jadikan QR CODE
			$params['level'] = 'H'; //H=High
			$params['size'] = 10;
			$params['savename'] = FCPATH . $config['imagedir'] . $qrcode; //simpan image QR CODE ke folder assets/images/
			$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
			$mail = new PHPMailer(true);

			try {
				//Server settings
				$mail->SMTPDebug = 2; //Enable verbose debug output
				$mail->isSMTP(); //Send using SMTP
				$mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
				$mail->SMTPAuth = true; //Enable SMTP authentication
				$mail->Username = 'mengajian.si.bjm@gmail.com'; //SMTP username
				$mail->Password = 'gmrzryemjjtxwnrw'; //SMTP password
				$mail->SMTPSecure = 'tls'; //Enable implicit TLS encryption
				$mail->Port = 587; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

				//pengirim
				$mail->setFrom('mengajian.si.bjm@gmail.com', 'SIPELMAS');
				$mail->addAddress($email); //Add a recipient

				//Content
				$mail->isHTML(true); //Set email format to HTML
				$mail->Subject = 'Pelayanan Surat | SIPELMAS';
				$mail->Body = 'Kami informasikan  permohonan surat belum menikah anda sudah selesai silahkan login ke website untuk download file suratnya.';
				$mail->AltBody = '';
				//$mail->AddEmbeddedImage('gambar/logo.png', 'logo'); //abaikan jika tidak ada logo
				//$mail->addAttachment(''); 

				$mail->send();
				echo 'Message has been sent';

			} catch (Exception $e) {
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
		$res = $this->m_camat->UpdateData('surat_belum_menikah', $data_update, $where);
		if ($res >= 1) {
			$notif = "Update Data Berhasil";
			$this->session->set_flashdata('update', $notif);
			redirect('camat/surat_belum_menikah');
		} else {
			echo "<h1>GAGAL</h1>";
		}
	}
	function delete_surat_belum_menikah($id = NULL)
	{

		$notif = "Delete Data Berhasil";
		$this->session->set_flashdata('delete', $notif);
		$this->m_camat->hapus('surat_belum_menikah', 'id_surat_belum_menikah', $id);
		redirect('camat/surat_belum_menikah');

	}
	function surat_kurang_mampu()
	{

		$data['dt_surat_kurang_mampu'] = $this->m_camat->camat_surat_kurang_mampu();
		$this->template->load('camat/template', 'camat/surat_kurang_mampu', $data);

	}
	function cetak_surat_kurang_mampu()
	{

		$data['dt_surat_kurang_mampu'] = $this->m_camat->camat_surat_kurang_mampu();
		$this->load->view('camat/cetak_surat_kurang_mampu', $data);


	}
	function print_surat_kurang_mampu($id = NULL)
	{

		$data['d'] = $this->m_camat->print_surat_kurang_mampu($id);
		$this->load->view('camat/print_surat_kurang_mampu', $data);


	}
	function tambah_surat_kurang_mampu()
	{

		$data['page'] = "tambah_surat_kurang_mampu";
		$data['dt_ktp'] = $this->m_camat->get_data('ktp');
		$data['dt_pegawai'] = $this->m_camat->get_data('pegawai');
		$this->db->set('id_surat_kurang_mampu', 'UUID()', FALSE);
		$this->form_validation->set_rules('id_ktp', 'id_ktp', 'required');
		$this->form_validation->set_rules('no_surat', 'no_surat');
		$this->form_validation->set_rules('peruntukan', 'peruntukan');
		$this->form_validation->set_rules('keperluan', 'keperluan');
		$this->form_validation->set_rules('penghasilan', 'penghasilan');
		$this->form_validation->set_rules('tanggal_surat', 'tanggal_surat');
		$this->form_validation->set_rules('tanda_tangan', 'tanda_tangan');

		if ($this->form_validation->run() === FALSE)
			$this->template->load('camat/template', 'camat/tambah_surat_kurang_mampu', $data);
		else {

			$notif = "Tambah Data Berhasil";
			$this->session->set_flashdata('success', $notif);
			$this->m_camat->set_data("surat_kurang_mampu");
			redirect('camat/surat_kurang_mampu');
		}

	}
	function update_surat_kurang_mampu($id = NULL)
	{

		$data['dt_ktp'] = $this->m_camat->get_data('ktp');
		$data['dt_pegawai'] = $this->m_camat->get_data('pegawai');
		$data['d'] = $this->m_camat->update_surat_kurang_mampu($id);
		$this->template->load('camat/template', 'camat/update_surat_kurang_mampu', $data);

	}
	function simpan_surat_kurang_mampu()
	{
		$id_surat_kurang_mampu = $this->input->post('id_surat_kurang_mampu');
		$id_ktp = $this->input->post('id_ktp');
		$no_surat = $this->input->post('no_surat');
		$peruntukan = $this->input->post('peruntukan');
		$keperluan = $this->input->post('keperluan');
		$penghasilan = $this->input->post('penghasilan');
		$tanggal_surat = $this->input->post('tanggal_surat');
		$tanda_tangan = $this->input->post('tanda_tangan');
		$status = $this->input->post('status');
		$query = $this->db->query("Select * from ktp join pengunjung on ktp.nik=pengunjung.nik where 
  ktp.id_ktp= '$id_ktp'");
		foreach ($query->result() as $row) {
			$email = $row->email;
		}

$localIP = getHostByName(getHostName());
		$qrcode = '';
		if ($status == 'Selesai') {
			$this->load->library('ciqrcode'); //pemanggilan library QR CODE

			$config['cacheable'] = true; //boolean, the default is true
			$config['cachedir'] = './assets/'; //string, the default is application/cache/
			$config['errorlog'] = './assets/'; //string, the default is application/logs/
			$config['imagedir'] = './assets/images/'; //direktori penyimpanan qr code
			$config['quality'] = true; //boolean, the default is true
			$config['size'] = '1024'; //interger, the default is 1024
			$config['black'] = array(224, 255, 255); // array, default is array(255,255,255)
			$config['white'] = array(70, 130, 180); // array, default is array(0,0,0)
			$this->ciqrcode->initialize($config);
			$link = "http://$localIP/sipelmas/qr/scan/$id_surat_kurang_mampu";
			$qrcode = $id_surat_kurang_mampu . '.png'; //buat name dari qr code sesuai dengan asal_pendapatan

			$params['data'] = $link; //data yang akan di jadikan QR CODE
			$params['level'] = 'H'; //H=High
			$params['size'] = 10;
			$params['savename'] = FCPATH . $config['imagedir'] . $qrcode; //simpan image QR CODE ke folder assets/images/
			$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
			$mail = new PHPMailer(true);

			try {
				//Server settings
				$mail->SMTPDebug = 2; //Enable verbose debug output
				$mail->isSMTP(); //Send using SMTP
				$mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
				$mail->SMTPAuth = true; //Enable SMTP authentication
				$mail->Username = 'mengajian.si.bjm@gmail.com'; //SMTP username
				$mail->Password = 'gmrzryemjjtxwnrw'; //SMTP password
				$mail->SMTPSecure = 'tls'; //Enable implicit TLS encryption
				$mail->Port = 587; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

				//pengirim
				$mail->setFrom('mengajian.si.bjm@gmail.com', 'SIPELMAS');
				$mail->addAddress($email); //Add a recipient

				//Content
				$mail->isHTML(true); //Set email format to HTML
				$mail->Subject = 'Pelayanan Surat | SIPELMAS';
				$mail->Body = 'Kami informasikan  permohonan surat kurang mampu anda sudah selesai silahkan login ke website untuk download file suratnya.';
				$mail->AltBody = '';
				//$mail->AddEmbeddedImage('gambar/logo.png', 'logo'); //abaikan jika tidak ada logo
				//$mail->addAttachment(''); 

				$mail->send();
				echo 'Message has been sent';

			} catch (Exception $e) {
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
		$res = $this->m_camat->UpdateData('surat_kurang_mampu', $data_update, $where);
		if ($res >= 1) {
			$notif = "Update Data Berhasil";
			$this->session->set_flashdata('update', $notif);
			redirect('camat/surat_kurang_mampu');
		} else {
			echo "<h1>GAGAL</h1>";
		}
	}
	function delete_surat_kurang_mampu($id = NULL)
	{

		$notif = "Delete Data Berhasil";
		$this->session->set_flashdata('delete', $notif);
		$this->m_camat->hapus('surat_kurang_mampu', 'id_surat_kurang_mampu', $id);
		redirect('camat/surat_kurang_mampu');


	}
	function surat_domisili()
	{
		$data['dt_surat_domisili'] = $this->m_camat->camat_surat_domisili();
		$this->template->load('camat/template', 'camat/surat_domisili', $data);

	}
	function cetak_surat_domisili()
	{

		$data['dt_surat_domisili'] = $this->m_camat->camat_surat_domisili();
		$this->load->view('camat/cetak_surat_domisili', $data);

	}
	function print_surat_domisili($id = NULL)
	{
		$data['d'] = $this->m_camat->print_surat_domisili($id);
		$this->load->view('camat/print_surat_domisili', $data);

	}

	function tambah_surat_domisili()
	{
		$data['dt_ktp'] = $this->m_camat->get_data('ktp');
		$data['dt_pegawai'] = $this->m_camat->get_data('pegawai');
		$this->db->set('id_surat_domisili', 'UUID()', FALSE);
		$this->form_validation->set_rules('id_ktp', 'id_ktp', 'required');
		$this->form_validation->set_rules('no_surat', 'no_surat');
		$this->form_validation->set_rules('alamat_domisili', 'alamat_domisili', 'required');
		$this->form_validation->set_rules('tanggal_surat', 'tanggal_surat');
		$this->form_validation->set_rules('tanda_tangan', 'tanda_tangan');
		if ($this->form_validation->run() === FALSE)
			$this->template->load('camat/template', 'camat/tambah_surat_domisili', $data);
		else {


			$this->m_camat->set_data("surat_domisili");
			$notif = "Tambah Data Berhasil";
			$this->session->set_flashdata('success', $notif);
			redirect('camat/surat_domisili');
		}
	}
	function update_surat_domisili($id = NULL)
	{

		$data['dt_ktp'] = $this->m_camat->get_data('ktp');
		$data['dt_pegawai'] = $this->m_camat->get_data('pegawai');
		$data['d'] = $this->m_camat->update_surat_domisili($id);
		$data['page'] = 'update_surat_domisili';
		$this->template->load('camat/template', 'camat/update_surat_domisili', $data);

	}
	function simpan_surat_domisili()
	{
		$id_surat_domisili = $this->input->post('id_surat_domisili');
		$id_ktp = $this->input->post('id_ktp');

		$no_surat = $this->input->post('no_surat');
		$alamat_domisili = $this->input->post('alamat_domisili');
		$tanggal_surat = $this->input->post('tanggal_surat');
		$tanda_tangan = $this->input->post('tanda_tangan');
		$status = $this->input->post('status');

		$query = $this->db->query("Select * from ktp join pengunjung on ktp.nik=pengunjung.nik where 
  ktp.id_ktp= '$id_ktp'");
		foreach ($query->result() as $row) {
			$email = $row->email;
		}
$localIP = getHostByName(getHostName());
		$qrcode = '';
		if ($status == 'Selesai') {
			$this->load->library('ciqrcode'); //pemanggilan library QR CODE

			$config['cacheable'] = true; //boolean, the default is true
			$config['cachedir'] = './assets/'; //string, the default is application/cache/
			$config['errorlog'] = './assets/'; //string, the default is application/logs/
			$config['imagedir'] = './assets/images/'; //direktori penyimpanan qr code
			$config['quality'] = true; //boolean, the default is true
			$config['size'] = '1024'; //interger, the default is 1024
			$config['black'] = array(224, 255, 255); // array, default is array(255,255,255)
			$config['white'] = array(70, 130, 180); // array, default is array(0,0,0)
			$this->ciqrcode->initialize($config);
			$link = "http://$localIP/sipelmas/qr/scan/$id_surat_domisili";
			$qrcode = $id_surat_domisili . '.png'; //buat name dari qr code sesuai dengan asal_pendapatan

			$params['data'] = $link; //data yang akan di jadikan QR CODE
			$params['level'] = 'H'; //H=High
			$params['size'] = 10;
			$params['savename'] = FCPATH . $config['imagedir'] . $qrcode; //simpan image QR CODE ke folder assets/images/
			$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
			$mail = new PHPMailer(true);

			try {
				//Server settings
				$mail->SMTPDebug = 2; //Enable verbose debug output
				$mail->isSMTP(); //Send using SMTP
				$mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
				$mail->SMTPAuth = true; //Enable SMTP authentication
				$mail->Username = 'mengajian.si.bjm@gmail.com'; //SMTP username
				$mail->Password = 'gmrzryemjjtxwnrw'; //SMTP password
				$mail->SMTPSecure = 'tls'; //Enable implicit TLS encryption
				$mail->Port = 587; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

				//pengirim
				$mail->setFrom('mengajian.si.bjm@gmail.com', 'SIPELMAS');
				$mail->addAddress($email); //Add a recipient

				//Content
				$mail->isHTML(true); //Set email format to HTML
				$mail->Subject = 'Pelayanan Surat | SIPELMAS';
				$mail->Body = 'Kami informasikan permohonan surat domisili anda sudah selesai silahkan login ke website untuk download file suratnya.';
				$mail->AltBody = '';
				//$mail->AddEmbeddedImage('gambar/logo.png', 'logo'); //abaikan jika tidak ada logo
				//$mail->addAttachment(''); 

				$mail->send();
				echo 'Message has been sent';

			} catch (Exception $e) {
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
		$res = $this->m_camat->UpdateData('surat_domisili', $data_update, $where);
		if ($res >= 1) {

			$notif = "Update Data Berhasil";
			$this->session->set_flashdata('update', $notif);
			redirect('camat/surat_domisili');
		} else {
			echo "<h1>GAGAL</h1>";
		}
	}
	function delete_surat_domisili($id = NULL)
	{

		$notif = "Delete Data Berhasil";
		$this->session->set_flashdata('delete', $notif);
		$this->m_camat->hapus('surat_domisili', 'id_surat_domisili', $id);

		redirect('camat/surat_domisili');

	}
	function surat_janda()
	{

		$data['page'] = 'surat_janda';
		$data['dt_surat_janda'] = $this->m_camat->camat_surat_janda();
		$this->template->load('camat/template', 'camat/surat_janda', $data);


	}
	function cetak_surat_janda()
	{

		$data['page'] = 'surat_janda';
		$data['dt_surat_janda'] = $this->m_camat->camat_surat_janda();
		$this->load->view('camat/cetak_surat_janda', $data);


	}
	function print_surat_janda($id = NULL)
	{

		$data['d'] = $this->m_camat->print_surat_janda($id);
		$this->load->view('camat/print_surat_janda', $data);


	}

	function tambah_surat_janda()
	{

		$data['page'] = "tambah_surat_janda";
		$data['dt_ktp'] = $this->m_camat->get_data('ktp');
		$data['dt_pegawai'] = $this->m_camat->get_data('pegawai');
		$this->db->set('id_surat_janda', 'UUID()', FALSE);
		$this->form_validation->set_rules('id_ktp', 'id_ktp', 'required');



		if ($this->form_validation->run() === FALSE)
		$this->template->load('camat/template', 'camat/tambah_surat_janda', $data);
		else {
			
			$notif = "Tambah Data Berhasil";
			$this->session->set_flashdata('success', $notif);
			$this->m_camat->set_data("surat_janda");
			redirect('camat/surat_janda');
		}

	}
	function update_surat_janda($id = NULL)
	{

		$data['dt_ktp'] = $this->m_camat->get_data('ktp');
		$data['dt_pegawai'] = $this->m_camat->get_data('pegawai');
		$data['d'] = $this->m_camat->update_surat_janda($id);
		$data['page'] = 'update_surat_janda';
		$this->template->load('camat/template', 'camat/update_surat_janda', $data);

	}
	function simpan_surat_janda()
	{
		$id_surat_janda = $this->input->post('id_surat_janda');
		$id_ktp = $this->input->post('id_ktp');

		$no_surat = $this->input->post('no_surat');

		$tanggal_surat = $this->input->post('tanggal_surat');
		$tanda_tangan = $this->input->post('tanda_tangan');
		$status = $this->input->post('status');

		$query = $this->db->query("Select * from ktp join pengunjung on ktp.nik=pengunjung.nik where 
  ktp.id_ktp= '$id_ktp'");
		foreach ($query->result() as $row) {
			$email = $row->email;
		}
$localIP = getHostByName(getHostName());
		$qrcode = '';
		if ($status == 'Selesai') {
			$this->load->library('ciqrcode'); //pemanggilan library QR CODE

			$config['cacheable'] = true; //boolean, the default is true
			$config['cachedir'] = './assets/'; //string, the default is application/cache/
			$config['errorlog'] = './assets/'; //string, the default is application/logs/
			$config['imagedir'] = './assets/images/'; //direktori penyimpanan qr code
			$config['quality'] = true; //boolean, the default is true
			$config['size'] = '1024'; //interger, the default is 1024
			$config['black'] = array(224, 255, 255); // array, default is array(255,255,255)
			$config['white'] = array(70, 130, 180); // array, default is array(0,0,0)
			$this->ciqrcode->initialize($config);
			$link = "http://$localIP/sipelmas/qr/scan/$id_surat_janda";
			$qrcode = $id_surat_janda . '.png'; //buat name dari qr code sesuai dengan asal_pendapatan

			$params['data'] = $link; //data yang akan di jadikan QR CODE
			$params['level'] = 'H'; //H=High
			$params['size'] = 10;
			$params['savename'] = FCPATH . $config['imagedir'] . $qrcode; //simpan image QR CODE ke folder assets/images/
			$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
			$mail = new PHPMailer(true);

			try {
				//Server settings
				$mail->SMTPDebug = 2; //Enable verbose debug output
				$mail->isSMTP(); //Send using SMTP
				$mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
				$mail->SMTPAuth = true; //Enable SMTP authentication
				$mail->Username = 'mengajian.si.bjm@gmail.com'; //SMTP username
				$mail->Password = 'gmrzryemjjtxwnrw'; //SMTP password
				$mail->SMTPSecure = 'tls'; //Enable implicit TLS encryption
				$mail->Port = 587; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

				//pengirim
				$mail->setFrom('mengajian.si.bjm@gmail.com', 'SIPELMAS');
				$mail->addAddress($email); //Add a recipient

				//Content
				$mail->isHTML(true); //Set email format to HTML
				$mail->Subject = 'Pelayanan Surat | SIPELMAS';
				$mail->Body = 'Kami informasikan permohonan surat pernyataan janda anda sudah selesai silahkan login ke website untuk download file suratnya.';
				$mail->AltBody = '';
				//$mail->AddEmbeddedImage('gambar/logo.png', 'logo'); //abaikan jika tidak ada logo
				//$mail->addAttachment(''); 

				$mail->send();
				echo 'Message has been sent';

			} catch (Exception $e) {
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
		$res = $this->m_camat->UpdateData('surat_janda', $data_update, $where);
		if ($res >= 1) {
			$notif = "Update Data Berhasil";
			$this->session->set_flashdata('update', $notif);
			redirect('camat/surat_janda');
		} else {
			echo "<h1>GAGAL</h1>";
		}
	}
	function delete_surat_janda($id = NULL)
	{

		$notif = "Delete Data Berhasil";
		$this->session->set_flashdata('delete', $notif);
		$this->m_camat->hapus('surat_janda', 'id_surat_janda', $id);
		redirect('camat/surat_janda');

	}
	function surat_izin_keramaian()
	{

	
		$data['dt_surat_izin_keramaian'] = $this->m_camat->camat_surat_izin_keramaian();
		$this->template->load('camat/template', 'camat/surat_izin_keramaian', $data);


	}
	function cetak_surat_izin_keramaian()
	{

		
		$data['dt_surat_izin_keramaian'] = $this->m_camat->camat_surat_izin_keramaian();
		$this->load->view('camat/cetak_surat_izin_keramaian', $data);


	}
	function print_surat_izin_keramaian($id = NULL)
	{

		$data['d'] = $this->m_camat->print_surat_izin_keramaian($id);
		$this->load->view('camat/print_surat_izin_keramaian', $data);


	}

	function tambah_surat_izin_keramaian()
	{

	
		$data['dt_ktp'] = $this->m_camat->get_data('ktp');
		$data['dt_pegawai'] = $this->m_camat->get_data('pegawai');
		$this->db->set('id_surat_izin_keramaian', 'UUID()', FALSE);
		$this->form_validation->set_rules('id_ktp', 'id_ktp', 'required');



		if ($this->form_validation->run() === FALSE)
			$this->template->load('camat/template', 'camat/tambah_surat_izin_keramaian', $data);
		else {
			
			$notif = "Tambah Data Berhasil";
			$this->session->set_flashdata('success', $notif);
			$this->m_camat->set_data("surat_izin_keramaian");
			redirect('camat/surat_izin_keramaian');
		}

	}
	function update_surat_izin_keramaian($id = NULL)
	{

		$data['dt_ktp'] = $this->m_camat->get_data('ktp');
		$data['dt_pegawai'] = $this->m_camat->get_data('pegawai');
		$data['d'] = $this->m_camat->update_surat_izin_keramaian($id);
		$this->template->load('camat/template', 'camat/update_surat_izin_keramaian', $data);
	}
	function simpan_surat_izin_keramaian()
	{
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
		$query = $this->db->query("Select * from ktp join pengunjung on ktp.nik=pengunjung.nik where 
  ktp.id_ktp= '$id_ktp'");
		foreach ($query->result() as $row) {
			$email = $row->email;
		}

$localIP = getHostByName(getHostName());
		$qrcode = '';
		if ($status == 'Selesai') {
			$this->load->library('ciqrcode'); //pemanggilan library QR CODE

			$config['cacheable'] = true; //boolean, the default is true
			$config['cachedir'] = './assets/'; //string, the default is application/cache/
			$config['errorlog'] = './assets/'; //string, the default is application/logs/
			$config['imagedir'] = './assets/images/'; //direktori penyimpanan qr code
			$config['quality'] = true; //boolean, the default is true
			$config['size'] = '1024'; //interger, the default is 1024
			$config['black'] = array(224, 255, 255); // array, default is array(255,255,255)
			$config['white'] = array(70, 130, 180); // array, default is array(0,0,0)
			$this->ciqrcode->initialize($config);
			$link = "http://$localIP/sipelmas/qr/scan/$id_surat_izin_keramaian";
			$qrcode = $id_surat_izin_keramaian . '.png'; //buat name dari qr code sesuai dengan asal_pendapatan

			$params['data'] = $link; //data yang akan di jadikan QR CODE
			$params['level'] = 'H'; //H=High
			$params['size'] = 10;
			$params['savename'] = FCPATH . $config['imagedir'] . $qrcode; //simpan image QR CODE ke folder assets/images/
			$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
			$mail = new PHPMailer(true);

			try {
				//Server settings
				$mail->SMTPDebug = 2; //Enable verbose debug output
				$mail->isSMTP(); //Send using SMTP
				$mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
				$mail->SMTPAuth = true; //Enable SMTP authentication
				$mail->Username = 'mengajian.si.bjm@gmail.com'; //SMTP username
				$mail->Password = 'gmrzryemjjtxwnrw'; //SMTP password
				$mail->SMTPSecure = 'tls'; //Enable implicit TLS encryption
				$mail->Port = 587; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

				//pengirim
				$mail->setFrom('mengajian.si.bjm@gmail.com', 'SIPELMAS');
				$mail->addAddress($email); //Add a recipient

				//Content
				$mail->isHTML(true); //Set email format to HTML
				$mail->Subject = 'Pelayanan Surat | SIPELMAS';
				$mail->Body = 'Kami informasikan  permohonan surat izin mengumpulkan orang banyak/izin keramaian anda sudah selesai silahkan login ke website untuk download file suratnya.';
				$mail->AltBody = '';
				//$mail->AddEmbeddedImage('gambar/logo.png', 'logo'); //abaikan jika tidak ada logo
				//$mail->addAttachment(''); 

				$mail->send();
				echo 'Message has been sent';

			} catch (Exception $e) {
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
		$res = $this->m_camat->UpdateData('surat_izin_keramaian', $data_update, $where);
		if ($res >= 1) {
			$notif = "Update Data Berhasil";
			$this->session->set_flashdata('update', $notif);
			redirect('camat/surat_izin_keramaian');
		} else {
			echo "<h1>GAGAL</h1>";
		}
	}
	function delete_surat_izin_keramaian($id = NULL)
	{

		$notif = "Delete Data Berhasil";
		$this->session->set_flashdata('delete', $notif);
		$this->m_camat->hapus('surat_izin_keramaian', 'id_surat_izin_keramaian', $id);
		redirect('camat/surat_izin_keramaian');

	}
	function surat_skck()
	{

		$data['dt_surat_skck'] = $this->m_camat->camat_surat_skck();
		$this->template->load('camat/template', 'camat/surat_skck', $data);


	}
	function cetak_surat_skck()
	{

	
		$data['dt_surat_skck'] = $this->m_camat->camat_surat_skck();
		$this->load->view('camat/cetak_surat_skck', $data);


	}
	function print_surat_skck($id = NULL)
	{

		$data['d'] = $this->m_camat->print_surat_skck($id);
		$this->load->view('camat/print_surat_skck', $data);


	}

	function tambah_surat_skck()
	{

		
		$data['dt_ktp'] = $this->m_camat->get_data('ktp');
		$data['dt_pegawai'] = $this->m_camat->get_data('pegawai');
		$this->db->set('id_surat_skck', 'UUID()', FALSE);
		$this->form_validation->set_rules('id_ktp', 'id_ktp', 'required');



		if ($this->form_validation->run() === FALSE)
			$this->template->load('camat/template', 'camat/tambah_surat_skck', $data);
		else {
			
			$notif = "Tambah Data Berhasil";
			$this->session->set_flashdata('success', $notif);
			$this->m_camat->set_data("surat_skck");
			redirect('camat/surat_skck');
		}

	}
	function update_surat_skck($id = NULL)
	{

		$data['dt_ktp'] = $this->m_camat->get_data('ktp');
		$data['dt_pegawai'] = $this->m_camat->get_data('pegawai');
		$data['d'] = $this->m_camat->update_surat_skck($id);
		$this->template->load('camat/template', 'camat/update_surat_skck', $data);

	}
	function simpan_surat_skck()
	{
		$id_surat_skck = $this->input->post('id_surat_skck');
		$id_ktp = $this->input->post('id_ktp');
		$no_surat = $this->input->post('no_surat');
		$tanggal_surat = $this->input->post('tanggal_surat');
		$keperluan = $this->input->post('keperluan');

		$tanda_tangan = $this->input->post('tanda_tangan');
		$status = $this->input->post('status');
		$query = $this->db->query("Select * from ktp join pengunjung on ktp.nik=pengunjung.nik where 
  ktp.id_ktp= '$id_ktp'");
		foreach ($query->result() as $row) {
			$email = $row->email;
		}

$localIP = getHostByName(getHostName());
		$qrcode = '';
		if ($status == 'Selesai') {
			$this->load->library('ciqrcode'); //pemanggilan library QR CODE

			$config['cacheable'] = true; //boolean, the default is true
			$config['cachedir'] = './assets/'; //string, the default is application/cache/
			$config['errorlog'] = './assets/'; //string, the default is application/logs/
			$config['imagedir'] = './assets/images/'; //direktori penyimpanan qr code
			$config['quality'] = true; //boolean, the default is true
			$config['size'] = '1024'; //interger, the default is 1024
			$config['black'] = array(224, 255, 255); // array, default is array(255,255,255)
			$config['white'] = array(70, 130, 180); // array, default is array(0,0,0)
			$this->ciqrcode->initialize($config);
			$link = "http://$localIP/sipelmas/qr/scan/$id_surat_skck";
			$qrcode = $id_surat_skck . '.png'; //buat name dari qr code sesuai dengan asal_pendapatan

			$params['data'] = $link; //data yang akan di jadikan QR CODE
			$params['level'] = 'H'; //H=High
			$params['size'] = 10;
			$params['savename'] = FCPATH . $config['imagedir'] . $qrcode; //simpan image QR CODE ke folder assets/images/
			$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
			$mail = new PHPMailer(true);

			try {
				//Server settings
				$mail->SMTPDebug = 2; //Enable verbose debug output
				$mail->isSMTP(); //Send using SMTP
				$mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
				$mail->SMTPAuth = true; //Enable SMTP authentication
				$mail->Username = 'mengajian.si.bjm@gmail.com'; //SMTP username
				$mail->Password = 'gmrzryemjjtxwnrw'; //SMTP password
				$mail->SMTPSecure = 'tls'; //Enable implicit TLS encryption
				$mail->Port = 587; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

				//pengirim
				$mail->setFrom('mengajian.si.bjm@gmail.com', 'SIPELMAS');
				$mail->addAddress($email); //Add a recipient

				//Content
				$mail->isHTML(true); //Set email format to HTML
				$mail->Subject = 'Pelayanan Surat | SIPELMAS';
				$mail->Body = 'Kami informasikan  permohonan surat skck anda sudah selesai silahkan login ke website untuk download file suratnya.';
				$mail->AltBody = '';
				//$mail->AddEmbeddedImage('gambar/logo.png', 'logo'); //abaikan jika tidak ada logo
				//$mail->addAttachment(''); 

				$mail->send();
				echo 'Message has been sent';

			} catch (Exception $e) {
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
		$res = $this->m_camat->UpdateData('surat_skck', $data_update, $where);
		if ($res >= 1) {
			$notif = "Update Data Berhasil";
			$this->session->set_flashdata('update', $notif);
			redirect('camat/surat_skck');
		} else {
			echo "<h1>GAGAL</h1>";
		}
	}
	function delete_surat_skck($id = NULL)
	{

		$notif = "Delete Data Berhasil";
		$this->session->set_flashdata('delete', $notif);
		$this->m_camat->hapus('surat_skck', 'id_surat_skck', $id);
		redirect('camat/surat_skck');

	}

	function surat_biodek()
	{

	
		$data['dt_surat_biodek'] = $this->m_camat->camat_surat_biodek();
		$this->template->load('camat/template', 'camat/surat_biodek', $data);


	}
	function cetak_surat_biodek()
	{

	
		$data['dt_surat_biodek'] = $this->m_camat->camat_surat_biodek();
		$this->load->view('camat/cetak_surat_biodek', $data);


	}
	function print_surat_biodek($id = NULL)
	{

		$data['d'] = $this->m_camat->print_surat_biodek($id);
		$this->load->view('camat/print_surat_biodek', $data);


	}

	function tambah_surat_biodek()
	{

		$data['page'] = "tambah_surat_biodek";
		$data['dt_ktp'] = $this->m_camat->get_data('ktp');
		$data['dt_pegawai'] = $this->m_camat->get_data('pegawai');
		$this->db->set('id_surat_biodek', 'UUID()', FALSE);
		$this->form_validation->set_rules('id_ktp', 'id_ktp', 'required');



		if ($this->form_validation->run() === FALSE)
			$this->template->load('camat/template', 'camat/tambah_surat_biodek', $data);
		else {
			
			$notif = "Tambah Data Berhasil";
			$this->session->set_flashdata('success', $notif);
			$this->m_camat->set_data("surat_biodek");
			redirect('camat/surat_biodek');
		}

	}
	function update_surat_biodek($id = NULL)
	{

		$data['dt_ktp'] = $this->m_camat->get_data('ktp');
		$data['dt_pegawai'] = $this->m_camat->get_data('pegawai');
		$data['d'] = $this->m_camat->update_surat_biodek($id);
		$this->template->load('camat/template', 'camat/update_surat_biodek', $data);

	}
	function simpan_surat_biodek()
	{
		$id_surat_biodek = $this->input->post('id_surat_biodek');
		$id_ktp = $this->input->post('id_ktp');
		$no_surat = $this->input->post('no_surat');
		$tanggal_surat = $this->input->post('tanggal_surat');
		$luas_tanah = $this->input->post('luas_tanah');
		$no_tanah = $this->input->post('no_tanah');

		$tanda_tangan = $this->input->post('tanda_tangan');
		$status = $this->input->post('status');
		$query = $this->db->query("Select * from ktp join pengunjung on ktp.nik=pengunjung.nik where 
  ktp.id_ktp= '$id_ktp'");
		foreach ($query->result() as $row) {
			$email = $row->email;
		}

$localIP = getHostByName(getHostName());
		$qrcode = '';
		if ($status == 'Selesai') {
			$this->load->library('ciqrcode'); //pemanggilan library QR CODE

			$config['cacheable'] = true; //boolean, the default is true
			$config['cachedir'] = './assets/'; //string, the default is application/cache/
			$config['errorlog'] = './assets/'; //string, the default is application/logs/
			$config['imagedir'] = './assets/images/'; //direktori penyimpanan qr code
			$config['quality'] = true; //boolean, the default is true
			$config['size'] = '1024'; //interger, the default is 1024
			$config['black'] = array(224, 255, 255); // array, default is array(255,255,255)
			$config['white'] = array(70, 130, 180); // array, default is array(0,0,0)
			$this->ciqrcode->initialize($config);
			$link = "http://$localIP/sipelmas/qr/scan/$id_surat_biodek";
			$qrcode = $id_surat_biodek . '.png'; //buat name dari qr code sesuai dengan asal_pendapatan

			$params['data'] = $link; //data yang akan di jadikan QR CODE
			$params['level'] = 'H'; //H=High
			$params['size'] = 10;
			$params['savename'] = FCPATH . $config['imagedir'] . $qrcode; //simpan image QR CODE ke folder assets/images/
			$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
			$mail = new PHPMailer(true);

			try {
				//Server settings
				$mail->SMTPDebug = 2; //Enable verbose debug output
				$mail->isSMTP(); //Send using SMTP
				$mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
				$mail->SMTPAuth = true; //Enable SMTP authentication
				$mail->Username = 'mengajian.si.bjm@gmail.com'; //SMTP username
				$mail->Password = 'gmrzryemjjtxwnrw'; //SMTP password
				$mail->SMTPSecure = 'tls'; //Enable implicit TLS encryption
				$mail->Port = 587; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

				//pengirim
				$mail->setFrom('mengajian.si.bjm@gmail.com', 'SIPELMAS');
				$mail->addAddress($email); //Add a recipient

				//Content
				$mail->isHTML(true); //Set email format to HTML
				$mail->Subject = 'Pelayanan Surat | SIPELMAS';
				$mail->Body = 'Kami informasikan  permohonan surat penguasaan fisik bidang tanah (Biodek) anda sudah selesai silahkan login ke website untuk download file suratnya.';
				$mail->AltBody = '';
				//$mail->AddEmbeddedImage('gambar/logo.png', 'logo'); //abaikan jika tidak ada logo
				//$mail->addAttachment(''); 

				$mail->send();
				echo 'Message has been sent';

			} catch (Exception $e) {
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
		$res = $this->m_camat->UpdateData('surat_biodek', $data_update, $where);
		if ($res >= 1) {
			$notif = "Update Data Berhasil";
			$this->session->set_flashdata('update', $notif);
			redirect('camat/surat_biodek');
		} else {
			echo "<h1>GAGAL</h1>";
		}
	}
	function delete_surat_biodek($id = NULL)
	{

		$notif = "Delete Data Berhasil";
		$this->session->set_flashdata('delete', $notif);
		$this->m_camat->hapus('surat_biodek', 'id_surat_biodek', $id);
		redirect('camat/surat_biodek');

	}
	function surat_kehilangan()
	{

		$data['dt_surat_kehilangan'] = $this->m_camat->camat_surat_kehilangan();
		$this->template->load('camat/template', 'camat/surat_kehilangan', $data);

	}
	function print_surat_kehilangan($id = NULL)
	{

		$data['d'] = $this->m_camat->print_surat_kehilangan($id);
		$this->load->view('camat/print_surat_kehilangan', $data);


	}
	function cetak_surat_kehilangan()
	{


		$data['dt_surat_kehilangan'] = $this->m_camat->camat_surat_kehilangan();
		$this->load->view('camat/cetak_surat_kehilangan', $data);


	}

	function tambah_surat_kehilangan()
	{

		$data['page'] = "tambah_surat_kehilangan";
		$data['dt_ktp'] = $this->m_camat->get_data('ktp');
		$data['dt_pegawai'] = $this->m_camat->get_data('pegawai');
		$this->db->set('id_surat_kehilangan', 'UUID()', FALSE);
		$this->form_validation->set_rules('id_ktp', 'id_ktp', 'required');
		$this->form_validation->set_rules('no_surat', 'no_surat');
		$this->form_validation->set_rules('kehilangan', 'kehilangan');
		$this->form_validation->set_rules('tgl_kehilangan', 'tgl_kehilangan');
		$this->form_validation->set_rules('tempat', 'tempat');
		$this->form_validation->set_rules('tanggal_surat', 'tanggal_surat');
		$this->form_validation->set_rules('tanda_tangan', 'tanda_tangan');

		if ($this->form_validation->run() === FALSE)
			$this->template->load('camat/template', 'camat/tambah_surat_kehilangan', $data);
		else {

			$notif = "Tambah Data Berhasil";
			$this->session->set_flashdata('success', $notif);
			$this->m_camat->set_data("surat_kehilangan");
			redirect('camat/surat_kehilangan');
		}

	}
	function update_surat_kehilangan($id = NULL)
	{

		$data['dt_ktp'] = $this->m_camat->get_data('ktp');
		$data['dt_pegawai'] = $this->m_camat->get_data('pegawai');
		$data['d'] = $this->m_camat->update_surat_kehilangan($id);
		$this->template->load('camat/template', 'camat/update_surat_kehilangan', $data);

	}
	function simpan_surat_kehilangan()
	{
		$id_surat_kehilangan = $this->input->post('id_surat_kehilangan');
		$id_ktp = $this->input->post('id_ktp');
		$no_surat = $this->input->post('no_surat');
		$kehilangan = $this->input->post('kehilangan');
		$tgl_kehilangan = $this->input->post('tgl_kehilangan');
		$tempat = $this->input->post('tempat');
		$tanggal_surat = $this->input->post('tanggal_surat');
		$tanda_tangan = $this->input->post('tanda_tangan');
		$status = $this->input->post('status');
		$query = $this->db->query("Select * from ktp join pengunjung on ktp.nik=pengunjung.nik where 
  ktp.id_ktp= '$id_ktp'");
		foreach ($query->result() as $row) {
			$email = $row->email;
		}

$localIP = getHostByName(getHostName());
		$qrcode = '';
		if ($status == 'Selesai') {
			$this->load->library('ciqrcode'); //pemanggilan library QR CODE

			$config['cacheable'] = true; //boolean, the default is true
			$config['cachedir'] = './assets/'; //string, the default is application/cache/
			$config['errorlog'] = './assets/'; //string, the default is application/logs/
			$config['imagedir'] = './assets/images/'; //direktori penyimpanan qr code
			$config['quality'] = true; //boolean, the default is true
			$config['size'] = '1024'; //interger, the default is 1024
			$config['black'] = array(224, 255, 255); // array, default is array(255,255,255)
			$config['white'] = array(70, 130, 180); // array, default is array(0,0,0)
			$this->ciqrcode->initialize($config);
			$link = "http://$localIP/sipelmas/qr/scan/$id_surat_kehilangan";
			$qrcode = $id_surat_kehilangan . '.png'; //buat name dari qr code sesuai dengan asal_pendapatan

			$params['data'] = $link; //data yang akan di jadikan QR CODE
			$params['level'] = 'H'; //H=High
			$params['size'] = 10;
			$params['savename'] = FCPATH . $config['imagedir'] . $qrcode; //simpan image QR CODE ke folder assets/images/
			$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
			$mail = new PHPMailer(true);

			try {
				//Server settings
				$mail->SMTPDebug = 2; //Enable verbose debug output
				$mail->isSMTP(); //Send using SMTP
				$mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
				$mail->SMTPAuth = true; //Enable SMTP authentication
				$mail->Username = 'mengajian.si.bjm@gmail.com'; //SMTP username
				$mail->Password = 'gmrzryemjjtxwnrw'; //SMTP password
				$mail->SMTPSecure = 'tls'; //Enable implicit TLS encryption
				$mail->Port = 587; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

				//pengirim
				$mail->setFrom('mengajian.si.bjm@gmail.com', 'SIPELMAS');
				$mail->addAddress($email); //Add a recipient

				//Content
				$mail->isHTML(true); //Set email format to HTML
				$mail->Subject = 'Pelayanan Surat | SIPELMAS';
				$mail->Body = 'Kami informasikan permohonan surat kehilangan anda sudah selesai silahkan login ke website untuk download file suratnya.';
				$mail->AltBody = '';
				//$mail->AddEmbeddedImage('gambar/logo.png', 'logo'); //abaikan jika tidak ada logo
				//$mail->addAttachment(''); 

				$mail->send();
				echo 'Message has been sent';

			} catch (Exception $e) {
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
		$res = $this->m_camat->UpdateData('surat_kehilangan', $data_update, $where);
		if ($res >= 1) {
			$notif = "Update Data Berhasil";
			$this->session->set_flashdata('update', $notif);
			redirect('camat/surat_kehilangan');
		} else {
			echo "<h1>GAGAL</h1>";
		}
	}
	function delete_surat_kehilangan($id = NULL)
	{

		$notif = "Delete Data Berhasil";
		$this->session->set_flashdata('delete', $notif);
		$this->m_camat->hapus('surat_kehilangan', 'id_surat_kehilangan', $id);
		redirect('camat/surat_kehilangan');

	}
	function surat_usaha()
	{

		$data['dt_surat_usaha'] = $this->m_camat->camat_surat_usaha();
		$this->template->load('camat/template', 'camat/surat_usaha', $data);

	}

	//--------------------------------------------------------------------------------------
	function surat_pengadilan()
	{

		$data['page'] = 'surat_pengadilan';
		$data['dt_surat_pengadilan'] = $this->m_camat->camat_surat_pengadilan();
		$this->tampilkan($data);


	}

	function tambah_surat_pengadilan()
	{

		$data['page'] = "tambah_surat_pengadilan";
		$data['dt_ktp'] = $this->m_camat->get_data('ktp');
		$data['dt_pegawai'] = $this->m_camat->get_data('pegawai');
		$this->db->set('id_surat_pengadilan', 'UUID()', FALSE);
		$this->form_validation->set_rules('id_ktp', 'id_ktp', 'required');
		$this->form_validation->set_rules('no_surat', 'no_surat');
		$this->form_validation->set_rules('pedidikan', 'pendidikan');
		$this->form_validation->set_rules('tanggal_surat', 'tanggal_surat');
		$this->form_validation->set_rules('tanda_tangan', 'tanda_tangan');

		if ($this->form_validation->run() === FALSE)
			$this->tampilkan($data);
		else {
			
			$notif = "Tambah Data Berhasil";
			$this->session->set_flashdata('success', $notif);
			$this->m_camat->set_data("surat_pengadilan");
			redirect('camat/surat_pengadilan');
		}

	}
	function update_surat_pengadilan($id = NULL)
	{

		$data['dt_ktp'] = $this->m_camat->get_data('ktp');
		$data['dt_pegawai'] = $this->m_camat->get_data('pegawai');
		$data['d'] = $this->m_camat->update_surat_pengadilan($id);
		$data['page'] = 'update_surat_pengadilan';
		$this->tampilkan($data);

	}

	function simpan_surat_pengadilan()
	{
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
		$res = $this->m_camat->UpdateData('surat_pengadilan', $data_update, $where);
		if ($res >= 1) {
			$notif = "Update Data Berhasil";
			$this->session->set_flashdata('update', $notif);
			redirect('camat/surat_pengadilan');
		} else {
			echo "<h1>GAGAL</h1>";
		}
	}
	//-----------------------------------------------------------------------------------------


	function print_surat_usaha($id = NULL)
	{

		$data['d'] = $this->m_camat->print_surat_usaha($id);
		$this->load->view('camat/print_surat_usaha', $data);


	}
	function cetak_surat_usaha()
	{

		$data['page'] = 'surat_usaha';
		$data['dt_surat_usaha'] = $this->m_camat->camat_surat_usaha();
		$this->load->view('camat/cetak_surat_usaha', $data);


	}


	function tambah_surat_usaha()
	{


		$data['dt_ktp'] = $this->m_camat->get_data('ktp');
		$data['dt_pegawai'] = $this->m_camat->get_data('pegawai');
		$this->db->set('id_surat_usaha', 'UUID()', FALSE);
		$this->form_validation->set_rules('id_ktp', 'id_ktp', 'required');


		if ($this->form_validation->run() === FALSE)
			$this->template->load('camat/template', 'camat/tambah_surat_usaha', $data);
		else {

			$notif = "Tambah Data Berhasil";
			$this->session->set_flashdata('success', $notif);
			$this->m_camat->set_data("surat_usaha");
			redirect('camat/surat_usaha');
		}

	}
	function update_surat_usaha($id = NULL)
	{

		$data['dt_ktp'] = $this->m_camat->get_data('ktp');
		$data['dt_pegawai'] = $this->m_camat->get_data('pegawai');
		$data['d'] = $this->m_camat->update_surat_usaha($id);
		$this->template->load('camat/template', 'camat/update_surat_usaha', $data);

	}
	function simpan_surat_usaha()
	{
		$id_surat_usaha = $this->input->post('id_surat_usaha');
		$id_ktp = $this->input->post('id_ktp');
		$no_surat = $this->input->post('no_surat');
		$jenis_usaha = $this->input->post('jenis_usaha');
		$nama_usaha = $this->input->post('nama_usaha');
		$alamat_usaha = $this->input->post('alamat_usaha');
		$tanggal_surat = $this->input->post('tanggal_surat');
		$tanda_tangan = $this->input->post('tanda_tangan');
		$status = $this->input->post('status');
		$query = $this->db->query("Select * from ktp join pengunjung on ktp.nik=pengunjung.nik where 
  ktp.id_ktp= '$id_ktp'");
		foreach ($query->result() as $row) {
			$email = $row->email;
		}

$localIP = getHostByName(getHostName());
		$qrcode = '';
		if ($status == 'Selesai') {
			$this->load->library('ciqrcode'); //pemanggilan library QR CODE

			$config['cacheable'] = true; //boolean, the default is true
			$config['cachedir'] = './assets/'; //string, the default is application/cache/
			$config['errorlog'] = './assets/'; //string, the default is application/logs/
			$config['imagedir'] = './assets/images/'; //direktori penyimpanan qr code
			$config['quality'] = true; //boolean, the default is true
			$config['size'] = '1024'; //interger, the default is 1024
			$config['black'] = array(224, 255, 255); // array, default is array(255,255,255)
			$config['white'] = array(70, 130, 180); // array, default is array(0,0,0)
			$this->ciqrcode->initialize($config);
			$link = "http://$localIP/sipelmas/qr/scan/$id_surat_usaha";
			$qrcode = $id_surat_usaha . '.png'; //buat name dari qr code sesuai dengan asal_pendapatan

			$params['data'] = $link; //data yang akan di jadikan QR CODE
			$params['level'] = 'H'; //H=High
			$params['size'] = 10;
			$params['savename'] = FCPATH . $config['imagedir'] . $qrcode; //simpan image QR CODE ke folder assets/images/
			$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
			$mail = new PHPMailer(true);

			try {
				//Server settings
				$mail->SMTPDebug = 2; //Enable verbose debug output
				$mail->isSMTP(); //Send using SMTP
				$mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
				$mail->SMTPAuth = true; //Enable SMTP authentication
				$mail->Username = 'mengajian.si.bjm@gmail.com'; //SMTP username
				$mail->Password = 'gmrzryemjjtxwnrw'; //SMTP password
				$mail->SMTPSecure = 'tls'; //Enable implicit TLS encryption
				$mail->Port = 587; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

				//pengirim
				$mail->setFrom('mengajian.si.bjm@gmail.com', 'SIPELMAS');
				$mail->addAddress($email); //Add a recipient

				//Content
				$mail->isHTML(true); //Set email format to HTML
				$mail->Subject = 'Pelayanan Surat | SIPELMAS';
				$mail->Body = 'Kami informasikan  permohonan surat usaha anda sudah selesai silahkan login ke website untuk download file suratnya.';
				$mail->AltBody = '';
				//$mail->AddEmbeddedImage('gambar/logo.png', 'logo'); //abaikan jika tidak ada logo
				//$mail->addAttachment(''); 

				$mail->send();
				echo 'Message has been sent';

			} catch (Exception $e) {
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
		$res = $this->m_camat->UpdateData('surat_usaha', $data_update, $where);
		if ($res >= 1) {
			$notif = "Update Data Berhasil";
			$this->session->set_flashdata('update', $notif);
			redirect('camat/surat_usaha');
		} else {
			echo "<h1>GAGAL</h1>";
		}
	}
	function delete_surat_usaha($id = NULL)
	{

		$notif = "Delete Data Berhasil";
		$this->session->set_flashdata('delete', $notif);
		$this->m_camat->hapus('surat_usaha', 'id_surat_usaha', $id);
		redirect('camat/surat_usaha');

	}



	function tampilkan($data)
	{

		$data['hitung_pengaduan'] = $this->m_camat->hitung_pengaduan();
		$data['dt_pengaduan_baru'] = $this->m_camat->pengaduan_baru();
		$this->load->view('camat/header', $data);
		$this->load->view('camat/tampil', $data);
		$this->load->view('camat/footer');
	}
	function download_semua_surat()
	{

		$jenis = $this->input->post('jenis');
		$dari = $this->input->post('dari');
		$sampai = $this->input->post('sampai');
		$data['dt_surat_domisili'] = $this->m_camat->lap_surat_domisili($dari, $sampai);
		$data['dt_surat_janda'] = $this->m_camat->lap_surat_janda($dari, $sampai);
		$data['dt_surat_usaha'] = $this->m_camat->lap_surat_usaha($dari, $sampai);
		$data['dt_surat_kehilangan'] = $this->m_camat->lap_surat_kehilangan($dari, $sampai);
		$data['dt_surat_kurang_mampu'] = $this->m_camat->lap_surat_kurang_mampu($dari, $sampai);
		$data['dt_surat_kematian'] = $this->m_camat->lap_surat_kematian($dari, $sampai);
		$data['dt_surat_belum_menikah'] = $this->m_camat->lap_surat_belum_menikah($dari, $sampai);
		$data['dt_surat_pindah_datang'] = $this->m_camat->lap_surat_pindah_datang($dari, $sampai);
		$data['dt_surat_pindah_keluar'] = $this->m_camat->lap_surat_pindah_keluar($dari, $sampai);
		$data['dt_surat_izin_keramaian'] = $this->m_camat->lap_surat_izin_keramaian($dari, $sampai);
		$data['dt_surat_skck'] = $this->m_camat->lap_surat_skck($dari, $sampai);
		$data['dt_surat_biodek'] = $this->m_camat->lap_surat_biodek($dari, $sampai);
		$this->load->view('camat/download_semua_surat', $data);


	}
    function cetak_kegiatan()
    {

        $dari = $this->input->post('dari');
        $sampai = $this->input->post('sampai');
        $data['dt_kegiatan'] = $this->m_camat->cetak_kegiatan($dari, $sampai);
        $this->load->view('camat/cetak_kegiatan', $data);


    }
    function cetak_proposal()
    {

           $dari = $this->input->post('dari');
        $sampai = $this->input->post('sampai');
        $data['dt_proposal'] = $this->m_camat->cetak_proposal($dari, $sampai);
        $this->load->view('camat/cetak_proposal', $data);


    }
    function cetak_pengaduan()
    {

         $dari = $this->input->post('dari');
        $sampai = $this->input->post('sampai');
        $data['dt_pengaduan'] = $this->m_camat->cetak_pengaduan($dari, $sampai);
        $this->load->view('camat/cetak_pengaduan', $data);


    }

	function download_semua_surat_pindah()
	{

		$data['dt_surat_pindah_datang'] = $this->m_camat->camat_surat_pindah_datang();
		$data['dt_surat_pindah_keluar'] = $this->m_camat->camat_surat_pindah_keluar();
		$this->load->view('camat/download_semua_surat_pindah', $data);


	}
	function download_ktp()
	{

		$rt = $this->input->post('rt');
		$data['dt_ktp'] = $this->m_camat->download_ktp($rt);
		$this->load->view('camat/download_ktp', $data);


	}

	//-------------------------------------------------------------------------------
	function cetak_surat_pindah_datang()
	{

		$data['page'] = 'surat_pindah_datang';
		$data['dt_surat_pindah_datang'] = $this->m_camat->camat_surat_pindah_datang();
		$this->load->view('camat/cetak_surat_pindah_datang', $data);


	}

	function cetak_surat_pindah_keluar()
	{

		$data['page'] = 'surat_pindah_keluar';
		$data['dt_surat_pindah_keluar'] = $this->m_camat->camat_surat_pindah_keluar();
		$this->load->view('camat/cetak_surat_pindah_keluar', $data);


	}
	//-------------------------------------------------------------------------------------

}