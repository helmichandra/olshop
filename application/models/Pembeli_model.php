<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Pembeli_model extends CI_Model {

    public function getPembeli()
    {
        $dataPembeli = $this->db->get('pembeli')->result();
        return $dataPembeli;
        
    }
    public function db_in()
    {
        $dataPembeli = array(
            'nama_pembeli' => $this->input->post('nama_pembeli'),
            'username' => $this->input->post('username'),
            'alamat' => $this->input->post('alamat'),
            'password' => $this->input->post('password'),
            'no_telp' => $this->input->post('no_telp')
        );
        $sql_masuk = $this->db->insert('pembeli', $dataPembeli);
        return $sql_masuk;
    }
    public function detailPembeli($id_pembeli)
    {
        $detail = $this->db->where('id_pembeli',$id_pembeli)->get('pembeli')->row();
        return $detail;
    }
    public function updatePembeli()
    {
        $dataUpdate = array(
            'nama_pembeli' => $this->input->post('nama_pembeli'),
            'username' => $this->input->post('username'),
            'alamat' => $this->input->post('alamat'),
            'password' => $this->input->post('password'),
            'no_telp' => $this->input->post('no_telp')
        );

        $where = $this->db->where('id_pembeli',$this->input->post('id_pembeli'))
        ->update('pembeli', $dataUpdate);
        return $where;
    }
    public function delete_pembeli($id_pembeli)
    {
        $delete = $this->db->where('id_pembeli', $id_pembeli)->delete('pembeli');
        return $delete;
        
    }

}

/* End of file Pembeli_model.php */
