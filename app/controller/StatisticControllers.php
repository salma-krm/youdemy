<?php
namespace app\controller;
use app\model\Categorie;
use app\model\Cours;
use app\model\Tag;
use app\model\Utilisateur;

class statisticControllers{
   

    public function total()
    {
        $statisticcours = (new Cours())->getTotalCours();
        $statisticCategorie = (new Categorie())->getTotalCategorie();
        $statisticTag = (new Tag())->getTotalTag();
        $statisticUser = (new Utilisateur())->getTotalUser();

        ob_start();
        include "./app/view/statistique.php";
        $body = ob_get_clean();
        include "./app/view/nav.php";
      
       
    }
   
}
?>