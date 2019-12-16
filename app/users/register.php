<?php
// Back-end

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// In this file we register users

// Array containing all error messages
$_SESSION['errors'] = [];

if (isset($_POST['first-name'], $_POST['last-name'], $_POST['email'], $_POST['password'])) {
    // die(var_dump($_POST));
    $firstName = filter_var($_POST['first-name'], FILTER_SANITIZE_STRING);
    $lastName = filter_var($_POST['last-name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Connection to database is made in autoload.php and saved in the variable $pdo

    // Preparing SQL query to check if the email exist
    // An email can't be used twice
    $statement = $pdo->prepare('SELECT * FROM users WHERE email = :email');

    if (!$statement) {
        // PHP doesn't print SQL errors in the browser
        die(var_dump($pdo->errorInfo()));
    }

    // Binding parameters with variables and running the script
    $statement->execute([
        ':email' => $email,
    ]);

    // Array with user information from input field
    $isEmailExisting = $statement->fetch(PDO::FETCH_ASSOC);

    // var_dump($email);
    // die(var_dump($isEmailExisting['email']));

    // Email already exists in database 
    if ($isEmailExisting['email'] === $email) {
        // Error message printed in register.php (front-end) and user redirected back to register page
        $_SESSION['errors'][] = 'Email exists';
        redirect('/register.php');
        // Stop script from running if email exists
        exit;
    }

    // Preparing SQL query to insert user input to database
    $registration = $pdo->prepare('INSERT INTO users (first_name, last_name, email, password) VALUES (:first_name, :last_name, :email, :password)');

    if (!$registration) {
        // PHP doesn't print SQL errors in the browser
        die(var_dump($pdo->errorInfo()));
    }

    // Binding parameters with variables and running the script
    $registration->execute([
        ':first_name' => $firstName,
        ':last_name' => $lastName,
        ':email' => $email,
        ':password' => $hashedPassword
    ]);

    // User registered
    $_SESSION['success'] = 'Registration succeeded';

    redirect('/');
}
