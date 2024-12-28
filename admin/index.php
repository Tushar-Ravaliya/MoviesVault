<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="AI-generated website">
    <meta name="theme-color" content="#ffffff">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="index, follow">

    <!-- Performance optimization: Preload critical resources -->
    <link rel="preload" href="https://cdn.tailwindcss.com" as="script">
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap" as="style">


    <!-- Enhanced Image Handler -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        if (img.dataset.src) {
                            const tempImage = new Image();
                            tempImage.onload = () => {
                                img.src = img.dataset.src;
                                img.classList.remove('opacity-0');
                                img.classList.add('opacity-100');
                            };
                            tempImage.src = img.dataset.src;
                            img.removeAttribute('data-src');
                            observer.unobserve(img);
                        }
                    }
                });
            }, {
                rootMargin: '50px 0px',
                threshold: 0.01
            });

            const loadImage = (img) => {
                if ('loading' in HTMLImageElement.prototype) {
                    img.loading = 'lazy';
                }

                img.classList.add('transition-opacity', 'duration-300', 'opacity-0');

                img.onerror = () => {
                    const width = img.getAttribute('width') || img.clientWidth || 300;
                    const height = img.getAttribute('height') || img.clientHeight || 200;
                    img.src = `https://placehold.co/${width}x${height}/DEDEDE/555555?text=Image+Unavailable`;
                    img.alt = 'Image unavailable';
                    img.classList.remove('opacity-0');
                    img.classList.add('opacity-100', 'error-image');
                };

                if (img.dataset.src) {
                    imageObserver.observe(img);
                } else {
                    img.classList.remove('opacity-0');
                    img.classList.add('opacity-100');
                }
            };

            document.querySelectorAll('img[data-src], img:not([data-src])').forEach(loadImage);

            // Watch for dynamically added images
            new MutationObserver((mutations) => {
                mutations.forEach(mutation => {
                    mutation.addedNodes.forEach(node => {
                        if (node.nodeType === 1) {
                            if (node.tagName === 'IMG') {
                                loadImage(node);
                            }
                            node.querySelectorAll('img').forEach(loadImage);
                        }
                    });
                });
            }).observe(document.body, {
                childList: true,
                subtree: true
            });
        });

        // Performance monitoring
        if ('performance' in window && 'PerformanceObserver' in window) {
            // Create performance observer
            const observer = new PerformanceObserver((list) => {
                const entries = list.getEntries();
                entries.forEach((entry) => {
                    if (entry.entryType === 'largest-contentful-paint') {
                        // console.log(`LCP: ${entry.startTime}ms`);
                    }
                    if (entry.entryType === 'first-input') {
                        // console.log(`FID: ${entry.processingStart - entry.startTime}ms`);
                    }
                    if (entry.entryType === 'layout-shift') {
                        // console.log(`CLS: ${entry.value}`);
                    }
                });
            });

            // Observe performance metrics
            observer.observe({
                entryTypes: ['largest-contentful-paint', 'first-input', 'layout-shift']
            });

            // Log basic performance metrics
            window.addEventListener('load', () => {
                const timing = performance.getEntriesByType('navigation')[0];
                console.log({
                    'DNS Lookup': timing.domainLookupEnd - timing.domainLookupStart,
                    'TCP Connection': timing.connectEnd - timing.connectStart,
                    'DOM Content Loaded': timing.domContentLoadedEventEnd - timing.navigationStart,
                    'Page Load': timing.loadEventEnd - timing.navigationStart
                });
            });
        }

        // Handle offline/online status
        window.addEventListener('online', () => {
            document.body.classList.remove('offline');
            console.log('Connection restored');
        });

        window.addEventListener('offline', () => {
            document.body.classList.add('offline');
            console.log('Connection lost');
        });
    </script>
</head>

<body class="antialiased text-gray-800 min-h-screen flex flex-col">
    <!-- Skip to main content link for accessibility -->
    <a href="#main-content"
        class="sr-only focus:not-sr-only focus:absolute focus:top-0 focus:left-0 focus:z-50 focus:p-4 focus:bg-white focus:text-black">
        Skip to main content
    </a>

    <!-- Header -->
    <header class="relative z-50 bg-white dark:bg-gray-900">
        <!-- Header content goes here -->
    </header>

    <!-- Main content area -->
    <main id="main-content" class="flex-1 relative ">
        <!-- Content will be injected here -->
    </main>

</body>

