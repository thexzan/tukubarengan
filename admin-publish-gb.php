<?php include('layout/header.php'); 
protect_admin();

$data = Array (
    "judul"       => $_POST['judul'],
    "status"      => $_POST['status'],
    "slug"        => $_POST['slug'],
    "desc"        => $_POST['slug'],
    "id_kategori" => $_POST['kategori'],
    "harga"       => $_POST['harga'],
    "target"      => $_POST['target'],
    "cover"       => $_FILES["cover"]["name"]
);

$id = $db->insert ('produk', $data);

$name     = $_FILES["cover"]["name"];
$tmp_name = $_FILES['cover']['tmp_name'];
$location = 'images/';
move_uploaded_file($tmp_name, $location.$name);

redirect(base_url.'/gb/'.$_POST['slug']);
