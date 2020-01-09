<?php
// Front-end
declare(strict_types=1);

require __DIR__ . '/views/header.php';
require __DIR__ . '/views/navigation.php';

isLoggenIn();
?>

<section class="edit-post">
    <h2 class="mt15">Edit post</h2>
    <form action="/app/posts/create-post.php" method="post" enctype="multipart/form-data" class="flex-col-cen">
        <div class="">
            <img src="<?php ?>">
        </div>

        <div class="create-post__caption flex-col mt15">
            <label for="post-caption">Caption:</label>
            <textarea name="post-caption" class="mt15">hej</textarea>
        </div>

        <button type="submit" class="mt15">Share</button>
    </form>
</section>