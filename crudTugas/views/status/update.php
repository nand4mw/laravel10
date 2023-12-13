<?php
require_once("../../controllers/status/statusController.php");

$id = $_GET['id'];
$klh = query("SELECT * FROM status WHERE id_status_mhs = $id")[0];

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
    <title>Insert Status</title>
</head>

<body>
    <h1> Insert Status</h1>


    <form method="post" action="">
        <input type="text" value=" <?= $klh["id_status_mhs"] ?> " name="id_status_mhs"><br>

        <label for="status_mhs">Status Mahasiswa : </label>
        <input type="text" name="status_mhs" id="status_mhs" value=" <?= $klh["status_mhs"] ?> "> <br>

        <button type="submit" name="submit" id="submit">submit</button>
    </form>


</body>

</html>