<?php
include("Nevigation.php");
// include("../../config/connection.php");
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
          END as status,
          COALESCE(AVG(r.rating), 0) as average_rating,
          COUNT(r.review_id) as review_count
          FROM movies m
          LEFT JOIN movie_genres g ON m.movie_id = g.movie_id
          LEFT JOIN movie_cast c ON m.movie_id = c.movie_id
          LEFT JOIN movie_reviews r ON m.movie_id = r.movie_id
          WHERE m.movie_id = ? 
          GROUP BY m.movie_id";
$user_logged_in = isset($_SESSION['user_id']);
$user_id = $user_logged_in ? $_SESSION['user_id'] : 0;
$has_purchased_ticket = false;
$has_reviewed = false;
$user_review = null;
if ($user_logged_in) {
     // Check if user has purchased a ticket for this movie
     $ticket_check_query = "SELECT COUNT(*) as ticket_count FROM bookings b 
                           JOIN showtimes s ON b.showtime_id = s.id 
                           WHERE b.user_id = ? AND s.movie_id = ? AND b.booking_status = 'confirmed'";
     $ticket_stmt = $conn->prepare($ticket_check_query);
     $ticket_stmt->bind_param("ii", $user_id, $movie_id);
     $ticket_stmt->execute();
     $ticket_result = $ticket_stmt->get_result();
     $ticket_data = $ticket_result->fetch_assoc();
     $has_purchased_ticket = ($ticket_data['ticket_count'] > 0);

     // Check if user has already reviewed the movie
     $review_check_query = "SELECT * FROM movie_reviews WHERE movie_id = ? AND user_id = ?";
     $review_stmt = $conn->prepare($review_check_query);
     $review_stmt->bind_param("ii", $movie_id, $user_id);
     $review_stmt->execute();
     $review_result = $review_stmt->get_result();

     if ($review_result->num_rows > 0) {
          $has_reviewed = true;
          $user_review = $review_result->fetch_assoc();
     }
}
// Handle form submission for adding/editing reviews
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_review']) && $user_logged_in && $has_purchased_ticket) {
     $rating = floatval($_POST['rating']);
     $review_text = trim($_POST['review_text']);

     // Validate input
     if ($rating < 1 || $rating > 5) {
          $error_message = "Please select a rating from 1 to 5.";
     } else {
          if ($has_reviewed) {
               // Update existing review
               $update_query = "UPDATE movie_reviews SET rating = ?, review_text = ? WHERE movie_id = ? AND user_id = ?";
               $update_stmt = $conn->prepare($update_query);
               $update_stmt->bind_param("dsii", $rating, $review_text, $movie_id, $user_id);

               if ($update_stmt->execute()) {
                    $success_message = "Your review has been updated!";
                    $user_review['rating'] = $rating;
                    $user_review['review_text'] = $review_text;
               } else {
                    $error_message = "Error updating your review. Please try again.";
               }
          } else {
               // Insert new review
               $insert_query = "INSERT INTO movie_reviews (movie_id, user_id, rating, review_text) VALUES (?, ?, ?, ?)";
               $insert_stmt = $conn->prepare($insert_query);
               $insert_stmt->bind_param("iids", $movie_id, $user_id, $rating, $review_text);

               if ($insert_stmt->execute()) {
                    $success_message = "Your review has been submitted!";
                    $has_reviewed = true;
                    $user_review = [
                         'rating' => $rating,
                         'review_text' => $review_text,
                         'review_date' => date('Y-m-d H:i:s')
                    ];
               } else {
                    $error_message = "Error submitting your review. Please try again.";
               }
          }

          echo "<script>window.location.href='movieDetails.php?id=" . $movie_id . "';</script>";
          exit;
     }
}
// Get all reviews for this movie
$all_reviews_query = "SELECT r.*, u.name as user_name, u.pic as user_pic 
                     FROM movie_reviews r
                     JOIN users u ON r.user_id = u.id
                     WHERE r.movie_id = ?
                     ORDER BY r.review_date DESC";
