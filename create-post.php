<?php
// Front-end
// Linked to in footer.php

declare(strict_types=1);

require __DIR__ . '/views/header.php';

isLoggenIn();

// In this file users can create posts
?>

<section class="create-post flex-col-cen">
    <h2>New post</h2>
    <form action="/app/posts/create-post.php" method="post" enctype="multipart/form-data" class="flex-col-cen">
        <div class="create-post__image-frame">
            <img class="create-post__image-preview">
        </div>

        <div class="create-post__image">
            <label for="post-image">Choose image..</label>
            <input type="file" id="post-image" required>
        </div>

        <div class="create-post__caption flex-col mt15">
            <label for="post-caption">Caption</label>
            <textarea name="post-caption" class="mt15"></textarea>
        </div>

        <button type="submit" class="mt15">Share</button>
    </form>
</section>