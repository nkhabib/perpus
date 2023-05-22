<?php
class M_member extends CI_Model
{
	function get_member($perpage,$offset)
	{
		return $this->db->get("member",$perpage,$offset)->result_array();
	}

	function create($member)
	{
		return $this->db->insert('member',$member);
	}

	function update($id,$member)
	{
		$this->db->where('id',$id);
		return $this->db->update('member',$member);
	}
}
?>