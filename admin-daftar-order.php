<?php 
$hal = 'admin-order';
include('layout/header.php');
$no = 1;

$db->join("user u", "u.id=o.id_user", "LEFT");
$db->join("produk p", "p.id=o.id_produk", "LEFT");
$daftar_pesanan = $db->ObjectBuilder()->get('pesanan o', null,
	'
	o.id,
	o.ref_number,
	o.qty,
	o.total,
	p.judul,
	p.slug,
	u.nama
	');
$jumlah_pesanan = $db->count;
?>



<div class="col-md-10 col-md-offset-1" data-animation="hierarchical-display">

<h1>Daftar Pesanan - <?php echo $jumlah_pesanan; ?></h1>
<hr>
	<table class="table table-striped table-hover daftar-produk" >
	
<thead>
	<th class="text-center">No</th>
	<th class="text-center">Ref Number</th>
	<th class="text-center">User</th>
	<th class="text-center">Produk</th>
	<th class="text-center">Jumlah</th>
	<th class="text-center">Total</th>
</thead>

<?php foreach ($daftar_pesanan as $order): ?>
	<tr >
		<td class="text-center"><?php echo $no; ?></td>
		<td><?php echo $order->ref_number; ?></td>
		<td><?php echo strstr($order->nama, ' ', true); ?></td>
		<td><a target="_blank" href="<?php echo base_url.'/gb/'.$order->slug; ?>"><?php echo strstr($order->judul, ' ', true); ?></a></td>
		<td class="text-center"><?php echo $order->qty; ?></td>
		<td>Rp. <?php echo angka_cantik($order->total); ?></td>
	</tr>


<?php $no++; endforeach ?>
</table>
</div>

<?php include('layout/footer.php'); ?>