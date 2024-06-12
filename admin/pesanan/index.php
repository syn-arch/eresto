<?php
$pesanan = query("SELECT * FROM pesanan");

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'hapus') {
        $id_pesanan = $_GET['id_pesanan'];
        mysqli_query($conn, "DELETE FROM detail_pesanan WHERE id_pesanan = $id_pesanan");
        mysqli_query($conn, "DELETE FROM pesanan WHERE id_pesanan = $id_pesanan");
        header("location: index.php?page=pesanan&pesan=dihapus");
    }
}
?>
<div class="container">
    <p class="my-3 fs-3">
        Data Pesanan
    </p>

    <?php if (isset($_GET['pesan'])) : ?>
        <div class="alert alert-success">
            <strong>Berhasil</strong>
            <p>Data berhasil <?= $_GET['pesan'] ?></p>
        </div>
    <?php endif ?>

    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive p-3 rounded shadow-sm">
                <table class="table datatable table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Pesanan</th>
                            <th>Nomor Meja</th>
                            <th>Tanggal</th>
                            <th>Nama Pelanggan</th>
                            <th>No HP</th>
                            <th>Total</th>
                            <th>Keterangan</th>
                            <th>Kritik & Saran</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($pesanan as $m) : ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $m['kode_pesanan'] ?></td>
                                <td><?= $m['nomor_meja'] ?></td>
                                <td><?= $m['tanggal'] ?></td>
                                <td><?= $m['nama_pelanggan'] ?></td>
                                <td><?= $m['no_hp'] ?></td>
                                <td><?= number_format($m['total'], 0, '', '.') ?></td>
                                <td><?= $m['keterangan'] ?></td>
                                <td><?= $m['kritik_saran'] ?></td>
                                <td>
                                    <select name="status" id="status" class="form-control status" data-id="<?= $m['id_pesanan'] ?>">
                                        <option <?= $m['status'] == "baru" ? 'selected' : '' ?> value="baru">baru</option>
                                        <option <?= $m['status'] == "diproses" ? 'selected' : '' ?> value="diproses">diproses</option>
                                        <option <?= $m['status'] == "selesai" ? 'selected' : '' ?> value="selesai">selesai</option>
                                    </select>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="index.php?page=faktur&id_pesanan=<?= $m['id_pesanan'] ?>" class="btn btn-warning me-1">Faktur</a>
                                        <a onclick="return confirm('Apakah anda yakin?')" href="index.php?page=pesanan&action=hapus&id_pesanan=<?= $m['id_pesanan'] ?>" class="btn btn-danger">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
