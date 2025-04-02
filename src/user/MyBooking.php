<?php include_once("Nevigation.php") ?>
<body class="bg-gray-100">

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-red-500 mb-6">Order History</h1>

        <!-- If no orders -->
        <!-- <p class="text-gray-600">No orders found.</p> -->

        <!-- Orders Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Order Card -->
            <div class="border p-4 rounded-lg shadow-md bg-white">
                <img src="../../public/Images/67ecc589e91f0.jpg" 
                     alt="Movie Poster" 
                     class="w-full h-64 object-cover rounded">
                <h2 class="text-lg font-semibold mt-2">The Batman</h2>
                <p class="text-gray-500">Booking Date: January 5, 2024</p>
                <p class="text-green-500 font-medium">Status: Confirmed</p>
            </div>
        </div>

    </div>

</body>

<?php include_once("Footer.php") ?>
