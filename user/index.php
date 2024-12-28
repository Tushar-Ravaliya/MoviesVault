<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <link href="../src/output.css" rel="stylesheet">

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
                                        <a href="#nowShowing"
                                             class="text-black hover:text-red-600 transition-colors">Now Showing</a>
                                        <a href="#comingSoon"
                                             class="text-black hover:text-red-600 transition-colors">Coming Soon</a>
                                        <a href="#theaters"
                                             class="text-black hover:text-red-600 transition-colors">Theaters</a>
                                        <a href="#offers"
                                             class="text-black hover:text-red-600 transition-colors">Offers</a>
                                        <a href="#membership"
                                             class="text-black hover:text-red-600 transition-colors">Membership</a>
                                   </div>

                                   <!-- CTA Buttons -->
                                   <div class="hidden md:flex items-center space-x-4">
                                        <a href="login.php"
                                             class="bg-transparent border border-red-600 text-red-600 px-4 py-2 rounded-lg hover:bg-red-600 hover:text-white transition-colors cursor-pointer"
                                             type="button" value="">Sign In</a>


                                        <button
                                             class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors">
                                             Book Now
                                        </button>
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
                                        <a href="#nowShowing"
                                             class="block text-gray-300 hover:text-red-600 transition-colors py-2">Now
                                             Showing</a>
                                        <a href="#comingSoon"
                                             class="block text-gray-300 hover:text-red-600 transition-colors py-2">Coming
                                             Soon</a>
                                        <a href="#theaters"
                                             class="block text-gray-300 hover:text-red-600 transition-colors py-2">Theaters</a>
                                        <a href="#offers"
                                             class="block text-gray-300 hover:text-red-600 transition-colors py-2">Offers</a>
                                        <a href="#membership"
                                             class="block text-gray-300 hover:text-red-600 transition-colors py-2">Membership</a>
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
          <!-- baground image start -->
          <div class="block justify-center items-center animates">
               <div class="bg-red-600 w-full bg-cover z-0 absolute min-h-1/3" style="height:80vh;">
                    <img src="../src/Images/home_img_1.jpg" alt="imgae" style="height:100%; width: 100%;">
               </div>
               <div class="w-full bg-cover z-10 relative flex justify-center items-center bg-zinc-900/50"
                    style="height:80vh;">
                    <div class="flex-col justify-center items-center w-1/3">
                         <div class="w-full flex justify-center items-center">
                              <img src="../src/Images/logo-white.png" alt="" class="align-middle">
                         </div>

                         <div class="text-white text-center mt-10 text-lg">
                              <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium cupiditate
                                   animi
                                   dolorem quas, ipsa repellendus obcaecati ab labore assumenda, rerum facilis vitae
                                   fugit
                                   commodi voluptatem porro recusandae quia eos ut.</span>
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
                         <div class="h-1/4 w-auto bg-red-500 overflow-hidden">
                              <img src="../src/Images/Pushpa2.jpg" alt=""
                                   class="h-96 min-h-80 hover:scale-110 hover:transition hover:ease-in-out hover:delay-150 transition">
                         </div>
                         <div class="font-medium">
                              <span>Pushpa 2: The Rule</span><br>
                              <span class="text-gray-400">Action / Thtiller</span>
                         </div>
                    </div>
                    <div class="h-1/4 w-auto my-5 mx-10  rounded-lg animate ">
                         <div class="h-1/4 w-auto bg-red-500 overflow-hidden">
                              <img src="../src/Images/Baby_john.jpg" alt=""
                                   class="h-96 min-h-80 hover:scale-105 hover:transition hover:ease-in-out hover:delay-150 transition">
                         </div>
                         <div class="font-medium">
                              <span>Baby John</span><br>
                              <span class="text-gray-400">Action / Thtiller</span>
                         </div>
                    </div>
                    <div class="h-1/4 w-auto my-5 mx-10  rounded-lg animate ">
                         <div class="h-1/4 w-auto bg-red-500 overflow-hidden">
                              <img src="../src/Images/Mufasa.jpg" alt=""
                                   class="h-96 min-h-80 hover:scale-105 hover:transition hover:ease-in-out hover:delay-150 transition">
                         </div>
                         <div class="font-medium">
                              <span>Mufash: The Lion King</span><br>
                              <span class="text-gray-400">Adventure / Animation / Drama</span>
                         </div>
                    </div>
                    <div class="h-1/4 w-auto my-5 mx-10  rounded-lg animate ">
                         <div class="h-1/4 w-auto bg-red-500 overflow-hidden">
                              <img src="../src/Images/Marco.jpg" alt=""
                                   class="h-96 min-h-80 hover:scale-105 hover:transition hover:ease-in-out hover:delay-150 transition">
                         </div>
                         <div class="font-medium">
                              <span>Marco</span><br>
                              <span class="text-gray-400">Action / Thtiller</span>
                         </div>
                    </div>
                    <div class="h-1/4 w-auto my-5 mx-10  rounded-lg animate ">
                         <div class="h-1/4 w-auto bg-red-500 overflow-hidden">
                              <img src="../src/Images/Barroz.jpg" alt=""
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
          <div id="root">
               <footer id="footer" class="bg-white text-black">
                    <div class="max-w-7xl mx-auto px-4 py-12">
                         <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                              <div class="space-y-4">
                                   <h3 class="text-xl font-bold text-red-600">MoviesVault</h3>
                                   <p class="text-sm">Your ultimate destination for movie tickets and
                                        entertainment.</p>
                                   <div class="flex space-x-4">
                                        <a href="#" class="text-red-600 hover:scale-110 transition ">
                                             <svg class="w-6 h-6 " fill="currentColor" viewBox="0 0 24 24">
                                                  <path
                                                       d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                             </svg>
                                        </a>
                                        <a href="#" class="text-red-600 hover:scale-110 transition">
                                             <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                                  <path
                                                       d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                                             </svg>
                                        </a>
                                        <a href="#" class="text-red-600 hover:scale-110 transition">
                                             <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 24 24">
                                                  <path
                                                       d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.897 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.897-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z" />
                                             </svg>
                                        </a>
                                   </div>
                              </div>
                              <div class="space-y-4">
                                   <h4 class="text-lg font-semibold text-black">Quick Links</h4>
                                   <ul class="space-y-2">
                                        <li><a href="#" class="hover:text-white transition-colors">Now Showing</a>
                                        </li>
                                        <li><a href="#" class="hover:text-white transition-colors">Coming Soon</a>
                                        </li>
                                        <li><a href="#" class="hover:text-white transition-colors">Cinemas</a></li>
                                        <li><a href="#" class="hover:text-white transition-colors">Offers</a></li>
                                   </ul>
                              </div>
                              <div class="space-y-4">
                                   <h4 class="text-lg font-semibold text-black">Support</h4>
                                   <ul class="space-y-2">
                                        <li><a href="#" class="hover:text-white transition-colors">Contact Us</a>
                                        </li>
                                        <li><a href="#" class="hover:text-white transition-colors">FAQ</a></li>
                                        <li><a href="#" class="hover:text-white transition-colors">Privacy
                                                  Policy</a></li>
                                        <li><a href="#" class="hover:text-white transition-colors">Terms of
                                                  Service</a></li>
                                   </ul>
                              </div>
                              <div class="space-y-4">
                                   <h4 class="text-lg font-semibold text-black">Newsletter</h4>
                                   <p class="text-sm">Subscribe to get special offers and updates</p>
                                   <form class="flex flex-col space-y-2">
                                        <input type="email" placeholder="Enter your email"
                                             class="px-4 py-2 bg-gray-200 rounded focus:outline-none focus:ring-2 focus:ring-red-500">
                                        <button
                                             class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition-colors">Subscribe</button>
                                   </form>
                              </div>
                         </div>
                         <div class="border-t border-red-600 mt-12 pt-8 text-center">
                              <p class="text-sm">&copy; 2024 MovieTix. All rights reserved.</p>
                         </div>
                    </div>
               </footer>
          </div>
          <!-- footer end -->
     </div>
</body>

</html>