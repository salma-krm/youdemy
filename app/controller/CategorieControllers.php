<?php
namespace app\controller;
use app\model\Categorie;

define("URl", "http://localhost:8081/youdemy/");
class CategorieControllers
{
    private $CategorieModel;
    public function __construct()
    {
        $this->CategorieModel = new Categorie();

    }
    public function findAll()
    {
        $cours = $this->CategorieModel->findAll();
        return $cours;
    }
    public function create()
    {
        if (isset($_POST['submit']) && !empty($_POST['nom']) && !empty($_POST['description'])) {

            $this->CategorieModel->setName($_POST['nom']);
            $this->CategorieModel->setDescription($_POST['description']);
            $this->CategorieModel->create();
            header('location:' . URl . 'app/view/Categorie.php');
        }
    }
    public function delete()
    {
        if (isset($_GET['id'])) {
            $this->CategorieModel->delete($_GET['id']);

            header('location:./app/view/Categorie.php');
        }
    }
    public function update()
    {
        echo "wiwi";
        if ($_SERVER["REQUEST_METHOD"]) {
            $this->CategorieModel->setName($_POST['name']);
            $this->CategorieModel->setId($_POST['id']);
            $this->CategorieModel->setDescription($_POST['description']);
            $this->CategorieModel->update();
            header('location:./app/view/Categorie.php');
        }
    }

    public function categorie()
    {

        include "./app/view/Categorie.php";
    }


}









?>