<!-- admin_layout.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title ?? 'Admin Panel'; ?></title>
</head>

<body>
    <?php include 'sidebar.php'; ?>
    <div id="main-content" class="ml-64 p-5">
        <?php echo $content ?? ''; ?>
    </div>
</body>

</html>