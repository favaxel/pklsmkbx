<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pkl_Proses_Pengajuan extends CI_Controller
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
        $data['title'] = 'Pengajuan PKL Proses Pengajuan';
        $data['pelaksanaanpkl'] = $this->pengajuanpkl_model->getJumlahProsesPengajuanPKL();
        // $data['data_guru'] = $this->pengajuanpkl_model->get_data_guru();
        $this->load->view("admin/pengajuanpkl_diproses/listpengajuan", $data);
    }

    public function listkelompokpkl($id = null)
    {
        $data['title'] = 'Anggota Kelompok PKL';
        if (!isset($id)) redirect('admin/pengajuanpkl_diproses');
        $pengajuanpkl = $this->pengajuanpkl_model;
        $validation = $this->form_validation;
        $validation->set_rules($pengajuanpkl->rules());

        if ($validation->run()) {
            $pengajuanpkl->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('admin/Pkl_Proses_Pengajuan');
        }

        $data["pelaksanaanpkl"] = $this->pengajuanpkl_model->getProsesPengajuanPKL($id);
        $data['data_guru'] = $this->pengajuanpkl_model->get_data_guru();
        $this->load->view("admin/pengajuanpkl_diproses/listkelompokpkl", $data);
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
            $this->session->set_flashdata('success', 'Berhasil diubah');
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
        $this->load->view("admin/pengajuanpkl_diproses/editpengajuanpkl", $data);
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
        $data_pengajuanpkl = $this->pengajuanpkl_model->getProsesPengajuanPKL($id);
        $data = $this->load->view('pdf/mpdf', ['pengajuanpkl'=> $data_pengajuanpkl], TRUE);
        $mpdf->WriteHTML($data);
        $mpdf->Output('pengajuan PKL.pdf', 'D');
    }
}
