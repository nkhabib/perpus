<?php 

class Member extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('masuk') !=TRUE) 
		{
			$url=base_url();
			redirect($url);
		} else
			{
				$this->load->model('member/m_member');
			}
	}

	function get_member($offset=0)
	{
		$member = $this->db->get('member');

		$config['base_url'] = base_url().'member/member/get_member';
		$config['total_rows'] = $member->num_rows();
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

		$data['halaman'] = $this->pagination->create_links();
		$data['offset'] = $offset;

		$data['status'] = '';
		$data['data'] = $this->m_member->get_member($config['per_page'],$offset);
		$data['j_menu'] = 'User';
		$data['judul'] = 'Member';
		$this->load->view('template/v_header',$data);
		$this->load->view('member/v_member');
		$this->load->view('template/v_footer');

	}

	function create()
	{
		$url = $this->uri->segment(1);
		if ($url == 'member') 
		{
			$this->load->view('errors/v_404');
		} else
			{
				$this->form_validation->set_rules('id_number','NO ID','trim|required|numeric|min_length[15]|max_length[17]|is_unique[member.id_number]',
					[
						'is_unique' => 'NO ID Sudah Digunakan',
						'required' => 'NO ID Harus Diisi',
						'numeric' => 'No ID Berupa Angka',
						'min_length' => 'NO ID Minimal 15 Digit',
						'max_length' => 'NO ID Maksimal 17 Digit',
					]);
				$this->form_validation->set_rules('nama','Nama','required|min_length[3]|max_length[500]',
					[
						'required' => 'Nama Harus Diisi',
						'min_length' => 'Nama Minimal 3 Karakter',
						'max_length' => 'Nama Maksimal 500 Karakter',
					]);
				$this->form_validation->set_rules('alamat','Alamat','required|min_length[20]|max_length[500]',
					[
						'required' => 'Alamat Harus Diisi',
						'min_length' => 'Alamat Minimal 20 Karakter',
						'max_length' => 'Alamat Maksimal 500 Karakter',
					]);
				$this->form_validation->set_rules('provesi','Provesi','required|min_length[5]|max_length[500]',
					[
						'required' => 'Provesi Harus Diisi',
						'min_length' => 'Provesi Minimal 5 Karakter',
						'max_length' => 'Provesi Maksimal 500 Karakter',
					]);
				$this->form_validation->set_rules('kodepos','Kode Pos','required|numeric|min_length[5]|max_length[6]',
					[
						'required' => 'Kode Pos Harus Diisi',
						'numeric' => 'Kode Pos Berupa Angka',
						'min_length' => 'Kode Pos Minimal 5 Angka',
						'max_length' => 'Kode Pos Maksimal 6 Angka',
					]);
				$this->form_validation->set_rules('email','Email','required|valid_email|is_unique[member.email]',
					[
						'is_unique' => 'Email Sudah Terdaftar',
						'required' => 'Email Harus Diisi',
						'valid_email' => 'Email Tidak Valid',
					]);
				$this->form_validation->set_rules('telepon','Nomor Telepon','required|numeric|min_length[10]|max_length[12]',
					[
						'required' => 'Nomor Telepon Harus Diisi',
						'numeric' => 'Nomor Telepon Berupa Angka',
						'min_length' => 'Nomor Telepon Minimal 10 Nomor',
						'max_length' => 'Nomor Telepon Maksimal 12 Nomor',
					]);
				$this->form_validation->set_rules('password1','Password','required|min_length[3]|max_length[20]|matches[password2]',
					[
						'required' => 'Password Harus Diisi',
						'min_length' => 'Password Minimal 3 Karakter',
						'max_length' => 'Password Maksimal 20 Karakter',
						'matches' => 'Password Tidak Sama',
					]);
				$this->form_validation->set_rules('password2','Password','required|min_length[3]|max_length[20]|matches[password1]',
					[
						'required' => 'Password Harus Diisi',
						'min_length' => 'Password Minimal 3 Karakter',
						'max_length' => 'Password Maksimal 20 Karakter',
						'matches' => 'Password Tidak Sama',
					]);
				if ($this->form_validation->run() == false) 
				{
					$data['j_menu'] = 'Form';
					$data['judul'] = 'Tambah Member';
					$this->load->view('template/v_header',$data);
					$this->load->view('member/v_create');
					$this->load->view('template/v_footer');
				} else
					{
						$idNumber = $this->input->post('id_number');
						$nama = $this->input->post('nama');
						$alamat = $this->input->post('alamat');
						$provesi = $this->input->post('provesi');
						$kodepos = $this->input->post('kodepos');
						$email = $this->input->post('email');
						$telepon = $this->input->post('telepon');
						$pass = $this->input->post('password1');

						$member = array(
							'id_number' => $idNumber,
							'nama' => $nama,
							'email' => $email,
							'no_telepon' => $telepon,
							'provesi' => $provesi,
							'alamat' => $alamat,
							'kodepos' => $kodepos,
							'password' => password_hash($pass, PASSWORD_DEFAULT),
							'role_id' => 2,
							'date_created' => time(),
							'active' => 1,
						);

						$add = $this->m_member->create($member);

						if ($add) 
						{
							$this->session->set_flashdata('msg','Member Ditambahkan !!');
							redirect('Member');
						} else
							{
								$this->session->set_flashdata('gagal','Member Gagal Ditambahkan !!');
								redirect('Member');
							}
					}
			}
	}

	function insert()
	{
		if ($this->session->userdata('masuk')=="admin") 
		{
			$this->form_validation->set_rules('nama','Nama','required',
			[
				'required' => '*Nama Tidak Boleh Kosong*',
			]);

			$this->form_validation->set_rules('username','Username','required|trim|is_unique[admin.username]|min_length[3]',
				[
					'required' => '*Username Tidak Boleh Kosong*',
					'is_unique' => '*Username Sudah Ada',
					'min_length' => '*Minimal 3 Karakter',
				]);

			$this->form_validation->set_rules('password','Password','required|trim',
				[
					'required' => '*Password Tidak Boleh Kosong*',
				]);

			if ($this->form_validation->run()==false) 
			{
				$data['judul'] = "Tambah Member";
				$this->load->view('user/template/header',$data);
				$this->load->view('member/v_input');
				$this->load->view('user/template/footer');
			} else
				{

					$nama = $this->input->post('nama');
					$username = $this->input->post('username');
					$pass = $this->input->post('password');

					$data = array(
						'nama' => $nama,
						'username' => $username,
						'password' => password_hash($pass, PASSWORD_DEFAULT),
					);

					$add = $this->m_member->insert($data);

					if ($add) 
					{
						echo $this->session->set_flashdata('msg','Member ditambahkan');
						redirect('member/member/get_member');
					} else
						{
							echo "gagal tambah member";
						}
				}
		}
		

	}

	function editMember($id)
	{
		if ($this->session->userdata('role_id') != 2) 
		{
			$idMember = base64_decode($id);
			$data['member'] = $this->db->get_where('member',['id'=>$idMember])->row_array();
			$data['j_menu'] = 'User';
			$data['judul'] = "Edit Member";

			$this->load->view('template/v_header',$data);
			$this->load->view('member/v_edit');
			$this->load->view('template/v_footer');
		} else
			{
				redirect('Logout');
			}

	}

	function update()
	{
		if ($this->session->userdata('role_id') != 2) 
		{
			$url = $this->uri->segment(1);
			if ($url == 'member') 
			{
				$this->load->view('errors/v_404');
			} else
				{
					$id_member = $this->input->post('id_member');
					$idNumber = $this->input->post('id_number');
					$nama = $this->input->post('nama');
					$alamat = $this->input->post('alamat');
					$provesi = $this->input->post('provesi');
					$kodepos = $this->input->post('kodepos');
					$email = $this->input->post('email');
					$telepon = $this->input->post('telepon');
					$pass1 = $this->input->post('password1');
					$pass2 = $this->input->post('password2');

					$old_member = $this->db->get_where('member',['id' => $id_member])->row_array();

					if ($idNumber != $old_member['id_number']) 
					{
						$this->form_validation->set_rules('id_number','NO ID','trim|required|numeric|min_length[15]|max_length[17]|is_unique[member.id_number]',
							[
								'is_unique' => 'NO ID '.$idNumber.' Sudah Digunakan',
								'required' => 'NO ID Harus Diisi',
								'numeric' => 'No ID Berupa Angka',
								'min_length' => 'NO ID Minimal 15 Digit',
								'max_length' => 'NO ID Maksimal 17 Digit',
							]);
					}

					$this->form_validation->set_rules('nama','Nama','required|min_length[3]|max_length[500]',
						[
							'required' => 'Nama Harus Diisi',
							'min_length' => 'Nama Minimal 3 Karakter',
							'max_length' => 'Nama Maksimal 500 Karakter',
						]);
					$this->form_validation->set_rules('alamat','Alamat','trim|required|min_length[20]|max_length[500]',
						[
							'required' => 'Alamat Harus Diisi',
							'min_length' => 'Alamat Minimal 20 Karakter',
							'max_length' => 'Alamat Maksimal 500 Karakter',
						]);
					$this->form_validation->set_rules('provesi','Provesi','required|min_length[5]|max_length[500]',
						[
							'required' => 'Provesi Harus Diisi',
							'min_length' => 'Provesi Minimal 5 Karakter',
							'max_length' => 'Provesi Maksimal 500 Karakter',
						]);
					$this->form_validation->set_rules('kodepos','Kode Pos','required|numeric|min_length[5]|max_length[6]',
						[
							'required' => 'Kode Pos Harus Diisi',
							'numeric' => 'Kode Pos Berupa Angka',
							'min_length' => 'Kode Pos Minimal 5 Angka',
							'max_length' => 'Kode Pos Maksimal 6 Angka',
						]);

					if ($email != $old_member['email']) 
					{
						$this->form_validation->set_rules('email','Email','required|valid_email|is_unique[member.email]',
							[
								'is_unique' => 'Email '.$email.' Sudah Digunakan',
								'required' => 'Email Harus Diisi',
								'valid_email' => 'Email Tidak Valid',
							]);
					}

					$this->form_validation->set_rules('telepon','Nomor Telepon','trim|required|min_length[10]|max_length[12]',
						[
							'required' => 'Nomor Telepon Harus Diisi',
							'min_length' => 'Nomor Telepon Minimal 10 Nomor',
							'max_length' => 'Nomor Telepon Maksimal 12 Nomor',
						]);
					if ($pass1 != '' or $pass2 != '') 
					{
						
						$this->form_validation->set_rules('password1','Password','min_length[3]|max_length[20]|matches[password2]',
							[
								'min_length' => 'Password Minimal 3 Karakter',
								'max_length' => 'Password Maksimal 20 Karakter',
								'matches' => 'Password Tidak Sama',
							]);
						$this->form_validation->set_rules('password2','Password','min_length[3]|max_length[20]|matches[password1]',
							[
								'min_length' => 'Password Minimal 3 Karakter',
								'max_length' => 'Password Maksimal 20 Karakter',
								'matches' => 'Password Tidak Sama',
							]);
					}


					if ($this->form_validation->run() == false) 
					{
						$data['member'] = $old_member;
						$data['j_menu'] = 'User';
						$data['judul'] = "Edit Member";

						$this->load->view('template/v_header',$data);
						$this->load->view('member/v_edit');
						$this->load->view('template/v_footer');
					} else
						{
							if ($pass1 != '') 
							{
								$new_password = password_hash($pass1,PASSWORD_DEFAULT);
								$member = array(
									'id_number' => $idNumber,
									'nama' => $nama,
									'email' => $email,
									'no_telepon' => $telepon,
									'provesi' => $provesi,
									'alamat' => $alamat,
									'kodepos' => $kodepos,
									'password' => $new_password,
									'role_id' => 2,
								);
							} else
								{
									$member = array(
										'id_number' => $idNumber,
										'nama' => $nama,
										'email' => $email,
										'no_telepon' => $telepon,
										'provesi' => $provesi,
										'alamat' => $alamat,
										'kodepos' => $kodepos,
										'role_id' => 2,
									);
								}


							$update = $this->m_member->update($id_member,$member);

							if ($update) 
							{
								$this->session->set_flashdata('msg','Member Diupdate !!');
								redirect('Member');
							} else
								{
									$this->session->set_flashdata('gagal','Member Gagal Diupdate !!');
									redirect('Member');
								}
						}
				}
		} else
			{
				$this->load->view('errors/v_404');
			}
	}

	function hapusMember($id)
	{
		if ($this->session->userdata('role_id') != 2) 
		{
			$id_member = base64_decode($id);

			$del = $this->db->delete('member',['id' => $id_member]);

			if ($del) 
			{
				$this->session->set_flashdata('msg','Member Dihapus !!');
				redirect('Member');
			} else
				{
					$this->session->set_flashdata('gagal','Member Gagal Dihapus !!');
					redirect('Member');
				}
		}
	}
}
?>