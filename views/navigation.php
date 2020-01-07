<?php // Is required in header.php 
?>
<header>

    <div class="navigation__add">
        <?php if (isset($_SESSION['user'])) : ?>
            <!--This menu item is shown if the user is logged in-->
            <a href="/create-post.php">
                <img src="/views/icons/add2.svg" alt="Add post">
            </a>
        <?php endif; ?>
    </div>

    <div class="navigation__home">
        <a href="/index.php">
            <img src="/views/icons/picture-this-black.svg" alt="Home">
        </a>
    </div>

    <nav>
        <?php if (!isset($_SESSION['user'])) : ?>
            <!--This menu item is shown if the user is not logged in-->
            <a href="/login.php">Login</a>
        <?php else : ?>
            <!--This menu item is shown if the user is logged in-->
            <a href="/app/users/logout.php">Logout</a>
        <?php endif; ?>
        <!-- <?php //if (isset($_SESSION['user'])) : 
                ?>
        <a href="/profile.php">Profile</a>
    <?php //endif; 
    ?> -->
    </nav>

</header>