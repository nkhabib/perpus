<?php

class Buku extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('buku/m_buku');
	}

	function cari()
	{
		$buku = $this->input->post('buku');
		$autor = $this->input->post('autor');
		$penerbit = $this->input->post('penerbit');

		echo "$buku";
		echo "$autor";
		echo "$penerbit";
	}

	function katalog($offset = 0)
	{
		// $url = $this->uri->segment(1);
		// if ($url == 'buku') 
		// {
		// 	$this->load->view('errors/v_404');
		// } else
		// 	{

				$buku = $this->db->get('buku');
				$total = $buku->num_rows();



				$config['base_url'] = base_url('buku/buku/katalog');
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

				$this->db->select('visit');
				$visit = $this->db->get('visit')->row_array();
				$max = max($visit);

				$data['role'] = $this->session->userdata('role_id');
				$data['max'] = $max;
				$data['buku'] = $this->m_buku->katalog($config['per_page'],$offset);
				$data['halaman'] = $this->pagination->create_links();
				$data['offset'] = $offset;
				$data['j_menu'] = 'Buku';
				$data['judul'] = 'Katalog Buku';

				$this->load->view('template/v_header',$data);
				$this->load->view('buku/v_katalog');
				$this->load->view('template/v_footer');
			// }
	}

	function detail($idBuku)
	{
		$id = base64_decode($idBuku);
		// cek visit
		$db = $this->db->get_where('visit',['id_buku' => $id]);
		$cek = $db->num_rows();

		if ($cek == 0) 
		{
			$visit = array(
				'id_buku' => $id,
				'visit' => 1
			);

			$this->m_buku->insert_visit($visit);
		} else
			{
				$click = $db->row_array();
				$hasil = $click['visit']+1;
				$update = array(
					'visit' => $hasil
				);
				$this->m_buku->update_visit($id,$update);
			}
		// end cek visit

		$this->db->delete('visit',['id_buku' => 0]);
			
		$data['j_menu'] = 'Buku';
		$data['judul'] = 'Detail Buku';
		$data['buku'] = $this->m_buku->detail($id);
		$this->load->view('template/v_header',$data);
		$this->load->view('buku/v_detail');
		$this->load->view('template/v_footer');
	}

}
?>