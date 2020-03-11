<?php
// Front-end

require __DIR__.'/views/header.php';

require __DIR__.'/views/navigation.php';

isLoggenIn();

?>

<section class="edit-profile">
    <div class="profile__personal flex-col">
        <?php if (isset($_SESSION['errors'][0])) { ?>
            <div class="message">
                <p class="edit-p">
                    <?php
                    displayErrorMessage();
                    ?>
                </p>
            </div>
        <?php } elseif (isset($_SESSION['messages'][0])) { ?>
            <div class="message">
                <p class="edit-p">
                    <?php
                    displayConfirmationMessage();
                    ?>
                </p>
            </div>
        <?php } ?>

        <form action="/app/users/edit-avatar.php" method="post" enctype="multipart/form-data" class="flex-col-cen">
            <h3 class>Edit profile picture:</h3>
            <div class="profile__image">
                <?php if ($_SESSION['user']['avatar'] === null) { ?>
                    <img src="/app/users/avatar/placeholder2.png" alt="Profile picture">
                <?php } else { ?>
                    <img src="/app/users/avatar/<?php echo $_SESSION['user']['avatar']; ?>">
                <?php } ?>
            </div>

            <div class="profile__image-edit">

                <input type="file" name="avatar" id="avatar">
                <button type="submit" class="mt15">Choose..</button>
            </div>

            <div class="profile__image-button flex-col-cen">
                <button type="submit">Save image</button>
            </div>
        </form>

        <form action="/app/users/edit-profile.php" method="post" class="flex-col-cen">
            <h3>Edit biography:</h3>
            <div class="personal__text flex-col-cen">
                <div class="mt15 bblg flex">
                    <label for="first-name">First name: </label>
                    <input type="text" name="first-name" value="<?php echo $_SESSION['user']['first_name']; ?>">
                </div>

                <div class="mt15 bblg flex">
                    <label for="last-name">Last name: </label>
                    <input type="text" name="last-name" value="<?php echo $_SESSION['user']['last_name']; ?>">
                </div>

                <div class="personal__biography mt15 bblg flex">
                    <label for="biography">Bio: </label>
                    <textarea type="text" name="biography"><?php echo $_SESSION['user']['biography']; ?></textarea>
                </div>

                <div class="flex-col-cen">
                    <button type="submit">Save bio</button>
                </div>
            </div>
        </form>

        <form action="/app/users/delete-account.php" method="post" class="delete-account flex-col-cen">
            <h3>Delete account:</h3>
            <p>Deleting your account deletes all your posts, likes, followers, and account information. Once deleted, this information cannot be recovered. Click on the "Delete"-button to delete.</p>
            <div class="flex-col-cen">
                <button type="submit" name="delete-account">Delete</button>
            </div>
        </form>
    </div>
</section>

<?php

require __DIR__.'/views/footer.php';

?>