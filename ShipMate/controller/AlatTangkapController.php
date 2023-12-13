<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "porthub_db";

$connect = new mysqli($hostname,$username,$password,$dbname);
class AlatTangkapController {
    public function index($start, $limit) {
        global $connect;
        $query = "SELECT * FROM alat_tangkap limit $start, $limit";
        $result = $connect->query($query);
        $dpis = [];

        while($dpi = $result->fetch_assoc() ){
            $dpis[] = $dpi;
        }
        return $dpis;
    }
    

    public function store($data) {
        global $connect;
        $nama_alat_tangkap = $data["nama_alat_tangkap"];

        $query = "INSERT INTO alat_tangkap (nama_alat_tangkap) VALUES ('$nama_alat_tangkap')";
        $connect->query($query);

        return $connect->affected_rows;
    }

    public function update($data,$id) {
        global $connect;
        $nama_alat_tangkap = $data["nama_alat_tangkap"];

        $query = "UPDATE alat_tangkap SET nama_alat_tangkap='$nama_alat_tangkap' WHERE id_alat_tangkap='$id'";
        $connect->query($query);

        return $connect->affected_rows;
    }

    public function delete($id) {
        global $connect;
        $query = "DELETE FROM alat_tangkap WHERE id_alat_tangkap='$id'";
        $connect->query($query);

        return $connect->affected_rows;
    }
    
    public function AlatTangkapAll() {
        global $connect;
        $query = "SELECT * FROM alat_tangkap";
        $result = $connect->query($query);
        $dpis = [];
        
        while($dpi = $result->fetch_assoc() ){
            $dpis[] = $dpi;
        }
        return $dpis;
    }
    
    public function find($id) {
        global $connect;
        $query = "SELECT * FROM alat_tangkap WHERE id_alat_tangkap=$id";
        $result = $connect->query($query);

        return $result->fetch_assoc();
    }

}
?>