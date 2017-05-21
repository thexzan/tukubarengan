// FETCHER PAGE SCRIPT
var waktu = 3000;

var jumlah_order;
var jumlah_confirm;
var revenue;
var jumlah_member;
var jumlah_diskusi;
var count_hits;

var dashboard = base_url+"dashboard/";

// $("#select-waktu").change(function(){
//   waktu = $(this).val();
// })
  // SINAU AJAX
  setInterval(function(){
    $.ajax({
        type: "POST",
        url: dashboard+"hits-gb",
        success: function(result) {
          data = result;
          $('.hits-gb').html('');
          $('.hits-gb').append(result);
          $("time.timeago").timeago();
        }
      }); 

    $.ajax({
        type: "POST",
        url: dashboard+"latest-order",
        success: function(result) {
          data = result;
          $('.latest-order').html('');
          $('.latest-order').append(result);
          $("time.timeago").timeago();
        }
      }); 

    $.ajax({
        type: "POST",
        url: dashboard+"latest-confirm",
        success: function(result) {
          data = result;
          $('.latest-confirm').html('');
          $('.latest-confirm').append(result);
          $("time.timeago").timeago();
        }
      }); 

    $.ajax({
        type: "POST",
        url: dashboard+"gb-status",
        success: function(result) {
          data = result;
          $('.gb-status').html('');
          $('.gb-status').append(result);
        }
      });

    $.ajax({
        type: "POST",
        url: dashboard+"latest-diskusi",
        success: function(result) {
          data = result;
          $('.latest-diskusi').html('');
          $('.latest-diskusi').append(result);
          $("time.timeago").timeago();
        }
      });

    $.ajax({
        type: "POST",
        url: dashboard+"latest-member",
        success: function(result) {
          data = result;
          $('.latest-member').html('');
          $('.latest-member').append(result);
          $("time.timeago").timeago();
        }
      });

    $.ajax({
        type: "POST",
        url: dashboard+"revenue-by-bank",
        success: function(result) {
          data = result;
          $('.revenue-by-bank').html('');
          $('.revenue-by-bank').append(result);
        }
      });

    $.ajax({
        type: "POST",
        url: dashboard+"count-order",
        success: function(result) {
          data = result;
          $('.count-order').html('');
          $('.count-order').append('<h2><span>'+result+'</span></h2>');
          if (jumlah_order != result) {
            $('.count-order span').animateNumber({ number: result });
          };
          jumlah_order = result;
        }
      });

    $.ajax({
        type: "POST",
        url: dashboard+"count-confirm",
        success: function(result) {
          data = result;
          $('.count-confirm').html('');
          $('.count-confirm').append('<h2><span>'+result+'</span></h2>');
          if (jumlah_confirm != result) {
            $('.count-confirm span').animateNumber({ number: result });
          };
          jumlah_confirm = result;
        }
      });

    $.ajax({
        type: "POST",
        url: dashboard+"revenue",
        success: function(result) {
          data = result;
          $('.revenue').html('');
          $('.revenue').append('<h2><span>'+result+'</span></h2>');
        }
      });

    $.ajax({
        type: "POST",
        url: dashboard+"jumlah-member",
        success: function(result) {
          data = result;
          $('.jumlah-member').html('');
          $('.jumlah-member').append('<h2><span>'+result+'</span></h2>');
          if (jumlah_member != result) {
            $('.jumlah-member span').animateNumber({ number: result });
          };
          jumlah_member = result;
        }
      });

    $.ajax({
        type: "POST",
        url: dashboard+"jumlah-diskusi",
        success: function(result) {
          data = result;
          $('.jumlah-diskusi').html('');
          $('.jumlah-diskusi').append('<h2><span>'+result+'</span></h2>');
          if (jumlah_diskusi != result) {
            $('.jumlah-diskusi span').animateNumber({ number: result });
          };
          jumlah_diskusi = result;
        }
      });

    $.ajax({
        type: "POST",
        url: dashboard+"count-hits",
        success: function(result) {
          data = result;
          $('.count-hits').html('');
          $('.count-hits').append('<h2><span>'+result+'<span></h2>');
          if (count_hits != result) {
            $('.count-hits span').animateNumber({ number: result });
          };
          count_hits = result;
        }
      });

     // $('.waktu').html('');
     // $('.waktu').append(waktu/1000);
  }, waktu) /* time in milliseconds (ie 2 seconds)*/