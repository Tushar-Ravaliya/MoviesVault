<?php
$page_title = "Admin Dashboard";
ob_start();
// This would be at the top of your theaters.php or theater_details.php file
include("../../config/connection.php");

// Process screen form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'add_screen') {
    $theater_id = filter_var($_POST['theater_id'], FILTER_VALIDATE_INT);
    $screen_name = htmlspecialchars(trim($_POST['screen_name']));
    $screen_type = htmlspecialchars(trim($_POST['screen_type']));
    $seating_capacity = filter_var($_POST['seating_capacity'], FILTER_VALIDATE_INT);

    // Validate inputs
    if (!$theater_id || !$screen_name || !$screen_type || !$seating_capacity) {
        $_SESSION['error_message'] = "All fields are required.";
    } else {
        try {
            // Insert screen data
            $stmt = $conn->prepare("INSERT INTO theater_screens (theater_id, screen_name, screen_type, seating_capacity)
VALUES (?, ?, ?, ?)");

            $stmt->bind_param("issi", $theater_id, $screen_name, $screen_type, $seating_capacity);

            if ($stmt->execute()) {
                $_SESSION['success_message'] = "Screen added successfully!";

                // Update total screens count in theaters table
                $update_stmt = $conn->prepare("UPDATE theaters SET total_screens = (SELECT COUNT(*) FROM theater_screens WHERE theater_id = ?) WHERE id = ?");
                $update_stmt->bind_param("ii", $theater_id, $theater_id);
                $update_stmt->execute();
            } else {
                $_SESSION['error_message'] = "Error adding screen: " . $stmt->error;
            }
        } catch (Exception $e) {
            $_SESSION['error_message'] = "Database error: " . $e->getMessage();
        }
    }

    // Redirect back to the theater details page
    header("Location: theater_details.php?id=" . $theater_id);
    exit();
}

// Fetch theater details for the modal
$theater_id = isset($_GET['id']) ? filter_var($_GET['id'], FILTER_VALIDATE_INT) : 0;
$theater_data = null;

if ($theater_id) {
    $stmt = $conn->prepare("SELECT id, title FROM theaters WHERE id = ?");
    $stmt->bind_param("i", $theater_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $theater_data = $result->fetch_assoc();
}

// Fetch existing screens for this theater
$screens = [];
if ($theater_id) {
    $stmt = $conn->prepare("SELECT id, screen_name, screen_type, seating_capacity FROM theater_screens WHERE theater_id = ? ORDER BY screen_name");
    $stmt->bind_param("i", $theater_id);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $screens[] = $row;
    }
}
?>

<!-- Add this to your theater_details.php page -->
<section class="p-6 bg-white">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800"><?php echo htmlspecialchars($theater_data['title']); ?> - Screens</h1>
            <p class="text-gray-600 mt-1">Manage screens and seating capacity</p>
        </div>
        <button onclick="openAddScreenModal()" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Add Screen
        </button>
    </div>

    <?php if (empty($screens)): ?>
        <div class="bg-gray-50 p-6 rounded-lg text-center">
            <p class="text-gray-500">No screens have been added yet. Click the "Add Screen" button to get started.</p>
        </div>
    <?php else: ?>
        <!-- Screens list -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr class="bg-gray-50">
                        <th class="py-3 px-4 text-left text-sm font-medium text-gray-600">Screen Name</th>
                        <th class="py-3 px-4 text-left text-sm font-medium text-gray-600">Type</th>
                        <th class="py-3 px-4 text-left text-sm font-medium text-gray-600">Seats</th>
                        <th class="py-3 px-4 text-left text-sm font-medium text-gray-600">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <?php foreach ($screens as $screen): ?>
                        <tr>
                            <td class="py-3 px-4 text-sm text-gray-700"><?php echo htmlspecialchars($screen['screen_name']); ?></td>
                            <td class="py-3 px-4 text-sm text-gray-700">
                                <?php
                                $type_badges = [
                                    'premium' => '<span class="px-2 py-1 bg-purple-100 text-purple-800 rounded-full text-xs">Premium</span>',
                                    'regular' => '<span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-xs">Regular</span>',
                                    'vip' => '<span class="px-2 py-1 bg-amber-100 text-amber-800 rounded-full text-xs">VIP</span>',
                                    'imax' => '<span class="px-2 py-1 bg-red-100 text-red-800 rounded-full text-xs">IMAX</span>',
                                    '3d' => '<span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs">3D</span>'
                                ];
                                echo $type_badges[$screen['screen_type']] ?? htmlspecialchars($screen['screen_type']);
                                ?>
                            </td>
                            <td class="py-3 px-4 text-sm text-gray-700"><?php echo htmlspecialchars($screen['seating_capacity']); ?></td>
                            <td class="py-3 px-4 text-sm space-x-2">
                                <button onclick="openEditScreenModal(<?php echo $screen['id']; ?>)" class="text-blue-600 hover:text-blue-800">Edit</button>
                                <button onclick="confirmDeleteScreen(<?php echo $screen['id']; ?>)" class="text-red-600 hover:text-red-800">Delete</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</section>

