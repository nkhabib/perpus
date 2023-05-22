<?php
class M_Pinjam_Admin extends CI_Model
{

	function auto_delete()
	{
		$pinjam = $this->db->get_where('pinjam',[
			'status' => 0,
			'gagal' => 0,
			'dikembalikan' => 0]
		)->result_array();

		date_default_timezone_set('Asia/Jakarta');
		$now = date('Y-m-d');
		$tgl_skrng = new DateTime($now);

		foreach ($pinjam as $p)
		{
			$tgl_pinjam = new DateTime($p['tanggal_pinjam']);
			$diff = $tgl_pinjam->diff($tgl_skrng);
			$hasil = $diff->d+1;
			if ($hasil > 3) 
			{
				$pnjm = $this->db->get_where('pinjam',['id_pinjam' => $p['id_pinjam']])->row_array();

				$stok = $this->db->get_where('stock_buku',['id_buku' => $p['id_buku']])->row_array();

				$old_stok = $stok['tersedia'];
				$new_stock = $old_stok+$pnjm['jumlah_pinjam'];

				$old_pinjam = $stok['total_pinjam'];
				$new_pinjam = $old_pinjam-$pnjm['jumlah_pinjam'];

				$this->db->where('id_buku',$p['id_buku']);
				$this->db->set('total_pinjam',$new_pinjam);
				$this->db->set('tersedia',$new_stock);
				$this->db->update('stock_buku');

				$this->db->where('id_pinjam',$p['id_pinjam']);
				$this->db->delete('pinjam');
			}
		}

		$gagal = $this->db->get_where('pinjam',['gagal' => 1])->result_array();
		foreach ($gagal as $g)
		{
			$old_tgl = new DateTime($g['tanggal_pinjam']);

			$diff = $old_tgl->diff($tgl_skrng);
			$hasil = $diff->d+1;

			if ($hasil >= 10) 
			{
				// $this->db->where('id_pinjam',$g['id_pinjam']);
				$this->db->delete('pinjam',['id_pinjam' => $g['id_pinjam']]);

				// $this->db->where('id_pinjam',$g['id_pinjam']);
				$this->db->delete('gagal_pinjam',['id_pinjam' => $g['id_pinjam']]);
			}
		}
	}
	function pengajuan()
	{
		$this->db->join('member','member.id = pinjam.id_member');
		$this->db->join('buku','buku.id_buku = pinjam.id_buku');
		return $this->db->get_where('pinjam',['status' => 0,'gagal' => 0])->result_array();
	}

	function setuju($id_pinjam,$pinjam)
	{
		$this->db->where('id_pinjam',$id_pinjam);
		return $this->db->update('pinjam',$pinjam);
	}

	function dipinjam($config,$offset)
	{
		$this->db->join('member','member.id = pinjam.id_member');
		$this->db->join('buku','buku.id_buku = pinjam.id_buku');
		return $this->db->get_where('pinjam',['status' => 1],$config,$offset)->result_array();
	}

	function alasan($id_pinjam,$alasan)
	{
		$pinjam = $this->db->get_where('pinjam',['id_pinjam' => $id_pinjam])->row_array();

		$stok_lama = $this->db->get_where('stock_buku',['id_buku' => $pinjam['id_buku']])->row_array();

		$stok_baru = $stok_lama['tersedia']+$pinjam['jumlah_pinjam'];
		$totalPinjam_baru = $stok_lama['total_pinjam']-$pinjam['jumlah_pinjam'];
		
		$stok = array(
			'total_pinjam' => $totalPinjam_baru,
			'tersedia' => $stok_baru
		);

		$this->db->where('id_buku',$pinjam['id_buku']);
		$this->db->update('stock_buku',$stok);

		$gagal = array(
			'id_pinjam' => $id_pinjam,
			'keterangan' => $alasan,
			'date_created' => date('Y-m-d H:i:s')
		);

		$this->db->insert('gagal_pinjam',$gagal);

		$this->db->where('id_pinjam',$id_pinjam);
		$this->db->set('id_petugas',$this->session->userdata('id'));
		$this->db->set('gagal',1);
		$this->db->set('date_created',date('Y-m-d H:i:s'));
		return $this->db->update('pinjam');
	}
}
?>