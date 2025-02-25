<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <link href="../../public/output.css" rel="stylesheet">
</head>

<body class="font-inter overflow-hidden">
     <section class="flex justify-center relative">
          <img src="../../public/Images/login_img.png" alt="gradient background image"
               class="w-full h-full object-cover fixed  border-none backdrop-blur-sm">
          <div class="mx-auto max-w-lg px-6 lg:px-8 absolute py-20">
               <img src="../../public/Images/logo-white.png" alt="pagedone logo" class="mx-auto lg:mb-11 mb-8 object-cover">

               <div class="rounded-2xl bg-gray-200/20 backdrop-blur-sm shadow-xl z-10">
                    <form action="../../app/controller/signin.php" method="POST" class="lg:p-11 p-7 mx-auto" id="loginForm">
                         <div class="mb-11">
                              <h1 class="text-white text-center font-manrope text-3xl font-bold leading-10 mb-2">Welcome
                                   Back</h1>
                              <p class="text-gray-200 text-center text-base font-medium leading-6">Unlock endless
                                   entertainment with MoviesVault</p>
                         </div>

                         <input type="email"
                              class="w-full h-10 text-gray-900 placeholder:text-gray-400 text-lg font-normal leading-7 rounded-full border-gray-300 border shadow-sm focus:outline-none px-4 mb-6"
                              placeholder="Email" name="email" id="email">
                         <input type="password"
                              class="w-full h-10 text-gray-900 placeholder:text-gray-400 text-lg font-normal leading-7 rounded-full border-gray-300 border shadow-sm focus:outline-none px-4 mb-1"
                              placeholder="Password" name="password" id="password">
                         <a href="forget_password.php" class="flex justify-end mb-6">
                              <span class="text-blue-600 text-right text-base font-normal leading-6">Forgot
                                   Password?</span>
                         </a>
                         <input
                              class="w-full h-12 text-white text-center text-base font-semibold leading-6 rounded-full hover:bg-red-600 transition-all duration-700 bg-red-600/70 shadow-sm mb-11"
                              type="submit" name="signin" value="Log in">
                         <a href="Register.php"
                              class="flex justify-center text-gray-200 text-base font-medium leading-6"> Don't have an
                              account? <span class="text-indigo-600 font-semibold pl-3"> Sign Up</span>
                         </a>
                    </form>
               </div>
          </div>
     </section>

     <script>
          function tostifyCustomClose(el) {
               const parent = el.closest('.toastify');
               const close = parent.querySelector('.toast-close');
               close.click();
          }

          window.addEventListener('load', () => {
               const callToast = (message) => {
                    const toastMarkup = `
                         <div class="flex p-4">
                              <p class="text-sm text-red-700">${message}</p>
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

               const form = document.getElementById("loginForm");
               form.addEventListener("submit", (event) => {
                    event.preventDefault(); // Prevent form submission

                    const email = document.getElementById("email").value.trim();
                    const password = document.getElementById("password").value.trim();

                    if (!email.match(/^\S+@\S+\.\S+$/)) {
                         callToast("Invalid email format.");
                         return;
                    }
                    if (password.length < 2) {
                         callToast("Password must be at least 6 characters.");
                         return;
                    }

                    form.submit(); // If validation passes, submit the form
               });
          });
     </script>

</body>
<script src="../../node_modules/toastify-js/src/toastify.js"></script>


</html>