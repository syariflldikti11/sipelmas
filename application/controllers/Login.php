<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_login');
    }
    function pengaduan()
    { $data = array(

                'action' => 'login/action_pengaduan',
            );
       
        $this->template->load('login/template', 'login/pengaduan',$data);
    }
     function daftar_pengaduan()
    { $data = array(

                 'dt_pengaduan' => $this->umum->get_pengaduan(),
            );
       
        $this->template->load('login/template', 'login/daftar_pengaduan',$data);
    }
     function register()
    { $data = array(

                'action' => 'login/action_register',
            );
       
        $this->template->load('login/template', 'login/register',$data);
    }
     function action_register()
    {
        $this->db->set('id_pengunjung', 'UUID()', FALSE);

        $password = $this->input->post('password');
        $nik = $this->input->post('nik');
        $email = $this->input->post('email');
        $data = array(
 
            'nik' => $nik,
            'email' => $email,
            'password' => md5($password),
        );

        $this->umum->input_data($data, 'pengunjung');
        $notif = "Register Berhasil Silahkan Login";
        $this->session->set_flashdata('success', $notif);
        redirect('login');

    }
     function action_pengaduan()
    {
        $this->db->set('id_pengaduan', 'UUID()', FALSE);
        $mengadu = $this->input->post('mengadu');
        $data = array(
            'mengadu' => $mengadu,
    
        );

        $this->umum->input_data($data, 'pengaduan');
        $notif = "Pengaduan Berhasil dikirim";
        $this->session->set_flashdata('success', $notif);
        redirect('login/pengaduan');

    }
    public function index()
    {
        $role = $this->session->userdata('role');
        if ($role == 1) {
            redirect(site_url('pengunjung'));
        }
    else {
            $data = array(

                'action' => 'login/auth_pengunjung',
            );
           $this->template->load('login/template', 'login/login_pengunjung', $data);
        }
    }
     public function auth_sipelmas()
    {
        $role = $this->session->userdata('role');
        if ($role == 3) {
            redirect(site_url('pegawai'));
        }
        if ($role == 2) {
            redirect(site_url('admin'));
        }
          if ($role == 2) {
            redirect(site_url('camat'));
        }  else {
            $data = array(

                'action' => 'login/action_auth_sipelmas',
            );
           $this->template->load('login/template', 'login/login_sipelmas', $data);
        }
    }

    public function auth_pengunjung()
    {
        $username = htmlspecialchars($this->input->post('username', TRUE), ENT_QUOTES);
        $password = htmlspecialchars($this->input->post('password', TRUE), ENT_QUOTES);
        $cek_login = $this->m_login->auth_pengunjung($username, $password);
        if ($cek_login->num_rows() > 0) {
            $data = $cek_login->row();
            if ($data->role == 1) {
                $this->session->set_userdata('role', $data->role);
                $this->session->set_userdata('nama', $data->nama_pegawai);
                $this->session->set_userdata('foto', $data->file);
                $this->session->set_userdata('id_pegawai', $data->id_pegawai);
                redirect('pengunjung');
            }
        

        } else {
            $notif = "username/Password Salah";
            $this->session->set_flashdata('delete', $notif);

            redirect('login');
        }
    }
public function action_auth_sipelmas()
    {
        $username = htmlspecialchars($this->input->post('username', TRUE), ENT_QUOTES);
        $password = htmlspecialchars($this->input->post('password', TRUE), ENT_QUOTES);
        $cek_login = $this->m_login->auth_sipelmas($username, $password);
        if ($cek_login->num_rows() > 0) {
            $data = $cek_login->row();
            if ($data->role == 2) {
                $this->session->set_userdata('role', $data->role);
                $this->session->set_userdata('username', $data->username);
                $this->session->set_userdata('nama', $data->nama_peg);
                redirect('admin');
            }
            if ($data->role == 3) {

            } else {
                $notif = "Gagal";
                $this->session->set_flashdata('delete', $notif);
                redirect('auth_sipelmas');
            }

        } else {
            $notif = "username/Password Salah";
            $this->session->set_flashdata('delete', $notif);

            redirect('auth_sipelmas');
        }
    }



    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }
    function logout_sipelmas()
    {
        $this->session->sess_destroy();
        redirect(base_url('login/auth_sipelmas'));
    }
}