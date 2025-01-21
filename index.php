<?php

use app\controller\CoursControllers;
use app\Controller\DashboardController;
use app\controller\statisticControllers;
use app\controller\TagControllers;
use app\controller\UtilisateurControllers;
use app\Model\Inscription;
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
        case "updateCours":
            $controller = new CoursControllers();
            $controller->update();
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
        case "updatestatus":
            $controller = new UtilisateurControllers();
            $controller->update();
            break;
            case "inscrire":
                $controller = new Inscription();
            
                $user_id=$_SESSION["authUser"]->getId() ;
                $cours_id = $_POST["cours_id"];
                $cours = $controller->checkExistingEnrollment($cours_id,$user_id);
               
            
                if ($cours ==true) {
                    echo "Le cours n'existe pas.";
                    die;
                  }else 
                   $controller->setUser_id($_SESSION["authUser"]->getId());
                    $controller->setCours_id($cours_id);
                    $controller->insecrireInCpurs();
                    header("Location: ./");
                break;

                }
                    
                    
                
            


    
} else {
    switch ($route) {

        case "home":
            $controller = new HomeController;
            $controller->index();
            break;
        case "mesCours":
            $controller = new HomeController;
            $controller->mesCours();
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
            $tag = new TagControllers();
            $tag->tag();
            break;
        case "deletetag":
            $controller = new TagControllers();
            $controller->delete();
            break;
        case "statistic":
            $statistic = new statisticControllers();
            $statistic->total();
            break;

        case "logout":
            $Logout = new AuthController();
            $Logout->Logout();
            break;

        case "signup":
            $controller = new AuthController();
            $controller->registerPage();
            break;
        case "EnseignantCours":
            $controller = new HomeController();
            $controller->EnseignantCours();
            break;


    }
}

