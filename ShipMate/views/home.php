<?php
session_start();
if(!isset($_SESSION["login"])) {
  header("Location:login.php");
}
?>
<!doctype html>
<html data-theme="aqua">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Page</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css"  rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="../dist/output.css">
  <style>

    </style>
</head>
<body class="w-full overflow-x-hidden bg-base-300">
  <!-- navbar -->
<nav class="bg-teal-600 border-gray-200 px-2 h-20 flex items-center fixed w-full">
  <div class="container flex flex-wrap items-center justify-between mx-auto">
    <p class="flex items-center gap-3">
        <img src="../images/icon.png" class="w-10" alt="Flowbite Logo" />
        <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">ShipMate</span>
    </p>
    <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
      <span class="sr-only">Open main menu</span>
      <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
    </button>
    <div class="hidden w-full md:block md:w-auto" id="navbar-default">
      <ul class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-teal-600">
        <li>
          <a href="home.php" class="block py-2 pl-3 pr-4 text-gray-100 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0">Home</a>
        </li>
        <li>
          <a href="kapal/kapal.php" class="block py-2 pl-3 pr-4 text-gray-100 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0">Kapal</a>
        </li>
        <li>
          <a href="dpi/dpi.php" class="block py-2 pl-3 pr-4 text-gray-100 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0">Dpi</a>
        </li>
        <li>
          <a href="pemilik/pemilik.php" class="block py-2 pl-3 pr-4 text-gray-100 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0">Pemilik</a>
        </li>
        <li>
          <a href="alat-tangkap/alat-tangkap.php" class="block py-2 pl-3 pr-4 text-gray-100 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0">Alat Tangkap</a>
        </li>
        <li>
          <a href="logout.php" class="block py-2 pl-3 pr-4 text-gray-100 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

  <!-- navbar -->
  
  <!-- body -->
  <div class="w-full flex py-20">
  <div class="w-full h-screen items-center grid grid-cols-3 gap-3">
    <div class="col-span-2">
      <img src="../images/illustrations-4.svg" class="animate-floating" alt="">
    </div>
    <div class="flex flex-col w-full gap-5">
      <p class="text-slate-700 text-3xl font-extrabold">SHIPMATE</p>
      <p class="text-slate-700 w-[90%] indent-5">Optimalkan manajemen kapal Anda dengan solusi terbaik dari ShipMate. Dengan fitur canggih untuk pengaturan rute, pelacakan real-time, manajemen awak kapal, dan kargo, ShipMate akan membantu Anda memaksimalkan efisiensi operasional dan mengoptimalkan kinerja kapal Anda.</p>
      <div class="w-full flex gap-2">
      <a href="kapal/kapal.php" class="text-white bg-cyan-700 hover:bg-cyan-800 focus:outline-none focus:ring-4 focus:ring-cyan-300 font-medium rounded text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-cyan-600 dark:hover:bg-cyan-700 dark:focus:ring-cyan-800 flex gap-2 h-auto items-center">
       <span class="">
        Get Started
       </span> 
       <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
      <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
      </svg>
      </a>
      </div>
    </div>
  </div>
  </div>
  <!-- body -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
</body>
</html>