<?php
if (isset($_SESSION['keranjang'])) {
    $keranjang = $_SESSION['keranjang'];
}
?>

<div class="container mt-5">
    <div class="d-flex justify-content-between">
        <h2 class="text-white">Daftar Keranjang</h2>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="table-responsive bg-white rounded p-3">
                <table class="table bg-danger rounded">
                    <thead>
                        <tr>
                            <th class="text-center">Gambar</th>
                            <th>Menu</th>
                            <th class="text-end">Harga</th>
                            <th>Jumlah</th>
                            <th class="text-end">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($_SESSION['keranjang'])) : ?>
                            <?php
                            $total = 0;
                            foreach ($keranjang as $index => $k) : ?>
                                <?php
                                $menu = query("SELECT * FROM menu WHERE id_menu = $k[id_menu]")[0];
                                $total += $k['qty'] * $menu['harga'];
                                ?>
                                <tr>
                                    <th class="text-center d-flex justify-content-between">
                                        <button class="btn delete-cart" data-id="<?= $k['id_menu'] ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#a91d3a" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M4 7l16 0" />
                                                <path d="M10 11l0 6" />
                                                <path d="M14 11l0 6" />
                                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                            </svg>
                                        </button>
                                        <img src="assets/img/menu/<?= $menu['gambar'] ?>" width="150px" alt="">
                                        <div></div>
                                    </th>
                                    <td>
                                        <?= $menu['nama_menu'] ?>
                                    </td>
                                    <td class="text-end harga"><?= number_format($menu['harga'], 0, '', '.') ?></td>
                                    <td width="10%"><input data-id="<?= $k['id_menu'] ?>" type="number" value="<?= $k['qty'] ?>" name="qty" autocomplete="off" class="form-control qty-keranjang"></td>
                                    <td class="text-end subtotal"><?= number_format($k['qty'] * $menu['harga'], 0, '', '.') ?></td>
                                </tr>
                            <?php endforeach ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="5" class="text-center">
                                    <p>Keranjang Kosong</p>
                                </td>
                            </tr>
                        <?php endif ?>
                    </tbody>
                    <?php if (isset($_SESSION['keranjang'])) : ?>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <th class="text-end" colspan="2">Total</th>
                                <th class="text-end total"><?= number_format($total, 0, '', '.') ?></th>
                            </tr>
                        </tfoot>
                    <?php endif ?>
                </table>
            </div>
            <div class="d-grid bg-white p-3 rounded mt-3">
                <form action="proses/checkout.php" method="POST">
                    <div class="mb-3">
                        <label for="">Nama</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="">No Meja</label>
                        <input type="text" class="form-control" name="no_meja" placeholder="No Meja" required>
                    </div>
                    <div class="mb-3">
                        <label for="">No Handphone (Optional)</label>
                        <input type="text" class="form-control" name="no_hp" placeholder="No hp">
                    </div>
                    <div class="mb-3">
                        <label for="">Catatan Khusus (Opsional)</label>
                        <textarea name="keterangan" id="" class="form-control" placeholder="Catatan"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">Kritik dan Saran (Opsional)</label>
                        <textarea name="kritik_saran" id="" class="form-control" placeholder="Kritik dan Saran"></textarea>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn my-color text-white">Konfirmasi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="vh-10"></div>
