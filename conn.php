<?php
/// inisialisasi hostname untuk konfigurasi database
$hostname = 'localhost';
/// inisialisasi username untuk konfigurasi database
$username = 'root';
/// inisialisasi password untuk konfigurasi database
$password = '';
/// inisialisasi nama database untuk konfigurasi database
$db       = 'pssk_test';

/// melakukan koneksi ke database
$conn = mysqli_connect($hostname, $username, $password, $db);

// check connection 
if (!$conn) {
    die("<h4>alert('Gagal tersambung dengan database.')</h4>");
}
