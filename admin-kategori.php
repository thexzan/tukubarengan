<?php 
$hal = 'admin-produk';
include('layout/header.php');
$no = 1;

$daftar_kategori = $db->ObjectBuilder()->get('kategori');
$jumlah_kategori = $db->count;
?>



<div class="col-md-8 col-md-offset-2" data-animation="hierarchical-display">

<h1>Daftar Kategori - <?php echo $jumlah_kategori; ?></h1>
<hr>
	<table class="table table-striped table-hover daftar-produk" >
	
<thead>
	<th>No</th>
	<th>Slug</th>
	<th>Kategori</th>
	<th>Action</th>
</thead>

<?php foreach ($daftar_kategori as $kategori): ?>
	<tr >
		<td><?php echo $no; ?></td>
		<td><?php echo $kategori->slug; ?></td>
		<td><?php echo $kategori->judul; ?></td>
		<td class="text-right">
			
			<a href="<?php echo base_url.'admin/edit-gb/'.$kategori->id; ?>"><span class="label label-biru">EDIT</span></a> | 
			<a href="#" onclick="show_warning_dialog('<?php echo $kategori->id;?>');"><span class="label label-danger">HAPUS</span></a>
		</td>
	</tr>


<?php $no++; endforeach ?>
</table>
</div>

<?php include('layout/footer.php'); ?>