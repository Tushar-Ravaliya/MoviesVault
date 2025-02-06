          <?php
            include("Nevigation.php")
            ?>
          <section id="contact" class="py-20 bg-neutral-900">
              <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                  <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                      <!-- Contact Information -->
                      <div class="space-y-8 animate__animated animate__fadeIn">
                          <h2 class="text-3xl font-bold text-white mb-8">Get in Touch</h2>

                          <div class="space-y-6">
                              <div class="flex items-start">
                                  <div class="flex-shrink-0">
                                      <div class="w-12 h-12 bg-[#FF4B2B] rounded-full flex items-center justify-center">
                                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                          </svg>
                                      </div>
                                  </div>
                                  <div class="ml-4">
                                      <h3 class="text-xl font-semibold text-white">Email Us</h3>
                                      <p class="text-gray-400 mt-2">support@movietix.com</p>
                                  </div>
                              </div>

                              <div class="flex items-start">
                                  <div class="flex-shrink-0">
                                      <div class="w-12 h-12 bg-[#FF4B2B] rounded-full flex items-center justify-center">
                                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                          </svg>
                                      </div>
                                  </div>
                                  <div class="ml-4">
                                      <h3 class="text-xl font-semibold text-white">Call Us</h3>
                                      <p class="text-gray-400 mt-2">1-800-MOVIETIX</p>
                                  </div>
                              </div>

                              <div class="flex items-start">
                                  <div class="flex-shrink-0">
                                      <div class="w-12 h-12 bg-[#FF4B2B] rounded-full flex items-center justify-center">
                                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                          </svg>
                                      </div>
                                  </div>
                                  <div class="ml-4">
                                      <h3 class="text-xl font-semibold text-white">Location</h3>
                                      <p class="text-gray-400 mt-2">123 Movie Street, Cinema City, MC 12345</p>
                                  </div>
                              </div>
                          </div>
                      </div>

                      <!-- Contact Form -->
                      <div class="bg-neutral-800 p-8 rounded-lg shadow-lg animate__animated animate__fadeIn animate__delay-1s">
                          <form id="contactForm" class="space-y-6">
                              <div>
                                  <label for="name" class="block text-sm font-medium text-gray-300">Name</label>
                                  <input type="text" id="name" name="name" class="mt-1 block w-full px-4 py-3 bg-neutral-700 border border-neutral-600 rounded-md text-white focus:ring-[#FF4B2B] focus:border-[#FF4B2B]">
                                  <span></span>
                              </div>

                              <div>
                                  <label for="email" class="block text-sm font-medium text-gray-300">Email</label>
                                  <input type="email" id="email" name="email" class="mt-1 block w-full px-4 py-3 bg-neutral-700 border border-neutral-600 rounded-md text-white focus:ring-[#FF4B2B] focus:border-[#FF4B2B]">
                                  <span></span>
                              </div>

                              <div>
                                  <label for="subject" class="block text-sm font-medium text-gray-300">Subject</label>
                                  <select id="subject" name="subject" class="mt-1 block w-full px-4 py-3 bg-neutral-700 border border-neutral-600 rounded-md text-white focus:ring-[#FF4B2B] focus:border-[#FF4B2B]">
                                      <option value="">Select a subject</option>
                                      <option value="booking">Booking Issue</option>
                                      <option value="payment">Payment Issue</option>
                                      <option value="technical">Technical Support</option>
                                      <option value="other">Other</option>
                                  </select>
                                  <span></span>
                              </div>

                              <div>
                                  <label for="message" class="block text-sm font-medium text-gray-300">Message</label>
                                  <textarea id="message" name="message" rows="4" class="mt-1 block w-full px-4 py-3 bg-neutral-700 border border-neutral-600 rounded-md text-white focus:ring-[#FF4B2B] focus:border-[#FF4B2B]"></textarea>
                                  <span></span>
                              </div>

                              <button type="submit" class="w-full bg-[#FF4B2B] text-white py-3 px-6 rounded-md hover:bg-[#ff3b16] transition-colors">
                                  Send Message
                              </button>
                          </form>
                      </div>
                  </div>
              </div>

              <script>
                  document.getElementById("contactForm").addEventListener("submit", function(event) {
                      let isValid = true;

                      function showError(input, message) {
                          const span = input.nextElementSibling;
                          span.textContent = message;
                          span.style.color = "#FF4B2B";
                      }

                      function clearError(input) {
                          const span = input.nextElementSibling;
                          span.textContent = "";
                      }

                      // Name Validation
                      const name = document.getElementById("name");
                      if (name.value.trim() === "") {
                          showError(name, "Name is required");
                          isValid = false;
                      } else {
                          clearError(name);
                      }

                      // Email Validation
                      const email = document.getElementById("email");
                      const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                      if (!emailPattern.test(email.value)) {
                          showError(email, "Please enter a valid email address");
                          isValid = false;
                      } else {
                          clearError(email);
                      }

                      // Subject Validation
                      const subject = document.getElementById("subject");
                      if (subject.value === "") {
                          showError(subject, "Please select a subject");
                          isValid = false;
                      } else {
                          clearError(subject);
                      }

                      // Message Validation
                      const message = document.getElementById("message");
                      if (message.value.trim() === "") {
                          showError(message, "Message cannot be empty");
                          isValid = false;
                      } else {
                          clearError(message);
                      }

                      if (!isValid) {
                          event.preventDefault();
                      }
                  });
              </script>
          </section>