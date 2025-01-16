<?php
require 'vendor/autoload.php';
use app\controller\UtilisateurControllers;
use app\model\Utilisateur;
use app\view\Test;
$test = new Test();
$test->testcourses();
var_dump($test);

// $route = $_GET["route"] ?? "home";

// switch ($route) {
//     case "home":
//         echo "home";
    
//         break;
//     case "signup":
//         echo "signup";
//         break;
//     case "login":
//         echo "login";
//         break;

// }


