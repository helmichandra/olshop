<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script  src="https://code.jquery.com/jquery-3.2.1.js" ></script>
    <title>Document</title>
</head>
<body>
    <div class="block-header">
        <h2>DATA KATEGORI</h2>
    </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-6">
                                    <h2>KATEGORI</h2>
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
                                <h4 class="modal-title">Tambah Kategori</h4>
                            </div>
                            <div class="modal-body">
                                <form action="<?=base_url('index.php/kategori/simpan_kategori')?>" method="post">
                                Nama Kategori
                                <input type="text" name="nama_kategori" class="form-control"> <br>
                                <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                        <div class="body">
                        <div class="row">
                           <div class="col-md-12 col-xs-12 col-sm-12">
                           
                                <table class="table table-hover table-striped">
                                <tr><th>NO</th><th>ID</th><th>NAMA KATEGORI</th></tr>
                                <?php 
                                $no = 0;
                                foreach ($data_kategori as $dt_ket) {
                                $no++;    
                                echo '
                                    <tr>
                                    <td>'.$no.'</td>
                                    <td>'.$dt_ket->id_kategori.'</td>
                                    <td>'.$dt_ket->nama_kategori.'</td>
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