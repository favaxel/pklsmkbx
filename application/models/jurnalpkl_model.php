<?php defined('BASEPATH') or exit('No direct Scrip access allowed');

class jurnalpkl_model extends CI_Model
{
    private $_table = "jurnal_pkl";

    public $id_jurnal_pkl;
    public $id_siswa;
    public $tanggal;
    public $kegiatan;
    public $dokumentasi = "default.jpg";

    public function rules()
    {
        return [
            
            [
                'field' => 'kegiatan',
                'label' => 'Kegiatan',
                'rules' => 'required'
            ],

            [
                'field' => 'tanggal',
                'label' => 'Tanggal',
                'rules' => 'required'
            ]
        ];
    }

    public function getAll()
    {
        $this->db->select('*');
        $this->db->join('data_siswa', 'data_siswa.id_siswa = jurnal_pkl.id_siswa');
        $this->db->where('jurnal_pkl.id_siswa', $this->session->userdata('id'));
        $this->db->order_by('id_jurnal_pkl', 'desc');
        return $this->db->get($this->_table)->result();
    }

    public function getData()
    {
        $this->db->select('*');
        $this->db->join('data_siswa', 'data_siswa.id_siswa = jurnal_pkl.id_siswa');
        $this->db->where('jurnal_pkl.id_siswa', $this->session->userdata('id'));
        $this->db->order_by('tanggal', 'asc');
        return $this->db->get($this->_table)->result_array();
    }

    public function getById($id_siswa)
    {
        $this->db->join('data_siswa', 'data_siswa.id_siswa = jurnal_pkl.id_siswa');
        $this->db->join('jurusan', 'jurusan.id_jurusan = data_siswa.id_jurusan');
        $this->db->join('pengajuanpkl', 'pengajuanpkl.id_siswa = jurnal_pkl.id_siswa');
        $this->db->join('data_dudi', 'data_dudi.id_dudi = pengajuanpkl.id_dudi');
        return $this->db->get_where($this->_table, ["jurnal_pkl.id_siswa" => $id_siswa])->row();
    }

    public function getId($id_jurnal_pkl)
    {
        return $this->db->get_where($this->_table, ["id_jurnal_pkl" => $id_jurnal_pkl])->row();
    }

    // public function getMapel()
    // {
    //     $this->db->select('*');
    //     $this->db->from('mapel');
    //     $query = $this->db->get();
    //     return $query->result();
    // }

    // public function getKompetensidasar($id)
    // {
    //     $kompetensi_dasar = $this->db->query("SELECT * FROM kompetensi_dasar WHERE id_mapel = '$id'");
    //     return $kompetensi_dasar->result();
    // }

    public function save()
    {
        $post = $this->input->post();
        $this->id_siswa = $post["id_siswa"];
        $this->tanggal = $post["tanggal"];
        $this->kegiatan = $post["kegiatan"];
        $this->dokumentasi = $this->_uploadImage();
        // $this->status = $post['status'];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_jurnal_pkl = $post["id_jurnal_pkl"];
        $this->id_siswa = $post["id_siswa"];
        $this->tanggal = $post["tanggal"];
        $this->kegiatan = $post["kegiatan"];

        if (!empty($_FILES["dokumentasi"]["name"])) {
            $this->dokumentasi = $this->_uploadImage();
        } else {
            $this->dokumentasi = $post["old_image"];
        }

        // $this->status = $post['status'];
        return $this->db->update($this->_table, $this, array("id_jurnal_pkl" => $post["id_jurnal_pkl"]));
    }

    public function delete($id_jurnal_pkl)
    {
        $this->_deleteImage($id_jurnal_pkl);
        return $this->db->delete($this->_table, array("id_jurnal_pkl" => $id_jurnal_pkl));
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './dokumentasi';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|bmp';
        $config['file_name']            = $_FILES['dokumentasi']['name'];
        $config['overwrite']            = true;
        $config['max_size']             = 1024;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('dokumentasi')) {
            return $this->upload->data("file_name");
        }
        return "default.jpg";
    }

    private function _deleteImage($id_jurnal_pkl)
    {
        $jurnal_pkl = $this->getId($id_jurnal_pkl);
        if ($jurnal_pkl->dokumentasi != "default.jpg") {
            $filename = explode(".", $jurnal_pkl->dokumentasi)[0];
            return array_map('unlink', glob(FCPATH . "dokumentasi/$filename.*"));
        }
    }
}
