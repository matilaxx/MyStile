<?php 
 //koneksi kedatabase
include '../dbconnect.php';
 // nama file
$filename="data produk-".date('Ymd').".xls";

 //header info for browser
header("Content-Type: application/vnd-ms-excel"); 
header('Content-Disposition: attachment; filename="' . $filename . '";');

    //menampilkan data sebagai array dari tabel produk
$out=array();
$sql=mysqli_query($conn,"SELECT * from cart c, login l where c.userid=l.userid and status!='Cart' and status!='Selesai' order by idcart ASC");
while($data=mysql_fetch_assoc($sql)) $out[]=$data;

$show_coloumn = false;
foreach($out as $record) {
	if(!$show_coloumn) {
 //menampilkan nama kolom di baris pertama
		echo implode("\t", array_keys($record)) . "\n";
		$show_coloumn = true;
	}
 // looping data dari database
	echo implode("\t", array_values($record)) . "\n";
} 
exit;
?>