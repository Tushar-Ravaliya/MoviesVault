<?php
include("Nevigation.php");

include("../../config/connection.php");

// Get the movie_id from URL parameter
$movie_id = isset($_GET['movie_id']) ? intval($_GET['movie_id']) : 0;

// If no movie_id is provided, redirect to movies list or show an error
if ($movie_id === 0) {
     echo "<div class='mx-32 mt-5 p-4 bg-red-100 text-red-700'>No movie selected!</div>";
     include("Footer.php");
     exit();
}

// Fetch movie details
$movie_query = "SELECT * FROM movies WHERE movie_id = $movie_id";
$movie_result = mysqli_query($conn, $movie_query);
$movie = mysqli_fetch_assoc($movie_result);

if (!$movie) {
     echo "<div class='mx-32 mt-5 p-4 bg-red-100 text-red-700'>Movie not found!</div>";
     include("Footer.php");
     exit();
}

// Fetch showtimes for this movie, grouped by theater
$showtimes_query = "
    SELECT 
        s.id AS showtime_id,
        s.showtime_date,
        s.showtime_time,
        s.price,
        s.status,
        t.id AS theater_id,
        t.title AS theater_title,
        t.area AS theater_area,
        sc.screen_name,
        sc.screen_type
    FROM 
        showtimes s
    JOIN 
        theaters t ON s.theater_id = t.id
    JOIN 
        screens sc ON s.screen_id = sc.id
    WHERE 
        s.movie_id = $movie_id 
        AND s.status = 'active'
        AND t.status = 'Active'
        AND sc.status = 'active'
        AND (s.showtime_date > CURDATE() 
            OR (s.showtime_date = CURDATE() AND s.showtime_time > CURTIME()))
    ORDER BY 
        t.title, s.showtime_date, s.showtime_time
";

$showtimes_result = mysqli_query($conn, $showtimes_query);

// Group showtimes by theater
$theaters = [];
while ($row = mysqli_fetch_assoc($showtimes_result)) {
     $theater_id = $row['theater_id'];

     if (!isset($theaters[$theater_id])) {
          $theaters[$theater_id] = [
               'name' => $row['theater_title'],
               'area' => $row['theater_area'],
               'showtimes' => []
          ];
     }

     // Format showtime and add additional info
     $showtime_date = date('M d', strtotime($row['showtime_date']));
     $showtime_time = date('h:i A', strtotime($row['showtime_time']));

     $theaters[$theater_id]['showtimes'][] = [
          'id' => $row['showtime_id'],
          'date' => $showtime_date,
          'time' => $showtime_time,
          'screen' => $row['screen_name'],
          'screen_type' => $row['screen_type'],
          'price' => $row['price']
     ];
}
?>

<div class="m-10 mx-32">
     <h1 class="text-4xl mb-3"><?php echo htmlspecialchars($movie['title']); ?></h1>
     <div class="flex gap-4 text-gray-600">
          <span><?php echo htmlspecialchars($movie['duration']); ?> min</span>
          <span>•</span>
          <span><?php echo htmlspecialchars($movie['age_rating']); ?></span>
          <span>•</span>
          <span>Released: <?php echo date('M d, Y', strtotime($movie['release_date'])); ?></span>
     </div>
</div>

