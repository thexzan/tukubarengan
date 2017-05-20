<?php

function angka_cantik($angka){
		return number_format($angka, 0 , '' , '.' );
	}

function tanggal_cantik($tanggal){
	$tanggal_cantik = new DateTime($tanggal);
	return $tanggal_cantik->format('d M y');
}

function persentase($current,$target){
	 return round($current/$target*100);
}

function unslugify($text){
	return str_replace('-',' ',$text);
}

function slugify($text){
	return str_replace(' ','-', $text);
}

function hapus_folder($folder) { 
	$files = array_diff(scandir($folder), array('.','..')); 
	foreach ($files as $file) { 
	(is_dir("$folder/$file")) ? hapus_folder("$folder/$file") : unlink("$folder/$file"); 
	} 
	return rmdir($folder); 
} 


function get_ref(){
	if (isset($_SERVER['HTTP_REFERER'])) {
		$ref = $_SERVER['HTTP_REFERER'];
	}else{
		$ref = 'direct';
	}

	return $ref;
}