<?php
include("../../config/connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <link href="../../public/output.css" rel="stylesheet">
</head>

<body>
     <!-- navigation -->
     <div id="root">
          <section id="navbar" class="w-full top-0 z-50">
               <nav class="backdrop-blur-sm border-b">
                    <div class="container mx-auto px-4">
                         <div class="flex justify-between items-center h-20">
                              <!-- Logo -->
                              <div class="flex items-center">
                                   <a href="#" class="text-red-600 text-2xl font-bold font-serif">MoviesVault</a>
                              </div>

                              <!-- Desktop Navigation -->
                              <div class="hidden md:flex items-center space-x-8">
                                   <a href="index.php" class="text-black hover:text-red-600 transition-colors">Home</a>
                                   <a href="Movies.php"
                                        class="text-black hover:text-red-600 transition-colors">Movies</a>
                                   <a href="Coming_soon.php"
                                        class="text-black hover:text-red-600 transition-colors">Coming Soon</a>


                              </div>

                              <!-- CTA Buttons -->

                              <div class="hidden md:flex items-center space-x-4">
                                   <?php
                              if (isset($_COOKIE['name'])) {
                              ?>
                                   <a href="profile.php"
                                        class="bg-transparent border border-red-600 text-red-600 px-4 py-2 rounded-lg hover:bg-red-600 hover:text-white transition-colors cursor-pointer"
                                        type="button" value=""><?php echo $_COOKIE['name']; ?></a>
                                   <div class="w-20">
                                        <img src="../../public/profile/<?php echo $_COOKIE['pic']?>" alt="img"
                                             class="rounded-full">
                                   </div>
                                   
                                   <!-- --------------------------------------------------------------------- -->


                                   <?php
                              }
                              else{
                                   ?>
                                   <a href="login.php"
                                        class="bg-transparent border border-red-600 text-red-600 px-4 py-2 rounded-lg hover:bg-red-600 hover:text-white transition-colors cursor-pointer"
                                        type="button" value="">Sign In</a>


                                   <button
                                        class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors">
                                        Book Now
                                   </button>




                                   <?php

                              }
                              ?>
                              </div>

                              <!-- Mobile Menu Button -->
                              <div class="md:hidden">
                                   <button class="text-gray-300 hover:text-red-600 transition-colors"
                                        x-on:click="mobileMenu = !mobileMenu">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                             viewBox="0 0 24 24" stroke="currentColor">
                                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M4 6h16M4 12h16M4 18h16" />
                                        </svg>
                                   </button>
                              </div>
                         </div>

                         <!-- Mobile Menu -->
                         <div class="md:hidden" x-show="mobileMenu" x-cloak>
                              <div class="px-2 pt-2 pb-3 space-y-1">
                                   <a href="index.php"
                                        class="block text-gray-300 hover:text-red-600 transition-colors py-2">Home</a>
                                   <a href="Movies.php"
                                        class="block text-gray-300 hover:text-red-600 transition-colors py-2">Movies</a>
                                   <a href="Coming_soon.php"
                                        class="block text-gray-300 hover:text-red-600 transition-colors py-2">Coming
                                        Soon</a>
                                   <div class="flex flex-col space-y-2 pt-2">
                                        <button
                                             class="bg-transparent border border-red-600 text-red-600 px-4 py-2 rounded-lg hover:bg-red-600 hover:text-white transition-colors w-full">
                                             Sign In
                                        </button>
                                        <button
                                             class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors w-full">
                                             Book Now
                                        </button>
                                   </div>
                              </div>
                         </div>
                    </div>
               </nav>
          </section>
     </div>
     <!-- end Navigation -->
</body>
<script src="../../public/js/preline.js"></script>

</html>