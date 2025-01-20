<?php

use app\controller\CoursControllers;
use app\Controller\DashboardController;
use app\controller\TagControllers;
use app\controller\UtilisateurControllers;
require 'vendor/autoload.php';
session_start();
use app\controller\CategorieControllers;
use app\controller\HomeController;
use app\controller\AuthController;



// use app\model\Utilisateur;
// use app\view\Test;
// $test = new Test();
// $test->testcourses();
// var_dump($test);

$route = $_GET["route"] ?? "home";

if (strtolower($_SERVER["REQUEST_METHOD"]) == "post") {


    switch ($route) {

        case "register":
            $controller = new AuthController();
            $controller->register();
            break;
        case "login":
            $controller = new AuthController();
            $controller->login();
            break;
        case "coursecreate":
            $controller = new CoursControllers();
            $controller->create();
            break;
        case "deleteCourse":
            $controller = new CoursControllers();
            $controller->delete();
            break;
        case "addcategory":
            $controller = new CategorieControllers();
            $controller->create();
            break;
        case "updateCategorie":
            $controller = new CategorieControllers();
            $controller->update();
            break;
        case "addtag":
            $controller = new TagControllers();
            $controller->create();
            break;
        case "deleteuser":
            $controller = new UtilisateurControllers();
            $controller->delete();
            break;
        

    }
} else {
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

        case "deletecategorie":
            $controller = new CategorieControllers();
            $controller->delete();
            break;

        case "dashboard":
            $controller = new DashboardController();
            $controller->index();
            break;
        case "users":
            $controller = new UtilisateurControllers();
            $controller->user();
            break;

        case "tag":
            $controller = new TagControllers();
            $controller->tag();
            break;
        case "deletetag":
            $controller = new TagControllers();
            $controller->delete();
            break;
         
        
    }
}
