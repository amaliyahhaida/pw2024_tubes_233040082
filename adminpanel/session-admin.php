<?php 
session_start();
if (!isset($_SESSION["login"]) || $_SESSION["role"] !== "admin") {
    header("location: ../login-register-logout/login.php");
    exit;
}
