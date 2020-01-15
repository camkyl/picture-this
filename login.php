<?php
// Front-end

require __DIR__ . '/views/header.php';

?>

<section class="log-in-page flex-col-cen">
    <img src="/views/icons/picture-this-white.svg" alt="Picture This, log in page">

    <div class="form-frame flex-col-cen">

        <h1>Log in</h1>

        <form action="/app/users/login.php" method="post" class="log-in-form">
            <?php if (isset($_SESSION['errors'][0])) : ?>
                <div class="message">
                    <!--Error message-->
                    <p>
                        <?php
                        displayErrorMessage();
                        ?>
                    </p>
                </div>
            <?php endif; ?>

            <div class="log-in-form__group flex-col">
                <label for="email">Email</label>
                <input type="email" name="email" placeholder="Type your email" class="not-logged-in-input" required>
            </div>

            <div class="log-in-form__group flex-col">
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Type your password" class="not-logged-in-input" required>
            </div>

            <div class="flex-col-cen">
                <button type="submit" class="log-in-form__button">Log in</button>
            </div>
        </form>

        <div class="log-in-page__register flex-col-cen c-white">
            <p>Don't have an account?</p>
            <a href="register.php">Sign up!</a>
        </div>

    </div> <!-- /form-frame -->
</section>