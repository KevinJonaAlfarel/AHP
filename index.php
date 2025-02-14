<?php

include 'config.php';

session_start();

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    // Mengambil data akun berdasarkan username
    $result = mysqli_query($koneksi, "SELECT * FROM akun WHERE username = '$username'");

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        // Cek apakah password cocok (pastikan password yang ada di database adalah password asli, tanpa hashing)
        if ($password == $row["password"]) {
            // Set session jika login berhasil
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            $_SESSION["username"] = $row["username"];
            $_SESSION["nama_lengkap"] = $row["nama_lengkap"];
            $_SESSION["level"] = $row["level"]; // Pastikan level ini sesuai

            header("Location: dashboard.php");
            exit;
        } else {
            $error = true;
        }
    } else {
        $error = true;
    }
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .logo img{
            width: 300px;
            height: auto;
        }

        .login-form {
            width: 300px;
            margin: 0 auto;
            margin-top: 20px;
        }

        .container {
            display: flex;
            justify-content: center;
            backdrop-filter: blur(2px);
            background-color: rgba(247, 247, 247, 0.7);
            backdrop-filter: blur(2px);
            background-color: #f7f7f7;
            margin-top: 150px;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 10px 10px 15px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>

<body style="background-color: grey; background-image: url(img/img_sekolah.jpg);">
    <div class="container">
        <div class="row">
            <div class="c">
                <div class="logo">
                    <img src="img/img_logo.png" alt="logo">
                </div>
                <form class="login-form" action="" method="post">
                    <h2 class="text-center">Login</h2>
                    <?php if (isset($error)) : ?>
                        <div class="alert alert-danger mb-4" role="alert">
                            Username / Password salah
                        </div>
                    <?php endif; ?>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Username" required name="username">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password" required name="password">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="login" class="btn btn-primary mb-3 w-100">Login</button>
                    </div>
                    <div class="clearfix">
                        <label class="float-left form-check-label"><input type="checkbox"> Remember me</label>
                        <a href="#" class="float-right">Forgot Password?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

