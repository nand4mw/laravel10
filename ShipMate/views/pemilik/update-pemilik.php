<?php 
session_start();
if(!isset($_SESSION["login"])) {
  header("Location:../login.php");
}
include '../../controller/PemilikController.php';
$PemilikController = new PemilikController;
$id = $_GET["id"];
$findPemilik = $PemilikController->find($id);
$success = false;
$failed = false;
if(isset($_POST["submit"])) {
    $result = $PemilikController->update($_POST,$id);

    if($result > 0){
        $success = true;
    } else {
        $failed = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Pemilik</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css"  rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../../dist/output.css">
</head>
<body class="w-full overflow-x-hidden">
<!-- navbar -->
    <nav class="bg-teal-600 border-gray-200 px-2 h-20 flex items-center fixed w-full z-50">
    <div class="container flex flex-wrap items-center justify-between mx-auto">
        <p class="flex items-center gap-3">
            <img src="../../images/icon.png" class="w-10" alt="Flowbite Logo" />
            <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">ShipMate</span>
        </p>
        <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
        <ul class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-teal-600">
            <li>
            <a href="../home.php" class="block py-2 pl-3 pr-4 text-gray-100 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0">Home</a>
            </li>
            <li>
            <a href="../kapal/kapal.php" class="block py-2 pl-3 pr-4 text-gray-100 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0">Kapal</a>
            </li>
            <li>
            <a href="../dpi/dpi.php" class="block py-2 pl-3 pr-4 text-gray-100 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0">Dpi</a>
            </li>
            <li>
            <a href="pemilik.php" class="block py-2 pl-3 pr-4 text-gray-100 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0">Pemilik</a>
            </li>
            <li>
            <a href="../alat-tangkap/alat-tangkap.php" class="block py-2 pl-3 pr-4 text-gray-100 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0">Alat Tangkap</a>
            </li>
            <li>
            <a href="../logout.php" class="block py-2 pl-3 pr-4 text-gray-100 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0">Logout</a>
            </li>
            <li>
            <button id="theme-toggle" type="button" class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
                <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
            </button>
            </li>
        </ul>
        </div>
    </div>
    </nav>
  <!-- navbar -->

  <?php if($success) : ?>
    <!-- Notifikasi Registrasi Berhasil -->
    <div class="w-full h-screen top-0 fixed flex justify-center items-center bg-gray-700 bg-opacity-50 backdrop-blur-md z-50">
    <div class="relative w-1/3">
        <!-- Modal content -->
        <div class="bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                    Congratulations !
                </h3>
                <a href="pemilik.php" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="small-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </a>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    Pemilik Sudah Berhasil Di Update
                </p>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                <a href="pemilik.php" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Alhamdulillah</a>
            </div>
        </div>
        </div>
    </div>
    <!-- Notifikasi Registrasi Berhasil -->
    <?php elseif($failed) : ?>
    <!-- Notifikasi Registrasi Gagal -->
    <!-- Notifikasi Registrasi Berhasil -->
    <div class="w-full h-screen top-0 fixed flex justify-center items-center bg-gray-700 bg-opacity-50 backdrop-blur-md z-50">
    <div class="relative w-1/3">
        <!-- Modal content -->
        <div class="bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                    Danger !
                </h3>
                <a href="pemilik.php" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="small-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </a>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    Terjadi kesalahan pada proses update Pemilik
                </p>

            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                <a href="pemilik.php" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Subhanallah</a>
            </div>
        </div>
        </div>
    </div>
    <!-- Notifikasi Registrasi Gagal -->
    <?php endif ?>

  <div class="w-full py-20">
  <!-- section -->
  <section class="w-full flex justify-center items-center py-32">
  <img src="../../images/illustrations-12.svg" alt="" class="absolute -z-10 w-2/5 left-32 bottom-0">
    <div class="w-1/3 flex flex-col gap-10 items-center">
        <p class="text-4xl font-bold text-gray-500">Update Pemilik</p>
        <form action="" method="post" class="w-full flex flex-col items-center gap-6 shadow-lg p-6 border-2 bg-gray-50">
        <div class="relative w-full">
            <input type="text" id="nama_pemilik" class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-teal-500 focus:outline-none focus:ring-0 focus:border-teal-600 peer" placeholder=" " name="nama_pemilik" autocomplete="off" value="<?= $findPemilik["nama_pemilik"] ?>"/>
            <label for="nama_pemilik" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5 peer-focus:text-teal-600 peer-focus:dark:text-teal-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">Nama Pemilik</label>
        </div>
        <div class="relative w-full">
            <input type="text" id="alamat" class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-teal-500 focus:outline-none focus:ring-0 focus:border-teal-600 peer" placeholder=" " name="alamat" autocomplete="off" value="<?= $findPemilik["alamat"] ?>"/>
            <label for="alamat" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5 peer-focus:text-teal-600 peer-focus:dark:text-teal-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">Alamat</label>
        </div>
        <div class="relative w-full">
            <input type="text" id="no_hp" class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-teal-500 focus:outline-none focus:ring-0 focus:border-teal-600 peer" placeholder=" " name="no_hp" autocomplete="off" value="<?= $findPemilik["no_hp"] ?>"/>
            <label for="no_hp" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5 peer-focus:text-teal-600 peer-focus:dark:text-teal-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">No Hp</label>
        </div>
        <div class="w-full relative">
            <button type="submit" name="submit" class="w-full bg-teal-700 border-teal-700 border-4 active:border-4 focus:border-teal-600 active:border-teal-600 py-2 text-white  font-semibold rounded-lg">
                UPDATE
            </button>
        </div>
        </form>
    </div>
  </section>
  <!-- section -->
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
</body>
</html>