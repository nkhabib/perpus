<?php

class Menu extends CI_Controller
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
				$this->load->model('m_menu');
			}
	}

	function index()
	{
		// dapatkan user_menu[menu_id] join dengan user_sub_menu[menu_id] yang
		 // hak aksesnya ada di user_access_menu[menu_id] yang role_id nya sesuai user yang masuk

		$uri = $this->uri->segment(1);

		if ($uri == 'menu') 
		{
			$this->load->view('errors/v_404');
		} else
			{
				$role = $this->session->userdata('role_id');
				$data['j_menu'] = '';
				if ($role == 1) 
				{
					$data['judul'] = "Dashboard";
				} else
					{
						$data['judul'] = "Home";
					}
				$this->load->view('template/v_header',$data);
				if ($role == 1) 
				{
					$this->load->view('admin/v_index');
				} else
					{
						$this->load->view('member/v_index');
					}
				$this->load->view('template/v_footer');
			}

	}

	function get($offset=0)
	{
		if ($this->session->userdata('role_id') == 1) 
		{
			$url = $this->uri->segment(1);
			if ($url == 'menu') 
			{
				$this->load->view('errors/v_404');
			} else
				{

					$data['j_menu'] = 'Manajemen Menu';
					$data['judul'] = "Lihat Menu";

					$menu = $this->db->get('user_sub_menu');
					$total = $menu->num_rows();



					$config['base_url'] = base_url('menu/get');
					$config['total_rows'] = $total;
					$config['per_page'] = 100;
					$config['use_page_numbers'] = FALSE;
					$config['enable_query_strings'] = TRUE;
					$config['full_tag_open'] = "<nav aria-label='...'> <ul class='pagination'>";
					$config['full_tag_close'] = "</ul></nav>";
					// $config['first_tag_open'] = "<li class='page-item'><a class='page-link' href=''>";
					// $config['first_tag_close'] = "</a></li>";
					// $config['last_tag_open'] = ;
					// $config['last_tag_close'] = ;
					// $config['next_tag_open'] = ;
					// $config['next_tag_close'] = ;
					$config['first_link'] = 'Awal';
					$config['last_link'] = 'Terahir';

					$this->pagination->initialize($config);

					$data['submenu'] = $this->m_menu->get($config['per_page'],$offset);
					$data['halaman'] = $this->pagination->create_links();
					$data['offset'] = $offset;


					$this->load->view('template/v_header',$data);
					$this->load->view('menu/v_menu');
					$this->load->view('template/v_footer');
				}
			

		} else
			{
				redirect('Logout');
			}
	}

	function role_menu($offset=0)
	{
		if ($this->session->userdata('role_id') == 1) 
		{
			$total = $this->db->get('user_menu')->num_rows();

			$config['base_url'] = base_url('menu/role_menu');
			$config['total_rows'] = $total;
			$config['per_page'] = 5;
			$config['use_page_numbers'] = FALSE;
			$config['enable_query_strings'] = TRUE;
			$config['full_tag_open'] = "<nav aria-label='...'> <ul class='pagination'>";
			$config['full_tag_close'] = "</ul></nav>";
			// $config['first_tag_open'] = "<li class='page-item'><a class='page-link' href=''>";
			// $config['first_tag_close'] = "</a></li>";
			// $config['last_tag_open'] = ;
			// $config['last_tag_close'] = ;
			// $config['next_tag_open'] = ;
			// $config['next_tag_close'] = ;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Terahir';

			$this->pagination->initialize($config);

			$data['roleMenu'] = $this->m_menu->role($config['per_page'],$offset);
			$data['halaman'] = $this->pagination->create_links();
			$data['offset'] = $offset;
			$data['j_menu'] = 'Manajemen Menu';
			$data['judul'] = 'Role Menu';
			$this->load->view('template/v_header',$data);
			$this->load->view('menu/v_role_menu');
			$this->load->view('template/v_footer');
		}
	}

	function user()
	{
		if ($this->session->userdata('role_id') == 1) 
		{
			$link = $this->uri->segment(1);
			if ($link == 'menu') 
			{
				$this->load->view('errors/v_404');
			} else
				{
					$data['j_menu'] = 'Manajemen Menu';
					$data['judul'] = 'User';
					$data['user'] = $this->db->get('role_user')->result_array();
					$this->load->view('template/v_header',$data);
					$this->load->view('menu/v_user');
					$this->load->view('template/v_footer');
				}
		} else
			{
				redirect('Logout');
			}
	}

	function editUser($role_id)
	{
		if ($this->session->userdata('role_id') == 1) 
		{
			$id = base64_decode($role_id);
			$data['j_menu'] = '';
			$data['judul'] = 'Edit User';
			$data['user'] = $this->db->get_where('role_user',['role_id' => $id])->row_array();

			$this->load->view('template/v_header',$data);
			$this->load->view('menu/v_editUser');
			$this->load->view('template/v_footer');
		} else
			{
				redirect('Logout');
			}
	}

	function updateUser()
	{
		if ($this->session->userdata('role_id') == 1) 
		{
			$id = $this->input->post('roleId');
			$role = $this->input->post('role');

			$update = $this->m_menu->updateUser($id,$role);
			if ($update) 
			{
				$this->session->set_flashdata('msg','User Diupdate !!');
				redirect('User');
			} else
				{
					$this->session->set_flashdata('gagal','User Gagal Diupdate !!');
					redirect('User');
				}
		} else
			{
				redirect('Logout');
			}
	}

	function hapusUser($role_id)
	{
		if ($this->session->userdata('role_id') == 1) 
		{
			$id = base64_decode($role_id);
			$this->db->delete('role_user',['role_id',$id]);
			$this->db->delete('admin',['role_id',$id]);
			$this->db->delete('sub_menu_access',['role_id',$id]);
			$this->db->delete('user_access_menu',['role_id',$id]);


			$this->session->set_flashdata('msg','User Dihapus !!');
			redirect('User');
		} else
			{
				redirect('Logout');
			}
	}


	function access($role_id)
	{
		if ($this->session->userdata('role_id') == 1) 
		{
			$id = base64_decode($role_id);
			$role = $this->db->get_where('role_user',['role_id' => $id])->row_array();

			// $data['access'] = $this->m_menu->access($role_id);
			$data['menu'] = $this->db->get('user_menu')->result_array();
			$data['role'] = $role;
			$data['j_menu'] = 'Manajemen Menu';
			$data['judul'] = 'Access User';

			$this->load->view('template/v_header',$data);
			$this->load->view('menu/v_access');
			$this->load->view('template/v_footer');
		} else
			{
				redirect('Logout');
			}
	}
