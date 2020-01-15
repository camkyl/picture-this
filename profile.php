<?php
// Front-end
declare(strict_types=1);

require __DIR__ . '/views/header.php';

require __DIR__ . '/views/navigation.php';

isLoggenIn();

$userId = (int) $_SESSION['user']['id'];
$user = getUserById((int) $userId, $pdo);

//var_dump($userId);

//die(var_dump($user));

?>

<section class="profile">
    <?php if (isset($_SESSION['errors'][0])) : ?>
        <div class="message">
            <p>
                <?php
                displayErrorMessage();
                ?>
            </p>
        </div>
    <?php elseif (isset($_SESSION['messages'][0])) : ?>
        <div class="message">
            <p>
                <?php
                displayConfirmationMessage();
                ?>
            </p>
        </div>
    <?php endif; ?>

    <div class="profile__intro">
        <div class="profile__image flex-col-cen">
            <?php if ($_SESSION['user']['avatar'] === null) : ?>
                <img src="/app/users/avatar/placeholder2.png" alt="Profile picture">
            <?php else : ?>
                <img src="/app/users/avatar/<?php echo $_SESSION['user']['avatar']; ?>">
            <?php endif; ?>
        </div>

        <h3 class="profile__name flex-cen">
            <?php echo $_SESSION['user']['first_name']; ?>
            <?php echo $_SESSION['user']['last_name']; ?>
        </h3>

        <div class="profile__stats">
            <div class="flex-col-cen">
                <h5>Posts</h5>
                <p>
                    <?php
                    $postCount = count(getPostsByUser($pdo, (int) $userId));
                    echo $postCount;
                    ?>
                </p>
            </div>
            <div class="flex-col-cen">
                <h5>Followers</h5>
                <p>
                    <?php echo followersCount($pdo, (int) $userId); ?>
                </p>
            </div>
            <div class="flex-col-cen">
                <h5>Following</h5>
                <p>
                    <?php echo followingsCount($pdo, (int) $userId); ?>
                </p>
            </div>
        </div>

        <div class="profile__bio flex-cen">
            <p>
                <?php
                if ($_SESSION['user']['biography'] === null) {
                    echo 'No bio entered';
                } else {
                    echo $_SESSION['user']['biography'];
                }
                ?>
            </p>
        </div>

        <?php if (isset($userId)) : ?>
            <div class="profile__edit flex-cen">
                <a class="" href="/edit-profile.php">Edit profile</a>
            </div>
        <?php else : ?>
            <div class="profile__follow">
                <form action="/app/users/follow.php" method="post">
                    <button name="follow" value="<?php echo $user['id']; ?>">Follow</button>
                </form>
            </div>
        <?php endif; ?>
    </div>

    <div class="profile__posts">
        <?php $postByUser = getPostsByUser($pdo, (int) $userId); ?>
        <?php foreach ($postByUser as $postImage) : ?>
            <div class="profile__posts-image">
                <img src="/app/posts/uploads/<?php echo $postImage['post_image']; ?>">
            </div>
        <?php endforeach; ?>
    </div>
</section>

<?php

require __DIR__ . '/views/footer.php';

?>