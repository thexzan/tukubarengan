<?php 
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define("base_url", "http://tukubarengan.dev");

require_once ('MysqliDb.php');
$db = new MysqliDb ('localhost', 'root', 'root', 'pwl');


// BASE QUERY
$base_kategori = $db->ObjectBuilder()->get('kategori');


// FUNGSI

function angka_cantik($angka){
    return number_format($angka, 0 , '' , '.' );
}

function redirect($url){
    echo '<script>window.location.replace("'.$url.'");</script>';
}

function protect_user(){
  if (!isset($_SESSION['level'])){
    redirect(base_url.'/auth/login');
  }
}

function protect_admin(){
  if (!isset($_SESSION['level']) OR $_SESSION['level'] != 'admin') {
    redirect(base_url);
  }
}

function random_id($bytes) {
  $rand = mcrypt_create_iv($bytes, MCRYPT_DEV_URANDOM);
  return bin2hex($rand);
}

function persentase($current,$target){
   return round($current/$target*100);
}

function get_qty_order($id_produk){
  $db = new MysqliDb ('localhost', 'root', 'root', 'pwl');
  $db->where('id_produk', $id_produk);
  $db->get('pesanan');

  return $db->count;
}

?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GroupBuyID - Group Buying and Kickstarter Media</title>

    <link rel="stylesheet" href="<?php echo base_url; ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url; ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url; ?>/assets/css/gbid.css">
    <link rel="stylesheet" href="<?php echo base_url; ?>/assets/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">




  </head>
  <body class="loading">

    <!-- BEGIN NAV BAR -->


<nav class="navbar navbar-default navbar-static-top menu-utama">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="<?php echo base_url; ?>/" class="pull-left"><img src="<?php echo base_url; ?>/assets/images/tukubarengan-short.png" class="logogbid"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown <?php if (isset($hal) and $hal == 'kategori') {echo "active";} ?>">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Kategori <span class="caret"></span></a>
          <ul class="dropdown-menu">

          <?php foreach ($base_kategori as $kategori): ?>
            <li><a href="<?php echo base_url; ?>/kategori/<?php echo $kategori->slug; ?>"><?php echo $kategori->judul; ?></a></li>
          <?php endforeach ?>
            

                    </ul>
        </li>


        <li class="<?php if (isset($hal) and $hal == 'tentang-kami') {echo "active";} ?>"><a href="<?php echo base_url; ?>/hal/tentang-kami">Tentang Kami</a></li>
        <li class="<?php if (isset($hal) and $hal == 'faq') {echo "active";} ?>"><a href="<?php echo base_url; ?>/hal/faq">FAQ</a></li>

      </ul>

      <ul class="nav navbar-nav navbar-right">

      <?php if (isset($_SESSION["nama"])): ?>
        

        <p class="navbar-text">Hello <?php echo strstr($_SESSION["nama"], ' ', true); ?>!</p>
      
    <?php if (isset($_SESSION['level']) AND $_SESSION['level'] == 'admin'): ?>
       <li class="dropdown <?php if (isset($hal) and $hal == 'admin-produk') {echo "active";} ?>">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Produk<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo base_url; ?>/admin/gb-baru">Tambah Baru</a></li>
            <li><a href="<?php echo base_url; ?>/admin/daftar-produk">Daftar Produk</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?php echo base_url; ?>/admin/kategori">Kategori</a></li>
          </ul>
          </li>

          <li class="dropdown <?php if (isset($hal) and $hal == 'admin-order') {echo "active";} ?>">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Order<span class="caret"></span></a>
          <ul class="dropdown-menu">
             <li ><a href="<?php echo base_url; ?>/admin/daftar-order">Daftar Order</a></li>
             <li role="separator" class="divider"></li>
              <li ><a href="<?php echo base_url; ?>/admin/daftar-konfirmasi">Konfirmasi Pembayaran</a></li>
          </ul>
          </li>
             

            <li class="<?php if (isset($hal) and $hal == 'admin-member') {echo "active";} ?>"><a href="<?php echo base_url; ?>/admin/daftar-member">Member</a></li>
        
    <?php endif ?>

      <li class="dropdown <?php if (isset($hal) and $hal == 'user-akun') {echo "active";} ?>">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Account<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo base_url; ?>/user/daftar-pesanan">Pesanan</a></li>
            <li><a href="<?php echo base_url; ?>/user/ganti-password">Change Password</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?php echo base_url; ?>/auth/logout">Logout</a></li>
          </ul>
          </li>
      <?php else: ?>

      <li class="<?php if (isset($hal) and $hal == 'daftar') {echo "active";} ?>"><a href="<?php echo base_url; ?>/auth/daftar">Daftar</a></li>
      <li class="<?php if (isset($hal) and $hal == 'login') {echo "active";} ?>"><a href="<?php echo base_url; ?>/auth/login">Login</a></li>

      <?php endif ?>

      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<!-- END NAV BAR -->
<!-- BEGIN CONTENT -->
<div class="container ">