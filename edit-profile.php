<?php
// Front-end
declare(strict_types=1);

require __DIR__ . '/views/header.php';

require __DIR__ . '/views/navigation.php';

isLoggenIn();

?>

<section class="edit-profile">
    <div class="profile__personal flex-col">
        <div class="message">
            <?php
            displayErrorMessage();
            displayConfirmationMessage();
            ?>
        </div>

        <form action="/app/users/edit-avatar.php" method="post" enctype="multipart/form-data" class="personal__avatar flex-col-cen">
            <div class="profile__image">
                <?php if ($_SESSION['user']['avatar'] === null) : ?>
                    <img src="/app/users/avatar/placeholder2.png" alt="Profile picture">
                <?php else : ?>
                    <img src="/app/users/avatar/<?php echo $_SESSION['user']['avatar']; ?>">
                <?php endif; ?>
            </div>
            <div class="profile__image-edit">
                <label for="avatar">Edit profile picture</label>
                <input type="file" name="avatar" id="avatar" required>
                <button type="submit" class="mt15">Choose..</button>
            </div>
        </form>

        <form action="/app/users/edit-profile.php" method="post" class="personal__text flex-col-cen">
            <div class="mt15 bblg w50">
                <label for="first-name">First name: </label>
                <input type="text" name="first-name" value="<?php echo $_SESSION['user']['first_name']; ?>">
            </div>

            <div class="mt15 bblg w50">
                <label for="last-name">Last name: </label>
                <input type="text" name="last-name" value="<?php echo $_SESSION['user']['last_name']; ?>">
            </div>

            <div class="personal__biography mt15 bblg w50">
                <label for="biography">Bio: </label>
                <textarea type="text" name="biography"><?php echo $_SESSION['user']['biography']; ?></textarea>
            </div>

            <div class="flex-col-cen">
                <button type="submit">Save</button>
            </div>
        </form>
    </div>
</section>

<?php

require __DIR__ . '/views/footer.php';

?>