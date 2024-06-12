<?php
require('../koneksi.php');

$jumlah = 0;
foreach ($_SESSION['keranjang'] as &$item) {
    $jumlah += 1;
}

echo $jumlah;
