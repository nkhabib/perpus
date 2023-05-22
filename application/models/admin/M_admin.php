<?php

class M_admin extends CI_Model
{
	function input($data)
	{
		$add = $this->db->insert('admin',$data);
		return $add;
	}

	function input_admin($data)
	{
		return $this->db->insert('admin',$data);
	}

	function updateAdmin($id,$data)
	{
		$this->db->where('id',$id);
		return $this->db->update('admin',$data);
	}
}
?>