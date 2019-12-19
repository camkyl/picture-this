<?php
// Back-end

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// In this file we upload users posts

if (isset($_FILES['post-image'], $_POST['post-description'])) {
    $image = $_FILES['post-image'];
    $description = filter_var($_POST['post-description'], FILTER_SANITIZE_STRING);
    $date = date('F j, Y'); // Prints the format December 19, 2019
    $fileExtension = pathinfo($image['name'])['extension'];
    $fileName = GUID() . '.' . $fileExtension;
    $destination = __DIR__ . '/uploads/' . $fileName;
    $id = $_SESSION['user']['id'];

    // Only .png and .jpg files are allowed.
    if (!in_array($image['type'], ['image/jpeg', 'image/png'])) {
        $_SESSION['errors'][] = 'The uploaded file type is not allowed. Only .jpg and .png allowed.';
    }

    // File size equal to or lower than two megabytes allowed.
    // 2 Megabyte = 2097152 Bytes
    if ($image['size'] > 2097152) {
        $_SESSION['errors'][] = 'The uploaded file exceeded the filesize limit.';
    }

    move_uploaded_file($image['tmp_name'], $destination);

    // Connection to database is made in autoload.php and saved in the variable $pdo


}
