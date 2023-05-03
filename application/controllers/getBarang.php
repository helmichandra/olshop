<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class getBarang extends CI_Controller {


    
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('getBarang_model','getbar');
        
    }
    

    public function index()
    {
        $dt_barang = $this->getbar->getBarang();

        echo json_encode($dt_barang);
    }

    public function cari($nama_barang='')
    {
        $data_barang = $this->getbar->cari_Barang($nama_barang);


        echo json_encode($data_barang);
    }
    public function detail($id_barang)
    {
        $data_barang = $this->getbar->getDetail($id_barang);
        echo json_encode($data_barang);
    }

}

/* End of file getBarang.php */
