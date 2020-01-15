<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// In this file we delete posts in the database.

$post = getPostById($pdo, (int) $_GET['id']);

$postUserId = $post['user_id'];
$loggedInUserId = $_SESSION['user']['id'];

if ($postUserId === $loggedInUserId) {
    $postId = $post['id'];

    // Preparing SQL query to delete post from database
    $statement = $pdo->prepare('DELETE FROM posts WHERE id = :id');

    sqlQueryError($pdo, $statement);

    $statement->execute([
        ':id' => $postId
    ]);

    // Preparing SQL query to delete post likes from database
    $statement = $pdo->prepare('DELETE FROM likes WHERE post_id = :id');

    sqlQueryError($pdo, $statement);

    $statement->execute([
        ':id' => $postId
    ]);

    $_SESSION['messages'][0] = 'Your post was successfully deleted.';

    redirect('/');
}
