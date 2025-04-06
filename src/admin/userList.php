<?php
$page_title = "Admin Dashboard";
ob_start();
require_once '../../config/connection.php';

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $error = "";
    $success = "";

    // Check if it's an edit operation
    if (isset($_POST['user_id']) && !empty($_POST['user_id'])) {
        // Edit existing user
        $user_id = $_POST['user_id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $number = $_POST['number'];
        $status = $_POST['status'];
        $role = $_POST['role'];

        // Check if password is being updated
        if (!empty($_POST['password'])) {
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $sql = "UPDATE users SET name=?, email=?, number=?, password=?, status=?, role=? WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssssi", $name, $email, $number, $password, $status, $role, $user_id);
        } else {
            $sql = "UPDATE users SET name=?, email=?, number=?, status=?, role=? WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssi", $name, $email, $number, $status, $role, $user_id);
        }

        // Handle profile picture upload for edit
        if (isset($_FILES['pic']) && $_FILES['pic']['error'] == 0) {
            $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png");
            $filename = $_FILES['pic']['name'];
            $filetype = $_FILES['pic']['type'];
            $filesize = $_FILES['pic']['size'];

            // Verify file extension
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if (array_key_exists($ext, $allowed)) {
                // Verify file size - 5MB maximum
                $maxsize = 5 * 1024 * 1024;
                if ($filesize < $maxsize) {
                    // Rename the file to prevent duplicates
                    $new_filename = uniqid() . "." . $ext;
                    $destination = "../../public/profile/" . $new_filename;

                    if (move_uploaded_file($_FILES['pic']['tmp_name'], $destination)) {
                        // Update database with new image path
                        $sql_img = "UPDATE users SET pic=? WHERE id=?";
                        $stmt_img = $conn->prepare($sql_img);
                        $stmt_img->bind_param("si", $new_filename, $user_id);
                        $stmt_img->execute();
                    }
                } else {
                    $error = "File size exceeds the maximum limit";
                }
            } else {
                $error = "Invalid file format. Only JPG, JPEG, and PNG types are accepted.";
            }
        }

        if ($stmt->execute()) {
            $success = "User updated successfully!";
        } else {
            $error = "Error updating user: " . $conn->error;
        }
    } else {
        // Add new user
        $name = $_POST['name'];
        $email = $_POST['email'];
        $number = $_POST['number'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $status = isset($_POST['status']) ? $_POST['status'] : 'inactive';
        $role = isset($_POST['role']) ? $_POST['role'] : 'user';
        $pic = 'profile-pic.png'; // Default profile picture

        // Check if email already exists
        $check_sql = "SELECT id FROM users WHERE email = ?";
        $check_stmt = $conn->prepare($check_sql);
        $check_stmt->bind_param("s", $email);
        $check_stmt->execute();
        $check_result = $check_stmt->get_result();

        if ($check_result->num_rows > 0) {
            $error = "Email already exists. Please use a different email.";
        } else {
            // Handle profile picture upload for new user
            if (isset($_FILES['pic']) && $_FILES['pic']['error'] == 0) {
                $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png");
                $filename = $_FILES['pic']['name'];
                $filetype = $_FILES['pic']['type'];
                $filesize = $_FILES['pic']['size'];

                // Verify file extension
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if (array_key_exists($ext, $allowed)) {
                    // Verify file size - 5MB maximum
                    $maxsize = 5 * 1024 * 1024;
                    if ($filesize < $maxsize) {
                        // Rename the file to prevent duplicates
                        $new_filename = uniqid() . "." . $ext;
                        $destination = "../../public/profile/" . $new_filename;

                        if (move_uploaded_file($_FILES['pic']['tmp_name'], $destination)) {
                            $pic = $new_filename;
                        }
                    } else {
                        $error = "File size exceeds the maximum limit";
                    }
                } else {
                    $error = "Invalid file format. Only JPG, JPEG, and PNG types are accepted.";
                }
            }

            if (empty($error)) {
                $sql = "INSERT INTO users (name, email, password, number, status, role, pic) VALUES (?, ?, ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sssssss", $name, $email, $password, $number, $status, $role, $pic);

                if ($stmt->execute()) {
                    $success = "User added successfully!";
                } else {
                    $error = "Error adding user: " . $conn->error;
                }
            }
        }
    }
}

// Handle delete operation
if (isset($_GET['delete']) && !empty($_GET['delete'])) {
    $user_id = $_GET['delete'];

    // Delete user
    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);

    if ($stmt->execute()) {
        $success = "User deleted successfully!";
    } else {
        $error = "Error deleting user: " . $conn->error;
    }
}

