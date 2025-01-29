<?php
$page_title = "Admin Dashboard";
ob_start();
?>
<div id="movies" class="p-6 space-y-6">
    <!-- Header Actions -->
    <div class="flex justify-between items-center">
        <h2 class="text-xl font-semibold text-neutral-900">Movie Management</h2>
        <a href="addMovies.php" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            Add New Movie
        </a>
    </div>

    <!-- Filters -->
    <div class="bg-white p-4 rounded-lg border border-neutral-200/30 flex flex-wrap gap-4">
        <div class="flex-1 min-w-[200px]">
            <label class="block text-sm font-medium text-neutral-600 mb-1">Search Movies</label>
            <input type="text" placeholder="Search by title, genre, or cast..." class="w-full px-3 py-2 border border-neutral-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div class="w-48">
            <label class="block text-sm font-medium text-neutral-600 mb-1">Genre</label>
            <select class="w-full px-3 py-2 border border-neutral-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                <option value="">All Genres</option>
                <option>Action</option>
                <option>Drama</option>
                <option>Comedy</option>
                <option>Sci-Fi</option>
            </select>
        </div>
        <div class="w-48">
            <label class="block text-sm font-medium text-neutral-600 mb-1">Status</label>
            <select class="w-full px-3 py-2 border border-neutral-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                <option value="">All Status</option>
                <option>Now Showing</option>
                <option>Coming Soon</option>
                <option>Ended</option>
            </select>
        </div>
    </div>

    <!-- Movies Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        <!-- Movie Card 1 -->
        <div class="bg-white rounded-lg border border-neutral-200/30 overflow-hidden">
            <img src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcQkUywIUXDjHSQJIaNHYVs08osgBpF5Ot-xmB_omyEZeeRP9Xug" alt="Movie Poster" class="w-full h-64 object-cover">
            <div class="p-4">
                <div class="flex justify-between items-start mb-2">
                    <h3 class="font-semibold text-neutral-900">The Dark Knight</h3>
                    <span class="px-2 py-1 text-xs bg-green-100 text-green-600 rounded-full">Now Showing</span>
                </div>
                <p class="text-sm text-neutral-600 mb-3">Action, Drama</p>
                <div class="flex items-center justify-between text-sm mb-3">
                    <span class="text-neutral-600">Duration: 2h 32m</span>
                    <span class="text-neutral-600">Rating: PG-13</span>
                </div>
                <div class="flex space-x-2">
                    <button class="flex-1 px-3 py-2 text-sm bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition-colors">Edit</button>
                    <button class="flex-1 px-3 py-2 text-sm bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition-colors">Remove</button>
                </div>
            </div>
        </div>

        <!-- Movie Card 2 -->
        <div class="bg-white rounded-lg border border-neutral-200/30 overflow-hidden">
            <img src="https://placehold.co/300x450" alt="Movie Poster" class="w-full h-64 object-cover">
            <div class="p-4">
                <div class="flex justify-between items-start mb-2">
                    <h3 class="font-semibold text-neutral-900">Inception</h3>
                    <span class="px-2 py-1 text-xs bg-yellow-100 text-yellow-600 rounded-full">Coming Soon</span>
                </div>
                <p class="text-sm text-neutral-600 mb-3">Sci-Fi, Action</p>
                <div class="flex items-center justify-between text-sm mb-3">
                    <span class="text-neutral-600">Duration: 2h 28m</span>
                    <span class="text-neutral-600">Rating: PG-13</span>
                </div>
                <div class="flex space-x-2">
                    <button class="flex-1 px-3 py-2 text-sm bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition-colors">Edit</button>
                    <button class="flex-1 px-3 py-2 text-sm bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition-colors">Remove</button>
                </div>
            </div>
        </div>

        <!-- Movie Card 3 -->
        <div class="bg-white rounded-lg border border-neutral-200/30 overflow-hidden">
            <img src="https://placehold.co/300x450" alt="Movie Poster" class="w-full h-64 object-cover">
            <div class="p-4">
                <div class="flex justify-between items-start mb-2">
                    <h3 class="font-semibold text-neutral-900">Interstellar</h3>
                    <span class="px-2 py-1 text-xs bg-green-100 text-green-600 rounded-full">Now Showing</span>
                </div>
                <p class="text-sm text-neutral-600 mb-3">Sci-Fi, Drama</p>
                <div class="flex items-center justify-between text-sm mb-3">
                    <span class="text-neutral-600">Duration: 2h 49m</span>
                    <span class="text-neutral-600">Rating: PG-13</span>
                </div>
                <div class="flex space-x-2">
                    <button class="flex-1 px-3 py-2 text-sm bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition-colors">Edit</button>
                    <button class="flex-1 px-3 py-2 text-sm bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition-colors">Remove</button>
                </div>
            </div>
        </div>

        <!-- Movie Card 4 -->
        <div class="bg-white rounded-lg border border-neutral-200/30 overflow-hidden">
            <img src="https://placehold.co/300x450" alt="Movie Poster" class="w-full h-64 object-cover">
            <div class="p-4">
                <div class="flex justify-between items-start mb-2">
                    <h3 class="font-semibold text-neutral-900">The Matrix</h3>
                    <span class="px-2 py-1 text-xs bg-neutral-100 text-neutral-600 rounded-full">Ended</span>
                </div>
                <p class="text-sm text-neutral-600 mb-3">Sci-Fi, Action</p>
                <div class="flex items-center justify-between text-sm mb-3">
                    <span class="text-neutral-600">Duration: 2h 16m</span>
                    <span class="text-neutral-600">Rating: R</span>
                </div>
                <div class="flex space-x-2">
                    <button class="flex-1 px-3 py-2 text-sm bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition-colors">Edit</button>
                    <button class="flex-1 px-3 py-2 text-sm bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition-colors">Remove</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    <div class="flex justify-between items-center bg-white p-4 rounded-lg border border-neutral-200/30">
        <button class="px-4 py-2 text-neutral-600 hover:text-neutral-900 disabled:opacity-50 disabled:cursor-not-allowed">
            Previous
        </button>
        <div class="flex space-x-1">
            <button class="px-4 py-2 bg-blue-50 text-blue-600 rounded">1</button>
            <button class="px-4 py-2 text-neutral-600 hover:bg-neutral-50 rounded">2</button>
            <button class="px-4 py-2 text-neutral-600 hover:bg-neutral-50 rounded">3</button>
            <span class="px-4 py-2">...</span>
            <button class="px-4 py-2 text-neutral-600 hover:bg-neutral-50 rounded">8</button>
        </div>
        <button class="px-4 py-2 text-neutral-600 hover:text-neutral-900">
            Next
        </button>
    </div>
</div>
<?php
$content = ob_get_clean();
include 'admin_layout.php';
?>