<?php
namespace app\controller;
use app\model\Categorie;

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
            header('location:./?route=categorie');
        }
    }
    public function delete()
    {
        if (isset($_GET['id'])) {
            $this->CategorieModel->delete($_GET['id']);

            header('location:./?route=categorie');
        }
    }
    public function update()
    {
        if ($_SERVER["REQUEST_METHOD"]) {
            $this->CategorieModel->setName($_POST['name']);
            $this->CategorieModel->setId($_POST['id']);
            $this->CategorieModel->setDescription($_POST['description']);
            $this->CategorieModel->update();
            header('location:./?route=categorie');
        }
    }

    public function categorie()
    {
       
        $cat = new CategorieControllers();
        $cats = $cat->findAll();
        ob_start();
        include "./app/view/Categorie.php";
        $body = ob_get_clean();
        include "./app/view/nav.php";
    }


}









?>