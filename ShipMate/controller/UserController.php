<?php
require_once '../config/db.php';
class UserController {
    // function regstrasi user
    public function register($data) {
        global $connect;
        $username = htmlspecialchars($data["username"]);
        $email = htmlspecialchars($data["email"]);
        $password = password_hash(htmlspecialchars($data["password"]), PASSWORD_DEFAULT);
        // upload foto profile
        $fotoProfile = $this->upload_foto_profile($_FILES);

        // jika foto ptofile gagal diupload
        if(!$fotoProfile) {
            return false;
        }

        // register user
        $query = "INSERT INTO users (username,email,password,foto_profile) VALUES ('$username','$email','$password','$fotoProfile')";
        $connect->query($query);

        return $connect->affected_rows;
    }

    // function login user
    public function login($data) {
        global $connect;
        $email = $data["email"];
        $password = $data["password"];
        $query = $connect->query("SELECT * FROM users WHERE email='$email'");
        if($query->num_rows === 1) {
            // cek apakah password yang diinputkan itu benar
            $user = $query->fetch_assoc();
            if(password_verify($password, $user["password"])){
                $_SESSION["login"] = true;
                $_SESSION["id"] = $user["id"];
                $_SESSION["username"] = $user["username"];
                $_SESSION["email"] = $user["email"];
                $_SESSION["foto_profile"] = $user["foto_profile"];
                return $query->num_rows;
        }
        }
    }

    // function upload foto profile
    public function upload_foto_profile($files) {
        $namaFile = $files["foto-profile"]["name"];
        $ukuranFile = $files["foto-profile"]["size"];
        $error = $files["foto-profile"]["error"];
        $tmpName = $files["foto-profile"]["tmp_name"];
    
    
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
    
        move_uploaded_file($tmpName,'../images/foto-profile/'.$namaFileBaru);
    
        return $namaFileBaru;
    }
}
?>