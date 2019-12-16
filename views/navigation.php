<?php // Is required in header.php 
?>

<nav>
    <a href="/index.php">Home</a>
    <?php if (!isset($_SESSION['user'])) : ?>
        <!--This menu item is shown if the user is not logged in-->
        <a href="/login.php">Login</a>
    <?php else : ?>
        <!--This menu item is shown if the user is logged in-->
        <a href="/app/users/logout.php">Logout</a>
    <?php endif; ?>
    <?php if (isset($_SESSION['user'])) : ?>
        <a href="/profile.php">Profile</a>
    <?php endif; ?>
</nav>