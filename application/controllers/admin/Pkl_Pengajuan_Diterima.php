<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pkl_Pengajuan_Diterima extends CI_Controller
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
        $data['title'] = 'Pengajuan PKL Diterima';
        $data['pelaksanaanpkl'] = $this->pengajuanpkl_model->getJumlahProsesDiterimaPKL();
        // $data['data_guru'] = $this->pengajuanpkl_model->get_data_guru();
        $this->load->view("admin/pengajuanpkl_diterima/listpengajuan", $data);
    }

    public function listkelompokpkl($id = null)
    {
        $data['title'] = 'Anggota Kelompok PKL';
        if (!isset($id)) redirect('admin/pengajuanpkl_diterima');
        $pengajuanpkl = $this->pengajuanpkl_model;
        $validation = $this->form_validation;
        $validation->set_rules($pengajuanpkl->rules());

        if ($validation->run()) {
            $pengajuanpkl->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('admin/Pkl_Proses_Diterima');
        }

        $data["pelaksanaanpkl"] = $this->pengajuanpkl_model->getProsesDiterimaPKL($id);
        $data['data_guru'] = $this->pengajuanpkl_model->get_data_guru();
        $this->load->view("admin/pengajuanpkl_diterima/listkelompokpkl", $data);
    }

    public function editpengajuanpkl($id = null)
    {
        $data['title'] = 'Ubah Pengajuan PKL';
        if (!isset($id)) redirect('admin/pengajuanpkl_diproses');
        $pengajuanpkl = $this->pengajuanpkl_model;
        $validation = $this->form_validation;
        $validation->set_rules($pengajuanpkl->rules());

        if ($validation->run()) {
            $pengajuanpkl->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            // redirect(base_url('admin/HistoryPelaksanaanPKL/listkelompokpkl/' . $pelaksanaanpkl->id_dudi));
            // redirect(base_url('admin/HistoryPelaksanaanPKL'));
            // redirect('admin/HistoryPelaksanaanPKL/editpengajuanpkl/');
            // redirect()->base_url('admin/HistoryPelaksanaanPKL/editpelaksanaanpkl/' . $pelaksanaanpkl->id_dudi);
            // return redirect(base_url('admin/HistoryPelaksanaanPKL/editpelaksanaanpkl/' . $pelaksanaanpkl->id_dudi));
            // redirect()->to( base_url('admin/HistoryPelaksanaanPKL/editpelaksanaanpkl/' . $pelaksanaanpkl->id_dudi ) );
            // redirect('admin/HistoryPelaksanaanPKL/editpelaksanaanpkl/' . $pelaksanaanpkl->id_dudi);
        }

        $data['data_guru'] = $this->pengajuanpkl_model->get_data_guru();
        $data["pelaksanaanpkl"] = $pengajuanpkl->getById($id);
        if (!$data["pelaksanaanpkl"]) show_404();
        $this->load->view("admin/pengajuanpkl_diterima/editpengajuanpkl", $data);
    }
}