</html>
<htmlCode>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Dashboard - Movie Ticket Booking</title>

    </head>

    <body class="bg-neutral-100">
        <div id="root" class="flex">
            <div x-data="{ isOpen: false }" class="relative">
                <nav class="fixed h-screen bg-neutral-900 w-64 flex flex-col border-r border-neutral-700 lg:block" :class="{'hidden': !isOpen}">
                    <div class="p-4 border-b border-neutral-700">
                        <h1 class="text-2xl font-bold text-white">MovieTix Admin</h1>
                    </div>

                    <div class="flex-1 py-4">
                        <a href="#dashboard" class="flex items-center px-4 py-3 text-neutral-300 hover:bg-indigo-800 hover:text-white transition-all duration-300 active-nav-link">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            Dashboard
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
                        <a href="#bookings" class="flex items-center px-4 py-3 text-neutral-300 hover:bg-indigo-800 hover:text-white transition-all duration-300">
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
                    @click="isOpen = !isOpen"
                    aria-controls="mobile-menu"
                    :aria-expanded="isOpen">
                    <svg
                        x-show="!isOpen"
                        class="h-6 w-6"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        x-cloak>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
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

            <main class="flex-1 ml-64 lg:ml-64 overflow-y-auto bg-neutral-100">
                <header class="fixed top-0 right-0 left-64 bg-white border-b border-neutral-200 z-10">
                    <div class="px-6 py-4 flex items-center justify-between">
                        <div class="flex items-center">
                            <h2 class="text-xl font-semibold text-neutral-800">Dashboard</h2>
                        </div>
                        <div class="flex items-center space-x-4">
                            <button class="p-2 text-neutral-600 hover:text-neutral-900">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </button>
                            <button class="p-2 text-neutral-600 hover:text-neutral-900">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                </svg>
                            </button>
                            <button class="flex items-center">
                                <img src="https://avatar.iran.liara.run/public" alt="Profile" class="w-8 h-8 rounded-full">
                            </button>
                        </div>
                    </div>
                </header>

                <div class="mt-16">
                    <MountPoint>

                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                // Active link handling
                                const navLinks = document.querySelectorAll('nav a');

                                function setActiveLink() {
                                    const hash = window.location.hash || '#dashboard';
                                    navLinks.forEach(link => {
                                        if (link.getAttribute('href') === hash) {
                                            link.classList.add('active-nav-link');
                                        } else {
                                            link.classList.remove('active-nav-link');
                                        }
                                    });
                                }

                                window.addEventListener('hashchange', setActiveLink);
                                setActiveLink();

                                // Mobile menu handling
                                const mobileMenuButton = document.querySelector('[aria-controls="mobile-menu"]');
                                const nav = document.querySelector('nav');

                                if (mobileMenuButton) {
                                    mobileMenuButton.addEventListener('click', () => {
                                        const expanded = mobileMenuButton.getAttribute('aria-expanded') === 'true';
                                        mobileMenuButton.setAttribute('aria-expanded', !expanded);
                                        nav.classList.toggle('hidden');
                                    });
                                }

                                // Close mobile menu on window resize
                                window.addEventListener('resize', () => {
                                    if (window.innerWidth > 1024) {
                                        nav.classList.remove('hidden');
                                        if (mobileMenuButton) {
                                            mobileMenuButton.setAttribute('aria-expanded', 'false');
                                        }
                                    }
                                });
                            });
                        </script>
</htmlCode>
<htmlCode>
    <div id="auth" class="min-h-screen bg-neutral-900 flex items-center justify-center p-4">
        <div class="w-full max-w-md bg-neutral-800 rounded-lg border border-neutral-700 p-8">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-white mb-2">MovieTix Admin</h1>
                <p class="text-neutral-400">Sign in to your account</p>
            </div>

            <form class="space-y-6">
                <div>
                    <label for="email" class="block text-sm font-medium text-neutral-300 mb-2">Email address</label>
                    <input
                        type="email"
                        id="email"
                        class="w-full px-4 py-3 bg-neutral-700 border border-neutral-600 rounded-md text-white placeholder-neutral-400 focus:outline-none focus:border-indigo-500 transition duration-200"
                        placeholder="admin@example.com"
                        required>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-neutral-300 mb-2">Password</label>
                    <input
                        type="password"
                        id="password"
                        class="w-full px-4 py-3 bg-neutral-700 border border-neutral-600 rounded-md text-white placeholder-neutral-400 focus:outline-none focus:border-indigo-500 transition duration-200"
                        placeholder="••••••••"
                        required>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input
                            type="checkbox"
                            id="remember"
                            class="h-4 w-4 bg-neutral-700 border-neutral-600 rounded text-indigo-600 focus:ring-indigo-500 focus:ring-offset-neutral-800">
                        <label for="remember" class="ml-2 text-sm text-neutral-300">Remember me</label>
                    </div>
                    <a href="#" class="text-sm text-indigo-400 hover:text-indigo-300">Forgot password?</a>
                </div>

                <button
                    type="submit"
                    class="w-full py-3 px-4 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-200">
                    Sign in
                </button>
            </form>

            <div class="mt-6 text-center">
                <span class="text-neutral-400 text-sm">Having trouble signing in? </span>
                <a href="#" class="text-indigo-400 hover:text-indigo-300 text-sm">Contact support</a>
            </div>

            <div class="mt-8 pt-6 border-t border-neutral-700">
                <div class="flex justify-center space-x-4">
                    <p class="text-sm text-neutral-400">Protected by industry standard security</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelector('form').addEventListener('submit', function(e) {
            e.preventDefault();
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            // Add your authentication logic here

            // For demo purposes, redirect to dashboard
            if (email && password) {
                window.location.href = '#dashboard';
            }
        });
    </script>
