<?php 

$sql = "SELECT * FROM kritik WHERE id_status_transaksi= 2 ";
$result = $koneksi->query($sql);

echo $result->num_rows;

?>