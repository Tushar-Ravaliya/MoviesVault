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
    <!-- Root container -->
    <div id="root" class="font-sans bg-neutral-900 text-white">
        <!-- Main container with flexbox -->
        <div class="flex">
            <!-- Sidebar Navigation -->
            <div x-data="{ isOpen: false }" class="relative">
                <!-- Desktop Sidebar -->
                <nav class="hidden lg:flex flex-col w-64 h-screen sticky top-0 bg-neutral-800 border-r border-neutral-700">
                    <!-- Logo Section -->
                    <div class="p-4 border-b border-neutral-700">
                        <span class="text-2xl font-bold">CineAdmin</span>
                    </div>

                    <!-- Navigation Links -->
                    <div class="flex-1 py-4">
                        <a href="#dashboard" class="flex items-center px-6 py-3 text-neutral-300 hover:bg-neutral-700 hover:text-white transition-all duration-300 active">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                            Dashboard
                        </a>
                        <a href="#movies" class="flex items-center px-6 py-3 text-neutral-300 hover:bg-neutral-700 hover:text-white transition-all duration-300">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z"></path>
                            </svg>
                            Movies
                        </a>
                        <a href="#screens" class="flex items-center px-6 py-3 text-neutral-300 hover:bg-neutral-700 hover:text-white transition-all duration-300">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            Screens
                        </a>
                        <a href="#shows" class="flex items-center px-6 py-3 text-neutral-300 hover:bg-neutral-700 hover:text-white transition-all duration-300">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Shows
                        </a>
                        <a href="#bookings" class="flex items-center px-6 py-3 text-neutral-300 hover:bg-neutral-700 hover:text-white transition-all duration-300">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 4v12l-4-2-4 2V4M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            Bookings
                        </a>
                    </div>

                    <!-- User Profile Section -->
                    <div class="p-4 border-t border-neutral-700">
                        <div class="flex items-center">
                            <img src="https://avatar.iran.liara.run/public" alt="User" class="w-8 h-8 rounded-full">
                            <div class="ml-3">
                                <p class="text-sm font-medium">Admin User</p>
                                <p class="text-xs text-neutral-400">admin@cinema.com</p>
                            </div>
                        </div>
                    </div>
                </nav>

                <!-- Mobile Menu Button -->
                <button type="button"
                    class="lg:hidden fixed top-4 left-4 z-50 rounded-md p-2 bg-neutral-800 text-neutral-400 hover:text-white hover:bg-neutral-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                    @click="isOpen = !isOpen"
                    aria-controls="mobile-menu"
                    :aria-expanded="isOpen">
                    <!-- Open Menu Icon -->
                    <svg x-show="!isOpen" class="h-6 w-6" x-cloak fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <!-- Close Menu Icon -->
                    <svg x-show="isOpen" class="h-6 w-6" x-cloak fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <!-- Mobile Menu -->
                <div x-show="isOpen"
                    x-cloak
                    class="lg:hidden fixed inset-0 z-40 bg-neutral-800/80 backdrop-blur-lg"
                    @click.away="isOpen = false"
                    @resize.window="if (window.innerWidth > 1024) isOpen = false"
                    x-transition:enter="transition ease-out duration-100 transform"
                    x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75 transform"
                    x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-95">
                    <div class="fixed inset-y-0 left-0 w-64 bg-neutral-800">
                        <!-- Mobile menu content (mirror of desktop navigation) -->
                        <div class="p-4 border-b border-neutral-700">
                            <span class="text-2xl font-bold">CineAdmin</span>
                        </div>
                        <!-- Same navigation links as desktop -->
                        <div class="py-4">
                            <!-- Mirror the desktop navigation links here -->
                            <a href="#dashboard" class="flex items-center px-6 py-3 text-neutral-300 hover:bg-neutral-700 hover:text-white transition-all duration-300">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                </svg>
                                Dashboard
                            </a>
                            <!-- Repeat other navigation items -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content Area -->
            <main class="flex-1 h-screen overflow-y-auto bg-neutral-900">
                <!-- Header -->
                <header class="sticky top-0 z-30 bg-neutral-800 border-b border-neutral-700">
                    <div class="px-6 py-4 flex items-center justify-between">
                        <h1 class="text-xl font-semibold">Dashboard</h1>
                        <div class="flex items-center space-x-4">
                            <button class="p-2 text-neutral-400 hover:text-white">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                                </svg>
                            </button>
                            <button class="p-2 text-neutral-400 hover:text-white">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </header>

                <!-- Mount Point for Sections -->
                <MountPoint>

