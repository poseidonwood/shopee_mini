var base_url = window.location.origin + '/' + window.location.pathname.split ('/') [1]; 
 function addorder(id,stok,berat,harga) {
    $.ajax({
      type: 'POST',
      url: base_url+'/proses/order',
      data: {id:id,stok:stok,berat:berat,harga:harga},
    }).done(function(data) {
      var json = data,
        obj = JSON.parse(json);
      $("#count_cart").html(obj.count_cart);
      // console(obj.notif);
    });
  }
  function deleteCart(idproduct,idcart){
    $.ajax({
      type: 'POST',
      url: base_url+'/proses/cariproduct',
      data: {id:idproduct},
    }).done(function(data) {
      var json = data,
        obj = JSON.parse(json);
      // console(obj.notif);
      Swal.fire({
        title: 'Hapus '+ obj.nama +' dari keranjang?',
        text: "Barang tersebut akan di hapus dari keranjang",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Tetap Hapus!'
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: base_url+'/proses/deletecart/?id=' +idcart,
            data1: 'id=' + idcart,
          }).done(function(data1) {
            var json1 = data1,
            obj1 = JSON.parse(json1);
              Swal.fire(
                'Terhapus!',
                'Item telah terhapus di keranjang.',
                'success'
              )
              window.location.href = base_url+'/product/cart';
          });  
        }
      });  
    });
  }

  function isNumberKey(evt)
  {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
         return false;

         return true;
  }
  function updateqty(id,id_product,berat,harga) {
    var hiddenqty = $('#qty-hidden_'+id).val();
    var qtyname = "qty_" + id
    var qty = $('input[name="'+qtyname+'"]').val();
    if(qty == 0 || qty == null){
      alert('Qty tidak boleh null');
      $('input[name="'+qtyname+'"]').val(hiddenqty); 
    }else{
    $.ajax({
      type: 'POST',
      url: base_url+'/proses/updateqty',
      data: {id:id,id_product:id_product,qty:qty,berat:berat,harga:harga},
    }).done(function(data) {
      var json = data,
        obj = JSON.parse(json);
    
        var harga = obj.harga_jual;
        var qty = obj.qty;
        var total = obj.sub_harga;
        var totalharga = obj.total_harga;
        		
        var	ubahharga = harga.toString().split('').reverse().join(''),
        hargaformat 	= ubahharga.match(/\d{1,3}/g);
        hargaformat	= hargaformat.join('.').split('').reverse().join('');

        var	ubahtotal = total.toString().split('').reverse().join(''),
        totalformat 	= ubahtotal.match(/\d{1,3}/g);
        totalformat	= totalformat.join('.').split('').reverse().join('');

        var	ubahtotalharga = totalharga.toString().split('').reverse().join(''),
        totalhargaformat 	= ubahtotalharga.match(/\d{1,3}/g);
        totalhargaformat	= totalhargaformat.join('.').split('').reverse().join('');


      $("#cart_"+id).html("Rp. "+hargaformat+" x "+ qty + " =  Rp. " + totalformat);
      $("#total_harga").html("Rp <span>"+totalhargaformat+"</span>");
      console.log(totalhargaformat);
    });
    }
  }
  // Cek Checkout apakah sudah terdaftar dan show modal
var checknama = $('#nama_text').html();
if (checknama == "Data Belum Ada") {
  $('#editprofile').modal('show');
} else {
  $('#editprofile').modal('hide');
}

// Select2
$(document).ready(function() {
  $("#select2insidemodal").select2({
    dropdownParent: $("#editprofile .modal-content")
  });
});

// Get Kurir Cost
function getongkir(service,ongkir){
  var totalnya = $('#totalnya').val();
  // alert('Service = '+service+' Ongkirnya = Rp' +ongkir);
  $('#ongkirnya').val(ongkir);
  $('#jasa').val(service);
  var totalsemua = parseInt(totalnya) + parseInt(ongkir);
  $('#totalsemua').val(totalsemua);

  var	ubahtotalsemua = totalsemua.toString().split('').reverse().join(''),
  totalsemuafix 	= ubahtotalsemua.match(/\d{1,3}/g);
  totalsemuafix	= totalsemuafix.join('.').split('').reverse().join('');

  $("#totalsemuahtml").html(totalsemuafix);

}
function validasicheckout() {
  var jasa = $('#jasa').val();
  var ongkirnya = $('#ongkirnya').val();
  var total_semua = $('#totalsemua').val();
  if (jasa === ""){
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Pastikan anda pilih metode pengiriman !',
    })

  }else{
    // console.log('ok data semua benar');
    $.ajax({
      type: 'POST',
      url: base_url+'/proses/transaksi',
      data: {jasa:jasa,ongkirnya:ongkirnya,total_semua:total_semua},
    }).done(function(data) {
      var json = data,
        obj = JSON.parse(json);
        console.log(obj);
        // window.location.href= base_url + '/proses/pembayaran/' + obj.id_transaksi;
      // console(obj.notif);
    });
  }

}

