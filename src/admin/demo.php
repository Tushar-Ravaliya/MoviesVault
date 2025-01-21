<!DOCTYPE html>
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

    <!-- {headerScripts} -->

    <!-- Core CSS -->
    <script src="https://cdn.tailwindcss.com"></script>


    <!-- Utilities and Components -->
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.13.3/cdn.min.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.45.1/apexcharts.min.js"></script>

    <!-- Optimized Font Loading -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Base Styles -->
    <style>
        * {
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
            /* Firefox */
        }

        /* Webkit browsers like Chrome, Safari, newer Edge */
        *::-webkit-scrollbar {
            display: none;
            width: 0;
            height: 0;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 0px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #666;
        }

        /* Remove tap highlight on mobile */
        * {
            -webkit-tap-highlight-color: transparent;
        }

        /* Improve text rendering */
        body {
            text-rendering: optimizeLegibility;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* Focus outline styles */
        :focus-visible {
            outline: 2px solid currentColor;
            outline-offset: 2px;
        }

        /* Print styles */
        @media print {
            .no-print {
                display: none !important;
            }

            a[href]:after {
                content: " (" attr(href) ")";
            }
        }
    </style>

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

    <!-- {bodyScripts} -->

</body>

</html>
<htmlCode>
    <div id="root" class="bg-[#E5E7EB] min-h-screen">
        <div class="flex">
            <nav class="fixed h-screen w-64 bg-white border-r border-neutral-200/20 hidden lg:block">
                <div class="flex flex-col h-full">
                    <!-- Logo -->
                    <div class="p-6 border-b border-neutral-200/20">
                        <span class="text-2xl font-bold text-[#3498db]">Theater Hub</span>
                    </div>

                    <!-- Navigation Links -->
                    <div class="flex-1 py-6">
                        <a href="#dashboard" class="flex items-center px-6 py-3 text-[#212121] hover:bg-neutral-100 active group">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            Dashboard
                        </a>
                        <a href="#theaters" class="flex items-center px-6 py-3 text-[#212121] hover:bg-neutral-100">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                            Theaters
                        </a>
                        <a href="#screens" class="flex items-center px-6 py-3 text-[#212121] hover:bg-neutral-100">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            Screens
                        </a>
                        <a href="#reports" class="flex items-center px-6 py-3 text-[#212121] hover:bg-neutral-100">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                            Reports
                        </a>
                    </div>

                    <!-- Footer -->
                    <div class="p-6 border-t border-neutral-200/20">
                        <div class="flex items-center cursor-pointer" id="profileTrigger">
                            <div class="w-10 h-10 rounded-full bg-[#3498db] flex items-center justify-center text-white">
                                JD
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-[#212121]">John Doe</p>
                                <p class="text-xs text-neutral-500">john@example.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Mobile Menu Button -->
            <div class="lg:hidden fixed top-4 left-4 z-50">
                <button type="button" class="p-2 rounded-lg bg-white border border-neutral-200/20" id="menuButton">
                    <svg class="w-6 h-6 menu-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg class="w-6 h-6 close-icon hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div class="lg:hidden fixed inset-0 bg-black bg-opacity-50 z-40 hidden" id="mobileMenu">
                <div class="fixed inset-y-0 left-0 w-64 bg-white shadow-xl transform transition-transform duration-300 translate-x-0">
                    <!-- Mobile menu content (copy of desktop nav) -->
                </div>
            </div>

            <main class="flex-1 ml-0 lg:ml-64">
                <header class="fixed top-0 right-0 left-0 lg:left-64 bg-white border-b border-neutral-200/20 z-30">
                    <div class="flex items-center justify-between px-6 h-16">
                        <div class="flex items-center flex-1">
                            <h1 class="text-xl font-semibold text-[#212121]">Dashboard</h1>
                            <div class="ml-8 hidden lg:block flex-1 max-w-md">
                                <div class="relative">
                                    <input type="search" placeholder="Search..." class="w-full pl-10 pr-4 py-2 rounded-lg border border-neutral-200/20 focus:outline-none focus:ring-2 focus:ring-[#3498db]">
                                    <svg class="w-5 h-5 absolute left-3 top-2.5 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <button class="p-2 rounded-lg hover:bg-neutral-100">
                                <svg class="w-6 h-6 text-[#212121]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </header>
                <MountPoint>

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            // Mobile menu functionality
                            const menuButton = document.getElementById('menuButton');
                            const mobileMenu = document.getElementById('mobileMenu');
                            const menuIcon = document.querySelector('.menu-icon');
                            const closeIcon = document.querySelector('.close-icon');

                            menuButton.addEventListener('click', function() {
                                mobileMenu.classList.toggle('hidden');
                                menuIcon.classList.toggle('hidden');
                                closeIcon.classList.toggle('hidden');
                            });

                            // Navigation active state
                            const navLinks = document.querySelectorAll('nav a');

                            function setActiveLink() {
                                const hash = window.location.hash || '#dashboard';
                                navLinks.forEach(link => {
                                    link.classList.remove('active', 'bg-neutral-100');
                                    if (link.getAttribute('href') === hash) {
                                        link.classList.add('active', 'bg-neutral-100');
                                    }
                                });
                            }

                            window.addEventListener('hashchange', setActiveLink);
                            setActiveLink();
                        });
                    </script>

                    <style>
                        html {
                            scroll-behavior: smooth;
                        }

                        .active {
                            color: #3498db;
                            background-color: #f3f4f6;
                        }

                        /* Transition for menu button */
                        .menu-icon,
                        .close-icon {
                            transition: opacity 0.3s ease-in-out;
                        }
                    </style>
                    <htmlCode>
                        <div id="dashboard_home" class="pt-20 px-6 pb-6">
                            <!-- Hero Section -->
                            <div class="mb-8 bg-white rounded-lg border border-neutral-200/20 p-6">
                                <div class="flex flex-col lg:flex-row justify-between items-center">
                                    <div class="mb-6 lg:mb-0">
                                        <h2 class="text-2xl font-bold text-[#212121] mb-2">Welcome to Theater Management</h2>
                                        <p class="text-neutral-600">Manage your theaters, screens, and revenue all in one place</p>
                                    </div>
                                    <a href="#add_theater" class="bg-[#3498db] text-white px-6 py-3 rounded-lg hover:bg-[#2980b9] transition-colors duration-300">
                                        Add New Theater
                                    </a>
                                </div>
                            </div>

                            <!-- Stats Grid -->
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                                <div class="bg-white p-6 rounded-lg border border-neutral-200/20">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <p class="text-sm text-neutral-500">Total Theaters</p>
                                            <h3 class="text-2xl font-bold text-[#212121]">12</h3>
                                        </div>
                                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                            <svg class="w-6 h-6 text-[#3498db]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-white p-6 rounded-lg border border-neutral-200/20">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <p class="text-sm text-neutral-500">Total Screens</p>
                                            <h3 class="text-2xl font-bold text-[#212121]">48</h3>
                                        </div>
                                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-white p-6 rounded-lg border border-neutral-200/20">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <p class="text-sm text-neutral-500">Total Seats</p>
                                            <h3 class="text-2xl font-bold text-[#212121]">9,648</h3>
                                        </div>
                                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-white p-6 rounded-lg border border-neutral-200/20">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <p class="text-sm text-neutral-500">Monthly Revenue</p>
                                            <h3 class="text-2xl font-bold text-[#212121]">$142,384</h3>
                                        </div>
                                        <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                                            <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Recent Activity -->
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                                <div class="bg-white rounded-lg border border-neutral-200/20 p-6">
                                    <h3 class="text-lg font-semibold text-[#212121] mb-4">Recent Theater Activity</h3>
                                    <div class="space-y-4">
                                        <div class="flex items-center justify-between p-4 bg-neutral-50 rounded-lg">
                                            <div class="flex items-center">
                                                <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center mr-4">
                                                    <svg class="w-5 h-5 text-[#3498db]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                                    </svg>
                                                </div>
                                                <div>
                                                    <p class="font-medium text-[#212121]">New Screen Added</p>
                                                    <p class="text-sm text-neutral-500">Screen 3 added to Grand Theater</p>
                                                </div>
                                            </div>
                                            <span class="text-sm text-neutral-500">2h ago</span>
                                        </div>

                                        <div class="flex items-center justify-between p-4 bg-neutral-50 rounded-lg">
                                            <div class="flex items-center">
                                                <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center mr-4">
                                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                </div>
                                                <div>
                                                    <p class="font-medium text-[#212121]">Seat Configuration Updated</p>
                                                    <p class="text-sm text-neutral-500">City Cinema - Screen 2</p>
                                                </div>
                                            </div>
                                            <span class="text-sm text-neutral-500">5h ago</span>
                                        </div>

                                        <div class="flex items-center justify-between p-4 bg-neutral-50 rounded-lg">
                                            <div class="flex items-center">
                                                <div class="w-10 h-10 rounded-full bg-yellow-100 flex items-center justify-center mr-4">
                                                    <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                    </svg>
                                                </div>
                                                <div>
                                                    <p class="font-medium text-[#212121]">Theater Details Modified</p>
                                                    <p class="text-sm text-neutral-500">Star Cinemas - Contact Updated</p>
                                                </div>
                                            </div>
                                            <span class="text-sm text-neutral-500">1d ago</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-white rounded-lg border border-neutral-200/20 p-6">
                                    <h3 class="text-lg font-semibold text-[#212121] mb-4">Revenue Overview</h3>
                                    <div class="h-64 flex items-center justify-center">
                                        <div class="w-full h-full flex items-end justify-around space-x-2">
                                            <div class="h-[60%] w-8 bg-[#3498db] rounded-t-lg"></div>
                                            <div class="h-[75%] w-8 bg-[#3498db] rounded-t-lg"></div>
                                            <div class="h-[45%] w-8 bg-[#3498db] rounded-t-lg"></div>
                                            <div class="h-[90%] w-8 bg-[#3498db] rounded-t-lg"></div>
                                            <div class="h-[65%] w-8 bg-[#3498db] rounded-t-lg"></div>
                                            <div class="h-[80%] w-8 bg-[#3498db] rounded-t-lg"></div>
                                            <div class="h-[70%] w-8 bg-[#3498db] rounded-t-lg"></div>
                                        </div>
                                    </div>
                                    <div class="flex justify-between mt-4 text-sm text-neutral-500">
                                        <span>Mon</span>
                                        <span>Tue</span>
                                        <span>Wed</span>
                                        <span>Thu</span>
                                        <span>Fri</span>
                                        <span>Sat</span>
                                        <span>Sun</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </htmlCode>
                    <htmlCode>
                        <div id="theaters_list" class="pt-20 px-6 pb-6">
                            <!-- Header with Actions -->
                            <div class="mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                                <div>
                                    <h2 class="text-2xl font-bold text-[#212121]">Theaters</h2>
                                    <p class="text-neutral-600">Manage and view all theater locations</p>
                                </div>
                                <a href="#add_theater" class="bg-[#3498db] text-white px-6 py-3 rounded-lg hover:bg-[#2980b9] transition-colors duration-300 flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                    </svg>
                                    Add New Theater
                                </a>
                            </div>

                            <!-- Filters and Search -->
                            <div class="mb-6 bg-white rounded-lg border border-neutral-200/20 p-4">
                                <div class="flex flex-col md:flex-row gap-4 items-stretch md:items-center">
                                    <div class="flex-1">
                                        <div class="relative">
                                            <input type="search" placeholder="Search theaters..." class="w-full pl-10 pr-4 py-2 rounded-lg border border-neutral-200/20 focus:outline-none focus:ring-2 focus:ring-[#3498db]">
                                            <svg class="w-5 h-5 absolute left-3 top-2.5 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="flex gap-4">
                                        <select class="px-4 py-2 rounded-lg border border-neutral-200/20 focus:outline-none focus:ring-2 focus:ring-[#3498db]">
                                            <option value="">Filter by City</option>
                                            <option value="new-york">New York</option>
                                            <option value="los-angeles">Los Angeles</option>
                                            <option value="chicago">Chicago</option>
                                        </select>
                                        <select class="px-4 py-2 rounded-lg border border-neutral-200/20 focus:outline-none focus:ring-2 focus:ring-[#3498db]">
                                            <option value="">Sort by</option>
                                            <option value="name">Name</option>
                                            <option value="screens">Screens</option>
                                            <option value="revenue">Revenue</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Theaters Grid -->
                            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                                <!-- Theater Card 1 -->
                                <div class="bg-white rounded-lg border border-neutral-200/20 hover:border-[#3498db]/30 transition-colors duration-300">
                                    <div class="p-6">
                                        <div class="flex justify-between items-start mb-4">
                                            <div>
                                                <h3 class="text-lg font-semibold text-[#212121]">Grand Theater</h3>
                                                <p class="text-neutral-600 text-sm">New York, NY</p>
                                            </div>
                                            <div class="flex gap-2">
                                                <button class="p-2 hover:bg-neutral-100 rounded-lg transition-colors duration-300">
                                                    <svg class="w-5 h-5 text-neutral-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                    </svg>
                                                </button>
                                                <button class="p-2 hover:bg-red-50 rounded-lg transition-colors duration-300">
                                                    <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-3 gap-4 mb-4">
                                            <div class="text-center p-3 bg-neutral-50 rounded-lg">
                                                <p class="text-sm text-neutral-600">Screens</p>
                                                <p class="text-lg font-semibold text-[#212121]">4</p>
                                            </div>
                                            <div class="text-center p-3 bg-neutral-50 rounded-lg">
                                                <p class="text-sm text-neutral-600">Seats</p>
                                                <p class="text-lg font-semibold text-[#212121]">840</p>
                                            </div>
                                            <div class="text-center p-3 bg-neutral-50 rounded-lg">
                                                <p class="text-sm text-neutral-600">Shows</p>
                                                <p class="text-lg font-semibold text-[#212121]">12</p>
                                            </div>
                                        </div>
                                        <button class="w-full py-2 text-[#3498db] hover:bg-blue-50 rounded-lg transition-colors duration-300">View Details</button>
                                    </div>
                                </div>

                                <!-- Theater Card 2 -->
                                <div class="bg-white rounded-lg border border-neutral-200/20 hover:border-[#3498db]/30 transition-colors duration-300">
                                    <div class="p-6">
                                        <div class="flex justify-between items-start mb-4">
                                            <div>
                                                <h3 class="text-lg font-semibold text-[#212121]">City Cinema</h3>
                                                <p class="text-neutral-600 text-sm">Los Angeles, CA</p>
                                            </div>
                                            <div class="flex gap-2">
                                                <button class="p-2 hover:bg-neutral-100 rounded-lg transition-colors duration-300">
                                                    <svg class="w-5 h-5 text-neutral-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                    </svg>
                                                </button>
                                                <button class="p-2 hover:bg-red-50 rounded-lg transition-colors duration-300">
                                                    <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-3 gap-4 mb-4">
                                            <div class="text-center p-3 bg-neutral-50 rounded-lg">
                                                <p class="text-sm text-neutral-600">Screens</p>
                                                <p class="text-lg font-semibold text-[#212121]">6</p>
                                            </div>
                                            <div class="text-center p-3 bg-neutral-50 rounded-lg">
                                                <p class="text-sm text-neutral-600">Seats</p>
                                                <p class="text-lg font-semibold text-[#212121]">1200</p>
                                            </div>
                                            <div class="text-center p-3 bg-neutral-50 rounded-lg">
                                                <p class="text-sm text-neutral-600">Shows</p>
                                                <p class="text-lg font-semibold text-[#212121]">18</p>
                                            </div>
                                        </div>
                                        <button class="w-full py-2 text-[#3498db] hover:bg-blue-50 rounded-lg transition-colors duration-300">View Details</button>
                                    </div>
                                </div>

                                <!-- Theater Card 3 -->
                                <div class="bg-white rounded-lg border border-neutral-200/20 hover:border-[#3498db]/30 transition-colors duration-300">
                                    <div class="p-6">
                                        <div class="flex justify-between items-start mb-4">
                                            <div>
                                                <h3 class="text-lg font-semibold text-[#212121]">Star Cinemas</h3>
                                                <p class="text-neutral-600 text-sm">Chicago, IL</p>
                                            </div>
                                            <div class="flex gap-2">
                                                <button class="p-2 hover:bg-neutral-100 rounded-lg transition-colors duration-300">
                                                    <svg class="w-5 h-5 text-neutral-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                    </svg>
                                                </button>
                                                <button class="p-2 hover:bg-red-50 rounded-lg transition-colors duration-300">
                                                    <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-3 gap-4 mb-4">
                                            <div class="text-center p-3 bg-neutral-50 rounded-lg">
                                                <p class="text-sm text-neutral-600">Screens</p>
                                                <p class="text-lg font-semibold text-[#212121]">5</p>
                                            </div>
                                            <div class="text-center p-3 bg-neutral-50 rounded-lg">
                                                <p class="text-sm text-neutral-600">Seats</p>
                                                <p class="text-lg font-semibold text-[#212121]">960</p>
                                            </div>
                                            <div class="text-center p-3 bg-neutral-50 rounded-lg">
                                                <p class="text-sm text-neutral-600">Shows</p>
                                                <p class="text-lg font-semibold text-[#212121]">15</p>
                                            </div>
                                        </div>
                                        <button class="w-full py-2 text-[#3498db] hover:bg-blue-50 rounded-lg transition-colors duration-300">View Details</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </htmlCode>
                    <htmlCode>
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
                                                <button class="aspect-square rounded bg-neutral-100 hover:bg-[#3498db] hover:text-white transition-colors duration-300"></button>
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
                    </htmlCode>
                    <htmlCode>
                        <div id="screen_management" class="pt-20 px-6 pb-6">
                            <!-- Header with Actions -->
                            <div class="mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                                <div>
                                    <h2 class="text-2xl font-bold text-[#212121]">Screen Management</h2>
                                    <p class="text-neutral-600">Manage all theater screens and configurations</p>
                                </div>
                                <button class="bg-[#3498db] text-white px-6 py-3 rounded-lg hover:bg-[#2980b9] transition-colors duration-300 flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                    </svg>
                                    Add New Screen
                                </button>
                            </div>

                            <!-- Filters and Search -->
                            <div class="mb-6 bg-white rounded-lg border border-neutral-200/20 p-4">
                                <div class="flex flex-col md:flex-row gap-4">
                                    <div class="flex-1">
                                        <div class="relative">
                                            <input type="search" placeholder="Search screens..." class="w-full pl-10 pr-4 py-2 rounded-lg border border-neutral-200/20 focus:outline-none focus:ring-2 focus:ring-[#3498db]">
                                            <svg class="w-5 h-5 absolute left-3 top-2.5 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="flex gap-4">
                                        <select class="px-4 py-2 rounded-lg border border-neutral-200/20 focus:outline-none focus:ring-2 focus:ring-[#3498db]">
                                            <option value="">Filter by Type</option>
                                            <option value="2d">2D</option>
                                            <option value="3d">3D</option>
                                            <option value="imax">IMAX</option>
                                        </select>
                                        <select class="px-4 py-2 rounded-lg border border-neutral-200/20 focus:outline-none focus:ring-2 focus:ring-[#3498db]">
                                            <option value="">Sort by</option>
                                            <option value="name">Screen Name</option>
                                            <option value="capacity">Capacity</option>
                                            <option value="revenue">Revenue</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Screens Table -->
                            <div class="bg-white rounded-lg border border-neutral-200/20 overflow-hidden">
                                <table class="w-full">
                                    <thead class="bg-neutral-50 border-b border-neutral-200/20">
                                        <tr>
                                            <th class="text-left py-4 px-6 text-sm font-semibold text-[#212121]">Screen ID</th>
                                            <th class="text-left py-4 px-6 text-sm font-semibold text-[#212121]">Screen Name</th>
                                            <th class="text-left py-4 px-6 text-sm font-semibold text-[#212121]">Theater</th>
                                            <th class="text-left py-4 px-6 text-sm font-semibold text-[#212121]">Type</th>
                                            <th class="text-left py-4 px-6 text-sm font-semibold text-[#212121]">Capacity</th>
                                            <th class="text-left py-4 px-6 text-sm font-semibold text-[#212121]">Status</th>
                                            <th class="text-left py-4 px-6 text-sm font-semibold text-[#212121]">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-neutral-200/20">
                                        <tr class="hover:bg-neutral-50 transition-colors duration-200">
                                            <td class="py-4 px-6 text-sm text-[#212121]">SCR001</td>
                                            <td class="py-4 px-6 text-sm text-[#212121]">Main Screen</td>
                                            <td class="py-4 px-6 text-sm text-[#212121]">Grand Theater</td>
                                            <td class="py-4 px-6 text-sm text-[#212121]">IMAX</td>
                                            <td class="py-4 px-6 text-sm text-[#212121]">280</td>
                                            <td class="py-4 px-6">
                                                <span class="px-3 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">Active</span>
                                            </td>
                                            <td class="py-4 px-6">
                                                <div class="flex gap-2">
                                                    <button class="p-2 hover:bg-neutral-100 rounded-lg transition-colors duration-300">
                                                        <svg class="w-5 h-5 text-[#3498db]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                        </svg>
                                                    </button>
                                                    <button class="p-2 hover:bg-neutral-100 rounded-lg transition-colors duration-300">
                                                        <svg class="w-5 h-5 text-neutral-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class="hover:bg-neutral-50 transition-colors duration-200">
                                            <td class="py-4 px-6 text-sm text-[#212121]">SCR002</td>
                                            <td class="py-4 px-6 text-sm text-[#212121]">Premium Screen</td>
                                            <td class="py-4 px-6 text-sm text-[#212121]">City Cinema</td>
                                            <td class="py-4 px-6 text-sm text-[#212121]">3D</td>
                                            <td class="py-4 px-6 text-sm text-[#212121]">180</td>
                                            <td class="py-4 px-6">
                                                <span class="px-3 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">Active</span>
                                            </td>
                                            <td class="py-4 px-6">
                                                <div class="flex gap-2">
                                                    <button class="p-2 hover:bg-neutral-100 rounded-lg transition-colors duration-300">
                                                        <svg class="w-5 h-5 text-[#3498db]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                        </svg>
                                                    </button>
                                                    <button class="p-2 hover:bg-neutral-100 rounded-lg transition-colors duration-300">
                                                        <svg class="w-5 h-5 text-neutral-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class="hover:bg-neutral-50 transition-colors duration-200">
                                            <td class="py-4 px-6 text-sm text-[#212121]">SCR003</td>
                                            <td class="py-4 px-6 text-sm text-[#212121]">Standard Screen</td>
                                            <td class="py-4 px-6 text-sm text-[#212121]">Star Cinemas</td>
                                            <td class="py-4 px-6 text-sm text-[#212121]">2D</td>
                                            <td class="py-4 px-6 text-sm text-[#212121]">150</td>
                                            <td class="py-4 px-6">
                                                <span class="px-3 py-1 text-xs font-medium bg-yellow-100 text-yellow-800 rounded-full">Maintenance</span>
                                            </td>
                                            <td class="py-4 px-6">
                                                <div class="flex gap-2">
                                                    <button class="p-2 hover:bg-neutral-100 rounded-lg transition-colors duration-300">
                                                        <svg class="w-5 h-5 text-[#3498db]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                        </svg>
                                                    </button>
                                                    <button class="p-2 hover:bg-neutral-100 rounded-lg transition-colors duration-300">
                                                        <svg class="w-5 h-5 text-neutral-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Pagination -->
                            <div class="mt-6 flex justify-between items-center">
                                <p class="text-sm text-neutral-600">Showing 1 to 3 of 12 entries</p>
                                <div class="flex gap-2">
                                    <button class="px-4 py-2 border border-neutral-200/20 rounded-lg text-neutral-600 hover:bg-neutral-50 transition-colors duration-300">Previous</button>
                                    <button class="px-4 py-2 bg-[#3498db] text-white rounded-lg hover:bg-[#2980b9] transition-colors duration-300">1</button>
                                    <button class="px-4 py-2 border border-neutral-200/20 rounded-lg text-neutral-600 hover:bg-neutral-50 transition-colors duration-300">2</button>
                                    <button class="px-4 py-2 border border-neutral-200/20 rounded-lg text-neutral-600 hover:bg-neutral-50 transition-colors duration-300">3</button>
                                    <button class="px-4 py-2 border border-neutral-200/20 rounded-lg text-neutral-600 hover:bg-neutral-50 transition-colors duration-300">Next</button>
                                </div>
                            </div>
                        </div>
                    </htmlCode>
                    <htmlCode>
                        <div id="reports_analytics" class="pt-20 px-6 pb-6">
                            <!-- Header -->
                            <div class="mb-6">
                                <h2 class="text-2xl font-bold text-[#212121]">Reports & Analytics</h2>
                                <p class="text-neutral-600">View detailed analytics and performance metrics</p>
                            </div>

                            <!-- Date Range Filter -->
                            <div class="mb-6 bg-white rounded-lg border border-neutral-200/20 p-4">
                                <div class="flex flex-col md:flex-row gap-4">
                                    <div class="flex-1 flex gap-4">
                                        <input type="date" class="px-4 py-2 rounded-lg border border-neutral-200/20 focus:outline-none focus:ring-2 focus:ring-[#3498db]">
                                        <input type="date" class="px-4 py-2 rounded-lg border border-neutral-200/20 focus:outline-none focus:ring-2 focus:ring-[#3498db]">
                                    </div>
                                    <button class="px-6 py-2 bg-[#3498db] text-white rounded-lg hover:bg-[#2980b9] transition-colors duration-300">
                                        Generate Report
                                    </button>
                                </div>
                            </div>

                            <!-- Key Metrics Grid -->
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                                <div class="bg-white p-6 rounded-lg border border-neutral-200/20">
                                    <div class="flex items-center justify-between mb-4">
                                        <h3 class="text-lg font-semibold text-[#212121]">Total Revenue</h3>
                                        <span class="text-green-500 flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                                            </svg>
                                            12.5%
                                        </span>
                                    </div>
                                    <p class="text-3xl font-bold text-[#212121]">$542,892</p>
                                    <p class="text-sm text-neutral-600 mt-2">vs $482,567 last month</p>
                                </div>

                                <div class="bg-white p-6 rounded-lg border border-neutral-200/20">
                                    <div class="flex items-center justify-between mb-4">
                                        <h3 class="text-lg font-semibold text-[#212121]">Total Shows</h3>
                                        <span class="text-green-500 flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                                            </svg>
                                            8.3%
                                        </span>
                                    </div>
                                    <p class="text-3xl font-bold text-[#212121]">1,248</p>
                                    <p class="text-sm text-neutral-600 mt-2">vs 1,152 last month</p>
                                </div>

                                <div class="bg-white p-6 rounded-lg border border-neutral-200/20">
                                    <div class="flex items-center justify-between mb-4">
                                        <h3 class="text-lg font-semibold text-[#212121]">Occupancy Rate</h3>
                                        <span class="text-red-500 flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                                            </svg>
                                            2.1%
                                        </span>
                                    </div>
                                    <p class="text-3xl font-bold text-[#212121]">76.5%</p>
                                    <p class="text-sm text-neutral-600 mt-2">vs 78.6% last month</p>
                                </div>

                                <div class="bg-white p-6 rounded-lg border border-neutral-200/20">
                                    <div class="flex items-center justify-between mb-4">
                                        <h3 class="text-lg font-semibold text-[#212121]">Avg. Ticket Price</h3>
                                        <span class="text-green-500 flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                                            </svg>
                                            5.2%
                                        </span>
                                    </div>
                                    <p class="text-3xl font-bold text-[#212121]">$12.85</p>
                                    <p class="text-sm text-neutral-600 mt-2">vs $12.21 last month</p>
                                </div>
                            </div>

                            <!-- Revenue Chart -->
                            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                                <div class="lg:col-span-2 bg-white rounded-lg border border-neutral-200/20 p-6">
                                    <h3 class="text-lg font-semibold text-[#212121] mb-4">Revenue Trend</h3>
                                    <div class="h-80">
                                        <div class="w-full h-full flex items-end justify-around space-x-2">
                                            <div class="h-[60%] w-12 bg-[#3498db] rounded-t-lg"></div>
                                            <div class="h-[75%] w-12 bg-[#3498db] rounded-t-lg"></div>
                                            <div class="h-[45%] w-12 bg-[#3498db] rounded-t-lg"></div>
                                            <div class="h-[90%] w-12 bg-[#3498db] rounded-t-lg"></div>
                                            <div class="h-[65%] w-12 bg-[#3498db] rounded-t-lg"></div>
                                            <div class="h-[80%] w-12 bg-[#3498db] rounded-t-lg"></div>
                                            <div class="h-[70%] w-12 bg-[#3498db] rounded-t-lg"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-white rounded-lg border border-neutral-200/20 p-6">
                                    <h3 class="text-lg font-semibold text-[#212121] mb-4">Top Performing Screens</h3>
                                    <div class="space-y-4">
                                        <div class="flex items-center justify-between p-3 bg-neutral-50 rounded-lg">
                                            <div>
                                                <p class="font-medium text-[#212121]">IMAX Screen 1</p>
                                                <p class="text-sm text-neutral-600">Grand Theater</p>
                                            </div>
                                            <p class="font-semibold text-[#3498db]">$125,430</p>
                                        </div>
                                        <div class="flex items-center justify-between p-3 bg-neutral-50 rounded-lg">
                                            <div>
                                                <p class="font-medium text-[#212121]">Premium Screen 2</p>
                                                <p class="text-sm text-neutral-600">City Cinema</p>
                                            </div>
                                            <p class="font-semibold text-[#3498db]">$98,745</p>
                                        </div>
                                        <div class="flex items-center justify-between p-3 bg-neutral-50 rounded-lg">
                                            <div>
                                                <p class="font-medium text-[#212121]">3D Screen 3</p>
                                                <p class="text-sm text-neutral-600">Star Cinemas</p>
                                            </div>
                                            <p class="font-semibold text-[#3498db]">$87,652</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Performance Table -->
                            <div class="mt-6 bg-white rounded-lg border border-neutral-200/20 overflow-hidden">
                                <div class="p-6 border-b border-neutral-200/20">
                                    <h3 class="text-lg font-semibold text-[#212121]">Detailed Performance Metrics</h3>
                                </div>
                                <div class="overflow-x-auto">
                                    <table class="w-full">
                                        <thead class="bg-neutral-50">
                                            <tr>
                                                <th class="text-left py-4 px-6 text-sm font-semibold text-[#212121]">Screen Name</th>
                                                <th class="text-left py-4 px-6 text-sm font-semibold text-[#212121]">Revenue</th>
                                                <th class="text-left py-4 px-6 text-sm font-semibold text-[#212121]">Shows</th>
                                                <th class="text-left py-4 px-6 text-sm font-semibold text-[#212121]">Occupancy</th>
                                                <th class="text-left py-4 px-6 text-sm font-semibold text-[#212121]">Avg. Price</th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-neutral-200/20">
                                            <tr class="hover:bg-neutral-50">
                                                <td class="py-4 px-6">IMAX Screen 1</td>
                                                <td class="py-4 px-6">$125,430</td>
                                                <td class="py-4 px-6">245</td>
                                                <td class="py-4 px-6">82%</td>
                                                <td class="py-4 px-6">$15.50</td>
                                            </tr>
                                            <tr class="hover:bg-neutral-50">
                                                <td class="py-4 px-6">Premium Screen 2</td>
                                                <td class="py-4 px-6">$98,745</td>
                                                <td class="py-4 px-6">198</td>
                                                <td class="py-4 px-6">78%</td>
                                                <td class="py-4 px-6">$13.75</td>
                                            </tr>
                                            <tr class="hover:bg-neutral-50">
                                                <td class="py-4 px-6">3D Screen 3</td>
                                                <td class="py-4 px-6">$87,652</td>
                                                <td class="py-4 px-6">176</td>
                                                <td class="py-4 px-6">74%</td>
                                                <td class="py-4 px-6">$12.25</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </htmlCode>
                    <htmlCode>
                        <div id="seat_configuration" class="pt-20 px-6 pb-6" x-data="{ selectedSeatType: 'regular' }">
                            <!-- Header -->
                            <div class="mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                                <div>
                                    <h2 class="text-2xl font-bold text-[#212121]">Seat Configuration</h2>
                                    <p class="text-neutral-600">Configure seating layout for Screen 1 - IMAX</p>
                                </div>
                                <button class="bg-[#3498db] text-white px-6 py-3 rounded-lg hover:bg-[#2980b9] transition-colors duration-300">
                                    Save Layout
                                </button>
                            </div>

                            <!-- Configuration Tools -->
                            <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
                                <!-- Seat Controls -->
                                <div class="lg:col-span-1 space-y-6">
                                    <div class="bg-white rounded-lg border border-neutral-200/20 p-6">
                                        <h3 class="text-lg font-semibold text-[#212121] mb-4">Seat Types</h3>
                                        <div class="space-y-4">
                                            <label class="flex items-center p-3 bg-neutral-50 rounded-lg cursor-pointer">
                                                <input type="radio" name="seatType" value="regular" x-model="selectedSeatType" class="w-4 h-4 text-[#3498db]">
                                                <span class="ml-3 text-[#212121]">Regular Seat</span>
                                            </label>
                                            <label class="flex items-center p-3 bg-neutral-50 rounded-lg cursor-pointer">
                                                <input type="radio" name="seatType" value="premium" x-model="selectedSeatType" class="w-4 h-4 text-[#3498db]">
                                                <span class="ml-3 text-[#212121]">Premium Seat</span>
                                            </label>
                                            <label class="flex items-center p-3 bg-neutral-50 rounded-lg cursor-pointer">
                                                <input type="radio" name="seatType" value="disabled" x-model="selectedSeatType" class="w-4 h-4 text-[#3498db]">
                                                <span class="ml-3 text-[#212121]">Disabled Access</span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="bg-white rounded-lg border border-neutral-200/20 p-6">
                                        <h3 class="text-lg font-semibold text-[#212121] mb-4">Pricing</h3>
                                        <div class="space-y-4">
                                            <div>
                                                <label class="block text-sm text-neutral-600 mb-2">Regular Seat Price</label>
                                                <input type="number" class="w-full px-4 py-2 rounded-lg border border-neutral-200/20 focus:outline-none focus:ring-2 focus:ring-[#3498db]" value="10">
                                            </div>
                                            <div>
                                                <label class="block text-sm text-neutral-600 mb-2">Premium Seat Price</label>
                                                <input type="number" class="w-full px-4 py-2 rounded-lg border border-neutral-200/20 focus:outline-none focus:ring-2 focus:ring-[#3498db]" value="15">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="bg-white rounded-lg border border-neutral-200/20 p-6">
                                        <h3 class="text-lg font-semibold text-[#212121] mb-4">Legend</h3>
                                        <div class="space-y-3">
                                            <div class="flex items-center">
                                                <div class="w-8 h-8 bg-neutral-100 rounded-lg"></div>
                                                <span class="ml-3 text-sm text-neutral-600">Regular Seat</span>
                                            </div>
                                            <div class="flex items-center">
                                                <div class="w-8 h-8 bg-[#3498db] rounded-lg"></div>
                                                <span class="ml-3 text-sm text-neutral-600">Premium Seat</span>
                                            </div>
                                            <div class="flex items-center">
                                                <div class="w-8 h-8 bg-yellow-400 rounded-lg"></div>
                                                <span class="ml-3 text-sm text-neutral-600">Disabled Access</span>
                                            </div>
                                            <div class="flex items-center">
                                                <div class="w-8 h-8 bg-red-500 rounded-lg"></div>
                                                <span class="ml-3 text-sm text-neutral-600">Selected</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Seat Map -->
                                <div class="lg:col-span-3 bg-white rounded-lg border border-neutral-200/20 p-6">
                                    <div class="mb-6 text-center p-4 bg-neutral-900 text-white rounded-lg">SCREEN</div>
                                    <div class="grid grid-cols-15 gap-2 justify-center" style="grid-template-columns: repeat(15, minmax(0, 1fr));">
                                        <!-- Generate 10 rows of 15 seats each -->
                                        <template x-for="row in 10">
                                            <template x-for="seat in 15">
                                                <button class="aspect-square rounded-lg bg-neutral-100 hover:bg-[#3498db] hover:text-white transition-colors duration-300 flex items-center justify-center text-xs font-medium"
                                                    x-text="String.fromCharCode(64 + row) + seat"
                                                    @click="selectedSeatType === 'premium' ? $el.classList.toggle('bg-[#3498db]') : selectedSeatType === 'disabled' ? $el.classList.toggle('bg-yellow-400') : $el.classList.toggle('bg-neutral-100')">
                                                </button>
                                            </template>
                                        </template>
                                    </div>
                                </div>
                            </div>

                            <!-- Summary -->
                            <div class="mt-6 bg-white rounded-lg border border-neutral-200/20 p-6">
                                <h3 class="text-lg font-semibold text-[#212121] mb-4">Configuration Summary</h3>
                                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                                    <div class="p-4 bg-neutral-50 rounded-lg text-center">
                                        <p class="text-sm text-neutral-600">Total Seats</p>
                                        <p class="text-2xl font-bold text-[#212121]">150</p>
                                    </div>
                                    <div class="p-4 bg-neutral-50 rounded-lg text-center">
                                        <p class="text-sm text-neutral-600">Regular Seats</p>
                                        <p class="text-2xl font-bold text-[#212121]">120</p>
                                    </div>
                                    <div class="p-4 bg-neutral-50 rounded-lg text-center">
                                        <p class="text-sm text-neutral-600">Premium Seats</p>
                                        <p class="text-2xl font-bold text-[#212121]">26</p>
                                    </div>
                                    <div class="p-4 bg-neutral-50 rounded-lg text-center">
                                        <p class="text-sm text-neutral-600">Disabled Access</p>
                                        <p class="text-2xl font-bold text-[#212121]">4</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- <script>
                            document.addEventListener('alpine:init', () => {
                                Alpine.data('seatConfiguration', () => ({
                                    selectedSeatType: 'regular',
                                }))
                            })
                        </script> -->
                    </htmlCode>
                    <htmlCode>
                        <div id="settings" class="pt-20 px-6 pb-6">
                            <!-- Header -->
                            <div class="mb-6">
                                <h2 class="text-2xl font-bold text-[#212121]">Settings</h2>
                                <p class="text-neutral-600">Manage your theater system preferences</p>
                            </div>

                            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                                <!-- Main Settings -->
                                <div class="lg:col-span-2 space-y-6">
                                    <!-- General Settings -->
                                    <div class="bg-white rounded-lg border border-neutral-200/20 p-6">
                                        <h3 class="text-lg font-semibold text-[#212121] mb-4">General Settings</h3>
                                        <div class="space-y-4">
                                            <div>
                                                <label class="block text-sm font-medium text-[#212121] mb-2">Theater Chain Name</label>
                                                <input type="text" class="w-full px-4 py-2 rounded-lg border border-neutral-200/20 focus:outline-none focus:ring-2 focus:ring-[#3498db]" value="Cinema Group">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-[#212121] mb-2">Default Currency</label>
                                                <select class="w-full px-4 py-2 rounded-lg border border-neutral-200/20 focus:outline-none focus:ring-2 focus:ring-[#3498db]">
                                                    <option value="USD">USD ($)</option>
                                                    <option value="EUR">EUR (€)</option>
                                                    <option value="GBP">GBP (£)</option>
                                                </select>
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-[#212121] mb-2">Time Zone</label>
                                                <select class="w-full px-4 py-2 rounded-lg border border-neutral-200/20 focus:outline-none focus:ring-2 focus:ring-[#3498db]">
                                                    <option value="UTC-5">Eastern Time (ET)</option>
                                                    <option value="UTC-8">Pacific Time (PT)</option>
                                                    <option value="UTC">UTC</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Notification Settings -->
                                    <div class="bg-white rounded-lg border border-neutral-200/20 p-6">
                                        <h3 class="text-lg font-semibold text-[#212121] mb-4">Notification Preferences</h3>
                                        <div class="space-y-4">
                                            <label class="flex items-center justify-between p-3 bg-neutral-50 rounded-lg">
                                                <span class="text-[#212121]">Email Notifications</span>
                                                <label class="relative inline-flex items-center cursor-pointer">
                                                    <input type="checkbox" class="sr-only peer" checked>
                                                    <div class="w-11 h-6 bg-neutral-200 rounded-full peer peer-checked:after:translate-x-full peer-checked:bg-[#3498db] after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all"></div>
                                                </label>
                                            </label>
                                            <label class="flex items-center justify-between p-3 bg-neutral-50 rounded-lg">
                                                <span class="text-[#212121]">System Alerts</span>
                                                <label class="relative inline-flex items-center cursor-pointer">
                                                    <input type="checkbox" class="sr-only peer" checked>
                                                    <div class="w-11 h-6 bg-neutral-200 rounded-full peer peer-checked:after:translate-x-full peer-checked:bg-[#3498db] after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all"></div>
                                                </label>
                                            </label>
                                            <label class="flex items-center justify-between p-3 bg-neutral-50 rounded-lg">
                                                <span class="text-[#212121]">Marketing Updates</span>
                                                <label class="relative inline-flex items-center cursor-pointer">
                                                    <input type="checkbox" class="sr-only peer">
                                                    <div class="w-11 h-6 bg-neutral-200 rounded-full peer peer-checked:after:translate-x-full peer-checked:bg-[#3498db] after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all"></div>
                                                </label>
                                            </label>
                                        </div>
                                    </div>

                                    <!-- Security Settings -->
                                    <div class="bg-white rounded-lg border border-neutral-200/20 p-6">
                                        <h3 class="text-lg font-semibold text-[#212121] mb-4">Security Settings</h3>
                                        <div class="space-y-4">
                                            <div>
                                                <label class="block text-sm font-medium text-[#212121] mb-2">Current Password</label>
                                                <input type="password" class="w-full px-4 py-2 rounded-lg border border-neutral-200/20 focus:outline-none focus:ring-2 focus:ring-[#3498db]" placeholder="Enter current password">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-[#212121] mb-2">New Password</label>
                                                <input type="password" class="w-full px-4 py-2 rounded-lg border border-neutral-200/20 focus:outline-none focus:ring-2 focus:ring-[#3498db]" placeholder="Enter new password">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-[#212121] mb-2">Confirm New Password</label>
                                                <input type="password" class="w-full px-4 py-2 rounded-lg border border-neutral-200/20 focus:outline-none focus:ring-2 focus:ring-[#3498db]" placeholder="Confirm new password">
                                            </div>
                                            <button class="px-6 py-2 bg-[#3498db] text-white rounded-lg hover:bg-[#2980b9] transition-colors duration-300">
                                                Update Password
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Quick Actions -->
                                <div class="space-y-6">
                                    <div class="bg-white rounded-lg border border-neutral-200/20 p-6">
                                        <h3 class="text-lg font-semibold text-[#212121] mb-4">Quick Actions</h3>
                                        <div class="space-y-3">
                                            <button class="w-full p-3 text-left bg-neutral-50 rounded-lg hover:bg-neutral-100 transition-colors duration-300 flex items-center">
                                                <svg class="w-5 h-5 mr-3 text-[#3498db]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                                </svg>
                                                Export System Data
                                            </button>
                                            <button class="w-full p-3 text-left bg-neutral-50 rounded-lg hover:bg-neutral-100 transition-colors duration-300 flex items-center">
                                                <svg class="w-5 h-5 mr-3 text-[#3498db]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                                </svg>
                                                Sync Data
                                            </button>
                                            <button class="w-full p-3 text-left bg-neutral-50 rounded-lg hover:bg-neutral-100 transition-colors duration-300 flex items-center">
                                                <svg class="w-5 h-5 mr-3 text-[#3498db]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                                Clear Cache
                                            </button>
                                        </div>
                                    </div>

                                    <div class="bg-white rounded-lg border border-neutral-200/20 p-6">
                                        <h3 class="text-lg font-semibold text-[#212121] mb-4">System Information</h3>
                                        <div class="space-y-3">
                                            <div class="flex justify-between p-3 bg-neutral-50 rounded-lg">
                                                <span class="text-sm text-neutral-600">Version</span>
                                                <span class="text-sm font-medium text-[#212121]">2.1.0</span>
                                            </div>
                                            <div class="flex justify-between p-3 bg-neutral-50 rounded-lg">
                                                <span class="text-sm text-neutral-600">Last Updated</span>
                                                <span class="text-sm font-medium text-[#212121]">2 days ago</span>
                                            </div>
                                            <div class="flex justify-between p-3 bg-neutral-50 rounded-lg">
                                                <span class="text-sm text-neutral-600">Storage Used</span>
                                                <span class="text-sm font-medium text-[#212121]">1.2 GB</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </htmlCode>
                    <htmlCode>
                        <div id="root">
                            <section id="profile" class="min-h-screen bg-neutral-900 text-white py-12 px-4 sm:px-6 lg:px-8">
                                <div class="max-w-7xl mx-auto">
                                    <!-- Profile Header -->
                                    <div class="bg-neutral-800/50 rounded-lg p-6 backdrop-blur-lg border border-neutral-700/30">
                                        <div class="flex flex-col lg:flex-row items-center gap-8">
                                            <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-blue-500/30">
                                                <img src="https://avatar.iran.liara.run/public" alt="Profile" class="w-full h-full object-cover" />
                                            </div>
                                            <div class="flex-1 text-center lg:text-left">
                                                <h1 class="text-2xl font-bold">Theater Admin Dashboard</h1>
                                                <p class="text-neutral-400 mt-2">Manage your theater operations efficiently</p>
                                                <div class="mt-4 flex flex-wrap gap-4 justify-center lg:justify-start">
                                                    <button class="bg-blue-600 hover:bg-blue-700 px-6 py-2 rounded-lg transition-colors duration-300 flex items-center gap-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                                        </svg>
                                                        Add Theater
                                                    </button>
                                                    <button class="bg-neutral-700 hover:bg-neutral-600 px-6 py-2 rounded-lg transition-colors duration-300 flex items-center gap-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        </svg>
                                                        Settings
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Stats Grid -->
                                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-8">
                                        <div class="bg-neutral-800/50 backdrop-blur-lg rounded-lg p-6 border border-neutral-700/30">
                                            <div class="flex items-center justify-between">
                                                <h3 class="text-neutral-400">Total Theaters</h3>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                                </svg>
                                            </div>
                                            <p class="text-3xl font-bold mt-2">12</p>
                                            <p class="text-green-500 text-sm mt-2">↑ 8% from last month</p>
                                        </div>

                                        <div class="bg-neutral-800/50 backdrop-blur-lg rounded-lg p-6 border border-neutral-700/30">
                                            <div class="flex items-center justify-between">
                                                <h3 class="text-neutral-400">Total Screens</h3>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                            <p class="text-3xl font-bold mt-2">48</p>
                                            <p class="text-green-500 text-sm mt-2">↑ 12% from last month</p>
                                        </div>

                                        <div class="bg-neutral-800/50 backdrop-blur-lg rounded-lg p-6 border border-neutral-700/30">
                                            <div class="flex items-center justify-between">
                                                <h3 class="text-neutral-400">Total Seats</h3>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                                                </svg>
                                            </div>
                                            <p class="text-3xl font-bold mt-2">9,600</p>
                                            <p class="text-green-500 text-sm mt-2">↑ 5% from last month</p>
                                        </div>

                                        <div class="bg-neutral-800/50 backdrop-blur-lg rounded-lg p-6 border border-neutral-700/30">
                                            <div class="flex items-center justify-between">
                                                <h3 class="text-neutral-400">Monthly Revenue</h3>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </div>
                                            <p class="text-3xl font-bold mt-2">$248,000</p>
                                            <p class="text-green-500 text-sm mt-2">↑ 15% from last month</p>
                                        </div>
                                    </div>

                                    <!-- Recent Activity -->
                                    <div class="mt-8 bg-neutral-800/50 backdrop-blur-lg rounded-lg p-6 border border-neutral-700/30">
                                        <h2 class="text-xl font-bold mb-6">Recent Activity</h2>
                                        <div class="overflow-x-auto">
                                            <table class="min-w-full divide-y divide-neutral-700">
                                                <thead>
                                                    <tr>
                                                        <th class="px-6 py-3 text-left text-xs font-medium text-neutral-400 uppercase tracking-wider">Theater</th>
                                                        <th class="px-6 py-3 text-left text-xs font-medium text-neutral-400 uppercase tracking-wider">Action</th>
                                                        <th class="px-6 py-3 text-left text-xs font-medium text-neutral-400 uppercase tracking-wider">Date</th>
                                                        <th class="px-6 py-3 text-left text-xs font-medium text-neutral-400 uppercase tracking-wider">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="divide-y divide-neutral-700">
                                                    <tr>
                                                        <td class="px-6 py-4 whitespace-nowrap">Cinema Palace</td>
                                                        <td class="px-6 py-4 whitespace-nowrap">Screen Added</td>
                                                        <td class="px-6 py-4 whitespace-nowrap">2024-01-20</td>
                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Completed</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="px-6 py-4 whitespace-nowrap">Star Movies</td>
                                                        <td class="px-6 py-4 whitespace-nowrap">Seat Configuration Updated</td>
                                                        <td class="px-6 py-4 whitespace-nowrap">2024-01-19</td>
                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="px-6 py-4 whitespace-nowrap">Mega Cineplex</td>
                                                        <td class="px-6 py-4 whitespace-nowrap">Theater Added</td>
                                                        <td class="px-6 py-4 whitespace-nowrap">2024-01-18</td>
                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Completed</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </htmlCode>