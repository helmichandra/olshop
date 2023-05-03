<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_model extends CI_Model {

    public function getBarang()
    {
        $data_barang = $this->db->join('kategori','kategori.id_kategori = barang.id_kategori')->get('barang')->result();
        return $data_barang;
        
    }
    public function masuk_db()
    {
        $data_barang = array(
            'nama_barang' => $this->input->post('nama_barang'),
            'harga' => $this->input->post('harga'),
            'stok' => $this->input->post('stok'),
            'id_kategori' => $this->input->post('id_kategori')
            
        );
        $sql_masuk = $this->db->insert('barang', $data_barang);
        return $sql_masuk;
        
    }

}

/* End of file Barang_model.php */
