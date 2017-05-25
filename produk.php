<?php include('layout/header.php'); 

   if (isset($_GET['produk'])) {
     $db->where("slug", $_GET['produk']);
     $produk = $db->ObjectBuilder()->getOne('produk');


     $db->where('id', $produk->id_kategori);
     $kategori = $db->ObjectBuilder()->getOne('kategori');

     // kalau ga ada yang cucok , redirek ke HOME
     if (!$produk) {
         redirect(base_url);
     }
   }

$db->orderBy('k.id', 'desc');
$db->join("user u", "u.id=k.id_user", "LEFT");
$db->where('id_produk', $produk->id);
$data_komentar = $db->ObjectBuilder()->get(
  'komentar k',null,"
  k.tanggal,
  k.isi,
  u.nama

  ");
$jumlah_komentar = $db->count;



?>

<div data-animation="hierarchical-display">


   <!-- BREADCRUMB -->
   <div class="container">
      <ol class="breadcrumb">
         <li>
            <a href="<?php echo base_url; ?>/">TukuBarengan</a>
         </li>
         <li>
            <a href="<?php echo base_url; ?>/kategori/<?php echo $kategori->slug; ?>"><?php echo $kategori->judul; ?></a>
         </li>
         <li class="active"><?php echo $produk->judul; ?></li>
      </ol>
   </div>
   <!-- BEGIN SIDEBAR -->
   <div class="item-detail-sidebar col-md-4 col-md-push-8">
      <div class="thumbnail thumb-item-page">
         <!-- BEGIN THUMBNAIL -->
         <!-- GB ITEM DETAIL -->
         <div class="caption"> 
                  <h2>Rp. <?php echo angka_cantik($produk->harga); ?><hr></h2>

                  
                  
                     <h4 class="group inner list-group-item-heading">
                         <?php echo $produk->judul; ?>                  
                         <div class="text-center">
                            <?php if ($produk->status == 'open'): ?>
                             <span class="label label-success"><?php echo strtoupper($produk->status); ?></span>
                          <?php else: ?>
                           <span class="label label-warning"><?php echo strtoupper($produk->status); ?></span>
                          <?php endif ?>
                         </div>
                                     </h4>
         <hr>
                   

                     <!-- PROGRESS -->
                     <div class="progress">
                       <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100%" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                          100%
                       </div>
                     </div>
                     <!-- END PROGRESS -->
                     
                     <?php if ($produk->status == 'open'): ?>
                        <div class="row"> 
                            <!-- BUTTON -->

                  <?php if (isset($_SESSION['level']) AND $_SESSION['level'] == 'admin'): ?>
                    <div class=" col-md-6">
                    <a href="<?php echo base_url.'/edit-gb/'.$produk->slug; ?>" class="btn btn-gbid btn-block"> EDIT</a>
                    </div>
                    <div class=" col-md-6">
                  <?php else: ?>
                    <div class=" col-md-12">
                  <?php endif ?>
                  

                  <a href="<?php echo base_url.'/join/'.$produk->slug; ?>" class="btn btn-hijau btn-block"><i class="fa fa-cart-plus" aria-hidden="true"></i> Join</a>
                  </div>
                                                              <!-- END BUTTON -->
                        </div>
                     <?php endif ?>
                     <!-- END ROW-->


                 </div>
         <!-- END GB ITEM DETAIL -->
      </div>
      <!-- END THUMB-->
      
      </div>
   </div>
   <!-- END SIDEBAR-->
   <!-- BEGIN DETAIL ITEM -->
   <div class="item col-md-8 col-md-pull-4 ">
      <div class="thumbnail thumb-item-page">
         <!-- BEGIN THUMBNAIL -->
         <img class="group list-group-image" src="<?php echo base_url; ?>/images/<?php echo $produk->cover; ?>" alt="" width="100%">
      </div>
      <!-- END THUMB-->
      <!-- BEGIN TAB HEADER -->
      <ul class="nav nav-tabs nav-justified">
         <li role="presentation" class="active">
            <a href="#home" aria-controls="home" role="tab" data-toggle="tab">Detail</a>
         </li>
         <li role="presentation" class="">
            <a href="#diskusi" aria-controls="diskusi" role="tab" data-toggle="tab">Komentar <span class="badge"><?php echo $jumlah_komentar; ?></span></a>
         </li>
      </ul>
      <!-- END TAB HEADER -->
      <!-- BEGIN TAB CONTENT -->
      <div class="tab-content">
         <!-- BEGIN TAB 1 - ITEM DESCRIPTION -->
         <div role="tabpanel" class="tab-pane active" id="home">
            <div class="isitab">
              <?php echo $produk->desc; ?>
            </div>
         </div>
         <!-- END TAB 1 - ITEM DESCRIPTION -->
         <!-- BEGIN TAB 2 - ITEM DISCUSSION -->
         <div role="tabpanel" class="tab-pane" id="diskusi">
            <!-- TAMBAH MARGIN -->
            <div class="isitab">
               <!-- FORM DISKUSI -->
              <?php if (isset($_SESSION['level'])): ?>
                <form action="<?php echo base_url; ?>/user/add-komentar" method="post">
                   <div class="form-group">
                      <label for="isidiskusi">Buat Komentar Baru</label>
                      <textarea class="form-control" name="isi" rows="5"></textarea>
                   </div>
                   <input type="hidden" value="<?php echo $produk->id; ?>" name="id_produk">
                   <button type="submit" class="btn btn-gbid btn-block">Kirim Komentar</button>
                </form>
                <hr>
              <?php endif ?>
               <!-- DIVIDER FORM DENGAN DISKUSI TERKIRIM -->
               <!-- DAFTAR DISKUSI -->

               <?php foreach ($data_komentar as $komentar): ?>
                 <div class="panel panel-primary panel-hover">
                   <div class="panel-body ">
                      <?php echo $komentar->isi; ?>         
                   </div>
                   <div class="panel-footer clearfix">
                      <div class="col-md-6 col-xs-6"><?php echo $komentar->nama; ?></div>
                      <div class="col-md-6 col-xs-6 tanggal-komentar"><time class="timeago" datetime="<?php echo $komentar->tanggal; ?>"></time></div>
                   </div>
                </div>
               <?php endforeach ?>
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
   <?php include('layout/footer.php');  ?>