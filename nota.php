<?php
require_once __DIR__ . '/vendor/autoload.php';
require "conn.php";
require "__function/query_function.php";

session_start();
$id_user = $_SESSION['id'];
$username = $_SESSION['username'];

$user = get_spesific_data('customer', 'username', $username);
$items = belanja($id_user);
$no = 1;

// $_SESSION['history'] = "Keranjang dikosongkan";
// update_status_cart($id_user, 1);
$mpdf = new \Mpdf\Mpdf();
ob_start();
?>
<!DOCTYPE html>
<html>

<!DOCTYPE html>
<html>

<head>
    <title>Mari Belajar Coding</title>
    <?php require 'header.php'; ?>
</head>

<body>
    <div align="center">
        <h2 align="center">Data Mahasiswa</h2>
        <div class="row">
            <?php foreach ($user as $u) : ?>
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
            <?php endforeach; ?>
        </div>
        <h2 align="center">Data Belanja</h2>
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
                <?php foreach ($items as $i) : ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $i['nama'] ?></td>
                        <td><?= $i['jumlah'] ?></td>
                        <td><?= $i['harga'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>
<?php
// print menjadi pdf
$html = ob_get_contents();
ob_end_clean();
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output();
header("Location: ../index.php");
?>