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
<?php
include("../../config/connection.php");
$movie_query = "SELECT m.*, 
                GROUP_CONCAT(DISTINCT g.genre_name SEPARATOR ', ') as genres,
                CASE 
                    WHEN m.release_date > CURDATE() THEN 'Coming Soon'
                    WHEN m.release_date <= CURDATE() AND DATE_ADD(m.release_date, INTERVAL 30 DAY) >= CURDATE() THEN 'Now Showing'
                    ELSE 'Ended'
                END as status
                FROM movies m
                LEFT JOIN movie_genres g ON m.movie_id = g.movie_id
                WHERE 1=1 GROUP BY m.movie_id ORDER BY m.release_date DESC";
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
</div>
<!-- baground image end -->
<!-- Movie start-->
<div class="w-full flex-col justify-center relative z-20 items-center animates">
     <div class="p-10 text-3xl">
          Recomment for You ♥
     </div>
     <div class="flex bg-white px-10 flex-wrap justify-center">
          <?php if (empty($movies)): ?>
               <div class="bg-white p-6 rounded-lg border border-neutral-200/30 text-center">
                    <p class="text-neutral-600">No movies found matching your criteria.</p>
               </div>
          <?php else: ?>
               <?php foreach ($movies as $movie): ?>
                    <div class="h-1/4 w-auto my-5 mx-10  rounded-lg animate ">
                         <a href="../user/movieDetails.php?id=<?php echo $movie['movie_id']; ?>">
                              <div class="h-1/4 bg-red-500 overflow-hidden">
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
<!-- movies end -->
<!-- footer start-->
<!-- footer end -->
</div>
<?php
include("Footer.php");
?>