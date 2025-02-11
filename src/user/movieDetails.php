 <?php
    include("Nevigation.php")
    ?>
 <div id="root">
      <section id="movieDetails" class="py-16 bg-gray-50">
           <div class="container mx-auto px-4">
                <!-- Movie Header -->
                <div class="flex flex-col md:flex-row gap-8 mb-12">
                     <!-- Movie Poster -->
                     <div class="w-full md:w-1/3 lg:w-1/4">
                          <img src="../../public/Images/Marco.jpg"
                               class="aspect-[2/3] bg-gray-300 rounded-lg shadow-lg">
                     </div>

                     <!-- Movie Info -->
                     <div class="flex-1">
                          <div class="flex items-center gap-4 mb-4">
                               <h1 class="text-3xl md:text-4xl font-bold">Movie Title</h1>
                               <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">Now
                                    Showing</span>
                          </div>

                          <div class="flex items-center gap-4 text-gray-600 mb-6">
                               <div class="flex items-center gap-1">
                                    <i class="fa-solid fa-star text-yellow-400"></i>
                                    <span>4.8/5</span>
                               </div>
                               <span>•</span>
                               <span>2h 30min</span>
                               <span>•</span>
                               <span>Action, Drama</span>
                               <span>•</span>
                               <span>PG-13</span>
                          </div>

                          <p class="text-gray-700 mb-8 leading-relaxed">
                               Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt
                               ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                               ullamco laboris nisi ut aliquip ex ea commodo consequat.
                          </p>

                          <div class="flex flex-wrap gap-4 mb-8">
                               <a href="Select_Tickets.php"
                                    class="bg-red-600 text-white px-8 py-3 rounded-lg hover:bg-red-700 transition-colors flex items-center gap-2">
                                    <i class="fa-solid fa-ticket"></i>
                                    Book Tickets
                               </a>
                          </div>

                          <div class="border-t border-gray-200 pt-6">
                               <h2 class="font-bold mb-4">Available Languages</h2>
                               <div class="flex gap-3">
                                    <span
                                         class="px-4 py-2 bg-white rounded-full border border-gray-200 hover:border-red-600 cursor-pointer">English</span>
                                    <span
                                         class="px-4 py-2 bg-white rounded-full border border-gray-200 hover:border-red-600 cursor-pointer">Spanish</span>
                                    <span
                                         class="px-4 py-2 bg-white rounded-full border border-gray-200 hover:border-red-600 cursor-pointer">French</span>
                               </div>
                          </div>
                     </div>
                </div>

                <!-- Tabs -->
                <div class="border-b border-gray-200 mb-8">
                     <div class="flex gap-8">
                          <button class="px-4 py-2 border-b-2 border-red-600 text-red-600">Cast & Crew</button>
                          <button class="px-4 py-2 text-gray-600 hover:text-red-600">Reviews</button>
                          <button class="px-4 py-2 text-gray-600 hover:text-red-600">Show Times</button>
                     </div>
                </div>

                <!-- Cast & Crew Section -->
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-6">
                     <!-- Cast Member 1 -->
                     <div class="text-center">
                          <div class="w-24 h-24 mx-auto rounded-full bg-gray-300 mb-3"></div>
                          <h3 class="font-medium">Actor Name</h3>
                          <p class="text-sm text-gray-600">Character Name</p>
                     </div>

                     <!-- Cast Member 2 -->
                     <div class="text-center">
                          <div class="w-24 h-24 mx-auto rounded-full bg-gray-300 mb-3"></div>
                          <h3 class="font-medium">Actor Name</h3>
                          <p class="text-sm text-gray-600">Character Name</p>
                     </div>

                     <!-- Cast Member 3 -->
                     <div class="text-center">
                          <div class="w-24 h-24 mx-auto rounded-full bg-gray-300 mb-3"></div>
                          <h3 class="font-medium">Actor Name</h3>
                          <p class="text-sm text-gray-600">Character Name</p>
                     </div>

                     <!-- Cast Member 4 -->
                     <div class="text-center">
                          <div class="w-24 h-24 mx-auto rounded-full bg-gray-300 mb-3"></div>
                          <h3 class="font-medium">Actor Name</h3>
                          <p class="text-sm text-gray-600">Character Name</p>
                     </div>

                     <!-- Cast Member 5 -->
                     <div class="text-center">
                          <div class="w-24 h-24 mx-auto rounded-full bg-gray-300 mb-3"></div>
                          <h3 class="font-medium">Actor Name</h3>
                          <p class="text-sm text-gray-600">Character Name</p>
                     </div>

                     <!-- Cast Member 6 -->
                     <div class="text-center">
                          <div class="w-24 h-24 mx-auto rounded-full bg-gray-300 mb-3"></div>
                          <h3 class="font-medium">Actor Name</h3>
                          <p class="text-sm text-gray-600">Character Name</p>
                     </div>
                </div>
           </div>
      </section>
 </div>
<?php include_once("Footer.php"); ?>