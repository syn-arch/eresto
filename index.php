<?php
require('koneksi.php');

require('templates/header.php');

if (isset($_GET['page'])) {
    $page = $_GET['page'];
    if ($page == "beranda") {
        require('pages/beranda.php');
    } else if ($page == "menu") {
        require('pages/menu.php');
    } else if ($page == "keranjang") {
        require('pages/keranjang.php');
    } else if ($page == "faktur") {
        require('pages/faktur.php');
    } else {
        require('pages/404.php');
    }
} else {
    require('pages/beranda.php');
}

require('templates/footer.php');