<div class="px-32 py-5">
     <?php if (empty($theaters)): ?>
     <div class="bg-yellow-50 p-8 text-center rounded-md shadow-md">
          <h2 class="text-2xl text-yellow-700 mb-2">No Showtimes Available</h2>
          <p class="text-yellow-600">There are currently no scheduled showtimes for this movie.</p>
     </div>
     <?php else: ?>
     <h2 class="text-2xl mb-5 font-bold text-gray-800">Available Showtimes</h2>

     <!-- Date selector tabs -->
     <div class="mb-6">
          <?php
               // Get unique dates from all theaters' showtimes
               $all_dates = [];
               foreach ($theaters as $theater) {
                    foreach ($theater['showtimes'] as $showtime) {
                         $date_raw = date('Y-m-d', strtotime($showtime['date']));
                         if (!in_array($date_raw, $all_dates)) {
                              $all_dates[] = $date_raw;
                         }
                    }
               }
               sort($all_dates);
               ?>

          <div class="flex space-x-2 overflow-x-auto pb-2">
               <?php foreach ($all_dates as $index => $date): ?>
               <?php
                         $date_formatted = date('D, M d', strtotime($date));
                         $is_active = $index === 0; // First date is active by default
                         ?>
               <button
                    class="date-tab px-4 py-2 rounded-full <?php echo $is_active ? 'bg-green-500 text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200'; ?>"
                    data-date="<?php echo $date; ?>">
                    <?php echo $date_formatted; ?>
               </button>
               <?php endforeach; ?>
          </div>
     </div>

     <div class="grid grid-cols-1 gap-6">
          <?php foreach ($theaters as $theater_id => $theater): ?>
          <div class="bg-white shadow-md rounded-lg overflow-hidden border border-gray-100">
               <div class="bg-gray-50 p-4 border-b border-gray-100">
                    <h3 class="text-xl font-medium text-gray-800"><?php echo htmlspecialchars($theater['name']); ?></h3>
                    <p class="text-gray-600 flex items-center mt-1">
                         <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                              stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                   d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                   d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                         </svg>
                         <?php echo htmlspecialchars($theater['area']); ?>
                    </p>
               </div>

               <?php
                         // Group showtimes by screen type
                         $screen_types = [];
                         foreach ($theater['showtimes'] as $showtime) {
                              if (!isset($screen_types[$showtime['screen_type']])) {
                                   $screen_types[$showtime['screen_type']] = [];
                              }
                              $screen_types[$showtime['screen_type']][] = $showtime;
                         }
                         ?>

               <div class="p-4">
                    <?php foreach ($screen_types as $screen_type => $showtimes): ?>
                    <div class="mb-4 last:mb-0">
                         <div class="flex items-center mb-2">
                              <span
                                   class="text-sm font-medium text-gray-700 bg-gray-100 px-3 py-1 rounded-full"><?php echo htmlspecialchars($screen_type); ?></span>
                         </div>

                         <div class="flex flex-wrap gap-3">
                              <?php foreach ($showtimes as $showtime): ?>
                              <div class="showtime-item"
                                   data-date="<?php echo date('Y-m-d', strtotime($showtime['date'])); ?>">
                                   <?php
                                                       if (isset($_SESSION['email'])){
                                                       ?>
                                   <a href="selectSeats.php?showtime_id=<?php echo $showtime['id']; ?>" class="group">
                                        <div class="flex flex-col items-center transition-transform hover:scale-105">
                                             <div class="text-sm text-gray-500 mb-1"><?php echo $showtime['date']; ?>
                                             </div>
                                             <div
                                                  class="text-green-600 font-medium border-2 border-green-500 hover:bg-green-500 hover:text-white transition-colors px-5 py-2 rounded-md text-center">
                                                  <?php echo $showtime['time']; ?>
                                             </div>
                                             <div class="text-xs mt-2 flex items-center justify-center gap-1">
                                                  <span
                                                       class="text-gray-700 font-medium"><?php echo $showtime['screen']; ?></span>
                                                  <span class="text-gray-400">•</span>
                                                  <span class="text-gray-700">₹<?php echo $showtime['price']; ?></span>
                                             </div>
                                        </div>
                                   </a>
                                   <?php
                                                       }
                                                       else {
                                                            ?>
                                   <a href="login.php?showtime_id=<?php echo $showtime['id']; ?>" class="group">
                                        <div class="flex flex-col items-center transition-transform hover:scale-105">
                                             <div class="text-sm text-gray-500 mb-1"><?php echo $showtime['date']; ?>
                                             </div>
                                             <div
                                                  class="text-green-600 font-medium border-2 border-green-500 hover:bg-green-500 hover:text-white transition-colors px-5 py-2 rounded-md text-center">
                                                  <?php echo $showtime['time']; ?>
                                             </div>
                                             <div class="text-xs mt-2 flex items-center justify-center gap-1">
                                                  <span
                                                       class="text-gray-700 font-medium"><?php echo $showtime['screen']; ?></span>
                                                  <span class="text-gray-400">•</span>
                                                  <span class="text-gray-700">₹<?php echo $showtime['price']; ?></span>
                                             </div>
                                        </div>
                                   </a>
                                   <?php
                                                       }
                                                       ?>

                              </div>
                              <?php endforeach; ?>
                         </div>
                    </div>
                    <?php endforeach; ?>
               </div>
          </div>
          <?php endforeach; ?>
     </div>

     <!-- Simple JavaScript to filter showtimes by date -->
     <script>
     document.addEventListener('DOMContentLoaded', function() {
          // Show showtimes for the first date by default
          const firstDateButton = document.querySelector('.date-tab');
          if (firstDateButton) {
               const firstDate = firstDateButton.getAttribute('data-date');
               filterShowtimesByDate(firstDate);
          }

          // Add click event to date tabs
          document.querySelectorAll('.date-tab').forEach(button => {
               button.addEventListener('click', function() {
                    // Remove active class from all tabs
                    document.querySelectorAll('.date-tab').forEach(btn => {
                         btn.classList.remove('bg-green-500', 'text-white');
                         btn.classList.add('bg-gray-100', 'text-gray-600',
                              'hover:bg-gray-200');
                    });

                    // Add active class to clicked tab
                    this.classList.add('bg-green-500', 'text-white');
                    this.classList.remove('bg-gray-100', 'text-gray-600',
                         'hover:bg-gray-200');

                    // Filter showtimes by selected date
                    const selectedDate = this.getAttribute('data-date');
                    filterShowtimesByDate(selectedDate);
               });
          });

          function filterShowtimesByDate(date) {
               // Hide all showtimes
               document.querySelectorAll('.showtime-item').forEach(item => {
                    item.style.display = 'none';
               });

               // Show showtimes for selected date
               document.querySelectorAll(`.showtime-item[data-date="${date}"]`).forEach(item => {
                    item.style.display = 'block';
               });
          }
     });
     </script>
     <?php endif; ?>
</div>

<?php include("Footer.php"); ?>