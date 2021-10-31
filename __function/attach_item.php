<?php
// import modul
require "../conn.php";
require "query_function.php";
session_start();

/// inisialisasi variabel yang menampung session value 'id'
$id = $_SESSION['id'];
/// inisialisasi variabel yang menampung pengiriman data dengan metode POST berupa 'id_item'
$id_item = $_POST['id_item'];
/// inisialisasi variabel yang menampung pengiriman data dengan metode POST berupa 'harga' lalu diubah menjadi integer
$harga_item = intval($_POST['harga']);

/// pengecekan jika user belum melakukan login, maka diarahkan ke halaman login.php
if (isset($_SESSION['id']) == '') {
    echo "<h1>Anda Belum Login</h1>";
    header("Location: login.php");
}

/// melakukan fungsi query add_cart() yang berparameter (id item, harga item, customer id) untuk menampung item kedalam keranjang customer sendiri
add_cart($id_item, $harga_item, $id);
