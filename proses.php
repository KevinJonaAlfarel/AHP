<?php 
include('config.php');
include('fungsi.php');

if (isset($_POST['submit'])) {
    $jenis = $_POST['jenis'];

    // jumlah kriteria
    if ($jenis == 'kriteria') {
        $n = getJumlahKriteria();
    } else {
        $n = getJumlahAlternatif();
    }

    // memetakan nilai ke dalam bentuk matrik
    // x = baris
    // y = kolom
    $matrik = array();

    for ($x = 0; $x < $n; $x++) {
        for ($y = 0; $y < $n; $y++) {
            if ($x == $y) {
                $matrik[$x][$y] = 1;
            } elseif ($x < $y) {
                $bobot = "bobot" . $x . "_" . $y;
                $matrik[$x][$y] = $_POST[$bobot];
                $matrik[$y][$x] = 1 / $_POST[$bobot];

                if ($jenis == 'kriteria') {
                    inputDataPerbandinganKriteria($x, $y, $matrik[$x][$y]);
                    inputDataPerbandinganKriteria($y, $x, $matrik[$y][$x]);
                } else {
                    inputDataPerbandinganAlternatif($x, $y, ($jenis - 1), $matrik[$x][$y]);
                    inputDataPerbandinganAlternatif($y, $x, ($jenis - 1), $matrik[$y][$x]);
                }
            }
        }
    }

    // inisialisasi jumlah tiap kolom dan baris kriteria
    $jmlmpb = array();
    $jmlmnk = array();
    for ($i = 0; $i < $n; $i++) {
        $jmlmpb[$i] = 0;
        $jmlmnk[$i] = 0;
    }

    // menghitung jumlah pada kolom kriteria tabel perbandingan berpasangan
    for ($x = 0; $x < $n; $x++) {
        for ($y = 0; $y < $n; $y++) {
            $value = $matrik[$x][$y];
            $jmlmpb[$y] += $value;
        }
    }

    // menghitung jumlah pada baris kriteria tabel nilai kriteria
    // matrikb merupakan matrik yang telah dinormalisasi
    for ($x = 0; $x < $n; $x++) {
        for ($y = 0; $y < $n; $y++) {
            $matrikb[$x][$y] = $matrik[$x][$y] / $jmlmpb[$y];
            $value = $matrikb[$x][$y];
            $jmlmnk[$x] += $value;
        }

        // nilai priority vektor
        $pv[$x] = $jmlmnk[$x] / $n;

        // memasukkan nilai priority vektor ke dalam tabel pv_kriteria dan pv_alternatif
        if ($jenis == 'kriteria') {
            $id_kriteria = getKriteriaID($x);
            inputKriteriaPV($id_kriteria, $pv[$x]);
        } else {
            $id_kriteria = getKriteriaID($jenis - 1);
            $id_alternatif = getAlternatifID($x);
            inputAlternatifPV($id_alternatif, $id_kriteria, $pv[$x]);
        }
    }

    // cek konsistensi
    $eigenvektor = getEigenVector($jmlmpb, $jmlmnk, $n);
    $consIndex = getConsIndex($jmlmpb, $jmlmnk, $n);
    $consRatio = getConsRatio($jmlmpb, $jmlmnk, $n);

    if ($jenis == 'kriteria') {
        include('output.php');
    } else {
        include('bobot_hasil.php');
    }
}