</htmlCode>
<htmlCode>
    <section id="Authentication" class="min-h-screen bg-neutral-900 flex items-center justify-center p-4">
        <div x-data="{ isLogin: true }" class="w-full max-w-md">
            <!-- Auth Card -->
            <div class="bg-neutral-800 border border-neutral-700 rounded-lg p-8">
                <!-- Logo -->
                <div class="text-center mb-8">
                    <h1 class="text-3xl font-bold text-white">CineAdmin</h1>
                    <p class="text-neutral-400 mt-2">Theater Management System</p>
                </div>

                <!-- Login Form -->
                <div x-show="isLogin" x-cloak>
                    <h2 class="text-2xl font-bold text-white mb-6">Sign In</h2>
                    <form class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-neutral-300 mb-1">Email Address</label>
                            <input type="email" class="w-full px-4 py-2 rounded-md bg-neutral-700 border border-neutral-600 text-white focus:outline-none focus:border-blue-500 transition duration-200" placeholder="admin@example.com" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-neutral-300 mb-1">Password</label>
                            <input type="password" class="w-full px-4 py-2 rounded-md bg-neutral-700 border border-neutral-600 text-white focus:outline-none focus:border-blue-500 transition duration-200" placeholder="••••••••" required>
                        </div>
                        <div class="flex items-center justify-between">
                            <label class="flex items-center">
                                <input type="checkbox" class="w-4 h-4 rounded bg-neutral-700 border-neutral-600 text-blue-500 focus:ring-blue-500">
                                <span class="ml-2 text-sm text-neutral-300">Remember me</span>
                            </label>
                            <a href="#" class="text-sm text-blue-500 hover:text-blue-400">Forgot password?</a>
                        </div>
                        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md transition duration-200">
                            Sign In
                        </button>
                    </form>
                </div>

                <!-- Register Form -->
                <div x-show="!isLogin" x-cloak>
                    <h2 class="text-2xl font-bold text-white mb-6">Create Account</h2>
                    <form class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-neutral-300 mb-1">Full Name</label>
                            <input type="text" class="w-full px-4 py-2 rounded-md bg-neutral-700 border border-neutral-600 text-white focus:outline-none focus:border-blue-500 transition duration-200" placeholder="John Doe" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-neutral-300 mb-1">Email Address</label>
                            <input type="email" class="w-full px-4 py-2 rounded-md bg-neutral-700 border border-neutral-600 text-white focus:outline-none focus:border-blue-500 transition duration-200" placeholder="admin@example.com" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-neutral-300 mb-1">Password</label>
                            <input type="password" class="w-full px-4 py-2 rounded-md bg-neutral-700 border border-neutral-600 text-white focus:outline-none focus:border-blue-500 transition duration-200" placeholder="••••••••" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-neutral-300 mb-1">Confirm Password</label>
                            <input type="password" class="w-full px-4 py-2 rounded-md bg-neutral-700 border border-neutral-600 text-white focus:outline-none focus:border-blue-500 transition duration-200" placeholder="••••••••" required>
                        </div>
                        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md transition duration-200">
                            Create Account
                        </button>
                    </form>
                </div>

                <!-- Toggle Form -->
                <div class="mt-6 text-center">
                    <button @click="isLogin = !isLogin" class="text-sm text-neutral-400 hover:text-white transition duration-200">
                        <span x-text="isLogin ? 'Need an account? Register' : 'Already have an account? Sign in'"></span>
                    </button>
                </div>
            </div>
        </div>
    </section>
</htmlCode>
<htmlCode>
    <section id="Dashboard" class="p-6 space-y-6 bg-neutral-900">
        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Total Revenue -->
            <div class="p-6 bg-neutral-800 border border-neutral-700 rounded-lg">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-neutral-400 text-sm">Total Revenue</p>
                        <h3 class="text-2xl font-bold text-white mt-1">$24,563</h3>
                        <span class="text-green-500 text-sm">+15% from last month</span>
                    </div>
                    <div class="p-3 bg-neutral-700/50 rounded-lg">
                        <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Total Bookings -->
            <div class="p-6 bg-neutral-800 border border-neutral-700 rounded-lg">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-neutral-400 text-sm">Total Bookings</p>
                        <h3 class="text-2xl font-bold text-white mt-1">1,432</h3>
                        <span class="text-green-500 text-sm">+8% from last month</span>
                    </div>
                    <div class="p-3 bg-neutral-700/50 rounded-lg">
                        <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Active Shows -->
            <div class="p-6 bg-neutral-800 border border-neutral-700 rounded-lg">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-neutral-400 text-sm">Active Shows</p>
                        <h3 class="text-2xl font-bold text-white mt-1">12</h3>
                        <span class="text-yellow-500 text-sm">Same as last month</span>
                    </div>
                    <div class="p-3 bg-neutral-700/50 rounded-lg">
                        <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Occupancy Rate -->
            <div class="p-6 bg-neutral-800 border border-neutral-700 rounded-lg">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-neutral-400 text-sm">Occupancy Rate</p>
                        <h3 class="text-2xl font-bold text-white mt-1">76%</h3>
                        <span class="text-red-500 text-sm">-3% from last month</span>
                    </div>
                    <div class="p-3 bg-neutral-700/50 rounded-lg">
                        <svg class="w-6 h-6 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Bookings & Active Shows -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Recent Bookings -->
            <div class="bg-neutral-800 border border-neutral-700 rounded-lg overflow-hidden">
                <div class="p-6 border-b border-neutral-700">
                    <h2 class="text-xl font-semibold text-white">Recent Bookings</h2>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-4 bg-neutral-700/20 rounded-lg">
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0">
                                    <img src="https://avatar.iran.liara.run/public" alt="User" class="w-10 h-10 rounded-full">
                                </div>
                                <div>
                                    <p class="text-white font-medium">John Doe</p>
                                    <p class="text-neutral-400 text-sm">Avengers: Endgame</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-white font-medium">$24</p>
                                <p class="text-neutral-400 text-sm">2 tickets</p>
                            </div>
                        </div>

                        <div class="flex items-center justify-between p-4 bg-neutral-700/20 rounded-lg">
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0">
                                    <img src="https://avatar.iran.liara.run/public" alt="User" class="w-10 h-10 rounded-full">
                                </div>
                                <div>
                                    <p class="text-white font-medium">Jane Smith</p>
                                    <p class="text-neutral-400 text-sm">Inception</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-white font-medium">$36</p>
                                <p class="text-neutral-400 text-sm">3 tickets</p>
                            </div>
                        </div>

                        <div class="flex items-center justify-between p-4 bg-neutral-700/20 rounded-lg">
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0">
                                    <img src="https://avatar.iran.liara.run/public" alt="User" class="w-10 h-10 rounded-full">
                                </div>
                                <div>
                                    <p class="text-white font-medium">Mike Johnson</p>
                                    <p class="text-neutral-400 text-sm">Interstellar</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-white font-medium">$12</p>
                                <p class="text-neutral-400 text-sm">1 ticket</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Active Shows -->
            <div class="bg-neutral-800 border border-neutral-700 rounded-lg overflow-hidden">
                <div class="p-6 border-b border-neutral-700">
                    <h2 class="text-xl font-semibold text-white">Active Shows</h2>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        <div class="p-4 bg-neutral-700/20 rounded-lg">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-white font-medium">Avengers: Endgame</h3>
                                    <p class="text-neutral-400 text-sm">Screen 1 • 7:30 PM</p>
                                </div>
                                <span class="px-3 py-1 text-xs font-medium bg-green-500/20 text-green-500 rounded-full">Running</span>
                            </div>
                            <div class="mt-3">
                                <div class="w-full bg-neutral-700 rounded-full h-2">
                                    <div class="bg-green-500 h-2 rounded-full" style="width: 75%"></div>
                                </div>
                                <p class="text-neutral-400 text-sm mt-2">75% seats filled</p>
                            </div>
                        </div>

                        <div class="p-4 bg-neutral-700/20 rounded-lg">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-white font-medium">Inception</h3>
                                    <p class="text-neutral-400 text-sm">Screen 2 • 8:00 PM</p>
                                </div>
                                <span class="px-3 py-1 text-xs font-medium bg-yellow-500/20 text-yellow-500 rounded-full">Starting Soon</span>
                            </div>
                            <div class="mt-3">
                                <div class="w-full bg-neutral-700 rounded-full h-2">
                                    <div class="bg-yellow-500 h-2 rounded-full" style="width: 45%"></div>
                                </div>
                                <p class="text-neutral-400 text-sm mt-2">45% seats filled</p>
                            </div>
                        </div>

                        <div class="p-4 bg-neutral-700/20 rounded-lg">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-white font-medium">Interstellar</h3>
                                    <p class="text-neutral-400 text-sm">Screen 3 • 9:00 PM</p>
                                </div>
                                <span class="px-3 py-1 text-xs font-medium bg-blue-500/20 text-blue-500 rounded-full">Booking Open</span>
                            </div>
                            <div class="mt-3">
                                <div class="w-full bg-neutral-700 rounded-full h-2">
                                    <div class="bg-blue-500 h-2 rounded-full" style="width: 25%"></div>
                                </div>
                                <p class="text-neutral-400 text-sm mt-2">25% seats filled</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</htmlCode>
