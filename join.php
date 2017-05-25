<?php include('layout/header.php');

protect_user();

if (!isset($_GET['produk'])) {
	redirect(base_url);
}

$slug = $_GET['produk'];

$db->where('slug', $slug);
$produk = $db->ObjectBuilder()->getOne('produk');

?>

<script>
	var harga = <?php echo $produk->harga; ?>;
</script>

<div class="row" data-animation="hierarchical-display">
<div class="col-md-6 col-md-offset-3">

<div class="text-center">
	<h1>Join Produk</h1>
	<hr>
</div>
<div class="panel panel-default">
<div class="panel-body">

		<div class="text-center">
			<h2><?php echo $produk->judul; ?></h2>
			<h4>Rp. <?php echo angka_cantik($produk->harga); ?> <br><br><span id="total"></span></h4>
		</div>

		<hr>

		<form action="<?php echo base_url.'/user/konfirmasi-join'; ?>" method="post">
		
		<div class="form-group">
		    <label>Jumlah Pesanan</label>
		    <select class="form-control" name="qty" id="qty">
		      <?php 
		      	for ($x=1; $x <= 10; $x++) { 
		      		echo '<option value="'.$x.'">'.$x.'</option>';
		      	}
		       ?>
		    </select>
		  </div>
		  <div class="form-group">
		      <label>Alamat Pengiriman</label>
		      <textarea class="form-control" rows="3" name="alamat"></textarea>
		    </div>

		    <input type="hidden" name="id_produk" value="<?php echo $produk->id; ?>">

		    <button type="submit" class="btn btn-primary btn-block btn-black">Konfirmasi Pesanan</button>

	</form>


</div>
</div>
</div>
</div>



<?php include('layout/footer.php'); ?>