</htmlCode>
<htmlCode>
    <div id="dashboard_overview" class="p-6 space-y-6">
        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white border border-neutral-200 rounded-lg p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-neutral-600">Total Bookings</p>
                        <h3 class="text-2xl font-bold text-neutral-900">1,247</h3>
                    </div>
                    <div class="bg-green-100 p-3 rounded-full">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4 flex items-center text-sm">
                    <span class="text-green-600">↑ 12%</span>
                    <span class="text-neutral-600 ml-2">from last month</span>
                </div>
            </div>

            <div class="bg-white border border-neutral-200 rounded-lg p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-neutral-600">Revenue</p>
                        <h3 class="text-2xl font-bold text-neutral-900">$24,389</h3>
                    </div>
                    <div class="bg-blue-100 p-3 rounded-full">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4 flex items-center text-sm">
                    <span class="text-green-600">↑ 8.7%</span>
                    <span class="text-neutral-600 ml-2">from last month</span>
                </div>
            </div>

            <div class="bg-white border border-neutral-200 rounded-lg p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-neutral-600">Active Movies</p>
                        <h3 class="text-2xl font-bold text-neutral-900">18</h3>
                    </div>
                    <div class="bg-purple-100 p-3 rounded-full">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4 flex items-center text-sm">
                    <span class="text-purple-600">+3</span>
                    <span class="text-neutral-600 ml-2">new releases</span>
                </div>
            </div>

            <div class="bg-white border border-neutral-200 rounded-lg p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-neutral-600">Theater Occupancy</p>
                        <h3 class="text-2xl font-bold text-neutral-900">72%</h3>
                    </div>
                    <div class="bg-yellow-100 p-3 rounded-full">
                        <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4 flex items-center text-sm">
                    <span class="text-green-600">↑ 5%</span>
                    <span class="text-neutral-600 ml-2">from last week</span>
                </div>
            </div>
        </div>

        <!-- Recent Bookings Table -->
        <div class="bg-white border border-neutral-200 rounded-lg">
            <div class="p-6 border-b border-neutral-200">
                <h2 class="text-lg font-semibold text-neutral-900">Recent Bookings</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-neutral-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-neutral-500 uppercase tracking-wider">Booking ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-neutral-500 uppercase tracking-wider">Customer</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-neutral-500 uppercase tracking-wider">Movie</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-neutral-500 uppercase tracking-wider">Date</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-neutral-500 uppercase tracking-wider">Amount</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-neutral-500 uppercase tracking-wider">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-neutral-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-neutral-900">#BK1234</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <img class="h-8 w-8 rounded-full" src="https://avatar.iran.liara.run/public" alt="">
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-neutral-900">John Doe</div>
                                        <div class="text-sm text-neutral-500">john@example.com</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-neutral-900">Inception</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-neutral-500">2024-02-20</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-neutral-900">$45.00</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Confirmed</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-neutral-900">#BK1235</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <img class="h-8 w-8 rounded-full" src="https://avatar.iran.liara.run/public" alt="">
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-neutral-900">Jane Smith</div>
                                        <div class="text-sm text-neutral-500">jane@example.com</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-neutral-900">The Matrix</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-neutral-500">2024-02-20</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-neutral-900">$35.00</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Popular Movies Chart -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <div class="bg-white border border-neutral-200 rounded-lg p-6">
                <h2 class="text-lg font-semibold text-neutral-900 mb-4">Popular Movies</h2>
                <div class="h-[300px] flex items-center justify-center">
                    <div class="text-center text-neutral-500">
                        [Chart Placeholder]
                    </div>
                </div>
            </div>

            <!-- Revenue Trends -->
            <div class="bg-white border border-neutral-200 rounded-lg p-6">
                <h2 class="text-lg font-semibold text-neutral-900 mb-4">Revenue Trends</h2>
                <div class="h-[300px] flex items-center justify-center">
                    <div class="text-center text-neutral-500">
                        [Chart Placeholder]
                    </div>
                </div>
            </div>
        </div>
    </div>
