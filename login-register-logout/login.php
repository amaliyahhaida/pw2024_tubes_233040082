<?php
session_start();
require "../koneksi.php";

if (isset($_POST['loginbtn'])) {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    $query = mysqli_query($con, "SELECT * FROM users WHERE username='$username'");
    $countdata = mysqli_num_rows($query);
    $data = mysqli_fetch_array($query);

    if ($countdata > 0) {
        if (password_verify($password, $data['password'])) {
            $_SESSION['username'] = $data['username'];
            $_SESSION['login'] = true;
            $_SESSION['role'] = $data['role'];

            // Cek peran (role) pengguna
            if ($_SESSION['role'] == 'admin') {
                header('location: ../adminpanel/index.php');
                exit;
            } else {
                header('location: ../index.php');
                exit;
            }
        } else {
?>
            <div class="alert alert-warning" role="alert">
                Password salah
            </div>
        <?php
        }
    } else {
        ?>
        <div class="alert alert-warning" role="alert">
            Akun tidak tersedia
        </div>
<?php
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
    <!-- css -->
    <link rel="stylesheet" href="css/login.css">
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet" />
    <!-- icon -->
    <link rel="shortcut icon" href="../img/logo1.png" type="image/x-icon" />
    <title>Login</title>
</head>


<body>
    <div class="global-container">
        <div class="card login-form shadows">
            <div class="card-body">
                <img src="img/logo2.png" class="bg" />
                <h1 class="card-title text-center">L O G I N</h1>
            </div>
            <form action="" method="post">
                <div>
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username">
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <div>
                    <button class="btn btn-success form-control mt-3" type="submit" name="loginbtn">Login</button>
                </div>
                <div class="text-center p-3">
                    <span class="d-inline">Belum memiliki akun ? <a href="register.php" class="d-inline text-decoration-none">Daftar</a></span>
                </div>
            </form>
        </div>

    </div>
    <!-- Java -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="../fontawesome/js/all.min.js"></script>
</body>

</html>