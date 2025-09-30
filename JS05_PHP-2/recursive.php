<?php

function tampilkanAngka (int $jumlah, int $indeks = 1) {
    if($indeks < $jumlah) {
        tampilkanAngka($jumlah, $indeks + 1);
    }
}
tampilkanAngka(20)
?>