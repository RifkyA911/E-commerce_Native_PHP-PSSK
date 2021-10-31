<?php
require "../conn.php";

session_start();
$id = $_SESSION['id'];
$id_item = $_POST['id_item'];
$harga_item = intval($_POST['harga']);

// echo $id_item . "<br>";
// echo $harga_item . "<br>";
// echo $id . "<br>";

if (isset($_SESSION['id']) == '') {
    echo "<h1>Anda Belum Login</h1>";
    header("Location: login.php");
}

function add_cart($id_item, $harga_item, $id)
{
    global $conn;

    $query = "INSERT INTO `customer_cart` (`id_customer`, `id_item`, `jumlah`, `sub_total_harga`, `status`) VALUES ($id,$id_item,1,$harga_item,0)";

    $result = mysqli_query($conn, $query);
    if (!$result) {
        die('Query Error : ' . mysqli_errno($conn) .
            ' - ' . mysqli_error($conn));
    } else {
        $_SESSION['pesan'] = "Berhasil menaruh item ke keranjang"; // taruh ke session
        header("Location: ../index.php");
    }
}

add_cart($id_item, $harga_item, $id);
