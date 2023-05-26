<?php

require 'classes/author-model.php';
require 'classes/author-view.php';
require 'controller/author-controller.php';



$pdo = require 'partials/connect.php';

$authorModel = new AuthorModel($pdo);
$authorView = new AuthorView();
$authorController = new AuthorController($authorModel, $authorView);
include 'partials/header.php';
include 'partials/nav.php';

$authorController->start();

include 'partials/footer.php';