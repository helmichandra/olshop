<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {
public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('login')!=true) {
            redirect(base_url('index.php/login'),'refresh');
        }
        
    }
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
           /*     $this->session->set_flashdata('pesan', 'gagal masuk');*/
                
            }
            
            redirect(base_url('index.php/barang'),'refresh');
            

        } else {
            $this->session->set_flashdata('pesan',
             validation_errors());
             
             redirect(base_url('index.php/barang'),'refresh');
        }
        
    }
    public function get_detail_barang($id_barang)
    {
        $this->load->model('barang_model');
        $data_detail=$this->barang_model->detail_barang($id_barang);
        echo json_encode($data_detail);
    }
    public function update_barang()
    {
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'trim|required');
        $this->form_validation->set_rules('harga', 'Harga', 'trim|required');
        $this->form_validation->set_rules('stok', 'Stok', 'trim|required');
        $this->form_validation->set_rules('id_kategori', 'Id Kategori', 'trim|required');
        if ($this->form_validation->run()== FALSE) {
            $this->session->set_flashdata('pesan', validation_errors());
            redirect(base_url('index.php/barang'),'refresh');
        }
        else{
            $this->load->model('barang_model');
            $proses_update=$this->barang_model->update_barang();
            if ($proses_update) {
                $this->session->set_flashdata('pesan', 'sukses update');
            }
            else{
                $this->session->set_flashdata('pesan', 'gagal update');
            }
            redirect('base_url'('index.php/barang'),'refresh');
        }
    }
    public function hapus_barang($id_barang)
    {
        $this->load->model('Barang_model');
        $prosesHapus = $this->Barang_model->hapus_barang($id_barang);
        if ($prosesHapus == TRUE) {
            $this->session->set_flashdata('pesan', 'sukses lur');
        }
        else{
            $this->session->set_flashdata('pesan', 'gagal lur');
        }
        /*redirect(base_url('index.php/barang'),'refresh');*/
    }

}

/* End of file Barang.php */

?>


