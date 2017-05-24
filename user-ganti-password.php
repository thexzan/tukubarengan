<?php include('layout/header.php');


if (isset($_GET['action']) AND $_GET['action'] == 'ganti') {
$lama = $_POST['lama'];
$baru = $_POST['baru'];
$confirm = $_POST['confirm'];



$db->where('id', $_SESSION['id']);
$data_user = $db->ObjectBuilder()->getOne('user');

if (password_verify($lama, $data_user->password)) {
	if ($baru != $confirm) {
		$_SESSION['pesan']      = 'Password Baru tidak sama dengan konfirmasi password';
		$_SESSION['pesan-tipe'] = 'danger';
	}else{
		$password_setting = [
			'cost' => 11,
			'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
		];

		$new_pass = password_hash($baru, PASSWORD_BCRYPT, $password_setting);


		$data = Array (
			"password" => $new_pass,
		);
		$db->where ('id', $_SESSION['id']);
		$db->update ('user', $data);

		$_SESSION['pesan']      = 'Password Sukses diganti';
		$_SESSION['pesan-tipe'] = 'success';
	}
}else{
	$_SESSION['pesan']      = 'Password Lama Tidak Cocok!';
	$_SESSION['pesan-tipe'] = 'warning';
}

}

 ?>

<div class="row">
	
	<form action="<?php echo base_url.'/user-ganti-password.php?action=ganti'; ?>" method="post">


	<div class="col-md-4 col-md-offset-4">
		
		<h1 class="text-center">Ganti Password</h1>

		<hr>

		<?php if (isset($_SESSION['pesan']) AND isset($_SESSION['pesan-tipe'])): ?>
			<div class="alert alert-<?php echo $_SESSION['pesan-tipe']; ?>" role="alert"><?php echo $_SESSION['pesan']; ?></div>
		<?php endif ?>

		<div class="panel panel-default">
		  <div class="panel-body">
		    <div class="form-group">
		       <label>Password Lama</label>
		       <input type="password" class="form-control" name="lama" placeholder="Password Lama">
		     </div>

		     <div class="form-group">
		       <label>Password Baru</label>
		       <input type="password" class="form-control" name="baru" placeholder="Password Baru">
		     </div>

		     <div class="form-group">
		       <label>Konfirmasi Password Lama</label>
		       <input type="password" class="form-control" name="confirm" placeholder="Konfirmasi Password Lama">
		     </div>

			<hr>
		       <button type="submit" class="btn btn-default btn-black btn-block">Ganti Password</button>

		  </div>
		</div>

	</div>

	</form>

</div>


<?php include('layout/footer.php'); ?>