<?php
// Back-end
// Linked to in edit-profile.php (front-end)

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// In this file we edit users account email, password and biography.

$_SESSION['messages'] = [];

if (isset($_POST['first-name'], $_POST['last-name'], $_POST['biography'])) {
    // die(var_dump($_POST['first-name'])); - working!!
    $updatedFirstName = filter_var($_POST['first-name']);
    $updatedLastName = filter_var($_POST['last-name']);
    $updatedBiography = filter_var($_POST['biography']);
    $id = $_SESSION['user']['id'];

    // Connection to database is made in autoload.php and saved in the variable $pdo

    // Preparing SQL query to update user information
    $statement = $pdo->prepare('UPDATE users SET first_name = :updatedFirstName, last_name = :updatedLastName, biography = :updatedBiography WHERE id = :id');

    if (!$statement) {
        // PHP doesn't print SQL errors in the browser
        die(var_dump($pdo->errorInfo()));
    }

    // Binding parameters with variables and running the script
    $statement->execute([
        ':updatedFirstName' => $updatedFirstName,
        ':updatedLastName' => $updatedLastName,
        ':updatedBiography' => $updatedBiography,
        ':id' => $id
    ]);

    // Preparing SQL query to fetch the updated user information
    $statementtwo = $pdo->prepare('SELECT first_name, last_name, biography FROM users WHERE id = :id');

    $statementtwo->execute([
        ':id' => $id
    ]);

    $fetchNewUserInfo = $statementtwo->fetch(PDO::FETCH_ASSOC);

    // View updated information in the profile page
    $_SESSION['user']['first_name'] = $fetchNewUserInfo['first_name'];
    $_SESSION['user']['last_name'] = $fetchNewUserInfo['last_name'];
    $_SESSION['user']['biography'] = $fetchNewUserInfo['biography'];

    // Confirmation message displayed on client side
    $_SESSION['messages'][] = 'Profile successfully updated!';

    redirect('/profile.php');
}
