 <?php
    include_once("../../config/db.php");
    $mahasiswa = mysqli_query($conn, "SELECT * FROM mahasiswa");
    $pembayaran = mysqli_query($conn, "SELECT * FROM pembayaran");

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
        $nama_pembayaran = htmlspecialchars($data["nama_pembayaran"]);
        $nominal_terbayar = htmlspecialchars($data["nominal_terbayar"]);
        $id_mahasiswa = htmlspecialchars($data["id_mahasiswa"]);

        $query = "INSERT INTO pembayaran (nama_pembayaran, nominal_terbayar, id_mahasiswa )
                        VALUES ('$nama_pembayaran', '$nominal_terbayar', '$id_mahasiswa' )
                            ";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    function update($data)
    {
        global $conn;
        $id = $data["id_pembayaran"];
        $nama_pembayaran = htmlspecialchars($data["nama_pembayaran"]);
        $nominal_terbayar = htmlspecialchars($data["nominal_terbayar"]);

        $query = " UPDATE pembayaran SET 
                    nama_pembayaran = '$nama_pembayaran',
                    nominal_terbayar = '$nominal_terbayar'
                    WHERE id_pembayaran = $id
         ";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    function delete($id)
    {
        global $conn;
        mysqli_query($conn, "DELETE FROM pembayaran WHERE id_pembayaran = $id");
        return mysqli_affected_rows($conn);
    }

    ?> 
    