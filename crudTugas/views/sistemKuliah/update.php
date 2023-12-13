<?php
require_once("../../controllers/sistemKuliah/sistemKuliahController.php");


$id = $_GET['id'];
$klh = query("SELECT * FROM sistem_kuliah WHERE id_sistem_kuliah = $id")[0];

if (isset($_POST["submit"])) {
    if (update($_POST) > 0) {
        echo "
                <script>
                    alert('berhasil di update data');
                    document.location.href = 'index.php';
                </script>
            ";
    } else {
        echo "
            <script>
                alert('gagal update data ');
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
    <title>update Prodi</title>
</head>

<body>
    <h1> update Prodi</h1>

    <form method="post" action="">
        <input type="text" value="<?= $klh["id_sistem_kuliah"] ?> " name="id_sistem_kuliah"><br>
        <label for="nama_sistem_kuliah">Nama Sistem Kuliah : </label>
        <input type="text" name="nama_sistem_kuliah" id="nama_sistem_kuliah" value=" <?= $klh["nama_sistem_kuliah"] ?> "> <br>

        <button type="submit" name="submit" id="submit">submit</button>
    </form>


</body>

</html>