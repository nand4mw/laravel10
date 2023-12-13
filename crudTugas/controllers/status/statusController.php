<?php
include_once("../../config/db.php");

$status = mysqli_query($conn, "SELECT * FROM status");

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
    $status = htmlspecialchars($data["status_mhs"]);

    $query = "INSERT INTO status (status_mhs )
                        VALUES ('$status')
                            ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function update($data)
{
    global $conn;
    $id = $data["id_status_mhs"];
    $status = htmlspecialchars($data["status_mhs"]);



    $query = " UPDATE status SET 
                    status_mhs = '$status'
                    WHERE id_status_mhs = $id
         ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function delete($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM status WHERE id_status_mhs = $id");
    return mysqli_affected_rows($conn);
}
