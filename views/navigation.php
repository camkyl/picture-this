<?php
// Is required in header.php 
?>

<header>

    <div class="navigation__back">
        <img src="/views/icons/back.svg" title="Previous page" alt="Back" onclick="history.back(-1)">
    </div>

    <div class="navigation__home">
        <a href="/index.php" title="Home">
            <img src="/views/icons/picture-this-black.svg" alt="Home">
        </a>
    </div>

    <div class="navigation__logout">
        <a href="/app/users/logout.php" title="Log out">
            <img src="/views/icons/logout.svg" alt="Log out">
        </a>
    </div>

</header>