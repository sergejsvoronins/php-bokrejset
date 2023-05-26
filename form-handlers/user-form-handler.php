<?php
$pdo = require '../partials/connect.php';

require '../classes/user-model.php';

$userModel = new UserModel($pdo);
if((isset($_POST["first_name"], $_POST["last_name"], $_POST["email"], $_POST["mobile"])) 
    && $_POST["first_name"] !== "" 
    && $_POST["last_name"] !== "" 
    && $_POST["email"] !== "" 
    && $_POST["mobile"] !== ""){
    $firstName = filter_var($_POST['first_name'], FILTER_SANITIZE_SPECIAL_CHARS);
    $lastName = filter_var($_POST["last_name"], FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_SPECIAL_CHARS);
    $mobile = filter_var($_POST["mobile"], FILTER_SANITIZE_SPECIAL_CHARS);
    $userModel->createUser($firstName, $lastName, $email, $mobile);
}
header("Location: ../users.php");
exit;