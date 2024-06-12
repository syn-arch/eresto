<?php
if (isset($_POST['nama_menu'])) {
    $nama_menu = htmlspecialchars($_POST['nama_menu']);
    $jenis = htmlspecialchars($_POST['jenis']);
    $harga = htmlspecialchars($_POST['harga']);
    $keterangan = htmlspecialchars($_POST['keterangan']);
    $status = htmlspecialchars($_POST['status']);

    $target_dir = "../assets/img/menu/";
    $source = $_FILES["gambar"]["tmp_name"];
    $nama_gambar = basename($_FILES["gambar"]["name"]);
    $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
    move_uploaded_file($source, $target_file);

    $q = "INSERT INTO menu VALUES(
        '',
        '$nama_menu',
        '$jenis',
        '$harga',
        '$keterangan',
        '$nama_gambar',
        '$status'
    )";
    mysqli_query($conn, $q);
    header('location: index.php?page=menu&pesan=ditambahkan');
}

?>
<div class="container">
    <p class="my-3 fs-3">
        Data Menu
    </p>
    <a href="index.php?page=menu" class="btn btn-primary my-3">Kembali</a>
    <div class="row">
        <div class="col-md-12">
            <div class=" shadow p-3 rounded">
                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="" class="mb-1">Nama Menu</label>
                        <input type="text" class="form-control" name="nama_menu" placeholder="Nama Menu" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="mb-1">Jenis</label>
                        <select name="jenis" id="" class="form-control">
                            <option value="Makanan">Makanan</option>
                            <option value="Minuman">Minuman</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="mb-1">Harga</label>
                        <input type="number" class="form-control" name="harga" placeholder="Harga" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="mb-1">Keterangan</label>
                        <textarea name="keterangan" id="" placeholder="Keterangan" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="" class="mb-1">Gambar</label>
                        <input type="file" class="form-control" name="gambar" placeholder="Gambar" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="mb-1">Status</label>
                        <select name="status" id="" class="form-control">
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary" name="tambah">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
