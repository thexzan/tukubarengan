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
		
		$_SESSION["email"] = $data_user->email;
		$_SESSION["nama"]  = $data_user->nama;
		$_SESSION["level"] = $data_user->level;
		$_SESSION["id"]    = $data_user->id;

		redirect($_SESSION['last_page']);

	}else{
		echo "password salah";
	}
}else{
	echo "ora ketemu";
}

include('layout/footer.php');