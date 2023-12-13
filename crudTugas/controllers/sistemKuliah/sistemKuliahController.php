<?php
include_once("../../config/db.php");

$sistemKuliah = mysqli_query($conn, "SELECT * FROM sistem_kuliah");

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
    $nama_sistem_kuliah = htmlspecialchars($data["nama_sistem_kuliah"]);



    $query = "INSERT INTO sistem_kuliah (nama_sistem_kuliah )
                        VALUES ('$nama_sistem_kuliah')
                            ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function update($data)
{
    global $conn;
    $id_sistemkuliah = $data["id_sistem_kuliah"];
    $nama_sistem_kuliah = htmlspecialchars($data["nama_sistem_kuliah"]);

    $query = " UPDATE sistem_kuliah SET 
                    nama_sistem_kuliah = '$nama_sistem_kuliah'
                    WHERE id_sistem_kuliah = $id_sistemkuliah";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function delete($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM sistem_kuliah WHERE id_sistem_kuliah = $id");
    return mysqli_affected_rows($conn);
}
