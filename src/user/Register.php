<?php
include("../../config/connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <link href="../../public/output.css" rel="stylesheet">
</head>

<body class="font-inter" style="background-image:url('../../public/Images/login_img.png')">
     <section class="flex justify-center w-full h-full bg-cover ">
          <!-- <img src="../../public/Images/login_img.png" alt="gradient background image"
                    class="w-full h-full border-none bg-cover sticky"> -->
          <div class="mx-auto max-w-lg px-6 lg:px-8 absolute py-20">
               <img src="../../public/Images/logo-white.png" alt="pagedone logo" class="mx-auto lg:mb-11 mb-8 object-cover">

               <div class="rounded-2xl bg-gray-200/20 backdrop-blur-sm shadow-xl z-10">
                    <form action="../../app/controller/signup.php" method="POST" enctype="multipart/form-data" class="lg:p-11 p-7 mx-auto">
                         <div class="mb-11">
                              <h1 class="text-white text-center font-manrope text-3xl font-bold leading-10 mb-2">Welcome
                                   Back</h1>
                              <p class="text-gray-200 text-center text-base font-medium leading-6">Unlock endless
                                   entertainment with MoviesVault</p>
                         </div>
                         <input type="text"
                              class="w-full h-10 text-gray-900 placeholder:text-gray-400 text-lg font-normal leading-7 rounded-full border-gray-300 border shadow-sm focus:outline-none px-4 mb-4 placeholder:text-base"
                              placeholder="Name" name="name">

                         <input type="email"
                              class="w-full h-10 text-gray-900 placeholder:text-gray-400 text-lg font-normal leading-7 rounded-full border-gray-300 border shadow-sm focus:outline-none px-4 mb-4 placeholder:text-base"
                              placeholder="Email" name="email">
                         <input type="number"
                              class="w-full h-10 text-gray-900 placeholder:text-gray-400 text-lg font-normal leading-7 rounded-full border-gray-300 border shadow-sm focus:outline-none px-4 mb-4 placeholder:text-base"
                              placeholder="Mobile Number" name="mobile_no">
                         <input type="password"
                              class="w-full h-10 text-gray-900 placeholder:text-gray-400 text-lg font-normal leading-7 rounded-full border-gray-300 border shadow-sm focus:outline-none px-4 mb-4 placeholder:text-base"
                              placeholder="Password" name="password">
                         <input type="password"
                              class="w-full h-10 text-gray-900 placeholder:text-gray-400 text-lg font-normal leading-7 rounded-full border-gray-300 border shadow-sm focus:outline-none px-4 mb-4 placeholder:text-base"
                              placeholder="Confirm Password" name="confirm_password">

                         <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                              for="multiple_files">Profile Picture</label>
                         <input
                              class="block w-full text-sm text-gray-900 border border-gray-300 rounded-full cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none px-4 py-2 dark:placeholder-gray-400 "
                              id="multiple_files" name="pic" type="file">


                         <a href="javascript:;" class="flex justify-end mb-4">
                              <span class="text-blue-600 text-right text-base font-normal leading-6">Forgot
                                   Password?</span>
                         </a>
                         <input
                              class="w-full h-12 text-white text-center text-base font-semibold leading-6 rounded-full hover:bg-red-600 transition-all duration-700 bg-red-600/70 shadow-sm mb-11" name="signup"
                              type="submit" value="Log in">

                         <a href="login.php"
                              class="flex justify-center text-gray-200 text-base font-medium leading-6"> have an
                              account? <span class="text-indigo-600 font-semibold pl-3"> Sign In</span>
                         </a>
                    </form>
               </div>
          </div>
     </section>
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

                    // Retrieve form data
                    const name = form.querySelector("input[name='name']").value.trim();
                    const email = form.querySelector("input[name='email']").value.trim();
                    const mobile_no = form.querySelector("input[name='mobile_no']").value.trim();
                    const password = form.querySelector("input[name='password']").value.trim();
                    const confirm_password = form.querySelector("input[name='confirm_password']").value.trim();

                    // Validation
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
                    if (password.length < 6) {
                         callToast("Password must be at least 6 characters.", "error");
                         return;
                    }
                    if (password !== confirm_password) {
                         callToast("Passwords do not match.", "error");
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

</body>

</html>