<?php 
class M_pinjam extends CI_Model
{
	
	function get($id)
	{
		$this->db->join('buku','buku.id_buku = pinjam.id_buku');
		return $this->db->get_where('pinjam',[
			'id_member' => $id,
			'status' => 1,
			'gagal' => 0,
			'dikembalikan' => 0
		])->result_array();
	}

	function pinjam($id_buku)
	{
		$this->db->join('stock_buku','stock_buku.id_buku = buku.id_buku');
		return $this->db->get_where('buku',['buku.id_buku' => $id_buku])->row_array();
	}

	function c_pinjam($pinjam)
	{
		return $this->db->insert('pinjam',$pinjam);
	}

	function u_stock($id_buku,$stok)
	{
		$this->db->where('id_buku',$id_buku);
		return $this->db->update('stock_buku',$stok);
	}

	function ditunda($id)
	{
		$this->db->join('buku','buku.id_buku = pinjam.id_buku');
		return $this->db->get_where('pinjam',[
			'id_member' => $id,
			'status' => 0,
			'gagal' => 0,
			'dikembalikan' => 0
		])->result_array();
	}

	function edit($id_pinjam)
	{
		$this->db->join('stock_buku','stock_buku.id_buku = pinjam.id_buku');
		$this->db->join('buku','buku.id_buku = pinjam.id_buku');
		return $this->db->get_where('pinjam',['pinjam.id_pinjam' => $id_pinjam])->row_array();
	}

	function update($id_pinjam,$pinjam)
	{
		$this->db->where('id_pinjam',$id_pinjam);
		return $this->db->update('pinjam',$pinjam);
	}

	// jquery
	function notif()
	{
		$jml = $this->db->get_where('pinjam',['status' => 0])->num_rows();
		$data = array(
			'jml' => $jml,
		);

		return $data;
	}
	// end notif

	function gagal($id)
	{
		$this->db->join('buku','buku.id_buku = pinjam.id_buku');
		$this->db->join('gagal_pinjam','gagal_pinjam.id_pinjam = pinjam.id_pinjam');
		return $this->db->get_where('pinjam',['id_member' => $id, 'gagal' => 1])->result_array();
	}

	function riwayat($config,$offset,$id)
	{
		$this->db->join('pinjam','pinjam.id_pinjam = riwayat_pinjam.id_pinjam');
		$this->db->join('buku','buku.id_buku = pinjam.id_buku');
		$this->db->join('member','member.id = pinjam.id_member');
		$this->db->join('pengembalian','pengembalian.id_pengembalian = riwayat_pinjam.id_pengembalian');
		$this->db->join('admin','admin.id = pengembalian.id_petugas_kembali');
		$riwayat = $this->db->get_where('riwayat_pinjam',['riwayat_pinjam.id_member' => $id],$config,$offset)->result_array();
		return $riwayat;
	}

}
?>