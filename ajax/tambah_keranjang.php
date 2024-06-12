<?php
require('../koneksi.php');

$id_menu = htmlspecialchars($_POST['id_menu']);
$qty = htmlspecialchars($_POST['qty']);

$new_item = [
    'id_menu' => $id_menu,
    'qty' => $qty
];

$item_found = false;

foreach ($_SESSION['keranjang'] as &$item) {
    if ($item["id_menu"] === $new_item["id_menu"]) {
        $item["qty"] += $new_item["qty"];
        $item_found = true;
        break;
    }
}

if (!$item_found) {
    $_SESSION['keranjang'][] = $new_item;
}
