<?php
$a = 10;
$b = 5;

$hasilTambah = $a + $b;
$hasilKurang = $a - $b;
$hasilKali = $a * $b;
$hasilBagi = $a / $b;
$sisaBagi = $a % $b;
$pangkat = $a ** $b;

$hasilSama = $a == $b; 
$hasilTidakSama = $a != $b;
$hasilLebihKecil = $a < $b;
$hasilLebihBesar = $a > $b;
$hasilLebihKecilSama = $a <= $b;
$hasilLebihBesarSama = $a >= $b;

echo "Hasil penjumlahan $a + $b = $hasilTambah <br>";
echo "Hasil pengurangan $a - $b = $hasilKurang <br>";
echo "Hasil perkalian $a * $b = $hasilKali <br>";
echo "Hasil pembagian $a / $b = $hasilBagi <br>";
echo "Sisa hasil bagi $a % $b = $sisaBagi <br>";
echo "$a pangkat $b = $pangkat <br>";

echo "<br>";

echo "Hasil sama $a == $b = $hasilSama <br>";
echo "Hasil tidak sama $a != $b = $hasilTidakSama <br>";
echo "Hasil lebih kecil $a < $b = $hasilLebihKecil <br>";
echo "Hasil lebih besar $a > $b = $hasilLebihBesar <br>";
echo "Hasil lebih kecil sama $a <= $b = $hasilLebihKecilSama <br>";
echo "Hasil lebih besar sama $a >= $b = $hasilLebihBesarSama <br>";