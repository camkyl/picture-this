<?php
// Front-end

declare(strict_types=1);

require __DIR__ . '/views/header.php';

?>

<section class="sign-up-page">
    <h1>Sign up</h1>
    <form action="/app/users/register.php" method="post" class="sign-up-form">
        <div class="error-message">
            <?php
            displayErrorMessage();
            ?>
        </div>

        <div class="sign-up-form__first-name">
            <label for="first-name">First name</label>
            <input type="text" name="first-name" placeholder="First name..." class="not-logged-in-input" required>
        </div>

        <div class="sign-up-form__last-name">
            <label for="last-name">Last name</label>
            <input type="text" name="last-name" placeholder="Last name..." class="not-logged-in-input" required>
        </div>

        <div class="sign-up-form__email">
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="name@email.com" class="not-logged-in-input" required>
        </div>

        <div class="sign-up-form__password">
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Password" class="not-logged-in-input" required>
        </div>

        <button type="submit" class="sign-in-form__button">Sign up</button>
    </form>

    <div class="sign-up-page__login">
        <p>Have an account?</p>
        <a href="login.php">Sign in!</a>
    </div>
</section>