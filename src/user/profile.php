<?php
include ("Nevigation.php");
?>
<div id="profile_management" class="p-6">
     <div class="max-w-4xl mx-auto">
          <div class="mb-8">
               <h1 class="text-2xl font-bold text-gray-800">Profile Settings</h1>
               <p class="text-sm text-gray-600 mt-1">Manage your account information and preferences</p>
          </div>
          <div class="flex items-center space-x-6">
               <div class="relative">
                    <img src="../../public/profile/profile-pic.png" alt="Profile"
                         class="w-24 h-24 rounded-full border border-neutral-400">
                    <button
                         class="absolute bottom-0 right-0 bg-white p-1.5 rounded-full border border-neutral-400 hover:bg-gray-50">
                         <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                   d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                         </svg>
                    </button>
               </div>
               <div>
                    <h3 class="text-lg font-medium text-gray-900">Profile Photo</h3>
                    <p class="text-sm text-gray-500">JPG, GIF or PNG. Max size of 800K</p>
               </div>
          </div>
          <div class="bg-white rounded border border-neutral-200/20">
               <div class="p-4 space-y-6">
                    <form class="space-y-6" method="post" id="profileForm">

                         <div>
                              <label class="block text-sm font-medium text-gray-700">First Name</label>
                              <input type="text" name="name"
                                   class="mt-1 block w-full border border-neutral-400 rounded py-2 px-3 text-gray-700">
                         </div>

                         <div>
                              <label class="block text-sm font-medium text-gray-700">Email</label>
                              <input type="email" name="email"
                                   class="mt-1 block w-full border border-neutral-400 rounded py-2 px-3 text-gray-700">
                         </div>
                         <div>
                              <label class="block text-sm font-medium text-gray-700">Phone Number</label>
                              <input type="tel" name="mobile_no"
                                   class="mt-1 block w-full border border-neutral-400 rounded py-2 px-3 text-gray-700">
                         </div>
                         <div class="pt-6 border-t border-neutral-400">
                              <h3 class="text-lg font-medium text-gray-900 mb-4">Change Password</h3>
                              <div class="space-y-4">
                                   <div>
                                        <label class="block text-sm font-medium text-gray-700">New Password</label>
                                        <input type="password" name="password"
                                             class="mt-1 block w-full border border-neutral-400 rounded py-2 px-3 text-gray-700">
                                   </div>
                                   <div>
                                        <label class="block text-sm font-medium text-gray-700">Confirm New
                                             Password</label>
                                        <input type="password" name="confirm_password"
                                             class="mt-1 block w-full border border-neutral-400 rounded py-2 px-3 text-gray-700">
                                   </div>
                              </div>
                         </div>
                         <div class="flex justify-end space-x-3 pt-6">
                              <a href="../../app/controller/signout.php" type="button"
                                   class="px-4 py-2 border border-red-500 rounded text-red-500 hover:bg-red-500 hover:text-white">Logout</a>
                              <button type="submit"
                                   class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Save
                                   Changes</button>
                         </div>
                    </form>
               </div>
          </div>
     </div>
</div>
<script src="../../node_modules/toastify-js/src/toastify.js"></script>

<script>
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

     document.querySelector("#profileForm").addEventListener("submit", (event) => {
          event.preventDefault();

          const form = event.target;
          const name = form.name.value.trim();
          const email = form.email.value.trim();
          const mobile_no = form.mobile_no.value.trim();
          const password = form.password.value.trim();
          const confirm_password = form.confirm_password.value.trim();

          if (!name) {
               callToast("Name is required.", "error");
               return;
          }
          if (!email.match(/^\S+@\S+\.\S+$/)) {
               callToast("Invalid email format.", "error");
               return;
          }
          if (!mobile_no.match(/^\d{10}$/)) {
               callToast("Mobile number must be 10 digits.", "error");
               return;
          }
          if (password.length > 0 && password.length < 6) {
               callToast("Password must be at least 6 characters.", "error");
               return;
          }
          if (password !== confirm_password) {
               callToast("Passwords do not match.", "error");
               return;
          }

          callToast("Form validated successfully. Submitting...");
          setTimeout(() => form.submit(), 500);
     });
});
</script>
<?php
$content = ob_get_clean();
include ("Footer.php");