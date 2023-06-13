<?php

class Admin extends CI_Controller
{

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
function update_password(){
                $id = $this->session->userdata('id_pegawai');
                $password = $this->input->post('password');
                $query=("update pengguna  set password=md5('$password') where id_pegawai='$id'  AND role=2 ");
                $this->db->query($query);
                redirect('login/logout');    
                    }

    function index()
    {
        $data = array(
            'menu' => 'Dashboard',
            'sub_menu' => '',
            'totalpegawai' => $this->m_admin->hitungpegawai(),
            'totalcuti' => $this->m_admin->hitungajuancuti(),
        );
        $this->template->load('admin/template', 'admin/home', $data);
    }
    function user()
    {
        $data = array(
            'judul' => 'Data User',
            'menu' => 'User',
            'sub_menu' => '',
            'dt_user' => $this->m_admin->get_user('user'),
            'dt_pegawai' => $this->m_admin->get_pegawai('pegawai'),
        );
       $this->template->load('admin/template', 'admin/user', $data);
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

        $this->m_umum->input_data($data, 'pengguna');
        $notif = "User Berhasil Ditambahkan";
        $this->session->set_flashdata('success', $notif);
        redirect('admin/user');

    }
    function delete_user($id)
    {

        $this->m_umum->hapus('pengguna', 'id_pengguna', $id);
        $notif = "User Berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect('admin/user');
    }
    function arsip_kepegawaian()
    {
        $data = array(
            'judul' => 'Data Arsip Kepegawaian',
            'menu' => 'Arsip Kepegawaian',
            'sub_menu' => '',
            'dt_arsip_kepegawaian' => $this->m_admin->get_arsip_kepegawaian('arsip_kepegawaian'),
            'dt_jenis_arsip' => $this->m_umum->get_data('jenis_arsip'),
        );
        $this->template->load('admin/template', 'admin/arsip_kepegawaian', $data);
    }

    function simpan_arsip_kepegawaian()
    {
        $this->db->set('id_arsip_kepegawaian', 'UUID()', FALSE);
        $id_jenis_arsip = $this->input->post('id_jenis_arsip');
        $keterangan = $this->input->post('keterangan');
        $file = $this->uploadFile();
        $data = array(
            'id_jenis_arsip' => $id_jenis_arsip,
            'keterangan' => $keterangan,
            'file' => $file
        );

        $this->m_umum->input_data($data, 'arsip_kepegawaian');
        $notif = "Arsip Kepegawaian Berhasil Ditambahkan";
        $this->session->set_flashdata('success', $notif);
        redirect('admin/arsip_kepegawaian');

    }
    function update_arsip_kepegawaian(){
        $id_arsip_kepegawaian = $this->input->post('id_arsip_kepegawaian');
        $id_jenis_arsip = $this->input->post('id_jenis_arsip');
        $keterangan = $this->input->post('keterangan');
        $old = $this->input->post('old_file');
            
            if (!empty($_FILES["file"]["name"])) {
                  $file = $this->uploadFile();
                  unlink("./upload/$old");
                } else {
                    $file = $old;
                }
            $data_update = array(
                'id_arsip_kepegawaian' => $id_arsip_kepegawaian,
                'id_jenis_arsip' => $id_jenis_arsip,
                'keterangan' => $keterangan,
                'file' => $file
                );
                $where = array('id_arsip_kepegawaian' => $id_arsip_kepegawaian);
                $res = $this->m_umum->UpdateData('arsip_kepegawaian', $data_update, $where);
                if($res>=1){
                   
                    $notif = "Update Arsip Kepegawaian Berhasil ";
                    $this->session->set_flashdata('update', $notif);
                    redirect('admin/arsip_kepegawaian');
                }else{
                    echo "<h1>GAGAL</h1>";
                }
            }
    function delete_arsip_kepegawaian($id,$file)
    {

        $this->m_umum->hapus('arsip_kepegawaian', 'id_arsip_kepegawaian', $id);
        unlink("./upload/$file");
        $notif = "Arsip Kepegawaian berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect('admin/arsip_kepegawaian');

    }

    function surat_masuk()
    {
        $data = array(
            'judul' => 'Data Surat Masuk',
            'menu' => 'Manajemen Surat',
            'sub_menu' => 'Surat Masuk',
            'dt_surat_masuk' => $this->m_umum->get_data('surat_masuk'),
        );
        $this->template->load('admin/template', 'admin/surat_masuk', $data);
    }

    function simpan_surat_masuk()
    {
        $this->db->set('id_surat_masuk', 'UUID()', FALSE);
        $no_surat = $this->input->post('no_surat');
        $perihal = $this->input->post('perihal');
        $pengirim = $this->input->post('pengirim');
        $tgl_surat = $this->input->post('tgl_surat');
        $tgl_diterima = $this->input->post('tgl_diterima');
        $file = $this->uploadFile();
        $data = array(
            'no_surat' => $no_surat,
            'perihal' => $perihal,
            'pengirim' => $pengirim,
            'tgl_surat' => $tgl_surat,
            'tgl_diterima' => $tgl_diterima,
            'file' => $file
        );

        $this->m_umum->input_data($data, 'surat_masuk');
        $notif = "Surat Masuk Berhasil Ditambahkan";
        $this->session->set_flashdata('success', $notif);
        redirect('admin/surat_masuk');

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
                  $file = $this->uploadFile();
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
                $res = $this->m_umum->UpdateData('surat_masuk', $data_update, $where);
                if($res>=1){
                   
                    $notif = "Update Surat Masuk Berhasil ";
                    $this->session->set_flashdata('update', $notif);
                    redirect('admin/surat_masuk');
                }else{
                    echo "<h1>GAGAL</h1>";
                }
            }
    function delete_surat_masuk($id,$file)
    {

        $this->m_umum->hapus('surat_masuk', 'id_surat_masuk', $id);
        unlink("./upload/$file");
        $notif = "Surat Masuk berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect('admin/surat_masuk');

    }
     function surat_keluar()
    {
        $data = array(
            'judul' => 'Data Surat Keluar',
            'menu' => 'Manajemen Surat',
            'sub_menu' => 'Surat Keluar',
            'dt_surat_keluar' => $this->m_umum->get_data('surat_keluar'),
        );
        $this->template->load('admin/template', 'admin/surat_keluar', $data);
    }

