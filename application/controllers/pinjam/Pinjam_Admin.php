<?php
class Pinjam_Admin extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('masuk') == true) 
		{
			if ($this->session->userdata('role_id') == 2) 
			{
				$this->load->view('errors/v_404');
			} else
				{
					$this->load->model('pinjam/m_pinjam_admin');
					$this->m_pinjam_admin->auto_delete();
				}
		} else
			{
				redirect('Logout');
			}
	}

	function pengajuan()
	{
		$url = $this->uri->segment(1);
		if ($url == 'pinjam') 
		{
			$this->load->view('errors/v_404');
		} else
			{
				$data['j_menu'] = 'Pinjaman Buku';
				$data['judul'] = 'Pengajuan Pinjam Buku';
				$data['pengajuan'] = $this->m_pinjam_admin->pengajuan();

				$this->load->view('template/v_header',$data);
				$this->load->view('pinjam/v_pengajuan');
				$this->load->view('template/v_footer');
			}
	}

	function setuju($id)
	{
		$id_pinjam = base64_decode($id);
		$pinjam = array(
			'status' => 1,
			'id_petugas' => $this->session->userdata('id')
		);

		$update = $this->m_pinjam_admin->setuju($id_pinjam,$pinjam);

		if ($update) 
		{
			$this->session->set_flashdata('msg','Pinjaman Disetujui');
			redirect('Pengajuan_Pinjam');
		}
	}

	function tidakSetuju($id)
	{
		$data['id_pinjam'] = $id;
		$data['j_menu'] = 'Pinjaman Buku';
		$data['judul'] = 'Alasan Tidak Disetujui';
		$this->load->view('template/v_header',$data);
		$this->load->view('pinjam/v_alasan');
		$this->load->view('template/v_footer');
	}

	function alasan()
	{
		$id = $this->input->post('id_pinjam');
		$this->form_validation->set_rules('alasan','Alasan','required|min_length[10]',
			[
				'required' => 'Alasan Harus Diisi',
				'min_length' => 'Alasan Minimal 10 Karakter'
			]);

		if ($this->form_validation->run() == false) 
		{
			$data['id_pinjam'] = $id;
			$data['j_menu'] = 'Pinjaman Buku';
			$data['judul'] = 'Alasan Tidak Disetujui';
			$this->load->view('template/v_header',$data);
			$this->load->view('pinjam/v_alasan');
			$this->load->view('template/v_footer');
		} else
			{
				$id_pinjam = base64_decode($id);
				$alasan = $this->input->post('alasan');

				$update = $this->m_pinjam_admin->alasan($id_pinjam,$alasan);

				if ($update) 
				{
					$this->session->set_flashdata('msg','Buku Tidak Disetujui');
					redirect('Pengajuan_Pinjam');
				}
			}
	}

	function dipinjam($offset = 0)
	{
		$total = $this->db->get_where('pinjam',['status' => 1])->num_rows();
		$config['base_url'] = base_url('pinjam/pinjam_admin/dipinjam');
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

		$data['j_menu'] = 'Pinjaman Buku';
		$data['judul'] = 'Buku Dipinjam';
		$data['dipinjam'] = $this->m_pinjam_admin->dipinjam($config['per_page'],$offset);
		$data['halaman'] = $this->pagination->create_links();
		$data['offset'] = $offset;

		$this->load->view('template/v_header',$data);
		$this->load->view('pinjam/v_dipinjam');
		$this->load->view('template/v_footer');
	}

	function denda()
	{
		$url = $this->uri->segment(1);
		if ($url == 'Pinjam') 
		{
			$this->load->view('errors/v_404');
		} else
			{
				$data['j_menu'] = 'Pinjaman Buku';
				$data['judul'] = 'Denda Terlambat';
				$data['denda'] = $this->db->get('denda')->row_array();

				$this->load->view('template/v_header',$data);
				$this->load->view('pinjam/v_denda');
				$this->load->view('template/v_footer');
			}
	}

	function nominal()
	{
		$url = $this->uri->segment(1);
		if ($url == 'pinjam') 
		{
			$this->load->view('errors/v_404');
		} else
			{	
				$this->form_validation->set_rules('denda','Denda','required|numeric|less_than_equal_to[9000]|greater_than_equal_to[500]',
					[
						'required' => 'Jumlah denda harus diisi',
						'numeric' => 'Masukan hanya berupa angka',
						'greater_than_equal_to' => 'Denda miniamal Rp.500,00',
						'less_than_equal_to' => 'Denda maksimal Rp.10.000,00'
					]);

				$nominal = $this->db->get('denda');
				if ($this->form_validation->run() == false) 
				{
					$data['denda'] = $nominal->row_array();
					$data['j_menu'] = 'Pinjaman Buku';
					$data['judul'] = 'Denda Terlambat';

					$this->load->view('template/v_header',$data);
					$this->load->view('pinjam/v_nominal');
					$this->load->view('template/v_footer');
				} else
					{
						$denda = $this->input->post('denda');
						if ($nominal->num_rows() != 0) 
						{
							$db = $nominal->row_array();
							$this->db->where('id_denda',$db['id_denda']);
							$this->db->set('denda', $denda);
							$update = $this->db->update('denda');

							if ($update) 
							{
								$this->session->set_flashdata('msg','Denda diupdate');
								redirect('Denda');
							}
						} else
							{
								$this->db->set('denda', $denda);
								$insert = $this->db->insert('denda');
								$this->session->set_flashdata('msg','Denda ditetapkan');
								redirect('Denda');
							}
					}
			}
	}

	function lama()
	{
		$url = $this->uri->segment(1);

		if ($url != 'pinjam') 
		{
			$db = $this->db->get('lama_pinjam');

			$data['lama_pinjam'] = $db;
			$data['j_menu'] = 'Pinjaman Buku';
			$data['judul'] = 'Lama Pinjaman';

			$this->load->view('template/v_header',$data);
			$this->load->view('pinjam/v_lama');
			$this->load->view('template/v_footer');
		} else
			{
				$this->load->view('errors/v_404');
			}
	}

	function maksimal()
	{
		$url = $this->uri->segment(1);
		if ($url != 'pinjam') 
		{
			$this->form_validation->set_rules('maksimal','Maksimal','required|numeric',
				[
					'required' => 'Maksimal peminjaman harus diisi',
					'numeric' => 'Maksimal peminjaman hanya berupa angka'
				]);

			if ($this->form_validation->run() == false) 
			{
				$data['maksimal'] = $this->db->get('lama_pinjam')->row_array();
				$data['j_menu'] = 'Pinjaman Buku';
				$data['judul'] = 'Lama Peminjaman';
				$this->load->view('template/v_header',$data);
				$this->load->view('pinjam/v_maksimal');
				$this->load->view('template/v_footer');
			} else
				{
					$max = $this->input->post('maksimal');
					$cek = $this->db->get('lama_pinjam');

					if ($cek->num_rows() != 0) 
					{
						$db = $cek->row_array();
						$this->db->where('id_lm',$db['id_lm']);
						$this->db->set('lama_pinjam',$max);
						$update = $this->db->update('lama_pinjam');
						if ($update) 
						{
							$this->session->set_flashdata('msg','Maksimal lama peminjaman diupdate');
							redirect('Lama');
						} else
							{
								$this->session->set_flashdata('gagal','Maksimal lama peminjaman gagal diupdate');
								redirect('Lama');
							}
					} else
						{
							$this->db->set('lama_pinjam',$max);
							$insert = $this->db->insert('lama_pinjam');

							if ($insert) 
							{
								$this->session->set_flashdata('msg','Maksimal lama peminjaman telah dibuat');
								redirect('Lama');
							} else
								{
									$this->session->set_flashdata('gagal','Maksimal lama peminjaman gagal dibuat');
									redirect('Lama');
								}
						}
				}
		} else
			{
				$this->load->view('errors/v_404');
			}
	}
}
?>