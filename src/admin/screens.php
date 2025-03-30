<?php
$page_title = "Admin Dashboard";
// Database connection
require_once("../../config/connection.php");

// Check if theater ID is provided
if (!isset($_GET['theater_id']) || empty($_GET['theater_id'])) {
    header("Location: manage_movies.php");
    exit;
}

$theater_id = intval($_GET['theater_id']);

// Initialize variables
$error = '';
$success = '';

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Add new screen
    if (isset($_POST['add_screen'])) {
        $screen_name = trim($_POST['screen_name']);
        $screen_type = trim($_POST['screen_type']);
        $seating_capacity = (int)$_POST['seating_capacity'];
        $layout_type = trim($_POST['layout_type']);
        $status = isset($_POST['status']) ? 'active' : 'inactive';

        // Validate inputs
        if (empty($screen_name) || empty($screen_type) || $seating_capacity <= 0) {
            $error = "Please fill in all required fields.";
        } else {
            // Insert new screen into database
            $sql = "INSERT INTO screens (theater_id, screen_name, screen_type, seating_capacity, layout_type, status) 
                    VALUES ('$theater_id', '$screen_name', '$screen_type', '$seating_capacity', '$layout_type', '$status')";

            if (mysqli_query($conn, $sql)) {
                $success = "Screen added successfully!";
            } else {
                $error = "Error: " . mysqli_error($conn);
            }
        }
    }

    // Update existing screen
    if (isset($_POST['update_screen'])) {
        $screen_id = (int)$_POST['screen_id'];
        $screen_name = trim($_POST['screen_name']);
        $screen_type = trim($_POST['screen_type']);
        $seating_capacity = (int)$_POST['seating_capacity'];
        $layout_type = trim($_POST['layout_type']);
        $status = isset($_POST['status']) ? 'active' : 'inactive';

        // Validate inputs
        if (empty($screen_name) || empty($screen_type) || $seating_capacity <= 0) {
            $error = "Please fill in all required fields.";
        } else {
            // Update screen in database
            $sql = "UPDATE screens SET screen_name = '$screen_name', screen_type = '$screen_type', seating_capacity = '$seating_capacity', 
                    layout_type = '$layout_type', status = '$status' WHERE id = '$screen_id'";

            if (mysqli_query($conn, $sql)) {
                $success = "Screen updated successfully!";
            } else {
                $error = "Error: " . mysqli_error($conn);
            }
        }
    }

    // Delete screen
    if (isset($_POST['delete_screen'])) {
        $screen_id = (int)$_POST['screen_id'];

        // Check if the screen is being used in any scheduled movies
        $check_sql = "SELECT COUNT(*) as count FROM movie_schedules WHERE screen_id = '$screen_id'";
        $check_result = mysqli_query($conn, $check_sql);
        $row = mysqli_fetch_assoc($check_result);

        if ($row['count'] > 0) {
            $error = "Cannot delete screen as it is being used in scheduled movies.";
        } else {
            // Delete screen from database
            $sql = "DELETE FROM screens WHERE id = '$screen_id'";

            if (mysqli_query($conn, $sql)) {
                $success = "Screen deleted successfully!";
            } else {
                $error = "Error: " . mysqli_error($conn);
            }
        }
    }
}

// Fetch all screens
$screens = [];
$sql = "SELECT * FROM screens ORDER BY screen_name";
$result = mysqli_query($conn, $sql);
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $screens[] = $row;
    }
}

ob_start();
?>


