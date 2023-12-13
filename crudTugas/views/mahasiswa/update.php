<?php
require_once("../../controllers/mahasiswa/mahasiswaController.php");

$id = $_GET['id'];
$mhs = query("SELECT * FROM mahasiswa WHERE id_mahasiswa = $id")[0];

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
    <title>update mahasiswa</title>
</head>

<body>
    <h1>update mahasiswa</h1>


    <form method="post" action="">
        <input type="text" name="id_mahasiswa" value=" <?= $mhs["id_mahasiswa"] ?> ">

        <label for="nama">nama : </label>
        <input type="text" name="nama" id="nama" value=" <?= $mhs["nama"] ?> "> <br>

        <label for="npm">npm : </label>
        <input type="text" name="npm" id="npm" value=" <?= $mhs["npm"] ?> "><br>

        <label for="tgl_lahir"> tanggal lahir : </label>
        <input type="date" name="tgl_lahir" id="tgl_lahir" value=" <?= $mhs["tgl_lahir"] ?> "><br>

        <label for="tempat_lahir">Tempat Lahir : </label>
        <input type="text" name="tempat_lahir" id="tempat_lahir" value=" <?= $mhs["tempat_lahir"] ?> "><br>

        <label for="jenis_kelamin">Jenis Kelamin: </label>
        <input type="radio" name="jenis_kelamin" value="laki-laki" id="jenis_kelamin_laki" value=" <?= $mhs["jenis_kelamin"] ?> "> Laki-laki
        <input type="radio" name="jenis_kelamin" value="perempuan" id="jenis_kelamin_perempuan" value=" <?= $mhs["jenis_kelamin"] ?> "> Perempuan
        <br>

        <select name="id_prodi" id="">
            <option value="" selected>Pilih Prodi</option>
            <?php foreach ($prodi as $prd) : ?>
                <option value="<?= $prd["id_prodi"] ?> "><?= $prd["nama_prodi"] ?> </option>
            <?php endforeach; ?>
        </select><br>
        <select name="id_sistem_kuliah" id="">
            <option value="" selected>Pilih Sistem Kuliah</option>
            <?php foreach ($sistemKuliah as $stk) : ?>
                <option value="<?= $stk["id_sistem_kuliah"] ?> "><?= $stk["nama_sistem_kuliah"] ?> </option>
            <?php endforeach; ?>
        </select><br>
        <select name="id_status_mhs" id="">
            <option value="" selected>Status Mahasiswa</option>
            <?php foreach ($status as $sts) : ?>
                <option value="<?= $sts["id_status_mhs"] ?> "><?= $sts["status_mhs"] ?> </option>
            <?php endforeach; ?>
        </select><br>
        <label for="no_hp">no hp : </label>
        <input type="text" name="no_hp" id="no_hp" value=" <?= $mhs["no_hp"] ?> "><br>
        <button type="submit" name="submit" id="submit">submit</button>
    </form>


</body>

</html>