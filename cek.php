<?php
  
    // Periksa apakah pengguna sudah login
    if(!isset($_SESSION['username'])){
        header('location:index.php'); // Redirect ke halaman login jika pengguna belum login
        exit(); // Pastikan untuk menghentikan eksekusi skrip setelah header redirect
    }
