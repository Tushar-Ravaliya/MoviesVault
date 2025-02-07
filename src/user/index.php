<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <link href="../../output.css" rel="stylesheet">

     <style>
          @keyframes appear {
               form {
                    opacity: 0;
                    scale: 0.5;
               }

               to {
                    opacity: 1;
                    scale: 1;
               }
          }

          .animates {
               animation: appear linear;
               animation-timeline: view();
               animation-range: entry 0% cover 40%;
          }
     </style>

</head>

<body class="">
     <div class="container">
          <?php
          include("Nevigation.php")
          ?>
          <!-- baground image start -->
          <div class="block justify-center items-center animates">
               <div class="bg-red-600 w-full bg-cover z-0 absolute min-h-1/3" style="height:80vh;">
                    <img src="../../public/Images/home_img_1.jpg" alt="imgae" style="height:100%; width: 100%;">
               </div>
               <div class="w-full bg-cover z-10 relative flex justify-center items-center bg-zinc-900/50"
                    style="height:80vh;">
                    <div class="flex-col justify-center items-center w-1/3">
                         <div class="w-full flex justify-center items-center">
                              <img src="../../public/Images/logo-white.png" alt="" class="align-middle">
                         </div>

                         <div class="text-white text-center mt-10 text-lg">
                              <span>A movie, also known as a film or motion picture, is a visual art form that conveys stories, ideas, and emotions through moving images. Movies are made up of a series of still images that are projected onto a screen in rapid succession. </span>
                         </div>
                    </div>
               </div>
          </div>
          <!-- baground image end -->
          <!-- Movie start-->
          <div class="w-full flex-col justify-center relative z-20 items-center animates">
               <div class="p-10 text-3xl">
                    Recomment for You ♥
               </div>
               <div class="flex bg-white px-10 flex-wrap justify-center">
                    <div class="h-1/4 w-auto my-5 mx-10  rounded-lg animate ">
                         <a href="../user/movieDetails.php">
                              <div class="h-1/4 w-auto bg-red-500 overflow-hidden">
                                   <img src="../../public/Images/Pushpa2.jpg" alt=""
                                        class="h-96 min-h-80 hover:scale-110 hover:transition hover:ease-in-out hover:delay-150 transition">
                              </div>
                              <div class="font-medium">
                                   <span>Pushpa 2: The Rule</span><br>
                                   <span class="text-gray-400">Action / Thtiller</span>
                              </div>
                         </a>
                    </div>
                    <div class="h-1/4 w-auto my-5 mx-10  rounded-lg animate ">
                         <div class="h-1/4 w-auto bg-red-500 overflow-hidden">
                              <img src="../../public/Images/Baby_john.jpg" alt=""
                                   class="h-96 min-h-80 hover:scale-105 hover:transition hover:ease-in-out hover:delay-150 transition">
                         </div>
                         <div class="font-medium">
                              <span>Baby John</span><br>
                              <span class="text-gray-400">Action / Thtiller</span>
                         </div>
                    </div>
                    <div class="h-1/4 w-auto my-5 mx-10  rounded-lg animate ">
                         <div class="h-1/4 w-auto bg-red-500 overflow-hidden">
                              <img src="../../public/Images/Mufasa.jpg" alt=""
                                   class="h-96 min-h-80 hover:scale-105 hover:transition hover:ease-in-out hover:delay-150 transition">
                         </div>
                         <div class="font-medium">
                              <span>Mufash: The Lion King</span><br>
                              <span class="text-gray-400">Adventure / Animation / Drama</span>
                         </div>
                    </div>
                    <div class="h-1/4 w-auto my-5 mx-10  rounded-lg animate ">
                         <div class="h-1/4 w-auto bg-red-500 overflow-hidden">
                              <img src="../../public/Images/Marco.jpg" alt=""
                                   class="h-96 min-h-80 hover:scale-105 hover:transition hover:ease-in-out hover:delay-150 transition">
                         </div>
                         <div class="font-medium">
                              <span>Marco</span><br>
                              <span class="text-gray-400">Action / Thtiller</span>
                         </div>
                    </div>
                    <div class="h-1/4 w-auto my-5 mx-10  rounded-lg animate ">
                         <div class="h-1/4 w-auto bg-red-500 overflow-hidden">
                              <img src="../../public/Images/Barroz.jpg" alt=""
                                   class="h-96 min-h-80 hover:scale-105 hover:transition hover:ease-in-out hover:delay-150 transition">
                         </div>
                         <div class="font-medium">
                              <span>Bazzoe</span><br>
                              <span class="text-gray-400">Action / Adventure / fantasy</span>
                         </div>
                    </div>
               </div>

          </div>
          <!-- movies end -->
          <!-- footer start-->
          <?php
          include("Footer.php");
          ?>
          <!-- footer end -->
     </div>
</body>

</html>