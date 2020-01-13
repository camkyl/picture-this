<?php

declare(strict_types=1);

require __DIR__ . '/views/header.php';

require __DIR__ . '/views/navigation.php';

isLoggenIn();

// Logged in user:
$userId = (int) $_SESSION['user']['id'];

$user = getUserById((int) $userId, $pdo);

?>

<main>
    <section class="feed">
        <div class="message">
            <?php
            displayErrorMessage();
            displayConfirmationMessage();
            ?>
        </div>

        <?php
        $posts = getAllPosts($pdo);
        foreach ($posts as $post) :
            $postId = $post['id'];
            $postUser = (int) $post['user_id'];
        ?>
            <div class="feed__post">
                <div class="post__header bblg w-full">
                    <div class="post__header-profile">
                        <img src="/app/users/avatar/<?php echo $post['avatar']; ?>" alt="avatar">
                        <h4><?php echo $post['first_name'] . ' ' . $post['last_name']; ?></h4>
                    </div>

                    <div class="post__header-edit">
                        <?php if ($userId == $post['user_id']) : ?>
                            <!--Edit post-button - shown if the post belongs to the user-->
                            <a href="/edit-post.php?id=<?php echo $post['id']; ?>" title="Edit post"><button>Edit</button></a>
                        <?php endif; ?>
                    </div>

                    <?php
                    isFollowing($pdo, (int) $userId, (int) $postUser);
                    // $follower = $follow['user_id'];
                    // var_dump($follow);
                    // var_dump($userId);
                    ?>
                    <div class="profile__follow">
                        <form action="/app/users/follow.php" method="post">
                            <input type="hidden" name="following" value="<?php echo $postUser; ?>"></input>
                            <?php if (isFollowing($pdo, (int) $userId, (int) $postUser)) : ?>
                                <button name="follower" value="<?php echo $userId; ?>">Unfollow</button>
                            <?php elseif (!isFollowing($pdo, (int) $userId, (int) $postUser)) : ?>
                                <button name="follower" value="<?php echo $userId; ?>">Follow</button>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>

                <div class="post__image">
                    <img src="/app/posts/uploads/<?php echo $post['post_image'] ?>" alt="Post image">
                </div>

                <?php
                $likedPost = userHasLiked($pdo, (int) $userId, (int) $postId);
                $userThatHasLiked = $likedPost['liked_by_user_id'];
                ?>
                <div class="post__text-content">
                    <div class="post__likes w-full">
                        <form action="/app/posts/like.php" method="post">
                            <button class="like-button" name="like-post" value="<?php echo $post['id']; ?>">
                                <?php if ($userThatHasLiked == $userId) : ?>
                                    <img src="/views/icons/liked.svg" alt="Post is liked">
                                <?php else : ?>
                                    <img src="/views/icons/heart.svg" alt="Post is not liked">
                                <?php endif; ?>
                            </button>
                        </form>
                        <img src="/views/icons/comment.svg" alt="Comment">
                    </div>

                    <div class="number-of-likes">
                        <?php
                        $likes = numberOfLikes($pdo, (int) $postId);
                        ?>
                        <?php foreach ($likes as $like) : ?>
                            <?php if ($like == 0) : ?>
                                <h5>Be the first one to like this post</h5>
                            <?php elseif ($like == 1) : ?>
                                <h5><?php echo $like; ?> person likes this</h5>
                            <?php else : ?>
                                <h5><?php echo $like; ?> people likes this</h5>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>

                    <div class="post__caption w-full">
                        <h5><?php echo $post['first_name'] . ' ' . $post['last_name']; ?></h5>
                        <p><?php echo $post['post_caption']; ?></p>
                    </div>

                    <div class="post__comments w-full">
                        <p>Post comments..</p>
                    </div>

                    <!-- <div>
                        <p><?php //echo $post['date']; 
                            ?></p>
                    </div> -->
                </div>
            </div>
        <?php endforeach; ?>
    </section>
</main>

<?php require __DIR__ . '/views/footer.php'; ?>