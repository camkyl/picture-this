<?php

require __DIR__.'/views/header.php';

require __DIR__.'/views/navigation.php';

isLoggenIn();

$userId = (int) $_SESSION['user']['id'];

$user = getUserById((int) $userId, $pdo);

$postId = $_GET['id'];

$viewingPost = getPostByID($pdo, (int) $postId);

?>

<section class="view-post">
    <?php if (isset($_SESSION['errors'][0])) { ?>
        <div class="message">
            <p>
                <?php
                displayErrorMessage();
                ?>
            </p>
        </div>
    <?php } elseif (isset($_SESSION['messages'][0])) { ?>
        <div class="message">
            <p>
                <?php
                displayConfirmationMessage();
                ?>
            </p>
        </div>
    <?php } ?>

    <div class="feed__post">
        <div class="post__header bblg w-full">
            <div class="post__header-profile">
                <img src="/app/users/avatar/<?php echo $user['avatar']; ?>" alt="avatar">
                <h4><?php echo $user['first_name'].' '.$user['last_name']; ?></h4>
            </div>

            <div class="post__header-edit">
                <?php if ($userId == $viewingPost['user_id']) { ?>
                    <!--Edit post-button - shown if the post belongs to the user-->
                    <a href="/edit-post.php?id=<?php echo $viewingPost['id']; ?>" title="Edit post"><button>Edit</button></a>
                <?php } ?>
            </div>
        </div>

        <div class="post__image">
            <img src="/app/posts/uploads/<?php echo $viewingPost['post_image']; ?>" alt="Post image">
        </div>

        <?php
        $likedPost = userHasLiked($pdo, (int) $userId, (int) $postId);
        $userThatHasLiked = $likedPost['liked_by_user_id'];
        ?>
        <div class="post__text-content">
            <div class="post__text-content-header w-full">
                <div class="flex">
                    <form action="/app/posts/like.php" method="post">
                        <button class="like-button" name="like-post" value="<?php echo $viewingPost['id']; ?>">
                            <?php if ($userThatHasLiked == $userId) { ?>
                                <img src="/views/icons/liked.svg" alt="Post is liked">
                            <?php } else { ?>
                                <img src="/views/icons/heart.svg" alt="Post is not liked">
                            <?php } ?>
                        </button>
                    </form>

                    <img src="/views/icons/comment.svg" alt="Comment">
                </div>

                <div class="date">
                    <p>
                        <?php
                        $postedDate = $viewingPost['date'];
                        echo postedAgo($postedDate);
                        ?>
                    </p>
                </div>
            </div>

            <div class="number-of-likes">
                <?php
                $likes = numberOfLikes($pdo, (int) $postId);
                ?>
                <?php foreach ($likes as $like) { ?>
                    <?php if ($like == 0) { ?>
                        <h5>Be the first one to like this post</h5>
                    <?php } elseif ($like == 1) { ?>
                        <h5><?php echo $like; ?> person likes this</h5>
                    <?php } else { ?>
                        <h5><?php echo $like; ?> people likes this</h5>
                    <?php } ?>
                <?php } ?>
            </div>

            <div class="post__caption w-full">
                <h5><?php echo $user['first_name'].' '.$user['last_name']; ?></h5>
                <p><?php echo $viewingPost['post_caption']; ?></p>
            </div>

            <div class="post__comments w-full">
                <p>Post comments..</p>
            </div>
        </div>
    </div>
</section>

<?php

require __DIR__.'/views/footer.php';

?>