<?php
class Home extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$data['judul'] = "Perpustakaan";
		$this->load->view('guests/template/v_header',$data);
		$this->load->view('guests/v_menu');
		$this->load->view('guests/template/v_footer');
	}

	
}
?>