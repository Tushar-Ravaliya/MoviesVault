 <?php
     include("Nevigation.php");
     include("../../config/connection.php");
     if (!isset($_GET['id']) || empty($_GET['id'])) {
          header("Location: manage_movies.php");
          exit;
     }

     $movie_id = intval($_GET['id']);
     $movie_query = "SELECT m.*,
                GROUP_CONCAT(DISTINCT g.genre_name SEPARATOR ', ') as genres,
                GROUP_CONCAT(DISTINCT CONCAT(c.actor_name, ' as ', c.character_name) SEPARATOR ', ') as cast,
                CASE
                    WHEN m.release_date > CURDATE() THEN 'Coming Soon'
                    WHEN m.release_date <= CURDATE() AND DATE_ADD(m.release_date, INTERVAL 30 DAY) >= CURDATE() THEN 'Now Showing'
                    ELSE 'Ended'
                END as status
                FROM movies m
                LEFT JOIN movie_genres g ON m.movie_id = g.movie_id
                LEFT JOIN movie_cast c ON m.movie_id = c.movie_id
                WHERE m.movie_id = ? 
                GROUP BY m.movie_id";

     // Execute movie query
     $movie_stmt = $conn->prepare($movie_query);
     $movie_stmt->bind_param("i", $movie_id); // Assuming $movie_id contains the ID of the movie you want
     $movie_stmt->execute();
     $result = $movie_stmt->get_result();
     $movie_data = $result->fetch_assoc(); // This will contain a single movie with genres and cast;

     ?>
 <div id="root">
      <section id="movieDetails" class="py-16 bg-gray-50">
           <div class="container mx-auto px-4">
                <!-- Movie Header -->
                <div class="flex flex-col md:flex-row gap-8 mb-12">
                     <!-- Movie Poster -->
                     <div class="w-full md:w-1/3 lg:w-1/4">
                          <img src="../../public/Images/<?php echo htmlspecialchars($movie_data['poster_path']); ?>"
                               class="aspect-[2/3] bg-gray-300 rounded-lg shadow-lg">
                     </div>

                     <!-- Movie Info -->
                     <div class="flex-1">
                          <div class="flex items-center gap-4 mb-4">
                               <h1 class="text-3xl md:text-4xl font-bold"><?php echo htmlspecialchars($movie_data['title']); ?></h1>
                               <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">Now
                                    Showing</span>
                          </div>

                          <div class="flex items-center gap-4 text-gray-600 mb-6">
                               <div class="flex items-center gap-1">
                                    <i class="fa-solid fa-star text-yellow-400"></i>
                                    <span>4.8/5</span>
                               </div>
                               <span>•</span>
                               <span><?php echo floor($movie_data['duration'] / 60) . 'h ' . ($movie_data['duration'] % 60) . 'm'; ?></span>
                               <span>•</span>
                               <span><?php echo htmlspecialchars($movie_data['genres']); ?></span>
                               <span>•</span>
                               <span>PG-13</span>
                               <span>•</span>
                               <span><?php echo $movie_data['release_date']; ?></span>
                          </div>

                          <p class="text-gray-700 mb-8 leading-relaxed">
                               <?php echo $movie_data['description']; ?>
                          </p>

                          <div class="flex flex-wrap gap-4 mb-8">
                               <a href="Select_Tickets.php?movie_id=<?php echo $movie_id; ?>"
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
                     </div>
                </div>

                <!-- Cast & Crew Section -->
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-6">
                     <?php
                         // Get individual cast members
                         $cast_query = "SELECT * FROM movie_cast WHERE movie_id = ?";
                         $cast_stmt = $conn->prepare($cast_query);
                         $cast_stmt->bind_param("i", $movie_id);
                         $cast_stmt->execute();
                         $cast_result = $cast_stmt->get_result();

                         // Display each cast member
                         while ($cast_member = $cast_result->fetch_assoc()) {
                              echo '<div class="text-center">';
                         ?>
                          <?php if (!empty($cast_member['image_path'])): ?>
                               <img src="../../public/Images/<?php echo htmlspecialchars($cast_member['image_path']); ?>" class="w-24 h-24 mx-auto rounded-full object-cover mb-3">
                          <?php else: ?>
                               <div class="w-24 h-24 mx-auto rounded-full bg-gray-300 mb-3"></div>
                          <?php endif; ?>
                     <?php

                              echo '<h3 class="font-medium">' . htmlspecialchars($cast_member['actor_name']) . '</h3>';
                              echo '<p class="text-sm text-gray-600">' . htmlspecialchars($cast_member['character_name']) . '</p>';
                              echo '<p class="text-xs text-gray-500">' . htmlspecialchars($cast_member['role']) . '</p>';
                              echo '</div>';
                         }

                         // If no cast members found
                         if ($cast_result->num_rows == 0) {
                              echo '<div class="col-span-full text-center text-gray-500">No cast information available for this movie.</div>';
                         }
                         ?>
                </div>
           </div>
      </section>
 </div>
 <?php include_once("Footer.php"); ?>