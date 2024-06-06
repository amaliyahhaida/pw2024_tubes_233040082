<?php
require "../koneksi.php";

if (isset($_POST["register"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];


    // Cek ketersediaan username
    $check_query = "SELECT * FROM users WHERE username = '$username'";
    $check_result = mysqli_query($con, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        echo "
            <script>
                alert('Username is already taken. Please choose a different username.');
                document.location.href = 'register.php';
            </script>
        ";
    } else {
        // Hash password menggunakan default bcrypt algorithm
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // query untuk memasukkan data ke tabel user
        $query = "INSERT INTO users (username, first_name, last_name, password, role) VALUES ('$username','$first_name', '$last_name', '$hashed_password','user')";

        // cek apakah data berhasil ditambahkan atau tidak
        if (mysqli_query($con, $query)) {
            echo "
                <script> 
                    alert('Registration successful!');
                    document.location.href = 'login.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Registration failed!');
                    document.location.href = 'register.php';
                </script>
            ";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
    <!-- css -->
    <link rel="stylesheet" href="css/register.css">
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet" />
    <!-- icon -->
    <link rel="shortcut icon" href="../img/logo1.png" type="image/x-icon" />
    <title>Health Care</title>
</head>

<body>
    <div class="global-container">
        <div class="card login-form">
            <div class="card-body">
                <h1 class="card-title text-center">SIGN UP</h1>
            </div>

            <!-- form -->
            <div class="card-text">
                <form action="" method="post">
                    <div class="fullname mb-3 d-flex">
                        <!-- First name -->
                        <div class="first-name">
                            <label for="exampleInputEmail1 first_name" class="form-label">Nama depan</label>
                            <input name="first_name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" />
                        </div>
                        <!-- Last name -->
                        <div class="last-name ms-3">
                            <label for="exampleInputEmail1 last_name" class="form-label justify-items-end">Nama belakang</label>
                            <input name="last_name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" />
                        </div>
                    </div>
                    <div class="username">
                        <label for="exampleInputEmail1 username" class="form-label">Username</label>
                        <input name="username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" />
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1 password" class="form-label text-right">Buat password</label>
                        <input name="password" type="password" class="form-control mb-2" id="exampleInputPassword1" />
                    </div>
                    <div class="text-center p-3">
                        <span class="d-inline">Sudah memiliki akun ? <a href="login.php" class="d-inline text-decoration-none">Masuk</a></span>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" name="register" class="btn btn-primary">Daftar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Java -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="../fontawesome/js/all.min.js"></script>
</body>

</html>