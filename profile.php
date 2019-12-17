<?php
// Front-end
declare(strict_types=1);

require __DIR__ . '/views/header.php';

?>

<section class="profile">
    <div>
        <div class="image">Image</div>
        <h3>Name</h3>
        <p><?php echo $_SESSION['user']['first_name']; ?></p>
        <h3>Bio</h3>
        <p><?php
            if ($_SESSION['user']['biography'] === null) {
                echo 'No bio entered';
            } else {
                echo $_SESSION['user']['biography'];
            }
            ?></p>

        <a href="/edit-profile.php">Edit profile</a>
    </div>
</section>