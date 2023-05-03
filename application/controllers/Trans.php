<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Trans extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Get_barang_model','getbar');
        
    }
    

    public function index()
    {
        $data['konten'] = "v_pembelian";
        $this->load->view('Dashboard_user', $data);
        
        

    }

    public function tambahcart($id_barang,$jumlah)
    {
        $dataDetail = $this->getbar->getDetail($id_barang);
        $data = array(
            'id' => $dataDetail->id_barang,
            'qty' => $jumlah,
            'price' => $dataDetail->harga,
            'name' => $dataDetail->nama_barang,
            'options' => array('kategori' => $dataDetail->nama_kategori)
        );

        $tambahCart = $this->cart->insert($data);
        if($tambahCart){
            $data['total_cart'] = $this->cart->total_items();
            $data['status'] = 1;
            echo json_encode($data);
        }
        else{
            $data['total_cart'] = $this->cart->total_items();
            $data['status'] = 0;
            echo json_encode($data);
        }
    }
    public function viewPesanan()
    {
        $data['total_seluruh'] = $this->cart->total();
        $data['data_cart'] = $this->cart->contents();
        echo json_encode($data);
    }
    public function showCartItems()
    {
        $data['total_cart'] = $this->cart->total_items();
        echo json_encode($data);
    }
    public function simpanBayar()
    {
        $buatNota = $this->getbar->createNota();
        if($buatNota)
        {
            $dataNota = $this->getbar->getLastNota();
            foreach ($this->cart->contents() as $item) {
                $object[] = array(
                    'id_nota' => $dataNota->id_nota,
                    'id_barang' => $item['id'],
                    'qty' => $item['qty']
                );
            }
            $masukData = $this->db->insert_batch('transaksi',$object);
            if($masukData){
                $this->getbar->update_total($dataNota->id_nota);

                $data['status'] = 1;
                $data['id_nota'] = $dataNota->id_nota;
                $data['total'] = $this->cart->total();
                $this->cart->destroy();
                echo json_encode($data);
            }else{
                $data['status'] =0;
                echo json_encode($data);
            }
        }
    }
    public function upload_bukti()
    {
        
        $config['upload_path'] = './asset/bukti';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']  = '10000000';
        $config['max_width']  = '10240000';
        $config['max_height']  = '76800000';
        
        $this->load->library('upload', $config);
        
        if ( ! $this->upload->do_upload('bukti')){
            $error = array('status'=>0, 'error' => $this->upload->display_errors());
            echo json_encode($error);
        }
        else{
            $getAllNota = $this->getbar->update_bukti();
            $data = array('status'=>1, 'upload_data' => $this->upload->data());
            echo json_encode($data);
        }
        
    }
}

/* End of file Transaksi.php */
