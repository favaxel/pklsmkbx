<?php defined('BASEPATH') or exit('No direct Scrip access allowed');

class pengajuansiswa_model extends CI_Model
{
    private $_table = 'pengajuanpkl';

    public $id_pengajuanpkl;
    public $status_keanggotaan;

    public function rules()
    {
        return [
            [
                'field' => 'status_keanggotaan',
                'label' => 'Status Keanggotaan',
                'rules' => 'required'
            ],
        ];
    }
    public function getAll()
    {
        $query = $this->db->query('SELECT *, count(pengajuanpkl.id_siswa) as jumlah_siswa FROM `pengajuanpkl` join data_siswa on data_siswa.id_siswa = pengajuanpkl.id_siswa join data_dudi on data_dudi.id_dudi = pengajuanpkl.id_dudi group by pengajuanpkl.id_dudi order by pengajuanpkl.id_dudi');
        return $query->result();
    }
}
