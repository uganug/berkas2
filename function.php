<?php
//require 'fungsi.php';
session_start();

$conn = mysqli_connect("localhost","root", "", "apotek");
//Cek login, terdaftar atau tidk
if(isset($_POST['login'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	//verif dengan database
	$cekdatabase = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' and password = '$password' ");
	
	//hitung jumlah data
	$hitung = mysqli_num_rows($cekdatabase);

	if($hitung>0){
		//kalaudata ditemukan
		$getdatalevel = mysqli_fetch_array($cekdatabase);
		$level = $getdatalevel['level'];
		
		if($level == 'Admin'){
			//klo admin 
			$_SESSION['log'] = 'Logged';
			$_SESSION['level'] = 'Admin';
			header('location:admin');
		}else{
			//klo costumer
			$_SESSION['log'] = 'Logged';
			$_SESSION['level'] = 'Costumer';
			header('location:costumer');
		}
	}else {
		echo 'data tdk ditemukan';
	}
}

?>