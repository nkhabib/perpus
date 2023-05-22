<?php
class Kembali extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('role_id') == 1 or 6) 
		{
			$this->load->model('kembali/m_kembali');
		} else
			{
				$this->load->view('errors/v_404');
			}
	}

	function pengembalian()
	{
		$url = $this->uri->segment(1);
		if ($url == 'kembali') 
		{
			$this->load->view('errors/v_404');
		} else
			{
				$this->form_validation->set_rules('kode_pinjam','Kode Pinjam','required',
					[
						'required' => 'Kode Pinjam Harus Diisi'
					]);
				if ($this->form_validation->run() == false) 
				{
					$data['j_menu'] = 'Buku';
					$data['judul'] = 'Pengembalian Buku';
					$this->load->view('template/v_header',$data);
					$this->load->view('kembali/v_kodePinjam');
					$this->load->view('template/v_footer');
				} else
					{
						$kodePinjam = $this->input->post('kode_pinjam');
						$db = $this->db->get_where('pinjam',['kode_pinjam' => $kodePinjam,'dikembalikan' => 0]);

						if ($db->num_rows() != 0) 
						{

							$data['pinjam'] = $this->m_kembali->pinjam($kodePinjam);
							$data['max'] = $this->db->get('lama_pinjam')->row_array();
							$data['denda'] = $this->db->get('denda')->row_array();
							$data['j_menu'] = 'Buku';
							$data['judul'] = 'Pengembalian Buku';
							$this->load->view('template/v_header',$data);
							$this->load->view('kembali/v_pengembalian');
							$this->load->view('template/v_footer');
						} else
							{
								$this->session->set_flashdata('gagal','Kode Pinjam "'.$kodePinjam.'" Tidak Ditemukan');
								redirect('Kembali');
							}
					}
			}
	}

	function create()
	{
		$url = $this->uri->segment(1);
		if ($url != 'kembali') 
		{
			$kodePinjam = $this->input->post('kode_pinjam');
			$db = $this->db->get_where('pinjam',['kode_pinjam' => $kodePinjam])->row_array();
			$tgl_pnjm = $db['tanggal_pinjam'];
			$db_denda = $this->db->get('denda')->row_array();

			$this->form_validation->set_rules('tgl_kembali','Tanggal kembali','required|callback_min_tgl['.$tgl_pnjm.']',
				[
					'required' => 'Tanggal Pengambalian Harus Diisi'
				]);

			if ($this->form_validation->run() == true) 
			{
				if ($db) 
				{
					$denda = $this->input->post('denda');
					if ($denda == $db_denda['denda']) 
					{
						$tgl_pengembalian = $this->input->post('tgl_kembali');
						$terlambat = $this->input->post('terlambat');
						
						$tgl1 = new DateTime($db['max_tgl_kembali']);
						$tgl2 = new DateTime($tgl_pengembalian);
						$diff = $tgl1->diff($tgl2);
						$telat = $diff->d;
						
						$id_Pkembali = $this->session->userdata('id');
						$pengembalian = array(
							'id_pinjam' => $db['id_pinjam'],
							'tgl_pengembalian' => $tgl_pengembalian,
							'denda' => $db_denda['denda'],
							'id_petugas_pinjam' => $db['id_petugas'],
							'id_petugas_kembali' => $id_Pkembali,
							'status' => 1
						);

						if ($terlambat != '') 
						{
							if ($terlambat == $telat) 
							{
								$jml_buku = $this->input->post('jml_buku');

								if ($jml_buku == $db['jumlah_pinjam']) 
								{
									$dayTelat = array(
										'terlambat' => $telat,
										'total_denda' => $telat*$db_denda['denda']*$db['jumlah_pinjam']
									);
									$insert = array_merge($pengembalian,$dayTelat);
									$query = $this->m_kembali->create($insert,$db['id_pinjam']);

									if ($query)
									{
										$this->session->set_flashdata('msg','Buku Berhasil Dikembalikan');
										redirect('Kembali');
									} else 
										{
											$this->session->set_flashdata('gagal','Buku Gagal Dikembalikan dengan denda');
											redirect('Kembali');
										}
								} else
									{
										$this->session->set_flashdata('gagal','Jangan Manipulasi Jumlah Buku');
										redirect('Kembali');
									}

							} else
								{
									$this->session->set_flashdata('gagal','Jangan Manipulasi Keterlambatan !!!');
									redirect('Kembali');
								}
						} else
							{
								$qry = $this->m_kembali->create($pengembalian,$db['id_pinjam']);

								if ($qry) 
								{
									$this->session->set_flashdata('msg','Buku Berhasil Dikembalikan');
									redirect('Kembali');
								} else
									{
										$this->session->set_flashdata('gagal','Buku Gagal Dikembalikan tanpa denda');
										redirect('Kembali');
									}
							}

					} else
						{
							$this->session->set_flashdata('gagal','Jangan Manipulasi Jumlah Denda');
							redirect('Kembali');
						}
				} else
					{
						$this->session->set_flashdata('gagal','Kode Pinjam Salah !! *Anda Mengubah Pada Inspect Html*');
						redirect('Kembali');
					}
			} else
				{
					$data['pinjam'] = $this->m_kembali->pinjam($kodePinjam);
					$data['max'] = $this->db->get('lama_pinjam')->row_array();
					$data['denda'] = $this->db->get('denda')->row_array();
					$data['j_menu'] = 'Buku';
					$data['judul'] = 'Pengembalian Buku';
					$this->load->view('template/v_header',$data);
					$this->load->view('kembali/v_pengembalian');
					$this->load->view('template/v_footer');
				}
		} else
			{
				$this->load->view('errors/v_404');
			}
	}

// ======= form validation ====
	function min_tgl($tgl_kembali,$tgl_pnjm)
	{
		if ($tgl_kembali < $tgl_pnjm) {
			$this->form_validation->set_message('min_tgl','Tanggal pengembalian harus lebih besar dari tanggal peminjaman '.tgl_indo($tgl_pnjm));
			return false;
		} else
			{
				return true;
			}
	}

// ======= end form validation ====
}
?>