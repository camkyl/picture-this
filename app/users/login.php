<?php

// Back-end

declare(strict_types=1);

require __DIR__.'/../autoload.php';

// In this file we login users.

if (isset($_POST['email'], $_POST['password'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    // Connection to database is made in autoload.php and saved in the variable $pdo

    // Preparing SQL query to check if the email exist
    $statement = $pdo->prepare('SELECT * FROM users WHERE email = :email');

    sqlQueryError($pdo, $statement);

    // Binding parameters with variables and running the script
    $statement->execute([
        ':email' => $email,
    ]);

    // Array with user login details
    $user = $statement->fetch(PDO::FETCH_ASSOC);

    // Email not found in database
    if (!$user['email']) {
        $_SESSION['errors'][] = 'The email entered is not found. Please register or try again.';
        redirect('/login.php');
        // Kill script if user is not found
        exit;
    }

    $hashedPassword = $user['password'];

    // Comparing user password with hashed password in database
    if (password_verify($password, $hashedPassword)) {
        unset($user['password']);
        $_SESSION['user'] = $user;

    // die(var_dump($user['first_name']));
        // array(4) { ["id"]=> string(1) "4" ["first_name"]=> string(7) "Camilla" ["last_name"]=> string(18) "Kylmänen Sjörén" ["email"]=> string(11) "cks@live.se" }
    } else {
        $_SESSION['errors'][] = 'You entered the wrong password.';
        redirect('/login.php');
        exit;
    }
}

// To start page/root
redirect('/');
