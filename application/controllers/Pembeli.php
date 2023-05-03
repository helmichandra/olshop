<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Pembeli extends CI_Controller {
public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('login')!=true) {
            redirect(base_url('index.php/login'),'refresh');
        }
        
    }
    public function index()
    {
        $this->load->model('pembeli_model');
        $data['data_pembeli'] = $this->pembeli_model->get_pembeli();

        $data['konten'] = "v_pembeli";
        $this->load->view('template', $data, FALSE);
        
    }
    public function simpan_pembeli()
    {
        $this->form_validation->set_rules('nama_pembeli', 'NAMA PEMBELI', 'trim|required');
        $this->form_validation->set_rules('alamat', 'ALAMAT', 'trim|required');
        $this->form_validation->set_rules('no_telp', 'NO TELP', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required' ,
        array('required' => 'SEMUA HARUS DIISI !!'));
        
        
        if ($this->form_validation->run() == TRUE) {
            
            $this->load->model('pembeli_model','pembeli');
            $masuk = $this->pembeli->masuk_db();
            if ($masuk == TRUE) {

                  $this->session->set_flashdata('pesan', 'sukses masuk');
            }else
            {
                $this->session->set_flashdata('pesan', 'gagal masuk');
                
            }
            
            redirect(base_url('index.php/pembeli'),'refresh');
            

        } else {
            $this->session->set_flashdata('pesan',
             validation_errors());
             
             redirect(base_url('index.php/pembeli'),'refresh');
        }
        
    }
    public function get_detail_pembeli($id_pembeli)
    {
        $this->load->model('pembeli_model');
        $data_detail=$this->pembeli_model->detail_pembeli($id_pembeli);
        echo json_encode($data_detail);
    }
    public function update_pembeli()
    {
        $this->form_validation->set_rules('nama_pembeli', 'NAMA PEMBELI', 'trim|required');
        $this->form_validation->set_rules('alamat', 'ALAMAT', 'trim|required');
        $this->form_validation->set_rules('no_telp', 'NO TELP', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run()== FALSE) {
            $this->session->set_flashdata('pesan', validation_errors());
            redirect(base_url('index.php/pembeli'),'refresh');
        }
        else{
            $this->load->model('pembeli_model');
            $proses_update=$this->pembeli_model->update_pembeli();
            if ($proses_update) {
                $this->session->set_flashdata('pesan', 'sukses update');
            }
            else{
                $this->session->set_flashdata('pesan', 'gagal update');
            }
            redirect('base_url'('index.php/pembeli'),'refresh');
        }
    }
    public function hapus_pembeli($id_pembeli)
    {
        $this->load->model('Pembeli_model');
        $prosesHapus = $this->Pembeli_model->hapus_pembeli($id_pembeli);
        if ($prosesHapus == TRUE) {
            $this->session->set_flashdata('pesan', 'sukses lur');
        }
        else{
            $this->session->set_flashdata('pesan', 'gagal lur');
        }
        redirect(base_url('index.php/pembeli'),'refresh');
    }

}

/* End of file pembeli.php */

?>


