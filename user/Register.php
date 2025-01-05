<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <link href="../src/output.css" rel="stylesheet">
</head>

<body class="font-inter" style="background-image:url('../src/Images/login_img.png')">
     <section class="flex justify-center w-full h-full bg-cover ">
               <!-- <img src="../src/Images/login_img.png" alt="gradient background image"
                    class="w-full h-full border-none bg-cover sticky"> -->
          <div class="mx-auto max-w-lg px-6 lg:px-8 absolute py-20">
               <img src="../src/Images/logo-white.png" alt="pagedone logo" class="mx-auto lg:mb-11 mb-8 object-cover">

               <div class="rounded-2xl bg-gray-200/20 backdrop-blur-sm shadow-xl z-10">
                    <form action="index.php" method="POST" class="lg:p-11 p-7 mx-auto">
                         <div class="mb-11">
                              <h1 class="text-white text-center font-manrope text-3xl font-bold leading-10 mb-2">Welcome
                                   Back</h1>
                              <p class="text-gray-200 text-center text-base font-medium leading-6">Unlock endless
                                   entertainment with MoviesVault</p>
                         </div>
                         <input type="text"
                              class="w-full h-10 text-gray-900 placeholder:text-gray-400 text-lg font-normal leading-7 rounded-full border-gray-300 border shadow-sm focus:outline-none px-4 mb-6 placeholder:text-base"
                              placeholder="Name" name="name">
                         <input type="email"
                              class="w-full h-10 text-gray-900 placeholder:text-gray-400 text-lg font-normal leading-7 rounded-full border-gray-300 border shadow-sm focus:outline-none px-4 mb-6 placeholder:text-base"
                              placeholder="Email" name="email">
                         <input type="number"
                              class="w-full h-10 text-gray-900 placeholder:text-gray-400 text-lg font-normal leading-7 rounded-full border-gray-300 border shadow-sm focus:outline-none px-4 mb-6 placeholder:text-base"
                              placeholder="Mobile Number" name="name">
                         <input type="password"
                              class="w-full h-10 text-gray-900 placeholder:text-gray-400 text-lg font-normal leading-7 rounded-full border-gray-300 border shadow-sm focus:outline-none px-4 mb-6 placeholder:text-base"
                              placeholder="Confirm Password" name="confirm_password">
                         <input type="password"
                              class="w-full h-10 text-gray-900 placeholder:text-gray-400 text-lg font-normal leading-7 rounded-full border-gray-300 border shadow-sm focus:outline-none px-4 mb-6 placeholder:text-base"
                              placeholder="Password" name="password">

                         <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                              for="multiple_files">Profile Picture</label>
                         <input
                              class="block w-full text-sm text-gray-900 border border-gray-300 rounded-full cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none px-4 py-2 dark:placeholder-gray-400 "
                              id="multiple_files" type="file" multiple>


                         <a href="javascript:;" class="flex justify-end mb-6">
                              <span class="text-blue-600 text-right text-base font-normal leading-6">Forgot
                                   Password?</span>
                         </a>
                         <input
                              class="w-full h-12 text-white text-center text-base font-semibold leading-6 rounded-full hover:bg-red-600 transition-all duration-700 bg-red-600/70 shadow-sm mb-11"
                              type="submit" value="Log in">
                         <a href="login.php"
                              class="flex justify-center text-gray-200 text-base font-medium leading-6"> have an
                              account? <span class="text-indigo-600 font-semibold pl-3"> Sign In</span>
                         </a>
                    </form>
               </div>
          </div>
     </section>
</body>

</html>