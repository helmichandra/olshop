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
                                <i class="material-icons">library_add</i>
                                <span>Tambah</span>
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
                                <form action="<?=base_url('index.php/pembeli/addPembeli')?>" method="post">

                                <label for="nama_pmbli">Nama Pembeli</label>
                                <input type="text" name="nama_pembeli" class="form-control"><br>
                                
                                <label for="user">Username</label>
                                <input type="text" name="username" class="form-control"><br>

                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" cols="30" rows="10" class="form-control"></textarea>                              
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control"><br>    
                                
                                <label for="no_telp">NO TELP</label>
                                <input type="text" name="no_telp" class="form-control"><br>    

                                <br>
                                <div class="modal-footer">
                                <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
                                </div>
                                </form>
                                
                            </div>
                            
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                        <div class="modal fade" id="update_pembeli">
                            <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title">Tambah Barang</h4>
                            </div>
                            <div class="modal-body">
                                <form action="<?=base_url('index.php/pembeli/updatePembeli')?>" method="post">

                                <input type="hidden" name="id_pembeli" id="id_pbmli" >

                                <label for="nama_pmbli">Nama Pembeli</label>
                                <input type="text" name="nama_pembeli" class="form-control" id="nm_pmbli"><br>
                                
                                <label for="user">Username</label>
                                <input type="text" name="username" class="form-control" id="usernm"><br>

                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" cols="30" rows="10" class="form-control" id="almt"></textarea>                              
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="pass"><br>    
                                
                                <label for="no_telp">NO TELP</label>
                                <input type="text" name="no_telp" class="form-control" id="n_telp"><br>    
                             
                                

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
                                <tr><th>NO</th><th>ID</th><th>NAMA PEMBELI</th><th>USERNAME</th><th>ALAMAT</th><th>PASSWORD</th><th>NO TELP</th><th>Aksi</th></tr>
                                <?php 
                                $no = 0;
                                foreach ($dataPembeli as $pembeli) {
                                $no++;    
                                echo '
                                    <tr>
                                    <td>'.$no.'</td>
                                    <td>'.$pembeli->id_pembeli.'</td>
                                    <td>'.$pembeli->nama_pembeli.'</td>
                                    <td>'.$pembeli->username.'</td>
                                    <td>'.$pembeli->alamat.'</td>
                                    <td>'.$pembeli->password.'</td>
                                    <td>'.$pembeli->no_telp.'</td>
                                    <td><a href="#update_pembeli" class="btn btn-warning" data-toggle="modal" onclick="tm_detail('.$pembeli->id_pembeli.')"><i class="material-icons">edit</i></a>
                                    <a href='.base_url('index.php/Pembeli/deletePembeli/'.$pembeli->id_pembeli).' class="btn btn-success" onclick="return confirm(\'Anda Yakin ?\')"><i class="material-icons">delete</i></a></td>
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
            <script>
            function tm_detail(id_pembeli) {
                $.getJSON("<?=base_url()?>index.php/pembeli/getDetailPembeli/"+id_pembeli,function (data) {
                    $("#id_pbmli").val(data['id_pembeli'])
                    $("#nm_pmbli").val(data['nama_pembeli']);
                    $("#usernm").val(data['username']);
                    $("#almt").val(data['alamat']);
                    $("#pass").val(data['password']);
                    $("#n_telp").val(data['no_telp']);
                });
            }
            </script>
</body>
</html>