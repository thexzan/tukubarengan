<?php 
$hal = 'admin-produk';
include('layout/header.php');
protect_admin();

$no = 1;

if (isset($_GET['action'])) {
	if ($_GET['action'] == 'hapus') {
		$db->where('id', $_GET['id']);
        $data_foto = $db->ObjectBuilder()->getOne('foto');
        unlink('images/'.$data_foto->foto);

        $db->where('id', $_GET['id']);
        $db->delete('foto');
	}
}

$db->join("kategori k", "p.id_kategori=k.id", "LEFT");
$daftar_produk = $db->ObjectBuilder()->get('produk p', NULL, 'p.id, p.judul, k.judul as kategori, p.status');
$jumlah_produk = $db->count;

?>



<div class="col-md-8 col-md-offset-2" data-animation="hierarchical-display">

<h1>Daftar Produk - <?php echo $jumlah_produk; ?></h1>
<hr>
	<table class="table table-striped table-hover daftar-produk">
	
<thead>
	<th>No</th>
	<th>Judul</th>
	<th>Kategori</th>
	<th>Status</th>
	<th>Action</th>
</thead>

<?php foreach ($daftar_produk as $produk): ?>
	<tr>
		<td><?php echo $no; ?></td>
		<td><?php echo $produk->judul; ?></td>
		<td><?php echo $produk->kategori; ?></td>
		<td><?php echo $produk->status; ?></td>
		<td class="text-right">
			
			<a href="<?php echo base_url.'admin/edit-gb/'.$produk->id; ?>"><span class="label label-biru">EDIT</span></a> | 
			<a href="<?php echo base_url.'/admin-daftar-produk.php?action=hapus&id='.$produk->id; ?>"><span class="label label-danger">HAPUS</span></a>
		</td>
	</tr>


<?php $no++; endforeach ?>
</table>
</div>

<?php include('layout/footer.php'); ?>