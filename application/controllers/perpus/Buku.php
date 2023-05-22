<?php
class Buku extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('buku/m_buku');
	}

	function insert()
	{
		if ($this->session->userdata('role_id') == 1) 
		{
			$url = $this->uri->segment(1);
			if ($url == 'perpus') 
			{
				$this->load->view('errors/v_404');
			} else
				{
					$this->form_validation->set_rules('judul','Judul','required',
						[
							'required' => 'Judul Harus Diisi',
						]);
					$this->form_validation->set_rules('author','Author','required',
						[
							'required' => 'Author Harus Diisi',
						]);
					$this->form_validation->set_rules('penerbit','Penerbit','required',
						[
							'required' => 'Penerbit Harus Diisi',
						]);
					$this->form_validation->set_rules('tahun','Tahun Terbit','required|numeric|min_length[4]',
						[
							'required' => 'Tahun Terbit Harus Diisi',
							'numeric' => 'Tahun Hanya Berupa Angka',
							'min_length' => 'Minimal 4 Karakter',
						]);
					$this->form_validation->set_rules('tgl','Tanggal Terbit','required',
						[
							'required' => 'Tanggal Terbit Harus Diisi',
						]);
					$this->form_validation->set_rules('isbn','Isbn','numeric|min_length[13]|is_unique[buku.isbn]',
						[
							'numeric' => 'ISBN Hanya Berupa Angka',
							'min_length' => 'ISBN Minimal 13 Angka',
						]);
					$this->form_validation->set_rules('jumlah','Jumlah','required|numeric',
						[
							'required' => 'Jumlah Harus Diisi',
							'numeric' => 'Jumlah Berupa Angka',
						]);

					if ($this->form_validation->run() == false) 
					{
						$data['error'] = '';
						$data['j_menu'] = 'Form';
						$data['judul'] = 'Tambah Buku';
						$this->load->view('template/v_header',$data);
						$this->load->view('buku/v_insert');
						$this->load->view('template/v_footer');
					} else
						{
							$judul = $this->input->post('judul');
							$author = $this->input->post('author');
							$penerbit = $this->input->post('penerbit');
							$tahun = $this->input->post('tahun');
							$tgl = $this->input->post('tgl');
							$isbn = $this->input->post('isbn');
							$foto = $this->input->post('foto');
							$jml = $this->input->post('jumlah');


							$image = $_FILES['foto']['name'];
							if ($image) 
							{
								$config['upload_path'] = './assets/images/buku/';
					            $config['allowed_types'] = 'gif|jpg|png';
					            $config['max_size'] = 450;
					            // $config['max_width'] = 1024;
					            // $config['max_height'] = 768;

					            $this->load->library('upload',$config);

					            $this->upload->initialize($config);

					            if ($this->upload->do_upload('foto')) 
					            {
					            	$buku = array(
					            		'judul' => $judul,
					            		'author' => $author,
					            		'penerbit' => $penerbit,
					            		'tahun_terbit' => $tahun,
					            		'tanggal_terbit' => $tgl,
					            		'isbn' => $isbn,
					            		'foto' => $this->upload->data('file_name'),
					            		'jumlah' => $jml,
					            	);

					            	$insert = $this->m_buku->insert($buku);
					            	if ($insert) 
					            	{
					            		$this->session->set_flashdata('msg','Buku Ditambahkan');
					            		redirect('Tabel_buku');
					            	} else
					            		{
					            			$this->session->set_flashdata('gagal','Buku Gagal Ditambahkan');
					            			redirect('Tabel_buku');
					            		}
					            } else
					            	{
					            		$error = $this->upload->display_errors();
					            		$data['error'] = $error;
										$data['j_menu'] = 'Form';
										$data['judul'] = 'Tambah Buku';
										$this->load->view('template/v_header',$data);
										$this->load->view('buku/v_insert');
										$this->load->view('template/v_footer');
					            	}
							} else
								{
									$buku = array(
					            		'judul' => $judul,
					            		'author' => $author,
					            		'penerbit' => $penerbit,
					            		'tahun_terbit' => $tahun,
					            		'tanggal_terbit' => $tgl,
					            		'isbn' => $isbn,
					            		'foto' => 'default.jpg',
					            		'jumlah' => $jml,
					            	);

					            	$insert = $this->m_buku->insert($buku);
					            	if ($insert) 
					            	{
					            		$this->session->set_flashdata('msg','Buku Ditambahkan');
					            		redirect('Tabel_buku');
					            	} else
					            		{
					            			$this->session->set_flashdata('gagal','Buku Gagal Ditambahkan');
					            			redirect('Tabel_buku');
					            		}
								}
						}
				}

		} else
			{
				redirect('Logout');
			}
	}
}
 ?>