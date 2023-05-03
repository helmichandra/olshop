<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class DashUser extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('login_user')!= TRUE){
			
			redirect(base_url('index.php/login_user'),'refresh');
			
		}
		
	}
    
    public function index()
    {
        $data['konten'] = "home_user";
		$this->load->view('templateUser', $data);
    }

}

/* End of file DashUser.php */
