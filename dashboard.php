<?php
session_start();
if($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HEALTHCARE</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <!-- header -->
<header>
    <div class="container">
        <h1><a href="dashboard.php" class="text-danger">HealtCare</a></h1>
        <ul>
            <li><a href="dashboard.php" class="text-primary">Dashboard</a></li>
            <li><a href="profil.php" class="text-success">Profil</a></li>
            <li><a href="data-kategori.php" class="text-warning">Data Kategori</a></li>
            <li><a href="data-produk.php" class="text-info">Data Produk</a></li>
            <li><a href="keluar.php" class="text-danger">Keluar</a></li>
        </ul>
    </div>
</header>

    <!--content-->
    <div class="section">
        <div class="container">
            <h3>Dasbhoard</h3>
            <div class="box">
            <h4 style="color:green; font-weight:bold;">Selamat Datang <?php echo $_SESSION['a_global']-> admin_name?> di Toko Apotek </h4>
            </div>
        </div>
    </div>

    <!--footer-->
    <footer>
        <div class="container">
            <small>Copyright &copy; 2024 - HealthCare.</small>
        </div>
    </footer>
</body>
</html>