<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Jurusan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("jurusan_model");
        $this->load->library('form_validation');
        $this->load->model('admin');
        if ($this->admin->is_role() != "admin") {
            redirect("login/");
        }
    }

    public function index()
    {
        $data['title'] = 'Data Jurusan';
        $data['jurusan'] = $this->jurusan_model->getAll();
        $this->load->view("admin/datajurusan/listjurusan", $data);
    }
    public function tambahjurusan()
    {
        $datajurusan = $this->jurusan_model;
        $validation = $this->form_validation;
        $validation->set_rules($datajurusan->rules());

        if ($validation->run()) {
            $datajurusan->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('admin/Jurusan');
        }
        $data['title'] = 'Tambah Jurusan';
        $this->load->view("admin/datajurusan/daftarjurusan", $data);
    }
    
    public function editdatajurusan($id = null)
    {

        if (!isset($id)) redirect('admin/Jurusan');
        $datajurusan = $this->jurusan_model;
        $validation = $this->form_validation;
        $validation->set_rules($datajurusan->rules());

        if ($validation->run()) {
            $datajurusan->update();
            $this->session->set_flashdata('success', 'Berhasil diubah');
            redirect('admin/Jurusan');
        }
        $data['title'] = 'Ubah Data Jurusan';
        $data["datajurusan"] = $datajurusan->getById($id);
        if (!$data["datajurusan"]) show_404();
        $this->load->view("admin/datajurusan/editjurusan", $data);
    }

    public function hapusdatajurusan($id = null)
    {
        if (!isset($id)) show_404();
        if ($this->jurusan_model->delete($id)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
            redirect('admin/Jurusan');
        }
    }
}
