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

</body>

</html>
<htmlCode>
    <div id="root" class="bg-[#E5E7EB]">
        <div class="flex">
            <!-- Navigation Sidebar -->
            <nav class="fixed h-screen w-64 bg-white border-r border-neutral-200/20 transition-all duration-300 lg:block hidden" id="sidebar">
                <div class="flex flex-col h-full">
                    <!-- Logo -->
                    <div class="p-6 border-b border-neutral-200/20">
                        <span class="text-2xl font-bold text-neutral-800">CineAdmin</span>
                    </div>

                    <!-- Navigation Links -->
                    <div class="flex-1 py-6">
                        <a href="#dashboard" class="flex items-center px-6 py-3 text-neutral-600 hover:bg-neutral-100 transition-colors duration-200 active">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                            Dashboard
                        </a>
                        <a href="#movies" class="flex items-center px-6 py-3 text-neutral-600 hover:bg-neutral-100 transition-colors duration-200">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z"></path>
                            </svg>
                            Movies
                        </a>
                        <a href="#showtimes" class="flex items-center px-6 py-3 text-neutral-600 hover:bg-neutral-100 transition-colors duration-200">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Showtimes
                        </a>
                        <a href="#bookings" class="flex items-center px-6 py-3 text-neutral-600 hover:bg-neutral-100 transition-colors duration-200">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                            </svg>
                            Bookings
                        </a>
                        <a href="#concessions" class="flex items-center px-6 py-3 text-neutral-600 hover:bg-neutral-100 transition-colors duration-200">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                            </svg>
                            Concessions
                        </a>
                        <a href="#staff" class="flex items-center px-6 py-3 text-neutral-600 hover:bg-neutral-100 transition-colors duration-200">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                            Staff
                        </a>
                        <a href="#reports" class="flex items-center px-6 py-3 text-neutral-600 hover:bg-neutral-100 transition-colors duration-200">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Reports
                        </a>
                        <a href="#settings" class="flex items-center px-6 py-3 text-neutral-600 hover:bg-neutral-100 transition-colors duration-200">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            Settings
                        </a>
                    </div>

                    <!-- User Profile -->
                    <div class="p-6 border-t border-neutral-200/20">
                        <div class="flex items-center">
                            <img src="https://avatar.iran.liara.run/public" alt="User" class="w-8 h-8 rounded-full">
                            <div class="ml-3">
                                <p class="text-sm font-medium text-neutral-700">Admin User</p>
                                <p class="text-xs text-neutral-500">admin@cinema.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Mobile Menu Button -->
            <div x-data="{ isOpen: false }" class="lg:hidden fixed top-4 left-4 z-50">
                <button type="button"
                    @click="isOpen = !isOpen"
                    class="bg-white rounded-lg p-2 text-neutral-600 hover:text-neutral-900 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-neutral-500">
                    <svg x-show="!isOpen" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <svg x-show="isOpen" x-cloak class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>

                <!-- Mobile Menu Panel -->
                <div x-show="isOpen"
                    x-cloak
                    @click.away="isOpen = false"
                    @resize.window="if (window.innerWidth > 1024) isOpen = false"
                    class="fixed inset-0 bg-neutral-800/80 backdrop-blur-lg lg:hidden"
                    x-transition:enter="transition ease-out duration-100 transform"
                    x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75 transform"
                    x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-95">
                    <div class="fixed inset-y-0 left-0 w-full max-w-xs bg-white">
                        <!-- Mobile menu content (copy of desktop navigation) -->
                        <div class="h-full overflow-y-auto">
                            <!-- Copy the navigation content here -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content Area -->
            <main class="flex-1 ml-64 lg:ml-64 overflow-y-auto">
                <!-- Header -->
                <header class="sticky top-0 z-10 bg-white border-b border-neutral-200/20 h-16">
                    <div class="flex items-center justify-between px-6 h-full">
                        <h1 class="text-xl font-semibold text-neutral-800">Dashboard</h1>
                        <div class="flex items-center space-x-4">
                            <div class="relative">
                                <input type="search" placeholder="Search..." class="w-64 px-4 py-2 rounded-lg bg-neutral-100 border-none focus:ring-2 focus:ring-neutral-300">
                            </div>
                            <button class="p-2 text-neutral-600 hover:text-neutral-900">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </header>

                <!-- Mount Point for Sections -->
                <MountPoint>

                    <script>
                        // Active link handling
                        document.addEventListener('DOMContentLoaded', function() {
                            const links = document.querySelectorAll('nav a');

                            function setActiveLink() {
                                const hash = window.location.hash || '#dashboard';
                                links.forEach(link => {
                                    if (link.getAttribute('href') === hash) {
                                        link.classList.add('bg-neutral-100', 'text-neutral-900');
                                    } else {
                                        link.classList.remove('bg-neutral-100', 'text-neutral-900');
                                    }
                                });
                            }

                            window.addEventListener('hashchange', setActiveLink);
                            setActiveLink();
                        });

                        // Smooth scroll behavior
                        document.documentElement.style.scrollBehavior = 'smooth';
                    </script>
                    <htmlCode>
                        <div id="dashboard" class="p-6 space-y-6">
                            <!-- Stats Overview -->
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                                <div class="bg-white p-6 rounded-lg border border-neutral-200/30">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <p class="text-sm font-medium text-neutral-600">Today's Revenue</p>
                                            <h3 class="text-2xl font-bold text-neutral-900 mt-1">$12,426</h3>
                                        </div>
                                        <span class="text-green-500 text-sm">+15.3%</span>
                                    </div>
                                    <div class="mt-4">
                                        <div class="h-2 bg-neutral-100 rounded">
                                            <div class="h-2 bg-green-500 rounded" style="width: 75%"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-white p-6 rounded-lg border border-neutral-200/30">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <p class="text-sm font-medium text-neutral-600">Tickets Sold</p>
                                            <h3 class="text-2xl font-bold text-neutral-900 mt-1">1,247</h3>
                                        </div>
                                        <span class="text-green-500 text-sm">+8.4%</span>
                                    </div>
                                    <div class="mt-4">
                                        <div class="h-2 bg-neutral-100 rounded">
                                            <div class="h-2 bg-blue-500 rounded" style="width: 65%"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-white p-6 rounded-lg border border-neutral-200/30">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <p class="text-sm font-medium text-neutral-600">Concession Sales</p>
                                            <h3 class="text-2xl font-bold text-neutral-900 mt-1">$3,842</h3>
                                        </div>
                                        <span class="text-red-500 text-sm">-2.7%</span>
                                    </div>
                                    <div class="mt-4">
                                        <div class="h-2 bg-neutral-100 rounded">
                                            <div class="h-2 bg-yellow-500 rounded" style="width: 45%"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-white p-6 rounded-lg border border-neutral-200/30">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <p class="text-sm font-medium text-neutral-600">Active Shows</p>
                                            <h3 class="text-2xl font-bold text-neutral-900 mt-1">8</h3>
                                        </div>
                                        <span class="text-neutral-500 text-sm">No change</span>
                                    </div>
                                    <div class="mt-4">
                                        <div class="h-2 bg-neutral-100 rounded">
                                            <div class="h-2 bg-purple-500 rounded" style="width: 85%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Movies Performance -->
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                                <!-- Top Movies -->
                                <div class="bg-white p-6 rounded-lg border border-neutral-200/30">
                                    <h2 class="text-lg font-semibold text-neutral-900 mb-4">Top Performing Movies</h2>
                                    <div class="space-y-4">
                                        <div class="flex items-center">
                                            <img src="https://placehold.co/100x150" alt="Movie Poster" class="w-12 h-16 object-cover rounded">
                                            <div class="ml-4 flex-1">
                                                <div class="flex justify-between items-start">
                                                    <h3 class="font-medium text-neutral-900">The Dark Knight</h3>
                                                    <span class="text-green-500">$8,245</span>
                                                </div>
                                                <div class="mt-1">
                                                    <div class="h-2 bg-neutral-100 rounded">
                                                        <div class="h-2 bg-blue-500 rounded" style="width: 92%"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="flex items-center">
                                            <img src="https://placehold.co/100x150" alt="Movie Poster" class="w-12 h-16 object-cover rounded">
                                            <div class="ml-4 flex-1">
                                                <div class="flex justify-between items-start">
                                                    <h3 class="font-medium text-neutral-900">Inception</h3>
                                                    <span class="text-green-500">$6,128</span>
                                                </div>
                                                <div class="mt-1">
                                                    <div class="h-2 bg-neutral-100 rounded">
                                                        <div class="h-2 bg-blue-500 rounded" style="width: 78%"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="flex items-center">
                                            <img src="https://placehold.co/100x150" alt="Movie Poster" class="w-12 h-16 object-cover rounded">
                                            <div class="ml-4 flex-1">
                                                <div class="flex justify-between items-start">
                                                    <h3 class="font-medium text-neutral-900">Interstellar</h3>
                                                    <span class="text-green-500">$5,847</span>
                                                </div>
                                                <div class="mt-1">
                                                    <div class="h-2 bg-neutral-100 rounded">
                                                        <div class="h-2 bg-blue-500 rounded" style="width: 65%"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Recent Bookings -->
                                <div class="bg-white p-6 rounded-lg border border-neutral-200/30">
                                    <h2 class="text-lg font-semibold text-neutral-900 mb-4">Recent Bookings</h2>
                                    <div class="space-y-4">
                                        <div class="flex items-center justify-between p-4 bg-neutral-50 rounded-lg">
                                            <div class="flex items-center">
                                                <img src="https://avatar.iran.liara.run/public" alt="User" class="w-10 h-10 rounded-full">
                                                <div class="ml-3">
                                                    <p class="font-medium text-neutral-900">John Doe</p>
                                                    <p class="text-sm text-neutral-500">The Dark Knight - 7:30 PM</p>
                                                </div>
                                            </div>
                                            <span class="text-green-500">$24</span>
                                        </div>

                                        <div class="flex items-center justify-between p-4 bg-neutral-50 rounded-lg">
                                            <div class="flex items-center">
                                                <img src="https://avatar.iran.liara.run/public" alt="User" class="w-10 h-10 rounded-full">
                                                <div class="ml-3">
                                                    <p class="font-medium text-neutral-900">Jane Smith</p>
                                                    <p class="text-sm text-neutral-500">Inception - 9:00 PM</p>
                                                </div>
                                            </div>
                                            <span class="text-green-500">$36</span>
                                        </div>

                                        <div class="flex items-center justify-between p-4 bg-neutral-50 rounded-lg">
                                            <div class="flex items-center">
                                                <img src="https://avatar.iran.liara.run/public" alt="User" class="w-10 h-10 rounded-full">
                                                <div class="ml-3">
                                                    <p class="font-medium text-neutral-900">Mike Johnson</p>
                                                    <p class="text-sm text-neutral-500">Interstellar - 6:15 PM</p>
                                                </div>
                                            </div>
                                            <span class="text-green-500">$48</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Upcoming Shows -->
                            <div class="bg-white p-6 rounded-lg border border-neutral-200/30">
                                <h2 class="text-lg font-semibold text-neutral-900 mb-4">Upcoming Shows</h2>
                                <div class="overflow-x-auto">
                                    <table class="w-full">
                                        <thead>
                                            <tr class="text-left border-b border-neutral-200">
                                                <th class="pb-3 font-semibold text-neutral-600">Movie</th>
                                                <th class="pb-3 font-semibold text-neutral-600">Time</th>
                                                <th class="pb-3 font-semibold text-neutral-600">Theater</th>
                                                <th class="pb-3 font-semibold text-neutral-600">Available Seats</th>
                                                <th class="pb-3 font-semibold text-neutral-600">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="border-b border-neutral-200">
                                                <td class="py-4">The Dark Knight</td>
                                                <td class="py-4">7:30 PM</td>
                                                <td class="py-4">Theater 1</td>
                                                <td class="py-4">45</td>
                                                <td class="py-4"><span class="px-2 py-1 text-sm text-green-600 bg-green-100 rounded-full">On Time</span></td>
                                            </tr>
                                            <tr class="border-b border-neutral-200">
                                                <td class="py-4">Inception</td>
                                                <td class="py-4">9:00 PM</td>
                                                <td class="py-4">Theater 2</td>
                                                <td class="py-4">28</td>
                                                <td class="py-4"><span class="px-2 py-1 text-sm text-yellow-600 bg-yellow-100 rounded-full">Filling Fast</span></td>
                                            </tr>
                                            <tr>
                                                <td class="py-4">Interstellar</td>
                                                <td class="py-4">6:15 PM</td>
                                                <td class="py-4">Theater 3</td>
                                                <td class="py-4">12</td>
                                                <td class="py-4"><span class="px-2 py-1 text-sm text-red-600 bg-red-100 rounded-full">Almost Full</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </htmlCode>
                    <htmlCode>
                        <div id="movies" class="p-6 space-y-6">
                            <!-- Header Actions -->
                            <div class="flex justify-between items-center">
                                <h2 class="text-xl font-semibold text-neutral-900">Movie Management</h2>
                                <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    Add New Movie
                                </button>
                            </div>

                            <!-- Filters -->
                            <div class="bg-white p-4 rounded-lg border border-neutral-200/30 flex flex-wrap gap-4">
                                <div class="flex-1 min-w-[200px]">
                                    <label class="block text-sm font-medium text-neutral-600 mb-1">Search Movies</label>
                                    <input type="text" placeholder="Search by title, genre, or cast..." class="w-full px-3 py-2 border border-neutral-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                </div>
                                <div class="w-48">
                                    <label class="block text-sm font-medium text-neutral-600 mb-1">Genre</label>
                                    <select class="w-full px-3 py-2 border border-neutral-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                        <option value="">All Genres</option>
                                        <option>Action</option>
                                        <option>Drama</option>
                                        <option>Comedy</option>
                                        <option>Sci-Fi</option>
                                    </select>
                                </div>
                                <div class="w-48">
                                    <label class="block text-sm font-medium text-neutral-600 mb-1">Status</label>
                                    <select class="w-full px-3 py-2 border border-neutral-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                        <option value="">All Status</option>
                                        <option>Now Showing</option>
                                        <option>Coming Soon</option>
                                        <option>Ended</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Movies Grid -->
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                                <!-- Movie Card 1 -->
                                <div class="bg-white rounded-lg border border-neutral-200/30 overflow-hidden">
                                    <img src="https://placehold.co/300x450" alt="Movie Poster" class="w-full h-64 object-cover">
                                    <div class="p-4">
                                        <div class="flex justify-between items-start mb-2">
                                            <h3 class="font-semibold text-neutral-900">The Dark Knight</h3>
                                            <span class="px-2 py-1 text-xs bg-green-100 text-green-600 rounded-full">Now Showing</span>
                                        </div>
                                        <p class="text-sm text-neutral-600 mb-3">Action, Drama</p>
                                        <div class="flex items-center justify-between text-sm mb-3">
                                            <span class="text-neutral-600">Duration: 2h 32m</span>
                                            <span class="text-neutral-600">Rating: PG-13</span>
                                        </div>
                                        <div class="flex space-x-2">
                                            <button class="flex-1 px-3 py-2 text-sm bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition-colors">Edit</button>
                                            <button class="flex-1 px-3 py-2 text-sm bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition-colors">Remove</button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Movie Card 2 -->
                                <div class="bg-white rounded-lg border border-neutral-200/30 overflow-hidden">
                                    <img src="https://placehold.co/300x450" alt="Movie Poster" class="w-full h-64 object-cover">
                                    <div class="p-4">
                                        <div class="flex justify-between items-start mb-2">
                                            <h3 class="font-semibold text-neutral-900">Inception</h3>
                                            <span class="px-2 py-1 text-xs bg-yellow-100 text-yellow-600 rounded-full">Coming Soon</span>
                                        </div>
                                        <p class="text-sm text-neutral-600 mb-3">Sci-Fi, Action</p>
                                        <div class="flex items-center justify-between text-sm mb-3">
                                            <span class="text-neutral-600">Duration: 2h 28m</span>
                                            <span class="text-neutral-600">Rating: PG-13</span>
                                        </div>
                                        <div class="flex space-x-2">
                                            <button class="flex-1 px-3 py-2 text-sm bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition-colors">Edit</button>
                                            <button class="flex-1 px-3 py-2 text-sm bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition-colors">Remove</button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Movie Card 3 -->
                                <div class="bg-white rounded-lg border border-neutral-200/30 overflow-hidden">
                                    <img src="https://placehold.co/300x450" alt="Movie Poster" class="w-full h-64 object-cover">
                                    <div class="p-4">
                                        <div class="flex justify-between items-start mb-2">
                                            <h3 class="font-semibold text-neutral-900">Interstellar</h3>
                                            <span class="px-2 py-1 text-xs bg-green-100 text-green-600 rounded-full">Now Showing</span>
                                        </div>
                                        <p class="text-sm text-neutral-600 mb-3">Sci-Fi, Drama</p>
                                        <div class="flex items-center justify-between text-sm mb-3">
                                            <span class="text-neutral-600">Duration: 2h 49m</span>
                                            <span class="text-neutral-600">Rating: PG-13</span>
                                        </div>
                                        <div class="flex space-x-2">
                                            <button class="flex-1 px-3 py-2 text-sm bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition-colors">Edit</button>
                                            <button class="flex-1 px-3 py-2 text-sm bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition-colors">Remove</button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Movie Card 4 -->
                                <div class="bg-white rounded-lg border border-neutral-200/30 overflow-hidden">
                                    <img src="https://placehold.co/300x450" alt="Movie Poster" class="w-full h-64 object-cover">
                                    <div class="p-4">
                                        <div class="flex justify-between items-start mb-2">
                                            <h3 class="font-semibold text-neutral-900">The Matrix</h3>
                                            <span class="px-2 py-1 text-xs bg-neutral-100 text-neutral-600 rounded-full">Ended</span>
                                        </div>
                                        <p class="text-sm text-neutral-600 mb-3">Sci-Fi, Action</p>
                                        <div class="flex items-center justify-between text-sm mb-3">
                                            <span class="text-neutral-600">Duration: 2h 16m</span>
                                            <span class="text-neutral-600">Rating: R</span>
                                        </div>
                                        <div class="flex space-x-2">
                                            <button class="flex-1 px-3 py-2 text-sm bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition-colors">Edit</button>
                                            <button class="flex-1 px-3 py-2 text-sm bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition-colors">Remove</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Pagination -->
                            <div class="flex justify-between items-center bg-white p-4 rounded-lg border border-neutral-200/30">
                                <button class="px-4 py-2 text-neutral-600 hover:text-neutral-900 disabled:opacity-50 disabled:cursor-not-allowed">
                                    Previous
                                </button>
                                <div class="flex space-x-1">
                                    <button class="px-4 py-2 bg-blue-50 text-blue-600 rounded">1</button>
                                    <button class="px-4 py-2 text-neutral-600 hover:bg-neutral-50 rounded">2</button>
                                    <button class="px-4 py-2 text-neutral-600 hover:bg-neutral-50 rounded">3</button>
                                    <span class="px-4 py-2">...</span>
                                    <button class="px-4 py-2 text-neutral-600 hover:bg-neutral-50 rounded">8</button>
                                </div>
                                <button class="px-4 py-2 text-neutral-600 hover:text-neutral-900">
                                    Next
                                </button>
                            </div>
                        </div>
                    </htmlCode>
                    <htmlCode>
                        <div id="showtimes" class="p-6 space-y-6">
                            <!-- Header Actions -->
                            <div class="flex justify-between items-center">
                                <h2 class="text-xl font-semibold text-neutral-900">Showtime Management</h2>
                                <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    Add New Showtime
                                </button>
                            </div>

                            <!-- Filters and Date Selection -->
                            <div class="bg-white p-4 rounded-lg border border-neutral-200/30 space-y-4">
                                <div class="flex flex-wrap gap-4">
                                    <div class="flex-1 min-w-[200px]">
                                        <label class="block text-sm font-medium text-neutral-600 mb-1">Select Theater</label>
                                        <select class="w-full px-3 py-2 border border-neutral-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                            <option value="">All Theaters</option>
                                            <option>Theater 1</option>
                                            <option>Theater 2</option>
                                            <option>Theater 3</option>
                                            <option>Theater 4</option>
                                        </select>
                                    </div>
                                    <div class="flex-1 min-w-[200px]">
                                        <label class="block text-sm font-medium text-neutral-600 mb-1">Select Movie</label>
                                        <select class="w-full px-3 py-2 border border-neutral-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                            <option value="">All Movies</option>
                                            <option>The Dark Knight</option>
                                            <option>Inception</option>
                                            <option>Interstellar</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Date Navigation -->
                                <div class="flex items-center space-x-4 overflow-x-auto py-2">
                                    <button class="flex flex-col items-center min-w-[100px] p-3 rounded-lg bg-blue-50 text-blue-600">
                                        <span class="text-sm font-medium">Today</span>
                                        <span class="text-lg font-semibold">Mar 15</span>
                                    </button>
                                    <button class="flex flex-col items-center min-w-[100px] p-3 rounded-lg hover:bg-neutral-50">
                                        <span class="text-sm font-medium">Tomorrow</span>
                                        <span class="text-lg font-semibold">Mar 16</span>
                                    </button>
                                    <button class="flex flex-col items-center min-w-[100px] p-3 rounded-lg hover:bg-neutral-50">
                                        <span class="text-sm font-medium">Sunday</span>
                                        <span class="text-lg font-semibold">Mar 17</span>
                                    </button>
                                    <button class="flex flex-col items-center min-w-[100px] p-3 rounded-lg hover:bg-neutral-50">
                                        <span class="text-sm font-medium">Monday</span>
                                        <span class="text-lg font-semibold">Mar 18</span>
                                    </button>
                                    <button class="flex flex-col items-center min-w-[100px] p-3 rounded-lg hover:bg-neutral-50">
                                        <span class="text-sm font-medium">Tuesday</span>
                                        <span class="text-lg font-semibold">Mar 19</span>
                                    </button>
                                </div>
                            </div>

                            <!-- Showtimes Grid -->
                            <div class="space-y-6">
                                <!-- Theater 1 -->
                                <div class="bg-white rounded-lg border border-neutral-200/30">
                                    <div class="p-4 border-b border-neutral-200/30">
                                        <h3 class="font-semibold text-lg text-neutral-900">Theater 1 - IMAX</h3>
                                        <p class="text-sm text-neutral-600">Capacity: 250 seats</p>
                                    </div>
                                    <div class="p-4 space-y-4">
                                        <div class="flex items-start p-4 bg-neutral-50 rounded-lg">
                                            <img src="https://placehold.co/300x450" alt="Movie Poster" class="w-16 h-24 rounded object-cover">
                                            <div class="ml-4 flex-1">
                                                <div class="flex justify-between items-start">
                                                    <div>
                                                        <h4 class="font-semibold text-neutral-900">The Dark Knight</h4>
                                                        <p class="text-sm text-neutral-600">2h 32m • PG-13</p>
                                                    </div>
                                                    <div class="flex space-x-2">
                                                        <button class="px-3 py-1 text-sm bg-blue-50 text-blue-600 rounded hover:bg-blue-100">Edit</button>
                                                        <button class="px-3 py-1 text-sm bg-red-50 text-red-600 rounded hover:bg-red-100">Cancel</button>
                                                    </div>
                                                </div>
                                                <div class="mt-3 flex flex-wrap gap-2">
                                                    <span class="px-3 py-1 bg-green-100 text-green-600 rounded-full text-sm">10:00 AM (182/250)</span>
                                                    <span class="px-3 py-1 bg-yellow-100 text-yellow-600 rounded-full text-sm">2:30 PM (98/250)</span>
                                                    <span class="px-3 py-1 bg-red-100 text-red-600 rounded-full text-sm">7:00 PM (243/250)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Theater 2 -->
                                <div class="bg-white rounded-lg border border-neutral-200/30">
                                    <div class="p-4 border-b border-neutral-200/30">
                                        <h3 class="font-semibold text-lg text-neutral-900">Theater 2 - Dolby Atmos</h3>
                                        <p class="text-sm text-neutral-600">Capacity: 180 seats</p>
                                    </div>
                                    <div class="p-4 space-y-4">
                                        <div class="flex items-start p-4 bg-neutral-50 rounded-lg">
                                            <img src="https://placehold.co/300x450" alt="Movie Poster" class="w-16 h-24 rounded object-cover">
                                            <div class="ml-4 flex-1">
                                                <div class="flex justify-between items-start">
                                                    <div>
                                                        <h4 class="font-semibold text-neutral-900">Inception</h4>
                                                        <p class="text-sm text-neutral-600">2h 28m • PG-13</p>
                                                    </div>
                                                    <div class="flex space-x-2">
                                                        <button class="px-3 py-1 text-sm bg-blue-50 text-blue-600 rounded hover:bg-blue-100">Edit</button>
                                                        <button class="px-3 py-1 text-sm bg-red-50 text-red-600 rounded hover:bg-red-100">Cancel</button>
                                                    </div>
                                                </div>
                                                <div class="mt-3 flex flex-wrap gap-2">
                                                    <span class="px-3 py-1 bg-green-100 text-green-600 rounded-full text-sm">11:30 AM (85/180)</span>
                                                    <span class="px-3 py-1 bg-yellow-100 text-yellow-600 rounded-full text-sm">4:00 PM (120/180)</span>
                                                    <span class="px-3 py-1 bg-red-100 text-red-600 rounded-full text-sm">8:30 PM (175/180)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Theater 3 -->
                                <div class="bg-white rounded-lg border border-neutral-200/30">
                                    <div class="p-4 border-b border-neutral-200/30">
                                        <h3 class="font-semibold text-lg text-neutral-900">Theater 3 - Standard</h3>
                                        <p class="text-sm text-neutral-600">Capacity: 150 seats</p>
                                    </div>
                                    <div class="p-4 space-y-4">
                                        <div class="flex items-start p-4 bg-neutral-50 rounded-lg">
                                            <img src="https://placehold.co/300x450" alt="Movie Poster" class="w-16 h-24 rounded object-cover">
                                            <div class="ml-4 flex-1">
                                                <div class="flex justify-between items-start">
                                                    <div>
                                                        <h4 class="font-semibold text-neutral-900">Interstellar</h4>
                                                        <p class="text-sm text-neutral-600">2h 49m • PG-13</p>
                                                    </div>
                                                    <div class="flex space-x-2">
                                                        <button class="px-3 py-1 text-sm bg-blue-50 text-blue-600 rounded hover:bg-blue-100">Edit</button>
                                                        <button class="px-3 py-1 text-sm bg-red-50 text-red-600 rounded hover:bg-red-100">Cancel</button>
                                                    </div>
                                                </div>
                                                <div class="mt-3 flex flex-wrap gap-2">
                                                    <span class="px-3 py-1 bg-green-100 text-green-600 rounded-full text-sm">1:00 PM (65/150)</span>
                                                    <span class="px-3 py-1 bg-yellow-100 text-yellow-600 rounded-full text-sm">5:30 PM (110/150)</span>
                                                    <span class="px-3 py-1 bg-green-100 text-green-600 rounded-full text-sm">9:00 PM (45/150)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </htmlCode>
                    <htmlCode>
                        <div id="bookings" class="p-6 space-y-6">
                            <!-- Header Actions -->
                            <div class="flex justify-between items-center">
                                <h2 class="text-xl font-semibold text-neutral-900">Booking Management</h2>
                                <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    Create New Booking
                                </button>
                            </div>

                            <!-- Filters -->
                            <div class="bg-white p-4 rounded-lg border border-neutral-200/30 flex flex-wrap gap-4">
                                <div class="flex-1 min-w-[200px]">
                                    <label class="block text-sm font-medium text-neutral-600 mb-1">Search Bookings</label>
                                    <input type="text" placeholder="Search by booking ID, customer, or movie..." class="w-full px-3 py-2 border border-neutral-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                </div>
                                <div class="w-48">
                                    <label class="block text-sm font-medium text-neutral-600 mb-1">Status</label>
                                    <select class="w-full px-3 py-2 border border-neutral-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                        <option value="">All Status</option>
                                        <option>Confirmed</option>
                                        <option>Pending</option>
                                        <option>Cancelled</option>
                                        <option>Completed</option>
                                    </select>
                                </div>
                                <div class="w-48">
                                    <label class="block text-sm font-medium text-neutral-600 mb-1">Date Range</label>
                                    <select class="w-full px-3 py-2 border border-neutral-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                        <option>Today</option>
                                        <option>This Week</option>
                                        <option>This Month</option>
                                        <option>Custom Range</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Bookings Table -->
                            <div class="bg-white rounded-lg border border-neutral-200/30 overflow-hidden">
                                <div class="overflow-x-auto">
                                    <table class="w-full">
                                        <thead>
                                            <tr class="bg-neutral-50 border-b border-neutral-200/30">
                                                <th class="text-left p-4 font-semibold text-neutral-600">Booking ID</th>
                                                <th class="text-left p-4 font-semibold text-neutral-600">Customer</th>
                                                <th class="text-left p-4 font-semibold text-neutral-600">Movie</th>
                                                <th class="text-left p-4 font-semibold text-neutral-600">Show Time</th>
                                                <th class="text-left p-4 font-semibold text-neutral-600">Seats</th>
                                                <th class="text-left p-4 font-semibold text-neutral-600">Amount</th>
                                                <th class="text-left p-4 font-semibold text-neutral-600">Status</th>
                                                <th class="text-left p-4 font-semibold text-neutral-600">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Booking Row 1 -->
                                            <tr class="border-b border-neutral-200/30">
                                                <td class="p-4">
                                                    <span class="font-medium">#BK001</span>
                                                </td>
                                                <td class="p-4">
                                                    <div class="flex items-center">
                                                        <img src="https://avatar.iran.liara.run/public" alt="Customer" class="w-8 h-8 rounded-full">
                                                        <div class="ml-3">
                                                            <div class="font-medium text-neutral-900">John Doe</div>
                                                            <div class="text-sm text-neutral-500">john@example.com</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="p-4">The Dark Knight</td>
                                                <td class="p-4">
                                                    <div class="text-neutral-900">Today, 7:30 PM</div>
                                                    <div class="text-sm text-neutral-500">Theater 1</div>
                                                </td>
                                                <td class="p-4">
                                                    <div class="text-neutral-900">3 Seats</div>
                                                    <div class="text-sm text-neutral-500">A12, A13, A14</div>
                                                </td>
                                                <td class="p-4">$45.00</td>
                                                <td class="p-4">
                                                    <span class="px-2 py-1 text-sm bg-green-100 text-green-600 rounded-full">Confirmed</span>
                                                </td>
                                                <td class="p-4">
                                                    <div class="flex space-x-2">
                                                        <button class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg">
                                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                            </svg>
                                                        </button>
                                                        <button class="p-2 text-red-600 hover:bg-red-50 rounded-lg">
                                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>

                                            <!-- Booking Row 2 -->
                                            <tr class="border-b border-neutral-200/30">
                                                <td class="p-4">
                                                    <span class="font-medium">#BK002</span>
                                                </td>
                                                <td class="p-4">
                                                    <div class="flex items-center">
                                                        <img src="https://avatar.iran.liara.run/public" alt="Customer" class="w-8 h-8 rounded-full">
                                                        <div class="ml-3">
                                                            <div class="font-medium text-neutral-900">Jane Smith</div>
                                                            <div class="text-sm text-neutral-500">jane@example.com</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="p-4">Inception</td>
                                                <td class="p-4">
                                                    <div class="text-neutral-900">Today, 9:00 PM</div>
                                                    <div class="text-sm text-neutral-500">Theater 2</div>
                                                </td>
                                                <td class="p-4">
                                                    <div class="text-neutral-900">2 Seats</div>
                                                    <div class="text-sm text-neutral-500">B15, B16</div>
                                                </td>
                                                <td class="p-4">$30.00</td>
                                                <td class="p-4">
                                                    <span class="px-2 py-1 text-sm bg-yellow-100 text-yellow-600 rounded-full">Pending</span>
                                                </td>
                                                <td class="p-4">
                                                    <div class="flex space-x-2">
                                                        <button class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg">
                                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                            </svg>
                                                        </button>
                                                        <button class="p-2 text-red-600 hover:bg-red-50 rounded-lg">
                                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>

                                            <!-- Booking Row 3 -->
                                            <tr>
                                                <td class="p-4">
                                                    <span class="font-medium">#BK003</span>
                                                </td>
                                                <td class="p-4">
                                                    <div class="flex items-center">
                                                        <img src="https://avatar.iran.liara.run/public" alt="Customer" class="w-8 h-8 rounded-full">
                                                        <div class="ml-3">
                                                            <div class="font-medium text-neutral-900">Mike Johnson</div>
                                                            <div class="text-sm text-neutral-500">mike@example.com</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="p-4">Interstellar</td>
                                                <td class="p-4">
                                                    <div class="text-neutral-900">Tomorrow, 6:15 PM</div>
                                                    <div class="text-sm text-neutral-500">Theater 3</div>
                                                </td>
                                                <td class="p-4">
                                                    <div class="text-neutral-900">4 Seats</div>
                                                    <div class="text-sm text-neutral-500">C1, C2, C3, C4</div>
                                                </td>
                                                <td class="p-4">$60.00</td>
                                                <td class="p-4">
                                                    <span class="px-2 py-1 text-sm bg-red-100 text-red-600 rounded-full">Cancelled</span>
                                                </td>
                                                <td class="p-4">
                                                    <div class="flex space-x-2">
                                                        <button class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg">
                                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                            </svg>
                                                        </button>
                                                        <button class="p-2 text-red-600 hover:bg-red-50 rounded-lg">
                                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Pagination -->
                            <div class="flex justify-between items-center bg-white p-4 rounded-lg border border-neutral-200/30">
                                <button class="px-4 py-2 text-neutral-600 hover:text-neutral-900 disabled:opacity-50 disabled:cursor-not-allowed">
                                    Previous
                                </button>
                                <div class="flex space-x-1">
                                    <button class="px-4 py-2 bg-blue-50 text-blue-600 rounded">1</button>
                                    <button class="px-4 py-2 text-neutral-600 hover:bg-neutral-50 rounded">2</button>
                                    <button class="px-4 py-2 text-neutral-600 hover:bg-neutral-50 rounded">3</button>
                                    <span class="px-4 py-2">...</span>
                                    <button class="px-4 py-2 text-neutral-600 hover:bg-neutral-50 rounded">8</button>
                                </div>
                                <button class="px-4 py-2 text-neutral-600 hover:text-neutral-900">
                                    Next
                                </button>
                            </div>
                        </div>
                    </htmlCode>
                    <htmlCode>
                        <div id="concessions" class="p-6 space-y-6">
                            <!-- Header Actions -->
                            <div class="flex justify-between items-center">
                                <h2 class="text-xl font-semibold text-neutral-900">Concession Management</h2>
                                <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    Add New Item
                                </button>
                            </div>

                            <!-- Stats Overview -->
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                                <div class="bg-white p-6 rounded-lg border border-neutral-200/30">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <p class="text-sm font-medium text-neutral-600">Today's Sales</p>
                                            <h3 class="text-2xl font-bold text-neutral-900 mt-1">$2,846</h3>
                                        </div>
                                        <span class="text-green-500 text-sm">+12.5%</span>
                                    </div>
                                </div>

                                <div class="bg-white p-6 rounded-lg border border-neutral-200/30">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <p class="text-sm font-medium text-neutral-600">Items Sold</p>
                                            <h3 class="text-2xl font-bold text-neutral-900 mt-1">437</h3>
                                        </div>
                                        <span class="text-green-500 text-sm">+8.2%</span>
                                    </div>
                                </div>

                                <div class="bg-white p-6 rounded-lg border border-neutral-200/30">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <p class="text-sm font-medium text-neutral-600">Average Order</p>
                                            <h3 class="text-2xl font-bold text-neutral-900 mt-1">$16.50</h3>
                                        </div>
                                        <span class="text-red-500 text-sm">-2.1%</span>
                                    </div>
                                </div>

                                <div class="bg-white p-6 rounded-lg border border-neutral-200/30">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <p class="text-sm font-medium text-neutral-600">Low Stock Items</p>
                                            <h3 class="text-2xl font-bold text-neutral-900 mt-1">5</h3>
                                        </div>
                                        <span class="text-yellow-500 text-sm">Warning</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Inventory Grid -->
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                                <!-- Popcorn -->
                                <div class="bg-white rounded-lg border border-neutral-200/30 overflow-hidden">
                                    <div class="p-4 border-b border-neutral-200/30">
                                        <div class="flex justify-between items-start">
                                            <h3 class="font-semibold text-lg text-neutral-900">Popcorn</h3>
                                            <span class="px-2 py-1 text-xs bg-green-100 text-green-600 rounded-full">In Stock</span>
                                        </div>
                                    </div>
                                    <div class="p-4">
                                        <div class="space-y-3">
                                            <div class="flex justify-between text-sm">
                                                <span class="text-neutral-600">Small</span>
                                                <span class="font-medium text-neutral-900">$4.99</span>
                                            </div>
                                            <div class="flex justify-between text-sm">
                                                <span class="text-neutral-600">Medium</span>
                                                <span class="font-medium text-neutral-900">$5.99</span>
                                            </div>
                                            <div class="flex justify-between text-sm">
                                                <span class="text-neutral-600">Large</span>
                                                <span class="font-medium text-neutral-900">$6.99</span>
                                            </div>
                                        </div>
                                        <div class="mt-4">
                                            <div class="text-sm text-neutral-600">Stock Level</div>
                                            <div class="mt-1 h-2 bg-neutral-100 rounded">
                                                <div class="h-2 bg-green-500 rounded" style="width: 75%"></div>
                                            </div>
                                        </div>
                                        <div class="mt-4 flex space-x-2">
                                            <button class="flex-1 px-3 py-2 text-sm bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100">Edit</button>
                                            <button class="flex-1 px-3 py-2 text-sm bg-neutral-50 text-neutral-600 rounded-lg hover:bg-neutral-100">Restock</button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Soft Drinks -->
                                <div class="bg-white rounded-lg border border-neutral-200/30 overflow-hidden">
                                    <div class="p-4 border-b border-neutral-200/30">
                                        <div class="flex justify-between items-start">
                                            <h3 class="font-semibold text-lg text-neutral-900">Soft Drinks</h3>
                                            <span class="px-2 py-1 text-xs bg-yellow-100 text-yellow-600 rounded-full">Low Stock</span>
                                        </div>
                                    </div>
                                    <div class="p-4">
                                        <div class="space-y-3">
                                            <div class="flex justify-between text-sm">
                                                <span class="text-neutral-600">Small</span>
                                                <span class="font-medium text-neutral-900">$3.99</span>
                                            </div>
                                            <div class="flex justify-between text-sm">
                                                <span class="text-neutral-600">Medium</span>
                                                <span class="font-medium text-neutral-900">$4.99</span>
                                            </div>
                                            <div class="flex justify-between text-sm">
                                                <span class="text-neutral-600">Large</span>
                                                <span class="font-medium text-neutral-900">$5.99</span>
                                            </div>
                                        </div>
                                        <div class="mt-4">
                                            <div class="text-sm text-neutral-600">Stock Level</div>
                                            <div class="mt-1 h-2 bg-neutral-100 rounded">
                                                <div class="h-2 bg-yellow-500 rounded" style="width: 25%"></div>
                                            </div>
                                        </div>
                                        <div class="mt-4 flex space-x-2">
                                            <button class="flex-1 px-3 py-2 text-sm bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100">Edit</button>
                                            <button class="flex-1 px-3 py-2 text-sm bg-neutral-50 text-neutral-600 rounded-lg hover:bg-neutral-100">Restock</button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Nachos -->
                                <div class="bg-white rounded-lg border border-neutral-200/30 overflow-hidden">
                                    <div class="p-4 border-b border-neutral-200/30">
                                        <div class="flex justify-between items-start">
                                            <h3 class="font-semibold text-lg text-neutral-900">Nachos</h3>
                                            <span class="px-2 py-1 text-xs bg-green-100 text-green-600 rounded-full">In Stock</span>
                                        </div>
                                    </div>
                                    <div class="p-4">
                                        <div class="space-y-3">
                                            <div class="flex justify-between text-sm">
                                                <span class="text-neutral-600">Regular</span>
                                                <span class="font-medium text-neutral-900">$5.99</span>
                                            </div>
                                            <div class="flex justify-between text-sm">
                                                <span class="text-neutral-600">Large</span>
                                                <span class="font-medium text-neutral-900">$7.99</span>
                                            </div>
                                        </div>
                                        <div class="mt-4">
                                            <div class="text-sm text-neutral-600">Stock Level</div>
                                            <div class="mt-1 h-2 bg-neutral-100 rounded">
                                                <div class="h-2 bg-green-500 rounded" style="width: 60%"></div>
                                            </div>
                                        </div>
                                        <div class="mt-4 flex space-x-2">
                                            <button class="flex-1 px-3 py-2 text-sm bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100">Edit</button>
                                            <button class="flex-1 px-3 py-2 text-sm bg-neutral-50 text-neutral-600 rounded-lg hover:bg-neutral-100">Restock</button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Candy -->
                                <div class="bg-white rounded-lg border border-neutral-200/30 overflow-hidden">
                                    <div class="p-4 border-b border-neutral-200/30">
                                        <div class="flex justify-between items-start">
                                            <h3 class="font-semibold text-lg text-neutral-900">Candy</h3>
                                            <span class="px-2 py-1 text-xs bg-red-100 text-red-600 rounded-full">Out of Stock</span>
                                        </div>
                                    </div>
                                    <div class="p-4">
                                        <div class="space-y-3">
                                            <div class="flex justify-between text-sm">
                                                <span class="text-neutral-600">Small Box</span>
                                                <span class="font-medium text-neutral-900">$3.99</span>
                                            </div>
                                            <div class="flex justify-between text-sm">
                                                <span class="text-neutral-600">Large Box</span>
                                                <span class="font-medium text-neutral-900">$5.99</span>
                                            </div>
                                        </div>
                                        <div class="mt-4">
                                            <div class="text-sm text-neutral-600">Stock Level</div>
                                            <div class="mt-1 h-2 bg-neutral-100 rounded">
                                                <div class="h-2 bg-red-500 rounded" style="width: 5%"></div>
                                            </div>
                                        </div>
                                        <div class="mt-4 flex space-x-2">
                                            <button class="flex-1 px-3 py-2 text-sm bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100">Edit</button>
                                            <button class="flex-1 px-3 py-2 text-sm bg-red-50 text-red-600 rounded-lg hover:bg-red-100">Restock Now</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Recent Orders -->
                            <div class="bg-white rounded-lg border border-neutral-200/30 overflow-hidden">
                                <div class="p-4 border-b border-neutral-200/30">
                                    <h3 class="font-semibold text-lg text-neutral-900">Recent Orders</h3>
                                </div>
                                <div class="p-4">
                                    <table class="w-full">
                                        <thead>
                                            <tr class="text-left border-b border-neutral-200">
                                                <th class="pb-3 font-semibold text-neutral-600">Order ID</th>
                                                <th class="pb-3 font-semibold text-neutral-600">Items</th>
                                                <th class="pb-3 font-semibold text-neutral-600">Total</th>
                                                <th class="pb-3 font-semibold text-neutral-600">Time</th>
                                                <th class="pb-3 font-semibold text-neutral-600">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="border-b border-neutral-200">
                                                <td class="py-3">#CO001</td>
                                                <td class="py-3">2x Large Popcorn, 2x Medium Drinks</td>
                                                <td class="py-3">$21.96</td>
                                                <td class="py-3">5 mins ago</td>
                                                <td class="py-3"><span class="px-2 py-1 text-sm bg-green-100 text-green-600 rounded-full">Completed</span></td>
                                            </tr>
                                            <tr class="border-b border-neutral-200">
                                                <td class="py-3">#CO002</td>
                                                <td class="py-3">1x Nachos, 1x Large Drink</td>
                                                <td class="py-3">$13.98</td>
                                                <td class="py-3">12 mins ago</td>
                                                <td class="py-3"><span class="px-2 py-1 text-sm bg-yellow-100 text-yellow-600 rounded-full">Preparing</span></td>
                                            </tr>
                                            <tr>
                                                <td class="py-3">#CO003</td>
                                                <td class="py-3">3x Small Popcorn, 3x Candy</td>
                                                <td class="py-3">$26.94</td>
                                                <td class="py-3">18 mins ago</td>
                                                <td class="py-3"><span class="px-2 py-1 text-sm bg-green-100 text-green-600 rounded-full">Completed</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </htmlCode>
                    <htmlCode>
                        <div id="staff" class="p-6 space-y-6">
                            <!-- Header Actions -->
                            <div class="flex justify-between items-center">
                                <h2 class="text-xl font-semibold text-neutral-900">Staff Management</h2>
                                <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    Add New Staff
                                </button>
                            </div>

                            <!-- Stats Overview -->
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                                <div class="bg-white p-6 rounded-lg border border-neutral-200/30">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <p class="text-sm font-medium text-neutral-600">Total Staff</p>
                                            <h3 class="text-2xl font-bold text-neutral-900 mt-1">24</h3>
                                        </div>
                                        <span class="text-green-500 text-sm">Active</span>
                                    </div>
                                </div>

                                <div class="bg-white p-6 rounded-lg border border-neutral-200/30">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <p class="text-sm font-medium text-neutral-600">On Duty Today</p>
                                            <h3 class="text-2xl font-bold text-neutral-900 mt-1">12</h3>
                                        </div>
                                        <span class="text-blue-500 text-sm">Working</span>
                                    </div>
                                </div>

                                <div class="bg-white p-6 rounded-lg border border-neutral-200/30">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <p class="text-sm font-medium text-neutral-600">On Leave</p>
                                            <h3 class="text-2xl font-bold text-neutral-900 mt-1">3</h3>
                                        </div>
                                        <span class="text-yellow-500 text-sm">Away</span>
                                    </div>
                                </div>

                                <div class="bg-white p-6 rounded-lg border border-neutral-200/30">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <p class="text-sm font-medium text-neutral-600">New Requests</p>
                                            <h3 class="text-2xl font-bold text-neutral-900 mt-1">5</h3>
                                        </div>
                                        <span class="text-red-500 text-sm">Pending</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Staff List -->
                            <div class="bg-white rounded-lg border border-neutral-200/30 overflow-hidden">
                                <div class="p-4 border-b border-neutral-200/30 flex justify-between items-center">
                                    <h3 class="font-semibold text-lg text-neutral-900">Staff Directory</h3>
                                    <div class="flex space-x-2">
                                        <input type="text" placeholder="Search staff..." class="px-3 py-1 border border-neutral-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                        <select class="px-3 py-1 border border-neutral-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                            <option>All Departments</option>
                                            <option>Box Office</option>
                                            <option>Concessions</option>
                                            <option>Maintenance</option>
                                            <option>Management</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-6">
                                    <!-- Staff Card 1 -->
                                    <div class="flex items-start space-x-4 p-4 bg-neutral-50 rounded-lg">
                                        <img src="https://avatar.iran.liara.run/public" alt="Staff" class="w-16 h-16 rounded-full">
                                        <div class="flex-1">
                                            <h4 class="font-semibold text-neutral-900">John Doe</h4>
                                            <p class="text-sm text-neutral-600">Box Office Manager</p>
                                            <div class="mt-2 flex items-center space-x-2">
                                                <span class="px-2 py-1 text-xs bg-green-100 text-green-600 rounded-full">On Duty</span>
                                                <span class="text-sm text-neutral-500">ID: #ST001</span>
                                            </div>
                                            <div class="mt-3 flex space-x-2">
                                                <button class="px-3 py-1 text-sm text-blue-600 hover:bg-blue-50 rounded-lg">Edit</button>
                                                <button class="px-3 py-1 text-sm text-neutral-600 hover:bg-neutral-100 rounded-lg">Schedule</button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Staff Card 2 -->
                                    <div class="flex items-start space-x-4 p-4 bg-neutral-50 rounded-lg">
                                        <img src="https://avatar.iran.liara.run/public" alt="Staff" class="w-16 h-16 rounded-full">
                                        <div class="flex-1">
                                            <h4 class="font-semibold text-neutral-900">Jane Smith</h4>
                                            <p class="text-sm text-neutral-600">Concessions Lead</p>
                                            <div class="mt-2 flex items-center space-x-2">
                                                <span class="px-2 py-1 text-xs bg-yellow-100 text-yellow-600 rounded-full">On Break</span>
                                                <span class="text-sm text-neutral-500">ID: #ST002</span>
                                            </div>
                                            <div class="mt-3 flex space-x-2">
                                                <button class="px-3 py-1 text-sm text-blue-600 hover:bg-blue-50 rounded-lg">Edit</button>
                                                <button class="px-3 py-1 text-sm text-neutral-600 hover:bg-neutral-100 rounded-lg">Schedule</button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Staff Card 3 -->
                                    <div class="flex items-start space-x-4 p-4 bg-neutral-50 rounded-lg">
                                        <img src="https://avatar.iran.liara.run/public" alt="Staff" class="w-16 h-16 rounded-full">
                                        <div class="flex-1">
                                            <h4 class="font-semibold text-neutral-900">Mike Johnson</h4>
                                            <p class="text-sm text-neutral-600">Maintenance Supervisor</p>
                                            <div class="mt-2 flex items-center space-x-2">
                                                <span class="px-2 py-1 text-xs bg-red-100 text-red-600 rounded-full">Off Duty</span>
                                                <span class="text-sm text-neutral-500">ID: #ST003</span>
                                            </div>
                                            <div class="mt-3 flex space-x-2">
                                                <button class="px-3 py-1 text-sm text-blue-600 hover:bg-blue-50 rounded-lg">Edit</button>
                                                <button class="px-3 py-1 text-sm text-neutral-600 hover:bg-neutral-100 rounded-lg">Schedule</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Schedule Calendar -->
                            <div class="bg-white rounded-lg border border-neutral-200/30 overflow-hidden">
                                <div class="p-4 border-b border-neutral-200/30">
                                    <h3 class="font-semibold text-lg text-neutral-900">Weekly Schedule</h3>
                                </div>
                                <div class="p-4 overflow-x-auto">
                                    <table class="w-full min-w-[800px]">
                                        <thead>
                                            <tr class="text-left border-b border-neutral-200">
                                                <th class="pb-3 font-semibold text-neutral-600">Staff Member</th>
                                                <th class="pb-3 font-semibold text-neutral-600">Monday</th>
                                                <th class="pb-3 font-semibold text-neutral-600">Tuesday</th>
                                                <th class="pb-3 font-semibold text-neutral-600">Wednesday</th>
                                                <th class="pb-3 font-semibold text-neutral-600">Thursday</th>
                                                <th class="pb-3 font-semibold text-neutral-600">Friday</th>
                                                <th class="pb-3 font-semibold text-neutral-600">Saturday</th>
                                                <th class="pb-3 font-semibold text-neutral-600">Sunday</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="border-b border-neutral-200">
                                                <td class="py-3 font-medium">John Doe</td>
                                                <td class="py-3"><span class="text-green-600">9AM-5PM</span></td>
                                                <td class="py-3"><span class="text-green-600">9AM-5PM</span></td>
                                                <td class="py-3"><span class="text-red-600">Off</span></td>
                                                <td class="py-3"><span class="text-green-600">9AM-5PM</span></td>
                                                <td class="py-3"><span class="text-green-600">9AM-5PM</span></td>
                                                <td class="py-3"><span class="text-blue-600">2PM-10PM</span></td>
                                                <td class="py-3"><span class="text-red-600">Off</span></td>
                                            </tr>
                                            <tr class="border-b border-neutral-200">
                                                <td class="py-3 font-medium">Jane Smith</td>
                                                <td class="py-3"><span class="text-blue-600">2PM-10PM</span></td>
                                                <td class="py-3"><span class="text-blue-600">2PM-10PM</span></td>
                                                <td class="py-3"><span class="text-green-600">9AM-5PM</span></td>
                                                <td class="py-3"><span class="text-red-600">Off</span></td>
                                                <td class="py-3"><span class="text-green-600">9AM-5PM</span></td>
                                                <td class="py-3"><span class="text-red-600">Off</span></td>
                                                <td class="py-3"><span class="text-blue-600">2PM-10PM</span></td>
                                            </tr>
                                            <tr>
                                                <td class="py-3 font-medium">Mike Johnson</td>
                                                <td class="py-3"><span class="text-red-600">Off</span></td>
                                                <td class="py-3"><span class="text-green-600">9AM-5PM</span></td>
                                                <td class="py-3"><span class="text-blue-600">2PM-10PM</span></td>
                                                <td class="py-3"><span class="text-blue-600">2PM-10PM</span></td>
                                                <td class="py-3"><span class="text-red-600">Off</span></td>
                                                <td class="py-3"><span class="text-green-600">9AM-5PM</span></td>
                                                <td class="py-3"><span class="text-green-600">9AM-5PM</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </htmlCode>
                    <htmlCode>
                        <div id="reports" class="p-6 space-y-6">
                            <!-- Header Actions -->
                            <div class="flex justify-between items-center">
                                <h2 class="text-xl font-semibold text-neutral-900">Reports & Analytics</h2>
                                <div class="flex space-x-3">
                                    <select class="px-4 py-2 border border-neutral-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                        <option>Last 7 Days</option>
                                        <option>Last 30 Days</option>
                                        <option>Last 3 Months</option>
                                        <option>Last Year</option>
                                        <option>Custom Range</option>
                                    </select>
                                    <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors flex items-center">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                        </svg>
                                        Export Report
                                    </button>
                                </div>
                            </div>

                            <!-- Summary Cards -->
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                                <div class="bg-white p-6 rounded-lg border border-neutral-200/30">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <p class="text-sm font-medium text-neutral-600">Total Revenue</p>
                                            <h3 class="text-2xl font-bold text-neutral-900 mt-1">$45,289</h3>
                                            <p class="text-sm text-green-500 mt-1">+12.5% vs last period</p>
                                        </div>
                                        <span class="text-blue-500 bg-blue-50 p-2 rounded-lg">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </span>
                                    </div>
                                </div>

                                <div class="bg-white p-6 rounded-lg border border-neutral-200/30">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <p class="text-sm font-medium text-neutral-600">Total Tickets</p>
                                            <h3 class="text-2xl font-bold text-neutral-900 mt-1">3,847</h3>
                                            <p class="text-sm text-green-500 mt-1">+8.2% vs last period</p>
                                        </div>
                                        <span class="text-purple-500 bg-purple-50 p-2 rounded-lg">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path>
                                            </svg>
                                        </span>
                                    </div>
                                </div>

                                <div class="bg-white p-6 rounded-lg border border-neutral-200/30">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <p class="text-sm font-medium text-neutral-600">Concessions</p>
                                            <h3 class="text-2xl font-bold text-neutral-900 mt-1">$12,428</h3>
                                            <p class="text-sm text-red-500 mt-1">-2.4% vs last period</p>
                                        </div>
                                        <span class="text-yellow-500 bg-yellow-50 p-2 rounded-lg">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"></path>
                                            </svg>
                                        </span>
                                    </div>
                                </div>

                                <div class="bg-white p-6 rounded-lg border border-neutral-200/30">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <p class="text-sm font-medium text-neutral-600">Occupancy Rate</p>
                                            <h3 class="text-2xl font-bold text-neutral-900 mt-1">76.3%</h3>
                                            <p class="text-sm text-green-500 mt-1">+5.1% vs last period</p>
                                        </div>
                                        <span class="text-green-500 bg-green-50 p-2 rounded-lg">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!-- Revenue Chart -->
                            <div class="bg-white p-6 rounded-lg border border-neutral-200/30">
                                <div class="flex justify-between items-center mb-6">
                                    <h3 class="font-semibold text-lg text-neutral-900">Revenue Breakdown</h3>
                                    <div class="flex items-center space-x-4">
                                        <span class="flex items-center">
                                            <span class="w-3 h-3 bg-blue-500 rounded-full mr-2"></span>
                                            <span class="text-sm text-neutral-600">Tickets</span>
                                        </span>
                                        <span class="flex items-center">
                                            <span class="w-3 h-3 bg-green-500 rounded-full mr-2"></span>
                                            <span class="text-sm text-neutral-600">Concessions</span>
                                        </span>
                                    </div>
                                </div>
                                <div class="h-80 bg-neutral-50 rounded-lg border border-neutral-200/30 flex items-center justify-center">
                                    <p class="text-neutral-600">Revenue Chart Placeholder</p>
                                </div>
                            </div>

                            <!-- Top Performing Movies -->
                            <div class="bg-white rounded-lg border border-neutral-200/30">
                                <div class="p-4 border-b border-neutral-200/30">
                                    <h3 class="font-semibold text-lg text-neutral-900">Top Performing Movies</h3>
                                </div>
                                <div class="p-4">
                                    <div class="space-y-4">
                                        <div class="flex items-center">
                                            <img src="https://placehold.co/300x450" alt="Movie Poster" class="w-12 h-16 rounded object-cover">
                                            <div class="ml-4 flex-1">
                                                <div class="flex justify-between items-center">
                                                    <div>
                                                        <h4 class="font-medium text-neutral-900">The Dark Knight</h4>
                                                        <p class="text-sm text-neutral-600">Total Revenue: $15,847</p>
                                                    </div>
                                                    <div class="text-right">
                                                        <p class="font-medium text-green-600">+24.5%</p>
                                                        <p class="text-sm text-neutral-600">vs Avg.</p>
                                                    </div>
                                                </div>
                                                <div class="mt-2 h-2 bg-neutral-100 rounded">
                                                    <div class="h-2 bg-blue-500 rounded" style="width: 85%"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="flex items-center">
                                            <img src="https://placehold.co/300x450" alt="Movie Poster" class="w-12 h-16 rounded object-cover">
                                            <div class="ml-4 flex-1">
                                                <div class="flex justify-between items-center">
                                                    <div>
                                                        <h4 class="font-medium text-neutral-900">Inception</h4>
                                                        <p class="text-sm text-neutral-600">Total Revenue: $12,932</p>
                                                    </div>
                                                    <div class="text-right">
                                                        <p class="font-medium text-green-600">+18.2%</p>
                                                        <p class="text-sm text-neutral-600">vs Avg.</p>
                                                    </div>
                                                </div>
                                                <div class="mt-2 h-2 bg-neutral-100 rounded">
                                                    <div class="h-2 bg-blue-500 rounded" style="width: 72%"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="flex items-center">
                                            <img src="https://placehold.co/300x450" alt="Movie Poster" class="w-12 h-16 rounded object-cover">
                                            <div class="ml-4 flex-1">
                                                <div class="flex justify-between items-center">
                                                    <div>
                                                        <h4 class="font-medium text-neutral-900">Interstellar</h4>
                                                        <p class="text-sm text-neutral-600">Total Revenue: $10,456</p>
                                                    </div>
                                                    <div class="text-right">
                                                        <p class="font-medium text-green-600">+12.8%</p>
                                                        <p class="text-sm text-neutral-600">vs Avg.</p>
                                                    </div>
                                                </div>
                                                <div class="mt-2 h-2 bg-neutral-100 rounded">
                                                    <div class="h-2 bg-blue-500 rounded" style="width: 65%"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Recent Transactions -->
                            <div class="bg-white rounded-lg border border-neutral-200/30">
                                <div class="p-4 border-b border-neutral-200/30 flex justify-between items-center">
                                    <h3 class="font-semibold text-lg text-neutral-900">Recent Transactions</h3>
                                    <button class="text-blue-600 hover:text-blue-700">View All</button>
                                </div>
                                <div class="p-4">
                                    <table class="w-full">
                                        <thead>
                                            <tr class="text-left border-b border-neutral-200">
                                                <th class="pb-3 font-semibold text-neutral-600">Transaction ID</th>
                                                <th class="pb-3 font-semibold text-neutral-600">Type</th>
                                                <th class="pb-3 font-semibold text-neutral-600">Amount</th>
                                                <th class="pb-3 font-semibold text-neutral-600">Date</th>
                                                <th class="pb-3 font-semibold text-neutral-600">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="border-b border-neutral-200">
                                                <td class="py-3">#TX001</td>
                                                <td class="py-3">Ticket Sale</td>
                                                <td class="py-3 font-medium">$24.00</td>
                                                <td class="py-3">Mar 15, 2024</td>
                                                <td class="py-3"><span class="px-2 py-1 text-sm bg-green-100 text-green-600 rounded-full">Completed</span></td>
                                            </tr>
                                            <tr class="border-b border-neutral-200">
                                                <td class="py-3">#TX002</td>
                                                <td class="py-3">Concession</td>
                                                <td class="py-3 font-medium">$15.50</td>
                                                <td class="py-3">Mar 15, 2024</td>
                                                <td class="py-3"><span class="px-2 py-1 text-sm bg-green-100 text-green-600 rounded-full">Completed</span></td>
                                            </tr>
                                            <tr>
                                                <td class="py-3">#TX003</td>
                                                <td class="py-3">Ticket Sale</td>
                                                <td class="py-3 font-medium">$36.00</td>
                                                <td class="py-3">Mar 14, 2024</td>
                                                <td class="py-3"><span class="px-2 py-1 text-sm bg-yellow-100 text-yellow-600 rounded-full">Pending</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </htmlCode>
                    <htmlCode>
                        <div id="root">
                            <section id="settings" class="min-h-screen bg-neutral-900 text-white p-6">
                                <div class="max-w-7xl mx-auto">
                                    <h2 class="text-2xl font-bold mb-8">Settings</h2>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                        <!-- Profile Settings -->
                                        <div class="bg-neutral-800 rounded-lg p-6 border border-neutral-700/30">
                                            <h3 class="text-xl font-semibold mb-6">Profile Settings</h3>
                                            <div class="space-y-4">
                                                <div>
                                                    <label class="block text-sm font-medium text-neutral-300 mb-2">Profile Picture</label>
                                                    <div class="flex items-center space-x-4">
                                                        <div class="w-16 h-16 rounded-full overflow-hidden bg-neutral-700">
                                                            <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=admin" alt="Profile" class="w-full h-full object-cover" />
                                                        </div>
                                                        <button class="px-4 py-2 bg-neutral-700 hover:bg-neutral-600 rounded-md transition-colors duration-200">
                                                            Change Photo
                                                        </button>
                                                    </div>
                                                </div>

                                                <div>
                                                    <label class="block text-sm font-medium text-neutral-300 mb-2">Name</label>
                                                    <input type="text" class="w-full bg-neutral-700 border border-neutral-600 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter your name" />
                                                </div>

                                                <div>
                                                    <label class="block text-sm font-medium text-neutral-300 mb-2">Email</label>
                                                    <input type="email" class="w-full bg-neutral-700 border border-neutral-600 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter your email" />
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Security Settings -->
                                        <div class="bg-neutral-800 rounded-lg p-6 border border-neutral-700/30">
                                            <h3 class="text-xl font-semibold mb-6">Security Settings</h3>
                                            <div class="space-y-4">
                                                <div>
                                                    <label class="block text-sm font-medium text-neutral-300 mb-2">Current Password</label>
                                                    <input type="password" class="w-full bg-neutral-700 border border-neutral-600 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter current password" />
                                                </div>

                                                <div>
                                                    <label class="block text-sm font-medium text-neutral-300 mb-2">New Password</label>
                                                    <input type="password" class="w-full bg-neutral-700 border border-neutral-600 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter new password" />
                                                </div>

                                                <div>
                                                    <label class="block text-sm font-medium text-neutral-300 mb-2">Confirm New Password</label>
                                                    <input type="password" class="w-full bg-neutral-700 border border-neutral-600 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Confirm new password" />
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Notification Settings -->
                                        <div class="bg-neutral-800 rounded-lg p-6 border border-neutral-700/30">
                                            <h3 class="text-xl font-semibold mb-6">Notification Settings</h3>
                                            <div class="space-y-4">
                                                <div class="flex items-center justify-between">
                                                    <span class="text-sm font-medium text-neutral-300">Email Notifications</span>
                                                    <label class="relative inline-flex items-center cursor-pointer">
                                                        <input type="checkbox" class="sr-only peer">
                                                        <div class="w-11 h-6 bg-neutral-700 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-800 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                                    </label>
                                                </div>

                                                <div class="flex items-center justify-between">
                                                    <span class="text-sm font-medium text-neutral-300">Push Notifications</span>
                                                    <label class="relative inline-flex items-center cursor-pointer">
                                                        <input type="checkbox" class="sr-only peer">
                                                        <div class="w-11 h-6 bg-neutral-700 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-800 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                                    </label>
                                                </div>

                                                <div class="flex items-center justify-between">
                                                    <span class="text-sm font-medium text-neutral-300">Marketing Updates</span>
                                                    <label class="relative inline-flex items-center cursor-pointer">
                                                        <input type="checkbox" class="sr-only peer">
                                                        <div class="w-11 h-6 bg-neutral-700 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-800 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Theme Settings -->
                                        <div class="bg-neutral-800 rounded-lg p-6 border border-neutral-700/30">
                                            <h3 class="text-xl font-semibold mb-6">Theme Settings</h3>
                                            <div class="space-y-4">
                                                <div class="flex items-center justify-between">
                                                    <span class="text-sm font-medium text-neutral-300">Dark Mode</span>
                                                    <label class="relative inline-flex items-center cursor-pointer">
                                                        <input type="checkbox" class="sr-only peer" checked>
                                                        <div class="w-11 h-6 bg-neutral-700 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-800 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                                    </label>
                                                </div>

                                                <div>
                                                    <label class="block text-sm font-medium text-neutral-300 mb-2">Font Size</label>
                                                    <select class="w-full bg-neutral-700 border border-neutral-600 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                                        <option>Small</option>
                                                        <option selected>Medium</option>
                                                        <option>Large</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-8 flex justify-end">
                                        <button class="px-6 py-2 bg-blue-600 hover:bg-blue-700 rounded-md transition-colors duration-200">
                                            Save Changes
                                        </button>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </htmlCode>