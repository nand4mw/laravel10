<?php
require_once("../../controllers/mahasiswa/mahasiswaController.php");

if (isset($_POST["submit"])) {
    // var_dump($_POST);
    // die();
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
        <label for="nama">nama : </label>
        <input type="text" name="nama" id="nama"> <br>

        <label for="npm">npm : </label>
        <input type="text" name="npm" id="npm"><br>

        <label for="tgl_lahir"> tanggal lahir : </label>
        <input type="date" name="tgl_lahir" id="tgl_lahir"><br>

        <label for="tempat_lahir">Tempat Lahir : </label>
        <input type="text" name="tempat_lahir" id="tempat_lahir"><br>

        <label for="jenis_kelamin">Jenis Kelamin: </label>
        <input type="radio" name="jenis_kelamin" value="laki-laki" id="jenis_kelamin_laki"> Laki-laki
        <input type="radio" name="jenis_kelamin" value="perempuan" id="jenis_kelamin_perempuan"> Perempuan
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
        <input type="text" name="no_hp" id="no_hp"><br>


        <button type="submit" name="submit" id="submit">submit</button>
    </form>


</body>

</html>