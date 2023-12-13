<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "porthub_db";

$connect = new mysqli($hostname,$username,$password,$dbname);
class PemilikController {
    public function index($start, $limit) {
        global $connect;
        $query = "SELECT * FROM pemilik limit $start, $limit";
        $result = $connect->query($query);
        $dpis = [];

        while($dpi = $result->fetch_assoc() ){
            $dpis[] = $dpi;
        }
        return $dpis;
    }
    

    public function store($data) {
        global $connect;
        $nama_pemilik = htmlspecialchars($data["nama_pemilik"]);
        $alamat = htmlspecialchars($data["alamat"]);
        $no_hp = htmlspecialchars($data["no_hp"]);

        $query = "INSERT INTO pemilik (nama_pemilik,alamat,no_hp) VALUES ('$nama_pemilik','$alamat','$no_hp')";
        $connect->query($query);

        return $connect->affected_rows;
    }

    public function update($data,$id) {
        global $connect;
        $nama_pemilik = htmlspecialchars($data["nama_pemilik"]);
        $alamat = htmlspecialchars($data["alamat"]);
        $no_hp = htmlspecialchars($data["no_hp"]);

        $query = "UPDATE pemilik SET nama_pemilik='$nama_pemilik', alamat='$alamat', no_hp='$no_hp' WHERE id_pemilik='$id'";
        $connect->query($query);

        return $connect->affected_rows;
    }

    public function delete($id) {
        global $connect;
        $query = "DELETE FROM pemilik WHERE id_pemilik='$id'";
        $connect->query($query);

        return $connect->affected_rows;
    }
    
    public function PemilikAll() {
        global $connect;
        $query = "SELECT * FROM pemilik";
        $result = $connect->query($query);
        $dpis = [];
        
        while($dpi = $result->fetch_assoc() ){
            $dpis[] = $dpi;
        }
        return $dpis;
    }
    
    public function find($id) {
        global $connect;
        $query = "SELECT * FROM pemilik WHERE id_pemilik=$id";
        $result = $connect->query($query);

        return $result->fetch_assoc();
    }
}
?>