<?php
$page_title = "Admin Dashboard";
ob_start();
?>
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.13.3/cdn.min.js"></script>

<div id="add_theater" class="pt-20 px-6 pb-6" x-data="{ step: 1, screens: [], showConfirmation: false }">
    <!-- Header -->
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-[#212121]">Add New Theater</h2>
        <p class="text-neutral-600">Complete the form below to add a new theater</p>
    </div>

    <!-- Progress Bar -->
    <div class="mb-8">
        <div class="flex justify-between mb-2">
            <span class="text-sm" :class="step >= 1 ? 'text-[#3498db]' : 'text-neutral-400'">Theater Details</span>
            <span class="text-sm" :class="step >= 2 ? 'text-[#3498db]' : 'text-neutral-400'">Screen Details</span>
            <span class="text-sm" :class="step >= 3 ? 'text-[#3498db]' : 'text-neutral-400'">Seat Configuration</span>
        </div>
        <div class="h-2 bg-neutral-200 rounded-full">
            <div class="h-2 bg-[#3498db] rounded-full transition-all duration-300"
                :style="'width: ' + ((step - 1) * 50) + '%'"></div>
        </div>
    </div>

    <!-- Form Steps -->
    <div class="bg-white rounded-lg border border-neutral-200/20 p-6">
        <!-- Step 1: Theater Details -->
        <div x-show="step === 1" class="space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-[#212121] mb-2">Theater Name</label>
                    <input type="text" class="w-full px-4 py-2 rounded-lg border border-neutral-200/20 focus:outline-none focus:ring-2 focus:ring-[#3498db]" placeholder="Enter theater name">
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#212121] mb-2">Contact Number</label>
                    <input type="tel" class="w-full px-4 py-2 rounded-lg border border-neutral-200/20 focus:outline-none focus:ring-2 focus:ring-[#3498db]" placeholder="Enter contact number">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-[#212121] mb-2">Email Address</label>
                    <input type="email" class="w-full px-4 py-2 rounded-lg border border-neutral-200/20 focus:outline-none focus:ring-2 focus:ring-[#3498db]" placeholder="Enter email address">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-[#212121] mb-2">Address</label>
                    <textarea class="w-full px-4 py-2 rounded-lg border border-neutral-200/20 focus:outline-none focus:ring-2 focus:ring-[#3498db]" rows="3" placeholder="Enter complete address"></textarea>
                </div>
            </div>
        </div>

        <!-- Step 2: Screen Details -->
        <div x-show="step === 2" class="space-y-6">
            <template x-for="(screen, index) in screens" :key="index">
                <div class="p-4 bg-neutral-50 rounded-lg space-y-4">
                    <div class="flex justify-between items-center">
                        <h4 class="text-lg font-medium text-[#212121]" x-text="'Screen ' + (index + 1)"></h4>
                        <button class="text-red-600 hover:text-red-700" @click="screens.splice(index, 1)">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <input type="text" class="px-4 py-2 rounded-lg border border-neutral-200/20 focus:outline-none focus:ring-2 focus:ring-[#3498db]" placeholder="Screen name">
                        <select class="px-4 py-2 rounded-lg border border-neutral-200/20 focus:outline-none focus:ring-2 focus:ring-[#3498db]">
                            <option value="">Select screen type</option>
                            <option value="2d">2D</option>
                            <option value="3d">3D</option>
                            <option value="imax">IMAX</option>
                        </select>
                        <select class="px-4 py-2 rounded-lg border border-neutral-200/20 focus:outline-none focus:ring-2 focus:ring-[#3498db]">
                            <option value="">Select format</option>
                            <option value="standard">Standard</option>
                            <option value="wide">Wide Screen</option>
                            <option value="ultra">Ultra Wide</option>
                        </select>
                    </div>
                </div>
            </template>
            <button @click="screens.push({})" class="w-full py-3 border-2 border-dashed border-neutral-300 rounded-lg text-neutral-600 hover:border-[#3498db] hover:text-[#3498db] transition-colors duration-300">
                + Add New Screen
            </button>
        </div>

        <!-- Step 3: Seat Configuration -->
        <div x-show="step === 3" class="space-y-6">
            <div class="border border-neutral-200/20 rounded-lg p-4">
                <div class="grid grid-cols-10 gap-2 mb-4">
                    <template x-for="i in 50">
                        <button class="aspect-square rounded w-14 bg-neutral-100 hover:bg-[#3498db] hover:text-white transition-colors duration-300"></button>
                    </template>
                </div>
                <div class="flex gap-4 mt-4">
                    <div class="flex items-center gap-2">
                        <div class="w-4 h-4 bg-neutral-100 rounded"></div>
                        <span class="text-sm text-neutral-600">Regular</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="w-4 h-4 bg-[#3498db] rounded"></div>
                        <span class="text-sm text-neutral-600">Premium</span>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-[#212121] mb-2">Regular Seat Price</label>
                    <input type="number" class="w-full px-4 py-2 rounded-lg border border-neutral-200/20 focus:outline-none focus:ring-2 focus:ring-[#3498db]" placeholder="Enter price">
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#212121] mb-2">Premium Seat Price</label>
                    <input type="number" class="w-full px-4 py-2 rounded-lg border border-neutral-200/20 focus:outline-none focus:ring-2 focus:ring-[#3498db]" placeholder="Enter price">
                </div>
            </div>
        </div>

        <!-- Navigation Buttons -->
        <div class="flex justify-between mt-8">
            <button x-show="step > 1" @click="step--" class="px-6 py-2 text-[#3498db] hover:bg-blue-50 rounded-lg transition-colors duration-300">
                Previous
            </button>
            <button x-show="step < 3" @click="step++" class="ml-auto px-6 py-2 bg-[#3498db] text-white rounded-lg hover:bg-[#2980b9] transition-colors duration-300">
                Continue
            </button>
            <button x-show="step === 3" @click="showConfirmation = true" class="ml-auto px-6 py-2 bg-[#3498db] text-white rounded-lg hover:bg-[#2980b9] transition-colors duration-300">
                Review & Save
            </button>
        </div>
    </div>

    <!-- Confirmation Dialog -->
    <div x-show="showConfirmation" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg p-6 max-w-md w-full mx-4">
            <h3 class="text-xl font-bold text-[#212121] mb-4">Confirm Theater Details</h3>
            <div class="space-y-4">
                <div>
                    <h4 class="font-medium text-[#212121]">Theater Information</h4>
                    <p class="text-neutral-600">Grand Theater</p>
                    <p class="text-neutral-600">123 Main St, New York, NY</p>
                </div>
                <div>
                    <h4 class="font-medium text-[#212121]">Screens</h4>
                    <p class="text-neutral-600">Total Screens: 3</p>
                </div>
                <div>
                    <h4 class="font-medium text-[#212121]">Seating</h4>
                    <p class="text-neutral-600">Total Capacity: 450 seats</p>
                </div>
            </div>
            <div class="flex gap-4 mt-6">
                <button @click="showConfirmation = false" class="flex-1 px-6 py-2 text-[#3498db] hover:bg-blue-50 rounded-lg transition-colors duration-300">
                    Edit
                </button>
                <button class="flex-1 px-6 py-2 bg-[#3498db] text-white rounded-lg hover:bg-[#2980b9] transition-colors duration-300">
                    Confirm & Save
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('add_theater', () => ({
            step: 1,
            screens: [],
            showConfirmation: false
        }))
    })
</script>

<?php
$content = ob_get_clean();
include 'admin_layout.php';
?>