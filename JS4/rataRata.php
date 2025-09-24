<?php
$nilai = [85, 92, 78, 64, 90, 75, 88, 79, 70, 96];

sort($nilai);

$nilaiTerpakai = array_slice($nilai, 2, -2);

$total = array_sum($nilaiTerpakai);
$rataRata = $total / count($nilaiTerpakai);

echo "<br>Nilai terpakai: " . implode(", ", $nilaiTerpakai) . "<br>";
echo "Total nilai: $total <br>";
echo "Rata-rata: $rataRata";
?>
