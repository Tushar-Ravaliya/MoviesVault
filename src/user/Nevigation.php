<?php
include("../../config/connection.php");
if (session_status() == PHP_SESSION_NONE) {
     session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>MoviesVault</title>
     <link href="../../public/output.css" rel="stylesheet">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.12.0/cdn.min.js" defer></script>
</head>

<body>
     <!-- navigation -->
     <div id="root">
          <section id="navbar" class="w-full sticky top-0 z-50 ">
               <nav class="backdrop-blur-sm bg-white/90 border-b shadow-sm" x-data="{ mobileMenuOpen: false }">
                    <div class="container mx-auto px-4">
                         <div class="flex justify-between items-center h-16 md:h-20">
                              <!-- Logo -->
                              <div class="flex items-center">
                                   <a href="index.php" class="text-red-600 text-xl md:text-2xl font-bold font-serif">MoviesVault</a>
                              </div>

                              <!-- Desktop Navigation -->
                              <div class="hidden md:flex items-center space-x-8">
                                   <a href="index.php" class="text-black hover:text-red-600 transition-colors">Home</a>
                                   <a href="Movies.php" class="text-black hover:text-red-600 transition-colors">Movies</a>
                                   <a href="Coming_soon.php" class="text-black hover:text-red-600 transition-colors">Coming Soon</a>
                                   <?php if (isset($_SESSION['name'])) { ?>
                                        <a href="MyBooking.php" class="text-black hover:text-red-600 transition-colors">My Booking</a>
                                   <?php } ?>
                              </div>

                              <!-- CTA Buttons - Desktop -->
                              <div class="hidden md:flex items-center space-x-4">
                                   <?php if (isset($_SESSION['name'])) { ?>
                                        <a href="profile.php" class="bg-transparent border border-red-600 text-red-600 px-4 py-2 rounded-lg hover:bg-red-600 hover:text-white transition-colors cursor-pointer">
                                             <?php echo $_SESSION['name']; ?>
                                        </a>
                                        <div class="w-10 h-10 overflow-hidden rounded-full">
                                             <img src="../../public/profile/<?php echo $_SESSION['pic'] ?>" alt="Profile" class="w-full h-full object-cover">
                                        </div>
                                   <?php } else { ?>
                                        <a href="login.php" class="bg-transparent border border-red-600 text-red-600 px-4 py-2 rounded-lg hover:bg-red-600 hover:text-white transition-colors cursor-pointer">
                                             Sign In
                                        </a>
                                   <?php } ?>
                              </div>

                              <!-- Mobile Menu Button -->
                              <div class="md:hidden">
                                   <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-gray-800 hover:text-red-600 transition-colors">
                                        <svg x-show="!mobileMenuOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                        </svg>
                                        <svg x-show="mobileMenuOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display: none;">
                                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                   </button>
                              </div>
                         </div>

                         <!-- Mobile Menu -->
                         <div x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-2" class="md:hidden py-3 bg-white border-t" style="display: none;">
                              <div class="px-2 space-y-2">
                                   <a href="index.php" class="block py-2 px-3 text-gray-800 hover:bg-red-50 hover:text-red-600 rounded-lg transition-colors">Home</a>
                                   <a href="Movies.php" class="block py-2 px-3 text-gray-800 hover:bg-red-50 hover:text-red-600 rounded-lg transition-colors">Movies</a>
                                   <a href="Coming_soon.php" class="block py-2 px-3 text-gray-800 hover:bg-red-50 hover:text-red-600 rounded-lg transition-colors">Coming Soon</a>

                                   <?php if (isset($_SESSION['name'])) { ?>
                                        <a href="MyBooking.php" class="block py-2 px-3 text-gray-800 hover:bg-red-50 hover:text-red-600 rounded-lg transition-colors">My Booking</a>

                                        <div class="flex items-center space-x-3 mt-4 p-3 bg-gray-50 rounded-lg">
                                             <div class="w-10 h-10 overflow-hidden rounded-full">
                                                  <img src="../../public/profile/<?php echo $_SESSION['pic'] ?>" alt="Profile" class="w-full h-full object-cover">
                                             </div>
                                             <div>
                                                  <p class="font-medium"><?php echo $_SESSION['name']; ?></p>
                                                  <a href="profile.php" class="text-sm text-red-600">View Profile</a>
                                             </div>
                                        </div>
                                   <?php } else { ?>
                                        <div class="pt-4">
                                             <a href="login.php" class="block text-center bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors">
                                                  Sign In
                                             </a>
                                        </div>
                                   <?php } ?>
                              </div>
                         </div>
                    </div>
               </nav>
          </section>
     </div>
     <!-- end Navigation -->

     <script src="../../public/js/preline.js"></script>