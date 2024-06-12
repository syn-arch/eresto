<?php
$menu = query("SELECT * FROM menu");
?>

<div class="container mt-5">
    <div class="d-flex justify-content-between">
        <h2 class="text-white">Daftar Menu</h2>
        <input type="text" placeholder="Cari Menu" class="px-3 rounded cari-menu">
    </div>
    <div class="row menu-container">
        <?php foreach ($menu as $m) : ?>
            <div class="col-lg-3 col-md-4 col-sm-6 mt-4">
                <div class="card">
                    <img src="assets/img/menu/<?= $m['gambar'] ?>" class="card-img-top" alt="<?= $m['nama_menu'] ?>">
                    <div class="card-body">
                        <h5 class="card-title fw-bold"><?= $m['nama_menu'] ?></h5>
                        <h5 class="card-title"><?= 'Rp. ' .  number_format($m['harga'], 0, '', '.') ?></h5>
                        <p class="card-text"><?= $m['keterangan'] ?></p>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="number" autocomplete="off" name="qty" value="1" class="form-control qty mt-3">
                            </div>
                            <div class="col-md-6 d-grid">
                                <button data-id="<?= $m['id_menu'] ?>" class="btn my-color text-white add-to-cart mt-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart-plus" width="25" height="25" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M4 19a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                        <path d="M12.5 17h-6.5v-14h-2" />
                                        <path d="M6 5l14 1l-.86 6.017m-2.64 .983h-10.5" />
                                        <path d="M16 19h6" />
                                        <path d="M19 16v6" />
                                    </svg> Tambah
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>

<div class="vh-10"></div>
