<?php
include "config.php";

if(isset($_GET['aksi'])){
  if($_GET['aksi'] == 'masuk'){ // Perbaikan operator pembanding
    $username = $_POST['username'];
    $password = $_POST['password']; // Perbaikan penulisan variabel

    // Perhatikan penambahan tanda kutip pada variabel string dalam query SQL
    $data = mysqli_query($koneksi, "SELECT * FROM akun WHERE username='$username' AND password='$password'");
    $row = mysqli_num_rows($data);

    if($row > 0 ){
      $a = mysqli_fetch_array($data);
      if($a['level'] == 'Admin' or $a['level'] == 'admin'){ // Perbaikan pengejaan dan tanda kutip pada level
        $_SESSION['username'] = $username;
        header("location: dashboard-admin.php");
        exit(); // Pastikan untuk menghentikan eksekusi setelah header redirect
      }else if($a['level'] == 'KepalaSekolah' or $a['level'] == 'kepala sekolah'){ // Perbaikan pengejaan dan tanda kutip pada level
        $_SESSION['username'] = $username;
        header("location: dashboard.php");
        exit(); // Pastikan untuk menghentikan eksekusi setelah header redirect
      }
    }else{
      header("location: index.php?pesan=gagal");
      exit(); // Pastikan untuk menghentikan eksekusi setelah header redirect
    }
  }
}
?>

<?php
if(isset($_GET['pesan'])){
  if($_GET['pesan'] == 'gagal'){ // Perbaikan pemeriksaan $_GET
    echo "<div class='alert alert-danger' role='alert'>Login Gagal</div>";
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <style>
    .login-form {
      width: 300px;
      margin: 0 auto;
      margin-top: 20px;
      margin-bottom: 20px;
    }
    .container {
      background-color: #f7f7f7;
      margin-top: 200px;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 10px 10px 15px rgba(0, 0, 0, 0.3);
    }
  </style>
</head>
<body style = "background-color: grey">
  
  <div class="container" >
    <div class="row">
      <div class="col-md-6 col-sm-12 offset-md-3">
        <form class="login-form" action="index.php?aksi=masuk" method="post">
          <h2 class="text-center">Login</h2>  
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Username" required="required" name="username">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" required="required" name="password">
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block" style="background: linear-gradient(90deg, #118b50, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);">Log in</button>
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
