<?php 
namespace app\controller;
use app\model\Cours;
use app\config\Database;
class CoursControllers{
    private $Coursmodel;

    public function __construct()
    {
        $this->Coursmodel = new Cours();

    }
    public function findAll(){
        $cours = $this->Coursmodel->findAll();
        return $cours;
    }
   public function create (){
    $this->Coursmodel->create();
}
}
$cours = new CoursControllers();
$cours->findAll();


?>