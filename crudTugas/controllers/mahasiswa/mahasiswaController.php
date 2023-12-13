 <?php
    include_once("../../config/db.php");

    $prodi = mysqli_query($conn, "SELECT * FROM prodi");
    $status = mysqli_query($conn, "SELECT * FROM status");
    $sistemKuliah = mysqli_query($conn, "SELECT * FROM sistem_kuliah");
    $mahasiswa = mysqli_query($conn, "SELECT 
    mahasiswa.id_mahasiswa,
    mahasiswa.nama,
    mahasiswa.npm,
    mahasiswa.tgl_lahir,
    mahasiswa.tempat_lahir,
    mahasiswa.jenis_kelamin,
    mahasiswa.no_hp,
    prodi.nama_prodi,
    sistem_kuliah.nama_sistem_kuliah,
    status.status_mhs, (SELECT SUM(pembayaran.nominal_terbayar) FROM pembayaran WHERE mahasiswa.id_mahasiswa = pembayaran.id_mahasiswa) AS total_pembayaran
    FROM
    mahasiswa INNER JOIN prodi ON mahasiswa.id_prodi = prodi.id_prodi
    INNER JOIN sistem_kuliah ON mahasiswa.id_sistem_kuliah = sistem_kuliah.id_sistem_kuliah
    INNER JOIN status ON mahasiswa.id_status_mhs = status.id_status_mhs;
    ");

    function query($query)
    {
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }

        return $rows;
    }

    function create($data)
    {
        global $conn;
        $nama = htmlspecialchars($data["nama"]);
        $npm = htmlspecialchars($data["npm"]);
        $tgl_lahir = htmlspecialchars($data["tgl_lahir"]);
        $tempat_lahir = htmlspecialchars($data["tempat_lahir"]);
        $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
        $no_hp = htmlspecialchars($data["no_hp"]);
        $id_prodi = htmlspecialchars($data["id_prodi"]);
        $id_sistem_kuliah = htmlspecialchars($data["id_sistem_kuliah"]);
        $id_status_mhs = htmlspecialchars($data["id_status_mhs"]);


        $query = "INSERT INTO mahasiswa (nama, npm, tgl_lahir, tempat_lahir, jenis_kelamin, no_hp, id_prodi, id_sistem_kuliah, id_status_mhs)
                  VALUES 
    ('$nama', '$npm', '$tgl_lahir', '$tempat_lahir', '$jenis_kelamin', '$no_hp', '$id_prodi', '$id_sistem_kuliah', '$id_status_mhs')";

        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }


    function update($data)
    {
        global $conn;
        $id = $data["id_mahasiswa"];
        $nama = htmlspecialchars($data["nama"]);
        $npm = htmlspecialchars($data["npm"]);
        $tgl_lahir = htmlspecialchars($data["tgl_lahir"]);
        $tempat_lahir = htmlspecialchars($data["tempat_lahir"]);
        $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
        $no_hp = htmlspecialchars($data["no_hp"]);

        $query = " UPDATE mahasiswa SET 
                    nama = '$nama',
                    npm = '$npm',
                    tgl_lahir = '$tgl_lahir',
                    tempat_lahir = '$tempat_lahir',
                    jenis_kelamin = '$jenis_kelamin',
                    no_hp = '$no_hp'
                    WHERE id_mahasiswa = $id
         ";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    function delete($id)
    {
        global $conn;
        mysqli_query($conn, "DELETE FROM mahasiswa WHERE id_mahasiswa = $id");
        return mysqli_affected_rows($conn);
    }

    ?> 
    