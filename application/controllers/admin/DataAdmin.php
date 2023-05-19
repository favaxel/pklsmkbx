<?php

defined('BASEPATH') or exit('No direct script access allowed');

class DataAdmin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('dataadmin_model');
        $this->load->model('jurusan_model');
        $this->load->library('form_validation');
        $this->load->model('admin');
        if ($this->admin->is_role() != "admin") {
            redirect("login/");
        }
    }
    

    public function index()
    {
        $data['title'] = 'Data Ketua Jurusan';
        $data['data_admin'] = $this->dataadmin_model->getAll();
        // $data['jurusan']= $this->jurusan_model->get_jurusan();
        $this->load->view("admin/dataadmin/listadmin", $data);
    }
    public function tambahadmin()
    {
        $dataadmin = $this->dataadmin_model;
        $validation = $this->form_validation;
        $validation->set_rules($dataadmin->rules());

        if ($validation->run()) {
            $dataadmin->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('admin/Dataadmin');
        }
        $data['jurusan'] = $this->dataadmin_model->get_data_jurusan();
        $data['title'] = 'Tambah Data Ketua Jurusan';
        $this->load->view("admin/dataadmin/daftaradmin", $data);
    }
    public function editdataadmin($id = null)
    {

        if (!isset($id)) redirect('admin/DataAdmin');
        $dataadmin = $this->dataadmin_model;
        $validation = $this->form_validation;
        $validation->set_rules($dataadmin->rules());

        if ($validation->run()) {
            $dataadmin->update();
            $this->session->set_flashdata('success', 'Berhasil diubah');
            redirect('admin/DataAdmin');
        }
        $data['jurusan'] = $this->dataadmin_model->get_data_jurusan();
        $data['title'] = 'Ubah Data Ketua Jurusan';
        $data["dataadmin"] = $dataadmin->getById($id);
        if (!$data["dataadmin"]) show_404();
        $this->load->view("admin/dataadmin/editadmin", $data);
    }

    public function hapusdataadmin($id = null)
    {
        if (!isset($id)) show_404();
        if ($this->dataadmin_model->delete($id)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
            redirect('admin/DataAdmin');
        }
    }
}

