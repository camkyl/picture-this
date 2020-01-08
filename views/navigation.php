<?php // Is required in header.php 
?>
<header>

    <div class="navigation__back">
        <?php //if (isset($_SESSION['user'])) : 
        ?>
        <!--This menu item is shown if the user is logged in-->

        <img src="/views/icons/back.svg" alt="Back" onclick="history.back(-1)">

        <?php //endif; 
        ?>
    </div>

    <div class="navigation__home">
        <a href="/index.php">
            <img src="/views/icons/picture-this-black.svg" alt="Home">
        </a>
    </div>

    <div class="navigation__logout">
        <a href="/app/users/logout.php">
            <img src="/views/icons/logout.svg" alt="Log out">
        </a>
    </div>

</header>