$all_reviews_stmt = $conn->prepare($all_reviews_query);
$all_reviews_stmt->bind_param("i", $movie_id);
$all_reviews_stmt->execute();
$all_reviews_result = $all_reviews_stmt->get_result();
$all_reviews = [];
while ($review = $all_reviews_result->fetch_assoc()) {
     $all_reviews[] = $review;
}
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
                              class="aspect-[2/3] bg-gray-300 rounded-lg shadow-lg object-cover">
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
                                   <span><?php echo number_format($movie_data['average_rating'], 1); ?>/5</span>
                                   <span class="text-sm text-gray-500">(<?php echo $movie_data['review_count']; ?> reviews)</span>
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
                         <button id="castTab" class="px-4 py-2 border-b-2 border-red-600 text-red-600">Cast & Crew</button>
                         <button id="reviewsTab" class="px-4 py-2 text-gray-600 hover:text-red-600">Reviews</button>
                    </div>
               </div>

               <!-- Cast & Crew Section -->
               <div id="castSection" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-6">

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
               <div id="reviewsSection" class="hidden">
                    <div class="mb-8">
                         <div class="flex items-center justify-between mb-6">
                              <h2 class="text-2xl font-bold">Reviews (<?php echo count($all_reviews); ?>)</h2>
                              <?php if ($user_logged_in && $has_purchased_ticket && !$has_reviewed): ?>
                                   <button id="writeReviewBtn" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition-colors">
                                        Write a Review
                                   </button>
                              <?php elseif (!$user_logged_in): ?>
                                   <a href="login.php" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition-colors">
                                        Log in to Review
                                   </a>
                              <?php elseif (!$has_purchased_ticket): ?>
                                   <span class="text-gray-500 text-sm">You need to book tickets for this movie to leave a review</span>
                              <?php endif; ?>
                         </div>

                         <!-- Review Form (Initially Hidden) -->
                         <div id="reviewForm" class="bg-white rounded-lg shadow-md p-6 mb-8 <?php echo (!$has_reviewed && isset($_GET['write_review'])) ? '' : 'hidden'; ?>">
                              <h3 class="text-xl font-bold mb-4"><?php echo $has_reviewed ? 'Edit Your Review' : 'Write a Review'; ?></h3>

                              <?php if (isset($error_message)): ?>
                                   <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                                        <?php echo $error_message; ?>
                                   </div>
                              <?php endif; ?>

                              <form action="" method="post">
                                   <div class="mb-4">
                                        <label class="block text-gray-700 mb-2">Your Rating</label>
                                        <div class="flex items-center gap-2">
                                             <!-- Rating -->
                                             <div class="flex flex-row-reverse justify-end items-center">
                                                  <input id="hs-ratings-1" type="radio" class="peer -ms-5 size-5 bg-transparent border-0 text-transparent cursor-pointer appearance-none checked:bg-none focus:bg-none focus:ring-0 focus:ring-offset-0" name="rating" value="5" <?php echo ($has_reviewed && $user_review['rating'] == 1) ? 'checked' : ''; ?>>
                                                  <label for="hs-ratings-1" class="peer-checked:text-yellow-400 text-gray-300 dark:peer-checked:text-yellow-600 dark:text-neutral-600">
                                                       <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                                       </svg>
                                                  </label>
                                                  <input id="hs-ratings-2" type="radio" class="peer -ms-5 size-5 bg-transparent border-0 text-transparent cursor-pointer appearance-none checked:bg-none focus:bg-none focus:ring-0 focus:ring-offset-0" name="rating" value="4" <?php echo ($has_reviewed && $user_review['rating'] == 2) ? 'checked' : ''; ?>>
                                                  <label for="hs-ratings-2" class="peer-checked:text-yellow-400 text-gray-300 dark:peer-checked:text-yellow-600 dark:text-neutral-600">
                                                       <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                                       </svg>
                                                  </label>
                                                  <input id="hs-ratings-3" type="radio" class="peer -ms-5 size-5 bg-transparent border-0 text-transparent cursor-pointer appearance-none checked:bg-none focus:bg-none focus:ring-0 focus:ring-offset-0" name="rating" value="3" <?php echo ($has_reviewed && $user_review['rating'] == 3) ? 'checked' : ''; ?>>
                                                  <label for="hs-ratings-3" class="peer-checked:text-yellow-400 text-gray-300 dark:peer-checked:text-yellow-600 dark:text-neutral-600">
                                                       <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                                       </svg>
                                                  </label>
                                                  <input id="hs-ratings-4" type="radio" class="peer -ms-5 size-5 bg-transparent border-0 text-transparent cursor-pointer appearance-none checked:bg-none focus:bg-none focus:ring-0 focus:ring-offset-0" name="rating" value="2" <?php echo ($has_reviewed && $user_review['rating'] == 4) ? 'checked' : ''; ?>>
                                                  <label for="hs-ratings-4" class="peer-checked:text-yellow-400 text-gray-300 dark:peer-checked:text-yellow-600 dark:text-neutral-600">
                                                       <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                                       </svg>
                                                  </label>
                                                  <input id="hs-ratings-5" type="radio" class="peer -ms-5 size-5 bg-transparent border-0 text-transparent cursor-pointer appearance-none checked:bg-none focus:bg-none focus:ring-0 focus:ring-offset-0" name="rating" value="1" <?php echo ($has_reviewed && $user_review['rating'] == 5) ? 'checked' : ''; ?>>
                                                  <label for="hs-ratings-5" class="peer-checked:text-yellow-400 text-gray-300 dark:peer-checked:text-yellow-600 dark:text-neutral-600">
                                                       <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                                       </svg>
                                                  </label>
                                             </div>
                                             <!-- End Rating -->
                                             <span id="ratingValue" class="ml-2 font-medium">
                                                  <?php echo $has_reviewed ? $user_review['rating'] : '0'; ?>
                                             </span>
                                        </div>
                                   </div>

                                   <div class="mb-4">
                                        <label for="review_text" class="block text-gray-700 mb-2">Your Review</label>
                                        <textarea name="review_text" id="review_text" rows="4" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-red-500"><?php echo $has_reviewed ? htmlspecialchars($user_review['review_text']) : ''; ?></textarea>
                                   </div>

                                   <div class="flex justify-end gap-3">
                                        <button type="button" id="cancelReview" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300 transition-colors">Cancel</button>
                                        <button type="submit" name="submit_review" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition-colors">
                                             <?php echo $has_reviewed ? 'Update Review' : 'Submit Review'; ?>
                                        </button>
                                   </div>
                              </form>
                         </div>

                         <!-- User's Current Review (if exists) -->
                         <?php if ($has_reviewed): ?>
                              <div id="userCurrentReview" class="bg-white rounded-lg shadow-md p-6 mb-8 border-l-4 border-red-500">
                                   <div class="flex justify-between items-start mb-4">
                                        <div class="flex items-center gap-3">
                                             <img src="../../public/profile/<?php echo htmlspecialchars($_SESSION['pic'] ?? 'profile-pic.png'); ?>" class="w-12 h-12 rounded-full">
                                             <div>
                                                  <h4 class="font-medium"><?php echo htmlspecialchars($_SESSION['name'] ?? 'You'); ?></h4>
                                                  <div class="flex items-center">
                                                       <!-- Rating display -->
                                                       <div class="flex">
                                                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                                                 <svg class="shrink-0 size-5 <?php echo ($user_review['rating'] >= $i) ? 'text-yellow-400' : 'text-gray-300'; ?>" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                                      <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                                                 </svg>
                                                            <?php endfor; ?>
                                                            <span class="text-sm ml-1"><?php echo number_format($user_review['rating'], 1); ?></span>
                                                       </div>
                                                  </div>
                                             </div>
                                        </div>
                                        <button id="editReviewBtn" class="text-blue-600 hover:text-blue-800">
                                             <i class="fa-solid fa-edit"></i> Edit
                                        </button>
                                   </div>
                                   <p class="text-gray-700"><?php echo nl2br(htmlspecialchars($user_review['review_text'])); ?></p>
                                   <div class="text-sm text-gray-500 mt-2">
                                        <?php echo date('F j, Y', strtotime($user_review['review_date'])); ?>
                                   </div>
                              </div>
                         <?php endif; ?>

                         <!-- All Reviews -->
                         <div class="space-y-6">
                              <?php if (count($all_reviews) > 0): ?>
                                   <?php foreach ($all_reviews as $review): ?>
                                        <?php if ($user_logged_in && $review['user_id'] == $user_id) continue; // Skip user's own review as it's shown above 
                                        ?>
                                        <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100">
                                             <div class="flex items-center gap-3 mb-3">
                                                  <img src="../../public/Images/<?php echo htmlspecialchars($review['user_pic']); ?>" class="w-10 h-10 rounded-full">
                                                  <div>
                                                       <h4 class="font-medium"><?php echo htmlspecialchars($review['user_name']); ?></h4>
                                                       <div class="flex items-center">
                                                            <!-- Rating display -->
                                                            <div class="flex">
                                                                 <?php for ($i = 1; $i <= 5; $i++): ?>
                                                                      <svg class="shrink-0 size-5 <?php echo ($review['rating'] >= $i) ? 'text-yellow-400' : 'text-gray-300'; ?>" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                                           <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                                                      </svg>
                                                                 <?php endfor; ?>
                                                                 <span class="text-sm ml-1"><?php echo number_format($review['rating'], 1); ?></span>
                                                            </div>
                                                       </div>
                                                  </div>
                                             </div>
                                             <p class="text-gray-700"><?php echo nl2br(htmlspecialchars($review['review_text'])); ?></p>
                                             <div class="text-sm text-gray-500 mt-2">
                                                  <?php echo date('F j, Y', strtotime($review['review_date'])); ?>
                                             </div>
                                        </div>
                                   <?php endforeach; ?>
                              <?php else: ?>
                                   <div class="text-center py-8 text-gray-500">
                                        <p>No reviews yet. Be the first to review this movie!</p>
                                   </div>
                              <?php endif; ?>
                         </div>
                    </div>
               </div>
          </div>
     </section>
