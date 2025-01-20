<?php
namespace App\Controller;

use app\model\Categorie;
use app\model\Cours;
use app\model\Tag;

class DashboardController
{
    public function index()
    {
        $courses = (new Cours())->findAll();
      
        $cat = new Categorie();
        $cats = $cat->findAll();
        $tags = new Tag();
        $tags = $tags->findAll();
        ob_start();
        include "./app/view/cours.php";
        $body = ob_get_clean();
        include "./app/view/nav.php";
    }
}