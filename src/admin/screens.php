<?php
$page_title = "Admin Dashboard";
ob_start();
?>
<div id="theaters" class="p-6">
    <div class="mb-6 flex justify-between items-center">
        <h2 class="text-2xl font-semibold text-neutral-800">Theaters</h2>
        <button onclick="document.getElementById('addTheaterModal').classList.remove('hidden')" class="bg-[#2E4053] text-white px-4 py-2 rounded-lg hover:bg-[#2E4053]/90 transition-colors flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Add Theater
        </button>
    </div>

    <div class="bg-white rounded-lg border border-neutral-200/30">
        <div class="p-4 border-b border-neutral-200/30">
            <input type="search" placeholder="Search theaters..." class="w-full px-4 py-2 rounded-lg bg-neutral-100 border border-neutral-200/30 focus:outline-none focus:border-[#2E4053]" />
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-neutral-50 border-b border-neutral-200/30">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-neutral-600">Theater Name</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-neutral-600">Address</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-neutral-600">City</th>
                        <th class="px-6 py-3 text-right text-sm font-semibold text-neutral-600">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-neutral-200/30">
                    <tr class="hover:bg-neutral-50">
                        <td class="px-6 py-4 text-sm text-neutral-800">Cineplex Downtown</td>
                        <td class="px-6 py-4 text-sm text-neutral-600">123 Main Street</td>
                        <td class="px-6 py-4 text-sm text-neutral-600">New York</td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <button onclick="document.getElementById('editTheaterModal').classList.remove('hidden')" class="text-blue-600 hover:text-blue-800">Edit</button>
                            <button class="text-red-600 hover:text-red-800">Delete</button>
                        </td>
                    </tr>
                    <tr class="hover:bg-neutral-50">
                        <td class="px-6 py-4 text-sm text-neutral-800">MovieMax Central</td>
                        <td class="px-6 py-4 text-sm text-neutral-600">456 Park Avenue</td>
                        <td class="px-6 py-4 text-sm text-neutral-600">Los Angeles</td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <button onclick="document.getElementById('editTheaterModal').classList.remove('hidden')" class="text-blue-600 hover:text-blue-800">Edit</button>
                            <button class="text-red-600 hover:text-red-800">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-neutral-200/30 flex items-center justify-between">
            <div class="text-sm text-neutral-600">Showing 1 to 2 of 2 entries</div>
            <div class="flex space-x-2">
                <button class="px-3 py-1 rounded border border-neutral-200/30 text-neutral-600 hover:bg-neutral-50">Previous</button>
                <button class="px-3 py-1 rounded border border-neutral-200/30 bg-[#2E4053] text-white">1</button>
                <button class="px-3 py-1 rounded border border-neutral-200/30 text-neutral-600 hover:bg-neutral-50">Next</button>
            </div>
        </div>
    </div>

    <!-- Add Theater Modal -->
    <div id="addTheaterModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center">
        <div class="bg-white rounded-lg w-full max-w-md">
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-semibold text-neutral-800">Add New Theater</h3>
                    <button onclick="document.getElementById('addTheaterModal').classList.add('hidden')" class="text-neutral-500 hover:text-neutral-700">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <form>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-neutral-700 mb-1">Theater Name</label>
                            <input type="text" class="w-full px-4 py-2 rounded-lg bg-neutral-100 border border-neutral-200/30 focus:outline-none focus:border-[#2E4053]" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-neutral-700 mb-1">Address</label>
                            <input type="text" class="w-full px-4 py-2 rounded-lg bg-neutral-100 border border-neutral-200/30 focus:outline-none focus:border-[#2E4053]" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-neutral-700 mb-1">City</label>
                            <input type="text" class="w-full px-4 py-2 rounded-lg bg-neutral-100 border border-neutral-200/30 focus:outline-none focus:border-[#2E4053]" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-neutral-700 mb-1">Description</label>
                            <textarea class="w-full px-4 py-2 rounded-lg bg-neutral-100 border border-neutral-200/30 focus:outline-none focus:border-[#2E4053]" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="mt-6 flex justify-end space-x-3">
                        <button type="button" onclick="document.getElementById('addTheaterModal').classList.add('hidden')" class="px-4 py-2 text-neutral-600 hover:bg-neutral-100 rounded-lg">Cancel</button>
                        <button type="submit" class="px-4 py-2 bg-[#2E4053] text-white rounded-lg hover:bg-[#2E4053]/90">Add Theater</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Theater Modal -->
    <div id="editTheaterModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center">
        <div class="bg-white rounded-lg w-full max-w-md">
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-semibold text-neutral-800">Edit Theater</h3>
                    <button onclick="document.getElementById('editTheaterModal').classList.add('hidden')" class="text-neutral-500 hover:text-neutral-700">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <form>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-neutral-700 mb-1">Theater Name</label>
                            <input type="text" value="Cineplex Downtown" class="w-full px-4 py-2 rounded-lg bg-neutral-100 border border-neutral-200/30 focus:outline-none focus:border-[#2E4053]" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-neutral-700 mb-1">Address</label>
                            <input type="text" value="123 Main Street" class="w-full px-4 py-2 rounded-lg bg-neutral-100 border border-neutral-200/30 focus:outline-none focus:border-[#2E4053]" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-neutral-700 mb-1">City</label>
                            <input type="text" value="New York" class="w-full px-4 py-2 rounded-lg bg-neutral-100 border border-neutral-200/30 focus:outline-none focus:border-[#2E4053]" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-neutral-700 mb-1">Description</label>
                            <textarea class="w-full px-4 py-2 rounded-lg bg-neutral-100 border border-neutral-200/30 focus:outline-none focus:border-[#2E4053]" rows="3">Premium movie theater in downtown area with state-of-the-art facilities.</textarea>
                        </div>
                    </div>
                    <div class="mt-6 flex justify-end space-x-3">
                        <button type="button" onclick="document.getElementById('editTheaterModal').classList.add('hidden')" class="px-4 py-2 text-neutral-600 hover:bg-neutral-100 rounded-lg">Cancel</button>
                        <button type="submit" class="px-4 py-2 bg-[#2E4053] text-white rounded-lg hover:bg-[#2E4053]/90">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
include 'admin_layout.php';
?>