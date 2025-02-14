<?php

include('cek.php'); 
include('config.php');
include('fungsi.php');

// menghitung perangkingan
$jmlKriteria 	= getJumlahKriteria();
$jmlAlternatif	= getJumlahAlternatif();
$nilai			= array();

// mendapatkan nilai tiap alternatif
for ($x=0; $x <= ($jmlAlternatif-1); $x++) {
	// inisialisasi
	$nilai[$x] = 0;

	for ($y=0; $y <= ($jmlKriteria-1); $y++) {
		$id_alternatif 	= getAlternatifID($x);
		$id_kriteria	= getKriteriaID($y);

		$pv_alternatif	= getAlternatifPV($id_alternatif,$id_kriteria);
		$pv_kriteria	= getKriteriaPV($id_kriteria);

		$nilai[$x]	 	+= ($pv_alternatif * $pv_kriteria);
	}
}

// update nilai ranking
for ($i=0; $i <= ($jmlAlternatif-1); $i++) { 
	$id_alternatif = getAlternatifID($i);
	$query = "INSERT INTO ranking VALUES ($id_alternatif,$nilai[$i]) ON DUPLICATE KEY UPDATE nilai=$nilai[$i]";
	$result = mysqli_query($koneksi,$query);
	if (!$result) {
		echo "Gagal mengupdate ranking";
		exit();
	}
}

include('header.php');

?>

<section class="content">
	<h2 class="ui header">Hasil Perhitungan</h2>
	<table class="ui celled table" border=1>
		<thead>
		<tr>
			<th>Overall Composite Height</th>
			<th>Priority Vector (rata-rata)</th>
			<?php
			for ($i=0; $i <= (getJumlahAlternatif()-1); $i++) { 
				echo "<th>".getAlternatifNama($i)."</th>\n";
			}
			?>
		</tr>
		</thead>
		<tbody>

		<?php
			for ($x=0; $x <= (getJumlahKriteria()-1) ; $x++) { 
				echo "<tr>";
				echo "<td>".getKriteriaNama($x)."</td>";
				echo "<td>".round(getKriteriaPV(getKriteriaID($x)),5)."</td>";

				for ($y=0; $y <= (getJumlahAlternatif()-1); $y++) { 
					echo "<td>".round(getAlternatifPV(getAlternatifID($y),getKriteriaID($x)),5)."</td>";
				}


				echo "</tr>";
			}
		?>
		</tbody>

		<tfoot>
		<tr>
			<th colspan="2">Total</th>
			<?php
			for ($i=0; $i <= ($jmlAlternatif-1); $i++) { 
				echo "<th>".round($nilai[$i],5)."</th>";
			}
			?>
		</tr>
		</tfoot>

	</table>


	<h2 class="ui header">Perangkingan</h2>
	<button class="ui green button" onclick="printPerankingan()">Print</button>
	<table class="ui celled collapsing table" id="printTable" style="width: 100%; border: 1px solid #ddd; border-collapse: collapse;">
		<thead>
			<tr>
				<th style="width: 10%; text-align: center;">Peringkat</th>
				<th style="width: 70%; text-align: center;">Alternatif</th>
				<th style="width: 20%; text-align: center;">Nilai</th>
				<th style="width: 10%; text-align: center;">Prioritas</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$query  = "SELECT id,nama,id_alternatif,nilai FROM alternatif,ranking WHERE alternatif.id = ranking.id_alternatif ORDER BY nilai DESC";
				$result = mysqli_query($koneksi, $query);

				$i = 0;
				while ($row = mysqli_fetch_array($result)) {
					$i++;
				?>
				<tr>
					<?php if ($i == 1) {
						echo "<td style=\"text-align: center;\"><div class=\"ui ribbon label\">Pertama</div></td>";
					} else {
						echo "<td style=\"text-align: center;\">".$i."</td>";
					}

					?>

					<td style="text-align: center;"><?php echo $row['nama'] ?></td>
					<td style="text-align: center;"><?php echo $row['nilai'] ?></td>
					<td style="text-align: center;"><?php if ($i <= 10) echo "Prioritas ".$i; ?></td>
				</tr>

				<?php	
				}


			?>
		</tbody>
	</table>
	

	<script>
	
	function printPerankingan() {
		var divToPrint = document.getElementById('printTable').outerHTML;
		var kopSurat = `
			<div style="text-align: center; margin-bottom: 20px;">
				<h2 style="margin: 0;">LAPORAN PERANGKINGAN</h2>
				<p style="margin: 5px 0;">Sistem Pendukung Keputusan</p>
				<hr style="border: 1px solid black;">
			</div>
		`;

		var footer = `
			<div style="margin-top: 50px;">
				<p style="text-align: right;">Padang Panjang, ${new Date().toLocaleDateString()}</p>
				<table style="width: 100%; margin-top: 30px;">
					<tr>
						<td style="width: 50%; text-align: center;">Mengetahui,</td>
						<td style="width: 50%; text-align: center;">Dibuat oleh,</td>
					</tr>
					<tr>
						<td style="height: 80px;"></td>
						<td></td>
					</tr>
					<tr>
						<td style="text-align: center;"><b>(_________________)</b></td>
						<td style="text-align: center;"><b>(_________________)</b></td>
					</tr>
				</table>
			</div>
		`;

		var newWin = window.open('');
		newWin.document.write('<html><head><title>Print</title>');
		newWin.document.write('<style>');
		newWin.document.write(`
			body { font-family: Arial, sans-serif; margin: 40px; }
			table { width: 100%; border-collapse: collapse; border: 1px solid black; }
			th, td { padding: 8px; text-align: center; border: 1px solid black; }
			th { background-color: #f2f2f2; }
		`);
		newWin.document.write('</style></head><body>');
		newWin.document.write(kopSurat);
		newWin.document.write(divToPrint);
		newWin.document.write(footer);
		newWin.document.write('</body></html>');
		newWin.print();
		newWin.close();
	}

	</script>
</section>

<?php include('footer.php'); ?>

