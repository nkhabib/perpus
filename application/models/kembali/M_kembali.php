<?php
class M_kembali extends CI_Model
{
	function pinjam($kodePinjam)
	{
		$this->db->join('member','member.id = pinjam.id_member');
		$this->db->join('buku','buku.id_buku = pinjam.id_buku');
		return $this->db->get_where('pinjam',['kode_pinjam' => $kodePinjam])->row_array();
	}

	function create($data,$id_pinjam)
	{
		$create = $this->db->insert('pengembalian',$data);
		$last_id_pengembalian = $this->db->insert_id();

		if ($create) 
		{
			$this->db->where('id_pinjam',$id_pinjam);
			$this->db->set('dikembalikan',1);
			$this->db->update('pinjam');

			$pinjam = $this->db->get_where('pinjam',['id_pinjam' => $id_pinjam])->row_array();

			$riwayat = array(
				'id_member' => $pinjam['id_member'],
				'id_pinjam' => $id_pinjam,
				'id_pengembalian' => $last_id_pengembalian
			);

			$c_riwayat = $this->db->insert('riwayat_pinjam',$riwayat);

			if ($c_riwayat) 
			{
				return $create;
			}

		}
	}
}
?>