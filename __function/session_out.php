<?php
/// mengakhiri session dan masuk kehalaman login.php
session_start();
unset($_SESSION['username']);
unset($_SESSION['password']);
unset($_SESSION['role']);
unset($_SESSION['id']);
session_destroy();
header("Location: ../login.php");
