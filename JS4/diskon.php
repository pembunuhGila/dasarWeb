<?php
$harga = 120000;
$diskon = 0;

if ($harga > 100000) {
    $diskon = 0.2 * $harga; 
}

$hargaAkhir = $harga - $diskon;

echo "<br>Harga sebelum diskon: Rp $harga <br>";
echo "Diskon: Rp $diskon <br>";
echo "Harga yang harus dibayar: Rp $hargaAkhir <br>";
?>
