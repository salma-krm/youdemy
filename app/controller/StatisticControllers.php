<?php
namespace app\controller;
use app\model\Cours;

class statisticControllers{
   

    public function total()
    {
        $statisticcours = (new Cours())->getTotalCours();
        
        ob_start();
        include "./app/view/statistique.php";
        $body = ob_get_clean();
        include "./app/view/nav.php";
      
       
    }
}
?>