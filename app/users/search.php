<?php 

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['searchval'])) {
    $search = filter_var(trim($_POST['searchval']), FILTER_SANITIZE_STRING);
    $search = preg_replace("#[^0-9a-z]#i", "", $search);




    $query = ("SELECT * FROM posts WHERE post_caption LIKE '%$search%'");
    $stmt = $pdo->prepare($query);
    if (!$stmt) {
        die(var_dump($pdo->errorInfo()));
    }
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($users as $key => $user) {
        $postPicture = "/app/posts/uploads/".$user['post_image'];
        $postCaption = $user['post_caption'];
        $postId = $user['id'];

        

             echo 
             "<form action='/search-post.php' method='post'>
             <label>
             <input style='display: none;' type='submit' name='id'value='$postId' \ >
             <div class='result-user'>
                <img src='$postPicture' alt=''>
            <p>$postCaption</p> <br>
            </div>
            </label>";

    };

};