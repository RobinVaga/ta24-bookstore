    <?php

require_once 'connection.php';

if (isset($_GET['id'])) {
    $book_id = ($_GET['id']);
    echo "<h1>Book ID: " . $book_id . "</h1>";
} else {
    echo "<h1>No book selected.</h1>";
}

if (isset($_GET['title']) && isset($_GET['author']) && isset($_GET['pages'])) {
    $title = $_GET['title'];
    $author = $_GET['author'];
    $pages = $_GET['pages'];

    echo "<h2>Title: " . $title . "</h2>";
    echo "<h3>Author: " . $author . "</h3>";
    echo "<p>Pages: " . $pages . "</p>";
}


$stmt = $pdo->prepare('SELECT * FROM books WHERE id = :id');
$stmt->execute(['id' => $id]);

$stmt = $pdo->prepare('SELECT * FROM books WHERE pages = :pages');
$stmt->execute(['pages' => $pages]);

$stmt = $pdo->prepare('SELECT * FROM books WHERE author = :author');
$stmt->execute(['author' => $author]);

$stmt = $pdo->prepare('SELECT * FROM books WHERE title = :title');

$stmt->execute(['title' => $title]);

$book = $stmt->fetchAll();
var_dump($book);

?>  

