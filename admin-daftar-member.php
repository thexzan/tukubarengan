<?php 
$hal = 'admin-member';
include('layout/header.php');
$no = 1;

$daftar_member = $db->ObjectBuilder()->get('user');
$jml_member    = $db->count;
?>

<div class="col-md-8 col-md-offset-2" data-animation="hierarchical-display">

<h1>Daftar Member - <?php echo $jml_member; ?></h1>
<hr>
	<table class="table table-striped table-hover daftar-produk" >
	
<thead>
	<th>No</th>
	<th>Nama</th>
	<th>Email</th>
	<th>Action</th>
</thead>

<?php foreach ($daftar_member as $user): ?>
	<tr >
		<td><?php echo $no; ?></td>
		<td><?php echo $user->nama; ?></td>
		<td><?php echo $user->email; ?></td>
		<td class="text-right">
			<a href="<?php echo base_url.'/admin/daftar-member' ?>"><span class="label label-danger">Suspend</span></a>
		</td>
	</tr>

<?php $no++; endforeach ?>
</table>
</div>

<?php include('layout/footer.php'); ?>