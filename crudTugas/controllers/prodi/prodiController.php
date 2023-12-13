 <?php
    include_once("../../config/db.php");

    $prodi = mysqli_query($conn, "SELECT * FROM prodi");

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
        $nama_prodi = htmlspecialchars($data["nama_prodi"]);
        $jenjang_prodi = htmlspecialchars($data["jenjang_prodi"]);


        $query = "INSERT INTO prodi (nama_prodi, jenjang_prodi )
                        VALUES ('$nama_prodi', '$jenjang_prodi')
                            ";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    function update($data)
    {
        global $conn;
        $id = $data["id_prodi"];
        $nama_prodi = htmlspecialchars($data["nama_prodi"]);
        $jenjang_prodi = htmlspecialchars($data["jenjang_prodi"]);


        $query = " UPDATE prodi SET 
                    nama_prodi = '$nama_prodi',
                    jenjang_prodi = '$jenjang_prodi'
                    WHERE id_prodi = $id
         ";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    function delete($id)
    {
        global $conn;
        mysqli_query($conn, "DELETE FROM prodi WHERE id_prodi = $id");
        return mysqli_affected_rows($conn);
    }

    ?> 
    