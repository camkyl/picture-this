<?php
// Front-end

require __DIR__.'/views/header.php';

require __DIR__.'/views/navigation.php';

isLoggenIn();

$postId = $_GET['id'];

$postToEdit = getPostByID($pdo, (int) $postId);

?>

<section class="edit-post flex-col-cen">
    <div class="edit-post__heading">
        <h2 class="mt15">Edit post</h2>
    </div>

    <form action="/app/posts/edit-post.php?id=<?php echo $postToEdit['id']; ?>" method="post" enctype="multipart/form-data" class="edit-post-content flex-col-cen">
        <div class="edit-post__image-frame mt15">
            <img src="/app/posts/uploads/<?php echo $postToEdit['post_image']; ?>" alt="Image being edited">
        </div>

        <div class="edit-post__caption flex-col-cen mt15">
            <div class="edit-post-label">
                <label for="edit-post-caption">Edit caption:</label>
            </div>
            <textarea name="edit-post-caption" class="mt15"><?php echo $postToEdit['post_caption']; ?></textarea>
        </div>

        <button type="submit" class="mt15">Update</button>
    </form>

    <form action="/app/posts/delete-post.php?id=<?php echo $postToEdit['id']; ?>" method="post" class="flex-col-cen">
        <button class="delete-post-button">Delete post</button>
    </form>
</section>