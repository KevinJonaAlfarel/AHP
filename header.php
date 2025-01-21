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
            padding: 10px 16px;
            background-color: #666666;
            border-bottom: 1px solid #ccc;
            color: white;
        }
        header h3 {
            font-size: 18px; /* Slightly larger for the header title */
            margin: 0;
        }
        .container {
            display: flex;
            align-items: center; /* Center elements vertically */
        }
        .container img {
            margin-right: 10px; /* Space between image and text */
        }
        .container p {
            margin: 0; 
            color: darkgrey;
            font-size: 14px; /* Standard body text size */
        }
        .container:hover {
            color: white;
        }
        .offcanvas {
            position: absolute;
            top: 0;
            left: -250px;
            width: 250px;
            height: 100%;
            background-color: #666666;
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
            color: gray;
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
</header>

<div id="myOffcanvas" class="offcanvas">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <ul>
        <li>
            <div class="container">
                <img src="assets/logo.png" width="30%" alt="">
                <div>
                    <p>Hallo Admin !</p>
                    <p>Pasia Nan Tigo</p>
                </div>
            </div>
        </li>
        <li><a class="item" href="index.php">Home</a></li>
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
        <li><a class="item" href="hasil.php">Hasil</a></li>
    </ul>
</div>

<div id="main">
    <div class="wrapper">
        <!-- Content goes here -->
    </div>
</div>

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
