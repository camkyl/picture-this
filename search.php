<?php

require __DIR__ . '/views/header.php';

require __DIR__ . '/views/navigation.php';

?>

    <div class="search-body">

        <div class="search-container">
            <form action="search.php" method="post">
                <input class="search-field" type="text" name="search" placeholder="search" autocomplete="off" onkeydown="searchq();">
            </form>
        </div>

        <div class="result-container" id="output">
            

        </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="/assets/scripts/search.js"></script>

<?php require __DIR__ . '/views/footer.php'; ?>