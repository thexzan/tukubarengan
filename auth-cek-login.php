<?php

include('layout/header.php');

$email = $_POST['email'];
$pass  = $_POST['password'];

$db->where('email', $email);
$data_users = $db->ObjectBuilder()->get('user');


if ($db->count == 1) {
	$db->where('email', $email);
	$data_user = $db->ObjectBuilder()->getOne('user');

	if (password_verify($pass, $data_user->password)) {

		if ($data_user->suspended == 1) {
			$_SESSION['pesan']      = 'Akun anda di <strong>SUSPEND! </strong>';
			$_SESSION['pesan-tipe'] = 'danger';
			redirect(base_url.'/auth/login');
		}else{
			$_SESSION["email"] = $data_user->email;
			$_SESSION["nama"]  = $data_user->nama;
			$_SESSION["level"] = $data_user->level;
			$_SESSION["id"]    = $data_user->id;

			redirect($_SESSION['last_page']);
		}

	}else{
		$_SESSION['pesan']      = 'Password yang anda masukan salah / Tidak cocok!';
		$_SESSION['pesan-tipe'] = 'warning';
		redirect(base_url.'/auth/login');
	}
}else{
	$_SESSION['pesan']      = 'Anda belum terdaftar! Silakan mendaftar dahulu!';
	$_SESSION['pesan-tipe'] = 'danger';
	redirect(base_url.'/auth/login');
}