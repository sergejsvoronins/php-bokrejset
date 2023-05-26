<?php
$pdo = require '../partials/connect.php';

require '../classes/user-model.php';

$userModel = new UserModel($pdo);
if((isset($_POST["user_id"], $_POST["first_name"], $_POST["last_name"], $_POST["email"], $_POST["mobile"])) 
    && $_POST["first_name"] !== "" 
    && $_POST["last_name"] !== "" 
    && $_POST["email"] !== "" 
    && $_POST["mobile"] !== ""){

    $userId = filter_var((int)$_POST['user_id'], FILTER_SANITIZE_NUMBER_INT);
    $firstName = filter_var($_POST['first_name'], FILTER_SANITIZE_SPECIAL_CHARS);
    $lastName = filter_var($_POST["last_name"], FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_SPECIAL_CHARS);
    $mobile = filter_var($_POST["mobile"], FILTER_SANITIZE_SPECIAL_CHARS);
    $userModel->updateUser($firstName, $lastName, $email, $mobile, $userId);
}
header("Location: ../users.php?user-id={$userId}");
exit;