<?php 

require_once ('MysqliDb.php');
$db = new MysqliDb ('localhost', 'root', 'root', 'pwl');

// BASE QUERY
$data_kategori = $db->ObjectBuilder()->get('kategori');

?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GroupBuyID - Group Buying and Kickstarter Media</title>

    <link rel="stylesheet" href="http://gbid.dev/assets/css/gbid-main.css">


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
      <a href="http://gbid.dev/" class="pull-left"><img src="http://gbid.dev/assets/images/logogbid.png" class="logogbid"></a><p class="navbar-text"><span class="label label-gbid-alt">BETA</span></p>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown ">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Kategori <span class="caret"></span></a>
          <ul class="dropdown-menu">

          <?php foreach ($data_kategori as $kategori): ?>
            <li><a href="http://gbid.dev/kategori/<?php echo $kategori->slug; ?>"><?php echo $kategori->judul; ?></a></li>
          <?php endforeach ?>
            

                    </ul>
        </li>

        <li class="dropdown ">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Jasa Order <span class="caret"></span></a>
          <ul class="dropdown-menu">

            <li><a href="http://gbid.dev/hal/jasa-order/china">China</a></li>
            <li><a>Japan</a></li>

          </ul>
        </li>

        <li ><a href="http://gbid.dev/hal/tentang-kami">Tentang Kami</a></li>
        <li ><a href="http://gbid.dev/hal/faq">FAQ</a></li>

      </ul>

      <ul class="nav navbar-nav navbar-right">
                <p class="navbar-text">Hello Ikhsan!</p>
          <li class="dropdown ">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Account<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="http://gbid.dev/user/daftar-pesanan">Pesanan</a></li>
            <li><a href="http://gbid.dev/user/ganti-password">Change Password</a></li>

                          <li><a href="http://gbid.dev/dashboard">Admin Page</a></li>
                        <li role="separator" class="divider"></li>
            <li><a href="http://gbid.dev/logout">Logout</a></li>
          </ul>
          </li>
              </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<!-- END NAV BAR -->
<!-- BEGIN CONTENT -->
<div class="container ">