<?php
// Front-end
declare(strict_types=1);

require __DIR__ . '/views/header.php';

isLoggenIn();

?>

<section class="profile">
    <div class="profile__bio">
        <div>
            <?php
            displayErrorMessage();
            displayConfirmationMessage();
            ?>
        </div>

        <form action="/app/users/edit-avatar.php" method="post" enctype="multipart/form-data">

            <img src="/app/users/avatar/<?php echo $_SESSION['user']['avatar']; ?>" style="width:300px;height:200px;background-color:grey;">
            <div>
                <label for="avatar">Choose an image to upload</label><br>
                <input type="file" name="avatar" id="avatar" required>
            </div>

            <button type="submit">Upload</button>
        </form>

        <form action="/app/users/edit-profile.php" method="post">
            <div>
                <label for="first-name">First name: </label>
                <input type="text" name="first-name" value="<?php echo $_SESSION['user']['first_name']; ?>">
            </div>
            <br>
            <div>
                <label for="last-name">Last name: </label>
                <input type="text" name="last-name" value="<?php echo $_SESSION['user']['last_name']; ?>">
            </div>
            <br>
            <div>
                <label for="biography">Bio: </label>
                <textarea type="text" name="biography" rows="5" cols="30"><?php echo $_SESSION['user']['biography']; ?></textarea>
            </div>

            <button type="submit">Save</button>
        </form>
    </div>
</section>