// jquery
	function ubah_akses()
	{
		if ($this->session->userdata('role_id') == 1) 
		{
			
			$role_id = $this->input->post('role_id');
			$menu_id = $this->input->post('menu_id');
			$data = [
				'role_id' => $role_id,
				'menu_id' => $menu_id
			];
			$cek = $this->db->get_where('user_access_menu',$data)->num_rows();

			if ($cek)
			{
				$this->db->delete('user_access_menu',$data);
			} else
				{
					$this->db->insert('user_access_menu',$data);
				}

			$this->session->set_flashdata('msg','Akses Diubah !!');
		} else
			{
				redirect('Logout');
			}

	}

	function ubah_menu()
	{
		if ($this->session->userdata('role_id') == 1) 
		{	
			$active = $this->input->post('aktif');
			$id_submenu = $this->input->post('id_submenu');
			$data = [
				'id_submenu' => $id_submenu,
				'active' => $active
			];

			$cek = $this->db->get_where('user_sub_menu',$data)->num_rows();

			if ($cek > 0) 
			{
				$this->db->set('active', 0);
				$this->db->where('id_submenu', $id_submenu);
				$this->db->update('user_sub_menu');
			} else
				{
					$this->db->set('active', 1);
					$this->db->where('id_submenu', $id_submenu);
					$this->db->update('user_sub_menu');
				}

				$this->session->set_flashdata('msg','Status Aktif/Nonaktif Diubah !!');
		} else
			{
				redirect('Logout');
			}
	}
