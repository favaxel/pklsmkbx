<?php

defined('BASEPATH') or exit('No direct script access allowed');

class AkunSiswa extends CI_Controller
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
        $data['title'] = 'Akun Pengguna';
        $data['pengguna'] = $this->akun_model->getSiswa();
        $data['data_dudi'] = $this->akun_model->getAkun();
        $this->load->view("admin/akunsiswa/listakun", $data);
    }

    public function tambahakun()
    {
        $tambahakun = $this->akun_model;
        $validation = $this->form_validation;
        $validation->set_rules($tambahakun->rules());

        if ($validation->run()) {
            $tambahakun->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('admin/AkunSiswa');
        }
        $data['title'] = 'Tambah Akun Pengguna';
        $this->load->view("admin/akunsiswa/daftarakun", $data);
    }
    public function editdataakun($id = null)
    {

        if (!isset($id)) redirect('admin/Jurusan');
        $dataakun = $this->akun_model;
        $validation = $this->form_validation;
        $validation->set_rules($dataakun->rules());

        if ($validation->run()) {
            $dataakun->update();
            $this->session->set_flashdata('success', 'Berhasil diubah');
            redirect('admin/AkunSiswa');
        }
        $data['title'] = 'Ubah Data Akun';
        $data["dataakun"] = $dataakun->getById($id);
        if (!$data["dataakun"]) show_404();
        $this->load->view("admin/akunsiswa/editakun", $data);
    }

    public function hapusdataakun($id = null)
    {
        if (!isset($id)) show_404();
        if ($this->akun_model->delete($id)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
            redirect('admin/AkunSiswa');
        }
    }
    public function cetak_akun_siswa($id = null)
    {
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [215, 330]]);
        $mpdf->AddPageByArray([
            'margin-left' => 20,
            'margin-right' => 20,
            'margin-top' => 20,
            'margin-bottom' => 25,
        ]);
        $data_akun = $this->akun_model->getSiswa();
        $data = $this->load->view('pdf/cetak_akun', ['pengguna'=> $data_akun], TRUE);
        $mpdf->WriteHTML($data);
        $mpdf->Output('Akun Siswa.pdf', 'D');
    }
}
