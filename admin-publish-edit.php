<?php include('layout/header.php'); 
protect_admin();

$data = Array (
    "judul"       => $_POST['judul'],
    "status"      => $_POST['status'],
    "slug"        => $_POST['slug'],
    "desc"        => $_POST['deskripsi'],
    "id_kategori" => $_POST['kategori'],
    "harga"       => $_POST['harga'],
    "target"      => $_POST['target'],
);

$db->where ('id', $_POST['id_produk']);
$db->update ('produk', $data);

redirect(base_url.'/gb/'.$_POST['slug']);