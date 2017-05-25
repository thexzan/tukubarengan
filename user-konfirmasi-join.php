<?php include('layout/header.php');

protect_user();

$id         = $_POST['id_produk'];
$qty        = strip_tags($_POST['qty']);
$alamat     = strip_tags($_POST['alamat']);

$db->where('id', $id);
$produk = $db->ObjectBuilder()->getOne('produk');

$total      = $qty*$produk->harga;

?>

<div class="row" >
<div class="col-md-6 col-md-offset-3" data-animation="hierarchical-display">

<div class="text-center">
	<h1>Konfirmasi Order</h1>
	<hr>
</div>
<div class="panel panel-default">
<div class="panel-body">

		<table class="table">
			<tr>
				<td>Produk</td>
				<td><?php echo $produk->judul; ?></td>
			</tr>
			<tr>
				<td>Harga</td>
				<td>Rp.<?php echo angka_cantik($produk->harga); ?></td>
			</tr>
			<tr>
				<td>Jumlah</td>
				<td><?php echo $qty; ?></td>
			</tr>
			<tr>
				<td>Alamat Pengiriman</td>
				<td><?php echo $alamat; ?></td>
			</tr>
			<tr>
				<td><h3>Total Pembayaran</h3></td>
				<td><h3>Rp.<?php echo angka_cantik($total); ?></h3></td>
			</tr>
			
		</table>

		<form action="<?php echo base_url.'/user/purchased'; ?>" method="post">
			<input type="hidden" value="<?php echo $_SESSION['id']; ?>" name="id_user">
			<input type="hidden" value="<?php echo $produk->id; ?>" name="id_produk">
			<input type="hidden" value="<?php echo $total; ?>" name="total">
			<input type="hidden" value="<?php echo $qty; ?>" name="qty">
			<input type="hidden" value="<?php echo $alamat; ?>" name="alamat">
		<button type="submit" class="btn btn-primary btn-block btn-black">Kirim Pesanan</button>
		</form>

	</form>


</div>
</div>
</div>
</div>



<?php include('layout/footer.php'); ?>