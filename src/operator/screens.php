<?php
$page_title = "Admin Dashboard";
ob_start();
?>
<div id="screens" class="p-6 space-y-6">
    <!-- Header with Add Button -->
    <div class="flex justify-between items-center">
        <h2 class="text-xl font-semibold text-gray-800">Screen Management</h2>
        <button onclick="document.getElementById('addScreenModal').classList.remove('hidden')" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Add Screen
        </button>
    </div>

    <!-- Screens Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Screen Card 1 -->
        <div class="bg-white rounded-lg border border-gray-200 p-6">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">Screen 1</h3>
                    <p class="text-sm text-gray-600">Premium Theater</p>
                </div>
                <div class="flex space-x-2">
                    <button class="text-gray-400 hover:text-blue-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                    </button>
                    <button class="text-gray-400 hover:text-red-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="space-y-3">
                <div class="flex justify-between">
                    <span class="text-gray-600">Seating Capacity</span>
                    <span class="font-semibold text-gray-800">150 seats</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Layout Type</span>
                    <span class="font-semibold text-gray-800">Stadium</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Status</span>
                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Active</span>
                </div>
            </div>
        </div>

        <!-- Screen Card 2 -->
        <div class="bg-white rounded-lg border border-gray-200 p-6">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">Screen 2</h3>
                    <p class="text-sm text-gray-600">Regular Theater</p>
                </div>
                <div class="flex space-x-2">
                    <button class="text-gray-400 hover:text-blue-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                    </button>
                    <button class="text-gray-400 hover:text-red-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="space-y-3">
                <div class="flex justify-between">
                    <span class="text-gray-600">Seating Capacity</span>
                    <span class="font-semibold text-gray-800">120 seats</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Layout Type</span>
                    <span class="font-semibold text-gray-800">Regular</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Status</span>
                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Active</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Screen Modal -->
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
                    <label class="block text-sm font-medium text-gray-700 mb-1">Screen Name</label>
                    <input type="text" class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="Enter screen name">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Screen Type</label>
                    <select class="w-full border border-gray-300 rounded-lg px-3 py-2">
                        <option value="">Select type</option>
                        <option value="premium">Premium Theater</option>
                        <option value="regular">Regular Theater</option>
                        <option value="vip">VIP Theater</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Seating Capacity</label>
                    <input type="number" class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="Enter total seats">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Layout Type</label>
                    <select class="w-full border border-gray-300 rounded-lg px-3 py-2">
                        <option value="">Select layout</option>
                        <option value="stadium">Stadium</option>
                        <option value="regular">Regular</option>
                        <option value="sloped">Sloped</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                    <select class="w-full border border-gray-300 rounded-lg px-3 py-2">
                        <option value="active">Active</option>
                        <option value="maintenance">Under Maintenance</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
                <div class="flex justify-end space-x-3 pt-4">
                    <button type="button" onclick="document.getElementById('addScreenModal').classList.add('hidden')" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200">Cancel</button>
                    <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700">Add Screen</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
include 'admin_layout.php';
?>