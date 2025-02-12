document.addEventListener("DOMContentLoaded", () => {
  // Reusable toast notification function
  const callToast = (message, type = "success") => {
    const toastMarkup = `
      <div class="flex p-4">
        <p class="text-sm ${
          type === "success" ? "text-green-700" : "text-red-700"
        }">${message}</p>
        <div class="ms-auto">
          <button onclick="this.parentElement.parentElement.parentElement.remove()" type="button" class="inline-flex shrink-0 justify-center items-center size-5 rounded-lg text-gray-800 opacity-50 hover:opacity-100 focus:outline-none focus:opacity-100 dark:text-white" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M18 6 6 18"></path>
              <path d="m6 6 12 12"></path>
            </svg>
          </button>
        </div>
      </div>`;

    Toastify({
      text: toastMarkup,
      className:
        "hs-toastify-on:opacity-100 opacity-0 fixed -top-[150px] right-[20px] z-[90] transition-all duration-300 w-[320px] bg-white text-sm border rounded-xl shadow-lg [&>.toast-close]:hidden",
      duration: 3000,
      close: true,
      escapeMarkup: false,
    }).showToast();
  };

  // Form validation function
  const validateForm = (form) => {
    const name = form.name.value.trim();
    const email = form.email.value.trim();
    const mobile_no = form.mobile_no.value.trim();
    const password = form.password.value.trim();
    const confirm_password = form.confirm_password.value.trim();

    if (!name) return callToast("Name is required.", "error");
    if (!email.match(/^\S+@\S+\.\S+$/))
      return callToast("Invalid email format.", "error");
    if (!mobile_no.match(/^\d{10}$/))
      return callToast("Mobile number must be 10 digits.", "error");
    if (password.length > 0 && password.length < 6)
      return callToast("Password must be at least 6 characters.", "error");
    if (password !== confirm_password)
      return callToast("Passwords do not match.", "error");

    callToast("Form validated successfully. Submitting...");
    setTimeout(() => form.submit(), 500);
  };

  // Attach event listener to the form
  const profileForm = document.querySelector("#profileForm");
  if (profileForm) {
    profileForm.addEventListener("submit", (event) => {
      event.preventDefault();
      validateForm(event.target);
    });
  }

  // Expose callToast globally if needed
  window.callToast = callToast;
});
