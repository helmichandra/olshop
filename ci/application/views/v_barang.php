<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
    <title>Document</title>
</head>
<body>
    <div class="block-header">
        <h2>DATA BARANG</h2>
    </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-6">
                                    <h2>BARANG</h2>
                                </div>
                            </div>
                            <ul class="header-dropdown m-r--5">
                               <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                <span class="glyphicon glyphicon-plus"></span>
                                Tambah
                               </button>
                            </ul>
                        </div>
                        <div class="modal fade" id="myModal">
                            <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title">Tambah Barang</h4>
                            </div>
                            <div class="modal-body">
                                <form action="<?=base_url('index.php/barang/simpan_barang')?>" method="post">

                                <label for="nama_brg">Nama Barang</label>
                                <input type="text" name="nama_barang" class="form-control"><br>
                                
                                <label for="hrg_brg">Harga Barang</label>
                                <input type="text" name="harga" class="form-control"><br>                                
                               
                                
                                <label for="stok_brg">Stok Barang</label>
                                <input type="text" name="stok" class="form-control"><br>    
                                
                            
                                <label for="">ID Kategori</label>
                                <select name="id_kategori" id="" class="form-control" >
                                <option value="none">Pilih Kategori</option>
                                <?php 
                                foreach ($data_kategori as $kat) {
                                    echo "<option value='".$kat->id_kategori."'>".
                                    $kat->nama_kategori."</option>";
                                }
                                
                                ?>
                                <!-- <option value="1">Laptop</option>
                                <option value="2">Accessories</option>
                                <option value="3">SmartPhone</option>
                                <option value="4">Software</option>
                                <option value="5">Makanan</option> -->
                                </select>
                             
                                

                                <br>
                                <div class="modal-footer">
                                <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
                                </div>
                                </form>
                                
                            </div>
                            
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                        <div class="body">
                        <div class="row">
                           <div class="col-md-12 col-xs-12 col-sm-12">
                           
                                <table class="table table-hover table-striped">
                                <tr><th>NO</th><th>ID</th><th>NAMA BARANG</th><th>HARGA</th><th>STOK</th><th>NAMA KATEGORI</th></tr>
                                <?php 
                                $no = 0;
                                foreach ($data_barang as $dt_bar) {
                                $no++;    
                                echo '
                                    <tr>
                                    <td>'.$no.'</td>
                                    <td>'.$dt_bar->id_barang.'</td>
                                    <td>'.$dt_bar->nama_barang.'</td>
                                    <td>'.$dt_bar->harga.'</td>
                                    <td>'.$dt_bar->stok.'</td>
                                    <td>'.$dt_bar->nama_kategori.'</td>
                                    </tr>';
                                }
                                ?>
                               
                                </table>
                                <?php if ($this->session->flashdata('pesan')!=null): ?>
                                <div class="alert alert-danger">
                                <?= $this->session->flashdata('pesan');?>
                                </div>
                                 <?php endif ?> 
                                <!-- <?php if($this->session->flashdata('pesan')!=null)
                                {
                                echo '
                                <div class="alert alert-danger">'
                                .$this->session->flashdata('pesan').'
                                </div> ';
                                }
                                ?>      -->
                           </div>
                        </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
</body>
</html>