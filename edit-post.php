<?php
// Front-end
declare(strict_types=1);

require __DIR__ . '/views/header.php';

require __DIR__ . '/views/navigation.php';

isLoggenIn();

$postId = $_GET['id'];

$postToEdit = getPostByID((int) $postId, $pdo);

?>

<section class="edit-post flex-col-cen">
    <h2 class="mt15">Edit post</h2>
    <form action="/app/posts/edit-post.php?id=<?php echo $postToEdit['id']; ?>" method="post" enctype="multipart/form-data" class="flex-col-cen">
        <div class="create-post__image-frame mt15">
            <img src="/app/posts/uploads/<?php echo $postToEdit['post_image']; ?>" alt="Image to post being edited">
        </div>

        <div class="create-post__caption flex-col-cen mt15">
            <div class="align-left">
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