<htmlCode>
    <section id="MovieManagement" class="p-6 bg-neutral-900">
        <!-- Header with Add Movie Button -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-white">Movie Management</h2>
            <button @click="document.getElementById('addMovieModal').classList.remove('hidden')" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200 flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Add New Movie
            </button>
        </div>

        <!-- Search and Filter Bar -->
        <div class="mb-6 grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="relative">
                <input type="text" placeholder="Search movies..." class="w-full px-4 py-2 bg-neutral-800 border border-neutral-700 rounded-lg text-white focus:outline-none focus:border-blue-500">
                <svg class="w-5 h-5 text-neutral-400 absolute right-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
            <select class="px-4 py-2 bg-neutral-800 border border-neutral-700 rounded-lg text-white focus:outline-none focus:border-blue-500">
                <option>All Genres</option>
                <option>Action</option>
                <option>Drama</option>
                <option>Comedy</option>
                <option>Thriller</option>
            </select>
            <select class="px-4 py-2 bg-neutral-800 border border-neutral-700 rounded-lg text-white focus:outline-none focus:border-blue-500">
                <option>Status</option>
                <option>Now Showing</option>
                <option>Coming Soon</option>
                <option>Archived</option>
            </select>
        </div>

        <!-- Movies Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <!-- Movie Card -->
            <div class="bg-neutral-800 border border-neutral-700 rounded-lg overflow-hidden">
                <img src="https://placehold.co/600x400?text=Movie+Poster" alt="Movie Poster" class="w-full h-48 object-cover">
                <div class="p-4">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="text-lg font-semibold text-white">Avengers: Endgame</h3>
                        <span class="px-2 py-1 text-xs bg-green-500/20 text-green-500 rounded-full">Now Showing</span>
                    </div>
                    <p class="text-neutral-400 text-sm mb-4">Action, Adventure • 3h 2m</p>
                    <div class="flex justify-between items-center">
                        <span class="text-neutral-300">12 shows today</span>
                        <button class="text-neutral-400 hover:text-white" @click="showMovieOptions">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Repeat Movie Cards -->
        </div>

        <!-- Add Movie Modal -->
        <div id="addMovieModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
            <div class="bg-neutral-800 rounded-lg p-6 w-full max-w-2xl">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-xl font-bold text-white">Add New Movie</h3>
                    <button @click="document.getElementById('addMovieModal').classList.add('hidden')" class="text-neutral-400 hover:text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <form class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-neutral-300 mb-1">Movie Title</label>
                        <input type="text" class="w-full px-4 py-2 bg-neutral-700 border border-neutral-600 rounded-lg text-white focus:outline-none focus:border-blue-500">
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-neutral-300 mb-1">Genre</label>
                            <select class="w-full px-4 py-2 bg-neutral-700 border border-neutral-600 rounded-lg text-white focus:outline-none focus:border-blue-500">
                                <option>Action</option>
                                <option>Drama</option>
                                <option>Comedy</option>
                                <option>Thriller</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-neutral-300 mb-1">Duration (minutes)</label>
                            <input type="number" class="w-full px-4 py-2 bg-neutral-700 border border-neutral-600 rounded-lg text-white focus:outline-none focus:border-blue-500">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-neutral-300 mb-1">Release Date</label>
                        <input type="date" class="w-full px-4 py-2 bg-neutral-700 border border-neutral-600 rounded-lg text-white focus:outline-none focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-neutral-300 mb-1">Description</label>
                        <textarea rows="4" class="w-full px-4 py-2 bg-neutral-700 border border-neutral-600 rounded-lg text-white focus:outline-none focus:border-blue-500"></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-neutral-300 mb-1">Poster Image</label>
                        <div class="border-2 border-dashed border-neutral-600 rounded-lg p-4 text-center">
                            <svg class="mx-auto h-12 w-12 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            <p class="mt-1 text-sm text-neutral-400">Drag and drop or click to upload</p>
                        </div>
                    </div>
                    <div class="flex justify-end space-x-4 mt-6">
                        <button type="button" @click="document.getElementById('addMovieModal').classList.add('hidden')" class="px-4 py-2 text-neutral-400 hover:text-white transition duration-200">Cancel</button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200">Add Movie</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</htmlCode>
