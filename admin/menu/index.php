<?php
$menu = query("SELECT * FROM menu");

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'hapus') {
        $id_menu = $_GET['id_menu'];
        $menu_row = row_query("SELECT * FROM menu WHERE id_menu = $id_menu");
        unlink("../assets/img/menu/" . $menu_row['gambar']);
        mysqli_query($conn, "DELETE FROM menu WHERE id_menu = $id_menu");
        header("location: index.php?page=menu&pesan=dihapus");
    }
}
?>
<div class="container">
    <p class="my-3 fs-3">
        Data Menu
    </p>
    <a href="index.php?page=tambah_menu" class="btn btn-primary my-3">Tambah Data</a>
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
                            <th>Nama Menu</th>
                            <th>Jenis</th>
                            <th>Harga</th>
                            <th>Keterangan</th>
                            <th>Gambar</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($menu as $m) : ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $m['nama_menu'] ?></td>
                                <td><?= $m['jenis'] ?></td>
                                <td><?= number_format($m['harga'], 0, '', '.') ?></td>
                                <td><?= $m['keterangan'] ?></td>
                                <td><img src="../assets/img/menu/<?= $m['gambar'] ?>" width="100px" alt=""></td>
                                <td><?= $m['status'] ? 'Aktif' : 'Tidak Aktif' ?></td>
                                <td>
                                    <div class="d-flex">
                                        <a href="index.php?page=edit_menu&id_menu=<?= $m['id_menu'] ?>" class="btn btn-warning me-1">Edit</a>
                                        <a onclick="return confirm('Apakah anda yakin?')" href="index.php?page=menu&action=hapus&id_menu=<?= $m['id_menu'] ?>" class="btn btn-danger">Delete</a>
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
