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
