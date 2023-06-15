<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pegawai extends CI_Model
{
    public $table = 'dta_pegawai';

    public function __construct()
    {
        parent::__construct();
    }

    public function data_pegawai($id, $handkey)
    {
        // $this->db->select('dp.id,dp.handkey,dp.nip,dp.namalengkap,muk.id_unit_kerja,muk.nama_unit_kerja');
        $column = "id_pegawai AS id, handkey, nip, nama_pegawai AS namalengkap, id_unit_kerja, nama_unit_kerja";
        $this->db->select($column);
        $this->db->from($this->table);
        // $this->db->join('mst_unit_kerja muk', 'muk.id_unit_kerja = dp.id_unit_kerja');
        $this->db->where('id_pegawai', $id);
        $this->db->where('handkey', $handkey);
        $query = $this->db->get();
        return $query->result();
    }
}
