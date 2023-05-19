<?php

defined('BASEPATH') or exit('No direct script access allowed');

class DataGuru extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("dataguru_model");
        $this->load->library('form_validation');
        $this->load->model('admin');
        if ($this->admin->is_role() != "admin") {
            redirect("login/");
        }
    }

    public function index()
    {
        $data['title'] = 'Data Guru';
        $data['data_guru'] = $this->dataguru_model->getAll();
        $this->load->view("admin/dataguru/listguru", $data);
    } 
    public function tambahguru()
    {
        $dataguru = $this->dataguru_model;
        $validation = $this->form_validation;
        $validation->set_rules($dataguru->rules());

        if ($validation->run()) {
            $dataguru->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('admin/Dataguru');
        }
        $data['jurusan'] = $this->dataguru_model->get_data_jurusan();
        $data['title'] = 'Tambah Akun Pengguna';
        $this->load->view("admin/dataguru/daftarguru", $data);
    }
    public function editdataguru($id = null)
    {

        if (!isset($id)) redirect('admin/Dataguru');
        $dataguru = $this->dataguru_model;
        $validation = $this->form_validation;
        $validation->set_rules($dataguru->rules());

        if ($validation->run()) {
            $dataguru->update();
            $this->session->set_flashdata('success', 'Berhasil diubah');
            redirect('admin/DataGuru');
        }
        $data['jurusan'] = $this->dataguru_model->get_data_jurusan();
        $data['title'] = 'Ubah Data guru';
        $data["dataguru"] = $dataguru->getById($id);
        if (!$data["dataguru"]) show_404();
        $this->load->view("admin/dataguru/editguru", $data);
    }

    public function hapusdataguru($id = null)
    {
        if (!isset($id)) show_404();
        if ($this->dataguru_model->delete($id)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
            redirect('admin/DataGuru');
        }
    }
}

