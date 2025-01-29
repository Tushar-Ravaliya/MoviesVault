<?php
require("../../config/connection.php");

$sql = "SELECT id, name, email, number FROM users";
$result = $conn->query($sql);
?>


<head>

    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.dataTables.min.css"> -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.2.1/js/dataTables.min.js"></script>
    <link rel="stylesheet" href="../../public/output.css">

</head>

<div id="customers" class="p-6 bg-gray-50">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-900">Customer Management</h2>
        <div class="flex gap-2">
            <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200 flex items-center" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-basic-modal" data-hs-overlay="#hs-basic-modal">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                </svg>
                Add User
            </button>
        </div>
    </div>
    <di<div id="hs-datatable-multiple-controls" class="flex flex-col" data-hs-datatable='{
  "pagingOptions": {
    "pageBtnClasses": "min-w-[40px] flex justify-center items-center text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 py-2.5 text-sm rounded-full disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:focus:bg-neutral-700 dark:hover:bg-neutral-700"
  },
  "selecting": true,
  "rowSelectingOptions": {
    "selectAllSelector": "#hs-datatable-multiple-controls-select-all-rows",
    "individualSelector": ".hs-datatable-select-row"
  },
  "language": {
    "zeroRecords": "<div class=\"p-5 h-full flex flex-col justify-center items-center text-center\"><svg class=\"w-48 mx-auto mb-4\" width=\"178\" height=\"90\" viewBox=\"0 0 178 90\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\"><rect x=\"27\" y=\"50.5\" width=\"124\" height=\"39\" rx=\"7.5\" fill=\"currentColor\" class=\"fill-white dark:fill-neutral-800\"/><rect x=\"27\" y=\"50.5\" width=\"124\" height=\"39\" rx=\"7.5\" stroke=\"currentColor\" class=\"stroke-gray-50 dark:stroke-neutral-700/10\"/><rect x=\"34.5\" y=\"58\" width=\"24\" height=\"24\" rx=\"4\" fill=\"currentColor\" class=\"fill-gray-50 dark:fill-neutral-700/30\"/><rect x=\"66.5\" y=\"61\" width=\"60\" height=\"6\" rx=\"3\" fill=\"currentColor\" class=\"fill-gray-50 dark:fill-neutral-700/30\"/><rect x=\"66.5\" y=\"73\" width=\"77\" height=\"6\" rx=\"3\" fill=\"currentColor\" class=\"fill-gray-50 dark:fill-neutral-700/30\"/><rect x=\"19.5\" y=\"28.5\" width=\"139\" height=\"39\" rx=\"7.5\" fill=\"currentColor\" class=\"fill-white dark:fill-neutral-800\"/><rect x=\"19.5\" y=\"28.5\" width=\"139\" height=\"39\" rx=\"7.5\" stroke=\"currentColor\" class=\"stroke-gray-100 dark:stroke-neutral-700/30\"/><rect x=\"27\" y=\"36\" width=\"24\" height=\"24\" rx=\"4\" fill=\"currentColor\" class=\"fill-gray-100 dark:fill-neutral-700/70\"/><rect x=\"59\" y=\"39\" width=\"60\" height=\"6\" rx=\"3\" fill=\"currentColor\" class=\"fill-gray-100 dark:fill-neutral-700/70\"/><rect x=\"59\" y=\"51\" width=\"92\" height=\"6\" rx=\"3\" fill=\"currentColor\" class=\"fill-gray-100 dark:fill-neutral-700/70\"/><g filter=\"url(#@@id)\"><rect x=\"12\" y=\"6\" width=\"154\" height=\"40\" rx=\"8\" fill=\"currentColor\" class=\"fill-white dark:fill-neutral-800\" shape-rendering=\"crispEdges\"/><rect x=\"12.5\" y=\"6.5\" width=\"153\" height=\"39\" rx=\"7.5\" stroke=\"currentColor\" class=\"stroke-gray-100 dark:stroke-neutral-700/60\" shape-rendering=\"crispEdges\"/><rect x=\"20\" y=\"14\" width=\"24\" height=\"24\" rx=\"4\" fill=\"currentColor\" class=\"fill-gray-200 dark:fill-neutral-700 \"/><rect x=\"52\" y=\"17\" width=\"60\" height=\"6\" rx=\"3\" fill=\"currentColor\" class=\"fill-gray-200 dark:fill-neutral-700\"/><rect x=\"52\" y=\"29\" width=\"106\" height=\"6\" rx=\"3\" fill=\"currentColor\" class=\"fill-gray-200 dark:fill-neutral-700\"/></g><defs><filter id=\"@@id\" x=\"0\" y=\"0\" width=\"178\" height=\"64\" filterUnits=\"userSpaceOnUse\" color-interpolation-filters=\"sRGB\"><feFlood flood-opacity=\"0\" result=\"BackgroundImageFix\"/><feColorMatrix in=\"SourceAlpha\" type=\"matrix\" values=\"0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0\" result=\"hardAlpha\"/><feOffset dy=\"6\"/><feGaussianBlur stdDeviation=\"6\"/><feComposite in2=\"hardAlpha\" operator=\"out\"/><feColorMatrix type=\"matrix\" values=\"0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.03 0\"/><feBlend mode=\"normal\" in2=\"BackgroundImageFix\" result=\"effect1_dropShadow_1187_14810\"/><feBlend mode=\"normal\" in=\"SourceGraphic\" in2=\"effect1_dropShadow_1187_14810\" result=\"shape\"/></filter></defs></svg><div class=\"max-w-sm mx-auto\"><p class=\"mt-2 text-sm text-gray-600 dark:text-neutral-400\">No data</p></div></div>"
  }
}'>
        <div class="flex items-center space-x-2 mb-4">
            <div class="flex-0">
                <div class="relative max-w-xs">
                    <label for="hs-table-multiple-controls-search" class="sr-only">Search</label>
                    <input type="text" name="hs-table-multiple-controls-search" id="hs-table-multiple-controls-search" class="py-2 px-3 ps-9 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Search for items" data-hs-datatable-search="">
                    <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-3">
                        <svg class="size-4 text-gray-400 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8"></circle>
                            <path d="m21 21-4.3-4.3"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="flex-1 flex items-center justify-end space-x-2">
                <!-- Select -->
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
                <!-- End Select -->
            </div>
        </div>

        <div class="flex items-center mb-4">
            <div class="flex items-center space-x-1 hidden" data-hs-datatable-paging="">
                <button type="button" class="p-2.5 min-w-[40px] inline-flex justify-center items-center gap-x-2 text-sm rounded-full text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-datatable-paging-prev="">
                    <span aria-hidden="true">«</span>
                    <span class="sr-only">Previous</span>
                </button>
                <div class="flex items-center space-x-1 [&>.active]:bg-gray-100 dark:[&>.active]:bg-neutral-700" data-hs-datatable-paging-pages=""></div>
                <button type="button" class="p-2.5 min-w-[40px] inline-flex justify-center items-center gap-x-2 text-sm rounded-full text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-datatable-paging-next="">
                    <span class="sr-only">Next</span>
                    <span aria-hidden="true">»</span>
                </button>
            </div>
            <div class="text-xs text-gray-500 ms-auto dark:text-neutral-400" data-hs-datatable-info="">
                Showing
                <span data-hs-datatable-info-from=""></span>
                to
                <span data-hs-datatable-info-to=""></span>
                of
                <span data-hs-datatable-info-length=""></span>
                users
            </div>
        </div>

        <div class="overflow-x-auto min-h-[521px] ">
            <div class="min-w-full inline-block align-middle">
                <div class="overflow-hidden">
                    <table class="min-w-full">
                        <thead class="border-y border-gray-200 dark:border-neutral-700">
                            <tr>
                                <th scope="col" class="py-1 ps-3 --exclude-from-ordering">
                                    <div class="flex items-center h-5">
                                        <input id="hs-datatable-multiple-controls-select-all-rows" type="checkbox" class="border-gray-300 rounded text-blue-600 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                                        <label class="sr-only">Checkbox</label>
                                    </div>
                                </th>

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
                                        Age
                                        <svg class="size-3.5 ms-1 -me-0.5 text-gray-400 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path class="hs-datatable-ordering-desc:text-blue-600 dark:hs-datatable-ordering-desc:text-blue-500" d="m7 15 5 5 5-5"></path>
                                            <path class="hs-datatable-ordering-asc:text-blue-600 dark:hs-datatable-ordering-asc:text-blue-500" d="m7 9 5-5 5 5"></path>
                                        </svg>
                                    </div>
                                </th>

                                <th scope="col" class="py-1 group text-start font-normal focus:outline-none">
                                    <div class="py-1 px-2.5 inline-flex items-center border border-transparent text-sm text-gray-500 rounded-md hover:border-gray-200 dark:text-neutral-500 dark:hover:border-neutral-700">
                                        Address
                                        <svg class="size-3.5 ms-1 -me-0.5 text-gray-400 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path class="hs-datatable-ordering-desc:text-blue-600 dark:hs-datatable-ordering-desc:text-blue-500" d="m7 15 5 5 5-5"></path>
                                            <path class="hs-datatable-ordering-asc:text-blue-600 dark:hs-datatable-ordering-asc:text-blue-500" d="m7 9 5-5 5 5"></path>
                                        </svg>
                                    </div>
                                </th>

                                <th scope="col" class="py-2 px-3 text-end font-normal text-sm text-gray-500 --exclude-from-ordering dark:text-neutral-500">Action</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                            <?php if ($result->num_rows > 0): ?>
                                <?php while ($row = $result->fetch_assoc()): ?>
                                    <tr>
                                        <td class="py-3 ps-3">
                                            <div class="flex items-center h-5">
                                                <input id="hs-table-multiple-controls-checkbox-1" type="checkbox" class="hs-datatable-select-row border-gray-300 rounded text-blue-600 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" data-hs-datatable-row-selecting-individual="">
                                                <label for="hs-table-multiple-controls-checkbox-1" class="sr-only">Checkbox</label>
                                            </div>
                                        </td>
                                        <td class="p-3 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200"><?php echo $row['name']; ?></td>
                                        <td class="p-3 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200"><?php echo $row['email']; ?></td>
                                        <td class="p-3 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200"><?php echo $row['number']; ?> </td>
                                        <td class="p-3 whitespace-nowrap text-end text-sm font-medium">
                                            <button type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 focus:outline-none focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:text-blue-400">Delete</button>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="3" class="border border-gray-300 px-4 py-2 text-center">No records found</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="flex items-center space-x-2 mt-4">
            <div class="flex-0">
                <div class="relative max-w-xs">
                    <label for="hs-table-multiple-controls-search-alt" class="sr-only">Search</label>
                    <input type="text" name="hs-table-multiple-controls-search-alt" id="hs-table-multiple-controls-search-alt" class="py-2 px-3 ps-9 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Search for items" data-hs-datatable-search="">
                    <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-3">
                        <svg class="size-4 text-gray-400 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8"></circle>
                            <path d="m21 21-4.3-4.3"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="flex-1 flex items-center justify-end space-x-2">
                <!-- Select -->
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
                <!-- End Select -->
            </div>
        </div>

        <div class="flex items-center mt-4">
            <div class="flex items-center space-x-1 hidden" data-hs-datatable-paging="">
                <button type="button" class="p-2.5 min-w-[40px] inline-flex justify-center items-center gap-x-2 text-sm rounded-full text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-datatable-paging-prev="">
                    <span aria-hidden="true">«</span>
                    <span class="sr-only">Previous</span>
                </button>
                <div class="flex items-center space-x-1 [&>.active]:bg-gray-100 dark:[&>.active]:bg-neutral-700" data-hs-datatable-paging-pages=""></div>
                <button type="button" class="p-2.5 min-w-[40px] inline-flex justify-center items-center gap-x-2 text-sm rounded-full text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-datatable-paging-next="">
                    <span class="sr-only">Next</span>
                    <span aria-hidden="true">»</span>
                </button>
            </div>
            <div class="text-xs text-gray-500 ms-auto dark:text-neutral-400" data-hs-datatable-info="">
                Showing
                <span data-hs-datatable-info-from=""></span>
                to
                <span data-hs-datatable-info-to=""></span>
                of
                <span data-hs-datatable-info-length=""></span>
                users
            </div>
        </div>
</div>
</div>

<div id="hs-basic-modal" class="hs-overlay hidden size-full fixed top-0 start-0 z-[60] overflow-x-hidden overflow-y-auto pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="hs-basic-modal-label">
    <div class="hs-overlay-open:opacity-100 hs-overlay-open:duration-500 opacity-0 transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
        <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
            <div class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">
                <h3 id="hs-basic-modal-label" class="font-bold text-gray-800 dark:text-white">
                    Modal title
                </h3>
                <button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" aria-label="Close" data-hs-overlay="#hs-basic-modal">
                    <span class="sr-only">Close</span>
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 6 6 18"></path>
                        <path d="m6 6 12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="p-4 overflow-y-auto">
                <p class="mt-1 text-gray-800 dark:text-neutral-400">
                    This is a wider card with supporting text below as a natural lead-in to additional content.
                </p>
            </div>
            <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-neutral-700">
                <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-overlay="#hs-basic-modal">
                    Close
                </button>
                <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" href="#">
                    Save changes
                </a>
            </div>
        </div>
    </div>
</div>
<script src="../../public/js/preline.js"></script>