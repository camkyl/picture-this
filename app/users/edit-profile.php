<?php
// Back-end
// Linked to in edit-profile.php (front-end)

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// In this file we edit users account email, password and biography.

$_SESSION['messages'] = [];

if (isset($_FILES['avatar'])) {
    //die(var_dump($_FILES['avatar']));
    // array(5) { 
    // ["name"]=> string(7) "hej.jpg" 
    // ["type"]=> string(10) "image/jpeg" 
    // ["tmp_name"]=> string(66) "/private/var/folders/dp/f8nxyp614sn4n6yxjy7dzcgc0000gn/T/phpjXJga1" 
    // ["error"]=> int(0) 
    // ["size"]=> int(23940) }
    $avatar =  $_FILES['avatar'];
    $fileExtension = pathinfo($avatar['name'])['extension'];
    $fileName = GUID() . '.' . $fileExtension;
    $destination = __DIR__ . '/avatar/' . $fileName;
    $id = $_SESSION['user']['id'];

    // Only .png and .jpg files are allowed.
    if (!in_array($avatar['type'], ['image/jpeg', 'image/png'])) {
        $_SESSION['errors'][0] = 'The uploaded file type is not allowed. Only .jpg and .png allowed.';
        redirect('/edit-profile.php');
    }

    // File size equal to or lower than two megabytes allowed.
    // 2 Megabyte = 2097152 Bytes
    if ($avatar['size'] > 2097152) {
        $_SESSION['errors'][] = 'The uploaded file exceeded the filesize limit.';
        redirect('/edit-profile.php');
    }

    move_uploaded_file($avatar['tmp_name'], $destination);

    // Connection to database is made in autoload.php and saved in the variable $pdo

    // Preparing SQL query to insert/update image
    $statement = $pdo->prepare('UPDATE users SET avatar = :avatar WHERE id = :id');

    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }

    // Binding parameters with variables and running the script
    $statement->execute([
        ':avatar' => $fileName,
        ':id' => $id,
    ]);

    $selectingUser = $pdo->prepare('SELECT avatar FROM users WHERE id = :id');

    $selectingUser->execute([
        ':id' => $id,
    ]);

    $user = $selectingUser->fetch(PDO::FETCH_ASSOC);

    // Updating old session avatar to current avatar
    $_SESSION['user']['avatar'] = $user['avatar'];

    $_SESSION['messages'][0] = 'Image successfully uploaded!';

    redirect('/edit-profile.php');
}


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