<htmlCode>
    <section id="ScreenManagement" class="p-6 bg-neutral-900">
        <!-- Header with Add Screen Button -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-white">Screen Management</h2>
            <button @click="document.getElementById('addScreenModal').classList.remove('hidden')" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200 flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Add New Screen
            </button>
        </div>

        <!-- Screens Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6">
            <!-- Screen Card 1 -->
            <div class="bg-neutral-800 border border-neutral-700 rounded-lg overflow-hidden">
                <div class="p-6">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h3 class="text-xl font-semibold text-white">Screen 1</h3>
                            <p class="text-neutral-400 mt-1">Premium Theater</p>
                        </div>
                        <span class="px-3 py-1 text-sm bg-green-500/20 text-green-500 rounded-full">Active</span>
                    </div>
                    <div class="space-y-3">
                        <div class="flex justify-between text-sm">
                            <span class="text-neutral-400">Seating Capacity</span>
                            <span class="text-white">120 seats</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-neutral-400">Screen Type</span>
                            <span class="text-white">IMAX</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-neutral-400">Sound System</span>
                            <span class="text-white">Dolby Atmos</span>
                        </div>
                    </div>
                    <div class="mt-6 grid grid-cols-2 gap-4">
                        <button class="px-4 py-2 bg-neutral-700 text-white rounded-lg hover:bg-neutral-600 transition duration-200">Edit Screen</button>
                        <button class="px-4 py-2 bg-neutral-700 text-white rounded-lg hover:bg-neutral-600 transition duration-200">View Layout</button>
                    </div>
                </div>
            </div>

            <!-- Screen Card 2 -->
            <div class="bg-neutral-800 border border-neutral-700 rounded-lg overflow-hidden">
                <div class="p-6">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h3 class="text-xl font-semibold text-white">Screen 2</h3>
                            <p class="text-neutral-400 mt-1">Standard Theater</p>
                        </div>
                        <span class="px-3 py-1 text-sm bg-green-500/20 text-green-500 rounded-full">Active</span>
                    </div>
                    <div class="space-y-3">
                        <div class="flex justify-between text-sm">
                            <span class="text-neutral-400">Seating Capacity</span>
                            <span class="text-white">80 seats</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-neutral-400">Screen Type</span>
                            <span class="text-white">2D/3D</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-neutral-400">Sound System</span>
                            <span class="text-white">7.1 Surround</span>
                        </div>
                    </div>
                    <div class="mt-6 grid grid-cols-2 gap-4">
                        <button class="px-4 py-2 bg-neutral-700 text-white rounded-lg hover:bg-neutral-600 transition duration-200">Edit Screen</button>
                        <button class="px-4 py-2 bg-neutral-700 text-white rounded-lg hover:bg-neutral-600 transition duration-200">View Layout</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Screen Modal -->
        <div id="addScreenModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
            <div class="bg-neutral-800 rounded-lg p-6 w-full max-w-2xl">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-xl font-bold text-white">Add New Screen</h3>
                    <button @click="document.getElementById('addScreenModal').classList.add('hidden')" class="text-neutral-400 hover:text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <form class="space-y-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-neutral-300 mb-1">Screen Name</label>
                            <input type="text" class="w-full px-4 py-2 bg-neutral-700 border border-neutral-600 rounded-lg text-white focus:outline-none focus:border-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-neutral-300 mb-1">Theater Type</label>
                            <select class="w-full px-4 py-2 bg-neutral-700 border border-neutral-600 rounded-lg text-white focus:outline-none focus:border-blue-500">
                                <option>Standard</option>
                                <option>Premium</option>
                                <option>IMAX</option>
                                <option>VIP</option>
                            </select>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-neutral-300 mb-1">Seating Capacity</label>
                            <input type="number" class="w-full px-4 py-2 bg-neutral-700 border border-neutral-600 rounded-lg text-white focus:outline-none focus:border-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-neutral-300 mb-1">Screen Type</label>
                            <select class="w-full px-4 py-2 bg-neutral-700 border border-neutral-600 rounded-lg text-white focus:outline-none focus:border-blue-500">
                                <option>2D</option>
                                <option>3D</option>
                                <option>4DX</option>
                                <option>IMAX</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-neutral-300 mb-1">Sound System</label>
                        <select class="w-full px-4 py-2 bg-neutral-700 border border-neutral-600 rounded-lg text-white focus:outline-none focus:border-blue-500">
                            <option>Dolby Digital</option>
                            <option>Dolby Atmos</option>
                            <option>7.1 Surround</option>
                            <option>IMAX Sound</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-neutral-300 mb-1">Screen Layout</label>
                        <div class="border-2 border-dashed border-neutral-600 rounded-lg p-8 text-center">
                            <div class="flex flex-col items-center">
                                <svg class="w-12 h-12 text-neutral-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <p class="text-neutral-400 mb-2">Upload Screen Layout</p>
                                <p class="text-sm text-neutral-500">Drag and drop or click to upload</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end space-x-4 mt-6">
                        <button type="button" @click="document.getElementById('addScreenModal').classList.add('hidden')" class="px-4 py-2 text-neutral-400 hover:text-white transition duration-200">Cancel</button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200">Add Screen</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</htmlCode>
