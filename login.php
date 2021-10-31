<?php
// import modul
require "conn.php";
session_start();

/// pengecekan session, jika sudah melakukan login kembalikan ke halaman index.php
if (isset($_SESSION['username'])) {
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <title>Login | Toko Sehat</title>
    <!-- panggil tampilan header -->
    <?php require 'header.php'; ?>
</head>

<body style="min-height:20vh;">
    <header class="fixed-top shadow-sm">
        <!-- panggil tampilan navbar -->
        <?php require 'navbar.php' ?>
    </header>
    <main class="py-5 mt-5" style="min-height:20vh;">
        <div class="container mt-5">
            <div class="row">
                <div class="col">
                    <div class="load-content mx-auto d-flex justify-content-center">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-3 text-center">
                                        <img class="" src="public\img\logo\toko_kesehatan.png" width="50" alt="logo-toko-kesehatan">
                                    </div>
                                    <div class="col-9">
                                        <h5 class="text-center">Selamat datang di <br>Toko Alat Kesehatan </h5>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col">
                                        <!-- menggunakan metode POST dengan mengirimkan data kedalam session_login.php -->
                                        <form method="POST" action="__function\session_login.php">
                                            <div class="mb-3">
                                                <label for="U_Username" class="form-label"><i class="bi bi-envelope-fill"></i> User ID</label>
                                                <input name="username" type="username" class="form-control" id="U_Username">
                                            </div>
                                            <div class="mb-3">
                                                <label for="U_Password" class="form-label"><i class="bi bi-key-fill"></i> Password</label>
                                                <input name="password" type="password" class="form-control" id="U_Password">
                                            </div>
                                            <div class="content-button d-flex justify-content-center">
                                                <button type="submit" class="d-flex btn btn-success">Masuk</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#12a157" fill-opacity="1" d="M0,32L34.3,64C68.6,96,137,160,206,186.7C274.3,213,343,203,411,186.7C480,171,549,149,617,154.7C685.7,160,754,192,823,192C891.4,192,960,160,1029,154.7C1097.1,149,1166,171,1234,154.7C1302.9,139,1371,85,1406,58.7L1440,32L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path>
    </svg>
    <!-- panggil footer beserta file script -->
    <?php require 'footer.php'; ?>
</body>

</html>