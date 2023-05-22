<?php
class Buku_Admin extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('role_id') == 1 or $this->session->userdata('role_id') == 6) 
		{
			$this->load->model('admin/m_BukuAdmin');
		} else
			{
				redirect('Logout');
			}
	}

	function insert()
	{
		$url = $this->uri->segment(1);
		if ($url == 'buku') 
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
				$this->form_validation->set_rules('kategori','Kategori','required',
					[
						'required' => 'Kategori Harus Diisi',
					]);
				$this->form_validation->set_rules('isbn','Isbn','numeric|min_length[13]|is_unique[buku.isbn]',
					[
						'numeric' => 'ISBN Hanya Berupa Angka',
						'min_length' => 'ISBN Minimal 13 Angka',
					]);
				$this->form_validation->set_rules('sinopsis','sinopsis','min_length[200]',
					[
						'min_length' => 'Minimal 200 Karakter',
					]);
				$this->form_validation->set_rules('jumlah','Jumlah','required|numeric',
					[
						'required' => 'Jumlah Harus Diisi',
						'numeric' => 'Jumlah Berupa Angka',
					]);

					$kategori = $this->m_BukuAdmin->kategori();
					$data['kategori'] = $kategori;
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
						$sinopsis = $this->input->post('sinopsis');
						$isbn = $this->input->post('isbn');
						$kategori = $this->input->post('kategori');
						$jml = $this->input->post('jumlah');

		            	$buku = array(
		            		'judul' => $judul,
		            		'author' => $author,
		            		'penerbit' => $penerbit,
		            		'tahun_terbit' => $tahun,
		            		'tanggal_terbit' => $tgl,
		            		'id_kategori' => $kategori,
		            		'sinopsis' => $sinopsis,
		            		'isbn' => $isbn
		            	);

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
				            	$foto = array(
				            		'foto' => $this->upload->data('file_name')
				            	);

				            	$book = array_merge($buku,$foto);

				            	$insert = $this->m_BukuAdmin->insert($book,$jml);
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
								$foto = array(
				            		'foto' => 'default.jpg'
				            	);

				            	$book = array_merge($buku,$foto);

				            	$insert = $this->m_BukuAdmin->insert($book,$jml);

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
	}

	function tabel_buku($offset=0)
	{
		$buku = $this->db->get('buku');
		$total = $buku->num_rows();



		$config['base_url'] = base_url('admin/Buku_Admin/tabel_buku');
		$config['total_rows'] = $total;
		$config['per_page'] = 10;
		
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


		$data['buku'] = $this->m_BukuAdmin->tabel_buku($config['per_page'],$offset);
		$data['halaman'] = $this->pagination->create_links();
		$data['offset'] = $offset;
		$data['j_menu'] = 'Buku';
		$data['judul'] = 'Tabel Buku';

		$this->load->view('template/v_header',$data);
		$this->load->view('buku/v_tabelBuku');
		$this->load->view('template/v_footer');
	}

	function editBuku($id_buku)
	{
		$id = base64_decode($id_buku);
		$data['error'] = '';
		$data['j_menu'] = 'Buku';
		$data['judul'] = 'Edit Buku';
		$data['buku'] = $this->m_BukuAdmin->edit($id);
		$data['kategori'] = $this->db->get('kategori')->result_array();

		$this->load->view('template/v_header',$data);
		$this->load->view('buku/v_edit');
		$this->load->view('template/v_footer');
	}

	function update_buku()
	{
		$url = $this->uri->segment(1);
		if ($url == 'admin') 
		{
			$this->load->view('errors/v_404');
		} else
			{	
				$id_buku = $this->input->post('id_buku');
				$old_buku = $this->db->get_where('buku',['id_buku' => $id_buku])->row_array();
				$data['j_menu'] = 'Buku';
				$data['judul'] = 'Edit Buku';
				$data['buku'] = $buku;

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
				$this->form_validation->set_rules('sinopsis','sinopsis','min_length[200]',
					[
						'min_length' => 'Minimal 200 Karakter',
					]);
				$this->form_validation->set_rules('kategori','Kategori','required',
					[
						'required' => 'Masukan Kategori',
					]);
				$this->form_validation->set_rules('jumlah','Jumlah','required|numeric',
					[
						'required' => 'Jumlah Harus Diisi',
						'numeric' => 'Jumlah Berupa Angka',
					]);

				if ($this->form_validation->run() == false) 
				{
					$data['error'] = '';
					$this->load->view('template/v_header',$data);
					$this->load->view('buku/v_edit');
					$this->load->view('template/v_footer');
				} else
					{
						$judul = $this->input->post('judul');
						$author = $this->input->post('author');
						$penerbit = $this->input->post('penerbit');
						$tahun = $this->input->post('tahun');
						$tgl = $this->input->post('tgl');
						$sinopsis = $this->input->post('sinopsis');
						$isbn = $this->input->post('isbn');
						// $foto = $this->input->post('foto');
						$jml = $this->input->post('jumlah');


		            	$buku = array(
		            		'judul' => $judul,
		            		'author' => $author,
		            		'penerbit' => $penerbit,
		            		'tahun_terbit' => $tahun,
		            		'tanggal_terbit' => $tgl,
		            		'sinopsis' => $sinopsis,
		            		'isbn' => $isbn
		            	);

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
				            	$old_image = $old_buku['foto'];

				            	// cek gambar lama

				            	if ($old_image != 'default.jpg') 
				            	{
				            		unlink(FCPATH . 'assets/images/buku/' . $old_image);
				            		$foto = array(
				            			'foto' => $this->upload->data('file_name')
				            		);

				            		$book = array_merge($buku,$foto);
				            	}


				            	$update = $this->m_BukuAdmin->update($id_buku,$book,$jml);
				            	if ($update) 
				            	{
				            		$this->session->set_flashdata('msg','Buku Diupdate');
				            		redirect('Tabel_buku');
				            	} else
				            		{
				            			$this->session->set_flashdata('gagal','Buku Gagal Diupdate');
				            			redirect('Tabel_buku');
				            		}
				            } else
				            	{
				            		$error = $this->upload->display_errors();
				            		$data['error'] = $error;
									$this->load->view('template/v_header',$data);
									$this->load->view('buku/v_ed');
									$this->load->view('template/v_footer');
				            	}
						} else
							{

				            	$update = $this->m_BukuAdmin->update($id_buku,$buku,$jml);
				            	if ($update) 
				            	{
				            		$this->session->set_flashdata('msg','Buku Diupdate');
				            		redirect('Tabel_buku');
				            	} else
				            		{
				            			$this->session->set_flashdata('gagal','Buku Gagal Diupdate');
				            			redirect('Tabel_buku');
				            		}
							}
					}
			}
	}

	function hapusBuku($id)
	{
		$id_buku = base64_decode($id);
		$buku = $this->db->get_where('buku',['id_buku' => $id_buku])->row_array();

		if ($buku['foto'] != 'default.jpg') 
		{	
			unlink(FCPATH . 'assets/images/buku/' . $buku['foto']);
		}
		
		$this->db->delete('pinjam',['id_buku' => $id_buku]);
		$this->db->delete('riwayat_pinjam',['id_buku' => $id_buku]);
		$this->db->delete('stock_buku',['id_buku' => $id_buku]);
		$this->db->delete('visit',['id_buku' => $id_buku]);
		$hapus = $this->db->delete('buku',['id_buku' => $id_buku]);

		if ($hapus) 
		{
			$this->session->set_flashdata('msg','Buku Dihapus !!');
			redirect('Tabel_buku');
		} else
			{
				$this->session->set_flashdata('gagal','Buku Gagal Dihapus !!');
				redirect('Tabel_buku');
			}
	}

}
 ?>