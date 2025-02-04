<?php
$page_title = "Add Movie";
ob_start();
?>
<div class="w-full flex flex-col items-center overflow-y-auto">
    <div class="mt-8 w-10/12">
        <h4 class="text-gray-600">
            Add Categories
        </h4>

        <div class="mt-4">
            <div class="p-6  bg-white rounded-md border border-gray-300 ">
                <h2 class="text-lg font-semibold text-gray-700 capitalize">
                    Add Categories
                </h2>

                <form method="post" action="">

                    <div class="gap-6 mt-4 sm:grid-cols-2">
                        <div class="flex justify-between items-center">
                            <div class="w-full">
                                <label class="text-gray-700" for="username">Category Name</label>
                                <input
                                    v-model="user.username"
                                    class="w-2/4 mt-2 pl-2 border h-8 border-gray-400 outline-none rounded-md focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500"
                                    type="text"
                                    name="description">
                            </div>
                            <input type="submit"
                                class="px-5 py-2 text-center border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none" value="Add">
                        </div>

                    </div>


                </form>
            </div>
        </div>

        <div class="p-6 mt-10 bg-white rounded-md border border-gray-300">
            <ul>
                <li class="inline-block text-lg">Action</li><button type="button" class="py-1 ml-10 px-2 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-blue-600 text-blue-600 hover:border-blue-500 hover:text-blue-500 focus:outline-none focus:border-blue-500 focus:text-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:border-blue-500 dark:text-blue-500 dark:hover:text-blue-400 dark:hover:border-blue-400">
                    Edit
                </button>
                <button type="button" class="py-1 px-2 ml-5 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-red-500 text-red-500 hover:border-red-400 hover:text-red-400 focus:outline-none focus:border-red-400 focus:text-red-400 disabled:opacity-50 disabled:pointer-events-none">
                    Delete
                </button>

            </ul>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
include 'admin_layout.php';