</htmlCode>
<htmlCode>
    <div id="theater_management" class="p-6 space-y-6">
        <!-- Header with Actions -->
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold text-neutral-900">Theater Management</h2>
            <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md flex items-center space-x-2 transition duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                <span>Add New Theater</span>
            </button>
        </div>

        <!-- Filters and Search -->
        <div class="bg-white border border-neutral-200 rounded-lg p-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium text-neutral-700 mb-1">Search Theaters</label>
                    <input type="text" class="w-full px-3 py-2 border border-neutral-300 rounded-md focus:outline-none focus:ring-1 focus:ring-indigo-500" placeholder="Search by name or location...">
                </div>
                <div>
                    <label class="block text-sm font-medium text-neutral-700 mb-1">Status</label>
                    <select class="w-full px-3 py-2 border border-neutral-300 rounded-md focus:outline-none focus:ring-1 focus:ring-indigo-500">
                        <option>All Status</option>
                        <option>Active</option>
                        <option>Under Maintenance</option>
                        <option>Inactive</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-neutral-700 mb-1">Sort By</label>
                    <select class="w-full px-3 py-2 border border-neutral-300 rounded-md focus:outline-none focus:ring-1 focus:ring-indigo-500">
                        <option>Capacity: High to Low</option>
                        <option>Capacity: Low to High</option>
                        <option>Name: A-Z</option>
                        <option>Name: Z-A</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Theaters Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Theater Card 1 -->
            <div class="bg-white border border-neutral-200 rounded-lg overflow-hidden">
                <div class="p-6">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-lg font-semibold text-neutral-900">Grand Cinema</h3>
                            <p class="text-sm text-neutral-600 mt-1">Downtown, New York</p>
                        </div>
                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Active</span>
                    </div>
                    <div class="mt-4 space-y-2">
                        <div class="flex justify-between text-sm">
                            <span class="text-neutral-600">Total Screens</span>
                            <span class="font-medium text-neutral-900">5</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-neutral-600">Total Capacity</span>
                            <span class="font-medium text-neutral-900">750 seats</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-neutral-600">Average Rating</span>
                            <span class="font-medium text-neutral-900">4.5/5</span>
                        </div>
                    </div>
                </div>
                <div class="border-t border-neutral-200 px-6 py-3 bg-neutral-50 flex justify-end space-x-3">
                    <button class="text-indigo-600 hover:text-indigo-700 text-sm font-medium">Edit</button>
                    <button class="text-red-600 hover:text-red-700 text-sm font-medium">Delete</button>
                </div>
            </div>

            <!-- Theater Card 2 -->
            <div class="bg-white border border-neutral-200 rounded-lg overflow-hidden">
                <div class="p-6">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-lg font-semibold text-neutral-900">Starlight Multiplex</h3>
                            <p class="text-sm text-neutral-600 mt-1">West End, Chicago</p>
                        </div>
                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">Under Maintenance</span>
                    </div>
                    <div class="mt-4 space-y-2">
                        <div class="flex justify-between text-sm">
                            <span class="text-neutral-600">Total Screens</span>
                            <span class="font-medium text-neutral-900">8</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-neutral-600">Total Capacity</span>
                            <span class="font-medium text-neutral-900">1200 seats</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-neutral-600">Average Rating</span>
                            <span class="font-medium text-neutral-900">4.2/5</span>
                        </div>
                    </div>
                </div>
                <div class="border-t border-neutral-200 px-6 py-3 bg-neutral-50 flex justify-end space-x-3">
                    <button class="text-indigo-600 hover:text-indigo-700 text-sm font-medium">Edit</button>
                    <button class="text-red-600 hover:text-red-700 text-sm font-medium">Delete</button>
                </div>
            </div>

            <!-- Theater Card 3 -->
            <div class="bg-white border border-neutral-200 rounded-lg overflow-hidden">
                <div class="p-6">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-lg font-semibold text-neutral-900">Plaza Cinema</h3>
                            <p class="text-sm text-neutral-600 mt-1">South Bay, Los Angeles</p>
                        </div>
                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">Inactive</span>
                    </div>
                    <div class="mt-4 space-y-2">
                        <div class="flex justify-between text-sm">
                            <span class="text-neutral-600">Total Screens</span>
                            <span class="font-medium text-neutral-900">3</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-neutral-600">Total Capacity</span>
                            <span class="font-medium text-neutral-900">450 seats</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-neutral-600">Average Rating</span>
                            <span class="font-medium text-neutral-900">3.8/5</span>
                        </div>
                    </div>
                </div>
                <div class="border-t border-neutral-200 px-6 py-3 bg-neutral-50 flex justify-end space-x-3">
                    <button class="text-indigo-600 hover:text-indigo-700 text-sm font-medium">Edit</button>
                    <button class="text-red-600 hover:text-red-700 text-sm font-medium">Delete</button>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="flex items-center justify-between border-t border-neutral-200 bg-white px-4 py-3 sm:px-6 rounded-lg">
            <div class="flex flex-1 justify-between sm:hidden">
                <button class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-neutral-700 bg-white border border-neutral-300 rounded-md hover:bg-neutral-50">Previous</button>
                <button class="relative ml-3 inline-flex items-center px-4 py-2 text-sm font-medium text-neutral-700 bg-white border border-neutral-300 rounded-md hover:bg-neutral-50">Next</button>
            </div>
            <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm text-neutral-700">
                        Showing <span class="font-medium">1</span> to <span class="font-medium">3</span> of <span class="font-medium">12</span> theaters
                    </p>
                </div>
                <div>
                    <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                        <button class="relative inline-flex items-center rounded-l-md px-2 py-2 text-neutral-400 ring-1 ring-inset ring-neutral-300 hover:bg-neutral-50">
                            <span class="sr-only">Previous</span>
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>
                        <button class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-white bg-indigo-600 ring-1 ring-inset ring-neutral-300">1</button>
                        <button class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-neutral-900 ring-1 ring-inset ring-neutral-300 hover:bg-neutral-50">2</button>
                        <button class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-neutral-900 ring-1 ring-inset ring-neutral-300 hover:bg-neutral-50">3</button>
                        <button class="relative inline-flex items-center rounded-r-md px-2 py-2 text-neutral-400 ring-1 ring-inset ring-neutral-300 hover:bg-neutral-50">
                            <span class="sr-only">Next</span>
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</htmlCode>
<htmlCode>
    <div id="movie_scheduling" class="p-6 space-y-6">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold text-neutral-900">Movie Scheduling</h2>
            <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md flex items-center space-x-2 transition duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                <span>Add New Schedule</span>
            </button>
        </div>

        <!-- Schedule Calendar -->
        <div class="bg-white border border-neutral-200 rounded-lg p-4">
            <div class="flex items-center justify-between mb-4">
                <div class="flex space-x-4">
                    <select class="px-3 py-2 border border-neutral-300 rounded-md focus:outline-none focus:ring-1 focus:ring-indigo-500">
                        <option>All Theaters</option>
                        <option>Grand Cinema</option>
                        <option>Starlight Multiplex</option>
                        <option>Plaza Cinema</option>
                    </select>
                    <select class="px-3 py-2 border border-neutral-300 rounded-md focus:outline-none focus:ring-1 focus:ring-indigo-500">
                        <option>February 2024</option>
                        <option>March 2024</option>
                        <option>April 2024</option>
                    </select>
                </div>
                <div class="flex space-x-2">
                    <button class="px-3 py-2 border border-neutral-300 rounded-md hover:bg-neutral-50">Day</button>
                    <button class="px-3 py-2 bg-indigo-600 text-white rounded-md">Week</button>
                    <button class="px-3 py-2 border border-neutral-300 rounded-md hover:bg-neutral-50">Month</button>
                </div>
            </div>

            <!-- Weekly Schedule Grid -->
            <div class="border border-neutral-200 rounded-lg overflow-hidden">
                <!-- Time Column -->
                <div class="grid grid-cols-8 bg-neutral-50 border-b border-neutral-200">
                    <div class="py-2 px-4 text-sm font-medium text-neutral-700 border-r border-neutral-200">Time</div>
                    <div class="py-2 px-4 text-sm font-medium text-neutral-700">Mon 20</div>
                    <div class="py-2 px-4 text-sm font-medium text-neutral-700">Tue 21</div>
                    <div class="py-2 px-4 text-sm font-medium text-neutral-700">Wed 22</div>
                    <div class="py-2 px-4 text-sm font-medium text-neutral-700">Thu 23</div>
                    <div class="py-2 px-4 text-sm font-medium text-neutral-700">Fri 24</div>
                    <div class="py-2 px-4 text-sm font-medium text-neutral-700">Sat 25</div>
                    <div class="py-2 px-4 text-sm font-medium text-neutral-700">Sun 26</div>
                </div>

                <!-- Schedule Rows -->
                <div class="divide-y divide-neutral-200">
                    <!-- 10:00 AM Row -->
                    <div class="grid grid-cols-8 min-h-[100px]">
                        <div class="py-2 px-4 text-sm text-neutral-600 border-r border-neutral-200 bg-neutral-50">10:00 AM</div>
                        <div class="p-2 bg-indigo-50 border border-indigo-200 m-1 rounded">
                            <div class="text-xs font-medium text-indigo-700">Inception</div>
                            <div class="text-xs text-indigo-600">Screen 1</div>
                        </div>
                        <div class="p-2"></div>
                        <div class="p-2 bg-green-50 border border-green-200 m-1 rounded">
                            <div class="text-xs font-medium text-green-700">The Matrix</div>
                            <div class="text-xs text-green-600">Screen 2</div>
                        </div>
                        <div class="p-2"></div>
                        <div class="p-2 bg-purple-50 border border-purple-200 m-1 rounded">
                            <div class="text-xs font-medium text-purple-700">Interstellar</div>
                            <div class="text-xs text-purple-600">Screen 3</div>
                        </div>
                        <div class="p-2"></div>
                        <div class="p-2"></div>
                    </div>

                    <!-- 1:00 PM Row -->
                    <div class="grid grid-cols-8 min-h-[100px]">
                        <div class="py-2 px-4 text-sm text-neutral-600 border-r border-neutral-200 bg-neutral-50">1:00 PM</div>
                        <div class="p-2"></div>
                        <div class="p-2 bg-yellow-50 border border-yellow-200 m-1 rounded">
                            <div class="text-xs font-medium text-yellow-700">Dune</div>
                            <div class="text-xs text-yellow-600">Screen 1</div>
                        </div>
                        <div class="p-2"></div>
                        <div class="p-2 bg-red-50 border border-red-200 m-1 rounded">
                            <div class="text-xs font-medium text-red-700">Avatar</div>
                            <div class="text-xs text-red-600">Screen 2</div>
                        </div>
                        <div class="p-2"></div>
                        <div class="p-2 bg-blue-50 border border-blue-200 m-1 rounded">
                            <div class="text-xs font-medium text-blue-700">Tenet</div>
                            <div class="text-xs text-blue-600">Screen 3</div>
                        </div>
                        <div class="p-2"></div>
                    </div>

                    <!-- 4:00 PM Row -->
                    <div class="grid grid-cols-8 min-h-[100px]">
                        <div class="py-2 px-4 text-sm text-neutral-600 border-r border-neutral-200 bg-neutral-50">4:00 PM</div>
                        <div class="p-2 bg-pink-50 border border-pink-200 m-1 rounded">
                            <div class="text-xs font-medium text-pink-700">Blade Runner</div>
                            <div class="text-xs text-pink-600">Screen 1</div>
                        </div>
                        <div class="p-2"></div>
                        <div class="p-2"></div>
                        <div class="p-2 bg-orange-50 border border-orange-200 m-1 rounded">
                            <div class="text-xs font-medium text-orange-700">Star Wars</div>
                            <div class="text-xs text-orange-600">Screen 2</div>
                        </div>
                        <div class="p-2"></div>
                        <div class="p-2"></div>
                        <div class="p-2 bg-teal-50 border border-teal-200 m-1 rounded">
                            <div class="text-xs font-medium text-teal-700">Arrival</div>
                            <div class="text-xs text-teal-600">Screen 3</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white border border-neutral-200 rounded-lg p-6">
                <h3 class="text-lg font-semibold text-neutral-900 mb-4">Theater Status</h3>
                <div class="space-y-3">
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-neutral-600">Screen 1</span>
                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Available</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-neutral-600">Screen 2</span>
                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">In Use</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-neutral-600">Screen 3</span>
                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">Maintenance</span>
                    </div>
                </div>
            </div>

            <div class="bg-white border border-neutral-200 rounded-lg p-6">
                <h3 class="text-lg font-semibold text-neutral-900 mb-4">Today's Statistics</h3>
                <div class="space-y-3">
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-neutral-600">Total Shows</span>
                        <span class="font-medium text-neutral-900">24</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-neutral-600">Occupancy Rate</span>
                        <span class="font-medium text-neutral-900">78%</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-neutral-600">Revenue</span>
                        <span class="font-medium text-neutral-900">$4,280</span>
                    </div>
                </div>
            </div>

            <div class="bg-white border border-neutral-200 rounded-lg p-6">
                <h3 class="text-lg font-semibold text-neutral-900 mb-4">Quick Actions</h3>
                <div class="space-y-3">
                    <button class="w-full py-2 px-4 bg-indigo-50 text-indigo-600 rounded hover:bg-indigo-100 transition duration-200 text-sm font-medium">Add Special Screening</button>
                    <button class="w-full py-2 px-4 bg-red-50 text-red-600 rounded hover:bg-red-100 transition duration-200 text-sm font-medium">Cancel Screening</button>
                    <button class="w-full py-2 px-4 bg-green-50 text-green-600 rounded hover:bg-green-100 transition duration-200 text-sm font-medium">Update Prices</button>
                </div>
            </div>
        </div>
    </div>
