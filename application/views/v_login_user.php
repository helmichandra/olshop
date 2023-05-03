<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In | Bootstrap Based Admin Template - Material Design</title>
    <!-- Favicon-->
    <link rel="icon" href="<?=base_url()?>asset/favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?=base_url()?>asset/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?=base_url()?>asset/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?=base_url()?>asset/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?=base_url()?>asset/css/style.css" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">POIS<b>ON</b></a>
            <small>Use<b>less</b></small>
        </div>
        <div class="card">
            <div class="body">
                <form action="<?=base_url()?>index.php/login/proses_login" id="sign_in" method="POST">
                    <div class="msg">Sign Dulu <b>LURRR</b></div>
                    
                        <div id="pesan" class="alert alert-danger">
                                
                                </div>
                                 
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username"  autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                            
                    </div>
                        </div>
                        <div class="col-xs-4">
                            <a class="btn btn-block bg-green waves-effect" data-toggle="modal" data-target="#daftar">DAFTAR</a>
                        </div>
                        <div class="col-xs-6">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b-20">
                        <div class="col-xs-6 align-right"></div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="daftar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Pendaftaran Pelanggan</h4>
      </div>
      <div class="modal-body">
        <form id="proses_daftar" method="POST" action="#">
        <table>
            <tr>
                Nama<input type="text" name="nama" class="form-control">
            </tr>
            <tr>
               Alamat<textarea name="alamat" class="form-control"></textarea>
            </tr>
            <tr>
               Telp<input name="no_telp" class="form-control"></textarea>
            </tr>
            <tr>
               Username<input name="username" class="form-control"></textarea>
            </tr>
            <tr>
               Password<input name="password" class="form-control"></textarea><br>
            </tr>
        </table>
        <input type="submit" name="daftar" value="DAFTAR" class="btn btn-block bg-pink waves-effect">
        <p id="msg"></p>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
    <!-- Jquery Core Js -->
    <script src="<?=base_url()?>asset/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?=base_url()?>asset/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?=base_url()?>asset/plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="<?=base_url()?>asset/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="<?=base_url()?>asset/js/admin.js"></script>
    <script src="<?=base_url()?>asset/js/pages/examples/sign-in.js"></script>
</body>

</html>
<script type="text/javascript">
    $("#proses_daftar").submit(function(event) {
        event.preventDefault();
        var data_input  = $('#proses_daftar').serialize();
        $("#msg").html("<ul><li>Sedang memeriksa.....</li></ul>");
        $.ajax({
            url:"<?=base_url()?>index.php/login_user/simpan",type:"post",data:data_input,dataType:"json", 
            success:function(hasil){
                if (hasil['status']==true) {
                    $("#msg").html(hasil['keterangan']);
                    $("[name=nama]"),val('');
                    $("[name=alamat]"),val('');
                    $("[name=telp]"),val('');
                    $("[name=username]"),val('');
                    $("[name=password]"),val('');
                    setTimeout(function() {
                        $("#daftar"),modal('hide');
                    }, 1000);
                    $("#daftar"),modal('hide');
                }
                else{
                    $("#msg").html(hasil['keterangan']);
                }
            }
        });
    });
    $("#sign_in").submit(function(event) {
        event.preventDefault();
        var datalogin=$("#sign_in").serialize();
        $("#pesan").html("Loading.....");
        $.ajax({
            url:"<?=base_url()?>index.php/login_user/proses",
            type:"post",
            data:datalogin,
            dataType:"json",
            success:function(hasil) {
            if (hasil['status']==true) {
                $("#pesan").html("Sukses Login LURRRR");
                setTimeout(function() {
                  location.href="<?=base_url()?>index.php/dashboard_user";  
                }, 3000);
                
            }   else{
                $("#pesan").html("Ga COCOK LURRRR1!1!1!1!1!1!1!");
            } 
            }
        });
    });
</script>