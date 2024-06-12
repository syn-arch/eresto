<?php
require('../koneksi.php');

$id_pesanan = $_POST['id_pesanan'];
$status = $_POST['status'];

mysqli_query($conn, "UPDATE pesanan SET status = '$status' WHERE id_pesanan = '$id_pesanan'");
