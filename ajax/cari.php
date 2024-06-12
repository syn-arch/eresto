<?php
require('../koneksi.php');

$q = htmlspecialchars($_GET['query']);

$menu = query("SELECT * FROM menu WHERE nama_menu LIKE '%$q%'");

sleep(1);

echo json_encode($menu);
