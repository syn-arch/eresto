<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= ucfirst($page ?? "E-resto") ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/app.css">
</head>

<body>
    <div class="hero">
        <div class="overlay">
            <nav class="navbar navbar-expand-lg py-3 d-print-none">
                <div class="container border rounded-pill px-5 py-1 container-navbar">
                    <a class="navbar-brand text-white fw-bold fs-2" href="index.php?page=beranda">E-Resto</a>
                    <button class="navbar-toggler border border-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-menu-2" width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M4 6l16 0" />
                            <path d="M4 12l16 0" />
                            <path d="M4 18l16 0" />
                        </svg>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link text-white mx-3" href="index.php?page=beranda">Beranda</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white mx-3" href="index.php?page=menu">Daftar Menu</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white mx-3 position-relative" href="index.php?page=keranjang">
                                    Keranjang
                                    <span class="badge rounded-pill text-bg-warning jumlah-keranjang"><?= count($_SESSION['keranjang'] ?? []) ?></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white my-color login-btn mx-3 px-5 rounded-pill" href="admin/login.php">Login</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