<htmlCode>
    <section id="ShowScheduler" class="p-6 bg-neutral-900">
        <!-- Header with Add Show Button -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-white">Show Scheduler</h2>
            <button @click="document.getElementById('addShowModal').classList.remove('hidden')" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200 flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Schedule New Show
            </button>
        </div>

        <!-- Date Navigation -->
        <div class="flex space-x-4 mb-6 overflow-x-auto pb-2">
            <button class="min-w-[100px] px-4 py-2 bg-neutral-800 border border-neutral-700 rounded-lg text-white hover:bg-neutral-700">Today</button>
            <button class="min-w-[100px] px-4 py-2 bg-neutral-800 border border-neutral-700 rounded-lg text-white hover:bg-neutral-700">Tomorrow</button>
            <button class="min-w-[100px] px-4 py-2 bg-neutral-800 border border-neutral-700 rounded-lg text-white hover:bg-neutral-700">Wed, 20 Mar</button>
            <button class="min-w-[100px] px-4 py-2 bg-neutral-800 border border-neutral-700 rounded-lg text-white hover:bg-neutral-700">Thu, 21 Mar</button>
            <button class="min-w-[100px] px-4 py-2 bg-neutral-800 border border-neutral-700 rounded-lg text-white hover:bg-neutral-700">Fri, 22 Mar</button>
        </div>

        <!-- Schedule Grid -->
        <div class="space-y-6">
            <!-- Screen 1 Schedule -->
            <div class="bg-neutral-800 border border-neutral-700 rounded-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <div>
                        <h3 class="text-xl font-semibold text-white">Screen 1</h3>
                        <p class="text-neutral-400">IMAX Theater</p>
                    </div>
                    <div class="flex space-x-2">
                        <button class="p-2 text-neutral-400 hover:text-white">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div class="bg-neutral-700/50 p-4 rounded-lg">
                        <div class="flex justify-between items-start mb-2">
                            <span class="text-white font-medium">10:00 AM</span>
                            <span class="px-2 py-1 text-xs bg-green-500/20 text-green-500 rounded-full">Available</span>
                        </div>
                        <h4 class="text-white mb-1">Avengers: Endgame</h4>
                        <p class="text-neutral-400 text-sm">3h 2m • PG-13</p>
                    </div>
                    <div class="bg-neutral-700/50 p-4 rounded-lg">
                        <div class="flex justify-between items-start mb-2">
                            <span class="text-white font-medium">2:00 PM</span>
                            <span class="px-2 py-1 text-xs bg-yellow-500/20 text-yellow-500 rounded-full">Filling Fast</span>
                        </div>
                        <h4 class="text-white mb-1">Inception</h4>
                        <p class="text-neutral-400 text-sm">2h 28m • PG-13</p>
                    </div>
                </div>
            </div>

            <!-- Screen 2 Schedule -->
            <div class="bg-neutral-800 border border-neutral-700 rounded-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <div>
                        <h3 class="text-xl font-semibold text-white">Screen 2</h3>
                        <p class="text-neutral-400">Standard Theater</p>
                    </div>
                    <div class="flex space-x-2">
                        <button class="p-2 text-neutral-400 hover:text-white">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div class="bg-neutral-700/50 p-4 rounded-lg">
                        <div class="flex justify-between items-start mb-2">
                            <span class="text-white font-medium">11:30 AM</span>
                            <span class="px-2 py-1 text-xs bg-red-500/20 text-red-500 rounded-full">Almost Full</span>
                        </div>
                        <h4 class="text-white mb-1">Interstellar</h4>
                        <p class="text-neutral-400 text-sm">2h 49m • PG-13</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Show Modal -->
        <div id="addShowModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
            <div class="bg-neutral-800 rounded-lg p-6 w-full max-w-2xl">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-xl font-bold text-white">Schedule New Show</h3>
                    <button @click="document.getElementById('addShowModal').classList.add('hidden')" class="text-neutral-400 hover:text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <form class="space-y-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-neutral-300 mb-1">Select Screen</label>
                            <select class="w-full px-4 py-2 bg-neutral-700 border border-neutral-600 rounded-lg text-white focus:outline-none focus:border-blue-500">
                                <option>Screen 1 - IMAX</option>
                                <option>Screen 2 - Standard</option>
                                <option>Screen 3 - Premium</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-neutral-300 mb-1">Select Movie</label>
                            <select class="w-full px-4 py-2 bg-neutral-700 border border-neutral-600 rounded-lg text-white focus:outline-none focus:border-blue-500">
                                <option>Avengers: Endgame</option>
                                <option>Inception</option>
                                <option>Interstellar</option>
                            </select>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-neutral-300 mb-1">Show Date</label>
                            <input type="date" class="w-full px-4 py-2 bg-neutral-700 border border-neutral-600 rounded-lg text-white focus:outline-none focus:border-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-neutral-300 mb-1">Show Time</label>
                            <input type="time" class="w-full px-4 py-2 bg-neutral-700 border border-neutral-600 rounded-lg text-white focus:outline-none focus:border-blue-500">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-neutral-300 mb-1">Pricing</label>
                        <div class="grid grid-cols-2 gap-4">
                            <input type="number" placeholder="Standard Price" class="px-4 py-2 bg-neutral-700 border border-neutral-600 rounded-lg text-white focus:outline-none focus:border-blue-500">
                            <input type="number" placeholder="Premium Price" class="px-4 py-2 bg-neutral-700 border border-neutral-600 rounded-lg text-white focus:outline-none focus:border-blue-500">
                        </div>
                    </div>
                    <div class="flex justify-end space-x-4 mt-6">
                        <button type="button" @click="document.getElementById('addShowModal').classList.add('hidden')" class="px-4 py-2 text-neutral-400 hover:text-white transition duration-200">Cancel</button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200">Schedule Show</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</htmlCode>