</div>
<script>
     document.addEventListener('DOMContentLoaded', function() {
          // Tab switching
          const castTab = document.getElementById('castTab');
          const reviewsTab = document.getElementById('reviewsTab');
          const castSection = document.getElementById('castSection');
          const reviewsSection = document.getElementById('reviewsSection');

          // Check if URL has #reviews fragment
          if (window.location.hash === '#reviews') {
               castTab.classList.remove('border-red-600', 'text-red-600');
               reviewsTab.classList.add('border-b-2', 'border-red-600', 'text-red-600');
               castSection.classList.add('hidden');
               reviewsSection.classList.remove('hidden');
          }

          castTab.addEventListener('click', function() {
               castTab.classList.add('border-b-2', 'border-red-600', 'text-red-600');
               reviewsTab.classList.remove('border-b-2', 'border-red-600', 'text-red-600');
               castSection.classList.remove('hidden');
               reviewsSection.classList.add('hidden');
               window.history.pushState({}, '', window.location.pathname + window.location.search);
          });

          reviewsTab.addEventListener('click', function() {
               reviewsTab.classList.add('border-b-2', 'border-red-600', 'text-red-600');
               castTab.classList.remove('border-b-2', 'border-red-600', 'text-red-600');
               reviewsSection.classList.remove('hidden');
               castSection.classList.add('hidden');
               window.history.pushState({}, '', window.location.pathname + window.location.search + '#reviews');
          });

          // Show/hide review form
          const writeReviewBtn = document.getElementById('writeReviewBtn');
          const reviewForm = document.getElementById('reviewForm');
          const cancelReview = document.getElementById('cancelReview');

          if (writeReviewBtn) {
               writeReviewBtn.addEventListener('click', function() {
                    reviewForm.classList.remove('hidden');
                    writeReviewBtn.classList.add('hidden');
               });
          }

          if (cancelReview) {
               cancelReview.addEventListener('click', function() {
                    reviewForm.classList.add('hidden');
                    if (writeReviewBtn) {
                         writeReviewBtn.classList.remove('hidden');
                    }
               });
          }

          // Edit review functionality
          const editReviewBtn = document.getElementById('editReviewBtn');
          const userCurrentReview = document.getElementById('userCurrentReview');

          if (editReviewBtn && userCurrentReview) {
               editReviewBtn.addEventListener('click', function() {
                    reviewForm.classList.remove('hidden');
                    userCurrentReview.classList.add('hidden');
               });
          }

          // Star rating functionality - update for radio buttons
          const ratingInputs = document.querySelectorAll('input[name="rating"]');
          const ratingValue = document.getElementById('ratingValue');

          ratingInputs.forEach(input => {
               input.addEventListener('change', function() {
                    ratingValue.textContent = this.value;
               });
          });
     });
</script>
<?php include_once("Footer.php"); ?>