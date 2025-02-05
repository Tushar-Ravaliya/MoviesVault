<?php
$page_title = "Profile";
ob_start();
?>
<div id="profile_management" class="p-6">
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-gray-800">Profile Settings</h1>
            <p class="text-sm text-gray-600 mt-1">Manage your account information and preferences</p>
        </div>

        <!-- Profile Form -->
        <div class="bg-white rounded border border-neutral-200/20">
            <div class="p-4 space-y-6">
                <!-- Profile Picture Section -->
                <div class="flex items-center space-x-6">
                    <div class="relative">
                        <img src="https://avatar.iran.liara.run/public" alt="Profile" class="w-24 h-24 rounded-full border border-neutral-400">
                        <button class="absolute bottom-0 right-0 bg-white p-1.5 rounded-full border border-neutral-400 hover:bg-gray-50">
                            <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                            </svg>
                        </button>
                    </div>
                    <div>
                        <h3 class="text-lg font-medium text-gray-900">Profile Photo</h3>
                        <p class="text-sm text-gray-500">JPG, GIF or PNG. Max size of 800K</p>
                    </div>
                </div>

                <!-- Form Fields -->
                <form class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">First Name</label>
                            <input type="text" class="mt-1 block w-full border border-neutral-400 rounded py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" value="John">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Last Name</label>
                            <input type="text" class="mt-1 block w-full border border-neutral-400 rounded py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" value="Doe">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" class="mt-1 block w-full border border-neutral-400 rounded py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" value="john@example.com">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Phone Number</label>
                        <input type="tel" class="mt-1 block w-full border border-neutral-400 rounded py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" value="+1 (555) 123-4567">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Address</label>
                        <textarea class="mt-1 block w-full border border-neutral-400 rounded py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" rows="3"></textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Preferred Language</label>
                        <select class="mt-1 block w-full border border-neutral-400 rounded py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option>English</option>
                            <option>Spanish</option>
                            <option>French</option>
                        </select>
                    </div>

                    <!-- Password Change Section -->
                    <div class="pt-6 border-t border-neutral-400">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Change Password</h3>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Current Password</label>
                                <input type="password" class="mt-1 block w-full border border-neutral-400 rounded py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">New Password</label>
                                <input type="password" class="mt-1 block w-full border border-neutral-400 rounded py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Confirm New Password</label>
                                <input type="password" class="mt-1 block w-full border border-neutral-400 rounded py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                        </div>
                    </div>

                    <!-- Save Button -->
                    <div class="flex justify-end space-x-3 pt-6">
                        <button type="button" class="px-4 py-2 border border-neutral-400 rounded text-gray-700 hover:bg-gray-50">Cancel</button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
include 'admin_layout.php';
