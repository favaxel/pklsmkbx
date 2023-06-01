<?php

defined('BASEPATH') or exit('No direct script access allowed');

class AkunGuru extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("akun_model");
        $this->load->model('admin');
        $this->load->library('form_validation');
        if ($this->admin->is_role() != "admin") {
            redirect("login/");
        }
    }

    public function index()
    {
        $data['title'] = 'Akun Guru';
        $data['pengguna'] = $this->akun_model->getGuru();
        $data['data_dudi'] = $this->akun_model->getAkun();
        $this->load->view("admin/akunguru/listakun", $data);
    }

    public function tambahakun()
    {
        $tambahakun = $this->akun_model;
        $validation = $this->form_validation;
        $validation->set_rules($tambahakun->rules());

        if ($validation->run()) {
            $tambahakun->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('admin/AkunGuru');
        }
        $data['title'] = 'Tambah Akun Pengguna';
        $this->load->view("admin/akunguru/daftarakun", $data);
    }
    public function editdataakun($id = null)
    {

        if (!isset($id)) redirect('admin/AkunGuru');
        $dataakun = $this->akun_model;
        $validation = $this->form_validation;
        $validation->set_rules($dataakun->rules());

        if ($validation->run()) {
            $dataakun->update();
            $this->session->set_flashdata('success', 'Berhasil diubah');
            redirect('admin/AkunGuru');
        }
        $data['title'] = 'Ubah Data Akun';
        $data["dataakun"] = $dataakun->getById($id);
        if (!$data["dataakun"]) show_404();
        $this->load->view("admin/akunguru/editakun", $data);
    }

    public function hapusdataakun($id = null)
    {
        if (!isset($id)) show_404();
        if ($this->akun_model->delete($id)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
            redirect('admin/AkunGuru');
        }
    }
}
