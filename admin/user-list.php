<?php
$page_title = "Admin Dashboard";
ob_start();
?>
<section id="UserManagement" class="p-6 bg-neutral-900">
    <!-- Header with Add User Button -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-white">User Management</h2>
        <button @click="document.getElementById('addUserModal').classList.remove('hidden')" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200 flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Add New User
        </button>
    </div>

    <!-- Filters -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <input type="text" placeholder="Search users..." class="px-4 py-2 bg-neutral-800 border border-neutral-700 rounded-lg text-white focus:outline-none focus:border-blue-500">
        <select class="px-4 py-2 bg-neutral-800 border border-neutral-700 rounded-lg text-white focus:outline-none focus:border-blue-500">
            <option>All Roles</option>
            <option>Admin</option>
            <option>Manager</option>
            <option>Staff</option>
        </select>
        <select class="px-4 py-2 bg-neutral-800 border border-neutral-700 rounded-lg text-white focus:outline-none focus:border-blue-500">
            <option>All Status</option>
            <option>Active</option>
            <option>Inactive</option>
            <option>Suspended</option>
        </select>
    </div>

    <!-- Users Table -->
    <div class="bg-neutral-800 border border-neutral-700 rounded-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead>
                    <tr class="border-b border-neutral-700 bg-neutral-800">
                        <th class="px-6 py-4 text-left text-sm font-semibold text-white">User</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-white">Role</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-white">Email</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-white">Status</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-white">Last Login</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-white">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-neutral-700">
                    <tr class="hover:bg-neutral-700/50 transition duration-200">
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <img src="https://avatar.iran.liara.run/public" alt="User" class="w-8 h-8 rounded-full">
                                <div class="ml-3">
                                    <p class="text-sm text-white font-medium">John Doe</p>
                                    <p class="text-xs text-neutral-400">Created 2 months ago</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 text-xs font-medium bg-blue-500/20 text-blue-500 rounded-full">Admin</span>
                        </td>
                        <td class="px-6 py-4 text-sm text-white">john@example.com</td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 text-xs font-medium bg-green-500/20 text-green-500 rounded-full">Active</span>
                        </td>
                        <td class="px-6 py-4 text-sm text-neutral-400">2 hours ago</td>
                        <td class="px-6 py-4">
                            <div class="flex space-x-3">
                                <button class="text-neutral-400 hover:text-white transition duration-200">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                    </svg>
                                </button>
                                <button class="text-neutral-400 hover:text-red-500 transition duration-200">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="px-6 py-4 border-t border-neutral-700 flex items-center justify-between">
            <p class="text-sm text-neutral-400">Showing 1 to 10 of 45 users</p>
            <div class="flex space-x-2">
                <button class="px-3 py-1 bg-neutral-700 text-white rounded hover:bg-neutral-600 transition duration-200">Previous</button>
                <button class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700 transition duration-200">1</button>
                <button class="px-3 py-1 bg-neutral-700 text-white rounded hover:bg-neutral-600 transition duration-200">2</button>
                <button class="px-3 py-1 bg-neutral-700 text-white rounded hover:bg-neutral-600 transition duration-200">3</button>
                <button class="px-3 py-1 bg-neutral-700 text-white rounded hover:bg-neutral-600 transition duration-200">Next</button>
            </div>
        </div>
    </div>

    <!-- Add User Modal -->
    <div id="addUserModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
        <div class="bg-neutral-800 rounded-lg p-6 w-full max-w-md">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold text-white">Add New User</h3>
                <button @click="document.getElementById('addUserModal').classList.add('hidden')" class="text-neutral-400 hover:text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <form class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-neutral-300 mb-1">Full Name</label>
                    <input type="text" class="w-full px-4 py-2 bg-neutral-700 border border-neutral-600 rounded-lg text-white focus:outline-none focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-neutral-300 mb-1">Email</label>
                    <input type="email" class="w-full px-4 py-2 bg-neutral-700 border border-neutral-600 rounded-lg text-white focus:outline-none focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-neutral-300 mb-1">Role</label>
                    <select class="w-full px-4 py-2 bg-neutral-700 border border-neutral-600 rounded-lg text-white focus:outline-none focus:border-blue-500">
                        <option>Admin</option>
                        <option>Manager</option>
                        <option>Staff</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-neutral-300 mb-1">Password</label>
                    <input type="password" class="w-full px-4 py-2 bg-neutral-700 border border-neutral-600 rounded-lg text-white focus:outline-none focus:border-blue-500">
                </div>
                <div class="flex justify-end space-x-4 mt-6">
                    <button type="button" @click="document.getElementById('addUserModal').classList.add('hidden')" class="px-4 py-2 text-neutral-400 hover:text-white transition duration-200">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200">Add User</button>
                </div>
            </form>
        </div>
    </div>
</section>
<?php
$content = ob_get_clean();
include 'admin_layout.php';
?>