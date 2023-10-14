<?php
session_start();


//membuat koneksi ke database
$conn = mysqli_connect("localhost","root", "", "apotek");

//menambah barang baru
if(isset($_POST['tambahobat'])){
	$namaobat = $_POST['namaobat'];
	$indikasi = $_POST['indikasi'];
	$dosis = $_POST['dosis'];
	$efeksamping = $_POST['efeksamping'];
	$stok = $_POST['stok'];
	
	$addtotable = mysqli_query($conn, "INSERT INTO obat (namaobat, indikasi, dosis, efeksamping, stok) 
	values('$namaobat', '$indikasi', '$dosis', '$efeksamping', '$stok')");
	if($addtotable){
	header('location:index.php');
	} else {
		echo 'gagal';
		header('location:index.php');
	}

}

//update info obat
if(isset($_POST['ubahobat'])){
	$ido = $_POST['ido'];
	$namaobat = $_POST['namaobat'];
	$indikasi = $_POST['indikasi'];
	$dosis = $_POST['dosis'];
	$efeksamping = $_POST['efeksamping'];
	$stok = $_POST['stok'];
	
	$ubah = mysqli_query($conn, "UPDATE obat SET 
	namaobat='$namaobat', indikasi='$indikasi', 
	dosis='$dosis', efeksamping='$efeksamping', stok='$stok' 
	WHERE id_obat='$ido'");
	if($ubah){
	header('location:index.php');
	} else {
		echo 'gagal';
		header('location:index.php');
	}
}

//hapus obat
if(isset($_POST['hapusobat'])){
	$ido = $_POST['ido'];
	
	$hapus = mysqli_query($conn, "DELETE FROM Obat WHERE id_obat='$ido'");
	if($hapus){
	header('location:index.php');
	} else {
		echo 'gagal';
		header('location:index.php');
	}
}


?>