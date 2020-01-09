<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// In this file we delete new posts in the database.

if (isset($_SESSION['user'], $_POST['id'])) {
    // DELETE * FROM users where id = :id AND user_id = :user_id (get user_id from SESSION)
    // above deletes user
}

redirect('/');
