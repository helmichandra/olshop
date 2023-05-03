<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

    public function index()
    {
        $this->load->model('Barang_model');
        $data['data_barang'] = $this->Barang_model->getBarang();


        $this->load->model('Kategori_model');
        $data['data_kategori'] = $this->Kategori_model->getKategori();
        

        $data['konten'] = "v_barang";
        $this->load->view('template', $data, FALSE);
        
    }
    public function simpan_barang()
    {
        $this->form_validation->set_rules('nama_barang', 'NAMA BARANG', 'trim|required');
        $this->form_validation->set_rules('harga', 'HARGA', 'trim|required');
        $this->form_validation->set_rules('stok', 'STOK', 'trim|required');
        $this->form_validation->set_rules('id_kategori', 'ID KATEGORI', 'trim|required' ,
        array('required' => 'SEMUA HARUS DIISI !!'));
        
        
        if ($this->form_validation->run() == TRUE) {
            
            $this->load->model('barang_model','barang');
            $masuk = $this->barang->masuk_db();
            if ($masuk == TRUE) {

                  $this->session->set_flashdata('pesan', 'sukses masuk');
            }else
            {
                $this->session->set_flashdata('pesan', 'gagal masuk');
                
            }
            
            redirect(base_url('index.php/barang'),'refresh');
            

        } else {
            $this->session->set_flashdata('pesan',
             validation_errors());
             
             redirect(base_url('index.php/barang'),'refresh');
        }
        
    }

}

/* End of file Barang.php */

?>