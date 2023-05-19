<?php defined('BASEPATH') or exit('No direct Scrip access allowed');

class dataadmin_model extends CI_Model
{
    private $_table = "data_admin";
   public $id_adm;
   public $id_admin;
   public $nama_admin;
   public $id_jurusan;
   public $jenis_kelamin; 
    public function rules()
    {
        return [
            [
                'field' => 'id_admin',
                'label' => 'Id Admin',
                'rules' => 'required'
            ],
            [
                'field' => 'nama_admin',
                'label' => 'Nama Admin',
                'rules' => 'required'
            ],
            [
                'field' => 'id_jurusan',
                'label' => 'Id Jurusan',
                'rules' => 'required'
            ],
            [
                'field' => 'jenis_kelamin',
                'label' => 'Jenis Kelamin',
                'rules' => 'required'
            ]
        ];
        }
    public function getAll()
    {
        $this->db->join('jurusan', 'jurusan.id_jurusan = data_admin.id_jurusan');
        return $this->db->get($this->_table)->result();
    }
    function get_data_jurusan()
    {
        $this->db->select('*');
        $this->db->from('jurusan');
        $query = $this->db->get();
        return $query->result();
    }
    public function getById($id_adm)
    {
        $this->db->join('jurusan', 'jurusan.id_jurusan = data_admin.id_jurusan');
        return $this->db->get_where($this->_table, ["id_adm" => $id_adm])->row();
    }
    public function save()
    {
        $post = $this->input->post();
        $this->id_admin = $post["id_admin"];
        $this->nama_admin = $post["nama_admin"];
        $this->id_jurusan = $post["id_jurusan"];
        $this->jenis_kelamin = $post["jenis_kelamin"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_adm = $post["id_adm"];
        $this->id_admin = $post["id_admin"];
        $this->nama_admin = $post["nama_admin"];
        $this->id_jurusan = $post["id_jurusan"];
        $this->jenis_kelamin = $post["jenis_kelamin"];
        return $this->db->update($this->_table, $this, array("id_adm" => $post["id_adm"]));
    }

    public function delete($id_adm)
    {
        return $this->db->delete($this->_table, array("id_adm" => $id_adm));
    }
}
