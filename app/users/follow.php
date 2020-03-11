<?php

// Back-end

declare(strict_types=1);

require __DIR__.'/../autoload.php';

// In this file we follow and unfollow users in the database

if (isset($_POST['follower'])) {
    $follower = (int) $_POST['follower'];
    $isFollowingUserId = (int) $_POST['following'];

    if (isFollowing($pdo, (int) $follower, (int) $isFollowingUserId)) {
        $unfollow = $pdo->prepare('DELETE FROM follows WHERE user_id = :user_id AND following_user_id = :is_following_user_id');

        if (!$unfollow) {
            die(var_dump($pdo->errorInfo()));
        }

        $unfollow->execute([
            ':user_id'              => $follower,
            ':is_following_user_id' => $isFollowingUserId,
        ]);
    } else {
        $follow = $pdo->prepare('INSERT INTO follows (user_id, following_user_id) VALUES (:user_id, :is_following_user_id)');

        if (!$follow) {
            die(var_dump($pdo->errorInfo()));
        }

        $follow->execute([
            ':user_id'              => $follower,
            ':is_following_user_id' => $isFollowingUserId,
        ]);
    }

    redirect('/');
}
