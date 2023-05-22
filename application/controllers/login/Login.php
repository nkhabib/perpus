<?php

class Login extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('captcha');
	}

	function login()
	{
		$session = $this->session->userdata('role_id');

		if ($session > 0 ) 
		{
			redirect('Home');
		} else
			{	
				// $url = $this->uri->segment(1);
				// if ($url == "login") 
				// {
				// 	$this->load->view('errors/v_404');
				// } else
				// 	{
						$data['widget']=$this->recaptcha->getWidget();
						$data['script']=$this->recaptcha->getScriptTag();
						$data['judul']="Login User";
						$this->load->view('user/template/header',$data);
						$this->load->view('login/v_login');
						$this->load->view('user/template/footer');
					// }
			}

	}


	function cek()
	{
		$data['judul'] = "Login User";
		$email = htmlspecialchars($this->input->post('email'));
		$pass = strip_tags($this->input->post('password'));
		$captcha = trim($this->input->post('g-recaptcha-response'));


		$this->form_validation->set_rules('email','Email','required|trim|valid_email',
			[
				'required' => '*Email Tidak Boleh Kosong*',
				'valid_email' => '*Email Tidak Valid*',
			]);

		$this->form_validation->set_rules('password','Password','required|trim',
			[
				'required' => '*Password Tidak Boleh Kosong*',
			]);
		$this->form_validation->set_rules('g-recaptcha-response','Recapcha','required|trim',
			[
				'required' => '*Verifikasi reCaptcha*',
			]);

		if ($this->form_validation->run()==false) 
		{
			$data['widget']=$this->recaptcha->getWidget();
			$data['script']=$this->recaptcha->getScriptTag();
			$data['judul']="Login User";
			$this->load->view('user/template/header',$data);
			$this->load->view('login/v_login');
			$this->load->view('user/template/footer');
		} else
			{
				$response = $this->recaptcha->verifyResponse($captcha);
	            
	            if (isset($response['success']) and $response['success'] === true)
	            {
	                
	                $user = $this->db->get_where('admin',['email' => $email])->row_array();
				
					if ($user) 
					{
						if (password_verify($pass, $user['password'])) 
						{
							$this->session->set_userdata('masuk',TRUE);
							
							$this->session->set_userdata($user);
							redirect('Home');
						} else
							{
								$this->session->set_flashdata('gagal','Password Salah');
								redirect('Pengguna');
							}
					} else
						{
							$member = $this->db->get_where('member',['email'=>$email])->row_array();
							if ($member) 
							{
								if (password_verify($pass, $member['password'])) 
								{
									if ($member['active'] == 1) 
									{
										$this->session->set_userdata('masuk',TRUE);
										$this->session->set_userdata($member);
										redirect('Home');
									} else
										{
											$this->session->set_flashdata('gagal','Email Belum Diverifikasi');
											redirect('Pengguna');
										}
								} else
									{
										$this->session->set_flashdata('gagal','* Password Salah *');
										redirect('Pengguna');
									}
							} else
								{
									$this->session->set_flashdata('gagal','* Email Tidak Terdaftar *');
									redirect('Pengguna');
								}
						}
	            } else
	            	{
	            		$this->session->set_flashdata('gagal','reCaptcha Belum Diisi');
	            		redirect('Pengguna');
	            	}
			}
	}

	function daftar()
	{
		$data['widget']=$this->recaptcha->getWidget();
		$data['script']=$this->recaptcha->getScriptTag();
		$data['judul']="Register";
		$this->load->view('user/template/header',$data);
		$this->load->view('login/v_register');
		$this->load->view('user/template/footer');
	}

	function proses()
	{
		$this->form_validation->set_rules('id_member','NO-ID','required|trim|numeric',
			[
				'required' => '*NO_ID Tidak Boleh Kosong*',
				'numeric' => '*NO_ID Hanya Berupa Angka*',
			]);

		$this->form_validation->set_rules('email','Email','required|valid_email|is_unique[member.email]|is_unique[admin.email]',
			[
				'is_unique' => '*Email Sudah Terdaftar*',
				'required' => '*Email Tidak Boleh Kosong*',
				'valid_email' => '*Email Tidak Valid*',
			]);

		$this->form_validation->set_rules('nama','Nama','required',
			[
				'required' => '*Nama Tidak Boleh Kosong*',
			]);

		$this->form_validation->set_rules('provesi','Provesi','required',
			[
				'required' => '*Provesi Tidak Boleh Kosong*',
			]);

		$this->form_validation->set_rules('alamat','Alamat','required',
			[
				'required' => '*Alamat Tidak Boleh Kosong*',
			]);

		$this->form_validation->set_rules('kodepos','Kode Pos','required|trim|numeric',
			[
				'required' => '*Kode Pos Tidak Boleh Kosong*',
				'numeric' => '*Kode Pos Hanya Berupa Angka*',
			]);

		$this->form_validation->set_rules('password','Password','required|trim|matches[password2]',
			[
				'required' => '*Password Tidak Boleh Kosong*',
				'matches' => '*Password Yang Anda Masukan Berbeda*',
			]);

		$this->form_validation->set_rules('password2','Password','required|trim|matches[password]',
			[
				'required' => '*Password Tidak Boleh Kosong*',
				'matches' => '*Password Yang Anda Masukan Berbeda*',
			]);
		$this->form_validation->set_rules('g-recaptcha-response','reCaptcha','required',
			[
				'required' => '*Verifikasi reCaptcha*',
			]);


		if ($this->form_validation->run()==false) 
		{
			$data['widget']=$this->recaptcha->getWidget();
			$data['script']=$this->recaptcha->getScriptTag();
			$data['judul']="Register";
			$this->load->view('user/template/header',$data);
			$this->load->view('login/v_register');
			$this->load->view('user/template/footer');
		} else
		{
			$recaptcha = trim($this->input->post('g-recaptcha-response'));

			$response = $this->recaptcha->verifyResponse($recaptcha);

			if (isset($response['success']) and $response['success'] === true) 
			{
				$post = $this->input->post();
				$pass = htmlspecialchars($this->input->post('password'));

				// privat function untuk send email

				$reg = array(
					'id_number' => $post['id_member'],
					'nama' => $post['nama'],
					'email' => $post['email'],
					'provesi' => $post['provesi'],
					'alamat' => $post['alamat'],
					'kodepos' => $post['kodepos'],
					'password' => password_hash($pass,PASSWORD_DEFAULT),
					'role_id' => 2,
					'date_created' => time(),
					'active' => 0,
					 );

				$this->db->insert('member',$reg);

				$token = base64_encode(random_bytes(64));

				// simpan token dalm database

				$member_token = array(
					'email' => $post['email'],
					'token' => $token,
					'date_created' => time(),
				);

				$this->db->insert('member_token',$member_token);

				// jika ada dafatar member yang di database verifikasi timenya sudah hangus maka akan otomatis delete dan harus daftar lagi
				
				$this->_sendEmail($token, 'verify');

				$this->session->set_flashdata('msg','Silahkan Cek Email Anda Untuk Verifikasi');
				redirect('Pengguna');


			}
		}
	}

	function forget()
	{
		$this->form_validation->set_rules('email','Email','trim|required|valid_email',
			[
				'required' => 'Email Tidak Boleh Kosong',
				'valid_email' => 'Email Tidak Valid',
			]);
		$this->form_validation->set_rules('g-recaptcha-response','reCaptcha','required',
			[
				'required' => 'Verifikasi reCaptcha',
			]);

		if ($this->form_validation->run() == false) 
		{
			$data['widget']=$this->recaptcha->getWidget();
			$data['script']=$this->recaptcha->getScriptTag();
			$data['judul']="Reset Password";
			$this->load->view('user/template/header',$data);
			$this->load->view('login/v_forget');
			$this->load->view('user/template/footer');
		} else
			{
				$recaptcha = trim($this->input->post('g-recaptcha-response'));
				$response = $this->recaptcha->verifyResponse($recaptcha);

				if (isset($response['success']) and $response['success'] == true) 
				{
					
					$email = $this->input->post('email');
					$admin = $this->db->get_where('admin',['email' => $email])->row_array();
					$token = base64_encode(random_bytes(64));

					$forget_token = array(
						'email' => $email,
						'token' => $token,
					);

					if ($admin) 
					{
						$this->db->delete('forget', ['email' => $email]);
						$this->db->insert('forget',$forget_token);

						$this->_sendEmail($token,'forget');

						$this->session->set_flashdata('msg','Silahkan Cek Email Anda Untuk Reset Password');
						redirect('login/login/forget');
					} else
						{
							$member = $this->db->get_where('member',['email' => $email,'active' => 1])->row_array();

							if ($member) 
							{
								$this->db->delete('forget', ['email' => $email]);
								$this->db->insert('forget',$forget_token);

								$this->_sendEmail($token,'forget');

								$this->session->set_flashdata('msg','Silahkan Cek Email Anda Untuk Reset Password');
								redirect('login/login/forget');
							} else
								{
									$this->session->set_flashdata('gagal','Email Tidak Terdaftar atau Belum Veriifikasi');
									redirect('login/login/forget');
								}
						}
				} else
					{
						$this->session->set_flashdata('gagal','reCaptcha Salah');
						redirect('login/login/forget');
	 				}
			}
	}

	private function _sendEmail($token,$type)
	{
		$config = [
			'protocol'   => 'smtp',
			'smtp_host' => 'smtp.mailtrap.io',
			'smtp_user'  => 'f09afbaee30693',
			'smtp_pass'  => 'b4e1c832859c70',
			'smtp_port' => 465,
			'mailtype'	 => 'html',
			'charset'	 => 'utf-8',
			'newline'	 => "\r\n"
		];

		$this->load->library('email',$config);

		$this->email->from('wpkhabib@gmail.com','Verifikasi Member Perpustakaan');
		$this->email->to($this->input->post('email'));
		// $this->email->cc('another@another-example.com');
		// $this->email->bcc('them@their-example.com');

		if ($type == 'verify') 
		{
			
			$this->email->subject('Verifikasi Akun Anda');
			$this->email->message('Klik link dibawah untuk verifikasi : <a href="' . base_url() . 'login/login/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">
				Verifikasi</a>');
		} else if($type == 'forget')
			{
				$this->email->subject('Reset Password');
				$this->email->message('Klik link dibawah untuk reset password anda : <a href="' . base_url() . 'login/login/reset?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">
					Reset Password</a>');
			}

		// $this->email->send();

		if ($this->email->send()) 
		{
			return true;
		} else
			{
				echo $this->email->print_debugger();
				die;
			}
	}

	function verify()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$member = $this->db->get_where('member',['email' => $email])->row_array();

		if ($member) 
		{
			$member_token = $this->db->get_where('member_token',['token' => $token])->row_array();

			if ($member_token) 
			{
				// validasi waktu verifikasi
				if (time() - $member_token['date_created'] < (60*60*24)) {
					$this->db->set('active',1);
					$this->db->where('email',$email);
					$this->db->update('member');

					$this->db->delete('member_token',['email' => $email]);

					$this->session->set_flashdata('msg','Verifikasi Berhasil Silahkan Login Dengan Email dan Password Anda');
					redirect('login/login/login');
				} else
					{
						$this->db->delete('member',['email' => $email]);
						$this->db->delete('member_token',['email' => $email]);
						$this->session->set_flashdata('gagal','Gagal!! Token Kadaluarsa');
						redirect('Pengguna');
					}
			} else
				{
					$this->session->set_flashdata('gagal','Gagal!! Token Salah');
					redirect('Pengguna');
				}
		} else
			{
				$this->session->set_flashdata('gagal','Gagal !! Email Salah');
				redirect('Pengguna');
			}
	}

	function reset()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$member = $this->db->get_where('forget',['email' => $email])->row_array();

		if ($member) 
		{
			if ($member['token'] == $token) 
			{
				$this->session->set_userdata('reset_email',$email);
				$this->ubahPassword();
			} else
				{
					$this->session->set_flashdata('gagal','Gagal !! Token Salah');
					redirect('login/login/forget');
				}
		} else
			{
				$this->session->set_flashdata('gagal','Email Tidak Terdaftar');
				redirect('login/login/forget');
			}
	}

	function ubahPassword()
	{

		if (!$this->session->userdata('reset_email')) 
		{
			redirect('Pengguna');
		}
		$this->form_validation->set_rules('password1','Password','trim|required|matches[password2]|min_length[3]',
			[
				'required' => '*Password Harus Diisi*',
				'matches' => '*Password yang Anda Masukan Berbeda*',
				'min_length' => '*Password Minimal 3 Karakter*',
			]);

		$this->form_validation->set_rules('password2','Password','trim|required|matches[password1]|min_length[3]',
			[
				'required' => '*Password Harus Diisi*',
				'matches' => '*Password yang Anda Masukan Berbeda*',
				'min_length' => '*Password Minimal 3 Karakter*',
			]);

		if ($this->form_validation->run() == false) 
		{
			$data['judul']="Ubah password";
			$this->load->view('user/template/header',$data);
			$this->load->view('login/v_ubahPassword');
			$this->load->view('user/template/footer');
		} else
			{
				$password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
				$email = $this->session->userdata('reset_email');

				$admin = $this->db->get_where('admin',['email' => $email])->row_array();

				if ($admin) 
				{
					$this->db->set('password', $password);
					$this->db->where('email', $email);
					$this->db->update('admin');

					$this->db->delete('forget', ['email' => $email]);

					$this->session->unset_userdata('reset_email');

					$this->session->set_flashdata('msg', 'Password Berhasil Diubah! Silahkan Login');
					redirect('Pengguna');
				} else
					{
						$member = $this->db->get_where('member',['email' => $email])->row_array();

						if ($member) 
						{
							$this->db->set('password', $password);
							$this->db->where('email', $email);
							$this->db->update('member');

							$this->db->delete('forget', ['email' => $email]);

							$this->session->unset_userdata('reset_email');

							$this->session->set_flashdata('msg', 'Password Berhasil Diubah! Silahkan Login');
							redirect('login/login/login');
						} else
							{
								$this->session->set_flashdata('gagal','Email Tidak Terdaftar');
								redirect('Pengguna');
							}
					}
			}
	}

	function logout()
	{
		$seg = $this->uri->segment(1);

		if ($seg == 'login') 
		{
			$this->load->view('errors/v_404');
		} else
			{
				$this->session->sess_destroy();
				$url=base_url();
				redirect($url);
			}
	}
}
?>