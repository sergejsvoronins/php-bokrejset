<?php
require 'classes/user-view.php';
require 'classes/user-model.php';
require 'controller/user-controller.php';

$pdo = require 'partials/connect.php';
$userModel = new UserModel($pdo);
$userView = new UserView();
$userController = new UserController($userModel, $userView);
include 'partials/header.php';
include 'partials/nav.php';

$userController->start();

include 'partials/footer.php';