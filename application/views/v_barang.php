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
                                <form action="<?=base_url('index.php/barang/simpan_barang')?>" enctype="multipart/form-data" method="post">

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
                                </select>
                             
                                

                                <br>
                                Upload Gambar
                                <input type="file" name="gambar" class="form-control">
                                <input type="submit" name="simpan" value="simpan" class="btn btn-success">
                                </div>
                                </form>
                                
                            </div>
                            
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                        <div class="modal fade" id="update_barang">
                            <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title">Tambah Barang</h4>
                            </div>
                            <div class="modal-body">
                                <form action="<?=base_url('index.php/barang/update_barang')?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id_barang" id="id_barang">
                                <label for="nama_brg">Nama Barang</label>
                                <input id="nama_barang" type="text" name="nama_barang" class="form-control"><br>
                                
                                <label for="hrg_brg">Harga Barang</label>
                                <input id="harga" type="text" name="harga" class="form-control"><br>                                
                               
                                
                                <label for="stok_brg">Stok Barang</label>
                                <input id="stok" type="text" name="stok" class="form-control"><br>    
                                
                            
                                <label for="">ID Kategori</label>
                                <select id="id_kategori" name="id_kategori" id="" class="form-control" >
                                <option value="none">Pilih Kategori</option>
                                <?php 
                                foreach ($data_kategori as $kat) {
                                    echo "<option value='".$kat-> id_kategori."'>".
                                    $kat->nama_kategori."</option>";
                                }
                                
                                ?>
                                
                                </select>
                                <br>
                                Upload Gambar
                                <input type="file" name="gambar" class="form-control">
                                <input type="submit" name="simpan" value="simpan" class="btn btn-success">
                                </form>
                                </div>
                                <div class="modal-footer">

                                
                                
                            </div>
                            
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->

                        <div class="body">
                        <div class="row">
                           <div class="col-md-12 col-xs-12 col-sm-12">
                           
                                <table class="table table-hover table-striped">
                                <tr><th>NO</th><th>ID</th><th>NAMA BARANG</th><th>HARGA</th><th>STOK</th><th>NAMA KATEGORI</th><th>GAMBAR</th><th>Aksi</th></tr>

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
                                    <td><img src='.base_url("asset/gambar/$dt_bar->gambar").' width="120" height="100"></td>
                                    <td><a href="#update_barang" class="btn btn-warning"
                                    data-toggle="modal" onclick="
                                    tm_detail('.$dt_bar->id_barang.')">Update</a>
                                    <a href='.base_url('index.php/barang/hapus_barang/'.$dt_bar->id_barang).' class="btn btn-success" onclick="return confirm(\'anda yakin lur?\')">Delete</a></td>
                                    </tr>';
                                }
                                ?>
                               
                                </table>
                                <?php if ($this->session->flashdata('pesan')!=null): ?>
                                <div class="alert alert-danger">
                                <?= $this->session->flashdata('pesan');?>
                                </div>
                                 <?php endif ?> 
                                
                                
                           </div>
                        </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>

</body>

</html>
<script> function tm_detail(id_brng){
$.getJSON("<?=base_url()?>index.php/barang/get_detail_barang/"+id_brng,function(data){
    $("#id_barang").val(data['id_barang']);
    $("#nama_barang").val(data['nama_barang']);
    $("#harga").val(data['harga']);
    $("#stok").val(data['stok']);
    $("#id_kategori").val(data['id_kategori']);
});}
</script>
