<?php
$page_title = "Add Movie";
ob_start();
?>

<!-- Card Section -->
<div class="max-w-4xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <!-- Card -->
    <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-neutral-900">
        <form>
            <!-- Section -->
            <div class="grid sm:grid-cols-12 gap-2 sm:gap-4 py-8 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
                <div class="sm:col-span-12">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                        Submit your application
                    </h2>
                </div>
                <!-- End Col -->

                <div class="sm:col-span-3">
                    <label for="af-submit-application-full-name" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                        Full name
                    </label>
                </div>
                <!-- End Col -->





                <input id="af-submit-application-current-company" type="text" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
            </div>
            <!-- End Col -->
    </div>
    <!-- End Section -->






    <button type="button" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
        Submit application
    </button>
    </form>
</div>
<!-- End Card -->
</div>
<!-- End Card Section -->

<?php
$content = ob_get_clean();
include 'admin_layout.php';
