<?php 
$hal = $_GET['slug'];
include('layout/header.php');

if (isset($_GET['slug'])) {
	$db->where('slug', $_GET['slug']);
	$data_halaman = $db->ObjectBuilder()->getOne('halaman');

	if (is_null($data_halaman)) {
		redirect(base_url);
	}
}

?>

<div class="row" data-animation="hierarchical-display">
	<div class="text-center">
		<h1><?php echo $data_halaman->judul; ?></h1>
	</div>
	<hr>
	<p><?php echo $data_halaman->isi; ?></p>
</div>



<?php include('layout/footer.php'); ?>