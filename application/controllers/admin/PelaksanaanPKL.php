<?php

defined('BASEPATH') or exit('No direct script access allowed');

class PelaksanaanPKL extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("pelaksanaanpkl_model");
        $this->load->library('form_validation');
        $this->load->model('admin');
        if ($this->admin->is_role() != "admin") {
            redirect("login/");
        }
    }

    public function index()
    {
        $data['title'] = 'Pelaksanaan PKL';
        $data['pelaksanaanpkl'] = $this->pelaksanaanpkl_model->getAll();
        $this->load->view("admin/pelaksanaanpkl/listpelaksanaanpkl", $data);
    }
    // public function detailpelaksanaanpkl()
    // {
    //     if (!isset($id)) redirect('admin/PelaksanaanPKL');
    //     $pelaksanaanpkl = $this->pelaksanaanpkl_model;
    //     $validation = $this->form_validation;
    //     $validation->set_rules($pelaksanaanpkl->rules());

    //     if ($validation->run()) {
    //         $pelaksanaanpkl->update();
    //         $this->session->set_flashdata('success', 'Berhasil diubah');
    //         redirect('admin/PelaksanaanPKL');
    //     }
    //     $data['title'] = 'Kelompok Pelaksanaan PKL';
    //     $data["pelaksanaanpkl"] = $pelaksanaanpkl->getDetail($id);
    //     $data['data_guru'] = $this->pelaksanaanpkl_model->get_data_guru();
    //     // if (!$data["pelaksanaanpkl"]) show_404();
    //     $this->load->view("admin/pelaksanaanpkl/editpelaksanaanpkl", $data);
    // }

    public function editpelaksanaanpkl($id = null)
    {

        // if (!isset($id)) redirect('admin/PelaksanaanPKL');
        //  $pelaksanaanpkl = $this->pelaksanaanpkl_model;
        // $validation = $this->form_validation;
        // $validation->set_rules($pelaksanaanpkl->rules());

        // if ($validation->run()) {
        //     $pelaksanaanpkl->update();
        //     $this->session->set_flashdata('success', 'Berhasil diubah');
        //     redirect('admin/PelaksanaanPKL');
        // }
        $data['title'] = 'Kelompok Pelaksanaan PKL';
        $data["pelaksanaanpkl"] = $this->pelaksanaanpkl_model->getDetail($id);
        $data['data_guru'] = $this->pelaksanaanpkl_model->get_data_guru();
        if (!$data["pelaksanaanpkl"]) show_404();
        $this->load->view("admin/pelaksanaanpkl/editpelaksanaanpkl", $data);
    }
    public function cetak_pengajuan_pkl($id = null)
    {
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [215, 330]]);
        $mpdf->AddPageByArray([
            'margin-left' => 30,
            'margin-right' => 20,
            'margin-top' => 16,
            'margin-bottom' => 25,
        ]);
        // $mpdf->AddPageByArray([
        //     'margin-left' => '30mm',
        //     'margin-right' => '20mm',
        //     'margin-top' => '16mm',
        //     'margin-bottom' => '25mm',
        // ]);
        $data_pengajuanpkl = $this->pelaksanaanpkl_model->getDetail($id);
        $data = $this->load->view('pdf/mpdf', ['pelaksanaanpkl'=> $data_pengajuanpkl], TRUE);
        $mpdf->WriteHTML($data);
        $mpdf->Output();
    }
}
