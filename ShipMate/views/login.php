<?php 
session_start();
if(isset($_SESSION["login"])) {
    header("Location:home.php");
}

include_once "../controller/UserController.php";

$UserController = new UserController;
if(isset($_POST["login"])) {
    $result = $UserController->login($_POST);
    if($result > 0) {
        header("Location:home.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css"  rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'inter';
        }
    </style>
</head>
<body class="w-full h-screen flex flex-col justify-center items-center bg-slate-100">
    <div class="w-[90%]">
        <div class="w-full grid grid-cols-2">
            <div class="w-full h-auto flex items-center">
                <img src="../images/illustrations-3.svg" alt="" class="w-full">
            </div>
            <div class="w-full flex justify-center">
                <form action="" method="post" class="w-3/4 flex flex-col gap-7 justify-center" enctype="multipart/form-data">
                <div class="w-full">
                    <p class="text-3xl text-center font-bold text-teal-600">Login</p>
                </div>
                
                <div class="relative w-full">
                <input type="text" id="email" name="email" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-2 appearance-none border-teal-600 focus:outline-none focus:ring-0 focus:border-teal-600 peer" placeholder=" " autocomplete="off"/>
                <label for="email" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] px-2 peer-focus:px-2 bg-slate-100 peer-focus:text-teal-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">email</label>
                </div>

                <div class="relative w-full">
                <input type="password" id="password" name="password" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-2 appearance-none border-teal-600 focus:outline-none focus:ring-0 focus:border-teal-600 peer" placeholder=" " autocomplete="off"/>
                <label for="password" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] px-2 peer-focus:px-2 bg-slate-100 peer-focus:text-teal-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">password</label>
                </div>

                <div class="w-full relative text-teal-600 font-medium">
                    <p class="">Belum punya akun ? <a href="register.php" class="hover:text-teal-800">Register</a></p>
                </div>

                <div class="w-full relative">
                    <button type="submit" class="w-full focus:outline-none text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800" name="login">
                        Login
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- script flowbite -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
</body>
</html>