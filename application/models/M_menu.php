<?php
class M_menu extends CI_Model
{
	function menu($role)
	{
		$this->db->join('user_menu','user_menu.menu_id = user_access_menu.menu_id');

		return $this->db->get_where('user_access_menu',['role_id' => $role])->result_array();
	}

	// function admin()
	// {
	// 	$this->db->join('user_sub_menu','user_sub_menu.menu_id = user_access_menu.menu_id');
	// 	return $this->db->get_where('user_access_menu',['role_id' => 1])->result_array();
	// }

	// function member()
	// {
	// 	$this->db->join('user_sub_menu','user_sub_menu.menu_id = user_access_menu.menu_id');
	// 	return $this->db->get_where('user_access_menu',['role_id' => 2])->result_array();
	// }

	function get($config,$offset)
	{
		$d = "Dashboard";
		$this->db->order_by('urutan','ASC');
		$this->db->where('judul !=', $d);
		$this->db->where('judul !=','Home');
		return $this->db->get('user_sub_menu',$config,$offset)->result_array();
	}

	function role($perpage,$offset)
	{
		return $this->db->get('user_menu',$perpage,$offset)->result_array();
	}

	// function lihat($menu_id)
	// {
	// 	return $this->db->get_where('user_sub_menu',['menu_id' => $menu_id])->result_array();
	// }

	function updateRole($menu,$id)
	{
		$this->db->set('menu',$menu);
		$this->db->where('menu_id',$id);
		return $this->db->update('user_menu');
	}

	function updateMenu($data,$id_subMenu)
	{
		$this->db->where('id_submenu',$id_subMenu);
		return $this->db->update('user_sub_menu',$data);
	}

	function insertMenu($data)
	{
		return $this->db->insert('user_sub_menu',$data);
	}

	function insertSM($dbSubMenu)
	{
		return $this->db->insert('sub_menu',$dbSubMenu);
	}

	function access_submenu($id_subMenu,$role)
	{
		foreach ($role as $r)
		{
			$data = array(
				'role_id' => $r,
				'id_sub_submenu' => $id_subMenu['id_sub_submenu'],
				 );

			$this->db->insert('sub_menu_access',$data);
		}
	}

	function update_sm($idSM, $data)
	{
		$this->db->where('id_sub_submenu',$idSM);
		return $this->db->update('sub_menu',$data);
	}

	function updateUser($id,$role)
	{
		$this->db->set('role',$role);
		$this->db->where('role_id',$id);
		return $this->db->update('role_user');
	}
}