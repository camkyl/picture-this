<?php

// Back-end
// Linked to in edit-profile.php (front-end)

declare(strict_types=1);

require __DIR__.'/../autoload.php';

// In this file we delete a user and its information from the database

if (isset($_POST['delete-account'])) {
    $userId = (int) $_SESSION['user']['id'];
    $user = getUserById($userId, $pdo);
    //die(var_dump($_POST));

    // Deleting user
    $statement = $pdo->prepare('DELETE FROM users WHERE id = :user_id');

    sqlQueryError($pdo, $statement);

    $statement->execute([
        ':user_id' => $userId,
    ]);

    // Deleting posts from user
    $statement = $pdo->prepare('DELETE FROM posts WHERE user_id = :user_id');

    sqlQueryError($pdo, $statement);

    $statement->execute([
        ':user_id' => $userId,
    ]);

    // Deleting likes from user
    $statement = $pdo->prepare('DELETE FROM likes WHERE liked_by_user_id = :user_id');

    sqlQueryError($pdo, $statement);

    $statement->execute([
        ':user_id' => $userId,
    ]);

    // Deleting followings from user
    $statement = $pdo->prepare('DELETE FROM follows WHERE user_id = :user_id');

    sqlQueryError($pdo, $statement);

    $statement->execute([
        ':user_id' => $userId,
    ]);

    redirect('/register.php');
}
