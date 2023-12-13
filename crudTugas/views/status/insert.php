<?php
require_once("../../controllers/status/statusController.php");

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
    <title>Insert Status</title>
</head>

<body>
    <h1> Insert Status</h1>


    <form method="post" action="">
        <label for="status_mhs">Status Mahasiswa : </label>
        <input type="text" name="status_mhs" id="status_mhs"> <br>

        <button type="submit" name="submit" id="submit">submit</button>
    </form>


</body>

</html>