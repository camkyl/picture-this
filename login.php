<?php
// Front-end
declare(strict_types=1);

require __DIR__ . '/views/header.php';

?>

<section class="sign-in-page">
    <h1>Sign in</h1>
    <form action="/app/users/login.php" method="post" class="sign-in-form">
        <div class="error-message">
            <!--Error message-->
            <?php
            displayErrorMessage();
            ?>
        </div>

        <div class="sign-in-form__email">
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="Email" class="not-logged-in-input" required>
        </div>

        <div class="sign-in-form__password">
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Password" class="not-logged-in-input" required>
        </div>

        <button type="submit" class="sign-in-form__button">Sign in</button>
    </form>
    <div class="sign-in-page__register">
        <p>Don't have an account?</p>
        <a href="register.php">Sign up!</a>
    </div>
</section>