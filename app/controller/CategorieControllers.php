<?php 
namespace app\controller;
use app\model\Categorie;

class CategorieControllers{
    private $CategorieModel;

    public function __construct()
    {
        $this->CategorieModel = new Categorie();

    }
    public function findAll(){
        $cours = $this->CategorieModel->findAll();
        return $cours;
    }
   public function create (){
    $this->CategorieModel->create();
}
}



?>