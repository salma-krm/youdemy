<?php

use app\controller\TagControllers;
require 'vendor/autoload.php';
session_start();
use app\controller\CategorieControllers;
use app\controller\HomeController;
use app\controller\AuthController;
$userControllers= new TagControllers();
 $userControllers->update();


// use app\model\Utilisateur;
// use app\view\Test;
// $test = new Test();
// $test->testcourses();
// var_dump($test);

$route = $_GET["route"] ?? "home";

if ($_SERVER["REQUEST_METHOD"] != "post") {
    switch ($route) {
        case "home":
            $controller = new HomeController;
            $controller->index();
            break;
        case "login":
            $controller = new AuthController();
            $controller->loginPage();
            break;
        case "categorie":
            $controller = new CategorieControllers();
            $controller->categorie();
            
            break;
    }
}
