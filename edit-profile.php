<?php
// Front-end
declare(strict_types=1);

require __DIR__ . '/views/header.php';

?>

<section class="profile">
    <div class="profile__bio">
        <div>
            <?php
            displayErrorMessage();
            displayConfirmationMessage();
            ?>
        </div>
        <!-- <?php //require __DIR__ . '/avatar.php'; 
                ?> -->
        <form action="/app/users/edit-avatar.php" method="post" enctype="multipart/form-data">
            <div><?php //echo $_SESSION['user']['avatar']; 
                    ?></div>
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
                <input type="text" name="biography" value="<?php echo $_SESSION['user']['biography']; ?>">
            </div>

            <button type="submit">Save</button>
        </form>
    </div>
</section>