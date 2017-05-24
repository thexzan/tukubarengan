<?php 
$hal = 'admin-member';
include('layout/header.php');
protect_admin();
$no = 1;


if (isset($_GET['action'])) {
	if ($_GET['action'] == 'suspend') {
		$data = Array (
			'suspended' => 1,
		);

		$db->where ('id', $_GET['id']);
		$db->update ('user', $data);
	}elseif ($_GET['action'] == 'unsuspend') {
		$data = Array (
			'suspended' => 0,
		);

		$db->where ('id', $_GET['id']);
		$db->update ('user', $data);
	}
}

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
			<?php if ($user->suspended == 0): ?>
				<a href="<?php echo base_url.'/admin-daftar-member.php?action=suspend&id='.$user->id ?>"><span class="label label-danger">Suspend</span></a>
			<?php else: ?>
				<a href="<?php echo base_url.'/admin-daftar-member.php?action=unsuspend&id='.$user->id ?>"><span class="label label-danger">Unsuspend</span></a>
			<?php endif ?>
		</td>
	</tr>

<?php $no++; endforeach ?>
</table>
</div>

<?php include('layout/footer.php'); ?>