<!-- Add Screen Modal -->
<div id="addScreenModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-lg bg-white">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold text-gray-900">Add New Screen</h3>
            <button onclick="closeAddScreenModal()" class="text-gray-400 hover:text-gray-500">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <form id="addScreenForm" method="POST" action="" class="space-y-4">
            <input type="hidden" name="action" value="add_screen">
            <input type="hidden" name="theater_id" value="<?php echo $theater_id; ?>">

            <div>
                <label for="screen_name" class="block text-sm font-medium text-gray-700 mb-1">Screen Name*</label>
                <input type="text" id="screen_name" name="screen_name" class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="Enter screen name (e.g. Screen 1)" required>
            </div>

            <div>
                <label for="screen_type" class="block text-sm font-medium text-gray-700 mb-1">Screen Type*</label>
                <select id="screen_type" name="screen_type" class="w-full border border-gray-300 rounded-lg px-3 py-2" required>
                    <option value="">Select type</option>
                    <option value="premium">Premium Theater</option>
                    <option value="regular">Regular Theater</option>
                    <option value="vip">VIP Theater</option>
                    <option value="imax">IMAX</option>
                    <option value="3d">3D</option>
                </select>
            </div>

            <div>
                <label for="seating_capacity" class="block text-sm font-medium text-gray-700 mb-1">Seating Capacity*</label>
                <input type="number" id="seating_capacity" name="seating_capacity" min="1" max="1000" class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="Enter total seats" required>
            </div>

            <div class="flex justify-end space-x-3 pt-4">
                <button type="button" onclick="closeAddScreenModal()" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200">Cancel</button>
                <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700">Add Screen</button>
            </div>
        </form>
    </div>
</div>

<!-- JavaScript for Modal Control -->
<script>
    function openAddScreenModal() {
        document.getElementById('addScreenModal').classList.remove('hidden');
        document.getElementById('screen_name').focus();
    }

    function closeAddScreenModal() {
        document.getElementById('addScreenModal').classList.add('hidden');
        document.getElementById('addScreenForm').reset();
    }

    function openEditScreenModal(screenId) {
        // You can implement this function to fetch screen details and populate a similar modal for editing
        alert('Edit screen ' + screenId + ' functionality will be implemented here');
    }

    function confirmDeleteScreen(screenId) {
        if (confirm('Are you sure you want to delete this screen? This action cannot be undone.')) {
            // You can implement the delete functionality here or redirect to a delete endpoint
            window.location.href = 'delete_screen.php?id=' + screenId + '&theater_id=<?php echo $theater_id; ?>';
        }
    }

    // Close modal when clicking outside the modal content
    window.addEventListener('click', function(event) {
        const modal = document.getElementById('addScreenModal');
        if (event.target === modal) {
            closeAddScreenModal();
        }
    });

    // Form validation
    document.getElementById('addScreenForm').addEventListener('submit', function(event) {
        const screenName = document.getElementById('screen_name').value.trim();
        const screenType = document.getElementById('screen_type').value;
        const seatingCapacity = document.getElementById('seating_capacity').value;

        if (!screenName || !screenType || !seatingCapacity) {
            event.preventDefault();
            alert('All fields are required.');
            return;
        }

        if (seatingCapacity < 1 || seatingCapacity > 1000) {
            event.preventDefault();
            alert('Seating capacity must be between 1 and 1000.');
            return;
        }
    });

    // Show toast notifications
    window.addEventListener('load', function() {
        <?php if (isset($_SESSION['success_message'])): ?>
            callToast("<?php echo $_SESSION['success_message']; ?>", "success");
            <?php unset($_SESSION['success_message']); ?>
        <?php endif; ?>

        <?php if (isset($_SESSION['error_message'])): ?>
            callToast("<?php echo $_SESSION['error_message']; ?>", "error");
            <?php unset($_SESSION['error_message']); ?>
        <?php endif; ?>
    });
</script>

<?php
$content = ob_get_clean();
include 'admin_layout.php';
?>