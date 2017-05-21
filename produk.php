<?php include('layout/header.php'); 
   if (isset($_GET['produk'])) {
     $db->where("slug", $_GET['produk']);
     $produk = $db->ObjectBuilder()->getOne('produk');
   }
   
   ?>
<div class="row clearfix zmd-hierarchical-display in" data-animation="hierarchical-display">
   <!-- BREADCRUMB -->
   <div class="container zoomIn animated" style="-webkit-animation: 0.25s; animation: 0.25s;">
      <ol class="breadcrumb">
         <li>
            <a href="<?php echo base_url; ?>/">TukuBarengan</a>
         </li>
         <li>
            <a href="<?php echo base_url; ?>/kategori/keyboard">Keyboard</a>
         </li>
         <li class="active"><?php echo $produk->judul; ?></li>
      </ol>
   </div>
   <!-- BEGIN SIDEBAR -->
   <div class="item-detail-sidebar col-md-4 col-md-push-8 zoomIn animated" style="-webkit-animation: 0.7s; animation: 0.7s;">
      <div class="thumbnail thumb-item-page">
         <!-- BEGIN THUMBNAIL -->
         <!-- GB ITEM DETAIL -->
         <div class="caption">
            <h2>
               Rp. <?php echo angka_cantik($produk->harga); ?>
               <hr>
            </h2>
            <h4 class="group inner list-group-item-heading">
               <?php echo $produk->judul; ?>
               <span class="label label-warning">
               <?php echo $produk->status; ?>
               </span>
            </h4>
            <br>
            <!-- PROGRESS -->
            <div class="progress">
               <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100%" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                  100%
               </div>
            </div>
            <!-- END PROGRESS -->
            <div class="row">
               <!-- BUTTON -->
               <div class=" col-md-12">
               </div>
               <!-- END BUTTON -->
            </div>
            <!-- END ROW-->
         </div>
         <!-- END GB ITEM DETAIL -->
      </div>
      <!-- END THUMB-->
      <div class="panel panel-default">
         <div class="panel-heading">
            <h3 class="panel-title">GroupBuy Starter</h3>
         </div>
         <div class="panel-body">
            <ul class="media-list">
               <li class="media">
                  <div class="media-left hidden-xs">
                     <a href="#">
                     <img class="media-object" src="<?php echo base_url; ?>/assets/images/groupbuyid-logo-square-125.jpg" alt="GroupBuyID">
                     </a>
                  </div>
                  <div class="media-body">
                     <h4 class="media-heading">GroupBuyID</h4>
                     <!-- <h4 class="media-heading">Your Ear Partner</h4> -->
                  </div>
               </li>
            </ul>
         </div>
      </div>
   </div>
   <!-- END SIDEBAR-->
   <!-- BEGIN DETAIL ITEM -->
   <div class="item col-md-8 col-md-pull-4 zoomIn animated" style="-webkit-animation: 0.28s; animation: 0.28s;">
      <div class="thumbnail thumb-item-page">
         <!-- BEGIN THUMBNAIL -->
         <img class="group list-group-image" src="<?php echo base_url; ?>/images/<?php echo $produk->cover; ?>" alt="">
      </div>
      <!-- END THUMB-->
      <!-- BEGIN TAB HEADER -->
      <ul class="nav nav-tabs nav-justified">
         <li role="presentation" class="active">
            <a href="#home" aria-controls="home" role="tab" data-toggle="tab">Detail</a>
         </li>
         <li role="presentation" class="">
            <a href="#diskusi" aria-controls="diskusi" role="tab" data-toggle="tab">Diskusi <span class="badge">2</span></a>
         </li>
      </ul>
      <!-- END TAB HEADER -->
      <!-- BEGIN TAB CONTENT -->
      <div class="tab-content">
         <!-- BEGIN TAB 1 - ITEM DESCRIPTION -->
         <div role="tabpanel" class="tab-pane active" id="home">
            <div class="isitab">
              ISI TAB
            </div>
         </div>
         <!-- END TAB 1 - ITEM DESCRIPTION -->
         <!-- BEGIN TAB 2 - ITEM DISCUSSION -->
         <div role="tabpanel" class="tab-pane" id="diskusi">
            <!-- TAMBAH MARGIN -->
            <div class="isitab">
               <!-- FORM DISKUSI -->
               <form action="<?php echo base_url; ?>/kirim-komentar/obins-pbtabs-keycaps" method="post">
                  <div class="form-group">
                     <label for="isidiskusi">Buat Diskusi Baru</label>
                     <textarea class="form-control" name="isi_komentar" rows="5"></textarea>
                  </div>
                  <button type="submit" class="btn btn-gbid btn-block">Kirim Diskusi</button>
               </form>
               <hr>
               <!-- DIVIDER FORM DENGAN DISKUSI TERKIRIM -->
               <!-- DAFTAR DISKUSI -->
               <div class="panel panel-default panel-hover">
                  <div class="panel-body komen-by-admin">
                     sama, tidak sesuai target ya refund          
                  </div>
                  <div class="panel-footer clearfix">
                     <div class="col-md-6 col-xs-6">Your Ear Partner</div>
                     <div class="col-md-6 col-xs-6 tanggal-komentar"><time class="timeago" datetime="2017-05-02 11:27:50">7 bulan lalu</time></div>
                  </div>
               </div>
               <div class="panel panel-default panel-hover">
                  <div class="panel-body ">
                     PBT dan abs harganya sama...??? terus kalo GB batal nasib dp gimana..???          
                  </div>
                  <div class="panel-footer clearfix">
                     <div class="col-md-6 col-xs-6">Karras Bastomi</div>
                     <div class="col-md-6 col-xs-6 tanggal-komentar"><time class="timeago" datetime="2017-05-02 11:10:45">7 bulan lalu</time></div>
                  </div>
               </div>
               <!-- END DAFTAR DISKUSI -->
               <hr>
               <!-- BEGIN PAGINATION DISKUSI -->
               <nav class="text-center">
               </nav>
               <!-- END PAGINATION DISKUSI -->
            </div>
            <!-- END ISI TAB -->
         </div>
         <!-- END TAB PANEL -->
      </div>
      <!-- END TAB CONTENT -->
   </div>
   <!-- END COL MD 8 / DETAIL ITEM-->
   <?php 
      include('layout/footer.php'); 
      
      ?>
</div>