// Get user details for edit
$edit_user = null;
if (isset($_GET['edit']) && !empty($_GET['edit'])) {
    $user_id = $_GET['edit'];
    $sql = "SELECT * FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $edit_user = $result->fetch_assoc();
}

// Retrieve all users
$sql = "SELECT * FROM users ORDER BY created_at DESC";
$users = $conn->query($sql);
?>

<head>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.2.1/js/dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>

<div id="customers" class="p-6 bg-gray-50">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-900">Customer Management</h2>
        <div class="flex gap-2">
            <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200 flex items-center" onclick="openUserModal()">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Add User
            </button>
        </div>
    </div>

    <?php if (isset($error) && !empty($error)): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline"><?php echo $error; ?></span>
        </div>
    <?php endif; ?>

    <?php if (isset($success) && !empty($success)): ?>
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline"><?php echo $success; ?></span>
        </div>
    <?php endif; ?>

    <div class="overflow-x-auto" data-hs-datatable='{
        "pageLength": 5,
        "pagingOptions": {
            "pageBtnClasses": "min-w-[40px] flex justify-center items-center text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 py-2.5 text-sm rounded-full disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:focus:bg-neutral-700 dark:hover:bg-neutral-700"
        },
        "language": {
            "zeroRecords": "<div class=\"py-10 px-5 flex flex-col justify-center items-center text-center\"><svg class=\"shrink-0 size-6 text-gray-500 dark:text-neutral-500\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><circle cx=\"11\" cy=\"11\" r=\"8\"/><path d=\"m21 21-4.3-4.3\"/></svg><div class=\"max-w-sm mx-auto\"><p class=\"mt-2 text-sm text-gray-600 dark:text-neutral-400\">No search results</p></div></div>"
        }
      }'>
        <div class="flex items-center space-x-2 mb-4">
            <div class="bg-white p-4 rounded-lg border border-gray-200 mb-6">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Search Reviews</label>
                        <input type="text" placeholder="Movie, user or review content..." name="hs-table-filter-search" id="hs-table-filter-search" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" data-hs-datatable-search="">
                    </div>


                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Page</label>
                        <select class="hidden" data-hs-select='{
        "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span data-title></span></button>",
        "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-2 px-3 pe-9 flex text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 before:absolute before:inset-0 before:z-[1] dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-200 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800",
        "dropdownClasses": "mt-2 z-50 w-20 max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",
        "optionClasses": "py-2 px-3 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-md focus:outline-none focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
        "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-blue-600 dark:text-blue-500\" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>",
        "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-neutral-500\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
      }' data-hs-datatable-page-entities="">
                            <option value="5" selected="">5</option>
                            <option value="10">10</option>
                            <option value="15">15</option>
                            <option value="20">20</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <table id="usersTable" class="min-w-full divide-y divide-gray-200 border">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contact</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created At</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <?php if ($users->num_rows > 0): ?>
                    <?php while ($row = $users->fetch_assoc()): ?>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-full" src="../../public/profile/<?php echo htmlspecialchars($row['pic']); ?>" alt="Profile Image">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900"><?php echo htmlspecialchars($row['name']); ?></div>
                                        <div class="text-sm text-gray-500"><?php echo htmlspecialchars($row['email']); ?></div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900"><?php echo htmlspecialchars($row['number'] ?? 'Not provided'); ?></div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900"><?php echo ucfirst(htmlspecialchars($row['role'])); ?></div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <?php if ($row['status'] == 'active'): ?>
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Active
                                    </span>
                                <?php else: ?>
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                        Inactive
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <?php echo date('M d, Y H:i', strtotime($row['created_at'])); ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="?edit=<?php echo $row['id']; ?>" class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</a>
                                <a href="?delete=<?php echo $row['id']; ?>" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">No users found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <div class="mt-6 flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-700" data-hs-datatable-info="">
                    Showing <span class="font-medium" data-hs-datatable-info-from=""></span>
                    to <span class="font-medium" data-hs-datatable-info-to=""></span>
                    of <span class="font-medium" data-hs-datatable-info-length=""></span> Reviews
                </p>
            </div>
            <div class="flex gap-2">
                <button class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50" data-hs-datatable-paging-prev="">Previous</button>
                <button class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50" data-hs-datatable-paging-next="">Next</button>
            </div>
        </div>
    </div>
</div>

