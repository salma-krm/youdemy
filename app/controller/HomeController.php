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
}