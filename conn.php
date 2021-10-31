<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$db       = 'pssk_test';

$conn = mysqli_connect($hostname, $username, $password, $db);

// check connection 
if (!$conn) {
    die("<h4>alert('Gagal tersambung dengan database.')</h4>");
}
