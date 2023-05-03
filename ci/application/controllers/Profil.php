<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

    public function identitas()
    {
        $data['konten']="v_profil";
		$this->load->view('template', $data, FALSE);
    }

}

/* End of file Profil.php */
