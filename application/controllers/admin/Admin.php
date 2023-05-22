<?php

class Admin extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('admin/m_admin');
		$this->load->library('form_validation');
	}

	function input()
	{
		if ($this->session->userdata('role_id') == 1) 
		{
			$url = $this->uri->segment(1);
			if ($url == 'admin') 
			{
				$this->load->view('errors/v_404');
			} else
				{
					$this->form_validation->set_rules('id_number','Id Number','trim|required|min_length[15]|numeric|is_unique[admin.id_number]',
						[
							'is_unique' => '*ID Number Sudah Ada*',
							'required' => '*No ID Harus Diisi*',
							'min_length' => '*Minimal 15 Nomor*',
							'numeric' => '*NO ID Hanya Berupa Angka*',
						]);
					$this->form_validation->set_rules('nama','Nama','trim|required',
						[
							'required' => '*Nama Harus Diisi*',
						]);
					$this->form_validation->set_rules('alamat','Alamat','trim|required|min_length[30]',
						[
							'required' => '*Alamat Harus Diisi*',
							'min_length' => '*Masukan Alamat yang Benar*',
						]);
					$this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[admin.email]',
						[
							'is_unique' => '*Email Sudah Terdaftar*',
							'required' => '*Email Harus Diisi*',
							'valid_email' => '*Email Tidak Valid*',
						]);
					$this->form_validation->set_rules('password1','Password1','trim|required|min_length[3]|matches[password2]',
						[
							'required' => '*Password Harus Diisi*',
							'min_length' => '*Password Minimal 3 Karakter*',
							'matches' => '*Password yang Anda Masukan Berbeda*',
						]);
					$this->form_validation->set_rules('password2','Password2','trim|required|min_length[3]|matches[password1]',
						[
							'required' => '*Password Harus Diisi*',
							'min_length' => '*Password Minimal 3 Karakter*',
							'matches' => '*Password yang Anda Masukan Berbeda*',
						]);
					$this->form_validation->set_rules('role','Role','trim|required',
						[
							'required' => '*Role Harus Diisi*',
						]);

					if ($this->form_validation->run() == FALSE) 
					{
						$data['role'] = $this->db->get('role_user')->result_array();
						$data['j_menu'] = 'Form';
						$data['judul'] = 'Tambah Admin';
						$this->load->view('template/v_header',$data);
						$this->load->view('admin/v_inputadmin');
						$this->load->view('template/v_footer');
					} else
						{
							$idNumber = $this->input->post('id_number');
							$nama = $this->input->post('nama');
							$alamat = $this->input->post('alamat');
							$email = $this->input->post('email');
							$pass = htmlspecialchars($this->input->post('password1'));
							$role = $this->input->post('role');

							$data = array(
								'id_number' => $idNumber,
								'nama' => $nama,
								'alamat' => $alamat,
								'email' => $email,
								'password' => password_hash($pass,PASSWORD_DEFAULT),
								'role_id' => $role,
							);

							$input = $this->m_admin->input($data);

							if ($input) 
							{
								$this->session->set_flashdata('msg','Petugas Ditambahkan');
								redirect('Petugas');
							}
						}


				}
		}
	}


	function admin()
	{
		if ($this->session->userdata('role_id') == 1) 
		{
			$url = $this->uri->segment(1);
			if ($url == 'admin') 
			{
				$this->load->view('errors/v_404');
			} else
				{
					$data['status'] = 'ok';
					$data['j_menu'] = 'User';
					$data['judul'] = 'Admin';
					$data['admin'] = $this->db->get_where('admin',['role_id' => 1])->result_array();

					$this->load->view('template/v_header',$data);
					$this->load->view('admin/v_admin');
					// $this->load->view('template/v_footer');
				}
		} else
			{
				redirect('Logout');
			}
	}

	function input_admin()
	{
		if ($this->session->userdata('role_id') == 1 ) 
		{
			$tipe = $this->input->post('tipe');
			$this->form_validation->set_rules('id_number','ID Number','required|trim|numeric|min_length[15]|is_unique[admin.id_number]',
				[
					'is_unique' => 'ID Number Sudah Terdaftar',
					'required' => 'ID Number harus diisi',
					'numeric' => 'ID Number hanya berupa angka',
					'min_length' => 'Minimal 15 angka',
				]);
			$this->form_validation->set_rules('nama','Nama','required|min_length[3]',
				[
					'required' => 'Nama Harus Diisi',
					'min_length' => 'Minimal 3 Karakter',
				]);
			$this->form_validation->set_rules('alamat','Alamat','required|min_length[20]',
				[
					'required' => 'Alamat Harus Diisi',
					'min_length' => 'Masukan Alamat yang Benar',
				]);
			$this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[admin.email]',
				[
					'is_unique' => 'Email Sudah Terdaftar',
					'required' => 'Email Harus Diisi',
					'valid_email' => 'Masukan Alamat Email yang Benar',
				]);
			$this->form_validation->set_rules('password1','Password','trim|required|min_length[3]|matches[password2]',
				[
					'matches' => 'Password Tidak Sama',
					'required' => 'Password Harus Diisi',
					'min_length' => 'Minimal 3 Karakter',
				]);
			$this->form_validation->set_rules('password2','Password','trim|required|min_length[3]|matches[password1]',
				[
					'matches' => 'Password Tidak Sama',
					'required' => 'Password Harus Diisi',
					'min_length' => 'Minimal 3 Karakter',
				]);

			if ($this->form_validation->run() == false) 
			{
				$data['status'] = 'gagal';
				$data['j_menu'] = 'User';
				$data['judul'] = 'Admin';
				$data['admin'] = $this->db->get_where('admin',['role_id' => 1])->result_array();

				$this->load->view('template/v_header',$data);
				$this->load->view('admin/v_admin');
			} else
			{
				$idNumber = $this->input->post('id_number');
				$nama = $this->input->post('nama');
				$alamat = $this->input->post('alamat');
				$email = $this->input->post('email');
				$pass = $this->input->post('password1');

				if ($tipe == 'Admin') 
				{
					$role = 1;
				} elseif($tipe == 'Petugas')
					{
						$role = 6;
					}
				$data = array(
					'id_number' => $idNumber,
					'nama' => $nama,
					'alamat' => $alamat,
					'email' => $email,
					'password' => password_hash($pass, PASSWORD_DEFAULT),
					'role_id' => $role,
				);

				$db = $this->m_admin->input_admin($data);

				if ($db) 
				{
					if ($tipe == 'Admin') 
					{	
						$this->session->set_flashdata('msg','Admin Ditambahkan');
						redirect('Admin');
					} elseif ($tipe == 'Petugas') 
						{
							$this->session->set_flashdata('msg','Petugas Ditambahkan');
							redirect('Petugas');
						}
				} else
					{
						if ($tipe == 'Admin') 
						{	
							$this->session->set_flashdata('gagal','Admin Gagal Ditambahkan');
							redirect('Admin');
						} elseif ($tipe == 'Petugas') 
							{
								$this->session->set_flashdata('gagal','Petugas Gagal Ditambahkan');
								redirect('Petugas');
							}
					}
			}
		} else
			{
				redirect('Logout');
			}
	}

	function editAdmin($id)
	{
		if ($this->session->userdata('role_id') == 1) 
		{
			$dec = base64_decode($id);

			$data['tipe'] = 'Admin';
			$data['j_menu'] = 'User';
			$data['judul'] = 'Edit Admin';
			$data['admin'] = $this->db->get_where('admin',['id' => $dec])->row_array();

			$this->load->view('template/v_header',$data);
			$this->load->view('admin/v_editAdmin');
			$this->load->view('template/v_footer');
		} else
			{
				redirect('Logout');
			}
	}

	function editPetugas($id)
	{
		if ($this->session->userdata('role_id') == 1) 
		{
			$dec = base64_decode($id);

			$data['tipe'] = 'Petugas';
			$data['j_menu'] = 'User';
			$data['judul'] = 'Edit Petugas';
			$data['admin'] = $this->db->get_where('admin',['id' => $dec])->row_array();

			$this->load->view('template/v_header',$data);
			$this->load->view('admin/v_editAdmin');
			$this->load->view('template/v_footer');
		} else
			{
				redirect('Logout');
			}
	}

	function updateAdmin()
	{
		if($this->session->userdata('role_id') == 1 )
		{
			$idNumber = $this->input->post('id_number');
			$nama = $this->input->post('nama');
			$alamat = $this->input->post('alamat');
			$email = $this->input->post('email');
			$id = $this->input->post('id');
			$pass = $this->input->post('password1');
			$passw = $this->input->post('password2');
			$tipe = $this->input->post('tipe');

			$db = $this->db->get_where('admin',['id' => $id])->row_array();

			if ($db['id_number'] == $idNumber) 
			{
				$this->form_validation->set_rules('id_number','ID Number','trim|required|numeric|min_length[15]',
					[
						'required' => 'Nomor ID tidak boleh kosong',
						'min_length' => 'Nomor ID minimal 15 angka',
						'numeric' => 'Nomor ID hanya berupa angka',
					]);
			} else
				{
					$this->form_validation->set_rules('id_number','ID Number','trim|required|numeric|min_length[15]|is_unique[admin.id_number]',
					[
						'is_unique' => 'Nomor ID sudah digunakan Admin',
						'required' => 'Nomor ID tidak boleh kosong',
						'min_length' => 'Nomor ID minimal 15 angka',
						'numeric' => 'Nomor ID hanya berupa angka',
					]);
				}

			if ($db['email'] == $email) 
			{
				$this->form_validation->set_rules('email','Email','trim|required|valid_email',
					[
						'required' => 'Email Tidak Boleh Kosong',
						'valid_email' => 'Email Tidak Valid',
					]);
			} else
				{
					$this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[admin.email]',
					[
						'is_unique' => 'Email Sudah digunakan Admin',
						'required' => 'Email Tidak Boleh Kosong',
						'valid_email' => 'Email Tidak Valid',
					]);
				}

			if ($pass != '' or $passw != '') 
			{
				$this->form_validation->set_rules('password1','Password','trim|required|min_length[3]|matches[password2]',
					[
						'required' => 'Password Tidak Boleh Kosong',
						'min_length' => 'Minimal 3 Karakter',
						'matches' => 'Password Tidak Sama',
					]);
				$this->form_validation->set_rules('password2','Password','trim|required|min_length[3]|matches[password1]',
					[
						'required' => 'Password Tidak Boleh Kosong',
						'min_length' => 'Minimal 3 Karakter',
						'matches' => 'Password Tidak Sama',
					]);
			}


			if ($this->form_validation->run() == false) 
			{
				$data['tipe'] = $tipe;
				$data['j_menu'] = 'User';
				$data['judul'] = 'Edit Admin';
				$data['admin'] = $this->db->get_where('admin',['id' => $id])->row_array();

				$this->load->view('template/v_header',$data);
				$this->load->view('admin/v_editAdmin');
				$this->load->view('template/v_footer');
			} else
				{
					if ($pass == '') 
					{
						$data = array(
							'id_number' => $idNumber,
							'nama' => $nama,
							'alamat' => $alamat,
							'email' => $email,
						);
					} else
						{
							$data = array(
							'id_number' => $idNumber,
							'nama' => $nama,
							'alamat' => $alamat,
							'email' => $email,
							'password' => password_hash($pass, PASSWORD_DEFAULT),
							);
						}

					$update = $this->m_admin->updateAdmin($id,$data);

					if ($update) 
					{

						if ($tipe == 'Admin') 
						{
							$this->session->set_flashdata('msg','Admin Diubah');
							redirect('Admin');
						} else
							{
								$this->session->set_flashdata('msg','Petugas Diubah');
								redirect('Petugas');
							}
					} else
						{
							if ($tipe == 'Admin') 
							{
								$this->session->set_flashdata('gagal','Admin Gagal Diubah');
								redirect('Admin');
							} else
								{
									$this->session->set_flashdata('msg','Petugas Gagal Diubah');
									redirect('Petugas');
								}
						}
				}
		} else
			{
				redirect('Logout');
			}
	}

	function hapusAdmin($id)
	{
		if ($this->session->userdata('role_id') == 1) 
		{
			$dec = base64_decode($id);

			$this->db->where('id',$dec);
			$this->db->delete('admin');
			$this->session->set_flashdata('msg','Admin Dihapus');
			redirect('Admin');
		} else
			{
				redirect('Logout');
			}
	}

	function hapusPetugas($id)
	{
		if ($this->session->userdata('role_id') == 1) 
		{
			$dec = base64_decode($id);

			$this->db->where('id',$dec);
			$this->db->delete('admin');
			$this->session->set_flashdata('msg','Petugas Dihapus');
			redirect('Petugas');
		} else
			{
				redirect('Logout');
			}
	}

	function petugas()
	{
		if ($this->session->userdata('role_id') == 1) 
		{
			$url = $this->uri->segment(1);
			if ($url == 'admin') 
			{
				$this->load->view('errors/v_404');
			} else
				{
					$data['j_menu'] = 'User';
					$data['judul'] = 'Petugas';
					$data['petugas'] = $this->db->get_where('admin',['role_id' => 6])->result_array();

					$this->load->view('template/v_header',$data);
					$this->load->view('admin/v_petugas');
					// $this->load->view('template/v_footer');
				}
		} else
			{
				redirect('Logout');
			}
	}
}
?>