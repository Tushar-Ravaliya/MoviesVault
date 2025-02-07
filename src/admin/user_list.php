<?php
$page_title = "Admin Dashboard";
ob_start();
// include '../../app/controller/auth.php';
require_once '../../config/connection.php';
require_once '../../app/model/Auth.php';

$database = new Database();
$db = $database->getConnection();
$user = new User($db);
$users = $user->readAll();


// $sql = "SELECT id, name, email, number FROM users";
// $result = $conn->query($sql);
?>


<head>

    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.dataTables.min.css"> -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.2.1/js/dataTables.min.js"></script>

</head>

<div id="customers" class="p-6 bg-gray-50">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-900">Customer Management</h2>
        <div class="flex gap-2">
            <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200 flex items-center" onclick="document.getElementById('addScreenModal').classList.remove('hidden')">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                </svg>
                Add User
            </button>
        </div>
    </div>
    <div class="overflow-x-auto" data-hs-datatable='{
        "pageLength": 10,
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
                        <label class="block text-sm font-medium text-gray-700 mb-1">Search Customers</label>
                        <input type="text" placeholder="Name, email or phone..." name="hs-table-filter-search" id="hs-table-filter-search" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" data-hs-datatable-search="">
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
                            <option value="10" selected="">10</option>
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
                    <th scope="col" class="py-1 group text-start font-normal focus:outline-none">
                        <div class="py-1 px-2.5 inline-flex items-center border border-transparent text-sm text-gray-500 rounded-md hover:border-gray-200 dark:text-neutral-500 dark:hover:border-neutral-700">
                            Name
                            <svg class="size-3.5 ms-1 -me-0.5 text-gray-400 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path class="hs-datatable-ordering-desc:text-blue-600 dark:hs-datatable-ordering-desc:text-blue-500" d="m7 15 5 5 5-5"></path>
                                <path class="hs-datatable-ordering-asc:text-blue-600 dark:hs-datatable-ordering-asc:text-blue-500" d="m7 9 5-5 5 5"></path>
                            </svg>
                        </div>
                    </th>
                    <th scope="col" class="py-1 group text-start font-normal focus:outline-none">
                        <div class="py-1 px-2.5 inline-flex items-center border border-transparent text-sm text-gray-500 rounded-md hover:border-gray-200 dark:text-neutral-500 dark:hover:border-neutral-700">
                            email
                            <svg class="size-3.5 ms-1 -me-0.5 text-gray-400 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path class="hs-datatable-ordering-desc:text-blue-600 dark:hs-datatable-ordering-desc:text-blue-500" d="m7 15 5 5 5-5"></path>
                                <path class="hs-datatable-ordering-asc:text-blue-600 dark:hs-datatable-ordering-asc:text-blue-500" d="m7 9 5-5 5 5"></path>
                            </svg>
                        </div>
                    </th>

                    <th scope="col" class="py-1 group text-start font-normal focus:outline-none">
                        <div class="py-1 px-2.5 inline-flex items-center border border-transparent text-sm text-gray-500 rounded-md hover:border-gray-200 dark:text-neutral-500 dark:hover:border-neutral-700">
                            date
                            <svg class="size-3.5 ms-1 -me-0.5 text-gray-400 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path class="hs-datatable-ordering-desc:text-blue-600 dark:hs-datatable-ordering-desc:text-blue-500" d="m7 15 5 5 5-5"></path>
                                <path class="hs-datatable-ordering-asc:text-blue-600 dark:hs-datatable-ordering-asc:text-blue-500" d="m7 9 5-5 5 5"></path>
                            </svg>
                        </div>
                    </th>


                    <th scope="col" class="py-1 group text-start font-normal focus:outline-none">
                        <div class="py-1 px-2.5 inline-flex items-center border border-transparent text-sm text-gray-500 rounded-md hover:border-gray-200 dark:text-neutral-500 dark:hover:border-neutral-700">
                            status
                            <svg class="size-3.5 ms-1 -me-0.5 text-gray-400 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path class="hs-datatable-ordering-desc:text-blue-600 dark:hs-datatable-ordering-desc:text-blue-500" d="m7 15 5 5 5-5"></path>
                                <path class="hs-datatable-ordering-asc:text-blue-600 dark:hs-datatable-ordering-asc:text-blue-500" d="m7 9 5-5 5 5"></path>
                            </svg>
                        </div>
                    </th>
                    <th scope="col" class="py-1 group text-start font-normal focus:outline-none">
                        <div class="py-1 px-2.5 inline-flex items-center border border-transparent text-sm text-gray-500 rounded-md hover:border-gray-200 dark:text-neutral-500 dark:hover:border-neutral-700">
                            time
                            <svg class="size-3.5 ms-1 -me-0.5 text-gray-400 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path class="hs-datatable-ordering-desc:text-blue-600 dark:hs-datatable-ordering-desc:text-blue-500" d="m7 15 5 5 5-5"></path>
                                <path class="hs-datatable-ordering-asc:text-blue-600 dark:hs-datatable-ordering-asc:text-blue-500" d="m7 9 5-5 5 5"></path>
                            </svg>
                        </div>
                    </th>
                    <th scope="col" class="py-1 group text-start font-normal focus:outline-none">
                        <div class="py-1 px-2.5 inline-flex items-center border border-transparent text-sm text-gray-500 rounded-md hover:border-gray-200 dark:text-neutral-500 dark:hover:border-neutral-700">
                            Action
                            <svg class="size-3.5 ms-1 -me-0.5 text-gray-400 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path class="hs-datatable-ordering-desc:text-blue-600 dark:hs-datatable-ordering-desc:text-blue-500" d="m7 15 5 5 5-5"></path>
                                <path class="hs-datatable-ordering-asc:text-blue-600 dark:hs-datatable-ordering-asc:text-blue-500" d="m7 9 5-5 5 5"></path>
                            </svg>
                        </div>
                    </th>


                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $row) { ?>

                    <tr>
                        <td class="size-px whitespace-nowrap">
                            <div class="ps-6 lg:ps-3 xl:ps-0 pe-6 py-3">
                                <div class="flex items-center gap-x-3">
                                    <img class="inline-block size-[38px] rounded-full object-cover object-center" src="../../public/profile/<?php echo $row['pic']; ?>" alt="Avatar">
                                    <div class="grow">
                                        <span class="block text-sm font-semibold text-gray-800 dark:text-neutral-200"><?php echo $row['name']; ?></span>
                                        <span class="block text-sm text-gray-500 dark:text-neutral-500"><?php echo $row['email']; ?></span>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="h-px w-72 whitespace-nowrap">
                            <div class="px-6 py-3">
                                <span class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">Designer</span>
                                <span class="block text-sm text-gray-500 dark:text-neutral-500">IT department</span>
                            </div>
                        </td>
                        <td class="size-px whitespace-nowrap">
                            <div class="px-6 py-3">
                                <span class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-800 rounded-full dark:bg-teal-500/10 dark:text-teal-500">
                                    <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                    </svg>
                                    Active
                                </span>
                            </div>
                        </td>
                        <td class="size-px whitespace-nowrap">
                            <div class="px-6 py-3">
                                <div class="flex items-center gap-x-3">
                                    <span class="text-xs text-gray-500 dark:text-neutral-500">5/5</span>
                                    <div class="flex w-full h-1.5 bg-gray-200 rounded-full overflow-hidden dark:bg-neutral-700">
                                        <div class="flex flex-col justify-center overflow-hidden bg-gray-800 dark:bg-neutral-200" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="size-px whitespace-nowrap">
                            <div class="px-6 py-3">
                                <span class="text-sm text-gray-500 dark:text-neutral-500">18 Dec, 15:20</span>
                            </div>
                        </td>
                        <td class="size-px whitespace-nowrap">
                            <div class="px-6 py-1.5">
                                <a class="inline-flex items-center gap-x-1 text-sm text-blue-600 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-blue-500" href="#">
                                    Edit
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
        <!-- Pagination -->
        <div class="mt-6 flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-700" data-hs-datatable-info="">
                    Showing <span class="font-medium" data-hs-datatable-info-from=""></span>
                    to <span class="font-medium" data-hs-datatable-info-to=""></span>
                    of <span class="font-medium" data-hs-datatable-info-length=""></span> Users
                </p>
            </div>
            <div class="flex gap-2">
                <button class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50" data-hs-datatable-paging-prev="">Previous</button>
                <button class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50" data-hs-datatable-paging-next="">Next</button>
            </div>
        </div>
    </div>
</div>

<div id="addScreenModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-lg bg-white">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold text-gray-900">Add New Screen</h3>
            <button onclick="document.getElementById('addScreenModal').classList.add('hidden')" class="text-gray-400 hover:text-gray-500">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <form class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                <input type="text" class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="Enter name">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="text" class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="Enter Email">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Number</label>
                <input type="number" class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="Enter number">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">password</label>
                <input type="text" class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="Enter password">
            </div>

            <div class="flex justify-end space-x-3 pt-4">
                <button type="button" onclick="document.getElementById('addScreenModal').classList.add('hidden')" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200">Cancel</button>
                <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700">Add Screen</button>
            </div>
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();
include 'admin_layout.php';
?>