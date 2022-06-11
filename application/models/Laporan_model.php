<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Laporan_model extends CI_Model
{

    public $table = 'laporan';
    public $id = 'laporan_id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

	function get_all_superadmin()
    {
       $data =  $this->db->select('*')
		->from('laporan')
		->where_not_in('jenis_laporan','Aduan')
		->get()->result();
		return $data;
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('laporan_id', $q);
	$this->db->or_like('kode_laporan', $q);
	$this->db->or_like('jenis_laporan', $q);
	$this->db->or_like('nama_laporan', $q);
	$this->db->or_like('tanggal', $q);
	$this->db->or_like('deskripsi', $q);
	$this->db->or_like('photo', $q);
	$this->db->or_like('status', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }


    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

	function generatekodeReq()
    {

        $this->db->select('RIGHT(kode_laporan,4) as kode_laporan', false);
        $this->db->order_by("kode_laporan", "DESC");
        $this->db->limit(1);
        $query = $this->db->get('laporan');

        // CEK JIKA DATA ADA
        if ($query->num_rows() <> 0) {
            $data       = $query->row(); // ambil satu baris data
            $kodeReq  = intval($data->kode_laporan) + 1; // tambah 1
        } else {
            $kodeReq  = 1; // isi dengan 1
        }

        $lastKode = str_pad($kodeReq, 4, "0", STR_PAD_LEFT);
        $tahun    = date("Y");
        $REQ      = "LAP";

        $newKode  = $REQ . "/" . $tahun . "/" . $lastKode;

        return $newKode;  // return kode baru

    }

}
