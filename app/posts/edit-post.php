<?php
// Back-end

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// In this file we edit users posts in the database

if (isset($_POST['edit-post-caption'])) {
    $editedCaption = filter_var($_POST['edit-post-caption'], FILTER_SANITIZE_STRING);
    $postId = $_GET['id'];

    $statement = $pdo->prepare('UPDATE posts SET post_caption = :editedCaption WHERE id = :postId');

    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }

    $statement->execute([
        ':editedCaption' => $editedCaption,
        ':postId' => $postId
    ]);

    redirect('/profile.php');
}
