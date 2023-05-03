<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In | Bootstrap Based Admin Template - Material Design</title>
    <!-- Favicon-->
    <link rel="icon" href="<?= base_url()?>asset/favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?= base_url()?>asset/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?= base_url()?>asset/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?= base_url()?>asset/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?= base_url()?>asset/css/style.css" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">User<b>OLSHOP</b></a>
            <small>TOKO ONLINE</small>
        </div>
        <div class="card">
            <div class="body">
                <form action="#" id="signIn" method="POST">
                    <div class="msg">Silahkan login untuk berbelanja</div>
                    <div id ="pesan" class="alert alert-warning"></div>
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
                            <input type="password" class="form-control" name="password" placeholder="Password" >
                        </div>
                    </div>                 
                    <div class="row">
                    <div class="col-xs-6">
                    <a class="btn btn-block bg-green waves-effect" data-toggle="modal" data-target="#tabDaftar">Daftar</a>
                    </div>
                    <div class="col-xs-4 pull-right">
                    <button class="btn btn-block bg-pink waves-effect" href="<?=base_url()?>index.php" type="submit">Sign in</button>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="tabDaftar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Pendaftaran Pelanggan</h4>
      </div>
      <div class="modal-body">
          <form id="proses_daftar" method="post" action="#">

            
            <label for="nama">Nama </label>
            <input type="text" name="nama_pembeli" class="form-control"><br>          
              
            
            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="" cols="10" rows="5" class="form-control"></textarea> <br>              
              
            
            <label for="no_telp">No Telp</label>
            <input type="text" name="no_telp" class="form-control"><br>                  
              
            
            <label for="user">Username</label>
            <input type="text" name="username" class="form-control"><br>                 
            
            
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control"><br>                  
              
                <div class="modal-footer">
                <div class="col-xs-4 pull-right">
                 <input type="submit" name="daftar" value="DAFTAR" class="btn btn-block bg-green waves-effect">                
                </div>
                <p id="msg"></p>
                </div>              
            </form>
      </div>

    </div>
  </div>
</div>

    <!-- Jquery Core Js -->
    <script src="<?= base_url()?>asset/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?= base_url()?>asset/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?= base_url()?>asset/plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="<?= base_url()?>asset/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="<?= base_url()?>asset/js/admin.js"></script>
    <script src="<?= base_url()?>asset/js/pages/examples/sign-in.js"></script>
    <script></script>
    <script>
    $('#proses_daftar').submit(function (e) {
        e.preventDefault();
        var data_input =  $('#proses_daftar').serialize();
        $('#msg').html("<ul><li>Sedang Memeriksa....</li></ul>");
        $.ajax({
            url : "<?=base_url()?>index.php/login_user/simpan",
            type: "POST",
            data: data_input,
            dataType: "json",
            success:function (hasil) {
                if(hasil['status'] == 1){
                    $("#msg").html(hasil['keterangan']);
                    $("[name=nama_pembeli]").val('');
                    $("[name=alamat]").val('');
                    $("[name=no_telp]").val('');
                    $("[name=username]").val('');
                    $("[name=password]").val('');
                    setTimeout(function() {
                    $("#tabDaftar").modal("hide");
                }, 3000);
                }else{
                    $("#msg").html(hasil['keterangan']);
                }
            }
        });
    });

    $("#signIn").submit(function(e) {
        e.preventDefault();
        var dataLogin = $("#signIn").serialize();
        $("pesan").html("Loading ..... ");
        $.ajax({
            url: "<?=base_url()?>index.php/login_user/prosesLogin",
            type: "POST",
            data: dataLogin,
            dataType: "json",
            success:function (hasil) {
                if(hasil['status'] == 1){
                    $("#pesan").html("Anda berhasil login");
                    setTimeout(function() {
                        location.href="<?=base_url()?>index.php/DashUser";
                      }, 3000);
                }else{
                    $("#pesan").html("Username atau Password tidak cocok");
                }
            }
        });
    });

    </script>
</body>

</html>
