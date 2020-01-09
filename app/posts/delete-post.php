<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// In this file we delete posts in the database.

$post = getPostById((int) $_GET['id'], $pdo);

$postUserId = $post['user_id'];
$loggedInUserId = $_SESSION['user']['id'];

if ($postUserId === $loggedInUserId) {
    $postId = $post['id'];

    // Preparing SQL query to delete post from database
    $statement = $pdo->prepare('DELETE FROM posts WHERE id = :id');

    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }

    $statement->execute([
        ':id' => $postId
    ]);

    $_SESSION['messages'][0] = 'Your post was successfully deleted.';

    redirect('/');
}
