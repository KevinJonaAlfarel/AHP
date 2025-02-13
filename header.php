
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sistem Pendukung Keputusan metode AHP</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px; /* Set a standard base font size */
        }
        header {
            text-align: start;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px 16px;
            background: linear-gradient(to right, #118b50, blue);
            border-bottom: 1px solid #ccc;
            color: white;
        }
        header h3 {
            font-size: 18px; /* Slightly larger for the header title */
            margin: 0;
        }
        /*.container {
            display: flex;
            align-items: center; 
        }
        .container img {
            margin-right: 10px; 
         .container p {
            margin: 0; 
            color: darkgrey;
            font-size: 14px;    Standard body text size 
        }
        .container:hover {
            color: none;
        }*/
        .offcanvas {
            position: absolute;
            top: 0;
            left: -250px;
            width: 250px;
            height: 100%;
            background: linear-gradient(to bottom, #118b50, blue);
            overflow-x: hidden;
            transition: 0.3s;
            padding-top: 60px;
            font-size: 14px; /* Slightly larger for offcanvas menu items */
            z-index: 1000; /* Ensure the offcanvas menu is on top */
        }
        .offcanvas a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 15px; /* Font size for links */
            color: #fff;
            display: block;
            transition: 0.3s;
        }
        .offcanvas a:hover {
            color: black;
            background: #ffffff;
            padding-right: 20px
        }
        .offcanvas .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 30px; /* Size for close button */
            margin-left: 50px;
        }
        #main {
            transition: margin-left 0.3s;
            padding: 16px;
        }
    </style>
</head>

<body>
<header>
    <span style="font-size:25px;cursor:pointer" onclick="openNav()">&#9776; Menu</span>
    <h3>Sistem Pendukung Keputusan dengan metode AHP</h3>
    <img src="img/img_logo.png" alt="logo" style = "width: 50px; margin-top: -10px; margin-bottom: -10px;">
</header>

<div id="myOffcanvas" class="offcanvas">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <ul>
        <div class="container">
            <div class="header_dash" style="text-align: center;">
                <img src="img/img_logo.png" alt="logo" style = "width: 100px;">
                <h4 style="color: white;">Hallo, <?php echo $_SESSION["nama_lengkap"]; ?> !</h4>
            </div>
        </div>
    <li style="margin-bottom: 2.5em;color: white;">
        </li>
        <li><a class="item" href="dashboard.php">Home</a></li>
        <?php if ($_SESSION['level'] == 'Admin') : ?>
        <li>
            <a class="item" href="kriteria.php">Kriteria
                <div class="ui blue tiny label" style="float: right;"><?php echo getJumlahKriteria(); ?></div>
            </a>
        </li>
        <li>
            <a class="item" href="alternatif.php">Alternatif
                <div class="ui blue tiny label" style="float: right;"><?php echo getJumlahAlternatif(); ?></div>
            </a>
        </li>
        <li><a class="item" href="bobot_kriteria.php">Perbandingan Kriteria</a></li>
        <li><a class="item" href="bobot.php?c=1">Perbandingan Alternatif</a></li>
        <ul>
            <?php
                if (getJumlahKriteria() > 0) {
                    for ($i=0; $i <= (getJumlahKriteria()-1); $i++) { 
                        echo "<li><a class='item' href='bobot.php?c=".($i+1)."'>".getKriteriaNama($i)."</a></li>";
                    }
                }
            ?>
        </ul>
        <?php endif; ?>
        <li><a class="item" href="hasil.php">Hasil</a></li>
        <li><a class="item" href="index.php">Logout</a></li>
    </ul>
</div>

<div id="main">
    <div class="wrapper">
        <!-- Content goes here -->


<script>
    function openNav() {
        document.getElementById("myOffcanvas").style.left = "0";
        document.getElementById("main").style.marginLeft = "250px";
    }

    function closeNav() {
        document.getElementById("myOffcanvas").style.left = "-250px";
        document.getElementById("main").style.marginLeft = "0";
    }
</script>
</body>
</html>