</htmlCode>
<htmlCode>
    <div id="booking_management" class="p-6 space-y-6">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold text-neutral-900">Booking Management</h2>
            <div class="flex space-x-3">
                <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md flex items-center space-x-2 transition duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                    <span>Export Data</span>
                </button>
                <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md flex items-center space-x-2 transition duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    <span>New Booking</span>
                </button>
            </div>
        </div>

        <!-- Filters -->
        <div class="bg-white border border-neutral-200 rounded-lg p-4">
            <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                <div>
                    <label class="block text-sm font-medium text-neutral-700 mb-1">Search</label>
                    <input type="text" class="w-full px-3 py-2 border border-neutral-300 rounded-md focus:outline-none focus:ring-1 focus:ring-indigo-500" placeholder="Search bookings...">
                </div>
                <div>
                    <label class="block text-sm font-medium text-neutral-700 mb-1">Date Range</label>
                    <select class="w-full px-3 py-2 border border-neutral-300 rounded-md focus:outline-none focus:ring-1 focus:ring-indigo-500">
                        <option>Today</option>
                        <option>Last 7 days</option>
                        <option>Last 30 days</option>
                        <option>Custom</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-neutral-700 mb-1">Theater</label>
                    <select class="w-full px-3 py-2 border border-neutral-300 rounded-md focus:outline-none focus:ring-1 focus:ring-indigo-500">
                        <option>All Theaters</option>
                        <option>Grand Cinema</option>
                        <option>Starlight Multiplex</option>
                        <option>Plaza Cinema</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-neutral-700 mb-1">Status</label>
                    <select class="w-full px-3 py-2 border border-neutral-300 rounded-md focus:outline-none focus:ring-1 focus:ring-indigo-500">
                        <option>All Status</option>
                        <option>Confirmed</option>
                        <option>Pending</option>
                        <option>Cancelled</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-neutral-700 mb-1">Payment</label>
                    <select class="w-full px-3 py-2 border border-neutral-300 rounded-md focus:outline-none focus:ring-1 focus:ring-indigo-500">
                        <option>All Payments</option>
                        <option>Paid</option>
                        <option>Pending</option>
                        <option>Refunded</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Bookings Table -->
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

        <!-- Pagination -->
        <div class="bg-white border border-neutral-200 rounded-lg px-4 py-3 flex items-center justify-between">
            <div class="flex-1 flex justify-between sm:hidden">
                <button class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-neutral-700 bg-white border border-neutral-300 rounded-md hover:bg-neutral-50">Previous</button>
                <button class="ml-3 relative inline-flex items-center px-4 py-2 text-sm font-medium text-neutral-700 bg-white border border-neutral-300 rounded-md hover:bg-neutral-50">Next</button>
            </div>
            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm text-neutral-700">
                        Showing <span class="font-medium">1</span> to <span class="font-medium">2</span> of <span class="font-medium">50</span> bookings
                    </p>
                </div>
                <div>
                    <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                        <button class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-neutral-300 bg-white text-sm font-medium text-neutral-500 hover:bg-neutral-50">
                            <span class="sr-only">Previous</span>
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>
                        <button class="relative inline-flex items-center px-4 py-2 border border-neutral-300 bg-white text-sm font-medium text-neutral-700 hover:bg-neutral-50">1</button>
                        <button class="relative inline-flex items-center px-4 py-2 border border-neutral-300 bg-white text-sm font-medium text-neutral-700 hover:bg-neutral-50">2</button>
                        <button class="relative inline-flex items-center px-4 py-2 border border-neutral-300 bg-white text-sm font-medium text-neutral-700 hover:bg-neutral-50">3</button>
                        <button class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-neutral-300 bg-white text-sm font-medium text-neutral-500 hover:bg-neutral-50">
                            <span class="sr-only">Next</span>
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</htmlCode>
<htmlCode>
    <div id="customer_data" class="p-6 space-y-6">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold text-neutral-900">Customer Data</h2>
            <div class="flex space-x-3">
                <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md flex items-center space-x-2 transition duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                    <span>Export CSV</span>
                </button>
                <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md flex items-center space-x-2 transition duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    <span>Add Customer</span>
                </button>
            </div>
        </div>

        <!-- Analytics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="bg-white border border-neutral-200 rounded-lg p-6">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-sm text-neutral-600">Total Customers</p>
                        <h3 class="text-2xl font-bold text-neutral-900 mt-1">12,847</h3>
                    </div>
                    <div class="bg-blue-100 p-3 rounded-full">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4 flex items-center text-sm">
                    <span class="text-green-600">↑ 12%</span>
                    <span class="text-neutral-600 ml-2">from last month</span>
                </div>
            </div>

            <div class="bg-white border border-neutral-200 rounded-lg p-6">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-sm text-neutral-600">Active Members</p>
                        <h3 class="text-2xl font-bold text-neutral-900 mt-1">8,392</h3>
                    </div>
                    <div class="bg-green-100 p-3 rounded-full">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4 flex items-center text-sm">
                    <span class="text-green-600">↑ 8%</span>
                    <span class="text-neutral-600 ml-2">from last month</span>
                </div>
            </div>

            <div class="bg-white border border-neutral-200 rounded-lg p-6">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-sm text-neutral-600">Avg. Booking Value</p>
                        <h3 class="text-2xl font-bold text-neutral-900 mt-1">$42.50</h3>
                    </div>
                    <div class="bg-purple-100 p-3 rounded-full">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4 flex items-center text-sm">
                    <span class="text-green-600">↑ 5%</span>
                    <span class="text-neutral-600 ml-2">from last month</span>
                </div>
            </div>

            <div class="bg-white border border-neutral-200 rounded-lg p-6">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-sm text-neutral-600">Loyalty Points</p>
                        <h3 class="text-2xl font-bold text-neutral-900 mt-1">245,392</h3>
                    </div>
                    <div class="bg-yellow-100 p-3 rounded-full">
                        <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4 flex items-center text-sm">
                    <span class="text-green-600">↑ 18%</span>
                    <span class="text-neutral-600 ml-2">from last month</span>
                </div>
            </div>
        </div>

        <!-- Customer Table -->
        <div class="bg-white border border-neutral-200 rounded-lg overflow-hidden">
            <div class="p-4 border-b border-neutral-200">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                    <div class="flex-1">
                        <input type="text" placeholder="Search customers..." class="w-full px-4 py-2 border border-neutral-300 rounded-md focus:outline-none focus:ring-1 focus:ring-indigo-500">
                    </div>
                    <div class="flex space-x-2">
                        <select class="px-4 py-2 border border-neutral-300 rounded-md focus:outline-none focus:ring-1 focus:ring-indigo-500">
                            <option>Membership Status</option>
                            <option>Premium</option>
                            <option>Regular</option>
                        </select>
                        <select class="px-4 py-2 border border-neutral-300 rounded-md focus:outline-none focus:ring-1 focus:ring-indigo-500">
                            <option>Sort By</option>
                            <option>Name</option>
                            <option>Date Joined</option>
                            <option>Total Spent</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-neutral-200">
                    <thead class="bg-neutral-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-neutral-500 uppercase tracking-wider">Customer</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-neutral-500 uppercase tracking-wider">Membership</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-neutral-500 uppercase tracking-wider">Total Bookings</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-neutral-500 uppercase tracking-wider">Total Spent</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-neutral-500 uppercase tracking-wider">Last Booking</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-neutral-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-neutral-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-neutral-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <img class="h-10 w-10 rounded-full" src="https://avatar.iran.liara.run/public" alt="">
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-neutral-900">John Doe</div>
                                        <div class="text-sm text-neutral-500">john@example.com</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 text-purple-800">Premium</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-neutral-900">48</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-neutral-900">$1,248.00</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-neutral-500">Feb 15, 2024</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Active</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <button class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</button>
                                <button class="text-red-600 hover:text-red-900">Delete</button>
                            </td>
                        </tr>

                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <img class="h-10 w-10 rounded-full" src="https://avatar.iran.liara.run/public" alt="">
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-neutral-900">Jane Smith</div>
                                        <div class="text-sm text-neutral-500">jane@example.com</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">Regular</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-neutral-900">12</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-neutral-900">$435.00</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-neutral-500">Feb 18, 2024</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Active</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <button class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</button>
                                <button class="text-red-600 hover:text-red-900">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-neutral-200 sm:px-6">
                <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                    <div>
                        <p class="text-sm text-neutral-700">
                            Showing <span class="font-medium">1</span> to <span class="font-medium">10</span> of <span class="font-medium">97</span> results
                        </p>
                    </div>
                    <div>
                        <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                            <button class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-neutral-300 bg-white text-sm font-medium text-neutral-500 hover:bg-neutral-50">
                                <span class="sr-only">Previous</span>
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                </svg>
                            </button>
                            <button class="relative inline-flex items-center px-4 py-2 border border-neutral-300 bg-white text-sm font-medium text-neutral-700 hover:bg-neutral-50">1</button>
                            <button class="relative inline-flex items-center px-4 py-2 border border-neutral-300 bg-white text-sm font-medium text-neutral-700 hover:bg-neutral-50">2</button>
                            <button class="relative inline-flex items-center px-4 py-2 border border-neutral-300 bg-white text-sm font-medium text-neutral-700 hover:bg-neutral-50">3</button>
                            <button class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-neutral-300 bg-white text-sm font-medium text-neutral-500 hover:bg-neutral-50">
                                <span class="sr-only">Next</span>
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </button>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</htmlCode>
<htmlCode>
    <div id="reports_analytics" class="p-6 space-y-6">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold text-neutral-900">Reports & Analytics</h2>
            <div class="flex space-x-3">
                <select class="px-4 py-2 border border-neutral-300 rounded-md focus:outline-none focus:ring-1 focus:ring-indigo-500">
                    <option>Last 7 Days</option>
                    <option>Last 30 Days</option>
                    <option>Last 3 Months</option>
                    <option>Last Year</option>
                    <option>Custom Range</option>
                </select>
                <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md flex items-center space-x-2 transition duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                    <span>Export Report</span>
                </button>
            </div>
        </div>

        <!-- Key Metrics -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="bg-white border border-neutral-200 rounded-lg p-6">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-sm text-neutral-600">Total Revenue</p>
                        <h3 class="text-2xl font-bold text-neutral-900 mt-1">$124,592</h3>
                    </div>
                    <div class="bg-green-100 p-3 rounded-full">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4 flex items-center text-sm">
                    <span class="text-green-600">↑ 12%</span>
                    <span class="text-neutral-600 ml-2">vs last period</span>
                </div>
            </div>

            <div class="bg-white border border-neutral-200 rounded-lg p-6">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-sm text-neutral-600">Total Bookings</p>
                        <h3 class="text-2xl font-bold text-neutral-900 mt-1">3,847</h3>
                    </div>
                    <div class="bg-blue-100 p-3 rounded-full">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4 flex items-center text-sm">
                    <span class="text-green-600">↑ 8%</span>
                    <span class="text-neutral-600 ml-2">vs last period</span>
                </div>
            </div>

            <div class="bg-white border border-neutral-200 rounded-lg p-6">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-sm text-neutral-600">Average Occupancy</p>
                        <h3 class="text-2xl font-bold text-neutral-900 mt-1">76%</h3>
                    </div>
                    <div class="bg-purple-100 p-3 rounded-full">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4 flex items-center text-sm">
                    <span class="text-red-600">↓ 2%</span>
                    <span class="text-neutral-600 ml-2">vs last period</span>
                </div>
            </div>

            <div class="bg-white border border-neutral-200 rounded-lg p-6">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-sm text-neutral-600">Customer Satisfaction</p>
                        <h3 class="text-2xl font-bold text-neutral-900 mt-1">4.8/5.0</h3>
                    </div>
                    <div class="bg-yellow-100 p-3 rounded-full">
                        <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4 flex items-center text-sm">
                    <span class="text-green-600">↑ 0.2</span>
                    <span class="text-neutral-600 ml-2">vs last period</span>
                </div>
            </div>
        </div>

        <!-- Revenue Chart -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <div class="bg-white border border-neutral-200 rounded-lg p-6">
                <h3 class="text-lg font-semibold text-neutral-900 mb-4">Revenue Trends</h3>
                <div class="h-80 flex items-center justify-center border border-dashed border-neutral-300 rounded-lg">
                    <p class="text-neutral-500">[Revenue Chart Placeholder]</p>
                </div>
            </div>

            <div class="bg-white border border-neutral-200 rounded-lg p-6">
                <h3 class="text-lg font-semibold text-neutral-900 mb-4">Booking Distribution</h3>
                <div class="h-80 flex items-center justify-center border border-dashed border-neutral-300 rounded-lg">
                    <p class="text-neutral-500">[Distribution Chart Placeholder]</p>
                </div>
            </div>
        </div>

        <!-- Popular Movies Table -->
        <div class="bg-white border border-neutral-200 rounded-lg overflow-hidden">
            <div class="px-6 py-4 border-b border-neutral-200">
                <h3 class="text-lg font-semibold text-neutral-900">Top Performing Movies</h3>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-neutral-200">
                    <thead class="bg-neutral-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-neutral-500 uppercase tracking-wider">Movie Title</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-neutral-500 uppercase tracking-wider">Total Revenue</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-neutral-500 uppercase tracking-wider">Tickets Sold</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-neutral-500 uppercase tracking-wider">Avg. Rating</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-neutral-500 uppercase tracking-wider">Occupancy Rate</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-neutral-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-neutral-900">Inception</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-neutral-900">$45,892</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-neutral-900">2,847</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-neutral-900">4.8/5.0</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="w-full bg-neutral-200 rounded-full h-2.5">
                                    <div class="bg-green-600 h-2.5 rounded-full" style="width: 85%"></div>
                                </div>
                                <span class="text-sm text-neutral-900">85%</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-neutral-900">The Matrix</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-neutral-900">$38,456</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-neutral-900">2,234</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-neutral-900">4.6/5.0</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="w-full bg-neutral-200 rounded-full h-2.5">
                                    <div class="bg-green-600 h-2.5 rounded-full" style="width: 78%"></div>
                                </div>
                                <span class="text-sm text-neutral-900">78%</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Additional Charts Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white border border-neutral-200 rounded-lg p-6">
                <h3 class="text-lg font-semibold text-neutral-900 mb-4">Customer Demographics</h3>
                <div class="h-64 flex items-center justify-center border border-dashed border-neutral-300 rounded-lg">
                    <p class="text-neutral-500">[Demographics Chart Placeholder]</p>
                </div>
            </div>

            <div class="bg-white border border-neutral-200 rounded-lg p-6">
                <h3 class="text-lg font-semibold text-neutral-900 mb-4">Popular Show Times</h3>
                <div class="h-64 flex items-center justify-center border border-dashed border-neutral-300 rounded-lg">
                    <p class="text-neutral-500">[Show Times Chart Placeholder]</p>
                </div>
            </div>

            <div class="bg-white border border-neutral-200 rounded-lg p-6">
                <h3 class="text-lg font-semibold text-neutral-900 mb-4">Booking Channels</h3>
                <div class="h-64 flex items-center justify-center border border-dashed border-neutral-300 rounded-lg">
                    <p class="text-neutral-500">[Channels Chart Placeholder]</p>
                </div>
            </div>
        </div>
    </div>
