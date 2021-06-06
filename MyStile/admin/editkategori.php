<?php 
session_start();
include '../dbconnect.php';


if(isset($_POST['editkategori']))
{
	$namakategori = $_POST['namakategori'];
	$idkategori = $_POST['idkategori'];

	$editkat = mysqli_query($conn,"UPDATE kategori SET namakategori='$namakategori' WHERE idkategori='$idkategori' ");
	
};
echo "<script>alert('data telah diubah');</script>";
echo "<script>location='kategori.php';</script>";
?>
