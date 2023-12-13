<?php
$a = "5";
$b = "2.5";
$komentar = "Selamat Datang";

echo ("Nilai variabel a adalah = $a <br>");
echo ("Nilai variabel b adalah $b <br>");
echo ("Nilai variabel komentar adalah $komentar <br>");
$tambah = $a + $b;
$kurang = $a - $b;
$kali = $a * $b;
$bagi = $a / $b;

echo ("Hasil penjumlahan a dan b adalah = $tambah <br>");
echo ("Hasil pengurangan a dan b adalah $kurang <br>");
echo ("Hasil perkalian a dan b adalah = $kali <br>");
echo ("Hasil pembagian a dan b adalah = $bagi <br>");

$nama = "STIKI";
$garis = "===========================";
echo "<p>";
echo $garis . "<br>";
echo $komentar . " Di Lab " . $nama . "<br>Selamat Belajar Pemrograman Web <br>";
echo $garis . "<br>";
