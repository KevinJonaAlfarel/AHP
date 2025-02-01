<?php 
	
    session_start();
    if(!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
        echo "<script>
                alert('Please login first');
                document.location.href = 'index.php';
            </script>";
        exit;
    } 
    