<div id="screens" class="p-6 space-y-6">
    <!-- Notifications -->
    <?php if (!empty($error)): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline"><?php echo $error; ?></span>
        </div>
    <?php endif; ?>

    <?php if (!empty($success)): ?>
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline"><?php echo $success; ?></span>
        </div>
    <?php endif; ?>

    <!-- Header with Add Button -->
    <div class="flex justify-between items-center">
        <h2 class="text-xl font-semibold text-gray-800">Screen Management</h2>
        <button onclick="document.getElementById('addScreenModal').classList.remove('hidden')" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Add Screen
        </button>
    </div>

    <!-- Screens Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php if (empty($screens)): ?>
            <div class="col-span-3 text-center p-6 bg-gray-50 rounded-lg border border-gray-200">
                <p class="text-gray-500">No screens found. Add a new screen to get started.</p>
            </div>
        <?php else: ?>
            <?php foreach ($screens as $screen): ?>
                <!-- Screen Card -->
                <div class="bg-white rounded-lg border border-gray-200 p-6">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800"><?php echo htmlspecialchars($screen['screen_name']); ?></h3>
                            <p class="text-sm text-gray-600"><?php echo htmlspecialchars($screen['screen_type']); ?></p>
                        </div>
                        <div class="flex space-x-2">
                            <button onclick="openEditModal(<?php echo htmlspecialchars(json_encode($screen)); ?>)" class="text-gray-400 hover:text-blue-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </button>
                            <button onclick="openDeleteModal(<?php echo (int)$screen['id']; ?>, '<?php echo htmlspecialchars($screen['screen_name'], ENT_QUOTES); ?>')" class="text-gray-400 hover:text-red-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Seating Capacity</span>
                            <span class="font-semibold text-gray-800"><?php echo (int)$screen['seating_capacity']; ?> seats</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Layout Type</span>
                            <span class="font-semibold text-gray-800"><?php echo htmlspecialchars($screen['layout_type']); ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Status</span>
                            <span class="px-2 py-1 text-xs font-semibold rounded-full <?php echo $screen['status'] === 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'; ?>">
                                <?php echo ucfirst(htmlspecialchars($screen['status'])); ?>
                            </span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <!-- Add Screen Modal -->
    <div id="addScreenModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-lg bg-white">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold text-gray-900">Add New Screen</h3>
                <button onclick="document.getElementById('addScreenModal').classList.add('hidden')" class="text-gray-400 hover:text-gray-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <form class="space-y-4" method="post" action="">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Screen Name</label>
                    <input type="text" name="screen_name" class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="Enter screen name" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Screen Type</label>
                    <select name="screen_type" class="w-full border border-gray-300 rounded-lg px-3 py-2" required>
                        <option value="">Select type</option>
                        <option value="Premium Theater">Premium Theater</option>
                        <option value="Regular Theater">Regular Theater</option>
                        <option value="VIP Theater">VIP Theater</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Seating Capacity</label>
                    <input type="number" name="seating_capacity" class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="Enter total seats" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Layout Type</label>
                    <select name="layout_type" class="w-full border border-gray-300 rounded-lg px-3 py-2" required>
                        <option value="">Select layout</option>
                        <option value="Stadium">Stadium</option>
                        <option value="Recliner">Recliner</option>
                        <option value="Classic">Classic</option>
                    </select>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" name="status" id="add_status" class="h-4 w-4 text-blue-600 border-gray-300 rounded" checked>
                    <label for="add_status" class="ml-2 block text-sm text-gray-700">Active</label>
                </div>
                <div class="flex justify-end space-x-3 pt-4">
                    <button type="button" onclick="document.getElementById('addScreenModal').classList.add('hidden')" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200">Cancel</button>
                    <button type="submit" name="add_screen" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700">Add Screen</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Screen Modal -->
    <div id="editScreenModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-lg bg-white">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold text-gray-900">Edit Screen</h3>
                <button onclick="document.getElementById('editScreenModal').classList.add('hidden')" class="text-gray-400 hover:text-gray-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <form class="space-y-4" method="post" action="" id="editScreenForm">
                <input type="hidden" name="screen_id" id="edit_screen_id">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Screen Name</label>
                    <input type="text" name="screen_name" id="edit_screen_name" class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="Enter screen name" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Screen Type</label>
                    <select name="screen_type" id="edit_screen_type" class="w-full border border-gray-300 rounded-lg px-3 py-2" required>
                        <option value="">Select type</option>
                        <option value="Premium Theater">Premium Theater</option>
                        <option value="Regular Theater">Regular Theater</option>
                        <option value="VIP Theater">VIP Theater</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Seating Capacity</label>
                    <input type="number" name="seating_capacity" id="edit_seating_capacity" class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="Enter total seats" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Layout Type</label>
                    <select name="layout_type" id="edit_layout_type" class="w-full border border-gray-300 rounded-lg px-3 py-2" required>
                        <option value="">Select layout</option>
                        <option value="Stadium">Stadium</option>
                        <option value="Recliner">Recliner</option>
                        <option value="Classic">Classic</option>
                    </select>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" name="status" id="edit_status" class="h-4 w-4 text-blue-600 border-gray-300 rounded">
                    <label for="edit_status" class="ml-2 block text-sm text-gray-700">Active</label>
                </div>
                <div class="flex justify-end space-x-3 pt-4">
                    <button type="button" onclick="document.getElementById('editScreenModal').classList.add('hidden')" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200">Cancel</button>
                    <button type="submit" name="update_screen" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700">Update Screen</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteScreenModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-lg bg-white">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold text-gray-900">Confirm Delete</h3>
                <button onclick="document.getElementById('deleteScreenModal').classList.add('hidden')" class="text-gray-400 hover:text-gray-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <form method="post" action="">
                <input type="hidden" name="screen_id" id="delete_screen_id">
                <p class="text-gray-700 mb-6">Are you sure you want to delete <span id="delete_screen_name" class="font-semibold"></span>? This action cannot be undone.</p>
                <div class="flex justify-end space-x-3">
                    <button type="button" onclick="document.getElementById('deleteScreenModal').classList.add('hidden')" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200">Cancel</button>
                    <button type="submit" name="delete_screen" class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- JavaScript for Modal Functionality -->
<script>
    // Open Edit Modal and Populate Form
    function openEditModal(screen) {
        document.getElementById('edit_screen_id').value = screen.id;
        document.getElementById('edit_screen_name').value = screen.screen_name;
        document.getElementById('edit_screen_type').value = screen.screen_type;
        document.getElementById('edit_seating_capacity').value = screen.seating_capacity;
        document.getElementById('edit_layout_type').value = screen.layout_type;
        document.getElementById('edit_status').checked = screen.status === 'active';
        document.getElementById('editScreenModal').classList.remove('hidden');
    }

    // Open Delete Confirmation Modal
    function openDeleteModal(screenId, screenName) {
        document.getElementById('delete_screen_id').value = screenId;
        document.getElementById('delete_screen_name').textContent = screenName;
        document.getElementById('deleteScreenModal').classList.remove('hidden');
    }
</script>

<?php
$content = ob_get_clean();
include 'admin_layout.php';
?>