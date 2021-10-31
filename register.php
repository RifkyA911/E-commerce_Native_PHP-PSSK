<?php
require "conn.php";
require "__function/query_function.php";
$list_provinsi = get_all_data('provinces');
$list_regencies = get_all_data('regencies');
session_start();
if (isset($_SESSION['username'])) {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <title>Register | Toko Sehat</title>
    <!-- panggil header -->
    <?php require 'header.php'; ?>
</head>

<body style="min-height:20vh;">
    <header class="fixed-top shadow-sm">
        <?php require 'navbar.php' ?>
    </header>
    <main class="py-5 mt-5" style="min-height:20vh;">
        <div class="container mt-5">
            <div class="row">
                <div class="col">
                    <div class="load-content mx-auto d-flex justify-content-center">
                        <div class="card shadow col-md-6">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="text-center">Form Registrasi </h5>
                                    </div>
                                </div>
                                <hr>
                                <form method="POST" action="__function/register_customer.php">
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="U_Username" class="form-label"><i class="fas fa-fw fa-user"></i> Username</label>
                                                <input name="username" type="text" class="form-control" id="U_Username" required placeholder="Masukkan username baru">
                                            </div>
                                            <div class="mb-3">
                                                <label for="U_Password" class="form-label"><i class="bi bi-key-fill"></i> Password</label>
                                                <input name="password" type="password" class="form-control" id="U_Password" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="U_RetypePassword" class="form-label"><i class="bi bi-key-fill"></i> Retype Password</label>
                                                <input name="Rpassword" type="password" class="form-control" id="U_RetypePassword" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="U_Mail" class="form-label"><i class="bi bi-envelope-fill"></i> E-mail</label>
                                                <input name="email" type="email" class="form-control" id="U_Mail" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="U_Date" class="form-label"><i class="bi bi-calendar"></i> Tanggal Lahir</label>
                                                <input name="date" type="date" class="form-control" id="U_Date" required>
                                            </div>
                                            <label class="form-label"><i class="fas fa-fw fa-restroom"></i> Jenis Kelamin</label>
                                            <div class="mb-3">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="kelamin" id="U_Gender1" value="1">
                                                    <label class="form-check-label" for="U_Gender1">Laki-Laki</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="kelamin" id="U_Gender2" value="2">
                                                    <label class="form-check-label" for="U_Gender2">Perempuan</label>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="U_Alamat" class="form-label"><i class="fa fa-fw fa-address-card"></i> Alamat</label>
                                                <textarea class="form-control" name="alamat" id="U_Alamat" placeholder="Another input placeholder"></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="U_Kota" class="form-label"><i class="fa fa-fw fa-city"></i> Kota</label>
                                                <select class="form-select" id="U_Kota" name="kota">
                                                    <?php foreach ($list_regencies as $lp) : ?>
                                                        <option value="<?= $lp['id']; ?>"><?= $lp['name']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="U_Kontak" class="form-label"><i class="fas fa-fw fa-phone-square-alt"></i> No. HP</label>
                                                <input name="kontak" type="text" class="form-control" id="U_Kontak" required placeholder="Masukkan no HP">
                                            </div>
                                            <div class="mb-3">
                                                <label for="U_PayPal" class="form-label"><i class="fab fa-fw fa-cc-paypal"></i> Pay-pal ID</label>
                                                <input name="paypal" type="text" class="form-control" id="U_PayPal" required placeholder="Masukkan paypal ID">
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="content-button d-flex">
                                            <div class="col d-flex justify-content-center">
                                                <button type="submit" class="d-flex btn text-light" style="background-color: #0099ff;">Daftar</button>
                                            </div>
                                            <div class="col d-flex justify-content-center">
                                                <button type="button" class="btn text-light btn-danger">Clear</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#0099ff" fill-opacity="1" d="M0,64L60,90.7C120,117,240,171,360,186.7C480,203,600,181,720,192C840,203,960,245,1080,224C1200,203,1320,117,1380,74.7L1440,32L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path>
    </svg>
    <?php require 'footer.php'; ?>
</body>

</html>