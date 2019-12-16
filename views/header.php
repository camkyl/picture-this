<?php
// Is required in index.php

declare(strict_types=1);

require(__DIR__ . '/../app/autoload.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.min.css">
    <link rel="stylesheet" href="/assets/styles/main.css">
    <link rel="stylesheet" href="/assets/styles/login.css">
    <link rel="stylesheet" href="/assets/styles/register.css">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Source+Sans+Pro|Ubuntu&display=swap');
    </style>
    <title>Picture this</title>
</head>

<body>
    <?php require(__DIR__ . '/navigation.php');
