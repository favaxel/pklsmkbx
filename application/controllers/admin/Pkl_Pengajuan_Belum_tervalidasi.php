<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pkl_Pengajuan_Belum_tervalidasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("pengajuanpkl_model");
        $this->load->library('form_validation');
        $this->load->model('admin');
        if ($this->admin->is_role() != "admin") {
            redirect("login/");
        }
    }

    public function index()
    {
        $data['title'] = 'Pengajuan PKL Belum Tervalidasi';
        $data['pengajuanpkl'] = $this->pengajuanpkl_model->getBelum();
        $data['data_guru'] = $this->pengajuanpkl_model->get_data_guru();
        $this->load->view("admin/pengajuanpkl_belum_tervalidasi/listpengajuan", $data);
    }
    
    public function editpengajuanpkl($id = null)
    {
        $data['title'] = 'Ubah Pengajuan PKL';
        if (!isset($id)) redirect('admin/pengajuanpkl');
        $pengajuanpkl = $this->pengajuanpkl_model;
        $validation = $this->form_validation;
        $validation->set_rules($pengajuanpkl->rules());

        if ($validation->run()) {
            $pengajuanpkl->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            // redirect('admin/Pkl_Pengajuan_Belum_tervalidasi');
        }

        $data['data_guru'] = $this->pengajuanpkl_model->get_data_guru();
        $data["pengajuanpkl"] = $pengajuanpkl->getById($id);
        if (!$data["pengajuanpkl"]) show_404();
        $this->load->view("admin/pengajuanpkl_belum_tervalidasi/editpengajuanpkl", $data);
    }
}
