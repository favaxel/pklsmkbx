<?php defined('BASEPATH') or exit('No direct Scrip access allowed');

class akun_model extends CI_Model
{
    private $_table = "pengguna";
    public $id_pengguna;
    public $id;
    public $username;
    public $password;
    public $role;
    public function rules()
    {
        return [
            [
                'field' => 'username',
                'label' => 'Nama Pengguna',
                'rules' => 'required'
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required'
            ]
        ];
    }

    public function getAll()
    {
        $this->db->join('data_admin', 'data_admin.id_admin = pengguna.id', 'left');
        $this->db->join('data_guru', 'data_guru.id_guru = pengguna.id', 'left');
        $this->db->join('data_siswa', 'data_siswa.id_siswa = pengguna.id', 'left');
        $this->db->join('data_dudi', 'data_dudi.id_dudi = pengguna.id', 'left');
        $this->db->order_by('id', 'asc');
        $query = $this->db->get($this->_table);
        return $query->result();
    }

    public function getAkun()
    {
        $tabel_dudi = $this->db->query("SELECT * FROM `data_dudi` left join pengguna on pengguna.id = data_dudi.id_dudi where pengguna.id is null");
        return $tabel_dudi->result();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id = $post["id"];
        $this->username = $post["username"];
        $this->password = $post["password"];
        $this->role = $post["role"];
        return $this->db->insert($this->_table, $this);
    }
    public function getById($id_pengguna)
    {
        // $this->db->join('jurusan', 'jurusan.id_jurusan = data_dudi.id_jurusan');
        return $this->db->get_where($this->_table, ["id_pengguna" => $id_pengguna])->row();
    }
    public function update()
    {
        $post = $this->input->post();
        $this->id_pengguna = $post["id_pengguna"];
        $this->id = $post["id"];
        $this->username = $post["username"];
        $this->password = $post["password"];
        $this->role = $post["role"];
        return $this->db->update($this->_table, $this, array("id_pengguna" => $post["id_pengguna"]));
    }
    public function delete($id_pengguna)
    {
        return $this->db->delete($this->_table, array("id_pengguna" => $id_pengguna));
    }
    
}
