<?php
$page_title = "Admin Dashboard";
ob_start();
?>
<section id="addmovie" class="p-6 bg-white">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Add New Screen</h1>
        <p class="text-gray-600 mt-1">Enter the movie details below</p>
    </div>

    <form class="max-w-4xl">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Screen Name</label>
                <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Enter movie title">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Seat No</label>
                <input type="date" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Projetor Type</label>
                <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                    <option value="">Select projector Type</option>
                    <option value="G">Digital</option>
                    <option value="PG">Laser</option>
                    <option value="PG-13">Imax</option>
                    <option value="R">R</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Age Rating</label>
                <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                    <option value="">Select rating</option>
                    <option value="G">dolby digital</option>
                    <option value="PG">dolby atoms</option>
                    <option value="PG-13">dts</option>
                    <option value="R">R</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">No of rows</label>
                <input type="number" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Seat per row</label>
                <input type="number" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
            </div>
            <!-- <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Movie Description</label>
                <textarea rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Enter movie description"></textarea>
            </div> -->

            <!-- <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Genre</label>
                <div class="grid grid-cols-2 gap-2">
                    <label class="flex items-center">
                        <input type="checkbox" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        <span class="ml-2 text-sm text-gray-600">Action</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        <span class="ml-2 text-sm text-gray-600">Comedy</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        <span class="ml-2 text-sm text-gray-600">Drama</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        <span class="ml-2 text-sm text-gray-600">Horror</span>
                    </label>
                </div>
            </div> -->

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Movie Poster</label>
                <div class="flex items-center justify-center w-full">
                    <label class="w-full flex flex-col items-center px-4 py-6 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer hover:bg-gray-50">
                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        <span class="mt-2 text-sm text-gray-500">Click to upload poster</span>
                        <input type="file" class="hidden" accept="image/*">
                    </label>
                </div>
            </div>
        </div>

        <div class="mt-6 flex justify-end space-x-4">
            <button type="button" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">Cancel</button>
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Add Movie</button>
        </div>
    </form>
</section>
<?php
$content = ob_get_clean();
include 'admin_layout.php';
?>