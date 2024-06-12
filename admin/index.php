<?php
require('../koneksi.php');

$page = $_GET['page'] ?? "dashboard";

require('templates/header.php');

if (isset($page)) {
    if ($page == "dashboard") {
        require('dashboard.php');
    } else if ($page == "menu") {
        require('menu/index.php');
    } else if ($page == "tambah_menu") {
        require('menu/tambah.php');
    } else if ($page == "edit_menu") {
        require('menu/edit.php');
    } else if ($page == "pesanan") {
        require('pesanan/index.php');
    } else if ($page == "faktur") {
        require('pesanan/faktur.php');
    } else {
        require('404.php');
    }
}

require('templates/footer.php');
