<?php
require_once("../../controllers/prodi/prodiController.php");

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
    <title>Insert Prodi</title>
</head>

<body>
    <h1> Insert Prodi</h1>


    <form method="post" action="">
        <label for="nama_prodi">Nama Prodi : </label>
        <input type="text" name="nama_prodi" id="nama_prodi"> <br>

        <label for="jenjang_prodi">jenjang_prodi : </label>
        <input type="text" name="jenjang_prodi" id="jenjang_prodi"><br>

        <button type="submit" name="submit" id="submit">submit</button>
    </form>


</body>

</html>