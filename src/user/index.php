<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <link href="../../output.css" rel="stylesheet">

     <style>
          @keyframes appear {
               from {
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

          /* Responsive styles */
          .container {
               width: 100%;
               max-width: 1440px;
               margin: 0 auto;
          }

          .hero-content {
               width: 90%;
               max-width: 600px;
               padding: 1rem;
          }

          .movie-grid {
               display: grid;
               grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
               gap: 1.5rem;
               width: 100%;
          }

          .movie-card {
               height: 100%;
               transition: transform 0.3s ease;
          }

          .movie-card:hover {
               transform: translateY(-5px);
          }

          .movie-image {
               height: auto;
               width: 100%;
               aspect-ratio: 2/3;
               object-fit: cover;
               transition: transform 0.3s ease;
          }

          .movie-card:hover .movie-image {
               transform: scale(1.05);
          }

          @media (max-width: 768px) {
               .hero-content {
                    width: 95%;
               }
          }

          @media (max-width: 640px) {
               .movie-grid {
                    grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
                    gap: 1rem;
               }
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
// Fetch homepage content
$fetch_query = "SELECT * FROM homepage_content WHERE id = 1";
$result = mysqli_query($conn, $fetch_query);
$homepage_content = mysqli_fetch_assoc($result);

// If no content exists, use default
if (!$homepage_content) {
     $homepage_content = [
          'title' => 'Welcome to Our Site',
          'content' => 'This is the default homepage content. Please set up your homepage content from the admin panel.',
          'image_path' => 'default_image.jpg'
     ];
}
?>
<div class="container">
     <?php
     include("Nevigation.php")
     ?>
     <!-- hero image start -->
     <div class="block w-full animates">
          <div class="relative w-full" style="height: 80vh; max-height: 700px; min-height: 300px;">
               <img src="../../public/Images/<?php echo htmlspecialchars($homepage_content['image_path']); ?>" 
                    alt="Hero Image" 
                    class="absolute inset-0 w-full h-full object-cover">
               
               <div class="absolute inset-0 bg-zinc-900/60 flex justify-center items-center">
                    <div class="hero-content flex flex-col items-center">
                         <div class="w-full max-w-xs sm:max-w-sm md:max-w-md flex justify-center">
                              <img src="../../public/Images/logo-white.png" alt="Logo" class="w-full max-w-full h-auto">
                         </div>
                         <div class="text-white text-center mt-6 text-base sm:text-lg">
                              <span><?php echo nl2br(htmlspecialchars($homepage_content['content'])); ?></span>
                         </div>
                    </div>
               </div>
          </div>
     </div>
     <!-- hero image end -->
     
     <!-- Movies section start -->
     <div class="w-full ">
          <div class="p-4 sm:p-6 md:p-10">
               <h2 class="text-2xl sm:text-3xl font-medium mb-6">Recommended for You ♥</h2>
               
               <div class="px-2 sm:px-4 md:px-6">
                    <?php if (empty($movies)): ?>
                         <div class="bg-white p-6 rounded-lg border border-neutral-200/30 text-center">
                              <p class="text-neutral-600">No movies found matching your criteria.</p>
                         </div>
                    <?php else: ?>
                         <div class="movie-grid">
                              <?php foreach ($movies as $movie): ?>
                                   <div class="movie-card rounded-lg overflow-hidden">
                                        <a href="../user/movieDetails.php?id=<?php echo $movie['movie_id']; ?>" class="block h-full">
                                             <div class="overflow-hidden">
                                                  <img src="<?php echo !empty($movie['poster_path']) ? '../../public/Images/' . htmlspecialchars($movie['poster_path']) : 'public/Images/default-poster.jpg'; ?>" 
                                                       alt="<?php echo htmlspecialchars($movie['title']); ?>"
                                                       class="movie-image">
                                             </div>
                                             <div class="p-2">
                                                  <h3 class="font-medium truncate"><?php echo htmlspecialchars($movie['title']); ?></h3>
                                                  <p class="text-gray-400 text-sm truncate"><?php echo htmlspecialchars($movie['genres']); ?></p>
                                             </div>
                                        </a>
                                   </div>
                              <?php endforeach; ?>
                         </div>
                    <?php endif; ?>
               </div>
          </div>
     </div>
     <!-- movies end -->
</div>
<?php
include("Footer.php");
?>