<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "porthub_db";

$connect = new mysqli($hostname,$username,$password,$dbname);
class DpiController {
    public function index($start, $limit) {
        global $connect;
        $query = "SELECT * FROM dpi limit $start, $limit";
        $result = $connect->query($query);
        $dpis = [];

        while($dpi = $result->fetch_assoc() ){
            $dpis[] = $dpi;
        }
        return $dpis;
    }
    

    public function store($data) {
        global $connect;
        $nama_dpi = $data["nama_dpi"];
        $luas_dpi = $data["luas_dpi"];

        $query = "INSERT INTO dpi (nama_dpi,luas) VALUES ('$nama_dpi','$luas_dpi')";
        $connect->query($query);

        return $connect->affected_rows;
    }

    public function update($data,$id) {
        global $connect;
        $nama_dpi = $data["nama_dpi"];
        $luas_dpi = $data["luas_dpi"];

        $query = "UPDATE dpi SET nama_dpi='$nama_dpi', luas='$luas_dpi' WHERE id_dpi='$id'";
        $connect->query($query);

        return $connect->affected_rows;
    }

    public function delete($id) {
        global $connect;
        $query = "DELETE FROM dpi WHERE id_dpi='$id'";
        $connect->query($query);

        return $connect->affected_rows;
    }
    
    public function DpiAll() {
        global $connect;
        $query = "SELECT * FROM dpi";
        $result = $connect->query($query);
        $dpis = [];
        
        while($dpi = $result->fetch_assoc() ){
            $dpis[] = $dpi;
        }
        return $dpis;
    }
    
    public function find($id) {
        global $connect;
        $query = "SELECT * FROM dpi WHERE id_dpi=$id";
        $result = $connect->query($query);

        return $result->fetch_assoc();
    }
}
?>