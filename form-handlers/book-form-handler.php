<?php

require '../classes/book-model.php';

$pdo = require '../partials/connect.php';

$bookModel = new BookModel($pdo);

if(isset($_POST["title"], $_POST["year"], $_POST["author_id"])){
    $title = filter_var($_POST['title'], FILTER_SANITIZE_SPECIAL_CHARS);
    $year = filter_var((int)$_POST["year"], FILTER_SANITIZE_NUMBER_INT);
    $authorId = filter_var((int)$_POST["author_id"], FILTER_SANITIZE_NUMBER_INT);
    echo $authorId;
    $bookModel->createBook($title, $year, $authorId);
}
header("Location: ../books.php");
exit;