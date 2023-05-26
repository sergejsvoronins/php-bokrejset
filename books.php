<?php

require 'classes/book-model.php';
require 'classes/book-view.php';
require 'classes/author-model.php';
require 'controller/book-controller.php';



$pdo = require 'partials/connect.php';

$bookModel = new BookModel($pdo);
$bookView = new BookView();
$authorModel = new AuthorModel($pdo);
include 'partials/header.php';
include 'partials/nav.php';

$bookController = new BookController($bookModel, $bookView);
$bookController->start($authorModel->getAllAuthors());
include 'partials/footer.php';