    function simpan_surat_keluar()
    {
        $this->db->set('id_surat_keluar', 'UUID()', FALSE);
        $no_surat = $this->input->post('no_surat');
        $perihal = $this->input->post('perihal');
        $tujuan = $this->input->post('tujuan');
        $tgl_surat = $this->input->post('tgl_surat');
        $tgl_kirim_surat = $this->input->post('tgl_kirim_surat');
        $file = $this->uploadFile();
        $data = array(
            'no_surat' => $no_surat,
            'perihal' => $perihal,
            'tujuan' => $tujuan,
            'tgl_surat' => $tgl_surat,
            'tgl_kirim_surat' => $tgl_kirim_surat,
            'file' => $file
        );

        $this->m_umum->input_data($data, 'surat_keluar');
        $notif = "Surat Keluar Berhasil Ditambahkan";
        $this->session->set_flashdata('success', $notif);
        redirect('admin/surat_keluar');

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
                  $file = $this->uploadFile();
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
                $res = $this->m_umum->UpdateData('surat_keluar', $data_update, $where);
                if($res>=1){
                   
                    $notif = "Update Surat Keluar Berhasil ";
                    $this->session->set_flashdata('update', $notif);
                    redirect('admin/surat_keluar');
                }else{
                    echo "<h1>GAGAL</h1>";
                }
            }
    function delete_surat_keluar($id,$file)
    {

        $this->m_umum->hapus('surat_keluar', 'id_surat_keluar', $id);
        unlink("./upload/$file");
        $notif = "Surat Keluar berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect('admin/surat_keluar');

    }
    function pegawai()
    {
        $data = array(
            'judul' => 'Data Pegawai',
            'menu' => 'Pegawai',
            'sub_menu' => '',
            'dt_pegawai' => $this->m_admin->get_pegawai('pegawai'),
            'dt_jabatan' => $this->m_umum->get_data('jabatan'),
        );
        $this->template->load('admin/template', 'admin/pegawai', $data);
    }

    function simpan_pegawai()
    {
        $this->db->set('id_pegawai', 'UUID()', FALSE);
        $gaji_pokok = $this->input->post('gaji_pokok');
        $nama_pegawai = $this->input->post('nama_pegawai');
        $nik = $this->input->post('nik');
        $kk = $this->input->post('kk');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $agama = $this->input->post('agama');
        $alamat = $this->input->post('alamat');
        $email = $this->input->post('email');
        $no_hp = $this->input->post('no_hp');
        $status_kawin = $this->input->post('status_kawin');
        $id_jabatan = $this->input->post('id_jabatan');
        $pendidikan_terakhir = $this->input->post('pendidikan_terakhir');
        $tmt = $this->input->post('tmt');
         $tahun=date("Y",strtotime($tmt));
        $file = $this->uploadFile();
        $data = array(
            'gaji_pokok' => $gaji_pokok,
            'nama_pegawai' => $nama_pegawai,
            'nik' => $nik,
            'kk' => $kk,
            'tempat_lahir' => $tempat_lahir,
            'tgl_lahir' => $tgl_lahir,
            'agama' => $agama,
            'email' => $email,
            'alamat' => $alamat,
            'no_hp' => $no_hp,
            'status_kawin' => $status_kawin,
            'id_jabatan' => $id_jabatan,
            'tahun_masuk' => $tahun,
            'pendidikan_terakhir' => $pendidikan_terakhir,
            'tmt' => $tmt,
            'file' => $file
        );

        $this->m_umum->input_data($data, 'pegawai');
        $notif = "Pegawai Berhasil Ditambahkan";
        $this->session->set_flashdata('success', $notif);
        redirect('admin/pegawai');

    }
    function update_pegawai(){
       $id_pegawai = $this->input->post('id_pegawai');
       $gaji_pokok = $this->input->post('gaji_pokok');
       $nama_pegawai = $this->input->post('nama_pegawai');
        $nik = $this->input->post('nik');
        $kk = $this->input->post('kk');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $agama = $this->input->post('agama');
        $alamat = $this->input->post('alamat');
        $email = $this->input->post('email');
        $no_hp = $this->input->post('no_hp');
        $status_kawin = $this->input->post('status_kawin');
        $id_jabatan = $this->input->post('id_jabatan');
        $pendidikan_terakhir = $this->input->post('pendidikan_terakhir');
        $tmt = $this->input->post('tmt');
        $old = $this->input->post('old_file');
            
            if (!empty($_FILES["file"]["name"])) {
                  $file = $this->uploadFile();
                  unlink("./upload/$old");
                } else {
                    $file = $old;
                }
            $data_update = array(
                'id_pegawai' => $id_pegawai,
                'gaji_pokok' => $gaji_pokok,
                'nama_pegawai' => $nama_pegawai,
            'nik' => $nik,
            'kk' => $kk,
            'tempat_lahir' => $tempat_lahir,
            'tgl_lahir' => $tgl_lahir,
            'agama' => $agama,
            'email' => $email,
            'alamat' => $alamat,
            'no_hp' => $no_hp,
            'status_kawin' => $status_kawin,
            'id_jabatan' => $id_jabatan,
            'pendidikan_terakhir' => $pendidikan_terakhir,
            'tmt' => $tmt,
            'file' => $file
                );
                $where = array('id_pegawai' => $id_pegawai);
                $res = $this->m_umum->UpdateData('pegawai', $data_update, $where);
                if($res>=1){
                   
                    $notif = "Update Pegawai Berhasil ";
                    $this->session->set_flashdata('update', $notif);
                    redirect('admin/pegawai');
                }else{
                    echo "<h1>GAGAL</h1>";
                }
            }
    function delete_pegawai($id,$file)
    {

        $this->m_umum->hapus('pegawai', 'id_pegawai', $id);
        unlink("./upload/$file");
        $notif = "Pegawai berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect('admin/pegawai');

    }
     function cuti()
    {
        $data = array(
            'judul' => 'Data Cuti Pegawai',
            'menu' => 'Cuti Pegawai',
            'sub_menu' => '',
            'dt_cuti' => $this->m_admin->get_cuti(),
            'dt_pegawai' => $this->m_umum->get_data('pegawai'),
        );
        $this->template->load('admin/template', 'admin/cuti', $data);
    }
    function simpan_cuti()
    {

        $this->db->set('id_cuti', 'UUID()', FALSE);
          $tgl_mulai_cuti = $this->input->post('tgl_mulai_cuti');
            $tgl_akhir_cuti = $this->input->post('tgl_akhir_cuti');
            $tahun=date("Y",strtotime($tgl_mulai_cuti));
            $id_pegawai = $this->input->post('id_pegawai');
             $cek_cuti = $this->m_admin->get_sisa_cuti($id_pegawai,$tahun);
            $hitung=$this->m_admin->hitung_cuti($tgl_mulai_cuti,$tgl_akhir_cuti);
            $sisa_cuti=$cek_cuti->row()->sisa_cuti;
            $hari=$hitung->row()->total_hari+1;
             $this->db->set('jumlah_hari_cuti',$hari);
             $this->db->set('tahun',$tahun);
        $this->form_validation->set_rules('id_pegawai', 'id_pegawai', 'required');
        if ($this->form_validation->run() === FALSE)
            redirect('admin/cuti');
        else {
if($hari<=$sisa_cuti) {
            $this->m_umum->set_data("cuti");
            $notif = "Tambah Cuti Pegawai Berhasil";
            $this->session->set_flashdata('success', $notif);
            redirect('admin/cuti');
        }
        else
        {
            $notif = "Cuti melebihi sisa cuti anda";
            $this->session->set_flashdata('delete', $notif);
            redirect('admin/cuti');
        }
        }
    }
    function update_cuti()
    {

        $this->form_validation->set_rules('id_cuti', 'id_cuti', 'required');
        if ($this->form_validation->run() === FALSE)
            redirect('admin/cuti');
        else {
            $this->m_umum->update_data("cuti");
            $notif = " Update Cuti Pegawai Berhasil";
            $this->session->set_flashdata('update', $notif);
            redirect('admin/cuti');
        }
    }
    function delete_cuti($id)
    {

        $this->m_umum->hapus('cuti', 'id_cuti', $id);
        $notif = "Cuti Pegawai Berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect('admin/cuti');
    }
    function hari_libur()
    {
        $data = array(
            'judul' => 'Data Hari Libur',
            'menu' => 'Data Master',
            'sub_menu' => 'Hari Libur',
            'dt_hari_libur' => $this->m_umum->get_data('hari_libur'),
        );
        $this->template->load('admin/template', 'admin/hari_libur', $data);
    }

