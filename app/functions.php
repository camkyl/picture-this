<?php
// Is required in autoload.php

declare(strict_types=1);

if (!function_exists('redirect')) {
    /**
     * Redirect the user to given path.
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
 */
function displayErrorMessage() {
    if (isset($_SESSION['errors'][0])) {

        echo $_SESSION['errors'][0];
        unset($_SESSION['errors']);
    }
}

/**
 * Redirects the user to the root directory if she/he is not authorized to enter the page without being logged in
 * 
 * @return bool
 */
function isLoggenIn()
{
    if (!isset($_SESSION['user'])) {
        redirect('/');
    }
}
