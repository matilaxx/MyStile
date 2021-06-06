<?php 
session_start();
include '../dbconnect.php';


if(isset($_POST['editmetode']))
{
	$metode = $_POST['metode'];
	$norek = $_POST['norek'];
	$an = $_POST['an'];
	$id = $_POST['no'];

	$editmet = mysqli_query($conn,"UPDATE pembayaran SET metode='$metode',norek='$norek',an='$an' WHERE no='$id' ");
	
};
echo "<script>alert('data telah diubah');</script>";
echo "<script>location='pembayaran.php';</script>";
?>