    function simpan_hari_libur()
    {

        $this->db->set('id_hari_libur', 'UUID()', FALSE);
        $this->form_validation->set_rules('nama_hari_libur', 'nama_hari_libur', 'required');
        if ($this->form_validation->run() === FALSE)
            redirect('admin/hari_libur');
        else {

            $this->m_umum->set_data("hari_libur");
            $notif = "Tambah Hari Libur Berhasil";
            $this->session->set_flashdata('success', $notif);
            redirect('admin/hari_libur');
        }
    }
    function update_hari_libur()
    {

        $this->form_validation->set_rules('id_hari_libur', 'id_hari_libur', 'required');
        if ($this->form_validation->run() === FALSE)
            redirect('admin/hari_libur');
        else {
            $this->m_umum->update_data("hari_libur");
            $notif = " Update Hari Libur Berhasil";
            $this->session->set_flashdata('update', $notif);
            redirect('admin/hari_libur');
        }
    }
    function delete_hari_libur($id)
    {

        $this->m_umum->hapus('hari_libur', 'id_hari_libur', $id);
        $notif = "Hari Libur Berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect('admin/hari_libur');
    }


   function profil($id)
    {
        $data = array(
            'judul' => 'Profil Pegawai',
            'menu' => 'Pegawai',
            'sub_menu' => 'Profil Pegawai',
            'id' => $id,
            'd' => $this->m_admin->view_pegawai($id),
            'dt_keluarga' => $this->m_admin->view_keluarga($id),
            'dt_pendidikan' => $this->m_admin->view_pendidikan($id),
            'dt_arsip' => $this->m_admin->view_arsip($id),
            'dt_riwayat_jabatan' => $this->m_admin->view_riwayat_jabatan($id),
            'dt_riwayat_gaji' => $this->m_admin->view_riwayat_gaji($id),
            'dt_arsip' => $this->m_admin->view_arsip($id),
            'dt_jenis_arsip' => $this->m_umum->get_data('jenis_arsip'),
            'dt_jabatan' => $this->m_umum->get_data('jabatan'),
        );
        $this->template->load('admin/template', 'admin/profil', $data);
    }
    function simpan_keluarga()
    {
        $id = $this->input->post('id_pegawai');
        $this->db->set('id_keluarga', 'UUID()', FALSE);
        $this->form_validation->set_rules('nama_keluarga', 'nama_keluarga', 'required');
        if ($this->form_validation->run() === FALSE)
            redirect('admin/pegawai');
        else {

            $this->m_umum->set_data("keluarga");
            $notif = "Tambah Keluarga Berhasil";
            $this->session->set_flashdata('success', $notif);
            redirect(base_url() . "admin/profil/".$id);
        }
    }
    function update_keluarga()
    {
        $id = $this->input->post('id_pegawai');
        $this->form_validation->set_rules('id_keluarga', 'id_keluarga', 'required');
        if ($this->form_validation->run() === FALSE)
        redirect('admin/pegawai');
        else {
            $this->m_umum->update_data("keluarga");
            $notif = " Update keluarga Berhasil";
            $this->session->set_flashdata('update', $notif);
            redirect(base_url() . "admin/profil/".$id);
        }
    }
    function delete_keluarga($id,$id_pegawai)
    {

        $this->m_umum->hapus('keluarga', 'id_keluarga', $id);
        $notif = "Keluarga berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect(base_url() . "admin/profil/" . $id_pegawai);
    }
    function simpan_pendidikan()
    {
        $id = $this->input->post('id_pegawai');
        $this->db->set('id_pendidikan', 'UUID()', FALSE);
        $this->form_validation->set_rules('nama_sekolah', 'nama_sekolah', 'required');
        if ($this->form_validation->run() === FALSE)
        redirect('admin/pegawai');
        else {

            $this->m_umum->set_data("pendidikan");
            $notif = "Tambah Pendidikan Berhasil";
            $this->session->set_flashdata('success', $notif);
            redirect(base_url() . "admin/profil/".$id);
        }
    }
    function update_pendidikan()
    {
        $id = $this->input->post('id_pegawai');
        $this->form_validation->set_rules('id_pendidikan', 'id_pendidikan', 'required');
        if ($this->form_validation->run() === FALSE)
        redirect('admin/pegawai');
        else {
            $this->m_umum->update_data("pendidikan");
            $notif = " Update Pendidikan Berhasil";
            $this->session->set_flashdata('update', $notif);
            redirect(base_url() . "admin/profil/".$id);
        }
    }
    function delete_pendidikan($id,$id_pegawai)
    {

        $this->m_umum->hapus('pendidikan', 'id_pendidikan', $id);
        $notif = "Pendidikan berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect(base_url() . "admin/profil/" . $id_pegawai);
    }
    function simpan_arsip_pegawai()
    {
        $this->db->set('id_arsip_pegawai', 'UUID()', FALSE);
        $id_jenis_arsip = $this->input->post('id_jenis_arsip');
        $keterangan = $this->input->post('keterangan');
        $id_pegawai = $this->input->post('id_pegawai');
        $file = $this->uploadFile();
        $data = array(
            'id_jenis_arsip' => $id_jenis_arsip,
            'keterangan' => $keterangan,
            'id_pegawai' => $id_pegawai,
            'file' => $file
        );

        $this->m_umum->input_data($data, 'arsip_pegawai');
        $notif = "Arsip pegawai Berhasil Ditambahkan";
        $this->session->set_flashdata('success', $notif);
      redirect(base_url() . "admin/profil/".$id_pegawai);

    }
    function update_arsip_pegawai(){
        $id_arsip_pegawai = $this->input->post('id_arsip_pegawai');
        $id_pegawai = $this->input->post('id_pegawai');
        $keterangan = $this->input->post('keterangan');
        $old = $this->input->post('old_file');
            
            if (!empty($_FILES["file"]["name"])) {
                  $file = $this->uploadFile();
                  unlink("./upload/$old");
                } else {
                    $file = $old;
                }
            $data_update = array(
                'id_arsip_pegawai' => $id_arsip_pegawai,
                'id_pegawai' => $id_pegawai,
                'keterangan' => $keterangan,
                'file' => $file
                );
                $where = array('id_arsip_pegawai' => $id_arsip_pegawai);
                $res = $this->m_umum->UpdateData('arsip_pegawai', $data_update, $where);
                if($res>=1){
                   
                    $notif = "Update Arsip pegawai Berhasil ";
                    $this->session->set_flashdata('update', $notif);
                    redirect(base_url() . "admin/profil/".$id_pegawai);
                }else{
                    echo "<h1>GAGAL</h1>";
                }
            }
    function delete_arsip_pegawai($id,$file,$id_pegawai)
    {

        $this->m_umum->hapus('arsip_pegawai', 'id_arsip_pegawai', $id);
        unlink("./upload/$file");
        $notif = "Arsip pegawai berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect(base_url() . "admin/profil/".$id_pegawai);

    }
    function jabatan()
    {
        $data = array(
            'judul' => 'Data Jabatan',
            'menu' => 'Data Master',
            'sub_menu' => 'Jabatan',
            'dt_jabatan' => $this->m_umum->get_data('jabatan'),
        );
        $this->template->load('admin/template', 'admin/jabatan', $data);
    }
    function simpan_jabatan()
    {

        $this->db->set('id_jabatan', 'UUID()', FALSE);
        $this->form_validation->set_rules('nama_jabatan', 'nama_jabatan', 'required');
        if ($this->form_validation->run() === FALSE)
            redirect('admin/jabatan');
        else {

            $this->m_umum->set_data("jabatan");
            $notif = "Tambah Jabatan Berhasil";
            $this->session->set_flashdata('success', $notif);
            redirect('admin/jabatan');
        }
    }
    function update_jabatan()
    {

        $this->form_validation->set_rules('id_jabatan', 'id_jabatan', 'required');
        if ($this->form_validation->run() === FALSE)
            redirect('admin/jabatan');
        else {
            $this->m_umum->update_data("jabatan");
            $notif = " Update Jabatan Berhasil";
            $this->session->set_flashdata('update', $notif);
            redirect('admin/jabatan');
        }
    }
    function delete_jabatan($id)
    {

        $this->m_umum->hapus('jabatan', 'id_jabatan', $id);
        $notif = "Jabatan Berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect('admin/jabatan');
    }
function penugasan()
    {
        $data = array(
            'judul' => 'Data Penugasan Pegawai',
            'menu' => 'Penugasan Pegawai',
            'sub_menu' => '',
            'dt_penugasan' => $this->m_umum->get_data('penugasan'),
        );
        $this->template->load('admin/template', 'admin/penugasan', $data);
    }
    function simpan_penugasan()
    {

        $this->db->set('id_penugasan', 'UUID()', FALSE);
        $this->form_validation->set_rules('no_surat', 'no_surat', 'required');
        if ($this->form_validation->run() === FALSE)
            redirect('admin/penugasan');
        else {

            $this->m_umum->set_data("penugasan");
            $notif = "Tambah Penugasan Pegawai Berhasil";
            $this->session->set_flashdata('success', $notif);
            redirect('admin/penugasan');
        }
    }
     function update_penugasan()
    {

        $this->form_validation->set_rules('id_penugasan', 'id_penugasan', 'required');
        if ($this->form_validation->run() === FALSE)
            redirect('admin/penugasan');
        else {
            $this->m_umum->update_data("penugasan");
            $notif = " Update Penugasan Pegawai Berhasil";
            $this->session->set_flashdata('update', $notif);
            redirect('admin/penugasan');
        }
    }
    function delete_penugasan($id)
    {

        $this->m_umum->hapus('penugasan', 'id_penugasan', $id);
        $notif = "penugasan Pegawai Berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect('admin/penugasan');
    }
     function peserta_penugasan($id=false)
    {
        $data = array(
            'judul' => 'Data Peserta Penugasan',
            'menu' => 'Penugasan Pegawai',
            'sub_menu' => 'Peserta Penugasan',
            'id' => $id,
            'dt_peserta' => $this->m_admin->get_peserta($id),
        'dt_pegawai' => $this->m_admin->get_pegawai('pegawai'),
        );
        $this->template->load('admin/template', 'admin/peserta_penugasan', $data);
    }
     function simpan_peserta_penugasan()
    {

        $this->db->set('id_peserta_penugasan', 'UUID()', FALSE);
        $this->form_validation->set_rules('id_pegawai', 'id_pegawai', 'required');
        $id_penugasan = $this->input->post('id_penugasan');
        if ($this->form_validation->run() === FALSE)
      redirect(base_url() . "admin/peserta_penugasan/".$id_penugasan);
        else {

            $this->m_umum->set_data("peserta_penugasan");
            $notif = "Tambah Peserta Penugasan Berhasil";
            $this->session->set_flashdata('success', $notif);
             redirect(base_url() . "admin/peserta_penugasan/".$id_penugasan);
        }
    }

    
     function delete_peserta_penugasan($id,$id_penugasan)
    {

        $this->m_umum->hapus('peserta_penugasan', 'id_peserta_penugasan', $id);
        $notif = "Peserta Penugasan Berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
      redirect(base_url() . "admin/peserta_penugasan/".$id_penugasan);
    }
    function gaji()
    {
        $data = array(
            'judul' => 'Data Gaji Pegawai',
            'menu' => 'gaji Pegawai',
            'sub_menu' => '',
            'dt_gaji' => $this->m_admin->get_gaji(),
             'dt_pegawai' => $this->m_admin->get_pegawai('pegawai'),
        );
        $this->template->load('admin/template', 'admin/gaji', $data);
    }
    function simpan_gaji()
    {

        $this->db->set('id_gaji', 'UUID()', FALSE);
        $this->form_validation->set_rules('id_pegawai', 'id_pegawai', 'required');
        if ($this->form_validation->run() === FALSE)
            redirect('admin/gaji');
        else {

            $this->m_umum->set_data("gaji");
            $notif = "Tambah Gaji Pegawai Berhasil";
            $this->session->set_flashdata('success', $notif);
            redirect('admin/gaji');
        }
    }
    function update_gaji()
    {

        $this->form_validation->set_rules('id_gaji', 'id_gaji', 'required');
        if ($this->form_validation->run() === FALSE)
            redirect('admin/gaji');
        else {
            $this->m_umum->update_data("gaji");
            $notif = " Update Gaji Pegawai Berhasil";
            $this->session->set_flashdata('update', $notif);
            redirect('admin/gaji');
        }
    }
    function delete_gaji($id)
    {

        $this->m_umum->hapus('gaji', 'id_gaji', $id);
        $notif = "Gaji Berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect('admin/gaji');
    }
 function kinerja()
    {
        $data = array(
            'judul' => 'Data Kinerja Pegawai',
            'menu' => 'Kinerja Pegawai',
            'sub_menu' => '',
            'dt_kinerja' => $this->m_admin->get_kinerja(),
             'dt_pegawai' => $this->m_admin->get_pegawai('pegawai'),
        );
        $this->template->load('admin/template', 'admin/kinerja', $data);
    }
    function simpan_kinerja()
    {

        $this->db->set('id_kinerja', 'UUID()', FALSE);
        $this->form_validation->set_rules('id_pegawai', 'id_pegawai', 'required');
        if ($this->form_validation->run() === FALSE)
            redirect('admin/kinerja');
        else {

            $this->m_umum->set_data("kinerja");
            $notif = "Tambah Kinerja Pegawai Berhasil";
            $this->session->set_flashdata('success', $notif);
            redirect('admin/kinerja');
        }
    }
    function update_kinerja()
    {

        $this->form_validation->set_rules('id_kinerja', 'id_kinerja', 'required');
        if ($this->form_validation->run() === FALSE)
            redirect('admin/kinerja');
        else {
            $this->m_umum->update_data("kinerja");
            $notif = " Update Kinerja Pegawai Berhasil";
            $this->session->set_flashdata('update', $notif);
            redirect('admin/kinerja');
        }
    }
    function delete_kinerja($id)
    {

        $this->m_umum->hapus('kinerja', 'id_kinerja', $id);
        $notif = "Kinerja Pegawai Berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect('admin/kinerja');
    }
    function pegawai_nonaktif()
    {
        $data = array(
            'judul' => 'Data Pegawai Non Aktif',
            'menu' => 'Pegawai Non Aktif',
            'sub_menu' => '',
            'dt_pegawai_nonaktif' => $this->m_admin->get_pegawai_nonaktif(),
           'dt_pegawai' => $this->m_admin->get_pegawai('pegawai'),
        );
        $this->template->load('admin/template', 'admin/pegawai_nonaktif', $data);
    }
    function simpan_pegawai_nonaktif()
    {

        $this->db->set('id_pegawai_nonaktif', 'UUID()', FALSE);
        $tgl_nonaktif = $this->input->post('tgl_nonaktif');
        $id_pegawai = $this->input->post('id_pegawai');
        $status_nonaktif = $this->input->post('status_nonaktif');
        $file = $this->uploadFile();
        $data = array(
            'id_pegawai' => $id_pegawai,
            'status_nonaktif' => $status_nonaktif,
            'tgl_nonaktif' => $tgl_nonaktif,
            'file' => $file
        );

        $this->m_umum->input_data($data, 'pegawai_nonaktif');
        $notif = "Pegawai Non Aktif Berhasil Ditambahkan";
        $this->session->set_flashdata('success', $notif);
        redirect('admin/pegawai_nonaktif');

    }
    function update_pegawai_nonaktif()
    {

        $id_pegawai_nonaktif = $this->input->post('id_pegawai_nonaktif');
        $tgl_nonaktif = $this->input->post('tgl_nonaktif');
       
        $status_nonaktif = $this->input->post('status_nonaktif');
        $old = $this->input->post('old_file');
            
            if (!empty($_FILES["file"]["name"])) {
                  $file = $this->uploadFile();
                  unlink("./upload/$old");
                } else {
                    $file = $old;
                }
            $data_update = array(
               'id_pegawai_nonaktif' => $id_pegawai_nonaktif,
               
            'status_nonaktif' => $status_nonaktif,
            'tgl_nonaktif' => $tgl_nonaktif,
            'file' => $file
                );
                $where = array('id_pegawai_nonaktif' => $id_pegawai_nonaktif);
                $res = $this->m_umum->UpdateData('pegawai_nonaktif', $data_update, $where);
                if($res>=1){
                   
                    $notif = "Pegawai Non Aktif Pegawai Berhasil ";
                    $this->session->set_flashdata('update', $notif);
                    redirect('admin/pegawai_nonaktif');
                }else{
                    echo "<h1>GAGAL</h1>";
                }
            
    }
    function delete_pegawai_nonaktif($id,$file)
    {

        $this->m_umum->hapus('pegawai_nonaktif', 'id_pegawai_nonaktif', $id);
          unlink("./upload/$file");
        $notif = "Pegawai Non Aktif Berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect('admin/pegawai_nonaktif');
    }
     function pesangon()
    {
        $data = array(
            'judul' => 'Data Pesangon Pegawai',
            'menu' => 'Pesangon Pegawai',
            'sub_menu' => '',
            'dt_pesangon' => $this->m_admin->get_pesangon(),
           'dt_pegawai' => $this->m_admin->get_pegawai_nonaktif(),
        );
        $this->template->load('admin/template', 'admin/pesangon', $data);
    }
    function simpan_pesangon()
    {

        $this->db->set('id_pesangon', 'UUID()', FALSE);
        $tgl_pesangon = $this->input->post('tgl_pesangon');
        $id_pegawai = $this->input->post('id_pegawai');
        $file = $this->uploadFile();
        $data = array(
            'id_pegawai' => $id_pegawai,
            'tgl_pesangon' => $tgl_pesangon,
            'file' => $file
        );

        $this->m_umum->input_data($data, 'pesangon');
        $notif = "Pesangon Pegawai Berhasil Ditambahkan";
        $this->session->set_flashdata('success', $notif);
        redirect('admin/pesangon');

    }
    function update_pesangon()
    {

        $id_pesangon = $this->input->post('id_pesangon');
        $tgl_pesangon = $this->input->post('tgl_pesangon');

        $old = $this->input->post('old_file');
            
            if (!empty($_FILES["file"]["name"])) {
                  $file = $this->uploadFile();
                  unlink("./upload/$old");
                } else {
                    $file = $old;
                }
            $data_update = array(
               'id_pesangon' => $id_pesangon,
            'tgl_pesangon' => $tgl_pesangon,
            'file' => $file
                );
                $where = array('id_pesangon' => $id_pesangon);
                $res = $this->m_umum->UpdateData('pesangon', $data_update, $where);
                if($res>=1){
                   
                    $notif = "Pesangon Pegawai Pegawai Berhasil ";
                    $this->session->set_flashdata('update', $notif);
                    redirect('admin/pesangon');
                }else{
                    echo "<h1>GAGAL</h1>";
                }
            
    }
    function delete_pesangon($id,$file)
    {

        $this->m_umum->hapus('pesangon', 'id_pesangon', $id);
          unlink("./upload/$file");
        $notif = "Pesangon Pegawai Berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect('admin/pesangon');
    }
     function simpan_riwayat_jabatan()
    {
        $id = $this->input->post('id_pegawai');
        $this->db->set('id_riwayat_jabatan', 'UUID()', FALSE);
        $this->form_validation->set_rules('id_pegawai', 'id_pegawai', 'required');
        if ($this->form_validation->run() === FALSE)
                 redirect(base_url() . "admin/profil/".$id);
        else {

            $this->m_umum->set_data("riwayat_jabatan");
            $notif = "Tambah Riwayat Jabatan Berhasil";
            $this->session->set_flashdata('success', $notif);
            redirect(base_url() . "admin/profil/".$id);
        }
    }
    function update_riwayat_jabatan()
    {
        $id = $this->input->post('id_pegawai');
        $this->form_validation->set_rules('id_riwayat_jabatan', 'id_riwayat_jabatan', 'required');
        if ($this->form_validation->run() === FALSE)
             redirect(base_url() . "admin/profil/".$id);
        else {
            $this->m_umum->update_data("riwayat_jabatan");
            $notif = " Update Riwayat Jabatan Berhasil";
            $this->session->set_flashdata('update', $notif);
            redirect(base_url() . "admin/profil/".$id);
        }
    }
    function delete_riwayat_jabatan($id,$id_pegawai)
    {

        $this->m_umum->hapus('riwayat_jabatan', 'id_riwayat_jabatan', $id);
        $notif = "Riwayat Jabatan berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect(base_url() . "admin/profil/" . $id_pegawai);
    }

