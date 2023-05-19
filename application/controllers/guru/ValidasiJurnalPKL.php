<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ValidasiJurnalPKL extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin");
        $this->load->model("validasijurnalpkl_model");
        if ($this->admin->is_role() != "guru") {
            redirect("login/");
        }
    }

    public function index()
    {
        $data['title'] = 'Validasi Jurnal PKL';
        $data["jurnal_pkl"] = $this->validasijurnalpkl_model->getAll();
        $this->load->view("guru/validasijurnalpkl", $data);
    }
}