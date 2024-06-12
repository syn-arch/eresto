<?php
require('../koneksi.php');

if (isset($_POST['email'])) {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    $query = mysqli_query($conn, "SELECT * FROM admin WHERE email = '$email' AND password = '$password'");
    if (mysqli_num_rows($query) == 1) {
        $admin = mysqli_fetch_assoc($query);
        $_SESSION['login'] = true;
        $_SESSION['nama_admin'] = $admin['nama_admin'];
        $_SESSION['email'] = $admin['email'];
        header('location:index.php?page=dashboard');
    } else {
        header('location:login.php?pesan=gagal');
    }
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .wrapper {
            background-image: url('../assets/img/bg-login.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            width: 100%;
        }

        .overlay {
            height: 100vh;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="overlay">
            <div class="card shadow" style="width: 25rem;">
                <div class="card-body">
                    <h5 class="card-title">Login Admin</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">Silahkan masukan email dan password</h6>
                    <hr>
                    <?php if (isset($_GET['pesan'])) : ?>
                        <?php if ($_GET['pesan'] == 'gagal') : ?>
                            <div class="alert alert-danger">
                                <strong>Gagal</strong>
                                <p>Email atau password anda salah</p>
                            </div>
                        <?php endif ?>
                    <?php endif ?>
                    <form method="POST">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">@</span>
                            <input type="text" class="form-control" placeholder="E-mail" name="email" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">**</span>
                            <input type="password" class="form-control" placeholder="Password" name="password" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
