<?php
require_once("../../controllers/pembayaran/pembayaranController.php");
// require_once("../../controllers/mahasiswa/mahasiswaController.php");

if (isset($_POST["submit"])) {

    if (create($_POST) > 0) {
        echo "
                <script>
                    alert('berhasil di tambahkan');
                    document.location.href = 'index.php';
                </script>
            ";
    } else {
        echo "
            <script>
                alert('gagal di tambahkan');
                document.location.href = 'index.php';
            </script>
        ";
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>halaman mahasiswa</title>
</head>

<body>
    <h1> mahasiswa</h1>


    <form method="post" action="">
        <label for="nama_pembayaran">Nama Pembayaran : </label>
        <input type="text" name="nama_pembayaran" id="nama_pembayaran"> <br>

        <label for="nominal_terbayar">Nominal Terbayar : </label>
        <input type="text" name="nominal_terbayar" id="nominal_terbayar"><br>

        <select name="id_mahasiswa" id="">
            <option value="" selected> Pilih Nama </option>
            <?php foreach ($mahasiswa as $pmb) : ?>
                <option value="<?= $pmb["id_mahasiswa"] ?>"> <?= $pmb["nama"] ?> </option>
            <?php endforeach; ?>
        </select>

        <button type="submit" name="submit" id="submit">submit</button>
    </form>


</body>

</html>