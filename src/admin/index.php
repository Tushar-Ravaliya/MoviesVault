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
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f8f8f8',
                            100: '#e8e8e8',
                            200: '#d3d3d3',
                            300: '#a3a3a3',
                            400: '#737373',
                            500: '#525252',
                            600: '#404040',
                            700: '#262626',
                            800: '#171717',
                            900: '#0a0a0a',
                            950: '#030303',
                        },
                        secondary: {
                            50: '#f8f8f8',
                            100: '#e8e8e8',
                            200: '#d3d3d3',
                            300: '#a3a3a3',
                            400: '#737373',
                            500: '#525252',
                            600: '#404040',
                            700: '#262626',
                            800: '#171717',
                            900: '#0a0a0a',
                            950: '#030303',
                        },
                        accent: {
                            50: '#f8f8f8',
                            100: '#e8e8e8',
                            200: '#d3d3d3',
                            300: '#a3a3a3',
                            400: '#737373',
                            500: '#525252',
                            600: '#404040',
                            700: '#262626',
                            800: '#171717',
                            900: '#0a0a0a',
                            950: '#030303',
                        },
                    },
                    fontFamily: {
                        sans: ['Inter', 'system-ui', '-apple-system', 'BlinkMacSystemFont', 'Segoe UI', 'Roboto', 'Helvetica Neue', 'Arial', 'sans-serif'],
                        heading: ['Montserrat', 'Inter', 'system-ui', 'sans-serif'],
                    },
                    spacing: {
                        '18': '4.5rem',
                        '22': '5.5rem',
                        '30': '7.5rem',
                    },
                    maxWidth: {
                        '8xl': '88rem',
                        '9xl': '96rem',
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-in',
                        'fade-out': 'fadeOut 0.5s ease-out',
                        'slide-up': 'slideUp 0.5s ease-out',
                        'slide-down': 'slideDown 0.5s ease-out',
                        'slide-left': 'slideLeft 0.5s ease-out',
                        'slide-right': 'slideRight 0.5s ease-out',
                        'scale-in': 'scaleIn 0.5s ease-out',
                        'scale-out': 'scaleOut 0.5s ease-out',
                        'spin-slow': 'spin 3s linear infinite',
                        'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'bounce-slow': 'bounce 3s infinite',
                        'float': 'float 3s ease-in-out infinite',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': {
                                opacity: '0'
                            },
                            '100%': {
                                opacity: '1'
                            },
                        },
                        fadeOut: {
                            '0%': {
                                opacity: '1'
                            },
                            '100%': {
                                opacity: '0'
                            },
                        },
                        slideUp: {
                            '0%': {
                                transform: 'translateY(20px)',
                                opacity: '0'
                            },
                            '100%': {
                                transform: 'translateY(0)',
                                opacity: '1'
                            },
                        },
                        slideDown: {
                            '0%': {
                                transform: 'translateY(-20px)',
                                opacity: '0'
                            },
                            '100%': {
                                transform: 'translateY(0)',
                                opacity: '1'
                            },
                        },
                        slideLeft: {
                            '0%': {
                                transform: 'translateX(20px)',
                                opacity: '0'
                            },
                            '100%': {
                                transform: 'translateX(0)',
                                opacity: '1'
                            },
                        },
                        slideRight: {
                            '0%': {
                                transform: 'translateX(-20px)',
                                opacity: '0'
                            },
                            '100%': {
                                transform: 'translateX(0)',
                                opacity: '1'
                            },
                        },
                        scaleIn: {
                            '0%': {
                                transform: 'scale(0.9)',
                                opacity: '0'
                            },
                            '100%': {
                                transform: 'scale(1)',
                                opacity: '1'
                            },
                        },
                        scaleOut: {
                            '0%': {
                                transform: 'scale(1.1)',
                                opacity: '0'
                            },
                            '100%': {
                                transform: 'scale(1)',
                                opacity: '1'
                            },
                        },
                        float: {
                            '0%, 100%': {
                                transform: 'translateY(0)'
                            },
                            '50%': {
                                transform: 'translateY(-10px)'
                            },
                        },
                    },
                    aspectRatio: {
                        'portrait': '3/4',
                        'landscape': '4/3',
                        'ultrawide': '21/9',
                    },
                },
            },
            variants: {
                extend: {
                    opacity: ['disabled'],
                    cursor: ['disabled'],
                    backgroundColor: ['active', 'disabled'],
                    textColor: ['active', 'disabled'],
                },
            },
        }
    </script>

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
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <style>
            [x-cloak] {
                display: none !important;
            }

            html {
                scroll-behavior: smooth;
            }

            .active-link {
                @apply bg-blue-100 text-blue-800 border-r-4 border-blue-600;
            }

            .menu-link {
                @apply flex items-center px-6 py-3 text-gray-600 hover:bg-blue-50 transition-all duration-300;
            }
        </style>
    </head>

    <body class="bg-[#E5E7EB]">
        <div id="root" class="flex">
            <div x-data="{ isOpen: false }" class="relative">
                <!-- Mobile Menu Button -->
                <button type="button"
                    @click="isOpen = !isOpen"
                    class="lg:hidden fixed top-4 left-4 z-50 p-2 rounded-lg bg-white hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <svg x-show="!isOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg x-show="isOpen" x-cloak class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <!-- Sidebar -->
                <nav class="fixed h-screen w-64 bg-white hidden lg:block border-r border-gray-200"
                    x-show="isOpen || window.innerWidth >= 1024"
                    @click.away="if(window.innerWidth < 1024) isOpen = false"
                    @resize.window="if(window.innerWidth > 1024) isOpen = true"
                    x-cloak>
                    <div class="flex items-center justify-center h-16 border-b border-gray-200">
                        <h1 class="text-xl font-bold text-blue-600">MovieAdmin</h1>
                    </div>
                    <div class="py-4">
                        <a href="#dashboard" class="menu-link active-link">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                            Dashboard
                        </a>
                        <a href="#movies" class="menu-link">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z" />
                            </svg>
                            Movies
                        </a>
                        <a href="#theaters" class="menu-link">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                            Theaters
                        </a>
                        <a href="#bookings" class="menu-link">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 4v12l-4-2-4 2V4M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            Bookings
                        </a>
                        <a href="#customers" class="menu-link">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            Customers
                        </a>
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-gray-200">
                        <div class="flex items-center">
                            <img src="https://avatar.iran.liara.run/public" alt="Admin" class="w-8 h-8 rounded-full">
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-700">Admin User</p>
                                <p class="text-xs text-gray-500">admin@movies.com</p>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>

            <main class="flex-1 ml-0 lg:ml-64">
                <div class="sticky top-0 z-10 bg-white border-b border-gray-200">
                    <div class="px-4 sm:px-6 lg:px-8 py-4">
                        <div class="flex items-center justify-between">
                            <div class="flex-1">
                                <div class="relative">
                                    <input type="text" placeholder="Search..." class="w-full sm:w-64 pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center space-x-4">
                                <button class="p-2 rounded-lg hover:bg-gray-100">
                                    <svg class="h-6 w-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                    </svg>
                                </button>
                                <button class="p-2 rounded-lg hover:bg-gray-100">
                                    <img src="https://avatar.iran.liara.run/public" alt="Profile" class="h-8 w-8 rounded-full">
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <MountPoint>

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            // Active link handling
                            const links = document.querySelectorAll('.menu-link');
                            links.forEach(link => {
                                link.addEventListener('click', function() {
                                    links.forEach(l => l.classList.remove('active-link'));
                                    this.classList.add('active-link');
                                });
                            });

                            // Set active link based on current hash
                            function setActiveLink() {
                                const hash = window.location.hash || '#dashboard';
                                links.forEach(link => {
                                    if (link.getAttribute('href') === hash) {
                                        link.classList.add('active-link');
                                    } else {
                                        link.classList.remove('active-link');
                                    }
                                });
                            }

                            window.addEventListener('hashchange', setActiveLink);
                            setActiveLink();
                        });
                    </script>
                    <htmlCode>
                        <div id="dashboard" class="p-6 bg-gray-50">
                            <!-- Stats Grid -->
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                                <!-- Total Bookings -->
                                <div class="bg-white p-6 rounded-lg border border-gray-200">
                                    <div class="flex justify-between items-center">
                                        <div>
                                            <p class="text-sm text-gray-500">Total Bookings</p>
                                            <h3 class="text-2xl font-bold text-gray-900">1,284</h3>
                                        </div>
                                        <div class="p-3 bg-blue-50 rounded-full">
                                            <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 4v12l-4-2-4 2V4M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <p class="mt-2 text-sm text-green-600">+12.5% from last month</p>
                                </div>

                                <!-- Revenue -->
                                <div class="bg-white p-6 rounded-lg border border-gray-200">
                                    <div class="flex justify-between items-center">
                                        <div>
                                            <p class="text-sm text-gray-500">Total Revenue</p>
                                            <h3 class="text-2xl font-bold text-gray-900">$52,389</h3>
                                        </div>
                                        <div class="p-3 bg-blue-50 rounded-full">
                                            <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <p class="mt-2 text-sm text-green-600">+8.2% from last month</p>
                                </div>

                                <!-- Active Users -->
                                <div class="bg-white p-6 rounded-lg border border-gray-200">
                                    <div class="flex justify-between items-center">
                                        <div>
                                            <p class="text-sm text-gray-500">Active Users</p>
                                            <h3 class="text-2xl font-bold text-gray-900">3,427</h3>
                                        </div>
                                        <div class="p-3 bg-blue-50 rounded-full">
                                            <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <p class="mt-2 text-sm text-green-600">+22.4% from last month</p>
                                </div>

                                <!-- Upcoming Movies -->
                                <div class="bg-white p-6 rounded-lg border border-gray-200">
                                    <div class="flex justify-between items-center">
                                        <div>
                                            <p class="text-sm text-gray-500">Upcoming Movies</p>
                                            <h3 class="text-2xl font-bold text-gray-900">12</h3>
                                        </div>
                                        <div class="p-3 bg-blue-50 rounded-full">
                                            <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <p class="mt-2 text-sm text-blue-600">View schedule</p>
                                </div>
                            </div>

                            <!-- Charts Section -->
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                                <!-- Sales Trend -->
                                <div class="bg-white p-6 rounded-lg border border-gray-200">
                                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Ticket Sales Trend</h3>
                                    <div class="h-64 flex items-center justify-center">
                                        <p class="text-gray-500">Chart will be rendered here</p>
                                    </div>
                                </div>

                                <!-- Revenue Distribution -->
                                <div class="bg-white p-6 rounded-lg border border-gray-200">
                                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Revenue Distribution</h3>
                                    <div class="h-64 flex items-center justify-center">
                                        <p class="text-gray-500">Chart will be rendered here</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Recent Activity -->
                            <div class="bg-white rounded-lg border border-gray-200">
                                <div class="p-6">
                                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Recent Activity</h3>
                                    <div class="overflow-x-auto">
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <thead>
                                                <tr>
                                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Time</th>
                                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Movie</th>
                                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody class="divide-y divide-gray-200">
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2 minutes ago</td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Inception</td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">John Doe</td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$24.00</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <span class="px-2 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded-full">Completed</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">15 minutes ago</td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">The Dark Knight</td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Jane Smith</td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$32.00</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <span class="px-2 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded-full">Completed</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">1 hour ago</td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Interstellar</td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Mike Johnson</td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$28.00</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <span class="px-2 py-1 text-xs font-semibold text-yellow-800 bg-yellow-100 rounded-full">Pending</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </htmlCode>
                    <htmlCode>
                        <div id="movies" class="p-6 bg-gray-50">
                            <div class="flex justify-between items-center mb-6">
                                <h2 class="text-2xl font-bold text-gray-900">Movie Management</h2>
                                <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200 flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                    </svg>
                                    Add New Movie
                                </button>
                            </div>

                            <!-- Filter Section -->
                            <div class="bg-white p-4 rounded-lg border border-gray-200 mb-6">
                                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Search Movies</label>
                                        <input type="text" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Search by title...">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Genre</label>
                                        <select class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                            <option>All Genres</option>
                                            <option>Action</option>
                                            <option>Comedy</option>
                                            <option>Drama</option>
                                            <option>Horror</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                                        <select class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                            <option>All Status</option>
                                            <option>Now Showing</option>
                                            <option>Coming Soon</option>
                                            <option>Archived</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Sort By</label>
                                        <select class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                            <option>Release Date</option>
                                            <option>Title</option>
                                            <option>Revenue</option>
                                            <option>Popularity</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Movies Grid -->
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                                <!-- Movie Card -->
                                <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
                                    <div class="relative pb-[150%]">
                                        <img src="https://placehold.co/600x900?text=Movie+Poster" alt="Movie Poster" class="absolute inset-0 w-full h-full object-cover">
                                    </div>
                                    <div class="p-4">
                                        <div class="flex justify-between items-start mb-2">
                                            <h3 class="text-lg font-semibold text-gray-900">The Dark Knight</h3>
                                            <span class="px-2 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded-full">Now Showing</span>
                                        </div>
                                        <p class="text-sm text-gray-600 mb-4">Action, Crime, Drama • 2h 32m</p>
                                        <div class="flex justify-between items-center">
                                            <button class="text-blue-600 hover:text-blue-700 font-medium text-sm">Edit Details</button>
                                            <button class="text-blue-600 hover:text-blue-700 font-medium text-sm">Manage Shows</button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Movie Card -->
                                <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
                                    <div class="relative pb-[150%]">
                                        <img src="https://placehold.co/600x900?text=Movie+Poster" alt="Movie Poster" class="absolute inset-0 w-full h-full object-cover">
                                    </div>
                                    <div class="p-4">
                                        <div class="flex justify-between items-start mb-2">
                                            <h3 class="text-lg font-semibold text-gray-900">Inception</h3>
                                            <span class="px-2 py-1 text-xs font-semibold text-yellow-800 bg-yellow-100 rounded-full">Coming Soon</span>
                                        </div>
                                        <p class="text-sm text-gray-600 mb-4">Sci-Fi, Action • 2h 28m</p>
                                        <div class="flex justify-between items-center">
                                            <button class="text-blue-600 hover:text-blue-700 font-medium text-sm">Edit Details</button>
                                            <button class="text-blue-600 hover:text-blue-700 font-medium text-sm">Manage Shows</button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Movie Card -->
                                <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
                                    <div class="relative pb-[150%]">
                                        <img src="https://placehold.co/600x900?text=Movie+Poster" alt="Movie Poster" class="absolute inset-0 w-full h-full object-cover">
                                    </div>
                                    <div class="p-4">
                                        <div class="flex justify-between items-start mb-2">
                                            <h3 class="text-lg font-semibold text-gray-900">Interstellar</h3>
                                            <span class="px-2 py-1 text-xs font-semibold text-gray-800 bg-gray-100 rounded-full">Archived</span>
                                        </div>
                                        <p class="text-sm text-gray-600 mb-4">Sci-Fi, Drama • 2h 49m</p>
                                        <div class="flex justify-between items-center">
                                            <button class="text-blue-600 hover:text-blue-700 font-medium text-sm">Edit Details</button>
                                            <button class="text-blue-600 hover:text-blue-700 font-medium text-sm">Manage Shows</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Pagination -->
                            <div class="flex items-center justify-between mt-6">
                                <div class="flex-1 flex justify-between sm:hidden">
                                    <button class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">Previous</button>
                                    <button class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">Next</button>
                                </div>
                                <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                                    <div>
                                        <p class="text-sm text-gray-700">
                                            Showing <span class="font-medium">1</span> to <span class="font-medium">10</span> of <span class="font-medium">97</span> results
                                        </p>
                                    </div>
                                    <div>
                                        <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                                            <button class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                                <span class="sr-only">Previous</span>
                                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                            <button class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">1</button>
                                            <button class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">2</button>
                                            <button class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">3</button>
                                            <button class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                                <span class="sr-only">Next</span>
                                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </htmlCode>
                    <htmlCode>
                        <div id="theaters" class="p-6 bg-gray-50">
                            <div class="flex justify-between items-center mb-6">
                                <h2 class="text-2xl font-bold text-gray-900">Theater Management</h2>
                                <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200 flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                    </svg>
                                    Add New Theater
                                </button>
                            </div>

                            <!-- Theater List -->
                            <div class="grid gap-6">
                                <!-- Theater Card 1 -->
                                <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
                                    <div class="p-6">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                <h3 class="text-xl font-semibold text-gray-900">Cineplex Downtown</h3>
                                                <p class="text-sm text-gray-600 mt-1">123 Main Street, City Center</p>
                                            </div>
                                            <span class="px-3 py-1 text-sm font-semibold text-green-800 bg-green-100 rounded-full">Active</span>
                                        </div>

                                        <div class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-4">
                                            <div class="p-4 bg-gray-50 rounded-lg">
                                                <p class="text-sm text-gray-600">Total Screens</p>
                                                <p class="text-xl font-semibold text-gray-900">6</p>
                                            </div>
                                            <div class="p-4 bg-gray-50 rounded-lg">
                                                <p class="text-sm text-gray-600">Total Seats</p>
                                                <p class="text-xl font-semibold text-gray-900">1,200</p>
                                            </div>
                                            <div class="p-4 bg-gray-50 rounded-lg">
                                                <p class="text-sm text-gray-600">Today's Shows</p>
                                                <p class="text-xl font-semibold text-gray-900">24</p>
                                            </div>
                                        </div>

                                        <div class="mt-6 flex flex-wrap gap-2">
                                            <button class="inline-flex items-center px-3 py-2 border border-blue-600 text-sm font-medium rounded-md text-blue-600 hover:bg-blue-50">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                                Edit Details
                                            </button>
                                            <button class="inline-flex items-center px-3 py-2 border border-blue-600 text-sm font-medium rounded-md text-blue-600 hover:bg-blue-50">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                                </svg>
                                                Manage Screens
                                            </button>
                                            <button class="inline-flex items-center px-3 py-2 border border-blue-600 text-sm font-medium rounded-md text-blue-600 hover:bg-blue-50">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                                View Schedule
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Theater Card 2 -->
                                <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
                                    <div class="p-6">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                <h3 class="text-xl font-semibold text-gray-900">Multiplex West End</h3>
                                                <p class="text-sm text-gray-600 mt-1">456 West Avenue, Shopping District</p>
                                            </div>
                                            <span class="px-3 py-1 text-sm font-semibold text-green-800 bg-green-100 rounded-full">Active</span>
                                        </div>

                                        <div class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-4">
                                            <div class="p-4 bg-gray-50 rounded-lg">
                                                <p class="text-sm text-gray-600">Total Screens</p>
                                                <p class="text-xl font-semibold text-gray-900">8</p>
                                            </div>
                                            <div class="p-4 bg-gray-50 rounded-lg">
                                                <p class="text-sm text-gray-600">Total Seats</p>
                                                <p class="text-xl font-semibold text-gray-900">1,600</p>
                                            </div>
                                            <div class="p-4 bg-gray-50 rounded-lg">
                                                <p class="text-sm text-gray-600">Today's Shows</p>
                                                <p class="text-xl font-semibold text-gray-900">32</p>
                                            </div>
                                        </div>

                                        <div class="mt-6 flex flex-wrap gap-2">
                                            <button class="inline-flex items-center px-3 py-2 border border-blue-600 text-sm font-medium rounded-md text-blue-600 hover:bg-blue-50">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                                Edit Details
                                            </button>
                                            <button class="inline-flex items-center px-3 py-2 border border-blue-600 text-sm font-medium rounded-md text-blue-600 hover:bg-blue-50">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                                </svg>
                                                Manage Screens
                                            </button>
                                            <button class="inline-flex items-center px-3 py-2 border border-blue-600 text-sm font-medium rounded-md text-blue-600 hover:bg-blue-50">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                                View Schedule
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Pagination -->
                            <div class="mt-6 flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-gray-700">
                                        Showing <span class="font-medium">1</span> to <span class="font-medium">2</span> of <span class="font-medium">8</span> theaters
                                    </p>
                                </div>
                                <div class="flex gap-2">
                                    <button class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                        Previous
                                    </button>
                                    <button class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                        Next
                                    </button>
                                </div>
                            </div>
                        </div>
                    </htmlCode>
                    <htmlCode>
                        <div id="bookings" class="p-6 bg-gray-50">
                            <div class="flex justify-between items-center mb-6">
                                <h2 class="text-2xl font-bold text-gray-900">Booking Management</h2>
                                <div class="flex gap-2">
                                    <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200 flex items-center">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                        </svg>
                                        Export Data
                                    </button>
                                </div>
                            </div>

                            <!-- Filters -->
                            <div class="bg-white p-4 rounded-lg border border-gray-200 mb-6">
                                <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Date Range</label>
                                        <input type="date" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Movie</label>
                                        <select class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                            <option>All Movies</option>
                                            <option>Inception</option>
                                            <option>The Dark Knight</option>
                                            <option>Interstellar</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Theater</label>
                                        <select class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                            <option>All Theaters</option>
                                            <option>Cineplex Downtown</option>
                                            <option>Multiplex West End</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                                        <select class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                            <option>All Status</option>
                                            <option>Confirmed</option>
                                            <option>Pending</option>
                                            <option>Cancelled</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Search</label>
                                        <input type="text" placeholder="Search booking ID or customer..." class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    </div>
                                </div>
                            </div>

                            <!-- Bookings Table -->
                            <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
                                <div class="overflow-x-auto">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Booking ID</th>
                                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Movie</th>
                                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Theater</th>
                                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Show Time</th>
                                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#BK1234</td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <img class="h-8 w-8 rounded-full" src="https://avatar.iran.liara.run/public" alt="">
                                                        <div class="ml-4">
                                                            <div class="text-sm font-medium text-gray-900">John Doe</div>
                                                            <div class="text-sm text-gray-500">john@example.com</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Inception</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Cineplex Downtown</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Today, 7:00 PM</td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Confirmed</span>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$32.00</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <button class="text-blue-600 hover:text-blue-900 mr-4">View</button>
                                                    <button class="text-red-600 hover:text-red-900">Cancel</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#BK1235</td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <img class="h-8 w-8 rounded-full" src="https://avatar.iran.liara.run/public" alt="">
                                                        <div class="ml-4">
                                                            <div class="text-sm font-medium text-gray-900">Jane Smith</div>
                                                            <div class="text-sm text-gray-500">jane@example.com</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">The Dark Knight</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Multiplex West End</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Tomorrow, 4:30 PM</td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$28.00</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <button class="text-blue-600 hover:text-blue-900 mr-4">View</button>
                                                    <button class="text-red-600 hover:text-red-900">Cancel</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Pagination -->
                            <div class="mt-6 flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-gray-700">
                                        Showing <span class="font-medium">1</span> to <span class="font-medium">10</span> of <span class="font-medium">97</span> bookings
                                    </p>
                                </div>
                                <div class="flex gap-2">
                                    <button class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">Previous</button>
                                    <button class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">Next</button>
                                </div>
                            </div>
                        </div>
                    </htmlCode>
                    <htmlCode>
                        <div id="customers" class="p-6 bg-gray-50">
                            <div class="flex justify-between items-center mb-6">
                                <h2 class="text-2xl font-bold text-gray-900">Customer Management</h2>
                                <div class="flex gap-2">
                                    <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200 flex items-center">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                        </svg>
                                        Export Customer Data
                                    </button>
                                </div>
                            </div>

                            <!-- Filters -->
                            <div class="bg-white p-4 rounded-lg border border-gray-200 mb-6">
                                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Search Customers</label>
                                        <input type="text" placeholder="Name, email or phone..." class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Membership Status</label>
                                        <select class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                            <option>All Members</option>
                                            <option>Premium</option>
                                            <option>Regular</option>
                                            <option>New</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Join Date</label>
                                        <input type="date" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Sort By</label>
                                        <select class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                            <option>Most Recent</option>
                                            <option>Most Bookings</option>
                                            <option>Alphabetical</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Customer List -->
                            <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
                                <div class="overflow-x-auto">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contact</th>
                                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Bookings</th>
                                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Spent</th>
                                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Last Activity</th>
                                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200">
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <img class="h-10 w-10 rounded-full" src="https://avatar.iran.liara.run/public" alt="">
                                                        <div class="ml-4">
                                                            <div class="text-sm font-medium text-gray-900">John Doe</div>
                                                            <div class="text-xs text-gray-500">Member since Jan 2023</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900">john@example.com</div>
                                                    <div class="text-sm text-gray-500">+1 234 567 8900</div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">24</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$648.00</td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Premium</span>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2 hours ago</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <button class="text-blue-600 hover:text-blue-900 mr-3">View Profile</button>
                                                    <button class="text-blue-600 hover:text-blue-900">Support History</button>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <img class="h-10 w-10 rounded-full" src="https://avatar.iran.liara.run/public" alt="">
                                                        <div class="ml-4">
                                                            <div class="text-sm font-medium text-gray-900">Jane Smith</div>
                                                            <div class="text-xs text-gray-500">Member since Mar 2023</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900">jane@example.com</div>
                                                    <div class="text-sm text-gray-500">+1 234 567 8901</div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">12</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$324.00</td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">Regular</span>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">1 day ago</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <button class="text-blue-600 hover:text-blue-900 mr-3">View Profile</button>
                                                    <button class="text-blue-600 hover:text-blue-900">Support History</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Pagination -->
                            <div class="mt-6 flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-gray-700">
                                        Showing <span class="font-medium">1</span> to <span class="font-medium">10</span> of <span class="font-medium">245</span> customers
                                    </p>
                                </div>
                                <div class="flex gap-2">
                                    <button class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">Previous</button>
                                    <button class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">Next</button>
                                </div>
                            </div>
                        </div>
                    </htmlCode>
                    <htmlCode>
                        <div id="promotions" class="p-6 bg-gray-50">
                            <div class="flex justify-between items-center mb-6">
                                <h2 class="text-2xl font-bold text-gray-900">Promotions & Discounts</h2>
                                <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200 flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                    </svg>
                                    Create New Promotion
                                </button>
                            </div>

                            <!-- Active Promotions -->
                            <div class="bg-white rounded-lg border border-gray-200 mb-6">
                                <div class="p-4 border-b border-gray-200">
                                    <h3 class="text-lg font-semibold text-gray-900">Active Promotions</h3>
                                </div>
                                <div class="p-4">
                                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                        <!-- Promotion Card 1 -->
                                        <div class="border border-gray-200 rounded-lg p-4">
                                            <div class="flex justify-between items-start mb-3">
                                                <div>
                                                    <span class="inline-block px-2 py-1 text-xs font-semibold bg-green-100 text-green-800 rounded-full">Active</span>
                                                    <h4 class="text-lg font-semibold text-gray-900 mt-2">First Time Movie</h4>
                                                </div>
                                                <div class="text-2xl font-bold text-blue-600">20% OFF</div>
                                            </div>
                                            <p class="text-sm text-gray-600 mb-3">First-time customers get 20% off on their first booking</p>
                                            <div class="flex justify-between items-center text-sm text-gray-500">
                                                <div>Code: <span class="font-mono bg-gray-100 px-2 py-1 rounded">FIRST20</span></div>
                                                <div>Used: 234 times</div>
                                            </div>
                                            <div class="mt-4 flex items-center justify-between">
                                                <div class="text-sm text-gray-500">Expires: Dec 31, 2023</div>
                                                <div class="flex gap-2">
                                                    <button class="text-blue-600 hover:text-blue-800">Edit</button>
                                                    <button class="text-red-600 hover:text-red-800">Deactivate</button>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Promotion Card 2 -->
                                        <div class="border border-gray-200 rounded-lg p-4">
                                            <div class="flex justify-between items-start mb-3">
                                                <div>
                                                    <span class="inline-block px-2 py-1 text-xs font-semibold bg-green-100 text-green-800 rounded-full">Active</span>
                                                    <h4 class="text-lg font-semibold text-gray-900 mt-2">Weekend Special</h4>
                                                </div>
                                                <div class="text-2xl font-bold text-blue-600">15% OFF</div>
                                            </div>
                                            <p class="text-sm text-gray-600 mb-3">Special discount for weekend shows</p>
                                            <div class="flex justify-between items-center text-sm text-gray-500">
                                                <div>Code: <span class="font-mono bg-gray-100 px-2 py-1 rounded">WEEKEND15</span></div>
                                                <div>Used: 456 times</div>
                                            </div>
                                            <div class="mt-4 flex items-center justify-between">
                                                <div class="text-sm text-gray-500">Expires: Nov 30, 2023</div>
                                                <div class="flex gap-2">
                                                    <button class="text-blue-600 hover:text-blue-800">Edit</button>
                                                    <button class="text-red-600 hover:text-red-800">Deactivate</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Promotion Performance -->
                            <div class="bg-white rounded-lg border border-gray-200 mb-6">
                                <div class="p-4 border-b border-gray-200">
                                    <h3 class="text-lg font-semibold text-gray-900">Promotion Performance</h3>
                                </div>
                                <div class="p-4">
                                    <div class="overflow-x-auto">
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <thead class="bg-gray-50">
                                                <tr>
                                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Promotion Code</th>
                                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Uses</th>
                                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Revenue</th>
                                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Discount Given</th>
                                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Conversion Rate</th>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-200">
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">FIRST20</td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">234</td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$4,680.00</td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$1,170.00</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Active</span>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">68%</td>
                                                </tr>
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">WEEKEND15</td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">456</td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$9,120.00</td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$1,368.00</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Active</span>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">75%</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- Export Section -->
                            <div class="flex justify-end">
                                <button class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                    </svg>
                                    Export Performance Report
                                </button>
                            </div>
                        </div>
                    </htmlCode>
                    <htmlCode>
                        <div id="reports" class="p-6 bg-gray-50">
                            <div class="flex justify-between items-center mb-6">
                                <h2 class="text-2xl font-bold text-gray-900">Reports & Analytics</h2>
                                <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200 flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                    </svg>
                                    Export All Reports
                                </button>
                            </div>

                            <!-- Report Filters -->
                            <div class="bg-white p-4 rounded-lg border border-gray-200 mb-6">
                                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Date Range</label>
                                        <select class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                            <option>Last 7 days</option>
                                            <option>Last 30 days</option>
                                            <option>Last 90 days</option>
                                            <option>Custom Range</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Report Type</label>
                                        <select class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                            <option>All Reports</option>
                                            <option>Revenue Reports</option>
                                            <option>Booking Reports</option>
                                            <option>Customer Reports</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Theatre</label>
                                        <select class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                            <option>All Theatres</option>
                                            <option>Cineplex Downtown</option>
                                            <option>Multiplex West End</option>
                                        </select>
                                    </div>
                                    <div class="flex items-end">
                                        <button class="w-full bg-blue-50 text-blue-600 px-4 py-2 rounded-lg hover:bg-blue-100 transition-colors duration-200">
                                            Generate Report
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Revenue Overview -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                <div class="bg-white p-6 rounded-lg border border-gray-200">
                                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Revenue Overview</h3>
                                    <div class="h-64 flex items-center justify-center bg-gray-50 rounded-lg">
                                        <p class="text-gray-500">Revenue Chart will be rendered here</p>
                                    </div>
                                </div>
                                <div class="bg-white p-6 rounded-lg border border-gray-200">
                                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Booking Trends</h3>
                                    <div class="h-64 flex items-center justify-center bg-gray-50 rounded-lg">
                                        <p class="text-gray-500">Booking Trend Chart will be rendered here</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Key Metrics -->
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
                                <div class="bg-white p-6 rounded-lg border border-gray-200">
                                    <div class="flex items-center justify-between mb-2">
                                        <h4 class="text-sm font-medium text-gray-500">Total Revenue</h4>
                                        <span class="text-green-600 text-sm">+12.5%</span>
                                    </div>
                                    <p class="text-2xl font-bold text-gray-900">$124,563.00</p>
                                </div>
                                <div class="bg-white p-6 rounded-lg border border-gray-200">
                                    <div class="flex items-center justify-between mb-2">
                                        <h4 class="text-sm font-medium text-gray-500">Total Bookings</h4>
                                        <span class="text-green-600 text-sm">+8.2%</span>
                                    </div>
                                    <p class="text-2xl font-bold text-gray-900">3,456</p>
                                </div>
                                <div class="bg-white p-6 rounded-lg border border-gray-200">
                                    <div class="flex items-center justify-between mb-2">
                                        <h4 class="text-sm font-medium text-gray-500">Average Booking Value</h4>
                                        <span class="text-green-600 text-sm">+5.3%</span>
                                    </div>
                                    <p class="text-2xl font-bold text-gray-900">$36.04</p>
                                </div>
                                <div class="bg-white p-6 rounded-lg border border-gray-200">
                                    <div class="flex items-center justify-between mb-2">
                                        <h4 class="text-sm font-medium text-gray-500">New Customers</h4>
                                        <span class="text-green-600 text-sm">+15.8%</span>
                                    </div>
                                    <p class="text-2xl font-bold text-gray-900">245</p>
                                </div>
                            </div>

                            <!-- Recent Reports -->
                            <div class="bg-white rounded-lg border border-gray-200">
                                <div class="p-4 border-b border-gray-200">
                                    <h3 class="text-lg font-semibold text-gray-900">Recent Reports</h3>
                                </div>
                                <div class="overflow-x-auto">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Report Name</th>
                                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Generated On</th>
                                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Period</th>
                                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Generated By</th>
                                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Monthly Revenue Report</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Oct 31, 2023</td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">Revenue</span>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Oct 2023</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Admin User</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <button class="text-blue-600 hover:text-blue-900">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Customer Activity Report</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Oct 30, 2023</td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Customer</span>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Q3 2023</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Admin User</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <button class="text-blue-600 hover:text-blue-900">Download</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </htmlCode>
                    <htmlCode>
                        <div id="settings" class="p-6 bg-gray-50">
                            <div class="mb-6">
                                <h2 class="text-2xl font-bold text-gray-900">System Settings</h2>
                                <p class="mt-1 text-sm text-gray-500">Manage your application settings and configurations</p>
                            </div>

                            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                                <!-- Main Settings Column -->
                                <div class="lg:col-span-2 space-y-6">
                                    <!-- General Settings -->
                                    <div class="bg-white rounded-lg border border-gray-200">
                                        <div class="p-4 border-b border-gray-200">
                                            <h3 class="text-lg font-semibold text-gray-900">General Settings</h3>
                                        </div>
                                        <div class="p-6">
                                            <form class="space-y-6">
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-700">Company Name</label>
                                                    <input type="text" class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" value="MovieTime Cinemas">
                                                </div>
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-700">Contact Email</label>
                                                    <input type="email" class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" value="support@movietime.com">
                                                </div>
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-700">Contact Phone</label>
                                                    <input type="tel" class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" value="+1 234 567 8900">
                                                </div>
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-700">Address</label>
                                                    <textarea class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" rows="3">123 Movie Street, Cinema City, ST 12345</textarea>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <!-- Email Settings -->
                                    <div class="bg-white rounded-lg border border-gray-200">
                                        <div class="p-4 border-b border-gray-200">
                                            <h3 class="text-lg font-semibold text-gray-900">Email Settings</h3>
                                        </div>
                                        <div class="p-6">
                                            <form class="space-y-6">
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-700">SMTP Server</label>
                                                    <input type="text" class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" value="smtp.mailserver.com">
                                                </div>
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-700">SMTP Port</label>
                                                    <input type="text" class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" value="587">
                                                </div>
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-700">Email Username</label>
                                                    <input type="text" class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" value="notifications@movietime.com">
                                                </div>
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-700">Email Password</label>
                                                    <input type="password" class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" value="********">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Side Settings Column -->
                                <div class="space-y-6">
                                    <!-- Admin Users -->
                                    <div class="bg-white rounded-lg border border-gray-200">
                                        <div class="p-4 border-b border-gray-200">
                                            <h3 class="text-lg font-semibold text-gray-900">Admin Users</h3>
                                        </div>
                                        <div class="p-4">
                                            <div class="space-y-4">
                                                <div class="flex items-center justify-between">
                                                    <div class="flex items-center">
                                                        <img src="https://avatar.iran.liara.run/public" alt="Admin" class="w-8 h-8 rounded-full">
                                                        <div class="ml-3">
                                                            <p class="text-sm font-medium text-gray-900">John Admin</p>
                                                            <p class="text-xs text-gray-500">Super Admin</p>
                                                        </div>
                                                    </div>
                                                    <button class="text-blue-600 text-sm hover:text-blue-800">Edit</button>
                                                </div>
                                                <div class="flex items-center justify-between">
                                                    <div class="flex items-center">
                                                        <img src="https://avatar.iran.liara.run/public" alt="Admin" class="w-8 h-8 rounded-full">
                                                        <div class="ml-3">
                                                            <p class="text-sm font-medium text-gray-900">Jane Manager</p>
                                                            <p class="text-xs text-gray-500">Manager</p>
                                                        </div>
                                                    </div>
                                                    <button class="text-blue-600 text-sm hover:text-blue-800">Edit</button>
                                                </div>
                                            </div>
                                            <button class="mt-4 w-full bg-blue-50 text-blue-600 px-4 py-2 rounded-lg hover:bg-blue-100 transition-colors duration-200">
                                                Add New Admin User
                                            </button>
                                        </div>
                                    </div>

                                    <!-- System Maintenance -->
                                    <div class="bg-white rounded-lg border border-gray-200">
                                        <div class="p-4 border-b border-gray-200">
                                            <h3 class="text-lg font-semibold text-gray-900">System Maintenance</h3>
                                        </div>
                                        <div class="p-4 space-y-4">
                                            <button class="w-full bg-blue-50 text-blue-600 px-4 py-2 rounded-lg hover:bg-blue-100 transition-colors duration-200">
                                                Clear Cache
                                            </button>
                                            <button class="w-full bg-blue-50 text-blue-600 px-4 py-2 rounded-lg hover:bg-blue-100 transition-colors duration-200">
                                                Backup Database
                                            </button>
                                            <button class="w-full bg-red-50 text-red-600 px-4 py-2 rounded-lg hover:bg-red-100 transition-colors duration-200">
                                                System Maintenance Mode
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Save Changes -->
                            <div class="mt-6 flex justify-end">
                                <button class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200">
                                    Save Changes
                                </button>
                            </div>
                        </div>
                    </htmlCode>
                    <htmlCode>
                        <div id="root">
                            <section id="notifications" class="page-section min-h-screen bg-white p-6">
                                <div class="max-w-7xl mx-auto">
                                    <!-- Header -->
                                    <div class="mb-8">
                                        <h2 class="text-2xl font-bold text-gray-800">Notifications</h2>
                                        <p class="text-gray-600">Manage system notifications and alerts</p>
                                    </div>

                                    <!-- Notification Controls -->
                                    <div class="flex justify-between items-center mb-6">
                                        <div class="flex space-x-4">
                                            <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                                                Create New Notification
                                            </button>
                                            <button class="border border-gray-300 px-4 py-2 rounded-lg hover:bg-gray-50">
                                                Mark All as Read
                                            </button>
                                        </div>
                                        <div class="flex items-center space-x-4">
                                            <select class="border border-gray-300 rounded-lg px-4 py-2">
                                                <option>All Types</option>
                                                <option>System Alerts</option>
                                                <option>User Notifications</option>
                                                <option>Promotions</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Notifications List -->
                                    <div class="bg-white rounded-lg shadow">
                                        <!-- Notification Item -->
                                        <div class="border-b border-gray-200 p-4 hover:bg-gray-50">
                                            <div class="flex items-start justify-between">
                                                <div class="flex items-start space-x-4">
                                                    <div class="h-8 w-8 rounded-full bg-blue-100 flex items-center justify-center">
                                                        <svg class="h-4 w-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                                                        </svg>
                                                    </div>
                                                    <div class="flex-1">
                                                        <p class="font-semibold text-gray-900">New Movie Release Alert</p>
                                                        <p class="text-sm text-gray-600">Avatar 2 is now available for booking</p>
                                                        <p class="text-xs text-gray-500 mt-1">2 hours ago</p>
                                                    </div>
                                                </div>
                                                <button class="text-gray-400 hover:text-gray-500">
                                                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>

                                        <!-- Notification Item -->
                                        <div class="border-b border-gray-200 p-4 hover:bg-gray-50">
                                            <div class="flex items-start justify-between">
                                                <div class="flex items-start space-x-4">
                                                    <div class="h-8 w-8 rounded-full bg-green-100 flex items-center justify-center">
                                                        <svg class="h-4 w-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                        </svg>
                                                    </div>
                                                    <div class="flex-1">
                                                        <p class="font-semibold text-gray-900">Promotion Created Successfully</p>
                                                        <p class="text-sm text-gray-600">Summer Special 20% discount is now active</p>
                                                        <p class="text-xs text-gray-500 mt-1">5 hours ago</p>
                                                    </div>
                                                </div>
                                                <button class="text-gray-400 hover:text-gray-500">
                                                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>

                                        <!-- Notification Item -->
                                        <div class="border-b border-gray-200 p-4 hover:bg-gray-50">
                                            <div class="flex items-start justify-between">
                                                <div class="flex items-start space-x-4">
                                                    <div class="h-8 w-8 rounded-full bg-red-100 flex items-center justify-center">
                                                        <svg class="h-4 w-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                                        </svg>
                                                    </div>
                                                    <div class="flex-1">
                                                        <p class="font-semibold text-gray-900">System Alert</p>
                                                        <p class="text-sm text-gray-600">Database backup completed successfully</p>
                                                        <p class="text-xs text-gray-500 mt-1">1 day ago</p>
                                                    </div>
                                                </div>
                                                <button class="text-gray-400 hover:text-gray-500">
                                                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Pagination -->
                                    <div class="mt-6 flex items-center justify-between">
                                        <div class="text-sm text-gray-600">
                                            Showing 1 to 3 of 50 notifications
                                        </div>
                                        <div class="flex space-x-2">
                                            <button class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 disabled:opacity-50">
                                                Previous
                                            </button>
                                            <button class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">
                                                Next
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </htmlCode>