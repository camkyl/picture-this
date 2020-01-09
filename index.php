<?php

declare(strict_types=1);

require __DIR__ . '/views/header.php';

require __DIR__ . '/views/navigation.php';

isLoggenIn();

$userId = (int) $_SESSION['user']['id'];

// Fetching posts 
$posts = getAllPosts($pdo);

//var_dump($posts[1]);

?>

<main>
    <section class="feed">
        <?php foreach ($posts as $post) : ?>
            <div class="feed__post">
                <div class="post__header bblg w-full">
                    <img src="/app/users/avatar/<?php echo $post['avatar']; ?>" alt="avatar">
                    <h4><?php echo $post['first_name'] . ' ' . $post['last_name']; ?></h4>
                </div>

                <div class="post__image">
                    <img src="/app/posts/uploads/<?php echo $post['post_image'] ?>" alt="Post image">
                </div>

                <div class="post__text-content">
                    <div class="post__likes w-full">
                        <img src="/views/icons/heart.svg" alt="Heart">
                        <img src="/views/icons/comment.svg" alt="Comment">
                    </div>

                    <div class="post__caption w-full">
                        <h4><?php echo $post['first_name'] . ' ' . $post['last_name']; ?></h4>
                        <p><?php echo $post['post_caption']; ?></p>
                    </div>

                    <div class="post__comments w-full">
                        <p>Post comments..</p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </section>
</main>

<?php require(__DIR__ . '/views/footer.php'); ?>