<?php
// Front-end
declare(strict_types=1);

require __DIR__ . '/views/header.php';

require __DIR__ . '/views/navigation.php';

isLoggenIn();

$userId = $_SESSION['user']['id'];
$user = getUserById((int) $userId, $pdo);

//die(var_dump($user));
?>

<section class="profile">
    <div class="profile__intro">
        <div class="profile__image flex-col-cen">
            <img src="/app/users/avatar/<?php echo $_SESSION['user']['avatar']; ?>">
        </div>

        <h3 class="profile__name flex-cen">
            <?php echo $_SESSION['user']['first_name']; ?>
            <?php echo $_SESSION['user']['last_name']; ?>
        </h3>

        <div class="profile__stats">
            <div class="flex-col-cen">
                <h5>Posts</h5>
                <p> 1 <?php //echo $_SESSION['user']['']; 
                        ?></p>
            </div>
            <div class="flex-col-cen">
                <h5>Followers</h5>
                <p> 49 <?php //echo $_SESSION['user']['']; 
                        ?></p>
            </div>
            <div class="flex-col-cen">
                <h5>Following</h5>
                <p> 20 <?php //echo $_SESSION['user']['']; 
                        ?></p>
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
        <p>posts will be desiplayed here..</p>
    </div>
</section>

<?php

require __DIR__ . '/views/footer.php';

?>