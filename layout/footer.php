           
   </div><!-- END PRODUCT GRID -->
</div><!-- END ROW-->


  </div><!-- END CONTAINER -->


  <div class="container-fluid kaki">
    <div class="container">

      <div class="col-md-4">
        <h4 class="h4"><i class="fa fa-hand-o-right" aria-hidden="true"></i> Tentang TukuBarengan <span class="label label-gbid">BETA</span></h4>
        <p>TukuBarengan is a new hybrid platform for group buying and kickstarter media for indie project. Don't waste your priceless idea, make it come true in GROUP!</p>
      </div>

      <div class="col-md-2">
        <h3 class="h4">TukuBarengan</h3>
       <ul>
          <li><a href="<?php echo base_url; ?>/hal/apa-itu-groupbuy">Apa itu Group Buy?</a></li>
          <li><a href="<?php echo base_url; ?>/hal/tentang-kami">Tentang Kami</a></li>
          <!--<li><a href="#">Karir</a></li>
          <li><a href="#">Forum</a></li>
          <li><a href="#">Blog</a></li>
          <li><a href="#">Media Kit</a></li>-->
        </ul>
      </div>

      <div class="col-md-2">
        <h3 class="h4">Bantuan</h3>
        <ul>
          <li><a href="<?php echo base_url; ?>/hal/faq">FAQ</a></li>
          <!--<li><a href="#">Tata Cara</a></li>
          <li><a href="#">Bantuan</a></li>
          <li><a href="#">Syarat dan Ketentuan</a></li>-->
          <li><a href="<?php echo base_url; ?>/hal/kebijakan-privasi">Kebijakan Privasi</a></li>
        </ul>
      </div>

      <div class="col-md-2">
        <h3 class="h4">Kategori</h3>
        
       <ul>
          
           <?php foreach ($base_kategori as $kategori): ?>
            <li><a href="<?php echo base_url; ?>/kategori/<?php echo $kategori->slug; ?>"><?php echo $kategori->judul; ?></a></li>
          <?php endforeach ?>

        </ul>

      </div>

      <div class="col-md-2">
        <h5 class="h4">Halo!</h5>
        <ul>
          <li><a href="https://web.facebook.com/groupbuyid/"><i class="fa fa-facebook-square" aria-hidden="true"></i> Facebook</a></li>
          <!--<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a></li>    -->
          <li><a href="https://www.instagram.com/groupbuyid/"><i class="fa fa-instagram" aria-hidden="true"></i> Instagram</a></li>
          <!--<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i> Pinterest</a></li><li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i> YouTube</a></li>    -->
        </ul>
      </div>
    </div>
  </div>

  <div class="container-fluid madewith">
    <div class="container">
      Made with <i class="fa fa-heart" aria-hidden="true"></i> in Yogyakarta, Indonesia
    </div>
  </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url; ?>/assets/js/jquery.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed  -->
    <script src="<?php echo base_url; ?>/assets/js/bootstrap.min.js"></script>

      <link rel="stylesheet" type="text/css" href="<?php echo base_url; ?>/assets/css/datatable.css">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url; ?>/assets/css/zmd.hierarchical-display.min.css">
    <script src="<?php echo base_url; ?>/assets/js/datatable.min.js"></script>
    <script src="<?php echo base_url; ?>/assets/js/timeago.js"></script>
    <script src="<?php echo base_url; ?>/assets/js/jquery.zmd.hierarchical-display.js"></script>
  
  
  
    <script type="text/javascript">
      $(document).ready(function() {
        $("abbr.timeago").timeago();
        $("time.timeago").timeago();

        $("body").removeClass("loading");
      });

      function slugify(text){
        return text.toString().toLowerCase()
          .replace(/\s+/g, '-')           // Replace spaces with -
          .replace(/_/g, '-')              // Replace _ with space
          .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
          .replace(/\-\-+/g, '-')         // Replace multiple - with single -
          .replace(/^-+/, '')             // Trim - from start of text
          .replace(/-+$/, '');            // Trim - from end of text
      }

      $("#nama-item").keyup(function(){
        $("#slug").val(slugify($(this).val()));
      });

      $("#nama-kategori").keyup(function(){
        $("#slug").val(slugify($(this).val()));
      });

      $(document).ready( function () {
          $('.daftar-produk').DataTable();
      } );

      $.fn.digits = function(){ 
          return this.each(function(){ 
              $(this).text( $(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.") ); 
          })
      }

      $('#qty').change(function() {
        var qty = $("#qty").val();
        var total = harga*qty;
          $("#total").html('Total = Rp. '+total);
          $("#total").digits();
      });
    </script>





<!-- ANIMASI AJAX LOADING AKAN TAMPIL SAAT ADA AJAX CALL-->
<div class="ajaxcallanimate" style="background-image: url(<?php echo base_url; ?>/assets/images/gbid-ajax-loading.gif)"></div>




  </body>
</html>