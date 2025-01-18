<?php
namespace app\controller;
use app\model\Cours;

class CoursControllers
{
    private $Coursmodel;

    public function __construct()
    {
        $this->Coursmodel = new Cours();

    }
    public function findAll()
    {
        $cours = $this->Coursmodel->findAll();
        return $cours;
    }
    public function create()
    {
        $this->Coursmodel->create();
        header('location:../view/cours.php');
    }
    public function delete()
    {
        if (isset($_GET['id'])) {
            $this->Coursmodel->delete($_GET['id']);
            header('location:../view/cours.php');


        }

    }
}



?>