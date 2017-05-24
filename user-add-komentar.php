<?php include('layout/header.php');

$isi       = strip_tags($_POST['isi']);
$id_produk = $_POST['id_produk'];
$id_user   = $_SESSION['id'];

$data = Array (
	"isi"       => $isi,
	"id_produk" => $id_produk,
	"id_user"   => $id_user,
);

$id = $db->insert ('komentar', $data);


redirect($_SERVER['HTTP_REFERER']);

?>