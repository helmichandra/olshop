<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Login_user_model extends CI_Model {

    public function cekDataUser()
    {
    $dataUser = $this->db
    ->where('username',$this->input->post('username'))
    ->where('password',$this->input->post('password'))
    ->get('pembeli');

    return $dataUser;
    }
    public function addUser()
    {
        $object = array(
            'nama_pembeli' => $this->input->post('nama_pembeli'),
            'alamat' => $this->input->post('alamat'),
            'no_telp' => $this->input->post('no_telp'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password')
        );
        $sqlTambah = $this->db->insert('pembeli', $object);
        return $sqlTambah;
    }
}

/* End of file Login_user_model.php */
