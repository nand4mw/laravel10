<?php
require_once("../../controllers/prodi/prodiController.php");

$id = $_GET['id'];
$prodis = query("SELECT * FROM prodi WHERE id_prodi = $id")[0];

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

        <input type="text" value="<?= $prodis["id_prodi"] ?>" name="id_prodi">

        <label for="nama_prodi">Nama Prodi : </label>
        <input type="text" name="nama_prodi" id="nama_prodi" value=" <?= $prodis["nama_prodi"] ?> " name="nama_prodi"> <br>

        <label for="jenjang_prodi">jenjang_prodi : </label>
        <input type="text" name="jenjang_prodi" id="jenjang_prodi" value=" <?= $prodis["jenjang_prodi"] ?> " name="jenjang_prodi"><br>

        <button type="submit" name="submit" id="submit">submit</button>
    </form>


</body>

</html>