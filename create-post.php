<?php
// Front-end
// Linked to in footer.php

declare(strict_types=1);

require __DIR__ . '/views/header.php';

isLoggenIn();

// In this file users can create posts
?>

<section class="create-post">
    <h2>Create post</h2>
    <form action="/app/posts/create-post.php" method="post" enctype="multipart/form-data">
        <div class="create-post__image-frame">
            <img class="create-post__image-preview">
        </div>

        <div class="create-post__image">
            <label for="post-image">Choose an image..</label>
            <input type="file" id="post-image" required>
        </div>

        <div class="create-post__caption">
            <label for="post-caption">Caption</label>
            <textarea name="post-caption" placeholder="Write a caption..."></textarea>
        </div>
        <button type="submit">Share</button>
    </form>
</section>