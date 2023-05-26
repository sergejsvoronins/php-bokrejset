<?php

require 'classes/db.php';
require 'classes/review-model.php';
require 'classes/review-view.php';
require 'classes/user-model.php';
require 'classes/book-model.php';
require 'controller/review-controller.php';

$pdo = require 'partials/connect.php';

$userModel = new UserModel($pdo);
$bookModel = new BookModel($pdo);
$reviewModel = new ReviewModel($pdo);
$reviewView = new ReviewView();
$reviewController = new ReviewController($reviewModel, $reviewView);

include 'partials/header.php';
include 'partials/nav.php';

$reviewController->start($userModel->getAllUsers(), $bookModel->getAllBooks());

include 'partials/footer.php';
