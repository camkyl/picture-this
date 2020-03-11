<?php
// Front-end

require __DIR__.'/views/header.php';

?>

<section class="sign-up-page flex-col-cen">

    <img src="/views/icons/picture-this-white.svg" alt="Picture This, sign up page">

    <div class="form-frame flex-col-cen">

        <h1>Sign up</h1>

        <form action="/app/users/register.php" method="post" class="sign-up-form">
            <?php if (isset($_SESSION['errors'][0])) { ?>
                <div class="message">
                    <p>
                        <?php
                        displayErrorMessage();
                        ?>
                    </p>
                </div>
            <?php } ?>

            <div class="sign-up-form__group flex-col">
                <label for="first-name">First name</label>
                <input type="text" name="first-name" placeholder="Type your first name" class="not-logged-in-input" required>
            </div>

            <div class="sign-up-form__group flex-col">
                <label for="last-name">Last name</label>
                <input type="text" name="last-name" placeholder="Type your last name" class="not-logged-in-input" required>
            </div>

            <div class="sign-up-form__group flex-col">
                <label for="email">Email</label>
                <input type="email" name="email" placeholder="Type your email" class="not-logged-in-input" required>
            </div>

            <div class="sign-up-form__group flex-col">
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Type your password" class="not-logged-in-input" required>
            </div>

            <div class="flex-col-cen">
                <button type="submit" class="sign-up-form__button">Sign up</button>
            </div>
        </form>

        <div class="sign-up-page__login flex-col-cen c-white">
            <p>Have an account?</p>
            <a href="login.php">Log in!</a>
        </div>
    </div> <!-- /form-frame -->
</section>