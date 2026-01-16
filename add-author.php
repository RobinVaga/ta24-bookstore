<?php

require_once('./connection.php');

$bookId = $_POST['book_id'];
$authorId = $_POST['author_id'];

if ( !$bookId || !$authorId || !isset($_POST['action']) || $_POST['action'] != 'add-author' ) {
    echo 'Viga: vigane URL!';
    exit();
}

try {
    $stmt = $pdo->prepare('INSERT INTO book_authors (book_id, author_id) VALUES (:book_id, :author_id);');
    $stmt->execute([
        'book_id' => $bookId,
        'author_id' => $authorId,
    ]);
} catch (PDOException $e) {
    // It's good practice to log the error. For the user, we can just redirect.
    // error_log($e->getMessage());
}

header("Location: ./edit.php?id={$bookId}");
die();