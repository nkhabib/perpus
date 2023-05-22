<?php

class M_BukuAdmin extends CI_Model
{
	
	function kategori()
	{
		$this->db->order_by('kategori', 'ASC');
		return $this->db->get('kategori')->result_array();
	}

	function insert($buku,$jml)
	{
		$insert = $this->db->insert('buku',$buku);
		$las_id = $this->db->insert_id();

		$stock = array(
			'id_buku' => $las_id,
			'jumlah_buku' => $jml,
			'tersedia' => $jml
		);

		$this->db->insert('stock_buku',$stock);

		$visit = array(
			'id_buku' => $las_id,
			'visit' => 1
		);

		$this->db->insert('visit',$visit);
		return $insert;
	}

	function tabel_buku($config,$offset)
	{
		$this->db->order_by('judul','ASC');
		$this->db->join('visit','visit.id_buku = buku.id_buku');
		$this->db->join('stock_buku','stock_buku.id_buku = buku.id_buku');
		$this->db->join('kategori','kategori.id_kategori = buku.id_kategori');
		return $this->db->get('buku',$config,$offset)->result_array();
	}

	function edit($id)
	{
		$this->db->join('stock_buku','stock_buku.id_buku = buku.id_buku');
		$this->db->join('kategori','kategori.id_kategori = buku.id_kategori');
		return $this->db->get_where('buku',['buku.id_buku' => $id])->row_array();
	}

	function update($id_buku,$buku,$jml)
	{
		$this->db->where('id_buku',$id_buku);
		$update = $this->db->update('buku',$buku);

		$stock = $this->db->get_where('stock_buku',['id_buku' => $id_buku])->row_array();
		$pinjam = $stock['jumlah_pinjam'];
		$tersedia = $jml-$pinjam;

		$data = array(
			'jumlah_buku' => $jml,
			'jumlah_pinjam' => $pinjam,
			'tersedia' => $tersedia
		);
		$this->db->where('id_buku',$id_buku);
		$this->db->update('stock_buku',$data);
		return $update;
	}
}
?>