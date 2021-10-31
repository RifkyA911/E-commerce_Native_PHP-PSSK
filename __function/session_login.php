<?php
require_once "..\conn.php";

// ambil data visitor dari input form login

$username = $_POST['username'];
$password = $_POST['password'];
// var_dump($data);

// memulai session
session_start();

// fungsi pengecekan dan validasi visitor pada login sebagai customer
function get_customer($username, $password)
{
    global $conn;
    $query = "SELECT id, username, password FROM `customer` WHERE username='$username'";
    $result = mysqli_query($conn, $query);
    list($id, $username, $password_hashed) = mysqli_fetch_array($result);

    // validasi jika data ditemukan
    if (mysqli_num_rows($result) > 0) {
        // echo $password_hashed;
        // echo "<BR>";
        // echo $password;

        if (password_verify($password, $password_hashed)) {
            echo "<h1>Password Valid</h1>";
            // die;

            // membuat session baru
            session_start();

            $_SESSION['username'] = $username;
            $_SESSION['role'] = 'customer';
            $_SESSION['id'] = $id;

            // kembali ke halaman indesx
            header('Location: ../index.php');
            die;
        } else {
            die("<h1>Password Tidak Valid</h1><a href='../login.php'>kembali login</a>");
        }
    } else {
        echo "<h1>Data tidak ditemukan</h1>";
        die;
    }
}

// panggil fungsi
get_customer($username, $password);
