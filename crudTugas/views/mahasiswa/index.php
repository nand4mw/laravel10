<?php
require "../../controllers/mahasiswa/mahasiswaController.php";




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table border="1" cellpadding="20" cellspacing="0">
        <tr>
            <th>NO</th>
            <th>NAMA</th>
            <th>NPM </th>
            <th>TANGGAL LAHIR</th>
            <th>TEMPAT LAHIR</th>
            <th>JENIS KELAMIN</th>
            <th>NO HP</th>
            <th>NAMA PRODI</th>
            <th>NAMA SISTEM KULIAH</th>
            <th>STATUS MAHASISWA</th>
            <th>TOTAL PEMBAYARAN</th>
            <th>ACTION</th>
        </tr>

        <?php $i = 1;
        foreach ($mahasiswa as $mhs) :
        ?>
            <tr>
                <td> <?= $i++ ?> </td>
                <td> <?= $mhs["nama"] ?> </td>
                <td> <?= $mhs["npm"] ?> </td>
                <td> <?= $mhs["tgl_lahir"] ?> </td>
                <td> <?= $mhs["tempat_lahir"] ?> </td>
                <td> <?= $mhs["jenis_kelamin"] ?> </td>
                <td> <?= $mhs["no_hp"] ?> </td>
                <td> <?= $mhs["nama_prodi"] ?> </td>
                <td> <?= $mhs["nama_sistem_kuliah"] ?> </td>
                <td> <?= $mhs["status_mhs"] ?> </td>
                <td>Rp. <?= $mhs["total_pembayaran"] ?> </td>

                <td>
                    <a href="update.php?id=<?= $mhs["id_mahasiswa"] ?> ">Update</a> |
                    <a href="delete.php?id=<?= $mhs["id_mahasiswa"] ?> " onclick="return confirm('Yakin anda Ingin menghapusnya ?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>
</body>

</html>