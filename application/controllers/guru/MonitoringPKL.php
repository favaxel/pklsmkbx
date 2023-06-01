<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MonitoringPKL extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin");
        $this->load->model("monitoring_model");
        if ($this->admin->is_role() != "guru") {
            redirect("login/");
        }
    }

    public function index()
    {
        $data['title'] = 'Monitoring Kegiatan Siswa ';
        $data["jurnal_pkl"] = $this->monitoring_model->getAll();
        $this->load->view("guru/monitoring_v", $data);
    }
}