     function simpan_riwayat_gaji()
    {
        $id = $this->input->post('id_pegawai');
        $this->db->set('id_riwayat_gaji', 'UUID()', FALSE);
        $this->form_validation->set_rules('id_pegawai', 'id_pegawai', 'required');
        if ($this->form_validation->run() === FALSE)
                 redirect(base_url() . "admin/profil/".$id);
        else {

            $this->m_umum->set_data("riwayat_gaji");
            $notif = "Tambah Riwayat Gaji Berhasil";
            $this->session->set_flashdata('success', $notif);
            redirect(base_url() . "admin/profil/".$id);
        }
    }
    function update_riwayat_gaji()
    {
        $id = $this->input->post('id_pegawai');
        $this->form_validation->set_rules('id_riwayat_gaji', 'id_riwayat_gaji', 'required');
        if ($this->form_validation->run() === FALSE)
             redirect(base_url() . "admin/profil/".$id);
        else {
            $this->m_umum->update_data("riwayat_gaji");
            $notif = " Update Riwayat Gaji Berhasil";
            $this->session->set_flashdata('update', $notif);
            redirect(base_url() . "admin/profil/".$id);
        }
    }
    function delete_riwayat_gaji($id,$id_pegawai)
    {

        $this->m_umum->hapus('riwayat_gaji', 'id_riwayat_gaji', $id);
        $notif = "Riwayat Gaji berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect(base_url() . "admin/profil/" . $id_pegawai);
    }


