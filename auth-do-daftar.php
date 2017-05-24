<?php include('layout/header.php'); 

$nama  = $_POST['nama'];
$email = $_POST['email'];
$pass  = $_POST['password'];

$password_setting = [
	'cost' => 11,
	'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
];

$new_pass = password_hash($pass, PASSWORD_BCRYPT, $password_setting);

$data = Array (
    "email"    => strip_tags($email),
    "nama"     => strip_tags(ucwords(strtolower($nama))),
    "password" => $new_pass,
    "level"    => 'user',
);

$id = $db->insert ('user', $data);


redirect(base_url.'/login');
