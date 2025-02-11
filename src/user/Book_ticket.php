<?php include("Nevigation.php") ?>
<!DOCTYPE html>
     <div class="justify-center flex content-center">
          <form action="" class="text-lg py-5">
               How many seat do you want to book?
               <input type="text" name="name" placeholder="Enter Seat" class="border-2 border-gray-500 rounded-md p-1">
               <input type="submit"
                    class="border border-red-500 px-5 py-1 text-red-500 rounded-md hover:bg-red-500 hover:text-white"
                    value="Submit">
          </form>
     </div>
     <div class="w-auto h-5 justify-center flex content-center bg-gray-400 mx-32 mb-32 mt-5"></div>

     <div class="flex flex-wrap justify-center mb-5">

          <?php 
          for ($i=0; $i < 50; $i++) { 
               ?>
          <div class="bg-gray-200 h-54 w-52 m-2 p-2 text-center rounded-md hover:bg-slate-700 hover:text-white">
               <?php
                    echo $i;
               ?>
          </div>
          <?php
          }
     ?>
     </div>
<?php include ("Footer.php") ?>