<htmlCode>
    <section id="BookingManagement" class="p-6 bg-neutral-900">
        <!-- Header with Filters -->
        <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4 mb-6">
            <h2 class="text-2xl font-bold text-white">Booking Management</h2>
            <div class="flex flex-wrap gap-4 items-center">
                <input type="text" placeholder="Search booking ID or customer" class="px-4 py-2 bg-neutral-800 border border-neutral-700 rounded-lg text-white focus:outline-none focus:border-blue-500">
                <select class="px-4 py-2 bg-neutral-800 border border-neutral-700 rounded-lg text-white focus:outline-none focus:border-blue-500">
                    <option>All Shows</option>
                    <option>Avengers: Endgame</option>
                    <option>Inception</option>
                    <option>Interstellar</option>
                </select>
                <select class="px-4 py-2 bg-neutral-800 border border-neutral-700 rounded-lg text-white focus:outline-none focus:border-blue-500">
                    <option>All Statuses</option>
                    <option>Confirmed</option>
                    <option>Pending</option>
                    <option>Cancelled</option>
                </select>
            </div>
        </div>

        <!-- Bookings Table -->
        <div class="bg-neutral-800 border border-neutral-700 rounded-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead>
                        <tr class="border-b border-neutral-700 bg-neutral-800">
                            <th class="px-6 py-4 text-left text-sm font-semibold text-white">Booking ID</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-white">Customer</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-white">Movie</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-white">Show Time</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-white">Seats</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-white">Amount</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-white">Status</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-white">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-neutral-700">
                        <tr class="hover:bg-neutral-700/50 transition duration-200">
                            <td class="px-6 py-4 text-sm text-white">#BK1234</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <img src="https://avatar.iran.liara.run/public" alt="User" class="w-8 h-8 rounded-full">
                                    <div class="ml-3">
                                        <p class="text-sm text-white">John Doe</p>
                                        <p class="text-xs text-neutral-400">john@example.com</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-white">Avengers: Endgame</td>
                            <td class="px-6 py-4 text-sm text-white">Today, 7:00 PM</td>
                            <td class="px-6 py-4 text-sm text-white">A1, A2, A3</td>
                            <td class="px-6 py-4 text-sm text-white">$45.00</td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 text-xs font-medium bg-green-500/20 text-green-500 rounded-full">Confirmed</span>
                            </td>
                            <td class="px-6 py-4">
                                <button class="text-neutral-400 hover:text-white" @click="showBookingDetails">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                </button>
                            </td>
                        </tr>

                        <tr class="hover:bg-neutral-700/50 transition duration-200">
                            <td class="px-6 py-4 text-sm text-white">#BK1235</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <img src="https://avatar.iran.liara.run/public" alt="User" class="w-8 h-8 rounded-full">
                                    <div class="ml-3">
                                        <p class="text-sm text-white">Jane Smith</p>
                                        <p class="text-xs text-neutral-400">jane@example.com</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-white">Inception</td>
                            <td class="px-6 py-4 text-sm text-white">Tomorrow, 4:30 PM</td>
                            <td class="px-6 py-4 text-sm text-white">B4, B5</td>
                            <td class="px-6 py-4 text-sm text-white">$30.00</td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 text-xs font-medium bg-yellow-500/20 text-yellow-500 rounded-full">Pending</span>
                            </td>
                            <td class="px-6 py-4">
                                <button class="text-neutral-400 hover:text-white" @click="showBookingDetails">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="px-6 py-4 border-t border-neutral-700 flex items-center justify-between">
                <p class="text-sm text-neutral-400">Showing 1 to 10 of 50 entries</p>
                <div class="flex space-x-2">
                    <button class="px-3 py-1 bg-neutral-700 text-white rounded hover:bg-neutral-600 transition duration-200">Previous</button>
                    <button class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700 transition duration-200">1</button>
                    <button class="px-3 py-1 bg-neutral-700 text-white rounded hover:bg-neutral-600 transition duration-200">2</button>
                    <button class="px-3 py-1 bg-neutral-700 text-white rounded hover:bg-neutral-600 transition duration-200">3</button>
                    <button class="px-3 py-1 bg-neutral-700 text-white rounded hover:bg-neutral-600 transition duration-200">Next</button>
                </div>
            </div>
        </div>
    </section>
