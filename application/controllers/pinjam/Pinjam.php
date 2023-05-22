<?php 
class Pinjam extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('masuk') == false) 
		{
			redirect('Home');
		} else
			{
				$this->load->model('pinjam/m_pinjam');
			}
	}

	function get()
	{
		$url = $this->uri->segment('1');

		if ($url == 'pinjam') 
		{
			$this->load->view('errors/v_404');
		} else
			{	
				if ($this->session->userdata('masuk') == true) 
				{
					$id = $this->session->userdata('id');
					$data['j_menu'] = "Data";
					$data['judul'] = "Buku Pinjaman Saya";
					$data['pinjaman'] = $this->m_pinjam->get($id);

					$this->load->view('template/v_header',$data);
					$this->load->view('pinjam/v_pinjaman');
					$this->load->view('template/v_footer');
				} else
				{
					redirect('Home');
				}
			}
	}

	function pinjam($id)
	{
		$id_buku = base64_decode($id);

		// cek apa sudah meminjam

		$id_member = $this->session->userdata('id');
		$pinjam = $this->db->get_where('pinjam',['id_member' => $id_member,'id_buku' => $id_buku])->result_array();
		if ($pinjam) 
		{
			$pesan = "* Anda sudah Meminjam Buku Ini *";
		} else
			{
				$pesan = '';
			}
		// end cek
		$role = $this->session->userdata('role_id');
		if ($role != 2) 
		{
			redirect('Tabel_buku');
		} else
			{
				$data['pesan'] = $pesan;
				$data['buku'] = $this->m_pinjam->pinjam($id_buku);
				$data['j_menu'] = 'Buku';
				$data['judul'] = 'Pinjam Buku';
				$this->load->view('template/v_header',$data);
				$this->load->view('pinjam/v_pinjam');
				$this->load->view('template/v_footer');
			}
	}

	function create_pinjam()
	{
		$id_buku = $this->input->post('id_buku');
		$id_member = $this->input->post('id_member');
		$tgl_pinjam = $this->input->post('tgl_pinjam');
		$jml_buku = $this->input->post('jumlah');
		$jml = $this->db->get_where('stock_buku',['id_buku' => $id_buku])->row_array();
		$max = $jml['tersedia'];

		$this->form_validation->set_rules('jumlah','Jumlah','required|numeric|less_than_equal_to['.$max.']|greater_than_equal_to[1]',
			[
				'required' => 'Masukan Jumlah Buku',
				'numeric' => 'Masukan Hanya Angka',
				'less_than_equal_to' => 'Maksimal Pinjam '.$jml['tersedia']. ' buku',
				'greater_than_equal_to' => 'Minimal Pinjam 1 Buku',
			]);
		$this->form_validation->set_rules('tgl_pinjam','Tanggal Pinjam','required|callback_today',
			[
				'required' => 'Masukan Tanggal Pinjam Buku',
			]);

		if ($this->form_validation->run() == false) 
		{
			// cek apa sudah meminjam

			$id_member = $this->session->userdata('id');
			$pinjam = $this->db->get_where('pinjam',['id_member' => $id_member,'id_buku' => $id_buku])->result_array();
			if ($pinjam) 
			{
				$pesan = "* Anda sudah Meminjam Buku Ini *";
			} else
				{
					$pesan = '';
				}
			// end cek
			$data['pesan'] = $pesan;
			$data['buku'] = $this->m_pinjam->pinjam($id_buku);
			$data['j_menu'] = 'Buku';
			$data['judul'] = 'Pinjam Buku';
			$this->load->view('template/v_header',$data);
			$this->load->view('pinjam/v_pinjam');
			$this->load->view('template/v_footer');
		} else
			{
				// kode pinjam : BK$id_buku-$date
				date_default_timezone_set('Asia/Jakarta');
				$date = date('Y-m-d H:i:s');
				$tgl = date('Y-m-d');
				$max = $this->db->get('lama_pinjam')->row_array();
				$tgl_max = date('Y-m-d',strtotime('+'.$max['lama_pinjam'].'days', strtotime($tgl)));

				$pinjam = array(
					'id_member' => $id_member,
					'id_buku' => $id_buku,
					'jumlah_pinjam' => $jml_buku,
					'tanggal_pinjam' => $tgl_pinjam,
					'max_tgl_kembali' => $tgl_max,
					'date_created' => $date
				);

				$ktgl = date('dmy');
				$kpinjam = "BK".$id_buku."-".$ktgl."-";
				$jml_karakter = strlen($kpinjam);

				$this->db->like('kode_pinjam',$kpinjam);
				$this->db->select_max('kode_pinjam');
				$cek = $this->db->get('pinjam')->row_array();

				if ($cek) 
				{
					$subs = substr($cek['kode_pinjam'], $jml_karakter)+1;
					$kode_pinjam = array(
						'kode_pinjam' => $kpinjam.$subs
					);
					$fpinjam = array_merge($pinjam,$kode_pinjam);
					$c_pinjam = $this->m_pinjam->c_pinjam($fpinjam);
				} else
					{
						$kode_pinjam = array(
							'kode_pinjam' => $kpinjam."1"
						);
						die();

						$fpinjam = array_merge($pinjam,$kode_pinjam);
						$c_pinjam = $this->m_pinjam->c_pinjam($fpinjam);
					}



				$hasil_pinjam = $jml['total_pinjam'] + $jml_buku;
				$stok = $jml['jumlah_buku']-$hasil_pinjam;

				$stok_buku = array(
					'total_pinjam' => $hasil_pinjam,
					'tersedia' => $stok
				);

				$u_stock = $this->m_pinjam->u_stock($id_buku,$stok_buku);
				
				if ($c_pinjam and $u_stock) 
				{
					$this->session->set_flashdata('msg','Peminjaman Buku Diajukan, Silahkan Konfirmasi Ke Petugas Perpustakaan');
					redirect('Katalog_Buku');
				}
			}
	}	

	// form_validation
	function today($tgl_pinjam)
	{
		$date = date('Y-m-d');

		$tgl1 = new DateTime($date);
		$tgl2 = new DateTime($tgl_pinjam);

		$diff = $tgl2->diff($tgl1);
		$total = $diff->d+1;

		if ($tgl2 < $tgl1) 
		{
			$this->form_validation->set_message('today','Minimal Mulai Pinjam Adalah Hari ini '.tgl_indo($date).'');
			return false;
		} else if ($tgl_pinjam == $date) 
			{
				return true;
			} else if ($total >= 1) 
				{
					return TRUE;
				} else
					{
						$this->form_validation->set_message('today','Minimal Mulai Pinjam Adalah Hari ini '.tgl_indo($date).'');
						return FALSE;
					}

		

	}

	// end form validation

	function ditunda()
	{
		$url = $this->uri->segment(1);
		if ($url == 'pinjam') 
		{
			$this->load->view('errors/v_404');
		} else
			{
				$id = $this->session->userdata('id');
				$data['j_menu'] = 'Data';
				$data['judul'] = 'Pinjaman Ditunda';
				$data['pinjam'] = $this->m_pinjam->ditunda($id);

				$this->load->view('template/v_header',$data);
				$this->load->view('pinjam/v_ditunda');
				$this->load->view('template/v_footer');
			}
	}

	function edit($id)
	{
		$id_pinjam = base64_decode($id);
		$data['j_menu'] = 'Data';
		$data['judul'] = 'Pinjaman Ditunda';
		$data['buku'] = $this->m_pinjam->edit($id_pinjam);
		$this->load->view('template/v_header',$data);
		$this->load->view('pinjam/v_edit');
		$this->load->view('template/v_footer');
	}

	function update_pinjam()
	{
		$id_pinjam = $this->input->post('id_pinjam');
		$id_buku = $this->input->post('id_buku');
		$tgl_pinjam = $this->input->post('tgl_pinjam');
		$jml_buku = $this->input->post('jumlah');

		$this->db->join('stock_buku','stock_buku.id_buku = pinjam.id_buku');
		$old = $this->db->get_where('pinjam',['id_pinjam' => $id_pinjam])->row_array();
		$tgl_lama = $old['tanggal_pinjam'];

		$max = $old['tersedia'];

		$this->form_validation->set_rules('jumlah','Jumlah','required|numeric|less_than_equal_to['.$max.']|greater_than_equal_to[1]',
			[
				'required' => 'Masukan Jumlah Buku',
				'numeric' => 'Masukan Hanya Angka',
				'less_than_equal_to' => 'Maksimal Pinjam '.$max. ' buku',
				'greater_than_equal_to' => 'Minimal Pinjam 1 Buku',
			]);
		$this->form_validation->set_rules('tgl_pinjam','Tanggal Pinjam','required|callback_sameDay['.$tgl_lama.']',
			[
				'required' => 'Masukan Tanggal Pinjam Buku',
			]);

		if ($this->form_validation->run() == false) 
		{
			$data['j_menu'] = 'Data';
			$data['judul'] = 'Pinjaman Ditunda';
			$data['buku'] = $this->m_pinjam->edit($id_pinjam);
			$this->load->view('template/v_header',$data);
			$this->load->view('pinjam/v_edit');
			$this->load->view('template/v_footer');
		} else
			{
				// buku tersedia lama(tabel stok) + jumlah pinjam lama (tabel pinjam)
				$tersedia_lama = $old['tersedia'] + $old['jumlah_pinjam'];
				// hasil tersedia ahir = $tersedia lama - jmlah pinjam pda form
				$tersedia = $tersedia_lama - $jml_buku;

				// total pinjam lama = total pinjam(tabel stok) - jml_pinjam (tabel pinjam)
				$total_pinjam_lama = $old['total_pinjam'] - $old['jumlah_pinjam'];
				// hasil ahir stok total pinjam = total pinjam lama + jumlah buku pada form
				$totalPinjam = $total_pinjam_lama + $jml_buku;

				$stok = array(
					'total_pinjam' => $totalPinjam,
					'tersedia' => $tersedia
				);

				$u_stock = $this->m_pinjam->u_stock($id_buku,$stok);

				date_default_timezone_set('Asia/Jakarta');
				$date = date('Y-m-d H:i:s');
				$pinjam = array(
					'id_buku' => $id_buku,
					'jumlah_pinjam' => $jml_buku,
					'tanggal_pinjam' => $tgl_pinjam,
					'date_created' => $date
				);

				$update = $this->m_pinjam->update($id_pinjam,$pinjam);


				
				if ($update and $u_stock) 
				{
					$this->session->set_flashdata('msg','Berhasil Diubah, Silahkan Konfirmasi Ke Petugas Perpustakaan');
					redirect('Tertunda');
				}
			}
	}

	// form validation
	function sameDay($tgl_pinjam,$tgl_lama)
	{
		if ($tgl_pinjam != $tgl_lama) 
		{
			$this->form_validation->set_message('sameDay','Tanggal Peminjaman Tidak Boleh Diubah');
			return false;
		} else
			{
				return true;
			}
	}

	function hapus($id)
	{
		$id_pinjam = base64_decode($id);

		$this->db->join('stock_buku','stock_buku.id_buku = pinjam.id_buku');
		$old = $this->db->get_where('pinjam',['id_pinjam' => $id_pinjam])->row_array();

		$id_buku = $old['id_buku'];
		$jumlah_pinjam = $old['jumlah_pinjam'];

		$stok = array(
			'total_pinjam' => $old['total_pinjam']-$old['jumlah_pinjam'],
			'tersedia' => $old['tersedia']+$old['jumlah_pinjam']
		);

		$this->db->where('id_buku',$id_buku);
		$this->db->update('stock_buku',$stok);
		$this->db->delete('pinjam',['id_pinjam' => $id_pinjam]);
		
		$this->session->set_flashdata('hps','Pengajuan Pinjaman Buku DIhapus');
		redirect('Tertunda');
	}

	// jquery
	function notif() 
	{
		$cek = $this->m_pinjam->notif();
		echo json_encode($cek);
	}


	function gagal()
	{
		$id = $this->session->userdata('id');

		$data['j_menu'] = "Data";
		$data['judul'] = "Pinjaman Gagal";
		$data['gagal'] = $this->m_pinjam->gagal($id);
		$this->load->view('template/v_header',$data);
		$this->load->view('pinjam/v_gagal');
		$this->load->view('template/v_footer');
	}

	function riwayat_pinjam($offset = 0)
	{
		$riwayat = $this->db->get('riwayat_pinjam');
		$total = $riwayat->num_rows();



		$config['base_url'] = base_url('pinjam/pinjam/riwayat_pinjam');
		$config['total_rows'] = $total;
		$config['per_page'] = 20;

		$config['full_tag_open'] = '<nav aria-label="Page navigation example"> <ul class="pagination">';
		$config['full_tag_close'] = '</nav> </ul>';

		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li">';

		$config['last_link'] = 'last';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li">';

		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_open'] = '</li>';

		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_open'] = '</li>';

		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] = '</a><li>';

		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '<li>';

		$config['attributes'] = array('class' => 'page-link');

		$this->pagination->initialize($config);
		$id = $this->session->userdata('id');

		$data['riwayat'] = $this->m_pinjam->riwayat($config['per_page'],$offset,$id);
		$data['halaman'] = $this->pagination->create_links();
		$data['offset'] = $offset;

		$data['j_menu'] = 'Data';
		$data['judul'] = 'Riwayat Peminjaman';
		$this->load->view('template/v_header',$data);
		$this->load->view('pinjam/v_riwayat');
		$this->load->view('template/v_footer');
	}

}
?>