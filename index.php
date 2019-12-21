<?php

declare(strict_types=1);

require(__DIR__ . '/views/header.php');
?>

<main>
    <section class="content">
        <!-- foreach... -->
        <div class="content__post">
            <div class="post__header w-full">
                <h3>Header</h3>
            </div>
            <div class="post__image w-full">Posts will be displayed here..</div>
            <div class="post__likes w-full"><img src="/views/icons/heart.svg" style="height:20px;"></div>
            <div class="post__caption w-full">
                <p>Post caption</p>
            </div>
            <div class="post__comments w-full">
                <p>Post comments</p>
            </div>
        </div>
    </section>

    <section class="content">
        <!-- foreach... -->
        <div class="content__post">
            <div class="post__header w-full">
                <h3>Header</h3>
            </div>
            <div class="post__image w-full">Posts will be displayed here..</div>
            <div class="post__likes w-full"><img src="/views/icons/heart.svg" style="height:20px;"></div>
            <div class="post__caption w-full">
                <p>Post caption</p>
            </div>
            <div class="post__comments w-full">
                <p>Post comments</p>
            </div>
        </div>
    </section>

    <section class="content">
        <!-- foreach... -->
        <div class="content__post">
            <div class="post__header w-full">
                <h3>Header</h3>
            </div>
            <div class="post__image w-full">Posts will be displayed here..</div>
            <div class="post__likes w-full"><img src="/views/icons/heart.svg" style="height:20px;"></div>
            <div class="post__caption w-full">
                <p>Post caption</p>
            </div>
            <div class="post__comments w-full">
                <p>Post comments</p>
            </div>
        </div>
    </section>
</main>

<?php require(__DIR__ . '/views/footer.php'); ?>