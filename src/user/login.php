<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <link href="../../public/output.css" rel="stylesheet">
</head>

<body class="font-inter overflow-hidden">
     <section class="flex justify-center relative">
          <img src="../../public/Images/login_img.png" alt="gradient background image"
               class="w-full h-full object-cover fixed  border-none backdrop-blur-sm">
          <div class="mx-auto max-w-lg px-6 lg:px-8 absolute py-20">
               <img src="../../public/Images/logo-white.png" alt="pagedone logo" class="mx-auto lg:mb-11 mb-8 object-cover">

               <div class="rounded-2xl bg-gray-200/20 backdrop-blur-sm shadow-xl z-10">
                    <form action="index.php" method="POST" class="lg:p-11 p-7 mx-auto">
                         <div class="mb-11">
                              <h1 class="text-white text-center font-manrope text-3xl font-bold leading-10 mb-2">Welcome
                                   Back</h1>
                              <p class="text-gray-200 text-center text-base font-medium leading-6">Unlock endless
                                   entertainment with MoviesVault</p>
                         </div>

                         <input type="email"
                              class="w-full h-10 text-gray-900 placeholder:text-gray-400 text-lg font-normal leading-7 rounded-full border-gray-300 border shadow-sm focus:outline-none px-4 mb-6"
                              placeholder="Email" name="email">
                         <input type="password"
                              class="w-full h-10 text-gray-900 placeholder:text-gray-400 text-lg font-normal leading-7 rounded-full border-gray-300 border shadow-sm focus:outline-none px-4 mb-1"
                              placeholder="Password" name="password">
                         <a href="javascript:;" class="flex justify-end mb-6">
                              <span class="text-blue-600 text-right text-base font-normal leading-6">Forgot
                                   Password?</span>
                         </a>
                         <input
                              class="w-full h-12 text-white text-center text-base font-semibold leading-6 rounded-full hover:bg-red-600 transition-all duration-700 bg-red-600/70 shadow-sm mb-11"
                              type="submit" value="Log in">
                         <a href="Register.php"
                              class="flex justify-center text-gray-200 text-base font-medium leading-6"> Don't have an
                              account? <span class="text-indigo-600 font-semibold pl-3"> Sign Up</span>
                         </a>
                    </form>
               </div>
          </div>
     </section>
</body>

</html>

<?php

$_SESSION["email"] = $_POST['email'];
$_SESSION["password"] = $_POST['password'];
?>