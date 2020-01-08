<?php
// Back-end

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// In this file we upload users posts

if (isset($_FILES['post-image'], $_POST['post-caption'])) {
    $image = $_FILES['post-image'];
    $caption = filter_var($_POST['post-caption'], FILTER_SANITIZE_STRING);
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

    // Preparing SQL query to insert post to database
    $statement = $pdo->prepare("INSERT INTO posts (post_image, post_caption, user_id) VALUES (:filename, :caption, :user_id)");

    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }

    // Binding parameters with variables and running the script
    $statement->execute([
        ':filename' => $fileName,
        ':caption' => $caption,
        ':user_id' => $id
    ]);

    redirect('/');
}
