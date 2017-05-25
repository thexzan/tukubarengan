<?php include('layout/header.php'); 

protect_user();

$ref_number = '#'.strtoupper(random_id(5));
$id_produk  = $_POST['id_produk'];
$id_user    = $_SESSION['id'];
$qty        = $_POST['qty'];
$alamat     = strip_tags($_POST['alamat')];
$total      = $_POST['total'];

$data_order_baru = Array(
	"ref_number" => $ref_number,
	"id_user"    => $id_user,
	"id_produk"  => $id_produk,
	"qty"        => $qty,
	"total"      => $total
);

$insert = $db->insert('pesanan', $data_order_baru);


$data = Array (
	'alamat' => $alamat,
);

$db->where('id', $id_user);
$db->update('user', $data);

$db->where('id', $id_produk);
$produk = $db->ObjectBuilder()->getOne('produk');

$db->where('ref_number', $ref_number);
$order = $db->ObjectBuilder()->getOne('pesanan');


?>

<div class="row">
	
<div class="col-md-6 col-md-offset-3" data-animation="hierarchical-display">

<div class="text-center">
	<h1 class="h2">Join GroupBuy Sukses !</h1>
Silakan melakukan pembayaran dengan detail : 
</div>

<hr>
	<div class="panel panel-default">
  <div class="panel-heading">Detail &amp; Jumlah Transfer</div>
  <div class="panel-body">

		<div class="row">
			<div class="col-md-6">
				<strong>Kode Pesanan</strong>
				<br>
				<strong>Produk</strong>
				<br>
				<br>
				<strong>Jumlah Barang</strong>
				<br>
				<strong>Harga</strong>
				<br>
				<strong>Total Jumlah Transfer</strong>
				<br>
			</div>
			<div class="col-md-6 text-right">
				<?php echo $order->ref_number; ?>				<br>
				<?php echo $produk->judul; ?>				<br>
				<br>
				<?php echo $qty; ?>				<br>
				Rp. <?php echo angka_cantik($produk->harga); ?>				<br>
				Rp. <?php echo angka_cantik($order->total); ?>		</div>
		</div>		
  </div>
</div>

<hr>
<h2 class="text-center">Ke Rekening</h2>
<hr>
	<div class="panel panel-default">
  <div class="panel-heading">No mor Rekening Tujuan</div>
  <div class="panel-body">
    <div class="row">
    	<div class="col-md-6">
    		<h4>BCA</h4>
    		<strong>8465 1658 12</strong>
    		<br>
    		IKHSAN HADI NUGROHO
    	</div>
    	<div class="col-md-6">
    		<h4>MANDIRI</h4>
    		<strong>9000 0223 23112</strong>
    		<br>
    		IKHSAN HADI NUGROHO
    	</div>
    	<div class="col-md-6">
    		<h4>BRI</h4>
    		<strong>3077-01-023300-23-2</strong>
    		<br>
    		IKHSAN HADI NUGROHO
    	</div>
    	<div class="col-md-6">
    		<h4>BNI</h4>
    		<strong>0437 0387 32</strong>
    		<br>
    		IKHSAN HADI NUGROHO
    	</div>
    </div>
  </div>
</div>

<hr>

<h4 class="text-center">jika sudah silakan <a href="<?php echo base_url; ?>/user/daftar-pesanan">konfirmasi pembayaran Anda disini</a></h4>
</div>

</div>

<?php include('layout/footer.php'); ?>