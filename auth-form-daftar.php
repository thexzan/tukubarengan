<?php $hal = 'daftar'; include('layout/header.php'); ?>


<div class="row">

	<div class="col-md-4 col-md-offset-4" data-animation="hierarchical-display">
		<h3 class="text-center">Buat Akun Baru</h3>

		<?php if (isset($_SESSION['daftar'])) { ?>


		 <div class="alert alert-warning"><p><?php echo $_SESSION['daftar']; ?></p></div>

		<?php } ?>

		<hr>
			<div class="panel panel-default">
				<div class="panel-body">

					<form action="auth-do-daftar" method="post">
						<div class="form-group">
							<label for="nama">Nama Lengkap</label>
							<input type="text" class="form-control" id="nama" placeholder="Nama Anda" required autofocus name="nama">
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input type="text" class="form-control" id="email" placeholder="Alamat Email" name="email" required>
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
						</div>

						<hr>

						<button type="submit" class="btn btn-gbid btn-block">Daftar</button>
					</form>

					<hr>
					<p class="text-center">Sudah punya akun? Silakan <a class="label label-primary" href="<?php echo base_url; ?>/login">login disini</a></p>

				</div>
			</div>
		</div>


</div>

<?php include('layout/footer.php'); ?>