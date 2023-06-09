<?php defined('BASEPATH') or exit('No direct Scrip access allowed');

class datadudi_model extends CI_Model
{
    private $_table = "data_dudi";

    public $id_dudi;
    public $nama_dudi;
    public $alamat_dudi;
    public $kuota;

    public function rules()
    {
        return [
            [
                'field' => 'nama_dudi',
                'label' => 'Nama DUDI',
                'rules' => 'required'
            ],

            [
                'field' => 'alamat_dudi',
                'label' => 'Alamat DUDI',
                'rules' => 'required'
            ],
            [
                'field' => 'kuota',
                'label' => 'Kuota DUDI',
                'rules' => 'required'
            ],

            [
                'field' => 'id_jurusan',
                'label' => 'Rujukan Jurusan',
                'rules' => 'required'
            ]

        ];
    }

    public function getAll()
    {
        $this->db->join('jurusan', 'jurusan.id_jurusan = data_dudi.id_jurusan');
        // $this->db->where('id_jurusan', $this->session->userdata('id_jurusan'));
        $this->db->order_by('nama_jurusan', 'ASC');
        $this->db->order_by('kuota', 'ASC');
        $query = $this->db->get($this->_table);
        return $query->result();
    }

    public function getInfoDUDI()
    {
        $this->db->where('id_jurusan', $this->session->userdata('id_jurusan'));
        $this->db->order_by('nama_dudi', 'asc');
        $query = $this->db->get($this->_table);
        return $query->result();
    }

    public function getDataDUDI()
    {
        $this->db->where('id_jurusan', $this->session->userdata('id_jurusan'));
        $this->db->order_by('nama_dudi', 'asc');
        $query = $this->db->get($this->_table);
        return $query->result();
    }

    public function getById($id_dudi)
    {
        $this->db->join('jurusan', 'jurusan.id_jurusan = data_dudi.id_jurusan');
        return $this->db->get_where($this->_table, ["id_dudi" => $id_dudi])->row();
    }
    
    function get_data_guru()
    {
        $this->db->select('*');
        $this->db->from('data_guru');
        $query = $this->db->get();
        return $query->result();
    }
    function get_data_jurusan()
    {
        $this->db->select('*');
        $this->db->from('jurusan');
        $query = $this->db->get();
        return $query->result();
    }
    public function save()
    {
        $post = $this->input->post();
        $this->nama_dudi = $post["nama_dudi"];
        $this->alamat_dudi = $post["alamat_dudi"];
        $this->kuota = $post["kuota"];
        $this->id_jurusan = $post["id_jurusan"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_dudi = $post["id_dudi"];
        $this->nama_dudi = $post["nama_dudi"];
        $this->alamat_dudi = $post["alamat_dudi"];
        $this->kuota = $post["kuota"];
        $this->id_jurusan = $post["id_jurusan"];
        return $this->db->update($this->_table, $this, array("id_dudi" => $post["id_dudi"]));
    }

    public function delete($id_dudi)
    {
        return $this->db->delete($this->_table, array("id_dudi" => $id_dudi));
    }
}
