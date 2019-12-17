<?php
// Back-end
// Linked to in edit-profile.php (front-end)

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// In this file we edit users account email, password and biography.

if (isset($_POST['first-name'], $_POST['last-name'], $_POST['biography'])) {
    $updatedFirstName = filter_var($_POST['first-name']);
    $updatedLastName = filter_var($_POST['last-name']);
    $updatedBiography = filter_var($_POST['biography']);
    $id = $_SESSION['user']['id'];

    // Connection to database is made in autoload.php and saved in the variable $pdo

    // Preparing SQL query to update biography
    $updateStatement = $pdo->prepare('UPDATE users SET first_name = :updatedFirstName, last_name = :updatedLastName, biography = :updatedBiography WHERE id = :id');

    if (!$updateStatement) {
        // PHP doesn't print SQL errors in the browser
        die(var_dump($pdo->errorInfo()));
    }

    $updateStatement->execute([
        ':updatedFirstName' => $updatedFirstName,
        ':updatedLastName' => $updatedLastName,
        ':updatedBiography' => $updatedBiography
    ]);

    $new = $updateStatement->fetch(PDO::FETCH_ASSOC);

    // die(var_dump($new)); = bool false

    // die(var_dump($_SESSION['user']));

    $_SESSION['user']['first_name'] = $updatedFirstName;
    $_SESSION['user']['last_name'] = $updatedLastName;
    $_SESSION['user']['biography'] = $updatedBiography;

    // die(var_dump($_SESSION['user']));

    redirect('/edit-profile.php');
}
