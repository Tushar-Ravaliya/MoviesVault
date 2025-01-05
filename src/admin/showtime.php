<?php
$page_title = "Admin Dashboard";
ob_start();
?>
<div id="showtimes" class="p-6 space-y-6">
    <!-- Header Actions -->
    <div class="flex justify-between items-center">
        <h2 class="text-xl font-semibold text-neutral-900">Showtime Management</h2>
        <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            Add New Showtime
        </button>
    </div>

    <!-- Filters and Date Selection -->
    <div class="bg-white p-4 rounded-lg border border-neutral-200/30 space-y-4">
        <div class="flex flex-wrap gap-4">
            <div class="flex-1 min-w-[200px]">
                <label class="block text-sm font-medium text-neutral-600 mb-1">Select Theater</label>
                <select class="w-full px-3 py-2 border border-neutral-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">All Theaters</option>
                    <option>Theater 1</option>
                    <option>Theater 2</option>
                    <option>Theater 3</option>
                    <option>Theater 4</option>
                </select>
            </div>
            <div class="flex-1 min-w-[200px]">
                <label class="block text-sm font-medium text-neutral-600 mb-1">Select Movie</label>
                <select class="w-full px-3 py-2 border border-neutral-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">All Movies</option>
                    <option>The Dark Knight</option>
                    <option>Inception</option>
                    <option>Interstellar</option>
                </select>
            </div>
        </div>

        <!-- Date Navigation -->
        <div class="flex items-center space-x-4 overflow-x-auto py-2">
            <button class="flex flex-col items-center min-w-[100px] p-3 rounded-lg bg-blue-50 text-blue-600">
                <span class="text-sm font-medium">Today</span>
                <span class="text-lg font-semibold">Mar 15</span>
            </button>
            <button class="flex flex-col items-center min-w-[100px] p-3 rounded-lg hover:bg-neutral-50">
                <span class="text-sm font-medium">Tomorrow</span>
                <span class="text-lg font-semibold">Mar 16</span>
            </button>
            <button class="flex flex-col items-center min-w-[100px] p-3 rounded-lg hover:bg-neutral-50">
                <span class="text-sm font-medium">Sunday</span>
                <span class="text-lg font-semibold">Mar 17</span>
            </button>
            <button class="flex flex-col items-center min-w-[100px] p-3 rounded-lg hover:bg-neutral-50">
                <span class="text-sm font-medium">Monday</span>
                <span class="text-lg font-semibold">Mar 18</span>
            </button>
            <button class="flex flex-col items-center min-w-[100px] p-3 rounded-lg hover:bg-neutral-50">
                <span class="text-sm font-medium">Tuesday</span>
                <span class="text-lg font-semibold">Mar 19</span>
            </button>
        </div>
    </div>

    <!-- Showtimes Grid -->
    <div class="space-y-6">
        <!-- Theater 1 -->
        <div class="bg-white rounded-lg border border-neutral-200/30">
            <div class="p-4 border-b border-neutral-200/30">
                <h3 class="font-semibold text-lg text-neutral-900">Theater 1 - IMAX</h3>
                <p class="text-sm text-neutral-600">Capacity: 250 seats</p>
            </div>
            <div class="p-4 space-y-4">
                <div class="flex items-start p-4 bg-neutral-50 rounded-lg">
                    <img src="https://placehold.co/300x450" alt="Movie Poster" class="w-16 h-24 rounded object-cover">
                    <div class="ml-4 flex-1">
                        <div class="flex justify-between items-start">
                            <div>
                                <h4 class="font-semibold text-neutral-900">The Dark Knight</h4>
                                <p class="text-sm text-neutral-600">2h 32m • PG-13</p>
                            </div>
                            <div class="flex space-x-2">
                                <button class="px-3 py-1 text-sm bg-blue-50 text-blue-600 rounded hover:bg-blue-100">Edit</button>
                                <button class="px-3 py-1 text-sm bg-red-50 text-red-600 rounded hover:bg-red-100">Cancel</button>
                            </div>
                        </div>
                        <div class="mt-3 flex flex-wrap gap-2">
                            <span class="px-3 py-1 bg-green-100 text-green-600 rounded-full text-sm">10:00 AM (182/250)</span>
                            <span class="px-3 py-1 bg-yellow-100 text-yellow-600 rounded-full text-sm">2:30 PM (98/250)</span>
                            <span class="px-3 py-1 bg-red-100 text-red-600 rounded-full text-sm">7:00 PM (243/250)</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Theater 2 -->
        <div class="bg-white rounded-lg border border-neutral-200/30">
            <div class="p-4 border-b border-neutral-200/30">
                <h3 class="font-semibold text-lg text-neutral-900">Theater 2 - Dolby Atmos</h3>
                <p class="text-sm text-neutral-600">Capacity: 180 seats</p>
            </div>
            <div class="p-4 space-y-4">
                <div class="flex items-start p-4 bg-neutral-50 rounded-lg">
                    <img src="https://placehold.co/300x450" alt="Movie Poster" class="w-16 h-24 rounded object-cover">
                    <div class="ml-4 flex-1">
                        <div class="flex justify-between items-start">
                            <div>
                                <h4 class="font-semibold text-neutral-900">Inception</h4>
                                <p class="text-sm text-neutral-600">2h 28m • PG-13</p>
                            </div>
                            <div class="flex space-x-2">
                                <button class="px-3 py-1 text-sm bg-blue-50 text-blue-600 rounded hover:bg-blue-100">Edit</button>
                                <button class="px-3 py-1 text-sm bg-red-50 text-red-600 rounded hover:bg-red-100">Cancel</button>
                            </div>
                        </div>
                        <div class="mt-3 flex flex-wrap gap-2">
                            <span class="px-3 py-1 bg-green-100 text-green-600 rounded-full text-sm">11:30 AM (85/180)</span>
                            <span class="px-3 py-1 bg-yellow-100 text-yellow-600 rounded-full text-sm">4:00 PM (120/180)</span>
                            <span class="px-3 py-1 bg-red-100 text-red-600 rounded-full text-sm">8:30 PM (175/180)</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Theater 3 -->
        <div class="bg-white rounded-lg border border-neutral-200/30">
            <div class="p-4 border-b border-neutral-200/30">
                <h3 class="font-semibold text-lg text-neutral-900">Theater 3 - Standard</h3>
                <p class="text-sm text-neutral-600">Capacity: 150 seats</p>
            </div>
            <div class="p-4 space-y-4">
                <div class="flex items-start p-4 bg-neutral-50 rounded-lg">
                    <img src="https://placehold.co/300x450" alt="Movie Poster" class="w-16 h-24 rounded object-cover">
                    <div class="ml-4 flex-1">
                        <div class="flex justify-between items-start">
                            <div>
                                <h4 class="font-semibold text-neutral-900">Interstellar</h4>
                                <p class="text-sm text-neutral-600">2h 49m • PG-13</p>
                            </div>
                            <div class="flex space-x-2">
                                <button class="px-3 py-1 text-sm bg-blue-50 text-blue-600 rounded hover:bg-blue-100">Edit</button>
                                <button class="px-3 py-1 text-sm bg-red-50 text-red-600 rounded hover:bg-red-100">Cancel</button>
                            </div>
                        </div>
                        <div class="mt-3 flex flex-wrap gap-2">
                            <span class="px-3 py-1 bg-green-100 text-green-600 rounded-full text-sm">1:00 PM (65/150)</span>
                            <span class="px-3 py-1 bg-yellow-100 text-yellow-600 rounded-full text-sm">5:30 PM (110/150)</span>
                            <span class="px-3 py-1 bg-green-100 text-green-600 rounded-full text-sm">9:00 PM (45/150)</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
include 'admin_layout.php';
?>