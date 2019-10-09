<?php
	include 'koneksi2.php';

	$Id_bayar = $_POST['Id_bayar'];
	$Id_tiket=$_POST['Id_tiket'];
	$Id_pemesan = $_POST['Id_pemesan'];
	$Tanggal=$_POST['Tanggal'];
	$Atm=$_POST['Atm'];
	$No_rek=$_POST['No_rek'];
	$Jumlah0rg = $_POST['Jumlah_orang'];
	$Tothar = $_POST['Total_harga'];
	$Jumlahuang = $_POST['Jumlah_uang']; 

	$post = mysqli_query($koneksi, "INSERT INTO pembayaran VALUES('$Id_bayar', '$Id_tiket', $Id_pemesan, '$Tanggal', '$Atm', $No_rek, $Jumlah0rg, $Tothar, $Jumlahuang)");

	if (!$post) {
	 	echo "gagal";
	 } else{
	 	header('location: tiket.php');
	 	echo "Selamat Tambah Mahasiswa Berhasil";
	 }
?>