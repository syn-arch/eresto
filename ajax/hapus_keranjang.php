<?php
require('../koneksi.php');

// ID menu yang ingin dihapus
$id_menu = $_POST['id_menu'];

// Loop melalui keranjang untuk menemukan dan menghapus item dengan id_menu tertentu
foreach ($_SESSION['keranjang'] as $key => $item) {
    if ($item["id_menu"] === $id_menu) {
        unset($_SESSION['keranjang'][$key]);
        break; // Keluar dari loop setelah menemukan item
    }
}

// Reindex array untuk menghilangkan lubang pada indeks
$_SESSION['keranjang'] = array_values($_SESSION['keranjang']);

// session_destroy();
