<?php
//jika belum login

if(isset($_SESSION['log'])){
	if($_SESSION['level'] !== "Admin"){
		header('location:../costumer');
	}
	
} else {
	header('location:../index.php');
}
?>