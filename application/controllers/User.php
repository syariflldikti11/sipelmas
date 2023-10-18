<?php

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->database();
        $role = $this->session->userdata('role');

        if ($role <> 1) {
            $url = base_url();
            redirect($url);
        }
    }
function print_surat_kematian($id = NULL)
    {

        $data['d'] = $this->umum->print_surat_kematian($id);
        $this->load->view('user/print_surat_kematian', $data);


    }
    
    function print_surat_belum_menikah($id = NULL)
    {

        $data['d'] = $this->umum->print_surat_belum_menikah($id);
        $this->load->view('user/print_surat_belum_menikah', $data);


    }
    function print_surat_kurang_mampu($id = NULL)
    {

        $data['d'] = $this->umum->print_surat_kurang_mampu($id);
        $this->load->view('user/print_surat_kurang_mampu', $data);


    }
    function print_surat_domisili($id = NULL)
    {
        $data['d'] = $this->umum->print_surat_domisili($id);
        $this->load->view('user/print_surat_domisili', $data);

    }
    function print_surat_janda($id = NULL)
    {

        $data['d'] = $this->umum->print_surat_janda($id);
        $this->load->view('user/print_surat_janda', $data);


    }
    function print_surat_izin_keramaian($id = NULL)
    {

        $data['d'] = $this->umum->print_surat_izin_keramaian($id);
        $this->load->view('user/print_surat_izin_keramaian', $data);


    }
    function print_surat_skck($id = NULL)
    {

        $data['d'] = $this->umum->print_surat_skck($id);
        $this->load->view('user/print_surat_skck', $data);


    }
    function print_surat_biodek($id = NULL)
    {

        $data['d'] = $this->umum->print_surat_biodek($id);
        $this->load->view('user/print_surat_biodek', $data);


    }
    function print_surat_kehilangan($id = NULL)
    {

        $data['d'] = $this->umum->print_surat_kehilangan($id);
        $this->load->view('user/print_surat_kehilangan', $data);


    }
    function print_surat_usaha($id = NULL)
    {

        $data['d'] = $this->umum->print_surat_usaha($id);
        $this->load->view('user/print_surat_usaha', $data);


    }
    function index()
    {

        $data['judul'] = 'home';
        $data['dt_pengaduan'] = $this->umum->pengaduan_masyarakat();
        $data['dt_informasi'] = $this->umum->get_data('informasi');
        $this->template->load('user/template', 'user/home', $data);


    }
    function update_password(){
                $id = $this->session->userdata('ses_id');
                $password = $this->input->post('password');
                $query=("update pengunjung  set password=md5('$password') where nik='$id' ");
                $this->db->query($query);
                   $notif = "Ganti Password Berhasil, Silahkan Login Kembali";
            $this->session->set_flashdata('success', $notif);
                redirect('login/logout');    
                    }



    function tambah_ktp()
    {

        $data['judul'] = 'tambah_ktp';
        $this->template->load('user/template', 'user/tambah_ktp', $data);


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
        $this->umum->input_data($data, 'ktp');
        redirect('user/ktp');
    }
