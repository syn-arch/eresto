<?php
$total_pesanan = row_query("SELECT COUNT(*) AS total FROM pesanan WHERE DATE(tanggal) = DATE(NOW()) ")['total'];
$total_pendapatan = row_query("SELECT SUM(total) AS total FROM pesanan WHERE DATE(tanggal) = DATE(NOW()) ")['total'];
$total_pendapatan_hari_ini = row_query("SELECT SUM(total) as total FROM pesanan")['total'];
?>

<div class="container">
    <p class="mt-5 fs-3">
        Selamat Datang <?= $_SESSION['nama_admin'] ?>
    </p>
    <div class="row">
        <div class="col-md-4 mt-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Pesanan Hari Ini</h5>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart-check" width="80" height="80" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M4 19a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                            <path d="M11.5 17h-5.5v-14h-2" />
                            <path d="M6 5l14 1l-1 7h-13" />
                            <path d="M15 19l2 2l4 -4" />
                        </svg>
                        <p class="fs-1 fw-bold text-muted"> <?= $total_pesanan ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mt-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Pendapatan Hari Ini</h5>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart-dollar" width="80" height="80" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M4 19a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                            <path d="M13 17h-7v-14h-2" />
                            <path d="M6 5l14 1l-.575 4.022m-4.925 2.978h-8.5" />
                            <path d="M21 15h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5" />
                            <path d="M19 21v1m0 -8v1" />
                        </svg>
                        <p class="fs-1 fw-bold text-muted"><?= "Rp. " . number_format($total_pendapatan_hari_ini, 0, '', '.') ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mt-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Seluruh Pendapatan</h5>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart-dollar" width="80" height="80" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M4 19a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                            <path d="M13 17h-7v-14h-2" />
                            <path d="M6 5l14 1l-.575 4.022m-4.925 2.978h-8.5" />
                            <path d="M21 15h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5" />
                            <path d="M19 21v1m0 -8v1" />
                        </svg>
                        <p class="fs-1 fw-bold text-muted"><?= "Rp. " . number_format($total_pendapatan, 0, '', '.') ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
