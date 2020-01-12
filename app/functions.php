<?php
// Is required in autoload.php

declare(strict_types=1);

if (!function_exists('redirect')) {
    /**
     * Redirect the user to given path
     *
     * @param string $path
     *
     * @return void
     */
    function redirect(string $path)
    {
        header("Location: ${path}");
        exit;
    }
}

/**
 * Displays error messages if they occur 
 * 
 * @return void
 */
function displayErrorMessage()
{
    if (isset($_SESSION['errors'][0])) {

        echo $_SESSION['errors'][0];
        unset($_SESSION['errors']);
    }
}

/**
 * Messages confirming success
 * 
 * @return void
 */
function displayConfirmationMessage()
{
    if (isset($_SESSION['messages'][0])) {

        echo $_SESSION['messages'][0];
        unset($_SESSION['messages']);
    }
}

/**
 * Redirects the user to the login page if she/he is not authorized to enter the page without being logged in
 * 
 * @return bool
 */
function isLoggenIn()
{
    if (!isset($_SESSION['user'])) {
        redirect('/login.php');
    }
}

/**
 * Generates a random number
 * Used for profile avatars
 * https://www.php.net/manual/en/function.com-create-guid.php
 * 
 * @return void
 */
function GUID()
{
    if (function_exists('com_create_guid') === true) {
        return trim(com_create_guid(), '{}');
    }

    return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
}

/**
 * Function printing SQL error
 * 
 * @param PDO $pdo
 * @param object $statement
 * 
 * @return array 
 */
function sqlQueryError($pdo, $statement)
{
    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }
}

/**
 * Returns user data
 * 
 * @param int $userId
 * @param PDO $pdo
 * 
 * @return array 
 */
function getUserById(int $userId, PDO $pdo)
{
    $statement = $pdo->prepare('SELECT * FROM users WHERE id = :id');

    sqlQueryError($pdo, $statement);

    $statement->execute([
        ':id' => $userId
    ]);

    $user = $statement->fetch(PDO::FETCH_ASSOC);

    return $user;
}

/**
 * Returns all posts
 * 
 * @param PDO $pdo
 * 
 * @return array
 */
function getAllPosts($pdo)
{
    $statement = $pdo->prepare('SELECT posts.id, posts.user_id, posts.post_image, posts.post_caption, posts.date, users.first_name, users.last_name, users.avatar FROM posts JOIN users ON posts.user_id = users.id ORDER BY posts.date DESC');

    sqlQueryError($pdo, $statement);

    $statement->execute();

    $posts = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $posts;
}

/**
 * Returns post by id
 * 
 * @param int $postId
 * @param PDO $pdo
 * 
 * @return array
 */
function getPostById(int $postId, PDO $pdo)
{
    $statement = $pdo->prepare('SELECT * FROM posts WHERE id = :id');

    sqlQueryError($pdo, $statement);

    $statement->execute([
        'id' => $postId
    ]);

    $post = $statement->fetch(PDO::FETCH_ASSOC);

    return $post;
}

/**
 * Checking if user has liked post
 * 
 * @param PDO $pdo
 * @param int $userId
 * @param int $postId
 * 
 * @return array 
 */
function userHasLiked(PDO $pdo, int $userId, int $postId)
{
    $statement = $pdo->prepare('SELECT * FROM likes WHERE post_id = :post_id AND liked_by_user_id = :user_id');

    sqlQueryError($pdo, $statement);

    $statement->execute([
        ':user_id' => $userId,
        ':post_id' => $postId,
    ]);

    $isLiked = $statement->fetch(PDO::FETCH_ASSOC);

    return $isLiked;
}

/**
 * Get number of likes on a post
 * 
 * @param PDO $pdo
 * @param int $postId
 * 
 * @return int
 */
function numberOfLikes(PDO $pdo, int $postId)
{
    $statement = $pdo->prepare('SELECT COUNT(post_id) FROM likes where post_id = :post_id');

    sqlQueryError($pdo, $statement);

    $statement->execute([
        ':post_id' => $postId
    ]);

    $likes = $statement->fetch(PDO::FETCH_ASSOC);

    return $likes;
}
