<?php
class M_buku extends CI_Model
{

	function detail($id_buku)
	{
		$this->db->join('stock_buku','stock_buku.id_buku = buku.id_buku');
		return $this->db->get_where('buku',['buku.id_buku' => $id_buku])->row_array();
	}

	function katalog($config,$offset)
	{
		$this->db->order_by('judul','ASC');
		$this->db->join('visit','visit.id_buku = buku.id_buku');
		$this->db->join('stock_buku','stock_buku.id_buku = buku.id_buku');
		$this->db->join('kategori','kategori.id_kategori = buku.id_kategori');
		return $this->db->get('buku',$config,$offset)->result_array();
	}

	function update_visit($id_buku,$update)
	{
		$this->db->where('id_buku',$id_buku);
		return $this->db->update('visit',$update);
	}

	function insert_visit($popular)
	{
		// var_dump($popular);
		// die();
		return $this->db->insert('visit',$popular);
	}
}
?>