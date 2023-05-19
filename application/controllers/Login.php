<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('admin');
    }

    public function index()
    {
        if ($this->session->userdata("role") == "admin") {
            redirect('admin/beranda/');
        }
        if ($this->session->userdata("role") == "pembimbing_dudi") {
            redirect('pembimbingdudi/beranda');
        }
        if ($this->session->userdata("role") == "siswa") {
            redirect('siswa/beranda/');
        }
        if ($this->session->userdata("role") == "guru") {
            redirect('siswa/beranda/');
        } else {

            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_message('required', '<div class="alert alert-danger" style="margin-top: 3px">
                    <div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> harus diisi</div></div>');

            if ($this->form_validation->run() == TRUE) {

                $username = $this->input->post("username", TRUE);
                $password = $this->input->post('password', TRUE);
                $checking = $this->admin->check_login('pengguna', array('username' => $username), array('password' => $password));
                if ($checking != FALSE) {
                    foreach ($checking as $dt) {
                        $session_data = array(
                            'id' => $dt->id,
                            'id_admin'   => $dt->id_admin,
                            'id_siswa'   => $dt->id_siswa,
                            'id_dudi' => $dt->id_dudi,
                            'id_guru' => $dt->id_guru,
                            'id_jurusan' => $dt->id_jurusan,
                            'username' => $dt->username,
                            'nama_admin' => $dt->nama_admin,
                            'nama_siswa' => $dt->nama_siswa,
                            'nama_staf_tu' => $dt->nama_staf_tu,
                            'nama_dudi' => $dt->nama_dudi,
                            'nama_guru' => $dt->nama_guru,
                            'password' => $dt->password,
                            'role' => $dt->role
                        );
                        $this->session->set_userdata($session_data);
                        if ($this->session->userdata("role") === "siswa") {
                            redirect('siswa/Beranda/');
                        } elseif ($this->session->userdata("role") === "pembimbing_dudi") {
                            redirect('pembimbingdudi/Beranda/');
                        } elseif ($this->session->userdata("role") === "admin") {
                            redirect('admin/Beranda/');
                        } else {
                            redirect('guru/Beranda/');
                        }
                    }
                } else {
                    $data['error'] = '<div class="alert alert-danger" style="margin-top: 3px">
                        <div class="header"><b><i class="fa fa-exclamation-circle"></i> Peringatan</b> nama pengguna atau kata sandi salah!</div></div>';
                    $this->load->view('login', $data);
                }
            } else {
                $this->load->view('login');
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }
}
