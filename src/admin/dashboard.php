<!-- dashboard.php -->
<?php
$page_title = "Admin Dashboard";
ob_start();
?>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    <div class="bg-white border border-neutral-200 rounded-lg p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-neutral-600">Total Bookings</p>
                <h3 class="text-2xl font-bold text-neutral-900">1,247</h3>
            </div>
            <div class="bg-green-100 p-3 rounded-full">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
            </div>
        </div>
        <div class="mt-4 flex items-center text-sm">
            <span class="text-green-600">↑ 12%</span>
            <span class="text-neutral-600 ml-2">from last month</span>
        </div>
    </div>

    <div class="bg-white border border-neutral-200 rounded-lg p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-neutral-600">Revenue</p>
                <h3 class="text-2xl font-bold text-neutral-900">$24,389</h3>
            </div>
            <div class="bg-blue-100 p-3 rounded-full">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
        </div>
        <div class="mt-4 flex items-center text-sm">
            <span class="text-green-600">↑ 8.7%</span>
            <span class="text-neutral-600 ml-2">from last month</span>
        </div>
    </div>

    <div class="bg-white border border-neutral-200 rounded-lg p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-neutral-600">Active Movies</p>
                <h3 class="text-2xl font-bold text-neutral-900">18</h3>
            </div>
            <div class="bg-purple-100 p-3 rounded-full">
                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z" />
                </svg>
            </div>
        </div>
        <div class="mt-4 flex items-center text-sm">
            <span class="text-purple-600">+3</span>
            <span class="text-neutral-600 ml-2">new releases</span>
        </div>
    </div>

    <div class="bg-white border border-neutral-200 rounded-lg p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-neutral-600">Theater Occupancy</p>
                <h3 class="text-2xl font-bold text-neutral-900">72%</h3>
            </div>
            <div class="bg-yellow-100 p-3 rounded-full">
                <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                </svg>
            </div>
        </div>
        <div class="mt-4 flex items-center text-sm">
            <span class="text-green-600">↑ 5%</span>
            <span class="text-neutral-600 ml-2">from last week</span>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
include 'admin_layout.php';
?>