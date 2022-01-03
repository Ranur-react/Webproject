<?php
	@session_start();
	$_SESSION['judul'] = 'SPK WP Pemilihan Perabot Rotan Adit Furniture';
	$_SESSION['welcome'] = 'REKOMENDASI PEMILIHAN PRODUK FURNITURE BERBAHAN ROTAN DENGAN METODE SISTEM PENDUKUNG KEPUTUSAN WEIGHTED PRODUCT (WP) BERBASIS PEMROGRAMAN WEB';
	$_SESSION['by'] = 'Rahmad Al Hafidz';
	$mysqli = new mysqli('localhost','root','','spk-wp');
	if($mysqli->connect_errno){
		echo $mysqli->connect_errno." - ".$mysqli->connect_error;
		exit();
	}
