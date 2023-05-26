<?php
$pdo = require '../partials/connect.php';

require '../classes/author-model.php';

$authorModel = new AuthorModel($pdo);
if((isset($_POST["first_name"], $_POST["last_name"])) && $_POST["first_name"] !== "" && $_POST["last_name"] !== ""){
    $firstName = filter_var($_POST['first_name'], FILTER_SANITIZE_SPECIAL_CHARS);
    $lastName = filter_var($_POST["last_name"], FILTER_SANITIZE_SPECIAL_CHARS);
    $authorModel->createAuthor($firstName, $lastName);
}
header("Location: ../authors.php");
exit;