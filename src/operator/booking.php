<?php
session_start();
$page_title = "Admin Dashboard";
ob_start();
require_once '../../config/connection.php';
$theaterId =$_SESSION['theater_id'];
// Query to get all booking details with related information
$sql = "SELECT 
            b.booking_id, 
            b.user_id,
            b.showtime_id,
            b.selected_seats,
            b.total_amount,
            b.booking_status,
            b.booking_date,
            u.name AS user_name,
            u.email AS user_email,
            u.pic AS user_pic,
            m.title AS movie_title,
            m.poster_path,
            s.showtime_date,
            s.showtime_time,
            t.title AS theater_name,
            sc.screen_name
        FROM bookings b
        JOIN users u ON b.user_id = u.id
        JOIN showtimes s ON b.showtime_id = s.id
        JOIN movies m ON s.movie_id = m.movie_id
        JOIN theaters t ON s.theater_id = t.id
        JOIN screens sc ON s.screen_id = sc.id
        where t.id = $theaterId
        ORDER BY b.booking_date DESC";

$bookings = $conn->query($sql);
?>

<head>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.2.1/js/dataTables.min.js"></script>
</head>

<div id="customers" class="p-6 bg-gray-50">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-900">Booking History</h2>
        <div class="flex gap-2">
            <a href="bookTicket.php" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200 flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                </svg>
                Book movie
            </a>
        </div>
    </div>
    <div class="overflow-x-auto" data-hs-datatable='{
        "pageLength": 5,
        "pagingOptions": {
    "pageBtnClasses": "min-w-[40px] flex justify-center items-center text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 py-2.5 text-sm rounded-full disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:focus:bg-neutral-700 dark:hover:bg-neutral-700"
  },
       
        "language": {
          "zeroRecords": "<div class=\"py-10 px-5 flex flex-col justify-center items-center text-center\"><svg class=\"shrink-0 size-6 text-gray-500 dark:text-neutral-500\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><circle cx=\"11\" cy=\"11\" r=\"8\"/><path d=\"m21 21-4.3-4.3\"/></svg><div class=\"max-w-sm mx-auto\"><p class=\"mt-2 text-sm text-gray-600 dark:text-neutral-400\">No search results</p></div></div>"
        }
      }'>
        <div class="flex items-center space-x-2 mb-4">
            <div class="bg-white p-4 rounded-lg border border-gray-200 mb-6">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Search Bookings</label>
                        <input type="text" placeholder="Name, email, movie or booking ID..." name="hs-table-filter-search" id="hs-table-filter-search" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" data-hs-datatable-search="">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Page</label>
                        <select class="hidden" data-hs-select='{
        "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span data-title></span></button>",
        "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-2 px-3 pe-9 flex text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 before:absolute before:inset-0 before:z-[1] dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-200 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800",
        "dropdownClasses": "mt-2 z-50 w-20 max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",
        "optionClasses": "py-2 px-3 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-md focus:outline-none focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
        "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-blue-600 dark:text-blue-500\" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>",
        "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-neutral-500\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
      }' data-hs-datatable-page-entities="">
                            <option value="5" selected="">5</option>
                            <option value="10">10</option>
                            <option value="15">15</option>
                            <option value="20">20</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <table id="exampleTable" class="divide-y divide-gray-200 dark:divide-neutral-700">
            <thead class="border-y border-gray-200 dark:border-neutral-700">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-neutral-500 uppercase tracking-wider">Booking ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-neutral-500 uppercase tracking-wider">Customer</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-neutral-500 uppercase tracking-wider">Movie & Show</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-neutral-500 uppercase tracking-wider">Theater</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-neutral-500 uppercase tracking-wider">Amount</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-neutral-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-neutral-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($bookings && $bookings->num_rows > 0) {
                    while ($row = $bookings->fetch_assoc()) {
                ?>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-neutral-900">#BK<?php echo $row['booking_id']; ?></td>
                            <td class="size-px whitespace-nowrap">
                                <div class="ps-6 lg:ps-3 xl:ps-0 pe-6 py-3">
                                    <div class="flex items-center gap-x-3">
                                        <img class="inline-block size-[38px] rounded-full object-cover object-center" src="../../public/profile/<?php echo $row['user_pic']; ?>" alt="Avatar">
                                        <div class="grow">
                                            <span class="block text-sm font-medium text-gray-800 dark:text-neutral-200"><?php echo $row['user_name']; ?></span>
                                            <span class="block text-sm text-gray-500 dark:text-neutral-500"><?php echo $row['user_email']; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="h-px w-72 whitespace-nowrap">
                                <div class="px-6 py-3">
                                    <div class="text-sm text-neutral-900"><?php echo $row['movie_title']; ?></div>
                                    <div class="text-sm text-neutral-500">
                                        <?php
                                        $showDate = date('M d, Y', strtotime($row['showtime_date']));
                                        $showTime = date('g:i A', strtotime($row['showtime_time']));
                                        echo $showDate . ' - ' . $showTime;
                                        ?>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-neutral-900"><?php echo $row['theater_name']; ?></div>
                                <div class="text-sm text-neutral-500">
                                    <?php echo $row['screen_name']; ?>, Seats: <?php echo $row['selected_seats']; ?>
                                </div>
                            </td>
                            <td class="size-px whitespace-nowrap">
                                <div class="px-6 py-3">
                                    <span class="text-sm text-gray-500 dark:text-neutral-500">₹<?php echo $row['total_amount']; ?></span>
                                </div>
                            </td>
                            <td class="size-px whitespace-nowrap">
                                <div class="px-6 py-3">
                                    <?php
                                    $statusClass = '';
                                    $statusIcon = '';

                                    switch ($row['booking_status']) {
                                        case 'confirmed':
                                            $statusClass = 'bg-teal-100 text-teal-800 dark:bg-teal-500/10 dark:text-teal-500';
                                            $statusIcon = '<svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                        </svg>';
                                            break;
                                        case 'pending':
                                            $statusClass = 'bg-yellow-100 text-yellow-800 dark:bg-yellow-500/10 dark:text-yellow-500';
                                            $statusIcon = '<svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                                        </svg>';
                                            break;
                                        case 'cancelled':
                                            $statusClass = 'bg-red-100 text-red-800 dark:bg-red-500/10 dark:text-red-500';
                                            $statusIcon = '<svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                                        </svg>';
                                            break;
                                    }
                                    ?>
                                    <span class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium <?php echo $statusClass; ?> rounded-full">
                                        <?php echo $statusIcon; ?>
                                        <?php echo ucfirst($row['booking_status']); ?>
                                    </span>
                                </div>
                            </td>
                            <td class="size-px whitespace-nowrap">
                                <div class="px-6 py-1.5">
                                    <a class="inline-flex items-center gap-x-1 text-sm text-blue-600 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-blue-500" href="view_booking.php?id=<?php echo $row['booking_id']; ?>">
                                        View
                                    </a>
                                    <?php if ($row['booking_status'] !== 'cancelled') { ?>
                                        <a class="inline-flex items-center gap-x-1 text-sm text-red-600 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-red-500" href="cancel_booking.php?id=<?php echo $row['booking_id']; ?>">
                                            Cancel
                                        </a>
                                    <?php } ?>
                                </div>
                            </td>
                        </tr>
                    <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="7" class="px-6 py-4 text-center text-sm text-gray-500">No bookings found</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <!-- Pagination -->
        <div class="mt-6 flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-700" data-hs-datatable-info="">
                    Showing <span class="font-medium" data-hs-datatable-info-from=""></span>
                    to <span class="font-medium" data-hs-datatable-info-to=""></span>
                    of <span class="font-medium" data-hs-datatable-info-length=""></span> Bookings
                </p>
            </div>
            <div class="flex gap-2">
                <button class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50" data-hs-datatable-paging-prev="">Previous</button>
                <button class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50" data-hs-datatable-paging-next="">Next</button>
            </div>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
include 'operator_layout.php';
?>