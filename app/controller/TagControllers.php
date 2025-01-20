<?php
namespace app\controller;
use app\model\Tag;

class TagControllers
{
    private $tagmodal;

    public function __construct()
    {
        $this->tagmodal = new TAG();

    }
    public function findAll()
    {
        $cours = $this->tagmodal->findAll();
        return $cours;
    }

    public function create()
    {
        if (isset($_POST['submit']) && !empty($_POST['nom']) && !empty($_POST['description'])) {

            $this->tagmodal->setName($_POST['nom']);
            $this->tagmodal->setDescription($_POST['description']);
            $this->tagmodal->create();
            header('location:./?route=tag');
            
        }
    }
    public function delete()
    {
        if (isset($_GET['id'])) {
            $this->tagmodal->delete($_GET['id']);

            header('location:./?route=tag');
        }

    }
    public function update()
    {

     

            $this->tagmodal->setName($_POST['name']);
            $this->tagmodal->setId($_POST['id']);
            $this->tagmodal->setDescription($_POST['description']);
            $this->tagmodal->update();
            header('location:./?route=tag');
        
    }

    public function tag()
    {
        $cat = new TagControllers();
        $tags = $cat->findAll();
        ob_start();
        include "./app/view/Tag.php";
        $body = ob_get_clean();
        include "./app/view/nav.php";
    }
}



?>