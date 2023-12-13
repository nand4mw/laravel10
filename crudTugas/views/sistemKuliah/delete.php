 <?php
  require_once("../../controllers/sistemKuliah/sistemKuliahController.php");
  
  $id = $_GET["id"];

  if (delete($id) > 0) {
    echo "
    <script>
        alert('data berhasil dihapus');
        document.location.href = 'index.php';
    </script> 
    ";
  } else {
    echo "
    <script>
        alert('data berhasil dihapus');
        document.location.href = 'index.php';
    </script> 
    ";
  }

  ?> 