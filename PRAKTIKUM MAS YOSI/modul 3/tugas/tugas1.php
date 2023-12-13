<?php
$saldoAwal = 2000000;
$bunga = 0.03;
$bulan = 11;
$saldoAkhir = $saldoAwal * (1 + $bunga) * $bulan;

echo "Saldo akhir setelah " . $bulan . " bulan adalah : Rp." . $saldoAkhir . ",-";
