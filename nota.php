<?php
// import modul
require_once __DIR__ . '/vendor/autoload.php';
require "conn.php";
require "__function/query_function.php";

session_start();

/// menangkap id customer dari session dijadikan variabel
$id_user = $_SESSION['id'];
/// menangkap username customer dari session dijadikan variabel
$username = $_SESSION['username'];

/// menjalankan query get_spesific_data() untuk mendapatkan data customer
$user = get_spesific_data('customer', 'username', $username);
/// menjalankan query belanja() untuk mendapatkan data keranjang customer berupa parameter $id_user
$items = belanja($id_user);

// $_SESSION['history'] = "Keranjang dikosongkan";
// update_status_cart($id_user, 1);
/// melakukan deklarasi new class Mpdf() dari package mpdf
$mpdf = new \Mpdf\Mpdf();
/// melakukan perekaman halaman
ob_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Mari Belajar Coding</title>
    <?php require 'header.php'; ?>
</head>

<body>
    <div align="center">
        <h2 align="center">Data Belanja Toko Alat Kesehatan</h2>
        <div class="row" style="display: inline-flex;">
            <?php /// variabel untuk penomoran yang digunakan pada looping
            $no = 1;
            /// melakukan looping yang berisikan data customer
            foreach ($user as $u) : ?>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="U_Username" class="form-label"><i class="fas fa-fw fa-user"></i> User ID</label>
                        <input type="text" class="form-control" id="U_Username" value="<?= $id_user; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="U_Username" class="form-label"><i class="fas fa-fw fa-user"></i> Nama</label>
                        <input type="text" class="form-control" id="U_Username" value="<?= $username; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="U_Username" class="form-label"><i class="fas fa-fw fa-user"></i> Alamat</label>
                        <input type="text" class="form-control" id="U_Username" value="<?= $u['alamat']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="U_Username" class="form-label"><i class="fas fa-fw fa-user"></i> No HP</label>
                        <input type="text" class="form-control" id="U_Username" value="<?= $u['no_HP']; ?>">
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="U_Username" class="form-label"><i class="fas fa-fw fa-user"></i> Tanggal</label>
                        <input type="text" class="form-control" id="U_Username" value="<?= $u['tgl_input']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="U_Username" class="form-label"><i class="fas fa-fw fa-user"></i> ID Paypal</label>
                        <input type="text" class="form-control" id="U_Username" value="<?= $u['paypal_ID']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="U_Username" class="form-label"><i class="fas fa-fw fa-user"></i> Nama Bank</label>
                        <input type="text" class="form-control" id="U_Username" value="Bank debit/kredit">
                    </div>
                    <div class="mb-3">
                        <label for="U_Username" class="form-label"><i class="fas fa-fw fa-user"></i> Cara Bayar</label>
                        <input type="text" class="form-control" id="U_Username" value="metode prepaid/postpaid">
                    </div>
                </div>
            <?php /// perulangan berakhir
            endforeach; ?>
        </div>
        <table align="center" style="border: 1px solid black;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Produk dengan IDnya</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody>
                <?php
                /// inisialisasi kerangka variabel
                $total_harga = 0;
                /// melakukan perulangan untuk mencetak data checkout customer
                foreach ($items as $i) :
                ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $i['nama'] ?></td>
                        <td><?= $i['jumlah'] ?></td>
                        <td><?= $i['harga'] ?></td>
                        <?php $total_harga += $i['harga'] ?>
                    </tr>
                <?php /// mengakhiri perulangan
                endforeach; ?>
            </tbody>
        </table>
        <b>Total Belanja (*termasuk pajak Rp 2.500): <?= $total_harga = $total_harga + 2500; ?></b>
    </div>
</body>

</html>
<?php
/// inisialisasi variabel dari hasil perekaman halaman
$html = ob_get_contents();
/// mengakhiri perekaman halaman
ob_end_clean();
/// memformat halaman html untuk dijadikan pdf
$mpdf->WriteHTML(utf8_encode($html));
/// print menjadi pdf
$mpdf->Output();
/// pindah ke menu halaman utama
header("Location: ../index.php");
?>