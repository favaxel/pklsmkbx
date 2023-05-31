<?php defined('BASEPATH') or exit('No direct Scrip access allowed');

class datasiswa_model extends CI_Model
{
    private $_table = "data_siswa";
   public $id_sw;
   public $id_siswa;
   public $nama_siswa;
   public $id_jurusan;
   public $kelas;
   public $jenis_kelamin; 
    public function rules()
    {
        return [
            [
                'field' => 'id_siswa',
                'label' => 'Id Siswa',
                'rules' => 'required'
            ],
            [
                'field' => 'nama_siswa',
                'label' => 'Nama Siswa',
                'rules' => 'required'
            ],
            [
                'field' => 'id_jurusan',
                'label' => 'Id Jurusan',
                'rules' => 'required'
            ],
            [
                'field' => 'kelas',
                'label' => 'Kelas',
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
        $this->db->join('jurusan', 'jurusan.id_jurusan = data_siswa.id_jurusan');
        $this->db->order_by('nama_jurusan','ASC');
        return $this->db->get($this->_table)->result();
    }
    function get_data_jurusan()
    {
        $this->db->select('*');
        $this->db->from('jurusan');
        $query = $this->db->get();
        return $query->result();
    }
    public function getDataSiswa()
    {
        $this->db->where('id_jurusan', $this->session->userdata('id_jurusan'));
        $this->db->order_by('nama_siswa', 'asc');
        $query = $this->db->get($this->_table);
        return $query->result();
    }

    public function getById($id_sw)
    {
        $this->db->join('jurusan', 'jurusan.id_jurusan = data_siswa.id_jurusan');
        return $this->db->get_where($this->_table, ["id_sw" => $id_sw])->row();
    }
    public function save()
    {
        $post = $this->input->post();
        $this->id_siswa = $post["id_siswa"];
        $this->nama_siswa = $post["nama_siswa"];
        $this->id_jurusan = $post["id_jurusan"];
        $this->kelas = $post["kelas"];
        $this->jenis_kelamin = $post["jenis_kelamin"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_sw = $post["id_sw"];
        $this->id_siswa = $post["id_siswa"];
        $this->nama_siswa = $post["nama_siswa"];
        $this->id_jurusan = $post["id_jurusan"];
        $this->Kelas = $post["kelas"];
        $this->jenis_kelamin = $post["jenis_kelamin"];
        return $this->db->update($this->_table, $this, array("id_sw" => $post["id_sw"]));
    }

    public function delete($id_sw)
    {
        return $this->db->delete($this->_table, array("id_sw" => $id_sw));
    }
}
