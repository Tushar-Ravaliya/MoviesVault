<!-- sidebar.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../src/output.css">

</head>

<body>
    <div class="relative">
        <nav class="fixed hidden h-screen bg-neutral-900 w-64 border-r border-neutral-700 lg:block" id="ham-menu">
            <div class="p-4 border-b border-neutral-700">
                <h1 class="text-2xl font-bold text-white">MovieTix Admin</h1>
            </div>

            <div class="flex-1 py-4">
                <a href="dashboard.php" class="flex items-center px-4 py-3 text-neutral-300 hover:bg-indigo-800 hover:text-white transition-all duration-300 active-nav-link">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    Dashboard
                    <p class="test-class">hello</p>
                </a>
                <a href="#theaters" class="flex items-center px-4 py-3 text-neutral-300 hover:bg-indigo-800 hover:text-white transition-all duration-300">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                    Theaters
                </a>
                <a href="#movies" class="flex items-center px-4 py-3 text-neutral-300 hover:bg-indigo-800 hover:text-white transition-all duration-300">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z" />
                    </svg>
                    Movies
                </a>
                <a href="booking.php" class="flex items-center px-4 py-3 text-neutral-300 hover:bg-indigo-800 hover:text-white transition-all duration-300">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    Bookings
                </a>
                <a href="#customers" class="flex items-center px-4 py-3 text-neutral-300 hover:bg-indigo-800 hover:text-white transition-all duration-300">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    Customers
                </a>
                <a href="#reports" class="flex items-center px-4 py-3 text-neutral-300 hover:bg-indigo-800 hover:text-white transition-all duration-300">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                    Reports
                </a>
            </div>

            <div class="border-t border-neutral-700 p-4">
                <div class="flex items-center">
                    <img src="https://avatar.iran.liara.run/public" alt="Admin" class="w-8 h-8 rounded-full">
                    <div class="ml-3">
                        <p class="text-sm font-medium text-white">Admin User</p>
                        <p class="text-xs text-neutral-400">admin@movietix.com</p>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Mobile menu button -->
        <button
            type="button"
            class="lg:hidden fixed top-4 left-4 z-50 rounded-md p-2 bg-neutral-800 text-neutral-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
            aria-controls="mobile-menu"
            id="hamburger-open">
            <svg
                x-show="!isOpen"
                class="h-6 w-6"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                x-cloak>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
        <button
            type="button"
            class="lg:hidden hidden fixed top-4 left-4 z-50 rounded-md p-2 bg-neutral-800 text-neutral-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
            aria-controls="mobile-menu"
            id="hamburger-close">
            <svg
                x-show="isOpen"
                class="h-6 w-6"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                x-cloak>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $("#hamburger-open").click(function() {
                // $("#ham-menu").show();
                $("#ham-menu").animate({
                    opacity: '0.5',
                    height: '150px',
                    width: '150px'
                });
                $("#hamburger-open").hide();
                $("#hamburger-close").show();

            });
            $("#hamburger-close").click(function() {
                $("#ham-menu").hide();
                $("#hamburger-close").hide();
                $("#hamburger-open").show();
            });
        });
    </script>
</body>

</html>