// end jquery

	function insertRoleMenu()
	{
		$menu = $this->input->post('menu');
		$this->form_validation->set_rules('menu','Menu','trim|required|is_unique[user_menu.menu]',
			[
				'required' => 'Menu Harus Diisi',
				'is_unique' => 'Menu Sudah Ada',
			]);

		if ($this->form_validation->run() == false) 
		{
			if ($menu == '') 
			{
				$this->session->set_flashdata('gagal','Masukan Menu');
				redirect ('Role');
			} else
				{
					$this->session->set_flashdata('gagal','Menu '.$menu.' Sudah Ada');
					redirect ('Role');
				}
		} else
			{
				$data = array(
					'menu' => $menu,
				);

				$userMenu = $this->db->insert('user_menu',$data);

				$newMenu = $this->db->get_where('user_menu',['menu' => $menu])->row_array();
				$idMenu = $newMenu['menu_id'];

				$role = $this->input->post('role');

				foreach ($role as $r) 
				{

					$access = array(
						'menu_id' => $idMenu,
						'role_id' => $r,
					);

					$this->db->insert('user_access_menu',$access);
				}

				
				$this->session->set_flashdata('msg','Menu Ditambahkan');
				redirect ('Role');
			}
	}

	function detail($id_submenu)
	{
		if ($this->session->userdata('role_id') == 1) 
		{

			$roleuser = $this->db->get('role_user')->result_array();

			$menu = $this->db->get_where('user_sub_menu',['id_submenu' => $id_submenu])->row_array();

			$data['roleuser'] = $roleuser;
			$data['id_submenu'] = $id_submenu;
			$data['jml'] = $this->db->get('role_user')->num_rows();
			$data['user'] = $this->db->get('role_user')->result_array();
			$data['submenu'] = $this->db->get_where('sub_menu',['id_submenu' => $id_submenu])->result_array();
			$data['j_menu'] = 'Manajemen Menu';
			$data['judul'] = 'Detail Menu '.$menu['judul'];
			$this->load->view('template/v_header',$data);
			$this->load->view('menu/v_detail');
			// $this->load->view('template/v_footer');
		} else
			{
				redirect('Logout');
			}

	}

	function insertSubMenu()
	{
		$id_submenu = $this->input->post('idSubMenu');
		// $dec = base64_decode($id_submenu);
		$subMenu = $this->input->post('subMenu');
		$url = $this->input->post('url');

		$this->db->select('urutan_submenu');
		$jml = $this->db->get('sub_menu')->result_array();
		foreach ($jml as $j)
		{
			$data[]=$j['urutan_submenu'];
		}
		$max = max($data);
		$urutan = $max+1;

		$dbSubMenu = array(
			'id_submenu' => $id_submenu,
			'judul_submenu' => $subMenu,
			'url_submenu' => $url,
			'active_submenu' => 1,
			'urutan_submenu' => $urutan,
		);

		$insertSM = $this->m_menu->insertSM($dbSubMenu);

		$this->db->order_by('id_sub_submenu', 'DESC');
		$this->db->limit(1);

		$idSubMenu = $this->db->get('sub_menu')->row_array();

		$role = $this->input->post('role');

		$access = $this->m_menu->access_submenu($idSubMenu,$role);


		if ($insertSM) 
		{
			$this->session->set_flashdata('msg','Sub Menu Ditambahkan');
			redirect('menu/detail/'.$id_submenu);
		} else
			{
				$this->session->set_flashdata('gagal','Sub Menu Gagal Ditambahkan !!');
				redirect('menu/detail/'.$id_submenu);
			}
	}


	function edit_submenu($id)
	{
		if ($this->session->userdata('role_id') == 1 ) 
		{
			$data['sm'] = $this->db->get_where('sub_menu',['id_sub_submenu' => $id])->row_array();
			$data['j_menu'] = 'Manajemen Menu';
			$data['judul'] = 'Edit Sub Menu';

			$this->load->view('template/v_header',$data);
			$this->load->view('menu/v_editSubmenu');
			$this->load->view('template/v_footer');
		} else 
			{
				redirect('Logout');
			}
	}

	function update_submenu()
	{
		if ($this->session->userdata('role_id') == 1 ) 
		{
			$idSM = $this->input->post('idSM');
			$sm = $this->input->post('judul_SM');
			$url = $this->input->post('url');

			$data = array(
				'id_sub_submenu' => $idSM,
				'judul_submenu' => $sm,
				'url_submenu' => $url,
			);

			$detail = $this->db->get_where('sub_menu',['id_sub_submenu' => $idSM])->row_array();

			$update = $this->m_menu->update_sm($idSM,$data);

			if ($update) 
			{
				$this->session->set_flashdata('msg','Sub Menu Diupdate !');
				redirect('menu/detail/'.$detail['id_submenu']);
			} else
				{
					$this->session->set_flashdata('gagal','Sub Menu Gagal Diupdate !!!');
					redirect('menu/detail/'.$detail['id_submenu']);
				}
		} else
			{
				redirect('Logout');
			}
	}

	// jquery

	function akses_submenu()
	{
		if ($this->session->userdata('role_id') == 1) 
		{
			$role_id = $this->input->post('role_id');
			$id_submenu = $this->input->post('id_submenu');
			$db = $this->db->get_where('sub_menu_access',['role_id' => $role_id, 'id_sub_submenu' => $id_submenu]);
			$ada = $db->num_rows();
			$access = $db->row_array();

			if ($ada > 0) 
			{
				$this->db->delete('sub_menu_access',['id_access' => $access['id_access']]);
			} else
				{
					$data = array(
						'role_id' => $role_id,
						'id_sub_submenu' => $id_submenu,
					);

					$this->db->insert('sub_menu_access',$data);
				}
		} else
			{
				$this->load->view('errors/v_404');
			}
	}


	function sm_active()
	{

		if ($this->session->userdata('role_id') == 1) 
		{
			$id_submenu = $this->input->post('id_submenu');

			$ada = $this->db->get_where('sub_menu',['id_sub_submenu' => $id_submenu, 'active_submenu' => 1])->num_rows();

			if ($ada > 0) 
			{
				$this->db->set('active_submenu',0);
				$this->db->where('id_sub_submenu',$id_submenu);
				$this->db->update('sub_menu');
			} else
				{
					$this->db->set('active_submenu',1);
					$this->db->where('id_sub_submenu',$id_submenu);
					$this->db->update('sub_menu');
				}
		} else
			{
				$this->load->view('errors/v_404');
			}
	}