 function rewardpunishment()
    {
        $data = array(
            'judul' => 'Data Reward & Punishment Pegawai',
            'menu' => 'Reward & Punishment',
            'sub_menu' => '',
            'dt_rewardpunishment' => $this->m_admin->get_rewardpunishment(),
            'dt_pegawai' => $this->m_umum->get_data('pegawai'),
        );
        $this->template->load('admin/template', 'admin/rewardpunishment', $data);
    }
    function simpan_rewardpunishment()
    {

        $this->db->set('id_rewardpunishment', 'UUID()', FALSE);
        $tgl_rewardpunishment = $this->input->post('tgl_rewardpunishment');
        $id_pegawai = $this->input->post('id_pegawai');
        $jenis = $this->input->post('jenis');
        $nama_rewardpunishment = $this->input->post('nama_rewardpunishment');
        $file = $this->uploadFile();
        $data = array(
            'id_pegawai' => $id_pegawai,
            'jenis' => $jenis,
            'tgl_rewardpunishment' => $tgl_rewardpunishment,
            'nama_rewardpunishment' => $nama_rewardpunishment,
            'file' => $file
        );

        $this->m_umum->input_data($data, 'rewardpunishment');
        $notif = "Reward & Punishment Berhasil Ditambahkan";
        $this->session->set_flashdata('success', $notif);
        redirect('admin/rewardpunishment');

    }
    function update_rewardpunishment()
    {

        $tgl_rewardpunishment = $this->input->post('tgl_rewardpunishment');
        $id_pegawai = $this->input->post('id_pegawai');
        $id_rewardpunishment = $this->input->post('id_rewardpunishment');
        $jenis = $this->input->post('jenis');
        $nama_rewardpunishment = $this->input->post('nama_rewardpunishment');
        $old = $this->input->post('old_file');
            
            if (!empty($_FILES["file"]["name"])) {
                  $file = $this->uploadFile();
                  unlink("./upload/$old");
                } else {
                    $file = $old;
                }
            $data_update = array(
               'id_rewardpunishment' => $id_rewardpunishment,
               'id_pegawai' => $id_pegawai,
            'jenis' => $jenis,
            'tgl_rewardpunishment' => $tgl_rewardpunishment,
            'nama_rewardpunishment' => $nama_rewardpunishment,
            'file' => $file
                );
                $where = array('id_rewardpunishment' => $id_rewardpunishment);
                $res = $this->m_umum->UpdateData('rewardpunishment', $data_update, $where);
                if($res>=1){
                   
                    $notif = "Update Reward & Punishment Pegawai Berhasil ";
                    $this->session->set_flashdata('update', $notif);
                    redirect('admin/rewardpunishment');
                }else{
                    echo "<h1>GAGAL</h1>";
                }
            
    }
    function delete_rewardpunishment($id,$file)
    {

        $this->m_umum->hapus('rewardpunishment', 'id_rewardpunishment', $id);
          unlink("./upload/$file");
        $notif = "Reward & Punishment Pegawai Berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect('admin/rewardpunishment');
    }

