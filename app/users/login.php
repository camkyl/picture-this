<?php
// Back-end

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// In this file we login users.

if (isset($_POST['email'], $_POST['password'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    // Connection to database is made in autoload.php and saved in the variable $pdo

    // Preparing SQL query to check if the email exist
    $statement = $pdo->prepare('SELECT * FROM users WHERE email = :email');

    if (!$statement) {
        // PHP doesn't print SQL errors in the browser
        die(var_dump($pdo->errorInfo()));
    }

    // Binding parameters with variables and running the script
    $statement->execute([
        ':email' => $email
    ]);

    // Array with user login details
    $user = $statement->fetch(PDO::FETCH_ASSOC);

    // die(var_dump($user));

    // Email not found in database
    if (!$user['email']) {
        $_SESSION['email-not-found'] = 'Email not found.';
        redirect('/login.php');
        // Kill script if user is not found
        exit;
    }

    $hashedPassword = $user['password'];

    // Comparing user password with hashed password in database
    if (password_verify($password, $hashedPassword)) {
        unset($user['password']);
        $_SESSION['user'] = $user;
    } else {
        $_SESSION['error'] = 'You entered the wrong password';
        redirect('/login.php');
        exit;
    }
}

// To start page/root
redirect('/');
