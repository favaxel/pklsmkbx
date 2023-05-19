<?php defined('BASEPATH') or exit('No direct Scrip access allowed');

class jurusan_model extends CI_Model
{
    private $_table = "jurusan";
    public $id_jurusan;
    public $nama_jurusan;
    public $nama_panjang;
    public function rules()
    {
        return [
            [
                'field' => 'nama_jurusan',
                'label' => 'Nama Jurusan',
                'rules' => 'required'
            ],
            [
                'field' => 'nama_panjang',
                'label' => 'Nama Panjang',
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
        $this->db->from('data_jurusan');
        $query = $this->db->get();
        return $query->result();
    }
    public function save()
    {
        $post = $this->input->post();
        $this->nama_jurusan = $post["nama_jurusan"];
        $this->nama_panjang = $post["nama_panjang"];
        return $this->db->insert($this->_table, $this);
    }
    // Function GetJurusan($id_jurusan) {
    //     $This->Db->Where('id_jurusan', $id_jurusan);
    //     $Query = $This->Db->Get('jurusan');
    //     Return $Query->Row();
    // }
    // Function UpdateJurusan($id_jurusan, $Data) {
    //     $This->Db->Where('id_jurusan', $id_jurusan);
    //     $This->Db->Update('jurusan', $Data);
    // }
    public function getById($id_jurusan)
    {
        // $this->db->join('jurusan', 'jurusan.id_jurusan = data_dudi.id_jurusan');
        return $this->db->get_where($this->_table, ["id_jurusan" => $id_jurusan])->row();
    }
    public function update()
    {
        $post = $this->input->post();
        $this->id_jurusan = $post["id_jurusan"];
        $this->nama_jurusan = $post["nama_jurusan"];
        $this->nama_panjang = $post["nama_panjang"];
        return $this->db->update($this->_table, $this, array("id_jurusan" => $post["id_jurusan"]));
    }
    public function delete($id_jurusan)
    {
        return $this->db->delete($this->_table, array("id_jurusan" => $id_jurusan));
    }
    
}
