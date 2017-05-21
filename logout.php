<?php
include('layout/header.php');
session_start(); 
session_destroy(); 
redirect(base_url);
?>