    function aktivitas_pegawai($id=false)
    {
        $data = array(
            'judul' => 'Data Aktivitas Pegawai',
            'menu' => 'Kinerja Pegawai',
            'sub_menu' => 'Aktivitas Pegawai',
            'id' => $id,
            'dt_aktivitas' => $this->m_admin->get_aktivitas($id),
        );
        $this->template->load('admin/template', 'admin/aktivitas_pegawai', $data);
    }
     function simpan_aktivitas_pegawai()
    {

        $this->db->set('id_aktivitas_pegawai', 'UUID()', FALSE);
        $this->form_validation->set_rules('aktivitas', 'aktivitas', 'required');
        $id_kinerja = $this->input->post('id_kinerja');
        if ($this->form_validation->run() === FALSE)
      redirect(base_url() . "admin/aktivitas_pegawai/".$id_kinerja);
        else {

            $this->m_umum->set_data("aktivitas_pegawai");
            $notif = "Tambah Aktivitas Pegawai Berhasil";
            $this->session->set_flashdata('success', $notif);
             redirect(base_url() . "admin/aktivitas_pegawai/".$id_kinerja);
        }
    }

    
function update_aktivitas_pegawai()
    {

        $this->form_validation->set_rules('id_aktivitas_pegawai', 'id_aktivitas_pegawai', 'required');
         $id_kinerja = $this->input->post('id_kinerja');
        if ($this->form_validation->run() === FALSE)
      redirect(base_url() . "admin/aktivitas_pegawai/".$id_kinerja);
        else {
            $this->m_umum->update_data("aktivitas_pegawai");
            $notif = "Update Aktivitas Pegawai Berhasil";
            $this->session->set_flashdata('update', $notif);
             redirect(base_url() . "admin/aktivitas_pegawai/".$id_kinerja);
        }
    }
     function delete_aktivitas_pegawai($id,$id_kinerja)
    {

        $this->m_umum->hapus('aktivitas_pegawai', 'id_aktivitas_pegawai', $id);
        $notif = "Aktivitas Pegawai Berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
      redirect(base_url() . "admin/aktivitas_pegawai/".$id_kinerja);
    }
    function bagian()
    {
        $data = array(
            'judul' => 'Data Bagian',
            'menu' => 'Data Master',
            'sub_menu' => 'Bagian',
            'dt_bagian' => $this->m_umum->get_data('bagian'),
        );
        $this->template->load('admin/template', 'admin/bagian', $data);
    }

