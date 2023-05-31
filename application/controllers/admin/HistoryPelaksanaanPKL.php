<?php

defined('BASEPATH') or exit('No direct script access allowed');

class HistoryPelaksanaanPKL extends CI_Controller
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
        $data['title'] = 'History Pelaksanaan PKL';
        $data['pelaksanaanpkl'] = $this->pengajuanpkl_model->getSelesai();
        $this->load->view("admin/historypelaksanaanpkl/listpengajuan", $data);
    }
    

    public function listkelompokpkl($id = null)
    {
        if (!isset($id)) redirect('admin/historypelaksanaanpkl');
        $pengajuanpkl = $this->pengajuanpkl_model;
        $validation = $this->form_validation;
        $validation->set_rules($pengajuanpkl->rules());

        if ($validation->run()) {
            $pengajuanpkl->update();
            $this->session->set_flashdata('success', 'Berhasil');
            redirect('admin/HistorypelaksanaanPKL');
        }
        // if (!isset($id)) redirect('admin/PelaksanaanPKL');
        //  $pelaksanaanpkl = $this->pelaksanaanpkl_model;
        // $validation = $this->form_validation;
        // $validation->set_rules($pelaksanaanpkl->rules());

        // if ($validation->run()) {
        //     $pelaksanaanpkl->update();
        //     $this->session->set_flashdata('success', 'Berhasil diubah');
        //     redirect('admin/PelaksanaanPKL');
        // }
        
        $data['title'] = 'list Siswa Selesai';
        // $data["pelaksanaanpkl"] = $pengajuanpkl->getHistory($id);
         $data["pelaksanaanpkl"] = $this->pengajuanpkl_model->getHistory($id);
        $data['data_guru'] = $this->pengajuanpkl_model->get_data_guru();
        $data["pengajuanpkl"] = $pengajuanpkl->getById($id);
        // if (!$data["pelaksanaanpkl"]) show_404();
        $this->load->view("admin/historypelaksanaanpkl/listkelompokpkl", $data);
    }
    // public function cetak_pengajuan_pkl($id = null)
    // {
    //     $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [215, 330]]);
    //     $mpdf->AddPageByArray([
    //         'margin-left' => 30,
    //         'margin-right' => 20,
    //         'margin-top' => 16,
    //         'margin-bottom' => 25,
    //     ]);
    //     $data_pengajuanpkl = $this->pelaksanaanpkl_model->getDetail($id);
    //     $data = $this->load->view('pdf/mpdf', ['pelaksanaanpkl'=> $data_pengajuanpkl], TRUE);
    //     $mpdf->WriteHTML($data);
    //     $mpdf->Output('pengajuan PKL.pdf', 'D');
    // }
    public function editpengajuanpkl($id = null)
    {
        $data['title'] = 'Ubah Pengajuan PKL';
        if (!isset($id)) redirect('admin/historypelaksanaanpkl');
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
        $this->load->view("admin/historypelaksanaanpkl/editpengajuanpkl", $data);
    }
    // public function Berhasil()
    // { 
    //     // $data['title'] = 'Kelompok Pelaksanaan PKL';
    //     // $data["pelaksanaanpkl"] = $this->pengajuanpkl_model->getHistory($id);
    //     // $data['data_guru'] = $this->pengajuanpkl_model->get_data_guru();
    //     // if (!$data["pelaksanaanpkl"]) show_404();
    //     $this->load->view("admin/historypelaksanaanpkl/berhasil");
    // }
}
