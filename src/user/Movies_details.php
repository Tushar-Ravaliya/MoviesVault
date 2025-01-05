<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
</head>

<body>
     <?php
           include("Nevigation.php")
           ?>
     <div class="flex items-center bg-indigo-100 w-screen min-h-screen" style="font-family: 'Montserrat', sans-serif;">
          <div class="container flexjustify-center">
               <div class="w-full sm:w-9/12  ml-auto mr-auto">
                    <div class="flex flex-wrap">
                         <div class="w-full sm:w-3/12 bg-red-200 p-5 sm:pb-20">
                              <h1 class="font-bold text-lg">NOCTURNAL ANIMALS</h1>
                              <div class="w-10 h-1 bg-red-600"></div>
                              <ul class="space-y-2 mt-2 sm:mb-8">
                                   <li>
                                        <span class="text-xs text-gray-700">Director</span>
                                        <strong class="block text-sm text-gray-700">Tom Ford</strong>
                                   </li>
                                   <li>
                                        <span class="text-xs text-gray-700">Screenplay</span>
                                        <strong class="block text-sm text-gray-700">Austin Wright</strong>
                                   </li>
                                   <li>
                                        <span class="text-xs text-gray-700">Genres</span>
                                        <strong class="block text-sm text-gray-700">Drama, Thriller</strong>
                                   </li>
                                   <li>
                                        <span class="text-xs text-gray-700">Release Date</span>
                                        <strong class="block text-sm text-gray-700">9 December 2016</strong>
                                   </li>
                                   <li>
                                        <span class="text-xs text-gray-700">Budget</span>
                                        <strong class="block text-sm text-gray-700">$22,500,000</strong>
                                   </li>
                              </ul>
                         </div>
                         <div class="w-full sm:w-9/12 h-64 sm:h-auto bg-indigo-900 bg-cover relative flex items-center justify-center"
                              style="background-image: url('https://m.media-amazon.com/images/M/MV5BOTE3NzIyZTktMWQwNy00MDUwLTk0ZDgtMTU3M2M3MTQ0MTg1XkEyXkFqcGdeQXVyMjgzMTEzNDU@._V1_.jpg')">
                              <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24"
                                   fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round"
                                   stroke-linejoin="round"
                                   class="text-white z-10 relative cursor-pointer transition duration-500 transform hover:scale-110">
                                   <circle cx="12" cy="12" r="10"></circle>
                                   <polygon points="10 8 16 12 10 16 10 8"></polygon>
                              </svg>
                              <div class="opacity-75 bg-black w-full h-full left-0 top-0 absolute"></div>
                         </div>
                    </div>
                    <div class="flex flex-wrap">
                         <div class="w-full sm:w-3/12 bg-white flex">
                              <figure
                                   class="mt-5 mb-4 ml-auto mr-auto sm:-mt-16 sm:mr-0 sm:ml-8 sm:mb-0 w-full relative">
                                   <div class="absolute w-10 h-12 -mt-3 -ml-3 bg-gray-200 z-0 hidden sm:block"></div>
                                   <img src="https://m.media-amazon.com/images/M/MV5BMTYwMzMwMzgxNl5BMl5BanBnXkFtZTgwMTA0MTUzMDI@._V1_UX182_CR0,0,182,268_AL_.jpg"
                                        alt=""
                                        class="relative z-10 w-1/2 h-auto block ml-auto mr-auto sm:ml-0 sm:mr-0 sm:w-full sm:h-64 object-cover" />
                              </figure>
                         </div>
                         <div class="w-full sm:w-9/12 bg-gray-100 flex">
                              <div class="bg-white sm:-mt-16 sm:mr-8 w-full h-64 relative rounded-tr-lg">
                                   <ul
                                        class="flex flex-wrap pl-2 pr-2 mb-2 sm:pt-5 sm:pb-5 sm:pl-8 sm:pr-8 sm:space-x-6 text-sm font-light">
                                        <li
                                             class="cursor-pointer font-semibold border-b-2 border-red-600 leading-loose pr-3">
                                             Stars
                                        </li>
                                        <li
                                             class="cursor-pointer hover:font-semibold border-b-2 border-transparent hover:border-red-600 leading-loose pr-3">
                                             Gallery
                                        </li>
                                        <li
                                             class="cursor-pointer hover:font-semibold border-b-2 border-transparent hover:border-red-600 leading-loose pr-3">
                                             Languages
                                        </li>
                                        <li
                                             class="cursor-pointer hover:font-semibold border-b-2 border-transparent hover:border-red-600 leading-loose pr-3">
                                             Locations
                                        </li>
                                   </ul>
                                   <div class="flex flex-wrap sm:divide-x divide-gray-400 pl-2 pr-2 sm:pl-8 sm:pr-8">
                                        <div class="space-y-4 w-full  mb-4 sm:mb-auto sm:w-auto sm:pr-16">
                                             <div class="flex items-center">
                                                  <img src="https://m.media-amazon.com/images/M/MV5BNjA0MTU2NDY3MF5BMl5BanBnXkFtZTgwNDU4ODkzMzE@._V1_UX32_CR0,0,32,44_AL_.jpg"
                                                       alt="" class="w-10 h-10 rounded-full object-cover mr-2" />
                                                  <span class="text-sm font-bold text-gray-800">Jake Gyllenhaal</span>
                                             </div>
                                             <div class="flex items-center">
                                                  <img src="https://m.media-amazon.com/images/M/MV5BMTg2NTk2MTgxMV5BMl5BanBnXkFtZTgwNjcxMjAzMTI@._V1_UX32_CR0,0,32,44_AL_.jpg"
                                                       alt="" class="w-10 h-10 rounded-full object-cover mr-2" />
                                                  <span class="text-sm font-bold text-gray-800">Amy Adams</span>
                                             </div>
                                             <div class="flex items-center">
                                                  <img src="https://m.media-amazon.com/images/M/MV5BMjE0NzM5MTc5OF5BMl5BanBnXkFtZTgwMjc3ODYxODE@._V1_UX32_CR0,0,32,44_AL_.jpg"
                                                       alt="" class="w-10 h-10 rounded-full object-cover mr-2" />
                                                  <span class="text-sm font-bold text-gray-800">Michael Shannon</span>
                                             </div>
                                        </div>
                                        <div class="mg-2 sm:mb-0 space-y-4 w-full sm:w-auto sm:pl-16">
                                             <div class="flex items-center">
                                                  <img src="https://m.media-amazon.com/images/M/MV5BMzE5MzI0MzY2OF5BMl5BanBnXkFtZTgwODE3MTk4MTE@._V1_UY44_CR1,0,32,44_AL_.jpg"
                                                       alt="" class="w-10 h-10 rounded-full object-cover mr-2" />
                                                  <span class="text-sm font-bold text-gray-800">Aaron Johnson</span>
                                             </div>
                                             <div class="flex items-center">
                                                  <img src="https://m.media-amazon.com/images/M/MV5BODY3MDQ4MTQ4Nl5BMl5BanBnXkFtZTgwNDU2NzU1MDE@._V1_UY44_CR1,0,32,44_AL_.jpg"
                                                       alt="" class="w-10 h-10 rounded-full object-cover mr-2" />
                                                  <span class="text-sm font-bold text-gray-800">Isla Fisher</span>
                                             </div>
                                             <div class="flex items-center">
                                                  <img src="https://m.media-amazon.com/images/M/MV5BZmE0YWNjNzYtMDE1OS00OTMzLTlkYTMtNWFjMzVkODZlOGE3XkEyXkFqcGdeQXVyMzUxMzIxMDA@._V1_UY44_CR7,0,32,44_AL_.jpg"
                                                       alt="" class="w-10 h-10 rounded-full object-cover mr-2" />
                                                  <span class="text-sm font-bold text-gray-800">Ellie Bamber</span>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
</body>

</html>