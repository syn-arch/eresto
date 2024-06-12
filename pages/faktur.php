<?php
$kode_pesanan = $_GET['kode_pesanan'];
$pesanan = query("SELECT * FROM pesanan WHERE kode_pesanan = '$kode_pesanan'")[0];
$id_pesanan = $pesanan['id_pesanan'];
$detail_pesanan = query("SELECT * FROM detail_pesanan JOIN menu USING(id_menu) WHERE id_pesanan = '$id_pesanan'");
?>

<div class="container mt-5">
    <div class="d-flex justify-content-between">
        <h2 class="text-white">Faktur</h2>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="table-responsive bg-white rounded p-3">
                <table class="table bg-danger rounded">
                    <tr>
                        <th colspan="5">E-Resto Moderna</th>
                    </tr>
                    <tr>
                        <td colspan="5">Jl. Kenanga No. 50</td>
                    </tr>
                    <tr>
                        <td colspan="5">
                            <br>
                        </td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td colspan="4">: <?= $pesanan['nama_pelanggan'] ?></td>
                    </tr>
                    <tr>
                        <th>Nomor Meja</th>
                        <td colspan="4">: <?= $pesanan['nomor_meja'] ?></td>
                    </tr>
                    <tr>
                        <th>No Handphone</th>
                        <td colspan="4">: <?= $pesanan['no_hp'] ?></td>
                    </tr>
                    <tr>
                        <td colspan="5">
                            <br>
                        </td>
                    </tr>
                    <tr>
                        <th>No</th>
                        <th>Menu</th>
                        <th class="text-end">Harga</th>
                        <th>Jumlah</th>
                        <th class="text-end">Subtotal</th>
                    </tr>
                    <?php $no = 1;
                    foreach ($detail_pesanan as $detail) : ?>
                        <tr>
                            <th><?= $no++ ?></th>
                            <td><?= $detail['nama_menu'] ?></td>
                            <td class="text-end"><?= "Rp. " .  number_format($detail['harga'], 0, '', '.') ?></td>
                            <td><?= $detail['jumlah'] ?></td>
                            <td class="text-end"><?= "Rp. " .  number_format($detail['total_harga'], 0, '', '.') ?></td>
                        </tr>
                    <?php endforeach ?>
                    <tr>
                        <td colspan="5">
                            <br>
                        </td>
                    </tr>
                    <tr>
                        <th>Catatan</th>
                        <td>: <?= $pesanan['keterangan'] ?></td>
                        <th class="text-end" colspan="2">Total</th>
                        <th class="text-end total"><?= number_format($pesanan['total'], 0, '', '.') ?></th>
                    </tr>
                    <tr>
                        <td colspan="5">
                            <br>
                        </td>
                    </tr>
                </table>
                <button class="btn my-color text-white d-print-none" onclick="window.print()">Cetak</button>
            </div>
        </div>
    </div>
</div>

<div class="vh-10"></div>
