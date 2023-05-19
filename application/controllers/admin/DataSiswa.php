<?php

defined('BASEPATH') or exit('No direct script access allowed');

class DataSiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('datasiswa_model');
        $this->load->model('jurusan_model');
        $this->load->library('form_validation');
        $this->load->model('admin');
        if ($this->admin->is_role() != "admin") {
            redirect("login/");
        }
    }

    public function index()
    {
        $data['title'] = 'Data Siswa';
        $data['data_siswa'] = $this->datasiswa_model->getAll();
        // $data['jurusan']= $this->jurusan_model->get_jurusan();
        $this->load->view("admin/datasiswa/listsiswa", $data);
    }
    public function tambahsiswa()
    {
        $datasiswa = $this->datasiswa_model;
        $validation = $this->form_validation;
        $validation->set_rules($datasiswa->rules());

        if ($validation->run()) {
            $datasiswa->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('admin/DataSiswa');
        }
        $data['jurusan'] = $this->datasiswa_model->get_data_jurusan();
        $data['title'] = 'Tambah Akun Pengguna';
        $this->load->view("admin/datasiswa/daftarsiswa", $data);
    }
    public function editdatasiswa($id = null)
    {

        if (!isset($id)) redirect('admin/DataSiswa');
        $datasiswa = $this->datasiswa_model;
        $validation = $this->form_validation;
        $validation->set_rules($datasiswa->rules());

        if ($validation->run()) {
            $datasiswa->update();
            $this->session->set_flashdata('success', 'Berhasil diubah');
            redirect('admin/DataSiswa');
        }
        $data['jurusan'] = $this->datasiswa_model->get_data_jurusan();
        $data['title'] = 'Ubah Data Siswa';
        $data["datasiswa"] = $datasiswa->getById($id);
        if (!$data["datasiswa"]) show_404();
        $this->load->view("admin/datasiswa/editsiswa", $data);
    }

    public function hapusdatasiswa($id = null)
    {
        if (!isset($id)) show_404();
        if ($this->datasiswa_model->delete($id)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
            redirect('admin/DataSiswa');
        }
    }
}

