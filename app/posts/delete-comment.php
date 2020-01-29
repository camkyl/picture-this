<?php 

require __DIR__ . '/../autoload.php';

if (isset($_POST['post-id-delete'])) {
    
     $postId = $_POST['post-id-delete'];

    $statement = $pdo->prepare('DELETE FROM comments WHERE comment_id = :id');

    sqlQueryError($pdo, $statement);

    $statement->execute([
        'id' => $postId,
    ]);

};
redirect('/');