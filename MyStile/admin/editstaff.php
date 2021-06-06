<?php 
session_start();
include '../dbconnect.php';


if(isset($_POST['editstaff']))
{
	$namalengkap = $_POST['namalengkap'];
	$email = $_POST['email'];
	$password = password_hash($_POST['password'],PASSWORD_DEFAULT);
	$notelp = $_POST['notelp'];
	$alamat = $_POST['alamat'];
	$userid = $_POST['userid'];

	$editmet = mysqli_query($conn,"UPDATE login SET namalengkap='$namalengkap',email='$email',password='$password',notelp='$notelp',alamat='$alamat' WHERE userid='$userid' ");
	
};
echo "<script>alert('data telah diubah');</script>";
echo "<script>location='user.php';</script>";
?>
