<?php 
if (isset($_GET['kategori'])) {
    $hal = 'kategori';
}
include('layout/header.php'); ?>

<!-- ROW GRID GROUPBUY -->
<div class="row">
    
    <!-- BEGIN PRODUCT GRID -->
    <div id="products" class="row list-group" data-animation="hierarchical-display">


<?php if (isset($_GET['kategori'])){

    $db->where("slug", $_GET['kategori']);
    $data_kategori = $db->ObjectBuilder()->getOne('kategori');

    $db->where("id_kategori", $data_kategori->id);    

} 

$data_produk = $db->ObjectBuilder()->get('produk');

if ($db->count == 0) {
   echo '<center><img src="'.base_url.'/assets/images/404.jpg" alt=""></center>';
}


foreach ($data_produk as $produk): ?>

    <!-- BEGIN PRODUCT GRID ITEM -->
<div class="item col-md-4 col-sm-6">
    <div class="thumbnail thumbnail-grid"> <!-- BEGIN THUMBNAIL -->
        <img class="group list-group-image" src="<?php echo base_url; ?>/images/<?php echo $produk->cover; ?>" alt="" width="400px" height="250px" />

        <!-- GB ITEM DETAIL -->
        <div class="caption">
            <h2 class="h4 group inner list-group-item-heading">
               <a href="<?php echo base_url; ?>/gb/<?php echo $produk->slug; ?>" class="judul-item-grid"><?php echo $produk->judul; ?></a>
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
                  <a href="<?php echo base_url; ?>/gb/<?php echo $produk->slug; ?>" class="btn btn-default">Detail</a>
                    <?php if ($produk->status == 'open'): ?>
                        
                    <a href="<?php echo base_url; ?>/join-groupbuy/1976-npkc-keycap-set" class="btn btn-hijau"><i class="fa fa-cart-plus" aria-hidden="true"></i> Join</a>
                <?php else: ?>

                    <a href="<?php echo base_url; ?>/join-groupbuy/1976-npkc-keycap-set" class="btn btn-warning disabled">CLOSED</a>
                    <?php endif ?>
                  </div>
                </div>
                <!-- END BUTTON -->
            </div><!-- END ROW-->


        </div><!-- END GB ITEM DETAIL -->
    </div><!-- END THUMB-->
</div><!-- END PRODUCT GRID ITEM-->
    
<?php endforeach ?>



       

        
<?php include('layout/footer.php'); ?>


 