    function simpan_bagian()
    {

        $this->db->set('id_bagian', 'UUID()', FALSE);
        $this->form_validation->set_rules('nama_bagian', 'nama_bagian', 'required');
        if ($this->form_validation->run() === FALSE)
            redirect('admin/bagian');
        else {

            $this->m_umum->set_data("bagian");
            $notif = "Tambah Bagian Berhasil";
            $this->session->set_flashdata('success', $notif);
            redirect('admin/bagian');
        }
    }
    function update_bagian()
    {

        $this->form_validation->set_rules('id_bagian', 'id_bagian', 'required');
        if ($this->form_validation->run() === FALSE)
            redirect('admin/bagian');
        else {
            $this->m_umum->update_data("bagian");
            $notif = " Update Bagian Berhasil";
            $this->session->set_flashdata('update', $notif);
            redirect('admin/bagian');
        }
    }
    function delete_bagian($id)
    {

        $this->m_umum->hapus('bagian', 'id_bagian', $id);
        $notif = "Bagian Berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect('admin/bagian');
    }
 function bonus()
    {
        $data = array(
            'judul' => 'Data Bonus Pegawai',
            'menu' => 'Data Master',
            'sub_menu' => 'bonus',
            'dt_bonus' => $this->m_admin->get_bonus(),
            'dt_pegawai' => $this->m_admin->get_pegawai(),
        );
        $this->template->load('admin/template', 'admin/bonus', $data);
    }

