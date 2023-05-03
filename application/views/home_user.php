<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Selamat datang di toko</h1>
<div class="col-md-12">
<div class="row"><input type="text" name="cari" class="form-control" placeholder="Cari disini" id="cari"></div>
<br>
<div class="row">
    <div class="tampil-barang"></div>
</div>
</div>
<div class="modal fade" id="detail_barang">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Detail Barang</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div id="gambar"></div>
                    </div>
                    <div class="col-md-6">
                        <div id="deskripsi"></div>
                        <div id="jumlah"></div>
                        <br>
                        <div id="btn"></div>
                        <br>
                        <div id="pesan"></div>
                    </div>
                </div>
                <script>
                //Detail
                    function tm_detail(id_barang) {
                        $.getJSON("<?=base_url()?>index.php/getBarang/detail/"+id_barang,function(data){
                            $("#gambar").html(
                                '<img src="<?=base_url()?>asset/uploads/'+data['gambar']+'" style="width:100%">'
                            );
                            $("#deskripsi").html(
                                '<table class="table table-hover table-striped">'+
                                '<tr><td>Nama Barang</td><td>'+data['nama_barang']+'</td></tr>'+
                                '<tr><td>Harga Barang</td><td>'+data['harga']+'</td></tr>'+
                                '<tr><td>Stok Barang</td><td>'+data['stok']+'</td></tr>'+
                                '<tr><td>Nama Kategori</td><td>'+data['nama_kategori']+'</td></tr>'+
                                '</table>'
                            );
                            $("#jumlah").html(
                                '<input type="number" id="jumlah_item" value="1" class="form-control">'
                            );
                            $("#btn").html(
                                '<button id="beli" onclick="beli('+data['id_barang']+')" class="btn btn-info">Beli</button>'+
                                '<a href="<?=base_url()?>index.php/Transaksi" class="btn btn-danger">Check Out</a>'
                            );
                        });
                    }
                </script>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default" type="button" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</body>
<script>
//TAMPIL
$.getJSON("<?=base_url()?>index.php/getBarang",function(data){
    var datanya = "";
    $.each(data,function(key,dt) {
        datanya += '<div class="col-md-3"><a href="#detail_barang" class="thumbnail text-center" data-toggle="modal" onclick="tm_detail('+dt['id_barang']+')" style="text-decoration:none;">'+
        '<img style="height:150px" src="<?=base_url('asset/uploads/')?>'+dt['gambar']+'" alt="">Nama Barang : '+
        dt['nama_barang']+'<br>Harga : '+dt['harga']+'</a>'+
        '</div>';
    });
    $(".tampil-barang").html(datanya);
});
//CARI
$("#cari").on('keyup',(function(){
    $.getJSON("<?=base_url()?>index.php/getBarang/cari/"+$("#cari").val(),
    function(data){
        var datanya = "";
        $.each(data,function(key,dt){
            datanya +=
            '<div class="col-md-3"><a href="#detail_barang" class="thumbnail text-center" data-toggle="modal" onclick="tm_detail('+dt['id_barang']+')"  style="text-decoration:none;">'+
        '<img style="height:150px" src="<?=base_url('asset/uploads/')?>'+dt['gambar']+'" alt="">Nama Barang : '+
        dt['nama_barang']+'<br>Harga : '+dt['harga']+'</a>'+
        '</div>';
        });
        $(".tampil-barang").html(datanya);
    });
}));
//menambahkan barang ke keranjang
function beli(id_barang) {
    var jumlah =$('#jumlah_item').val();
    $('#pesan').hide();
    $('#pesan').removeClass("alert alert-success");
    $.getJSON("<?=base_url()?>index.php/Transaksi/tambahcart/" +id_barang+"/"+jumlah,function(result){

        $("#cart").html(result['total_cart']);
        $("#pesan").html("Item anda telah ditambahkan ke cart");
        $("#pesan").addClass("alert alert-success");
        $("#pesan").show('animate');
        setTimeout(function(){
            $("#pesan").hide("fade");
        }, 3000);
    });
}
</script>
</html>