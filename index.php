<?php

declare(strict_types=1);

require __DIR__ . '/views/header.php';

require __DIR__ . '/views/navigation.php';

isLoggenIn();

// Fetching user information which will be displayed in the feed
$userId = (int) $_SESSION['user']['id'];
$user = getUserById((int) $userId, $pdo);

$firstName = $user['first_name'];
$lastName = $user['last_name'];
$avatar = $user['avatar'];

// var_dump($user);

// Fetching posts 
// $posts = getAllPosts($pdo);
?>

<main>
    <!-- foreach... -->
    <section class="feed">
        <div class="feed__post">
            <div class="post__header w-full">
                <img src="/app/users/avatar/<?php echo $avatar; ?>" alt="avatar">
                <h4><?php echo "$firstName $lastName"; ?></h4>
            </div>

            <div class="post__image w-full">Post image will be displayed here..</div>

            <div class="post__text-content">
                <div class="post__likes w-full"><img src="/views/icons/heart.svg" style="height:20px;"></div>
                <div class="post__caption w-full">
                    <h4><?php echo "$firstName $lastName "; ?></h4>
                    <p>Post caption</p>
                </div>
                <div class="post__comments w-full">
                    <p>Post comments</p>
                </div>
            </div>
        </div>
    </section>
</main>

<?php require(__DIR__ . '/views/footer.php'); ?>