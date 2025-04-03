<?php
include("../../config/connection.php");
$movie_query = "SELECT m.*, 
                GROUP_CONCAT(DISTINCT g.genre_name SEPARATOR ', ') as genres,
                'Coming Soon' as status
                FROM movies m
                LEFT JOIN movie_genres g ON m.movie_id = g.movie_id
                WHERE m.release_date > CURDATE() 
                GROUP BY m.movie_id 
                ORDER BY m.release_date DESC";
// Execute movie query
$movies = [];
$movie_stmt = $conn->prepare($movie_query);

if (!empty($params)) {
     // Use splat operator (...) for PHP 7.4+ or call_user_func_array for older versions
     $bind_params = array_merge([$types], $params);
     $movie_stmt->bind_param(...$bind_params);
}

$movie_stmt->execute();
$movies_result = $movie_stmt->get_result();

while ($movie = $movies_result->fetch_assoc()) {
     $movies[] = $movie;
}

?>
<?php
include("Nevigation.php");
?>
<div class="bg-gray-100 w-full flex-col justify-center relative z-20 items-center animates">
     <div class="p-10 font-serif font-semibold text-3xl text-red-500">
          <span>Coming Soon ...</span>
     </div>
     <div class="flex  px-10 flex-wrap justify-center">
          <?php if (empty($movies)): ?>
               <div class="bg-white w-full p-8 rounded-lg shadow-md text-center mb-5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                    </svg>
                    <h3 class="text-xl font-medium text-gray-900 mb-2">No Movies Found</h3>
                    <p class="text-gray-500 mb-6">No movies in coming soon</p>
                    <a href="index.php" class="inline-block bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-md transition">
                         Runnig Movies
                    </a>
               </div>
          <?php else: ?>
               <?php foreach ($movies as $movie): ?>
                    <div class="h-1/4 w-auto my-5 mx-10  rounded-lg animate ">
                         <a href="../user/movieDetails.php?id=<?php echo $movie['movie_id']; ?>">
                              <div class="h-1/4 bg-red-500 overflow-hidden  ">
                                   <img src="<?php echo !empty($movie['poster_path']) ? '../../public/Images/' . htmlspecialchars($movie['poster_path']) : 'public/Images/default-poster.jpg'; ?>" alt="<?php echo htmlspecialchars($movie['title']); ?>"
                                        class="h-96  min-h-80 hover:scale-110 hover:transition hover:ease-in-out hover:delay-150 transition object-cover object-center aspect-[2/3]">
                              </div>
                              <div class="font-medium">
                                   <span><?php echo htmlspecialchars($movie['title']); ?></span><br>
                                   <span class="text-gray-400"><?php echo htmlspecialchars($movie['genres']); ?></span>
                              </div>
                         </a>
                    </div>
               <?php endforeach; ?>
          <?php endif; ?>



     </div>

</div>

<?php
include("footer.php")
?>