function tambah_buat_ktp()
    {

        $data['judul'] = 'tambah_buat_ktp';
        $this->template->load('user/template', 'user/tambah_buat_ktp', $data);


    }
    function simpan_buat_ktp()
    {
        $this->db->set('id_buat_ktp', 'UUID()', FALSE);
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
        $kk = $this->uploadKK();
        $foto = $this->uploadFoto();
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
            'kk' => $kk,
            'foto' => $foto
        
        );
        $notif = "Tambah Data Berhasil";
            $this->session->set_flashdata('success', $notif);
        $this->umum->input_data($data, 'pelayanan_ktp');
        redirect('user/buat_ktp');
    }
   public function uploadKK()
    {
        $config['upload_path'] = 'upload/file';
        $config['allowed_types'] = 'pdf|jpg|jpeg|png';
        $config['overwrite'] = false;
        $config['max_size'] = 5000; // 1MB


        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('kk')) {
            return $this->upload->data("file_name");
        }
        $error = $this->upload->display_errors();
        echo $error;
        exit;
        // return "default.jpg";
    }
     public function uploadFoto()
    {
        $config['upload_path'] = 'upload/file';
        $config['allowed_types'] = 'pdf|jpg|jpeg|png';
        $config['overwrite'] = false;
        $config['max_size'] = 5000; // 1MB


        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('foto')) {
            return $this->upload->data("file_name");
        }
        $error = $this->upload->display_errors();
        echo $error;
        exit;
        // return "default.jpg";
    }
    public function uploadKTP()
    {
        $config['upload_path'] = 'upload/file';
        $config['allowed_types'] = 'pdf|jpg|jpeg|png';
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
     function edit_buat_ktp($id = NULL)
    {

        $data['judul'] = "edit_buat_ktp";
        $data['d'] = $this->umum->update_buat_ktp($id);
        $this->template->load('user/template', 'user/update_buat_ktp', $data);

    }
    function update_buat_ktp()
    {
        $id_buat_ktp = $this->input->post('id_buat_ktp');
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
        $snikah = $this->input->post('snikah');
        $pekerjaan = $this->input->post('pekerjaan');
   

        if (!empty($_FILES["kk"]["name"])) {
            $kk = $this->uploadKK();
        } else {
            $kk = $this->input->post('old_image');
        }
         if (!empty($_FILES["foto"]["name"])) {
            $foto = $this->uploadFoto();
        } else {
            $foto = $this->input->post('old_foto');
        }
        $data_update = array(
            'id_buat_ktp' => $id_buat_ktp,
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
            'foto' => $foto,
            'kk' => $kk
        );
        $where = array('id_buat_ktp' => $id_buat_ktp);
        $res = $this->umum->UpdateData('pelayanan_ktp', $data_update, $where);
        if ($res >= 1) {
            $notif = "Update Data Berhasil";
            $this->session->set_flashdata('update', $notif);
            redirect('user/buat_ktp');
        } else {
            echo "<h1>GAGAL</h1>";
        }
    }
    function edit_ktp($id = NULL)
    {

        $data['judul'] = "edit_ktp";
        $data['d'] = $this->umum->update_ktp($id);
        $this->template->load('user/template', 'user/update_ktp', $data);

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
        $res = $this->umum->UpdateData('ktp', $data_update, $where);
        if ($res >= 1) {
            $notif = "Update Data Berhasil";
            $this->session->set_flashdata('update', $notif);
            redirect('user/ktp');
        } else {
            echo "<h1>GAGAL</h1>";
        }
    }

    function informasi()
    {

        $data['judul'] = 'informasi';
        $data['dt_informasi'] = $this->umum->get_data('informasi');
        $this->template->load('user/template', 'user/informasi', $data);


    }
    function ktp()
    {

        $data['judul'] = 'ktp';
        $data['dt_ktp'] = $this->umum->ambil_ktp('ktp');
        $this->template->load('user/template', 'user/ktp', $data);


    }
      function buat_ktp()
    {

        $data['judul'] = 'buat_ktp';
        $data['dt_ktp'] = $this->umum->get_data('pelayanan_ktp');
        $this->template->load('user/template', 'user/buat_ktp', $data);


    }
    function pengaduan_masyarakat()
    {

        $data['judul'] = 'pengaduan_masyarakat';
        $data['dt_pengaduan'] = $this->umum->admin_pengaduan();
        $this->template->load('user/template', 'user/pengaduan_masyarakat', $data);


    }
    function pengaduan()
    {

        $data['judul'] = 'pengaduan';
        $data['dt_pengaduan'] = $this->umum->pengaduan();
        $this->template->load('user/template', 'user/pengaduan', $data);


    }
    function tambah_pengaduan()
    {

        $data['judul'] = "tambah_pengaduan";
        $data['dt_ktp'] = $this->umum->get_ktp();
        $this->db->set('id_pengaduan', 'UUID()', FALSE);
        $this->form_validation->set_rules('id_ktp', 'id_ktp', 'required');
        $this->form_validation->set_rules('mengadu', 'mengadu');

        $this->form_validation->set_rules('peng_telpon', 'peng_telpon');

        if ($this->form_validation->run() === FALSE)
            $this->template->load('user/template', 'user/tambah_pengaduan', $data);
        else {
            $notif = "Tambah Data Berhasil";
            $this->session->set_flashdata('success', $notif);
            $this->umum->set_data("pengaduan");
            redirect('user/pengaduan');
        }

    }
    function update_pengaduan($id = NULL)
    {

        $data['d'] = $this->umum->update_pengaduan($id);
        $data['judul'] = 'update_pengaduan';
        $this->form_validation->set_rules('id_pengaduan', 'id_pengaduan', 'required');
        $this->form_validation->set_rules('mengadu', 'mengadu', 'required');
        $this->form_validation->set_rules('peng_telpon', 'peng_telpon', 'required');

        if ($this->form_validation->run() === FALSE)
            $this->template->load('user/template', 'user/update_pengaduan', $data);
        else {
            $notif = "Update Data Berhasil";
            $this->session->set_flashdata('update', $notif);
            $this->umum->update_data("pengaduan");
            redirect('user/pengaduan');
        }

    }
    function delete_pengaduan($id = NULL)
    {

        $notif = "Delete Data Berhasil";
        $this->session->set_flashdata('delete', $notif);
        $this->umum->hapus('pengaduan', 'id_pengaduan', $id);
        redirect('user/pengaduan');

    }

    function proposal()
    {

        $data['judul'] = 'proposal';
        $data['dt_proposal'] = $this->umum->proposal();
        $this->template->load('user/template', 'user/proposal', $data);


    }
    function tambah_proposal()
    {

        $data['dt_ktp'] = $this->umum->get_ktp();
        $data['judul'] = 'tambah_proposal';
        $this->template->load('user/template', 'user/tambah_proposal', $data);


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
        $this->umum->input_data($data, 'proposal');
        redirect('user/proposal');
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

        $data['judul'] = "edit_proposal";
        $data['dt_ktp'] = $this->umum->get_ktp();
        $data['d'] = $this->umum->update_proposal($id);
        $this->template->load('user/template', 'user/update_proposal', $data);

    }
    function update_proposal()
    {
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
        if ($res >= 1) {
            $notif = "Update Data Berhasil";
            $this->session->set_flashdata('update', $notif);
            redirect('user/proposal');
        } else {
            echo "<h1>GAGAL</h1>";
        }
    }

    function delete_proposal($id = NULL)
    {

        $notif = "Delete Data Berhasil";
        $this->session->set_flashdata('delete', $notif);
        $this->umum->hapus('proposal', 'id_proposal', $id);
        redirect('user/proposal');

    }
    function surat_kematian()
    {

        $data['judul'] = 'surat_kematian';
        $data['dt_surat_kematian'] = $this->umum->surat_kematian();
        $this->template->load('user/template', 'user/surat_kematian', $data);


    }
    function tambah_surat_kematian()
    {

        $data['judul'] = "tambah_surat_kematian";
        $data['dt_ktp'] = $this->umum->get_ktp();
        $data['dt_pegawai'] = $this->umum->get_data('pegawai');
        $this->db->set('id_surat_kematian', 'UUID()', FALSE);
        $this->form_validation->set_rules('id_ktp', 'id_ktp', 'required');

        $this->form_validation->set_rules('hari', 'hari');
        $this->form_validation->set_rules('pukul', 'pukul');
        $this->form_validation->set_rules('bertempat', 'bertempat');
        $this->form_validation->set_rules('dimakamkan', 'dimakamkan');


        if ($this->form_validation->run() === FALSE)
            $this->template->load('user/template', 'user/tambah_surat_kematian', $data);
        else {
            $notif = "Tambah Data Berhasil";
            $this->session->set_flashdata('success', $notif);
            $this->umum->set_data("surat_kematian");
            redirect('user/surat_kematian');
        }

    }
    function update_surat_kematian($id = NULL)
    {

        $data['dt_ktp'] = $this->umum->get_ktp();
        $data['dt_pegawai'] = $this->umum->get_data('pegawai');
        $data['d'] = $this->umum->update_surat_kematian($id);
        $data['judul'] = 'update_surat_kematian';
        $this->form_validation->set_rules('id_surat_kematian', 'id_surat_kematian', 'required');
        $this->form_validation->set_rules('id_ktp', 'id_ktp', 'required');
        $this->form_validation->set_rules('hari', 'hari');
        $this->form_validation->set_rules('pukul', 'pukul');
        $this->form_validation->set_rules('bertempat', 'bertempat');
        $this->form_validation->set_rules('dimakamkan', 'dimakamkan');
        if ($this->form_validation->run() === FALSE)
            $this->template->load('user/template', 'user/update_surat_kematian', $data);
        else {
            $notif = "Update Data Berhasil";
            $this->session->set_flashdata('update', $notif);
            $this->umum->update_data("surat_kematian");
            redirect('user/surat_kematian');
        }

    }
    function delete_surat_kematian($id = NULL)
    {

        $notif = "Delete Data Berhasil";
        $this->session->set_flashdata('delete', $notif);
        $this->umum->hapus('surat_kematian', 'id_surat_kematian', $id);
        redirect('user/surat_kematian');

    }
    function surat_belum_menikah()
    {

        $data['judul'] = 'surat_belum_menikah';
        $data['dt_surat_belum_menikah'] = $this->umum->surat_belum_menikah();
        $this->template->load('user/template', 'user/surat_belum_menikah', $data);


    }


    function tambah_surat_belum_menikah()
    {

        $data['judul'] = "tambah_surat_belum_menikah";
        $data['dt_ktp'] = $this->umum->get_ktp();
        $data['dt_pegawai'] = $this->umum->get_data('pegawai');
        $this->db->set('id_surat_belum_menikah', 'UUID()', FALSE);
        $this->form_validation->set_rules('id_ktp', 'id_ktp', 'required');

        $this->form_validation->set_rules('status_nikah', 'status_nikah');
        $this->form_validation->set_rules('bin', 'bin');


        if ($this->form_validation->run() === FALSE)
            $this->template->load('user/template', 'user/tambah_surat_belum_menikah', $data);
        else {
            $notif = "Tambah Data Berhasil";
            $this->session->set_flashdata('success', $notif);
            $this->umum->set_data("surat_belum_menikah");
            redirect('user/surat_belum_menikah');
        }

    }
    function update_surat_belum_menikah($id = NULL)
    {

        $data['dt_ktp'] = $this->umum->get_ktp();
        $data['dt_pegawai'] = $this->umum->get_data('pegawai');
        $data['d'] = $this->umum->update_surat_belum_menikah($id);
        $data['judul'] = 'update_surat_belum_menikah';
        $this->form_validation->set_rules('id_surat_belum_menikah', 'id_surat_belum_menikah', 'required');
        $this->form_validation->set_rules('id_ktp', 'id_ktp', 'required');
        $this->form_validation->set_rules('bin', 'bin');
        $this->form_validation->set_rules('status_nikah', 'status_nikah');
        if ($this->form_validation->run() === FALSE)
            $this->template->load('user/template', 'user/update_surat_belum_menikah', $data);
        else {
            $notif = "Update Data Berhasil";
            $this->session->set_flashdata('update', $notif);
            $this->umum->update_data("surat_belum_menikah");
            redirect('user/surat_belum_menikah');
        }

    }
    function delete_surat_belum_menikah($id = NULL)
    {

        $notif = "Delete Data Berhasil";
        $this->session->set_flashdata('delete', $notif);
        $this->umum->hapus('surat_belum_menikah', 'id_surat_belum_menikah', $id);
        redirect('user/surat_belum_menikah');

    }
    function surat_kurang_mampu()
    {

        $data['judul'] = 'surat_kurang_mampu';
        $data['dt_surat_kurang_mampu'] = $this->umum->surat_kurang_mampu();
        $this->template->load('user/template', 'user/surat_kurang_mampu', $data);


    }
    function tambah_surat_kurang_mampu()
    {

        $data['judul'] = "tambah_surat_kurang_mampu";
        $data['dt_ktp'] = $this->umum->get_ktp();
        $data['dt_pegawai'] = $this->umum->get_data('pegawai');
        $this->db->set('id_surat_kurang_mampu', 'UUID()', FALSE);
        $this->form_validation->set_rules('id_ktp', 'id_ktp', 'required');

        $this->form_validation->set_rules('peruntukan', 'peruntukan');
        $this->form_validation->set_rules('keperluan', 'keperluan');
        $this->form_validation->set_rules('penghasilan', 'penghasilan');


        if ($this->form_validation->run() === FALSE)
            $this->template->load('user/template', 'user/tambah_surat_kurang_mampu', $data);
        else {
            $notif = "Tambah Data Berhasil";
            $this->session->set_flashdata('success', $notif);
            $this->umum->set_data("surat_kurang_mampu");
            redirect('user/surat_kurang_mampu');
        }

    }
    function update_surat_kurang_mampu($id = NULL)
    {

        $data['dt_ktp'] = $this->umum->get_ktp();
        $data['dt_pegawai'] = $this->umum->get_data('pegawai');
        $data['d'] = $this->umum->update_surat_kurang_mampu($id);
        $data['judul'] = 'update_surat_kurang_mampu';
        $this->form_validation->set_rules('id_surat_kurang_mampu', 'id_surat_kurang_mampu', 'required');
        $this->form_validation->set_rules('id_ktp', 'id_ktp', 'required');

        $this->form_validation->set_rules('peruntukan', 'peruntukan');
        $this->form_validation->set_rules('keperluan', 'keperluan');
        $this->form_validation->set_rules('penghasilan', 'penghasilan');
        if ($this->form_validation->run() === FALSE)
            $this->template->load('user/template', 'user/update_surat_kurang_mampu', $data);
        else {
            $notif = "Update Data Berhasil";
            $this->session->set_flashdata('update', $notif);
            $this->umum->update_data("surat_kurang_mampu");
            redirect('user/surat_kurang_mampu');
        }

    }
    function delete_surat_kurang_mampu($id = NULL)
    {

        $notif = "Delete Data Berhasil";
        $this->session->set_flashdata('delete', $notif);
        $this->umum->hapus('surat_kurang_mampu', 'id_surat_kurang_mampu', $id);
        redirect('user/surat_kurang_mampu');

    }
    function surat_domisili()
    {

        $data['judul'] = 'surat_domisili';
        $data['dt_surat_domisili'] = $this->umum->surat_domisili();
        $this->template->load('user/template', 'user/surat_domisili', $data);


    }
    function tambah_surat_domisili()
    {

        $data['judul'] = "tambah_surat_domisili";
        $data['dt_ktp'] = $this->umum->get_ktp();
        $data['dt_pegawai'] = $this->umum->get_data('pegawai');
        $this->db->set('id_surat_domisili', 'UUID()', FALSE);
        $this->form_validation->set_rules('id_ktp', 'id_ktp', 'required');

        $this->form_validation->set_rules('alamat_domisili', 'tambah_surat_domisili', 'required');


        if ($this->form_validation->run() === FALSE)
            $this->template->load('user/template', 'user/tambah_surat_domisili', $data);
        else {
            $notif = "Tambah Data Berhasil";
            $this->session->set_flashdata('success', $notif);
            $this->umum->set_data("surat_domisili");
            redirect('user/surat_domisili');
        }

    }
    function update_surat_domisili($id = NULL)
    {

        $data['dt_ktp'] = $this->umum->get_ktp();
        $data['dt_pegawai'] = $this->umum->get_data('pegawai');
        $data['d'] = $this->umum->update_surat_domisili($id);
        $data['judul'] = 'update_surat_domisili';
        $this->form_validation->set_rules('id_surat_domisili', 'id_surat_domisili', 'required');
        $this->form_validation->set_rules('id_ktp', 'id_ktp', 'required');
        $this->form_validation->set_rules('alamat_domisili', 'alamat_domisili', 'required');
        if ($this->form_validation->run() === FALSE)
            $this->template->load('user/template', 'user/update_surat_domisili', $data);
        else {
            $notif = "Update Data Berhasil";
            $this->session->set_flashdata('update', $notif);
            $this->umum->update_data("surat_domisili");
            redirect('user/surat_domisili');
        }

    }
    function delete_surat_domisili($id = NULL)
    {

        $notif = "Delete Data Berhasil";
        $this->session->set_flashdata('delete', $notif);
        $this->umum->hapus('surat_domisili', 'id_surat_domisili', $id);
        redirect('user/surat_domisili');

    }
    function surat_janda()
    {

        $data['judul'] = 'surat_janda';
        $data['dt_surat_janda'] = $this->umum->surat_janda();
        $this->template->load('user/template', 'user/surat_janda', $data);


    }
    function tambah_surat_janda()
    {

        $data['judul'] = "tambah_surat_janda";
        $data['dt_ktp'] = $this->umum->get_ktp();
        $data['dt_pegawai'] = $this->umum->get_data('pegawai');
        $this->db->set('id_surat_janda', 'UUID()', FALSE);
        $this->form_validation->set_rules('id_ktp', 'id_ktp', 'required');



        if ($this->form_validation->run() === FALSE)
            $this->template->load('user/template', 'user/tambah_surat_janda', $data);
        else {
            $notif = "Tambah Data Berhasil";
            $this->session->set_flashdata('success', $notif);
            $this->umum->set_data("surat_janda");
            redirect('user/surat_janda');
        }

    }
    function update_surat_janda($id = NULL)
    {

        $data['dt_ktp'] = $this->umum->get_ktp();
        $data['dt_pegawai'] = $this->umum->get_data('pegawai');
        $data['d'] = $this->umum->update_surat_janda($id);
        $data['judul'] = 'update_surat_janda';
        $this->form_validation->set_rules('id_surat_janda', 'id_surat_janda', 'required');

        if ($this->form_validation->run() === FALSE)
            $this->template->load('user/template', 'user/update_surat_janda', $data);
        else {
            $notif = "Update Data Berhasil";
            $this->session->set_flashdata('update', $notif);
            $this->umum->update_data("surat_janda");
            redirect('user/surat_janda');
        }

    }
    function delete_surat_janda($id = NULL)
    {

        $notif = "Delete Data Berhasil";
        $this->session->set_flashdata('delete', $notif);
        $this->umum->hapus('surat_janda', 'id_surat_janda', $id);
        redirect('user/surat_janda');

    }
    function surat_kehilangan()
    {

        $data['judul'] = 'surat_kehilangan';
        $data['dt_surat_kehilangan'] = $this->umum->surat_kehilangan();
        $this->template->load('user/template', 'user/surat_kehilangan', $data);


    }
    function tambah_surat_kehilangan()
    {

        $data['judul'] = "tambah_surat_kehilangan";
        $data['dt_ktp'] = $this->umum->get_ktp();
        $data['dt_pegawai'] = $this->umum->get_data('pegawai');
        $this->db->set('id_surat_kehilangan', 'UUID()', FALSE);
        $this->form_validation->set_rules('id_ktp', 'id_ktp', 'required');

        $this->form_validation->set_rules('kehilangan', 'kehilangan');
        $this->form_validation->set_rules('tgl_kehilangan', 'tgl_kehilangan');
        $this->form_validation->set_rules('tempat', 'tempat');


        if ($this->form_validation->run() === FALSE)
            $this->template->load('user/template', 'user/tambah_surat_kehilangan', $data);
        else {
            $notif = "Tambah Data Berhasil";
            $this->session->set_flashdata('success', $notif);
            $this->umum->set_data("surat_kehilangan");
            redirect('user/surat_kehilangan');
        }

    }
    function update_surat_kehilangan($id = NULL)
    {

        $data['dt_ktp'] = $this->umum->get_ktp();
        $data['dt_pegawai'] = $this->umum->get_data('pegawai');
        $data['d'] = $this->umum->update_surat_kehilangan($id);
        $data['judul'] = 'update_surat_kehilangan';
        $this->form_validation->set_rules('id_surat_kehilangan', 'id_surat_kehilangan', 'required');
        $this->form_validation->set_rules('id_ktp', 'id_ktp', 'required');

        $this->form_validation->set_rules('kehilangan', 'kehilangan');
        $this->form_validation->set_rules('tgl_kehilangan', 'tgl_kehilangan');
        $this->form_validation->set_rules('tempat', 'tempat');
        if ($this->form_validation->run() === FALSE)
            $this->template->load('user/template', 'user/update_surat_kehilangan', $data);
        else {
            $notif = "Update Data Berhasil";
            $this->session->set_flashdata('update', $notif);
            $this->umum->update_data("surat_kehilangan");
            redirect('user/surat_kehilangan');
        }

    }
    function delete_surat_kehilangan($id = NULL)
    {

        $notif = "Delete Data Berhasil";
        $this->session->set_flashdata('delete', $notif);
        $this->umum->hapus('surat_kehilangan', 'id_surat_kehilangan', $id);
        redirect('user/surat_kehilangan');

    }
    function surat_usaha()
    {

        $data['judul'] = 'surat_usaha';
        $data['dt_surat_usaha'] = $this->umum->surat_usaha();
        $this->template->load('user/template', 'user/surat_usaha', $data);


    }

    function tambah_surat_usaha()
    {

        $data['judul'] = "tambah_surat_usaha";
        $data['dt_ktp'] = $this->umum->get_ktp();
        $data['dt_pegawai'] = $this->umum->get_data('pegawai');
        $this->db->set('id_surat_usaha', 'UUID()', FALSE);
        $this->form_validation->set_rules('id_ktp', 'id_ktp', 'required');




        if ($this->form_validation->run() === FALSE)
            $this->template->load('user/template', 'user/tambah_surat_usaha', $data);
        else {
            $notif = "Tambah Data Berhasil";
            $this->session->set_flashdata('success', $notif);
            $this->umum->set_data("surat_usaha");
            redirect('user/surat_usaha');
        }

    }
    function update_surat_usaha($id = NULL)
    {

        $data['dt_ktp'] = $this->umum->get_ktp();
        $data['dt_pegawai'] = $this->umum->get_data('pegawai');
        $data['d'] = $this->umum->update_surat_usaha($id);
        $data['judul'] = 'update_surat_usaha';
        $this->form_validation->set_rules('id_surat_usaha', 'id_surat_usaha', 'required');
        $this->form_validation->set_rules('id_ktp', 'id_ktp', 'required');
        $this->form_validation->set_rules('usaha', 'usaha', 'required');
        if ($this->form_validation->run() === FALSE)
            $this->template->load('user/template', 'user/update_surat_usaha', $data);
        else {
            $notif = "Update Data Berhasil";
            $this->session->set_flashdata('update', $notif);
            $this->umum->update_data("surat_usaha");
            redirect('user/surat_usaha');
        }

    }
    function delete_surat_usaha($id = NULL)
    {

        $notif = "Delete Data Berhasil";
        $this->session->set_flashdata('delete', $notif);
        $this->umum->hapus('surat_usaha', 'id_surat_usaha', $id);
        redirect('user/surat_usaha');

    }



    function surat_pindah_datang()
    {

        $data['judul'] = 'surat_pindah_datang';
        $data['dt_surat_pindah_datang'] = $this->umum->surat_pindah_datang();
        $this->template->load('user/template', 'user/surat_pindah_datang', $data);


    }
    function tambah_surat_pindah_datang()
    {

        $data['judul'] = "tambah_surat_pindah_datang";
        $data['dt_ktp'] = $this->umum->get_ktp();
        $data['dt_pegawai'] = $this->umum->get_data('pegawai');
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
            $this->template->load('user/template', 'user/tambah_surat_pindah_datang', $data);
        else {
            $notif = "Tambah Data Berhasil";
            $this->session->set_flashdata('success', $notif);
            $this->umum->set_data("surat_pindah_datang");
            redirect('user/surat_pindah_datang');
        }

    }
    function update_surat_pindah_datang($id = NULL)
    {

        $data['judul'] = "update_surat_pindah_datang";
        $data['dt_ktp'] = $this->umum->get_ktp();

        $data['dt_pegawai'] = $this->umum->get_data('pegawai');
        $data['d'] = $this->umum->update_surat_pindah_datang($id);

        $this->template->load('user/template', 'user/update_surat_pindah_datang', $data);

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
        if ($res >= 1) {
            $notif = "Update Data Berhasil";
            $this->session->set_flashdata('update', $notif);
            redirect('user/surat_pindah_datang');
        } else {
            echo "<h1>GAGAL</h1>";
        }
    }
    function print_surat_pindah_datang($id = NULL)
    {

        $data['d'] = $this->umum->print_surat_pindah_datang($id);
        $this->load->view('user/print_surat_pindah_datang', $data);


    }
    function delete_surat_pindah_datang($id = NULL)
    {

        $notif = "Delete Data Berhasil";
        $this->session->set_flashdata('delete', $notif);
        $this->umum->hapus('surat_pindah_datang', 'id_surat_pindah_datang', $id);
        redirect('user/surat_pindah_datang');

    }
    function surat_pindah_keluar()
    {

        $data['judul'] = 'surat_pindah_keluar';
        $data['dt_surat_pindah_keluar'] = $this->umum->surat_pindah_keluar();
        $this->template->load('user/template', 'user/surat_pindah_keluar', $data);


    }
    function tambah_surat_pindah_keluar()
    {

        $data['judul'] = "tambah_surat_pindah_keluar";
        $data['dt_ktp'] = $this->umum->get_ktp();
        $data['dt_kk'] = $this->umum->get_data('kk');
        $data['dt_pegawai'] = $this->umum->get_data('pegawai');
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
            $this->template->load('user/template', 'user/tambah_surat_pindah_keluar', $data);
        else {
            $notif = "Tambah Data Berhasil";
            $this->session->set_flashdata('success', $notif);
            $this->umum->set_data("surat_pindah_keluar");
            redirect('user/surat_pindah_keluar');
        }

    }
    function update_surat_pindah_keluar($id = NULL)
    {

        $data['judul'] = "update_surat_pindah_keluar";
        $data['dt_ktp'] = $this->umum->get_ktp();
        $data['dt_kk'] = $this->umum->get_data('kk');
        $data['dt_pegawai'] = $this->umum->get_data('pegawai');
        $data['d'] = $this->umum->update_surat_pindah_keluar($id);

        $this->template->load('user/template', 'user/update_surat_pindah_keluar', $data);

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
        if ($res >= 1) {
            $notif = "Update Data Berhasil";
            $this->session->set_flashdata('update', $notif);
            redirect('user/surat_pindah_keluar');
        } else {
            echo "<h1>GAGAL</h1>";
        }
    }
    function print_surat_pindah_keluar($id = NULL)
    {

        $data['d'] = $this->umum->print_surat_pindah_keluar($id);
        $this->load->view('user/print_surat_pindah_keluar', $data);


    }
    function delete_surat_pindah_keluar($id = NULL)
    {

        $notif = "Delete Data Berhasil";
        $this->session->set_flashdata('delete', $notif);
        $this->umum->hapus('surat_pindah_keluar', 'id_surat_pindah_keluar', $id);
        redirect('user/surat_pindah_keluar');

    }



  
    function surat_skck()
    {

        $data['judul'] = 'surat_skck';
        $data['dt_surat_skck'] = $this->umum->surat_skck();
        $this->template->load('user/template', 'user/surat_skck', $data);


    }
    function tambah_surat_skck()
    {

        $data['judul'] = "tambah_surat_skck";
        $data['dt_ktp'] = $this->umum->get_ktp();
        $data['dt_pegawai'] = $this->umum->get_data('pegawai');
        $this->db->set('id_surat_skck', 'UUID()', FALSE);
        $this->form_validation->set_rules('id_ktp', 'id_ktp', 'required');



        if ($this->form_validation->run() === FALSE)
            $this->template->load('user/template', 'user/tambah_surat_skck', $data);
        else {
            $notif = "Tambah Data Berhasil";
            $this->session->set_flashdata('success', $notif);
            $this->umum->set_data("surat_skck");
            redirect('user/surat_skck');
        }

    }
    function update_surat_skck($id = NULL)
    {

        $data['dt_ktp'] = $this->umum->get_ktp();
        $data['dt_pegawai'] = $this->umum->get_data('pegawai');
        $data['d'] = $this->umum->update_surat_skck($id);
        $data['judul'] = 'update_surat_skck';
        $this->form_validation->set_rules('id_surat_skck', 'id_surat_skck', 'required');

        if ($this->form_validation->run() === FALSE)
            $this->template->load('user/template', 'user/update_surat_skck', $data);
        else {
            $notif = "Update Data Berhasil";
            $this->session->set_flashdata('update', $notif);
            $this->umum->update_data("surat_skck");
            redirect('user/surat_skck');
        }

    }
    function delete_surat_skck($id = NULL)
    {

        $notif = "Delete Data Berhasil";
        $this->session->set_flashdata('delete', $notif);
        $this->umum->hapus('surat_skck', 'id_surat_skck', $id);
        redirect('user/surat_skck');

    }
    function surat_biodek()
    {

        $data['judul'] = 'surat_biodek';
        $data['dt_surat_biodek'] = $this->umum->surat_biodek();
        $this->template->load('user/template', 'user/surat_biodek', $data);


    }
    function tambah_surat_biodek()
    {

        $data['judul'] = "tambah_surat_biodek";
        $data['dt_ktp'] = $this->umum->get_ktp();
        $data['dt_pegawai'] = $this->umum->get_data('pegawai');
        $this->db->set('id_surat_biodek', 'UUID()', FALSE);
        $this->form_validation->set_rules('id_ktp', 'id_ktp', 'required');



        if ($this->form_validation->run() === FALSE)
            $this->template->load('user/template', 'user/tambah_surat_biodek', $data);
        else {
            $notif = "Tambah Data Berhasil";
            $this->session->set_flashdata('success', $notif);
            $this->umum->set_data("surat_biodek");
            redirect('user/surat_biodek');
        }

    }
    function update_surat_biodek($id = NULL)
    {

        $data['dt_ktp'] = $this->umum->get_ktp();
        $data['dt_pegawai'] = $this->umum->get_data('pegawai');
        $data['d'] = $this->umum->update_surat_biodek($id);
        $data['judul'] = 'update_surat_biodek';
        $this->form_validation->set_rules('id_surat_biodek', 'id_surat_biodek', 'required');

        if ($this->form_validation->run() === FALSE)
            $this->template->load('user/template', 'user/update_surat_biodek', $data);
        else {
            $notif = "Update Data Berhasil";
            $this->session->set_flashdata('update', $notif);
            $this->umum->update_data("surat_biodek");
            redirect('user/surat_biodek');
        }

    }
    function delete_surat_biodek($id = NULL)
    {

        $notif = "Delete Data Berhasil";
        $this->session->set_flashdata('delete', $notif);
        $this->umum->hapus('surat_biodek', 'id_surat_biodek', $id);
        redirect('user/surat_biodek');

    }
    function surat_izin_keramaian()
    {

        $data['judul'] = 'surat_izin_keramaian';
        $data['dt_surat_izin_keramaian'] = $this->umum->surat_izin_keramaian();
        $this->template->load('user/template', 'user/surat_izin_keramaian', $data);


    }
    function tambah_surat_izin_keramaian()
    {

        $data['judul'] = "tambah_surat_izin_keramaian";
        $data['dt_ktp'] = $this->umum->get_ktp();
        $data['dt_pegawai'] = $this->umum->get_data('pegawai');
        $this->db->set('id_surat_izin_keramaian', 'UUID()', FALSE);
        $this->form_validation->set_rules('id_ktp', 'id_ktp', 'required');



        if ($this->form_validation->run() === FALSE)
            $this->template->load('user/template', 'user/tambah_surat_izin_keramaian', $data);
        else {
            $notif = "Tambah Data Berhasil";
            $this->session->set_flashdata('success', $notif);
            $this->umum->set_data("surat_izin_keramaian");
            redirect('user/surat_izin_keramaian');
        }

    }
    function update_surat_izin_keramaian($id = NULL)
    {

        $data['dt_ktp'] = $this->umum->get_ktp();
        $data['dt_pegawai'] = $this->umum->get_data('pegawai');
        $data['d'] = $this->umum->update_surat_izin_keramaian($id);
        $data['judul'] = 'update_surat_izin_keramaian';
        $this->form_validation->set_rules('id_surat_izin_keramaian', 'id_surat_izin_keramaian', 'required');

        if ($this->form_validation->run() === FALSE)
            $this->template->load('user/template', 'user/update_surat_izin_keramaian', $data);
        else {
            $notif = "Update Data Berhasil";
            $this->session->set_flashdata('update', $notif);
            $this->umum->update_data("surat_izin_keramaian");
            redirect('user/surat_izin_keramaian');
        }

    }
    function delete_surat_izin_keramaian($id = NULL)
    {

        $notif = "Delete Data Berhasil";
        $this->session->set_flashdata('delete', $notif);
        $this->umum->hapus('surat_izin_keramaian', 'id_surat_izin_keramaian', $id);
        redirect('user/surat_izin_keramaian');

    }
}