<!-- User Modal (Add/Edit) -->
<div id="userModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-lg bg-white">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold text-gray-900" id="modalTitle">Add New User</h3>
            <button onclick="closeUserModal()" class="text-gray-400 hover:text-gray-500">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <form action="" method="POST" enctype="multipart/form-data" class="space-y-4">
            <input type="hidden" name="user_id" id="user_id" value="<?php echo isset($edit_user) ? $edit_user['id'] : ''; ?>">

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                <input type="text" name="name" id="name" class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="Enter name" value="<?php echo isset($edit_user) ? $edit_user['name'] : ''; ?>" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email" id="email" class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="Enter Email" value="<?php echo isset($edit_user) ? $edit_user['email'] : ''; ?>" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                <input type="text" name="number" id="number" class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="Enter phone number" value="<?php echo isset($edit_user) ? $edit_user['number'] : ''; ?>">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Password <?php echo isset($edit_user) ? '(Leave blank to keep current)' : ''; ?></label>
                <input type="password" name="password" id="password" class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="Enter password" <?php echo isset($edit_user) ? '' : 'required'; ?>>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <select name="status" id="status" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                    <option value="active" <?php echo (isset($edit_user) && $edit_user['status'] == 'active') ? 'selected' : ''; ?>>Active</option>
                    <option value="inactive" <?php echo (isset($edit_user) && $edit_user['status'] == 'inactive') ? 'selected' : ''; ?>>Inactive</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Role</label>
                <select name="role" id="role" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                    <option value="user" <?php echo (isset($edit_user) && $edit_user['role'] == 'user') ? 'selected' : ''; ?>>User</option>
                    <option value="admin" <?php echo (isset($edit_user) && $edit_user['role'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
                    <option value="operator" <?php echo (isset($edit_user) && $edit_user['role'] == 'operator') ? 'selected' : ''; ?>>Operator</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Profile Picture</label>
                <?php if (isset($edit_user) && $edit_user['pic'] != 'profile-pic.png'): ?>
                    <div class="mb-2">
                        <img src="../../public/profile/<?php echo $edit_user['pic']; ?>" alt="Current Profile" class="h-20 w-20 object-cover rounded-full">
                        <p class="text-xs text-gray-500 mt-1">Current profile picture</p>
                    </div>
                <?php endif; ?>
                <input type="file" name="pic" id="pic" class="w-full border border-gray-300 rounded-lg px-3 py-2" accept="image/jpeg,image/png,image/jpg">
            </div>

            <div class="flex justify-end space-x-3 pt-4">
                <button type="button" onclick="closeUserModal()" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200">Cancel</button>
                <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                    <?php echo isset($edit_user) ? 'Update User' : 'Add User'; ?>
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    // Show modal for adding new user or editing existing user
    function openUserModal() {
        document.getElementById('userModal').classList.remove('hidden');
        document.getElementById('modalTitle').innerText = '<?php echo isset($edit_user) ? 'Edit User' : 'Add New User'; ?>';
    }

    // Close user modal
    function closeUserModal() {
        document.getElementById('userModal').classList.add('hidden');
    }

    // Search functionality
    // document.getElementById('searchInput').addEventListener('keyup', function() {
    //     const value = this.value.toLowerCase();
    //     const table = document.getElementById('usersTable');
    //     const rows = table.getElementsByTagName('tr');

    //     for (let i = 1; i < rows.length; i++) {
    //         const rowText = rows[i].textContent.toLowerCase();
    //         rows[i].style.display = rowText.includes(value) ? '' : 'none';
    //     }
    // });

    // Initialize DataTable when available
    // document.addEventListener('DOMContentLoaded', function() {
    //     if (typeof $.fn.DataTable !== 'undefined') {
    //         $('#usersTable').DataTable({
    //             pageLength: 10,
    //             responsive: true,
    //             dom: 'Bfrtip',
    //             buttons: [
    //                 'copy', 'excel', 'pdf'
    //             ]
    //         });
    //     }
    // });

    // Show modal if edit parameter is present
    <?php if (isset($edit_user)): ?>
        document.addEventListener('DOMContentLoaded', function() {
            openUserModal();
        });
    <?php endif; ?>

    // Show toast messages
    <?php if (isset($success) && !empty($success)): ?>
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof toastr !== 'undefined') {
                toastr.success('<?php echo $success; ?>');
            }
        });
    <?php endif; ?>

    <?php if (isset($error) && !empty($error)): ?>
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof toastr !== 'undefined') {
                toastr.error('<?php echo $error; ?>');
            }
        });
    <?php endif; ?>
</script>

<?php
$content = ob_get_clean();
include 'admin_layout.php';
?>