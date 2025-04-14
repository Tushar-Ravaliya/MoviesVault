<?php
session_start();
$page_title = "Cinema Admin Dashboard";
ob_start();
require_once '../../config/connection.php';

// Make sure a theater operator is logged in and get their theater ID
if (!isset($_SESSION['theater_id'])) {
    header("Location: login.php");
    exit;
}

$theater_id = $_SESSION['theater_id'];

// Get theater name for display
$theater_query = "SELECT title FROM theaters WHERE id = ?";
$stmt = $conn->prepare($theater_query);
$stmt->bind_param("i", $theater_id);
$stmt->execute();
$theater_result = $stmt->get_result();
$theater_data = $theater_result->fetch_assoc();
$theater_name = $theater_data['title'];
?>

<div class="mb-4">
    <h1 class="text-xl font-semibold text-gray-800">Dashboard for <?php echo htmlspecialchars($theater_name); ?></h1>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    <!-- Total Bookings Card -->
    <div class="bg-white border border-neutral-200 rounded-lg p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-neutral-600">Total Bookings</p>
                <h3 class="text-2xl font-bold text-neutral-900">
                    <?php
                    // Query to get total bookings count for this theater
                    $query = "SELECT COUNT(*) as total FROM bookings b 
                              JOIN showtimes s ON b.showtime_id = s.id 
                              WHERE b.booking_status = 'confirmed' 
                              AND s.theater_id = ?";
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param("i", $theater_id);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $row = $result->fetch_assoc();
                    echo number_format($row['total']);
                    ?>
                </h3>
            </div>
            <div class="bg-green-100 p-3 rounded-full">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
            </div>
        </div>
        <div class="mt-4 flex items-center text-sm">
            <?php
            // Query to get bookings growth compared to previous month for this theater
            $query = "SELECT 
                        (SELECT COUNT(*) FROM bookings b JOIN showtimes s ON b.showtime_id = s.id WHERE b.booking_status = 'confirmed' AND s.theater_id = ? AND MONTH(b.booking_date) = MONTH(CURRENT_DATE)) as current_month,
                        (SELECT COUNT(*) FROM bookings b JOIN showtimes s ON b.showtime_id = s.id WHERE b.booking_status = 'confirmed' AND s.theater_id = ? AND MONTH(b.booking_date) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)) as previous_month";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ii", $theater_id, $theater_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();

            $growth = 0;
            if ($row['previous_month'] > 0) {
                $growth = (($row['current_month'] - $row['previous_month']) / $row['previous_month']) * 100;
            }

            if ($growth >= 0) {
                echo "<span class='text-green-600'>↑ " . number_format($growth, 1) . "%</span>";
            } else {
                echo "<span class='text-red-600'>↓ " . number_format(abs($growth), 1) . "%</span>";
            }
            ?>
            <span class="text-neutral-600 ml-2">from last month</span>
        </div>
    </div>

    <!-- Revenue Card -->
    <div class="bg-white border border-neutral-200 rounded-lg p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-neutral-600">Revenue</p>
                <h3 class="text-2xl font-bold text-neutral-900">
                    <?php
                    // Query to get total revenue for this theater
                    $query = "SELECT SUM(b.total_amount) as revenue 
                              FROM bookings b 
                              JOIN showtimes s ON b.showtime_id = s.id 
                              WHERE b.booking_status = 'confirmed' 
                              AND s.theater_id = ?";
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param("i", $theater_id);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $row = $result->fetch_assoc();
                    echo "₹" . number_format($row['revenue'] ?? 0, 2);
                    ?>
                </h3>
            </div>
            <div class="bg-blue-100 p-3 rounded-full">
                <svg class="w-6 h-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 8.25H9m6 3H9m3 6-3-3h1.5a3 3 0 1 0 0-6M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>

            </div>
        </div>
        <div class="mt-4 flex items-center text-sm">
            <?php
            // Query to get revenue growth compared to previous month for this theater
            $query = "SELECT 
                        (SELECT SUM(b.total_amount) FROM bookings b 
                         JOIN showtimes s ON b.showtime_id = s.id 
                         WHERE b.booking_status = 'confirmed' 
                         AND s.theater_id = ? 
                         AND MONTH(b.booking_date) = MONTH(CURRENT_DATE)) as current_month,
                        (SELECT SUM(b.total_amount) FROM bookings b 
                         JOIN showtimes s ON b.showtime_id = s.id 
                         WHERE b.booking_status = 'confirmed' 
                         AND s.theater_id = ? 
                         AND MONTH(b.booking_date) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)) as previous_month";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ii", $theater_id, $theater_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();

            $growth = 0;
            if ($row['previous_month'] > 0) {
                $growth = (($row['current_month'] - $row['previous_month']) / $row['previous_month']) * 100;
            }

            if ($growth >= 0) {
                echo "<span class='text-green-600'>↑ " . number_format($growth, 1) . "%</span>";
            } else {
                echo "<span class='text-red-600'>↓ " . number_format(abs($growth), 1) . "%</span>";
            }
            ?>
            <span class="text-neutral-600 ml-2">from last month</span>
        </div>
    </div>

    <!-- Active Movies Card -->
    <div class="bg-white border border-neutral-200 rounded-lg p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-neutral-600">Active Movies</p>
                <h3 class="text-2xl font-bold text-neutral-900">
                    <?php
                    // Query to get count of movies with active showtimes for this theater
                    $query = "SELECT COUNT(DISTINCT movie_id) as active_movies 
                              FROM showtimes 
                              WHERE status = 'active' 
                              AND showtime_date >= CURDATE()
                              AND theater_id = ?";
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param("i", $theater_id);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $row = $result->fetch_assoc();
                    echo $row['active_movies'];
                    ?>
                </h3>
            </div>
            <div class="bg-purple-100 p-3 rounded-full">
                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z" />
                </svg>
            </div>
        </div>
        <div class="mt-4 flex items-center text-sm">
            <?php
            // Query to get new movies added in the last 30 days for this theater
            $query = "SELECT COUNT(DISTINCT m.movie_id) as new_movies 
                      FROM movies m
                      JOIN showtimes s ON m.movie_id = s.movie_id
                      WHERE s.theater_id = ?
                      AND m.release_date BETWEEN DATE_SUB(CURDATE(), INTERVAL 30 DAY) AND CURDATE()";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $theater_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            echo "<span class='text-purple-600'>+" . $row['new_movies'] . "</span>";
            ?>
            <span class="text-neutral-600 ml-2">new releases</span>
        </div>
    </div>

    <!-- Theater Occupancy Card -->
    <div class="bg-white border border-neutral-200 rounded-lg p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-neutral-600">Theater Occupancy</p>
                <h3 class="text-2xl font-bold text-neutral-900">
                    <?php
                    // Query to calculate average theater occupancy for this theater
                    $query = "SELECT 
                              AVG((b.num_tickets / s.seating_capacity) * 100) as avg_occupancy
                              FROM bookings b
                              JOIN showtimes sh ON b.showtime_id = sh.id
                              JOIN screens s ON sh.screen_id = s.id
                              WHERE b.booking_status = 'confirmed'
                              AND sh.theater_id = ?
                              AND sh.showtime_date BETWEEN DATE_SUB(CURDATE(), INTERVAL 7 DAY) AND CURDATE()";
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param("i", $theater_id);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $row = $result->fetch_assoc();
                    echo round($row['avg_occupancy'] ?? 0) . "%";
                    ?>
                </h3>
            </div>
            <div class="bg-yellow-100 p-3 rounded-full">
                <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                </svg>
            </div>
        </div>
        <div class="mt-4 flex items-center text-sm">
            <?php
            // Query to compare with previous week for this theater
            $query = "SELECT 
                      (SELECT AVG((b.num_tickets / s.seating_capacity) * 100) 
                       FROM bookings b
                       JOIN showtimes sh ON b.showtime_id = sh.id
                       JOIN screens s ON sh.screen_id = s.id
                       WHERE b.booking_status = 'confirmed'
                       AND sh.theater_id = ?
                       AND sh.showtime_date BETWEEN DATE_SUB(CURDATE(), INTERVAL 7 DAY) AND CURDATE()) as current_week,
                      (SELECT AVG((b.num_tickets / s.seating_capacity) * 100) 
                       FROM bookings b
                       JOIN showtimes sh ON b.showtime_id = sh.id
                       JOIN screens s ON sh.screen_id = s.id
                       WHERE b.booking_status = 'confirmed'
                       AND sh.theater_id = ?
                       AND sh.showtime_date BETWEEN DATE_SUB(CURDATE(), INTERVAL 14 DAY) AND DATE_SUB(CURDATE(), INTERVAL 7 DAY)) as previous_week";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ii", $theater_id, $theater_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();

            $change = ($row['current_week'] ?? 0) - ($row['previous_week'] ?? 0);

            if ($change >= 0) {
                echo "<span class='text-green-600'>↑ " . number_format($change, 1) . "%</span>";
            } else {
                echo "<span class='text-red-600'>↓ " . number_format(abs($change), 1) . "%</span>";
            }
            ?>
            <span class="text-neutral-600 ml-2">from last week</span>
        </div>
    </div>

    <!-- Revenue by Screen Chart -->
    <div class="col-span-1 md:col-span-2 p-4 md:p-5 min-h-102 flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl">
        <div class="flex flex-wrap justify-between items-center gap-2">
            <div>
                <h2 class="text-sm text-gray-500">
                    Revenue by Screen
                </h2>
                <p class="text-xl sm:text-2xl font-medium text-gray-800">
                    <?php
                    // Get total revenue for this theater
                    $query = "SELECT SUM(b.total_amount) as total 
                              FROM bookings b 
                              JOIN showtimes s ON b.showtime_id = s.id 
                              WHERE b.booking_status = 'confirmed'
                              AND s.theater_id = ?";
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param("i", $theater_id);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $row = $result->fetch_assoc();
                    echo "₹" . number_format($row['total'] ?? 0, 2);
                    ?>
                </p>
            </div>
        </div>

        <div id="screen-revenue-chart" class="mt-6" style="height: 300px;"></div>
    </div>

    <!-- Bookings Trend Chart -->
    <div class="col-span-1 md:col-span-2 p-4 md:p-5 min-h-102 flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl">
        <div class="flex flex-wrap justify-between items-center gap-2">
            <div>
                <h2 class="text-sm text-gray-500">
                    Booking Trends
                </h2>
                <p class="text-xl sm:text-2xl font-medium text-gray-800">
                    Last 30 Days
                </p>
            </div>
            <div>
                <?php
                // Calculate trend percentage for this theater
                $query = "SELECT 
                          COUNT(*) as recent_bookings,
                          (SELECT COUNT(*) FROM bookings b
                           JOIN showtimes s ON b.showtime_id = s.id
                           WHERE s.theater_id = ?
                           AND b.booking_date BETWEEN DATE_SUB(CURDATE(), INTERVAL 60 DAY) 
                           AND DATE_SUB(CURDATE(), INTERVAL 30 DAY)) as previous_bookings
                          FROM bookings b
                          JOIN showtimes s ON b.showtime_id = s.id
                          WHERE s.theater_id = ?
                          AND b.booking_date >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("ii", $theater_id, $theater_id);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();

                $trend = 0;
                if ($row['previous_bookings'] > 0) {
                    $trend = (($row['recent_bookings'] - $row['previous_bookings']) / $row['previous_bookings']) * 100;
                }

                if ($trend >= 0) {
                    echo '<span class="py-[5px] px-1.5 inline-flex items-center gap-x-1 text-xs font-medium rounded-md bg-green-100 text-green-800">
                            <svg class="inline-block size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 19V5" />
                                <path d="m5 12 7-7 7 7" />
                            </svg>
                            ' . number_format($trend, 1) . '%
                        </span>';
                } else {
                    echo '<span class="py-[5px] px-1.5 inline-flex items-center gap-x-1 text-xs font-medium rounded-md bg-red-100 text-red-800">
                            <svg class="inline-block size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 5v14" />
                                <path d="m19 12-7 7-7-7" />
                            </svg>
                            ' . number_format(abs($trend), 1) . '%
                        </span>';
                }
                ?>
            </div>
        </div>

        <div id="booking-trend-chart" class="mt-6" style="height: 300px;"></div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.37.1/apexcharts.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Screen Revenue Chart
        <?php
        // Get revenue data by screen for this theater
        $query = "SELECT sc.screen_name, SUM(b.total_amount) as revenue
                  FROM bookings b
                  JOIN showtimes s ON b.showtime_id = s.id
                  JOIN screens sc ON s.screen_id = sc.id
                  WHERE b.booking_status = 'confirmed'
                  AND s.theater_id = ?
                  GROUP BY sc.id
                  ORDER BY revenue DESC";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $theater_id);
        $stmt->execute();
        $result = $stmt->get_result();

        $screen_names = [];
        $screen_revenues = [];

        while ($row = $result->fetch_assoc()) {
            $screen_names[] = $row['screen_name'];
            $screen_revenues[] = floatval($row['revenue']);
        }
        ?>

        var screenRevenueOptions = {
            series: [{
                name: 'Revenue',
                data: <?php echo json_encode($screen_revenues); ?>
            }],
            chart: {
                type: 'bar',
                height: 300,
                toolbar: {
                    show: false
                }
            },
            plotOptions: {
                bar: {
                    horizontal: true,
                    borderRadius: 4
                }
            },
            dataLabels: {
                enabled: false
            },
            colors: ['#3b82f6'],
            xaxis: {
                categories: <?php echo json_encode($screen_names); ?>,
                labels: {
                    formatter: function(value) {
                        return '₹' + new Intl.NumberFormat().format(value);
                    }
                }
            },
            tooltip: {
                y: {
                    formatter: function(value) {
                        return '₹' + new Intl.NumberFormat().format(value);
                    }
                }
            }
        };

        var screenRevenueChart = new ApexCharts(document.querySelector("#screen-revenue-chart"), screenRevenueOptions);
        screenRevenueChart.render();

        // Booking Trend Chart
        <?php
        // Get booking trend data for last 30 days for this theater
        $query = "SELECT DATE(b.booking_date) as date, COUNT(*) as count
                  FROM bookings b
                  JOIN showtimes s ON b.showtime_id = s.id
                  WHERE s.theater_id = ?
                  AND b.booking_date >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)
                  GROUP BY DATE(b.booking_date)
                  ORDER BY date";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $theater_id);
        $stmt->execute();
        $result = $stmt->get_result();

        $dates = [];
        $counts = [];

        while ($row = $result->fetch_assoc()) {
            $dates[] = $row['date'];
            $counts[] = intval($row['count']);
        }
        ?>

        var bookingTrendOptions = {
            series: [{
                name: 'Bookings',
                data: <?php echo json_encode($counts); ?>
            }],
            chart: {
                height: 300,
                type: 'area',
                toolbar: {
                    show: false
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth',
                width: 2
            },
            colors: ['#8b5cf6'],
            fill: {
                type: 'gradient',
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.7,
                    opacityTo: 0.2,
                    stops: [0, 90, 100]
                }
            },
            xaxis: {
                categories: <?php echo json_encode($dates); ?>,
                labels: {
                    formatter: function(value) {
                        const date = new Date(value);
                        return date.getDate() + ' ' + date.toLocaleString('default', {
                            month: 'short'
                        });
                    }
                }
            },
            tooltip: {
                x: {
                    format: 'dd MMM'
                }
            }
        };

        var bookingTrendChart = new ApexCharts(document.querySelector("#booking-trend-chart"), bookingTrendOptions);
        bookingTrendChart.render();
    });
</script>

<?php
$content = ob_get_clean();
include 'operator_layout.php';
?>