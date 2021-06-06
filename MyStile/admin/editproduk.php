<?php 
session_start();
include '../dbconnect.php';

if(isset($_POST['simpan'])) 
{
	$namaproduk=$_POST['namaproduk'];
	$idkategori=$_POST['kategori'];
	$deskripsi=$_POST['deskripsi'];
	$hargabefore=$_POST['hargabefore'];
	$hargaafter=$_POST['hargaafter'];
	$idproduk=$_POST['idproduk'];

	$editproduk=mysqli_query($conn,"UPDATE produk SET  namaproduk='$namaproduk', deskripsi='$deskripsi', hargabefore='$hargabefore', hargaafter='$hargaafter', WHERE idproduk='$idproduk'");

	

};
echo "<script>alert('data telah diubah');</script>";
echo "<script>location='produk.php';</script>";
?>