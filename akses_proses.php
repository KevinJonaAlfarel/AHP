<?php

include('config.php');
include('fungsi.php');

if (isset($_GET['jenis'])) {
    $jenis = $_GET['jenis'];

    // Tentukan jumlah baris dan kolom matriks
    if ($jenis == 'kriteria') {
        $n = getJumlahKriteria();
    } else {
        $n = getJumlahAlternatif();
    }

    // Inisialisasi matriks perbandingan berpasangan
    $matrik = array();

    for ($x = 0; $x < $n; $x++) {
        for ($y = 0; $y < $n; $y++) {
            if ($x == $y) {
                $matrik[$x][$y] = 1;
            } elseif ($x < $y) {
                $matrik[$x][$y] = rand(1, 9); // Simulasi bobot (seharusnya berasal dari input)
                $matrik[$y][$x] = 1 / $matrik[$x][$y];
            }
        }
    }

    // Menghitung jumlah tiap kolom
    $jmlmpb = array_fill(0, $n, 0);
    for ($x = 0; $x < $n; $x++) {
        for ($y = 0; $y < $n; $y++) {
            $jmlmpb[$y] += $matrik[$x][$y];
        }
    }

    // Normalisasi matriks
    $matrikb = array();
    $jmlmnk = array_fill(0, $n, 0);
    for ($x = 0; $x < $n; $x++) {
        for ($y = 0; $y < $n; $y++) {
            $matrikb[$x][$y] = $matrik[$x][$y] / $jmlmpb[$y];
            $jmlmnk[$x] += $matrikb[$x][$y];
        }
    }

    // Hitung Priority Vector
    $pv = array();
    for ($x = 0; $x < $n; $x++) {
        $pv[$x] = $jmlmnk[$x] / $n;
    }

    if ($jenis == 'kriteria') {
        include('output.php');
    } else {
        include('bobot_hasil.php');
    }
}

