<?php
require "..\conn.php";
require "..\session.php";

function add_admin()
{
    global $conn;
    $password = password_hash("tokosehat123", PASSWORD_DEFAULT);
    $query = "INSERT INTO `admin`(`username`, `email`, `password`, `foto.jpg`) VALUES ('admin1','admin1@tokosehat.com','$password','admin-default.jpg')";
    $result = mysqli_query($conn, $query);
    return $result;
}
add_admin();
?>
<html>

<head>
    <title>Utility</title>
</head>

<body>
    <h1>Otomatis Menambahkan Admin.</h1>
</body>

</html>