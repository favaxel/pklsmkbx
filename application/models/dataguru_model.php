<?php defined('BASEPATH') or exit('No direct Scrip access allowed');

class dataguru_model extends CI_Model
{
   private $_table = "data_guru";
   public $id_gr; 
   public $id_guru;
   public $nama_guru;
   public $id_jurusan;
   public $jenis_kelamin; 
    public function rules()
    {
        return [
            [
                'field' => 'id_guru',
                'label' => 'Id Guru',
                'rules' => 'required'
            ],
            [
                'field' => 'nama_guru',
                'label' => 'Nama Guru',
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
        return $this->db->get($this->_table)->result();
    }
    function get_data_jurusan()
    {
        $this->db->select('*');
        $this->db->from('jurusan');
        $query = $this->db->get();
        return $query->result();
    }
    public function getById($id_gr)
    {
        $this->db->join('jurusan', 'jurusan.id_jurusan = data_guru.id_jurusan');
        return $this->db->get_where($this->_table, ["id_gr" => $id_gr])->row();
    }
    public function save()
    {
        $post = $this->input->post();
        $this->id_guru = $post["id_guru"];
        $this->nama_guru = $post["nama_guru"];
        $this->id_jurusan = $post["id_jurusan"];
        $this->jenis_kelamin = $post["jenis_kelamin"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_gr = $post["id_gr"];
        $this->id_guru = $post["id_guru"];
        $this->nama_guru = $post["nama_guru"];
        $this->id_jurusan = $post["id_jurusan"];
        $this->jenis_kelamin = $post["jenis_kelamin"];
        return $this->db->update($this->_table, $this, array("id_gr" => $post["id_gr"]));
    }

    public function delete($id_gr)
    {
        return $this->db->delete($this->_table, array("id_gr" => $id_gr));
    }
}
