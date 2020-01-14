<?php
// Front-end
// Linked to in footer.php

declare(strict_types=1);

require __DIR__ . '/views/header.php';

require __DIR__ . '/views/navigation.php';

isLoggenIn();

// In this file users can create posts
?>

<section class="create-post flex-col-cen">
    <h2 class="mt15">New post</h2>
    <form action="/app/posts/create-post.php" method="post" enctype="multipart/form-data" class="create-post__form flex-col-cen">
        <div class="create-post__image-frame bblg btlg mt15">
            <img class="jsimage">
        </div>

        <div class="create-post__image mt15">
            <label for="post-image">Choose image..</label>
            <input type="file" name="post-image" class="jsfiles" required>
        </div>

        <div class="create-post__caption flex-col-cen mt15">
            <label for="post-caption">Caption:</label>
            <textarea name="post-caption" class="mt15"></textarea>
        </div>

        <button type="submit" class="mt15">Share</button>
    </form>
</section>

<script src="/assets/scripts/create-post.js"></script>