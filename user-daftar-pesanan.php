<?php 
$hal = 'user-akun';
include('layout/header.php');

protect_user();

$no = 1;

$db->join("produk p", "p.id=o.id_produk", "LEFT");
$db->where('id_user', $_SESSION['id']);
$daftar_pesanan = $db->ObjectBuilder()->get(
	'pesanan o',
	NULL,
	'o.id,o.ref_number,o.qty, o.total, o.tanggal, p.judul'
	);
$jumlah_pesanan = $db->count;

?>


<div class="col-md-8 col-md-offset-2" data-animation="hierarchical-display">

<h1>Daftar Pesanan - <?php echo $jumlah_pesanan; ?></h1>
<hr>
	<table class="table table-striped table-hover daftar-produk">
	
<thead>
	<th>No</th>
	<th>Referensi</th>
	<th>Produk</th>
	<th>Jumlah</th>
	<th>Total</th>
	<th>Total</th>
</thead>

<?php foreach ($daftar_pesanan as $pesanan): ?>
	<tr>
		<td><?php echo $no; ?></td>
		<td><?php echo $pesanan->ref_number; ?></td>
		<td><?php echo $pesanan->judul; ?></td>
		<td><?php echo $pesanan->qty; ?></td>
		<td><?php echo 'Rp. '.angka_cantik($pesanan->total); ?></td>
		<td><time class="timeago" datetime="<?php echo $pesanan->tanggal; ?>"></time></td>
	</tr>


<?php $no++; endforeach ?>
</table>
</div>

<?php include('layout/footer.php'); ?>