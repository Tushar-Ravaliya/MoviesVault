<?php
$page_title = "Admin Dashboard";
ob_start();
?>
<div class="bg-white border border-neutral-200 rounded-lg overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-neutral-200">
            <thead class="bg-neutral-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-neutral-500 uppercase tracking-wider">Booking ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-neutral-500 uppercase tracking-wider">Customer</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-neutral-500 uppercase tracking-wider">Movie & Show</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-neutral-500 uppercase tracking-wider">Theater</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-neutral-500 uppercase tracking-wider">Amount</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-neutral-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-neutral-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-neutral-200">
                <!-- Booking Row 1 -->
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-neutral-900">#BK1234</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <img class="h-8 w-8 rounded-full" src="https://avatar.iran.liara.run/public" alt="">
                            <div class="ml-4">
                                <div class="text-sm font-medium text-neutral-900">John Doe</div>
                                <div class="text-sm text-neutral-500">john@example.com</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-neutral-900">Inception</div>
                        <div class="text-sm text-neutral-500">Feb 20, 2024 - 7:00 PM</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-neutral-900">Grand Cinema</div>
                        <div class="text-sm text-neutral-500">Screen 1, Seats: A1, A2</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-neutral-900">$45.00</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Confirmed</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                        <button class="text-indigo-600 hover:text-indigo-900">View</button>
                        <button class="text-red-600 hover:text-red-900">Cancel</button>
                    </td>
                </tr>

                <!-- Booking Row 2 -->
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-neutral-900">#BK1235</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <img class="h-8 w-8 rounded-full" src="https://avatar.iran.liara.run/public" alt="">
                            <div class="ml-4">
                                <div class="text-sm font-medium text-neutral-900">Jane Smith</div>
                                <div class="text-sm text-neutral-500">jane@example.com</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-neutral-900">The Matrix</div>
                        <div class="text-sm text-neutral-500">Feb 20, 2024 - 9:30 PM</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-neutral-900">Starlight Multiplex</div>
                        <div class="text-sm text-neutral-500">Screen 2, Seats: B3, B4</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-neutral-900">$35.00</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                        <button class="text-indigo-600 hover:text-indigo-900">View</button>
                        <button class="text-red-600 hover:text-red-900">Cancel</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?php
$content = ob_get_clean();
include 'admin_layout.php';
?>