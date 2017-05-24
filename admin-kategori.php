<?php 
$hal = 'admin-produk';
include('layout/header.php');
$no = 1;

if (isset($_GET['action'])) {
	if ($_GET['action'] == 'new') {
		$data = Array ("slug" => $_POST['slug'],
		               "judul" => $_POST['judul']
		);
		$id = $db->insert ('kategori', $data);
	}elseif ($_GET['action'] == 'hapus') {
		$db->where('id', $_GET['id']);
		$db->delete('kategori');
	}
}

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
		<td class="text-center">
			<a href="<?php echo base_url.'/admin-kategori.php?action=hapus&id='.$kategori->id; ?>"><span class="label label-danger">HAPUS</span></a>
		</td>
	</tr>


<?php $no++; endforeach ?>
</table>



<div class="col-md-4 col-md-offset-4">
	<form class='new-kategori' action="<?php echo base_url.'/admin-kategori.php?action=new'; ?>" method="post">

<h3>Add new kategori</h3>
<hr>
	<div class="form-group">
    <label >Nama Kategori</label>
    <input type="text" class="form-control" id="nama-kategori" placeholder="Nama Kategori" name="judul">
  </div>

  <div class="form-group">
    <label>Nama Kategori</label>
    <input type="text" class="form-control" id="slug" name="slug" readonly>
  </div>

  <button type="submit" class="btn btn-default btn-block">Tambah Kategori</button>
<hr>


</form>
</div>
</div>

<?php include('layout/footer.php'); ?>