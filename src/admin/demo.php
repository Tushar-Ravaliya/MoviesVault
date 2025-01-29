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


</head>

<body>
    <div class="min-h-screen bg-gray-100 p-6">
        <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-md p-8">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Edit Movie Details</h2>

            <!-- Movie Title -->
            <div class="mb-6">
                <label for="title" class="block text-sm font-medium text-gray-700">Movie Title</label>
                <input
                    type="text"
                    id="title"
                    name="title"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Enter movie title"
                    value="Movie Name" />
            </div>

            <!-- Movie Description -->
            <div class="mb-6">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea
                    id="description"
                    name="description"
                    rows="4"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Enter movie description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</textarea>
            </div>

            <!-- Genre -->
            <div class="mb-6">
                <label for="genre" class="block text-sm font-medium text-gray-700">Genre</label>
                <input
                    type="text"
                    id="genre"
                    name="genre"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Enter genre"
                    value="Action, Adventure" />
            </div>

            <!-- Duration -->
            <div class="mb-6">
                <label for="duration" class="block text-sm font-medium text-gray-700">Duration (minutes)</label>
                <input
                    type="number"
                    id="duration"
                    name="duration"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Enter duration"
                    value="120" />
            </div>

            <!-- Release Date -->
            <div class="mb-6">
                <label for="releaseDate" class="block text-sm font-medium text-gray-700">Release Date</label>
                <input
                    type="date"
                    id="releaseDate"
                    name="releaseDate"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    value="2023-10-15" />
            </div>

            <!-- Poster Upload -->
            <div class="mb-6">
                <label for="poster" class="block text-sm font-medium text-gray-700">Movie Poster</label>
                <div class="mt-1 flex items-center">
                    <input
                        type="file"
                        id="poster"
                        name="poster"
                        class="sr-only" />
                    <label
                        for="poster"
                        class="px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 cursor-pointer">
                        Upload Poster
                    </label>
                    <span class="ml-3 text-sm text-gray-500">No file chosen</span>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button
                    type="submit"
                    class="px-6 py-2 bg-indigo-600 text-white rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Save Changes
                </button>
            </div>
        </div>
    </div>
</body>

</html>