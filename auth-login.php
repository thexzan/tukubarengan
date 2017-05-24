
<?php $hal = 'login';include('layout/header.php'); ?>



<div class="row">

	<div class="col-md-4 col-md-offset-4" data-animation="hierarchical-display">
		<h3 class="text-center"> Silakan Login</h3>

	 			<div class="panel panel-default ">
				<div class="panel-body">
			
					<form action="<?php echo base_url; ?>/auth/cek-login" method="POST">
						<div class="form-group">
							<label for="email">Alamat Email</label>
							<input type="text" name="email" class="form-control" id="email" placeholder="Email" autofocus="" required="">
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" name="password" class="form-control" id="password" placeholder="Password" required="">
						</div>


						<button type="submit" class="btn btn-gbid btn-block">Login</button>
					</form>

					<hr>
					<p class="text-center">Belum punya akun ? silakan <a class="label label-primary" href="<?php echo base_url; ?>/daftar">daftar disini</a></p>

				</div>
			</div>
		</div>


</div>


<?php include('layout/footer.php'); ?>
