<?php defined('BASEPATH') or exit('No direct Scrip access allowed');

class pengajuanpkl_model extends CI_Model
{

    private $_table = "pengajuanpkl";

    public $id_pengajuanpkl;
    public $tanggal_masuk;
    public $tanggal_keluar;
    public $id_guru;
    public $status_validasi;

    public function rules()
    {
        return [

            [
                'field' => 'status_validasi',
                'label' => 'Status Validasi',
                'rules' => 'required'
            ],
            [
                'field' => 'durasi',
                'label' => 'Durasi',
                'rules' => 'required'
            ],
            [
                'field' => 'tanggal_masuk',
                'label' => 'Tanggal Masuk',
                'rules' => 'required'
            ],

            [
                'field' => 'tanggal_keluar',
                'label' => 'Tanggal Keluar',
                'rules' => 'required'
            ]
        ];
    }
    public function getAll()
    {
        $this->db->select('*');
        $this->db->join('data_guru', 'data_guru.id_guru = pengajuanpkl.id_guru', 'left');
        $this->db->join('data_siswa', 'data_siswa.id_siswa = pengajuanpkl.id_siswa');
        $this->db->join('data_dudi', 'data_dudi.id_dudi = pengajuanpkl.id_dudi');
        // $this->db->where('status_validasi','Proses Pengajuan'); 
        $this->db->order_by('nama_dudi', 'asc');
        return $this->db->get($this->_table)->result();
    }
    //Pengajuan PKL Belum Tervalidasi
    public function getbelum()
    {
        $this->db->select('*');
        $this->db->join('data_guru', 'data_guru.id_guru = pengajuanpkl.id_guru', 'left');
        $this->db->join('data_siswa', 'data_siswa.id_siswa = pengajuanpkl.id_siswa');
        $this->db->join('data_dudi', 'data_dudi.id_dudi = pengajuanpkl.id_dudi');
        $this->db->where('status_validasi','Belum Tervalidasi'); 
        $this->db->order_by('nama_dudi', 'asc');
        $this->db->order_by('kelas', 'asc');
        return $this->db->get($this->_table)->result();
    }
    //Pengajuan PKL Proses pengajuan
    public function getJumlahProsesPengajuanPKL()
    {
        $query = $this->db->query('SELECT *, count(pengajuanpkl.id_siswa) as jumlah_siswa FROM `pengajuanpkl` 
        join data_siswa on data_siswa.id_siswa = pengajuanpkl.id_siswa
        join jurusan on jurusan.id_jurusan = data_siswa.id_jurusan 
        join data_guru on data_guru.id_guru = pengajuanpkl.id_guru 
        join data_dudi on data_dudi.id_dudi = pengajuanpkl.id_dudi 
        where pengajuanpkl.status_validasi = "Proses Pengajuan" 
        group by pengajuanpkl.id_dudi order by pengajuanpkl.id_dudi');
        return $query->result();
    }
    public function getProsesPengajuanPKl($id_dudi)
    {$query = $this->db->query('SELECT * FROM `pengajuanpkl` 
        join data_siswa on data_siswa.id_siswa = pengajuanpkl.id_siswa 
        join jurusan on jurusan.id_jurusan = data_siswa.id_jurusan 
        join data_guru on data_guru.id_guru = pengajuanpkl.id_guru 
        join data_dudi on data_dudi.id_dudi = pengajuanpkl.id_dudi 
        where pengajuanpkl.status_validasi = "Proses Pengajuan" 
        and pengajuanpkl.id_dudi = ' . $id_dudi . ' order by status_validasi desc');
        return $query->result();
    }  
    public function getproses()
    {
        $this->db->select('*');
        $this->db->join('data_guru', 'data_guru.id_guru = pengajuanpkl.id_guru', 'left');
        $this->db->join('data_siswa', 'data_siswa.id_siswa = pengajuanpkl.id_siswa');
        $this->db->join('data_dudi', 'data_dudi.id_dudi = pengajuanpkl.id_dudi');
        $this->db->where('status_validasi','Proses Pengajuan'); 
        $this->db->order_by('nama_dudi', 'asc');
        return $this->db->get($this->_table)->result();
    }
    //Pengajuan PKL Diterima
    public function getJumlahProsesDiterimaPKL()
    {
        $query = $this->db->query('SELECT *, count(pengajuanpkl.id_siswa) as jumlah_siswa FROM `pengajuanpkl` 
        join data_siswa on data_siswa.id_siswa = pengajuanpkl.id_siswa 
        join jurusan on jurusan.id_jurusan = data_siswa.id_jurusan 
        join data_guru on data_guru.id_guru = pengajuanpkl.id_guru 
        join data_dudi on data_dudi.id_dudi = pengajuanpkl.id_dudi 
        where pengajuanpkl.status_validasi = "Diterima" 
        group by pengajuanpkl.id_dudi order by pengajuanpkl.id_dudi');
        return $query->result();
    }
    public function getProsesDiterimaPKL($id_dudi)
    {$query = $this->db->query('SELECT * FROM `pengajuanpkl` 
        join data_siswa on data_siswa.id_siswa = pengajuanpkl.id_siswa 
        join jurusan on jurusan.id_jurusan = data_siswa.id_jurusan 
        join data_guru on data_guru.id_guru = pengajuanpkl.id_guru 
        join data_dudi on data_dudi.id_dudi = pengajuanpkl.id_dudi 
        where pengajuanpkl.status_validasi = "Diterima" 
        and pengajuanpkl.id_dudi = ' . $id_dudi . ' order by status_validasi desc');
        return $query->result();
    }  
    public function getTerima()
    {
        $this->db->select('*');
        $this->db->join('data_guru', 'data_guru.id_guru = pengajuanpkl.id_guru', 'left');
        $this->db->join('data_siswa', 'data_siswa.id_siswa = pengajuanpkl.id_siswa');
        $this->db->join('data_dudi', 'data_dudi.id_dudi = pengajuanpkl.id_dudi');
        $this->db->where('status_validasi','Diterima'); 
        $this->db->order_by('nama_dudi', 'asc');
        return $this->db->get($this->_table)->result();
    }

   

    // Pelaksanaan PKL selesai
    public function getSelesai()
    {
        $query = $this->db->query('SELECT *, count(pengajuanpkl.id_siswa) as jumlah_siswa FROM `pengajuanpkl` 
        join data_siswa on data_siswa.id_siswa = pengajuanpkl.id_siswa 
        join jurusan on jurusan.id_jurusan = data_siswa.id_jurusan 
        join data_guru on data_guru.id_guru = pengajuanpkl.id_guru 
        join data_dudi on data_dudi.id_dudi = pengajuanpkl.id_dudi 
        where pengajuanpkl.status_validasi = "Selesai" 
        group by pengajuanpkl.id_dudi order by pengajuanpkl.id_dudi');
        return $query->result();
    }
    public function getHistory($id_dudi)
    {$query = $this->db->query('SELECT * FROM `pengajuanpkl` 
        join data_siswa on data_siswa.id_siswa = pengajuanpkl.id_siswa 
        join jurusan on jurusan.id_jurusan = data_siswa.id_jurusan 
        join data_guru on data_guru.id_guru = pengajuanpkl.id_guru 
        join data_dudi on data_dudi.id_dudi = pengajuanpkl.id_dudi 
        where pengajuanpkl.status_validasi = "Selesai" 
        and pengajuanpkl.id_dudi = ' . $id_dudi . ' order by status_validasi desc');
        return $query->result();
    }  
   
    
      //Edit pengajuanpkl
    public function getById($id_pengajuanpkl)
    {
        $this->db->select('*');
        $this->db->join('data_guru', 'data_guru.id_guru = pengajuanpkl.id_guru', 'left');
        $this->db->join('data_siswa', 'data_siswa.id_siswa = pengajuanpkl.id_siswa');
        $this->db->join('data_dudi', 'data_dudi.id_dudi = pengajuanpkl.id_dudi');
        return $this->db->get_where($this->_table, ["id_pengajuanpkl" => $id_pengajuanpkl])->row();
    }
    function get_data_guru()
    {
        $this->db->select('*');
        $this->db->from('data_guru');
        $this->db->order_by('id_jurusan', 'asc');
        $query = $this->db->get();
        return $query->result();
    }
    public function getTotalSiswa()
    {
        $query = $this->db->query('SELECT id_siswa FROM data_siswa');
        return $query->num_rows();
    }
    public function getBelumTervalidasi()
    {
        $query = $this->db->query('SELECT id_pengajuanpkl FROM pengajuanpkl where status_validasi = "Belum Tervalidasi"');
        return $query->num_rows();
    }
    public function getTotalSiswaBelumMengajukan()
    {
        $query = $this->db->query('SELECT data_siswa.id_siswa FROM data_siswa left join pengajuanpkl on pengajuanpkl.id_siswa = data_siswa.id_siswa where pengajuanpkl.status_validasi is null');
        return $query->num_rows();
    }

    public function getTotalSiswaSudahMengajukan()
    {
        $query = $this->db->query('SELECT data_siswa.id_siswa FROM data_siswa join pengajuanpkl on pengajuanpkl.id_siswa = data_siswa.id_siswa');
        return $query->num_rows();
    }

    public function getProsesPengajuan()
    {
        $query = $this->db->query('SELECT * FROM pengajuanpkl where status_validasi = "Proses Pengajuan"');
        return $query->num_rows();
    }

    public function getDitolak()
    {
        $query = $this->db->query('SELECT * FROM pengajuanpkl where status_validasi = "Ditolak"');
        return $query->num_rows();
    }

    public function getDiterima()
    {
        $query = $this->db->query('SELECT * FROM pengajuanpkl where status_validasi = "Diterima"');
        return $query->num_rows();
    }

    public function getTotalPengajuan()
    {
        $query = $this->db->query('SELECT * FROM pengajuanpkl');
        return $query->num_rows();
    }

    
    public function update_validasi()
    {
        $post = $this->input->post();
        $this->id_pengajuanpkl = $post["id_pengajuanpkl"];
        $this->status_validasi = $post["status_validasi"];
        return $this->db->update($this->_table, $this, array("id_pengajuanpkl" => $post["id_pengajuanpkl"]));
    }
    public function update()
    {
        $post = $this->input->post();
        $this->id_pengajuanpkl = $post["id_pengajuanpkl"];
        $this->id_guru = $post["id_guru"];
        $this->durasi = $post["durasi"];
        $this->tanggal_masuk = $post["tanggal_masuk"];
        $this->tanggal_keluar = $post["tanggal_keluar"];
        $this->status_validasi = $post["status_validasi"];
        return $this->db->update($this->_table, $this, array("id_pengajuanpkl" => $post["id_pengajuanpkl"]));
    }
    
    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_pengajuanpkl" => $id));
    }
}