    function simpan_bonus()
    {

        $this->db->set('id_bonus', 'UUID()', FALSE);
        $this->form_validation->set_rules('nama_bonus', 'nama_bonus', 'required');
        if ($this->form_validation->run() === FALSE)
            redirect('admin/bonus');
        else {

            $this->m_umum->set_data("bonus");
            $notif = "Tambah Bonus Pegawai Berhasil";
            $this->session->set_flashdata('success', $notif);
            redirect('admin/bonus');
        }
    }
    function update_bonus()
    {

        $this->form_validation->set_rules('id_bonus', 'id_bonus', 'required');
        if ($this->form_validation->run() === FALSE)
            redirect('admin/bonus');
        else {
            $this->m_umum->update_data("bonus");
            $notif = " Update Bonus Pegawai Berhasil";
            $this->session->set_flashdata('update', $notif);
            redirect('admin/bonus');
        }
    }
    function delete_bonus($id)
    {

        $this->m_umum->hapus('bonus', 'id_bonus', $id);
        $notif = "Bonus Pegawai Berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect('admin/bonus');
    }


    function jenis_arsip()
    {
        $data = array(
            'judul' => 'Data Jenis Arsip',
            'menu' => 'Data Master',
            'sub_menu' => 'Jenis Arsip',
            'dt_jenis_arsip' => $this->m_umum->get_data('jenis_arsip'),
        );
        $this->template->load('admin/template', 'admin/jenis_arsip', $data);
    }
    function simpan_jenis_arsip()
    {

        $this->db->set('id_jenis_arsip', 'UUID()', FALSE);
        $this->form_validation->set_rules('nama_jenis_arsip', 'nama_jenis_arsip', 'required');
        if ($this->form_validation->run() === FALSE)
            redirect('admin/jenis_arsip');
        else {

            $this->m_umum->set_data("jenis_arsip");
            $notif = "Tambah Jenis Arsip Berhasil";
            $this->session->set_flashdata('success', $notif);
            redirect('admin/jenis_arsip');
        }
    }
    function update_jenis_arsip()
    {

        $this->form_validation->set_rules('id_jenis_arsip', 'id_jenis_arsip', 'required');
        if ($this->form_validation->run() === FALSE)
            redirect('admin/jenis_arsip');
        else {
            $this->m_umum->update_data("jenis_arsip");
            $notif = " Update Jenis Arsip Berhasil";
            $this->session->set_flashdata('update', $notif);
            redirect('admin/jenis_arsip');
        }
    }
    function delete_jenis_arsip($id)
    {

        $this->m_umum->hapus('jenis_arsip', 'id_jenis_arsip', $id);
        $notif = "Jenis Arsip Berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect('admin/jenis_arsip');
    }

    public function uploadFile()
    {
        $config['upload_path'] = 'upload';
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



}