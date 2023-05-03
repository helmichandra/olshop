<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('login')!=true) {
			redirect(base_url('index.php/login'),'refresh');
		}
		
	}

	public function index()
	{
		$data['konten']="home";
		$this->load->view('template',$data);
	}
	public function v_barang()
	{
		
		$this->load->view('v_barang',$data);
	}
	public function v_pembeli()
	{
		
		$this->load->view('v_pembeli',$data);
	}
	public function v_profil()
	{
		
		$this->load->view('v_profil',$data);
	}
	
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */