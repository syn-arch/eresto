<?php

require('../koneksi.php');

$nama = htmlspecialchars($_POST['nama']);
$no_meja = htmlspecialchars($_POST['no_meja']);
$no_hp = htmlspecialchars($_POST['no_hp']);
$keterangan = htmlspecialchars($_POST['keterangan']);
$kritik_saran = htmlspecialchars($_POST['kritik_saran']);
$kode_pesanan = kode_pesanan();
$tanggal = date('Y-m-d H:i:s');

$total = 0;
foreach ($_SESSION['keranjang'] as $key => $value) {
    $menu = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM menu"));
    $qty = $value['qty'];
    $total += $qty * $menu['harga'];
}

$q = "INSERT INTO pesanan VALUES(
'',
'$kode_pesanan',
'$tanggal',
'$nama',
'$no_hp',
'$no_meja',
$total,
'$keterangan',
'$kritik_saran',
'baru'
)";

$query =  mysqli_query($conn, $q);

$id_pesanan = mysqli_fetch_assoc(mysqli_query($conn, "SELECT MAX(id_pesanan) as id_pesanan FROM pesanan"))['id_pesanan'];

foreach ($_SESSION['keranjang'] as $key => $value) {
    $id_menu = $value['id_menu'];
    $menu = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM menu WHERE id_menu = '$id_menu' "));

    $qty = $value['qty'];
    $total_harga = $qty * $menu['harga'];

    $q = "INSERT INTO detail_pesanan VALUES(
    '',
    '$id_pesanan',
    '$id_menu',
    '$qty',
    '$total_harga',
    ''
    )";
    $query = mysqli_query($conn, $q);
}

unset($_SESSION['keranjang']);

return header("Location: ../index.php?page=faktur&kode_pesanan=$kode_pesanan");
