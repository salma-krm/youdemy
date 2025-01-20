<?php
namespace App\Controller;

use app\model\Cours;


class HomeController

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
    public function index()
    {
        $cat = new HomeController();
        $courses = $cat->findAll();
        include "./app/view/home.php";
       
    }
    public function mesCours()
    {
         $id = ($_SESSION["authUser"])->getId();
        $courses =   $this->Coursmodel->findInscriCours($id);    
        var_dump($courses) ;
    }
}