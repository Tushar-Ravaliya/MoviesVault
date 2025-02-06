<?php
$page_title = "Admin Dashboard";
ob_start();
?>
<div id="showtimes" class="p-6 space-y-6">
    <!-- Header Actions -->
    <div class="flex justify-between items-center">
        <h2 class="text-xl font-semibold text-neutral-900">Showtime Management</h2>
        <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors flex items-center" onclick="document.getElementById('addScreenModal').classList.remove('hidden')">
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
<div id="addScreenModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 lg:w-1/2 shadow-lg rounded-lg bg-white">
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
                <label class="block text-sm font-medium text-gray-700 mb-1">Select Movie</label>
                <select name="movie" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                    <option value="">Select type</option>
                    <option value="premium">Interstellar</option>
                    <option value="regular">Inception</option>
                    <option value="vip">The Dark Knight</option>
                </select>
            </div>
            <div class="flex">
                <div class="w-full">
                    <label class=" block text-sm font-medium text-gray-700 mb-1">Show Time</label>
                    <input name="show_time" type="date" class="w-full h-11 border border-gray-300 rounded-lg px-3 py-2 ">
                </div>
                <div class="w-full ml-5">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Select Theater</label>
                    <select name="theater" class="w-full h-11 border border-gray-300 rounded-lg px-3 py-2">
                        <option value="">Select type</option>
                        <option value="premium">Premium Theater</option>
                        <option value="regular">Regular Theater</option>
                        <option value="vip">VIP Theater</option>
                    </select>
                </div>
            </div>
            <div class="flex">
                <div class="w-full ">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Select screens</label>
                    <select name="screen" class="w-full h-11 border border-gray-300 rounded-lg px-3 py-2">
                        <option value="">Select type</option>
                        <option value="screen 1">screen 1</option>
                        <option value="screen 1">screen 2</option>
                        <option value="screen 1">screen 3</option>
                    </select>
                </div>
                <div class="w-full ml-5">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Price</label>
                    <input name="price" type="number" class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="Enter total seats">
                </div>
            </div>

            <div class="flex justify-end space-x-3 pt-4">
                <button type="button" onclick="document.getElementById('addScreenModal').classList.add('hidden')" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200">Cancel</button>
                <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700">Add Screen</button>
            </div>
        </form>
    </div>
</div>
<script src="../../node_modules/toastify-js/src/toastify.js"></script>
<script>
    function tostifyCustomClose(el) {
        const parent = el.closest('.toastify');
        const close = parent.querySelector('.toast-close');
        close.click();
    }

    window.addEventListener('load', () => {
        const callToast = (message, type = "success") => {
            const toastMarkup = `
               <div class="flex p-4">
                    <p class="text-sm ${type === "success" ? "text-green-700" : "text-red-700"}">${message}</p>
                    <div class="ms-auto">
                         <button onclick="tostifyCustomClose(this)" type="button" class="inline-flex shrink-0 justify-center items-center size-5 rounded-lg text-gray-800 opacity-50 hover:opacity-100 focus:outline-none focus:opacity-100 dark:text-white" aria-label="Close">
                              <span class="sr-only">Close</span>
                              <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"></path><path d="m6 6 12 12"></path></svg>
                         </button>
                    </div>
               </div>`;

            Toastify({
                text: toastMarkup,
                className: "hs-toastify-on:opacity-100 opacity-0 fixed -top-[150px] right-[20px] z-[90] transition-all duration-300 w-[320px] bg-white text-sm border rounded-xl shadow-lg [&>.toast-close]:hidden",
                duration: 3000,
                close: true,
                escapeMarkup: false
            }).showToast();
        };

        const form = document.querySelector("form");
        form.addEventListener("submit", (event) => {
            event.preventDefault(); // Prevent form submission


            const movie = form.movie.value.trim();
            const show_time = form.show_time.value.trim();
            const theater = form.theater.value.trim()
            const screen = form.screen.value.trim()
            const price = form.price.value.trim()

            if (!movie) {
                callToast("Please select a movie.", "error");
                return;
            }
            if (!show_time) {
                callToast("Please select a show time.", "error");
                return;
            }
            if (!theater) {
                callToast("Please select a theater.", "error");
                return;
            }
            if (!screen) {
                callToast("Please select a screen.", "error");
                return;
            }
            if (!price) {
                callToast("price is required.", "error");
                return;
            }


            // If all validations pass
            callToast("Form validated successfully. Submitting...");
            setTimeout(() => {
                form.submit(); // Call this after any animations
            }, 100);
        });
    });
</script>
<?php
$content = ob_get_clean();
include 'admin_layout.php';
?>