// end jquery

	function edit($menu_id)
	{
		if ($this->session->userdata('role_id') == 1) 
		{
			$data['edit'] = $this->db->get_where('user_menu',['menu_id' => $menu_id])->row_array();
			$data['j_menu'] = 'Manajemen Menu';
			$data['judul'] = 'Edit Role Menu';
			$this->load->view('template/v_header',$data);
			$this->load->view('menu/v_editRoleMenu');
			$this->load->view('template/v_footer');
		} else
			{
				redirect('Logout');
			}
	}

	function updateRole()
	{
		if ($this->session->userdata('role_id') == 1) 
		{
			$menu = $this->input->post('menu');
			$id = $this->input->post('idMenu');
			
			$update = $this->m_menu->updateRole($menu,$id);

			if ($update) 
			{
				$this->session->set_flashdata('msg','Menu Diupdate!');

				redirect('Role');
			} else
				{
					$this->session->set_flashdata('gagal','Menu Gagal Diupdate!');
					redirect('Role');
				}
		}
	}

	function hapus($id)
	{
		if ($this->session->userdata('role_id') == 1) 
		{	
			$this->db->delete('user_access_menu',['menu_id' => $id]);
			$hapus = $this->db->delete('user_menu',['menu_id' => $id]);

			if ($hapus) 
			{
				$this->session->set_flashdata('msg','Menu Dihapus');
				redirect('Role');
			}
		} else
			{
				redirect('Role');
			}
	}

	function editMenu($id_submenu)
	{
		if ($this->session->userdata('role_id') == 1) 
		{
			$id = base64_decode($id_submenu);

			$menu = $this->db->get_where('user_sub_menu',['id_submenu' => $id])->row_array();

			$userMenu = $this->db->get_where('user_menu',['menu_id' => $menu['menu_id']])->row_array();

			$data['name_menu'] = $userMenu['menu'];
			$data['userMenu'] = $this->db->get('user_menu')->result_array();
			$data['j_menu'] = 'Manajemen Menu';
			$data['judul'] = 'Edit Menu';
			$data['menu'] = $menu;
			$this->load->view('template/v_header',$data);
			$this->load->view('menu/v_editMenu');
			$this->load->view('template/v_footer');
		} else
			{
				redirect('Logout');
			}
	}

	function updateMenu()
	{
		if ($this->session->userdata('role_id') == 1) 
		{
			$id_subMenu = $this->input->post('idMenu');
			$menu_id = $this->input->post('menu_id');
			$judul = $this->input->post('menu');
			// $url = $this->input->post('url');
			$icon = $this->input->post('icon');

			$data = array(
				'menu_id' => $menu_id,
				'judul' => $judul,
				// 'url' => $url,
				'icon' => $icon,
			);

			$update = $this->m_menu->updateMenu($data,$id_subMenu);

			if ($update) 
			{
				$this->session->set_flashdata('msg','Menu Diupdate');
				redirect('Menu');
			} else
				{
					$this->session->set_flashdata('gagal','Menu Gagal Diupdate !!');
					redirect('Menu');
				}

		} else
			{
				redirect('Logout');
			}
	}

	function hapusMenu($id_submenu)
	{
		if ($this->session->userdata('role_id') == 1) 
		{
			$id = base64_decode($id_submenu);
			$this->db->delete('user_sub_menu',['id_submenu' => $id]);
			$this->session->set_flashdata('msg','Menu Dihapus !!');
			redirect('Menu');
		} else
			{
				redirect('Logout');
			}
	}

	function insertMenu()
	{
		if($this->session->userdata('role_id') == 1)
		{
			$this->form_validation->set_rules('idMenu','Menu','required');
			$this->form_validation->set_rules('menu','Menu','required');
			$this->form_validation->set_rules('icon','Icon','required');

			if ($this->form_validation->run() == false) 
			{
				$this->session->set_flashdata('gagal','Periksa Data yang Anda Masukan');
				redirect('Menu');
			} else
				{
					$menu = $this->input->post('menu');
					$icon = $this->input->post('icon');
					$idMenu = $this->input->post('idMenu');

					$this->db->select('urutan');
					$jml = $this->db->get('user_sub_menu')->result_array();
					foreach ($jml as $j)
					{
						$data[]=$j['urutan'];
					}
					$max = max($data);
					$urutan = $max+1;

					$data = array(
						'menu_id' => $idMenu,
						'judul' => $menu,
						'icon' => $icon,
						'active' => 1,
						'urutan' => $urutan,
					);

					$insert = $this->m_menu->insertMenu($data);

					if ($insert) 
					{
						$this->session->set_flashdata('msg','Menu Ditambahkan !!');
						redirect('Menu');
					} else 
						{
							$this->session->set_flashdata('gagal','Menu Gagal Ditambahkan !!');
							redirect('Menu');
						}

				}
		} else
			{
				redirect('Logout');
			}
	}
}
 ?>