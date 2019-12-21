<?php
// Front-end
// Linked to in footer.php

declare(strict_types=1);

require __DIR__ . '/views/header.php';

// In this file users can create posts
?>

<section class="create-post">
    <form action="/app/posts/create-post.php" method="post" enctype="multipart/form-data">
        <div class="create-post__image-frame">
            <img class="create-post__image-preview">
        </div>
        <div class="create-post__image">
            <label for="post-image"></label>
            <input type="file" name="post-image" required>
        </div>

        <div class="create-post__caption">
            <label for="post-caption"></label>
            <input type="text" name="post-caption" placeholder="Write a caption...">
        </div>
        <button type="submit">Share</button>
    </form>
</section>