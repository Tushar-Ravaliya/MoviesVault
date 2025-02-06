<?php
$page_title = "Add Movie";
ob_start();
?>
<div class="w-full flex flex-col items-center overflow-y-auto">
    <div class="mt-8 w-10/12">
        <h4 class="text-gray-600">
            Add Genre
        </h4>

        <div class="mt-4">
            <div class="p-6  bg-white rounded-md border border-gray-300 ">
                <h2 class="text-lg font-semibold text-gray-700 capitalize">
                    Add Genre
                </h2>

                <form method="post" action="">

                    <div class="gap-6 mt-4 sm:grid-cols-2">
                        <div class="flex justify-between items-center">
                            <div class="w-full">
                                <label class="text-gray-700" for="username">Category Name</label>
                                <input
                                    class="w-2/4 mt-2 pl-2 border h-8 border-gray-400 outline-none rounded-md focus:border-blue-600 focus:ring focus:ring-opacity-40 focus:ring-blue-500"
                                    type="text"
                                    name="genre">
                            </div>
                            <button type="submit"
                                class="px-5 py-2 text-center border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none">Add</button>
                        </div>

                    </div>


                </form>
            </div>
        </div>

        <div class="p-6 mt-10 bg-white rounded-md border border-gray-300">
            <ul>
                <li class="inline-block text-lg">Action</li><button type="button" class="py-1 ml-10 px-2 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-blue-600 text-blue-600 hover:border-blue-500 hover:text-blue-500 focus:outline-none focus:border-blue-500 focus:text-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:border-blue-500 dark:text-blue-500 dark:hover:text-blue-400 dark:hover:border-blue-400">
                    Edit
                </button>
                <button type="button" class="py-1 px-2 ml-5 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-red-500 text-red-500 hover:border-red-400 hover:text-red-400 focus:outline-none focus:border-red-400 focus:text-red-400 disabled:opacity-50 disabled:pointer-events-none">
                    Delete
                </button>

            </ul>
        </div>
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

            const genre = form.genre.value.trim()

            if (!genre) {
                callToast("Genre is required.", "error");
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
