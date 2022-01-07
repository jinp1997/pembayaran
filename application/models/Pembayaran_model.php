<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran_model extends MY_Model {

	protected $table = 'pembayaran';

	function get_datatables($start, $length)
	{
		$sql = "SELECT * 
				FROM pembayaran 
				ORDER BY id_pembayaran DESC";
		return $this->db->limit($length,$start)
						->query($sql);
	}

	public function get_total()
	{
		$query = $this->db->select("COUNT(*) as num")->get($this->table);
		$result = $query->row();
		if(isset($result)) return $result->num;
		return 0;
	}	

	public function get_by_id($id_pembayaran)
	{
		$this->db->from($this->table)
				 ->where('id_pembayaran',$id_pembayaran);
		$query = $this->db->get();

		return $query->row();
	}

	public function save($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function ubah($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id_pembayaran)
	{
		$this->db->where('id_pembayaran', $id_pembayaran)
				 ->delete($this->table);
	}
}