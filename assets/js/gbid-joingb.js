// ANIMASI SAAT AJAX CALL
// SAAT ADA AJAX CALL TAMBAHKAN CLASS LOADING PADA BODY
// DILANJUTKAN DENGAN CSS YANG AKAN MENAMPILKAN LOADING KETIKA BODY ADA CLASS LOADING
$body = $("body");
$(document).on({
   ajaxStart : function() {$body.addClass("loading");},
   ajaxStop  : function() {$body.removeClass("loading");}
});

function hitung_ongkir() {
   $('#paket-pengiriman').html('');
   var kurirpilihan = $('#kurir').find(":selected").val();
   var dataString   = 'destination=' + $('#kabupaten').find(':selected').data('id');
   $.ajax({
       type: "POST",
       url: base_url+"ongkir/result/" + berat_total + "/" + kurirpilihan,
       data: dataString,
       success: function(result) {
           // ENABLE SUBMIT BUTTON
           $('.btn').prop("disabled", false);
           $('.btn').html('Konfirmasi Order');
           data = JSON.parse(result);
           console.log(data);
           // $('#paket-pengiriman').append('<h3 class="text-center">Pilih Paket Pengiriman :</h3>')
           data.rajaongkir.results.forEach(function(result) {
               result.costs.forEach(function(entry) {
                   $('#paket-pengiriman').append('<div class="list"><input type="radio" id="kurirongkir" name="kurirongkir" value="' + entry.service + '|' + entry.cost[0].value + '"><div class="title">' + entry.service + '<small>' + entry.description + '</small></div><div class="price">' + entry.cost[0].value + '</div></div>')
               });
           });
      }
   });
}

function jsucword(str) {
  return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
}

$(document).ready(function() {
  qty         = 1;
  // berat_item  = <?php echo $berat ?>; move to footer
  berat_total = qty * berat_item;

  $('#nama').keyup(function() {
    $(this).val(jsucword($(this).val()));
  });

  $(".qty").change(function() {
     qty         = $(this).find(":selected").val();
     berat_total = qty * berat_item;
     kota_tujuan = $('#kabupaten').find(':selected').data('id');
     kurir       = $('#kurir').find(":selected").val();

     if (typeof kota_tujuan != 'undefined' && typeof kurir != 'undefined' && kurir != 'Pilih Kurir') {
         hitung_ongkir();
     } else {
         return false;
     }
  });

   $("select").select2({
       placeholder: $(this).attr("placeholder"),
       allowClear: true
   });

   // AJAX CALL
   // DATA KABUPATEN DARI ID PROVINSI YANG DIPILIH
   $("#provinsi").change(function() {
       $.ajax({
           type: "POST",
           url: base_url+"ongkir/city/" + $(this).find(':selected').data('id'),
           success: function(result) {
               // ENABLE SELECT BOX UNTUK KURIR
               $('#kabupaten').prop("disabled", false);
               data = JSON.parse(result);
               $('#kabupaten').html('');
               $('#kabupaten').append('<option disabled selected>Pilih Kota / Kabupaten</option>');
               data.forEach(function(entry) {
                   $('#kabupaten').append('<option data-id="' + entry.city_id + '" value="' + entry.city_name + '">' + entry.city_name + '</option>');
               });
           }
       });
   })

   // AJAX CALL
   // DATA KECAMATAN DARI ID KABUPATEN YANG DIPILIH
   $("#kabupaten").change(function() {
       $.ajax({
           type: "POST",
           url: base_url+"ongkir/subdistrict/" + $(this).find(':selected').data('id'),
           success: function(result) {
               // ENABLE SELECT BOX UNTUK KURIR
               $('#kecamatan').prop("disabled", false);
               data = JSON.parse(result);
               $('#kecamatan').html('');
               $('#kecamatan').append('<option disabled selected>Pilih Kecamatan</option>');
               data.forEach(function(entry) {
                   $('#kecamatan').append('<option data-id="' + entry.subdistrict_id + '" value="' + entry.subdistrict_name + '">' + entry.subdistrict_name + '</option>');
               });
           }
       });
   })

   // ENABLE SELECT BOX UNTUK KURIR
   // SAAT KECAMATAN SUDAH DIPILIH
   $("#kecamatan").change(function() {
       $('#kurir').prop("disabled", false);
   })

   // AJAX CALL
   // DATA ONGKOS KIRIM KE KABUPATEN / KOTA YANG DIPILIH
   $("#kurir").change(function() {
       hitung_ongkir();
   });

});