</htmlCode>
<htmlCode>
    <section id="Reports" class="p-6 bg-neutral-900">
        <!-- Header with Date Range Selector -->
        <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4 mb-6">
            <h2 class="text-2xl font-bold text-white">Analytics & Reports</h2>
            <div class="flex flex-wrap gap-4">
                <select class="px-4 py-2 bg-neutral-800 border border-neutral-700 rounded-lg text-white focus:outline-none focus:border-blue-500">
                    <option>Last 7 Days</option>
                    <option>Last 30 Days</option>
                    <option>Last 3 Months</option>
                    <option>Last Year</option>
                    <option>Custom Range</option>
                </select>
                <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200">
                    Export Report
                </button>
            </div>
        </div>

        <!-- Key Metrics Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
            <!-- Total Revenue -->
            <div class="bg-neutral-800 border border-neutral-700 rounded-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-neutral-400">Total Revenue</h3>
                    <span class="text-green-500 text-sm">+12.5%</span>
                </div>
                <p class="text-2xl font-bold text-white mb-2">$124,563.00</p>
                <p class="text-sm text-neutral-400">Compared to $110,725 last period</p>
            </div>

            <!-- Total Bookings -->
            <div class="bg-neutral-800 border border-neutral-700 rounded-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-neutral-400">Total Bookings</h3>
                    <span class="text-green-500 text-sm">+8.2%</span>
                </div>
                <p class="text-2xl font-bold text-white mb-2">5,732</p>
                <p class="text-sm text-neutral-400">Compared to 5,297 last period</p>
            </div>

            <!-- Average Occupancy -->
            <div class="bg-neutral-800 border border-neutral-700 rounded-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-neutral-400">Average Occupancy</h3>
                    <span class="text-red-500 text-sm">-2.4%</span>
                </div>
                <p class="text-2xl font-bold text-white mb-2">76.3%</p>
                <p class="text-sm text-neutral-400">Compared to 78.7% last period</p>
            </div>

            <!-- Cancelled Bookings -->
            <div class="bg-neutral-800 border border-neutral-700 rounded-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-neutral-400">Cancelled Bookings</h3>
                    <span class="text-green-500 text-sm">-5.1%</span>
                </div>
                <p class="text-2xl font-bold text-white mb-2">142</p>
                <p class="text-sm text-neutral-400">Compared to 149 last period</p>
            </div>
        </div>

        <!-- Charts Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
            <!-- Revenue Trend -->
            <div class="bg-neutral-800 border border-neutral-700 rounded-lg p-6">
                <h3 class="text-lg font-semibold text-white mb-6">Revenue Trend</h3>
                <div class="h-80 bg-neutral-700/20 rounded-lg flex items-center justify-center">
                    <p class="text-neutral-400">Revenue Chart Placeholder</p>
                </div>
            </div>

            <!-- Popular Movies -->
            <div class="bg-neutral-800 border border-neutral-700 rounded-lg p-6">
                <h3 class="text-lg font-semibold text-white mb-6">Popular Movies</h3>
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-12 h-16 bg-neutral-700 rounded"></div>
                            <div class="ml-4">
                                <p class="text-white font-medium">Avengers: Endgame</p>
                                <p class="text-neutral-400 text-sm">1,245 bookings</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-white font-medium">$24,563</p>
                            <p class="text-green-500 text-sm">+15.2%</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-12 h-16 bg-neutral-700 rounded"></div>
                            <div class="ml-4">
                                <p class="text-white font-medium">Inception</p>
                                <p class="text-neutral-400 text-sm">982 bookings</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-white font-medium">$18,742</p>
                            <p class="text-green-500 text-sm">+8.7%</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Screen Performance -->
        <div class="bg-neutral-800 border border-neutral-700 rounded-lg p-6">
            <h3 class="text-lg font-semibold text-white mb-6">Screen Performance</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead>
                        <tr class="border-b border-neutral-700">
                            <th class="px-6 py-3 text-left text-sm font-semibold text-white">Screen</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-white">Total Shows</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-white">Total Bookings</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-white">Average Occupancy</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-white">Revenue</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-neutral-700">
                        <tr>
                            <td class="px-6 py-4 text-sm text-white">Screen 1 (IMAX)</td>
                            <td class="px-6 py-4 text-sm text-white">245</td>
                            <td class="px-6 py-4 text-sm text-white">2,156</td>
                            <td class="px-6 py-4 text-sm text-white">82%</td>
                            <td class="px-6 py-4 text-sm text-white">$45,632</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 text-sm text-white">Screen 2</td>
                            <td class="px-6 py-4 text-sm text-white">198</td>
                            <td class="px-6 py-4 text-sm text-white">1,845</td>
                            <td class="px-6 py-4 text-sm text-white">75%</td>
                            <td class="px-6 py-4 text-sm text-white">$32,845</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</htmlCode>
<htmlCode>
    <section id="UserManagement" class="p-6 bg-neutral-900">
        <!-- Header with Add User Button -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-white">User Management</h2>
            <button @click="document.getElementById('addUserModal').classList.remove('hidden')" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200 flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Add New User
            </button>
        </div>

        <!-- Filters -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <input type="text" placeholder="Search users..." class="px-4 py-2 bg-neutral-800 border border-neutral-700 rounded-lg text-white focus:outline-none focus:border-blue-500">
            <select class="px-4 py-2 bg-neutral-800 border border-neutral-700 rounded-lg text-white focus:outline-none focus:border-blue-500">
                <option>All Roles</option>
                <option>Admin</option>
                <option>Manager</option>
                <option>Staff</option>
            </select>
            <select class="px-4 py-2 bg-neutral-800 border border-neutral-700 rounded-lg text-white focus:outline-none focus:border-blue-500">
                <option>All Status</option>
                <option>Active</option>
                <option>Inactive</option>
                <option>Suspended</option>
            </select>
        </div>

        <!-- Users Table -->
        <div class="bg-neutral-800 border border-neutral-700 rounded-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead>
                        <tr class="border-b border-neutral-700 bg-neutral-800">
                            <th class="px-6 py-4 text-left text-sm font-semibold text-white">User</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-white">Role</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-white">Email</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-white">Status</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-white">Last Login</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-white">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-neutral-700">
                        <tr class="hover:bg-neutral-700/50 transition duration-200">
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <img src="https://avatar.iran.liara.run/public" alt="User" class="w-8 h-8 rounded-full">
                                    <div class="ml-3">
                                        <p class="text-sm text-white font-medium">John Doe</p>
                                        <p class="text-xs text-neutral-400">Created 2 months ago</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 text-xs font-medium bg-blue-500/20 text-blue-500 rounded-full">Admin</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-white">john@example.com</td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 text-xs font-medium bg-green-500/20 text-green-500 rounded-full">Active</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-neutral-400">2 hours ago</td>
                            <td class="px-6 py-4">
                                <div class="flex space-x-3">
                                    <button class="text-neutral-400 hover:text-white transition duration-200">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                        </svg>
                                    </button>
                                    <button class="text-neutral-400 hover:text-red-500 transition duration-200">
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

            <!-- Pagination -->
            <div class="px-6 py-4 border-t border-neutral-700 flex items-center justify-between">
                <p class="text-sm text-neutral-400">Showing 1 to 10 of 45 users</p>
                <div class="flex space-x-2">
                    <button class="px-3 py-1 bg-neutral-700 text-white rounded hover:bg-neutral-600 transition duration-200">Previous</button>
                    <button class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700 transition duration-200">1</button>
                    <button class="px-3 py-1 bg-neutral-700 text-white rounded hover:bg-neutral-600 transition duration-200">2</button>
                    <button class="px-3 py-1 bg-neutral-700 text-white rounded hover:bg-neutral-600 transition duration-200">3</button>
                    <button class="px-3 py-1 bg-neutral-700 text-white rounded hover:bg-neutral-600 transition duration-200">Next</button>
                </div>
            </div>
        </div>

        <!-- Add User Modal -->
        <div id="addUserModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
            <div class="bg-neutral-800 rounded-lg p-6 w-full max-w-md">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-xl font-bold text-white">Add New User</h3>
                    <button @click="document.getElementById('addUserModal').classList.add('hidden')" class="text-neutral-400 hover:text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <form class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-neutral-300 mb-1">Full Name</label>
                        <input type="text" class="w-full px-4 py-2 bg-neutral-700 border border-neutral-600 rounded-lg text-white focus:outline-none focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-neutral-300 mb-1">Email</label>
                        <input type="email" class="w-full px-4 py-2 bg-neutral-700 border border-neutral-600 rounded-lg text-white focus:outline-none focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-neutral-300 mb-1">Role</label>
                        <select class="w-full px-4 py-2 bg-neutral-700 border border-neutral-600 rounded-lg text-white focus:outline-none focus:border-blue-500">
                            <option>Admin</option>
                            <option>Manager</option>
                            <option>Staff</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-neutral-300 mb-1">Password</label>
                        <input type="password" class="w-full px-4 py-2 bg-neutral-700 border border-neutral-600 rounded-lg text-white focus:outline-none focus:border-blue-500">
                    </div>
                    <div class="flex justify-end space-x-4 mt-6">
                        <button type="button" @click="document.getElementById('addUserModal').classList.add('hidden')" class="px-4 py-2 text-neutral-400 hover:text-white transition duration-200">Cancel</button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200">Add User</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</htmlCode>
