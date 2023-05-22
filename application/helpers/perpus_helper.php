<?php
function cek_access($role_id,$menu_id)
{
	$ci = get_instance();
	// agar bisa menggunakan menu $this namun diganti dengan $ci karena disini membuat helper baru
	$access = $ci->db->get_where('user_access_menu',['role_id' => $role_id, 'menu_id' => $menu_id])->num_rows();
	if ($access > 0) 
	{
		return "checked";
	}
}

?>