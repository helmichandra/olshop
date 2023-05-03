<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Login_user extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_user_model','l_user');
        
    }
    
    
    public function index()
    {
        $this->load->view('v_loginUser');
        
    }
    public function prosesLogin()
    {
      $login = $this->l_user->cekDataUser();
      if ($login->num_rows()>0) {
          $dataUser = $login->row();
          $array = array(
              'id_pembeli' => $dataUser->id_pembeli,
              'nama_pembeli' => $dataUser->nama_pembeli,
              'username' => $dataUser->username,
              'password' => $dataUser->password,
              'login_user' => TRUE
          );
          
          $this->session->set_userdata( $array );
          $data['status'] = 1;
          echo json_encode($data);
      }
      else {
          $data['status'] = 0;
          echo json_encode($data);
      }
    }
    public function simpan()
    {
        $cekdata = $this->l_user->addUser();
        if ($cekdata) {
          $data['status'] = 1;
          $data['keterangan'] = "Anda sukses menambah data";
          echo json_encode($data);
        }else {
          $data['status'] = 0;
          $data['keterangan'] = "Anda gagal menambah data";
          echo json_encode($data);
        }
    }


}

/* End of file Login_user.php */
