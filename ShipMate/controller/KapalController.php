<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "porthub_db";

$connect = new mysqli($hostname, $username, $password, $dbname);

class KapalController
{
    // function menampilkan data kapal secara keseluruhan
    public function index($start, $limit)
    {
        global $connect;
        $query = "SELECT * FROM kapal JOIN dpi ON kapal.id_dpi = dpi.id_dpi JOIN pemilik ON kapal.id_pemilik = pemilik.id_pemilik JOIN alat_tangkap ON kapal.id_alat_tangkap = alat_tangkap.id_alat_tangkap limit $start,$limit";
        $result = $connect->query($query);
        $kapals = [];
        while ($kapal = $result->fetch_assoc()) {
            $kapals[] = $kapal;
        }

        return $kapals;
    }

    // function create data
    public function store($data)
    {
        global $connect;
        $nama_kapal = htmlspecialchars($data["nama_kapal"]);
        $foto_kapal = $this->upload_foto_kapal();
        if (!$foto_kapal) {
            return false;
        }
        $id_pemilik = htmlspecialchars($data["id_pemilik"]);
        $id_dpi = htmlspecialchars($data["id_dpi"]);
        $id_alat_tangkap = htmlspecialchars($data["id_alat_tangkap"]);

        $query = "INSERT INTO kapal (nama_kapal,id_pemilik,id_dpi,id_alat_tangkap,foto_kapal) VALUES ('$nama_kapal','$id_pemilik','$id_dpi','$id_alat_tangkap','$foto_kapal')";
        $connect->query($query);

        return $connect->affected_rows; // jika query berhasil akan mengembalikan nilai 1, jika gagal maka mengembalikan nilai -1
    }

    // function delete kapal
    public function delete($id, $img)
    {
        global $connect;
        $query = "DELETE FROM kapal WHERE id_kapal=$id";
        unlink("../../images/foto-kapal/{$img}");
        $connect->query($query);

        return $connect->affected_rows; // jika query berhasil akan mengembalikan nilai 1, jika gagal maka mengembalikan nilai -1
    }

    // function update kapal
    public function update($data, $id)
    {
        global $connect;
        $nama_kapal = htmlspecialchars($data["nama_kapal"]);
        $id_pemilik = htmlspecialchars($data["id_pemilik"]);
        $id_dpi = htmlspecialchars($data["id_dpi"]);
        $id_alat_tangkap = htmlspecialchars($data["id_alat_tangkap"]);
        $foto_lama = htmlspecialchars($data["foto_lama"]);
        if ($_FILES["foto_kapal"]["error"] === 4) {
            $foto_kapal = $foto_lama;
        } else {
            $foto_kapal = $this->upload_foto_kapal();
            if (!$foto_kapal) {
                return false;
            } else {
                unlink("../../images/foto-kapal/{$foto_lama}");
            }
        }
        $query = "UPDATE kapal SET nama_kapal='$nama_kapal',id_pemilik='$id_pemilik', id_dpi='$id_dpi', id_alat_tangkap='$id_alat_tangkap', foto_kapal='$foto_kapal' WHERE id_kapal='$id'";
        $connect->query($query);

        return $connect->affected_rows; // jika query berhasil akan mengembalikan nilai 1, jika gagal maka mengembalikan nilai -1
    }

    // function find kapal berdasarkan id
    public function find($id)
    {
        global $connect;
        $query = "SELECT * FROM kapal JOIN dpi ON kapal.id_dpi = dpi.id_dpi JOIN pemilik ON kapal.id_pemilik = pemilik.id_pemilik JOIN alat_tangkap ON kapal.id_alat_tangkap = alat_tangkap.id_alat_tangkap WHERE id_kapal='$id'";
        $result = $connect->query($query);

        return $result->fetch_assoc();
    }

    // function upload foto kapal
    public function upload_foto_kapal()
    {
        $namaFile = $_FILES["foto_kapal"]["name"];
        $ukuranFile = $_FILES["foto_kapal"]["size"];
        $error = $_FILES["foto_kapal"]["error"];
        $tmpName = $_FILES["foto_kapal"]["tmp_name"];


        // cek apakah ada gambar yang diupload 
        if ($error === 4) {
            echo "<script>
            alert('Pilih gambar Terlebih Dahulu');
            </script>";
            return false;
        }

        // cek apakah yang diupload adalah gambar
        $ekstensiGambarValid = array('jpg', 'jpeg', 'png', 'webp');
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            echo "<script>
            alert('Yang anda upload bukan gambar');
            </script>";
            return false;
        }

        // cek jika ukurannya terlalu besar
        if ($ukuranFile > 2000000) {
            echo "<script>
            alert('Ukuran gambar terlalu besar');
            </script>";
            return false;
        }

        // lolos pengecekan, gambar siap diupload

        // generate nama gambar baru
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;

        move_uploaded_file($tmpName, "../../images/foto-kapal/" . $namaFileBaru);

        return $namaFileBaru;
    }

    public function KapalAll()
    {
        global $connect;
        $query = "SELECT * FROM kapal";
        $result = $connect->query($query);
        $kapals = [];

        while ($kapal = $result->fetch_assoc()) {
            $kapals[] = $kapal;
        }
        return $kapals;
    }

    public function DpiAll()
    {
        global $connect;
        $query = "SELECT * FROM dpi";
        $result = $connect->query($query);
        $dpis = [];

        while ($dpi = $result->fetch_assoc()) {
            $dpis[] = $dpi;
        }
        return $dpis;   
    }

    public function AlatTangkapAll()
    {
        global $connect;
        $query = "SELECT * FROM alat_tangkap";
        $result = $connect->query($query);
        $dpis = [];

        while ($dpi = $result->fetch_assoc()) {
            $dpis[] = $dpi;
        }
        return $dpis;
    }

    public function PemilikAll()
    {
        global $connect;
        $query = "SELECT * FROM pemilik";
        $result = $connect->query($query);
        $dpis = [];

        while ($dpi = $result->fetch_assoc()) {
            $dpis[] = $dpi;
        }
        return $dpis;
    }
}
