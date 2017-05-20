<?php 

include('layout/header.php'); 
$data_produk = $db->ObjectBuilder()->get('produk');
?>

<!-- ROW GRID GROUPBUY -->
<div class="row">
    
    <!-- BEGIN PRODUCT GRID -->
    <div id="products" class="row list-group" data-animation="hierarchical-display">



<?php foreach ($data_produk as $produk): ?>

    <!-- BEGIN PRODUCT GRID ITEM -->
<div class="item col-md-4 col-sm-6"asdasd>
    <div class="thumbnail thumbnail-grid"> <!-- BEGIN THUMBNAIL -->
        <img class="group list-group-image" src="<?php echo base_url; ?>/uploads/groupbuy/1976-npkc-keycap-set/npkc-thumb.jpg" alt="" width="400px" height="250px" />

        <!-- GB ITEM DETAIL -->
        <div class="caption">
            <h2 class="h4 group inner list-group-item-heading">
               <a href="<?php echo base_url; ?>/gb/1976-npkc-keycap-set" class="judul-item-grid"><?php echo $produk->judul; ?></a>
            </h4>


            <!-- PROGRESS -->
            <div class="progress">
              <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100%" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                 100%
              </div>
            </div>
            <!-- END PROGRESS -->

            <div class="row"> 
                <!-- PRICE -->
                <div class="col-xs-12 col-md-6">
                    <p class="harga">
                    Rp. <?php echo angka_cantik($produk->harga); ?></p>
                </div>
                <!-- END PRICE -->
                <!-- BUTTON -->
                <div class="col-xs-12 col-md-6">
                  <div class="btn-group pull-right">
                    <a href="<?php echo base_url; ?>/gb/1976-npkc-keycap-set" class="btn btn-default">Detail</a>
                                        <a href="<?php echo base_url; ?>/join-groupbuy/1976-npkc-keycap-set" class="btn btn-hijau"><i class="fa fa-cart-plus" aria-hidden="true"></i> Join</a>
                                      </div>
                </div>
                <!-- END BUTTON -->
            </div><!-- END ROW-->


        </div><!-- END GB ITEM DETAIL -->
    </div><!-- END THUMB-->
</div><!-- END PRODUCT GRID ITEM-->
    
<?php endforeach ?>

      

       

        
<?php include('layout/footer.php'); ?>


 