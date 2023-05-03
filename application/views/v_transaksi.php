<h2>Pesanan Anda</h2>


<div class="col-md-12" style="background:white">
<div class="row">
<br>
<a href="<?=base_url('index.php/DashUser')?>" class="btn btn-primary">Belanja lagi</a>
<a href="#" data-toggle="modal" onclick="simpan_list_db()" class="btn btn-warning">Bayar</a>
<table class="table table-hover table-stripped">
<thead>
<tr>
<th>No</th><th>Nama Barang</th><th>QTY</th><th>Sub total</th><th>Aksi</th>
</tr>
</thead>
<tbody id="tm_pesanan"></tbody>
</table>
<div id="pesan"></div>
</div>
</div>
<div class="modal fade" id="bayar">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
<h4 class="modal-title">Pembayaran</h4>
</div>
<div class="modal-body">
    <h3>Terimakasih anda telah memesan produk kami</h3>
    <p>Untuk melanjutkan pembelian, silahkan transfer sejumlah Rp. <span id="totalnya"></span> ke rekening berikut:</p>
    <p>Bank Bni : 8238283923232352</p>
    Jika sudah transfer, silahkan upload bukti transfer dibawah ini:
    <form id="upload_bukti" method="post" enctype="multipart/form-data">
        <input type="file" name="bukti" class="form-control"><br>
        <input type="hidden" name="id_nota" id="id_nota"><br>
        <input type="submit" name="submit" value="Kirim" class="btn btn-success" style="float:left;margin-right:10px">
        <img src="<?=base_url()?>asset/loading.gif" id="loading" alt="">
        <span id="pesan1"></span>
    </form>
</div>
<div class="modal-footer">
<button class="btn btn-default" data-dismiss="modal" type="button">Close</button>
</div>
</div>
</div>
</div>
<script>
function loadCart() {
    $("#tm_pesanan").html('');
    $.getJSON("<?=base_url()?>index.php/Transaksi/viewPesanan",function(data){
        var no=0;
        $.each(data['data_cart'],function(key,dt){
            no++;
            $("#tm_pesanan").append(
                '<tr>'+
                '<td>'+no+'</td>'+
                '<td>'+dt['name']+'</td>'+
                '<td>'+dt['qty']+'</td>'+
                '<td>'+dt['subtotal']+'</td>'+
                '<td><a href="#" onclick="if(confirm(\'Apakah Yakin?\')){ hapus_cart(\''+dt['rowid']+'\')}"><i class="material-icons">delete</i></a></td>'+
                '</tr>'
            );
        });
        $("#tm_pesanan").append(
            '<tr>'+
                 '<td colspan=3>Total Keseluruhan</td><td align="right">'+hasil['total_seluruh']+'</td>'+
            '</tr>'
        );
    });
}
loadCart();
function simpan_list_db(){
    $.getJSON("<?=base_url()?>index.php/transaksi/simpanBayar",function(data){
        if(data['status'] == 1){
            $("#pesan").html('Anda sukses menyimpan ke nota');
            $("#pesan").show('animate');
            $("#pesan").addClass("alert alert-success");
            setTimeout(function(){
                $("#pesan").hide('animate');
                $("#pesan").removeClass("alert alert-success");
                setTimeout(function(){
                    $("#totalnya").html(data['total']);
                    $("#bayar").modal("show");
                    $("#id_nota").val(data['id_nota']);
                    load_total_cart();
                    loadCart();
                }, 500);
            }, 3000);
        }
    });
}
$("#upload_bukti").submit(function(e){
    e.preventDefault();
    var url = "<?=base_url()?>index.php/transaksi/upload_bukti";
    var formData = new FormData($("#upload_bukti")[0]);
    $.ajax({
        url : url,
        type: "post",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "json",
        beforeSend:function(){
            $("#loading").css("display","block");
        },
        success:function(data){
            if(data['status']==1){
                $("#loading").css("display","none");
                $("#pesan1").html("Bukti telah terupload");
                $("#pesan1").show("fade");
                $("#pesan1").addClass("alert alert-success");
                setTimeout(function(){
                    $("#pesan1").hide("fade");
                    setTimeout(function(){
                        $("#bayar").modal("hide");
                        $("#pesan1").removeClass("alert alert-success");
                    }, 500);
                }, 2000);
            }else{
                $("#loading").css("display","none");
                $("#pesan1").html("Bukti gagal terupload");
                $("#pesan1").show("fade");
                $("#pesan1").addClass("alert alert-danger");
                setTimeout(function(){
                    $("#pesan1").hide("fade");
                    setTimeout(function(){
                        $("#bayar").modal("hide");
                        $("#pesan1").removeClass("alert alert-danger");
                    }, 500);
                }, 2000);
            }
        }
    });
});
</script>