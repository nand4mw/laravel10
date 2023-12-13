<?php
require_once("../../controllers/sistemKuliah/sistemKuliahController.php");



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
            <th>No</th>
            <th>Nama Sistem Kuliah</th>

            <th>Action</th>
        </tr>
        <?php $i = 1;
        foreach ($sistemKuliah as $pmb) : ?>
            <tr>
                <td> <?= $i++; ?> </td>
                <td> <?= $pmb["nama_sistem_kuliah"] ?> </td>
                <td>
                    <a href="update.php?id=<?= $pmb["id_sistem_kuliah"] ?> ">Update</a> |
                    <a href="delete.php?id=<?= $pmb["id_sistem_kuliah"] ?> " onclick="return confirm('Yakin anda Ingin menghapusnya ?')">Delete</a>
                </td>
            </tr>


        <?php endforeach; ?>
    </table>
</body>

</html>