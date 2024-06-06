<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("location: login-register-logout/login.php");
    exit;
}
