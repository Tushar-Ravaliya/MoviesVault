<?php
$page_title = "Edit Homepage Content";
ob_start();

require_once("../../config/connection.php");
// Process form submission
$success_message = "";
$error_message = "";

// Fetch current homepage content
$fetch_query = "SELECT * FROM homepage_content WHERE id = 1";
$result = mysqli_query($conn, $fetch_query);
$homepage_content = mysqli_fetch_assoc($result);

// If no content exists, create default
if (!$homepage_content) {
    $insert_query = "INSERT INTO homepage_content (id, content, image_path) 
                     VALUES (1, 'This is the default homepage content.', 'default_image.jpg')";
    mysqli_query($conn, $insert_query);

    $result = mysqli_query($conn, $fetch_query);
    $homepage_content = mysqli_fetch_assoc($result);
}

// Process form submission for updating homepage content
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $content = trim($_POST['content']);
    $current_image = $homepage_content['image_path'];

    // Handle image upload
    if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
        $target_dir = "../../public/Images/";

        // Create directory if it doesn't exist
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        $file_extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
        $new_filename = "homepage_image_" . time() . "." . $file_extension;
        $target_file = $target_dir . $new_filename;

        // Check file type
        $allowed_types = array('jpg', 'jpeg', 'png', 'gif');
        if (!in_array(strtolower($file_extension), $allowed_types)) {
            $error_message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        } else if ($_FILES["image"]["size"] > 5000000) { // 5MB limit
            $error_message = "Sorry, your file is too large. Maximum size is 5MB.";
        } else if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            // File uploaded successfully
            $image_path = "../../public/Images/" . $new_filename;

            // Delete old image if it's not the default
            if ($current_image != 'default_image.jpg' && file_exists("../../public/Images/" . $current_image)) {
                unlink("../../public/Images/" . $current_image);
            }
        } else {
            $error_message = "Sorry, there was an error uploading your file.";
        }
    } else {
        // Keep existing image
        $image_path = $current_image;
    }

    if (empty($content)) {
        $error_message = "Content is required";
    } else if (empty($error_message)) {
        // Update the homepage content
        $content = mysqli_real_escape_string($conn, $content);
        $image_path = mysqli_real_escape_string($conn, $image_path);

        $update_query = "UPDATE homepage_content SET 
                         content = '$content', 
                         image_path = '$image_path' 
                         WHERE id = 1";

        if (mysqli_query($conn, $update_query)) {
            $success_message = "Homepage content updated successfully";

            // Refresh the content
            $result = mysqli_query($conn, $fetch_query);
            $homepage_content = mysqli_fetch_assoc($result);
        } else {
            $error_message = "Error updating content: " . mysqli_error($conn);
        }
    }
}
?>

<div class="w-full flex flex-col items-center overflow-y-auto">
    <div class="mt-8 w-10/12">
        <h4 class="text-gray-600">
            Edit Homepage Content
        </h4>

        <div class="mt-4">
            <div class="p-6 bg-white rounded-md border border-gray-300">
                <h2 class="text-lg font-semibold text-gray-700 capitalize">
                    Homepage Content Management
                </h2>

                <form method="post" action="" enctype="multipart/form-data">
                    <div class="gap-6 mt-4">

                        <div class="mb-4">
                            <label class="text-gray-700 font-medium block mb-2" for="content">Homepage Content</label>
                            <textarea
                                class="w-full px-4 py-2 border border-gray-400 outline-none rounded-md focus:border-blue-600 focus:ring focus:ring-opacity-40 focus:ring-blue-500"
                                name="content"
                                rows="6"
                                required><?php echo htmlspecialchars($homepage_content['content']); ?></textarea>
                        </div>

                        <div class="mb-4">
                            <label class="text-gray-700 font-medium block mb-2" for="image">Homepage Image</label>
                            <?php if (!empty($homepage_content['image_path'])): ?>
                                <div class="mb-3">
                                    <p class="text-sm text-gray-600 mb-2">Current Image:</p>
                                    <img src="../../public/Images/<?php echo htmlspecialchars($homepage_content['image_path']); ?>"
                                        alt="Current Homepage Image"
                                        class="max-h-40 border border-gray-300">
                                </div>
                            <?php endif; ?>
                            <input
                                class="w-full px-4 py-2 border border-gray-400 outline-none rounded-md focus:border-blue-600 focus:ring focus:ring-opacity-40 focus:ring-blue-500"
                                type="file"
                                name="image"
                                accept="image/*">
                            <p class="text-sm text-gray-500 mt-1">Leave empty to keep current image. Max file size: 5MB.</p>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit"
                                class="px-5 py-2 text-center bg-blue-600 text-white rounded transition duration-300 hover:bg-blue-700 focus:outline-none">Update Homepage</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="p-6 mt-10 bg-white rounded-md border border-gray-300">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Preview</h3>
            <div class="border border-gray-200 p-4 rounded-md">

                <div class="flex flex-col md:flex-row gap-4">
                    <div class="md:w-1/3">
                        <img src="../../public/Images/<?php echo htmlspecialchars($homepage_content['image_path']); ?>"
                            alt="Homepage Image"
                            class="w-full rounded-md border border-gray-300">
                    </div>
                    <div class="md:w-2/3">
                        <p class="text-gray-700"><?php echo nl2br(htmlspecialchars($homepage_content['content'])); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../../node_modules/toastify-js/src/toastify.js"></script>
<script>
    function tostifyCustomClose(el) {
        const parent = el.closest('.toastify');
        const close = parent.querySelector('.toast-close');
        close.click();
    }

    window.addEventListener('load', () => {
        const callToast = (message, type = "success") => {
            const toastMarkup = `
               <div class="flex p-4">
                    <p class="text-sm ${type === "success" ? "text-green-700" : "text-red-700"}">${message}</p>
                    <div class="ms-auto">
                         <button onclick="tostifyCustomClose(this)" type="button" class="inline-flex shrink-0 justify-center items-center size-5 rounded-lg text-gray-800 opacity-50 hover:opacity-100 focus:outline-none focus:opacity-100 dark:text-white" aria-label="Close">
                              <span class="sr-only">Close</span>
                              <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"></path><path d="m6 6 12 12"></path></svg>
                         </button>
                    </div>
               </div>`;

            Toastify({
                text: toastMarkup,
                className: "hs-toastify-on:opacity-100 opacity-0 fixed -top-[150px] right-[20px] z-[90] transition-all duration-300 w-[320px] bg-white text-sm border rounded-xl shadow-lg [&>.toast-close]:hidden",
                duration: 3000,
                close: true,
                escapeMarkup: false
            }).showToast();
        };

        <?php if (!empty($success_message)): ?>
            callToast("<?php echo addslashes($success_message); ?>", "success");
        <?php endif; ?>

        <?php if (!empty($error_message)): ?>
            callToast("<?php echo addslashes($error_message); ?>", "error");
        <?php endif; ?>
    });
</script>

<?php
$content = ob_get_clean();
include 'admin_layout.php';
?>