<htmlCode>
    <section id="Settings" class="p-6 bg-neutral-900">
        <h2 class="text-2xl font-bold text-white mb-6">Settings</h2>

        <!-- Settings Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Main Settings Panel -->
            <div class="md:col-span-2 space-y-6">
                <!-- Theater Information -->
                <div class="bg-neutral-800 border border-neutral-700 rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-white mb-4">Theater Information</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-neutral-300 mb-1">Theater Name</label>
                            <input type="text" value="CineMax Theaters" class="w-full px-4 py-2 bg-neutral-700 border border-neutral-600 rounded-lg text-white focus:outline-none focus:border-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-neutral-300 mb-1">Address</label>
                            <textarea rows="3" class="w-full px-4 py-2 bg-neutral-700 border border-neutral-600 rounded-lg text-white focus:outline-none focus:border-blue-500"></textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-neutral-300 mb-1">Contact Email</label>
                            <input type="email" value="contact@cinemax.com" class="w-full px-4 py-2 bg-neutral-700 border border-neutral-600 rounded-lg text-white focus:outline-none focus:border-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-neutral-300 mb-1">Phone Number</label>
                            <input type="tel" class="w-full px-4 py-2 bg-neutral-700 border border-neutral-600 rounded-lg text-white focus:outline-none focus:border-blue-500">
                        </div>
                    </div>
                </div>

                <!-- Booking Settings -->
                <div class="bg-neutral-800 border border-neutral-700 rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-white mb-4">Booking Settings</h3>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-white font-medium">Advanced Booking Window</p>
                                <p class="text-sm text-neutral-400">Allow bookings up to x days in advance</p>
                            </div>
                            <input type="number" value="7" class="w-24 px-4 py-2 bg-neutral-700 border border-neutral-600 rounded-lg text-white focus:outline-none focus:border-blue-500">
                        </div>
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-white font-medium">Cancellation Window</p>
                                <p class="text-sm text-neutral-400">Allow cancellation up to x hours before show</p>
                            </div>
                            <input type="number" value="4" class="w-24 px-4 py-2 bg-neutral-700 border border-neutral-600 rounded-lg text-white focus:outline-none focus:border-blue-500">
                        </div>
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-white font-medium">Maximum Tickets per Booking</p>
                                <p class="text-sm text-neutral-400">Limit number of tickets per transaction</p>
                            </div>
                            <input type="number" value="10" class="w-24 px-4 py-2 bg-neutral-700 border border-neutral-600 rounded-lg text-white focus:outline-none focus:border-blue-500">
                        </div>
                    </div>
                </div>

                <!-- Email Notifications -->
                <div class="bg-neutral-800 border border-neutral-700 rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-white mb-4">Email Notifications</h3>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-white font-medium">Booking Confirmation</p>
                                <p class="text-sm text-neutral-400">Send email after successful booking</p>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" checked class="sr-only peer">
                                <div class="w-11 h-6 bg-neutral-700 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-800 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                            </label>
                        </div>
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-white font-medium">Cancellation Notification</p>
                                <p class="text-sm text-neutral-400">Send email for booking cancellations</p>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" checked class="sr-only peer">
                                <div class="w-11 h-6 bg-neutral-700 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-800 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                            </label>
                        </div>
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-white font-medium">Show Reminders</p>
                                <p class="text-sm text-neutral-400">Send reminder before show time</p>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="sr-only peer">
                                <div class="w-11 h-6 bg-neutral-700 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-800 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Side Panel -->
            <div class="space-y-6">
                <!-- System Theme -->
                <div class="bg-neutral-800 border border-neutral-700 rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-white mb-4">System Theme</h3>
                    <div class="space-y-4">
                        <button class="w-full px-4 py-2 bg-neutral-700 text-white rounded-lg hover:bg-neutral-600 transition duration-200 flex items-center justify-between">
                            <span>Dark Mode</span>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Security Settings -->
                <div class="bg-neutral-800 border border-neutral-700 rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-white mb-4">Security</h3>
                    <div class="space-y-4">
                        <button class="w-full px-4 py-2 bg-neutral-700 text-white rounded-lg hover:bg-neutral-600 transition duration-200">Change Password</button>
                        <button class="w-full px-4 py-2 bg-neutral-700 text-white rounded-lg hover:bg-neutral-600 transition duration-200">Enable 2FA</button>
                    </div>
                </div>

                <!-- Save Changes -->
                <div class="bg-neutral-800 border border-neutral-700 rounded-lg p-6">
                    <button class="w-full px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200">Save Changes</button>
                </div>
            </div>
        </div>
    </section>
</htmlCode>