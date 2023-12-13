<?php 
session_start();
if(!isset($_SESSION["login"])) {
  header("Location:../login.php");
}
include '../../controller/DpiController.php';
$DpiController = new DpiController;

$id = $_GET["id"];

$findDpi = $DpiController->find($id);

$success = false;
$failed = false;
if(isset($_POST["submit"])) {
    $result = $DpiController->update($_POST,$id);

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
    <title>Create DPI</title>
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
          <a href="dpi.php" class="block py-2 pl-3 pr-4 text-gray-100 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0">Dpi</a>
        </li>
        <li>
          <a href="../pemilik/pemilik.php" class="block py-2 pl-3 pr-4 text-gray-100 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0">Pemilik</a>
        </li>
        <li>
          <a href="../alat-tangkap/alat-tangkap.php" class="block py-2 pl-3 pr-4 text-gray-100 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0">Alat Tangkap</a>
        </li>
        <li>
          <a href="../logout.php" class="block py-2 pl-3 pr-4 text-gray-100 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0">Logout</a>
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
                <a href="dpi.php" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="small-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </a>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    Dpi Sudah Berhasil DiUpdate
                </p>

            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                <a href="dpi.php" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Alhamdulillah</a>
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
                <a href="dpi.php" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="small-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </a>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    Terjadi kesalahan pada proses update DPI
                </p>

            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                <a href="dpi.php" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Subhanallah</a>
            </div>
        </div>
        </div>
    </div>
    <!-- Notifikasi Registrasi Gagal -->
    <?php endif ?>

    <div class="w-full py-20">
  <!-- section -->
  <section class="w-full h-screen flex justify-center items-center relative">
  <img src="../../images/illustrations-10.svg" alt="" class="absolute -z-10 w-1/2 -rotate-12 left-20">
    <div class="w-1/3 flex flex-col gap-10 items-center">
        <p class="text-4xl font-bold text-gray-500">Create DPI</p>
        <form action="" method="post" class="w-full flex flex-col items-center gap-6 shadow-lg p-6 bg-gray-50 rounded border-2">
        <div class="relative w-full">
            <input type="text" id="nama_dpi" class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-teal-500 focus:outline-none focus:ring-0 focus:border-teal-600 peer" placeholder=" " name="nama_dpi" autocomplete="off" value="<?= $findDpi["nama_dpi"] ?>"/>
            <label for="nama_dpi" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5 peer-focus:text-teal-600 peer-focus:dark:text-teal-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">Nama DPI</label>
        </div>
        <div class="relative w-full">
            <input type="text" id="luas_dpi" class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-teal-500 focus:outline-none focus:ring-0 focus:border-teal-600 peer" placeholder=" " name="luas_dpi" autocomplete="off" value="<?= $findDpi["luas"] ?>"/>
            <label for="luas_dpi" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5 peer-focus:text-teal-600 peer-focus:dark:text-teal-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">Luas DPI ( M² )</label>
        </div>
        <div class="w-full relative">
            <button type="submit" name="submit" class="w-full bg-teal-700 border-teal-700 border-4 active:border-4 focus:border-teal-600 active:border-teal-600 py-2 text-white  font-semibold rounded-lg">
                Update
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