</htmlCode>
<htmlCode>
    <div id="root">
        <section id="settings" class="min-h-screen bg-neutral-900 text-white p-6">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-2xl font-bold mb-8">Settings</h2>

                <div class="grid gap-8 lg:grid-cols-2">
                    <!-- Profile Settings -->
                    <div class="bg-neutral-800 rounded-lg p-6 border border-neutral-700/30">
                        <h3 class="text-xl font-semibold mb-6">Profile Settings</h3>
                        <div class="flex items-center mb-6">
                            <div class="w-20 h-20 rounded-full bg-neutral-700 overflow-hidden">
                                <img src="https://avatar.iran.liara.run/public" alt="Admin Profile" class="w-full h-full object-cover" />
                            </div>
                            <button class="ml-4 px-4 py-2 bg-neutral-700 hover:bg-neutral-600 rounded-md transition-colors">
                                Change Avatar
                            </button>
                        </div>
                        <form class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium mb-2">Name</label>
                                <input type="text" class="w-full bg-neutral-700 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" value="Admin User" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-2">Email</label>
                                <input type="email" class="w-full bg-neutral-700 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" value="admin@movietickets.com" />
                            </div>
                        </form>
                    </div>

                    <!-- Security Settings -->
                    <div class="bg-neutral-800 rounded-lg p-6 border border-neutral-700/30">
                        <h3 class="text-xl font-semibold mb-6">Security Settings</h3>
                        <form class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium mb-2">Current Password</label>
                                <input type="password" class="w-full bg-neutral-700 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-2">New Password</label>
                                <input type="password" class="w-full bg-neutral-700 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-2">Confirm New Password</label>
                                <input type="password" class="w-full bg-neutral-700 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                            </div>
                        </form>
                    </div>

                    <!-- Notification Settings -->
                    <div class="bg-neutral-800 rounded-lg p-6 border border-neutral-700/30">
                        <h3 class="text-xl font-semibold mb-6">Notification Settings</h3>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <span class="text-sm">Email Notifications</span>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" class="sr-only peer" checked>
                                    <div class="w-11 h-6 bg-neutral-700 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-800 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                </label>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-sm">Push Notifications</span>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" class="sr-only peer">
                                    <div class="w-11 h-6 bg-neutral-700 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-800 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Theme Settings -->
                    <div class="bg-neutral-800 rounded-lg p-6 border border-neutral-700/30">
                        <h3 class="text-xl font-semibold mb-6">Theme Settings</h3>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <span class="text-sm">Dark Mode</span>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" class="sr-only peer" checked>
                                    <div class="w-11 h-6 bg-neutral-700 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-800 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                </label>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-sm">High Contrast</span>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" class="sr-only peer">
                                    <div class="w-11 h-6 bg-neutral-700 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-800 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-8 flex justify-end">
                    <button class="px-6 py-2 bg-blue-600 hover:bg-blue-700 rounded-md transition-colors">
                        Save Changes
                    </button>
                </div>
            </div>
        </section>
    </div>
</htmlCode>