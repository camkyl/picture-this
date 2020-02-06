<?php 

require __DIR__ . '/../autoload.php';


if (isset($_POST['comment'], $_POST['post-id'], $_POST['first-name'])) {

    if ($_POST['comment'] == '') {
        redirect('/');
    }
    
    $postId = $_POST['post-id'];
    $Comment = trim($_POST['comment']);
    $firstName = $_POST['first-name'];
    $dateAndTime = date("Y-m-d-h-i-s-a");

    $statement = $pdo->prepare('INSERT INTO comments (post_id, content, username, date_posted) VALUES(:id, :comment, :fistname, :date)');

    sqlQueryError($pdo, $statement);

    $statement->execute([
        'id' => $postId,
        'comment' => $Comment,
        'fistname' => $firstName,
        'date' => $dateAndTime
    ]);

};
redirect('/');