<?php
namespace app\controller;
use app\model\Categorie;
use app\model\Cours;
use app\model\Tag;
use app\model\Utilisateur;

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
        $categorie = new Categorie();
        $categorie->setId($_POST["categorie_id"]);
        $tags = [];
        foreach ($_POST["tags"] as $tagId) {
            $tag = new Tag();
            $tag->setId($tagId);
            array_push($tags, $tag);
        }
        $prof =  $_SESSION["authUser"];
        $this->Coursmodel->setEnseignant($prof);
        $this->Coursmodel->setTag($tags);
        $this->Coursmodel->setcontenu($_POST['contenu']);
        $this->Coursmodel->setDescription($_POST['description']);
        $this->Coursmodel->setTitre($_POST['titre']);
        $this->Coursmodel->setPhoto($_POST['imageUrl']);
        $this->Coursmodel->setCategorie($categorie);
        $this->Coursmodel->create();
        header('location:./?route=dashboard');
    }
    public function delete()
    {
        if (isset($_POST['id'])) {
            $this->Coursmodel->delete($_POST['id']);
            header('location:./?route=dashboard');

        }

    }

    public function update()
    {   
        

        
        if ($_SERVER["REQUEST_METHOD"]) {
            $categorie = new Categorie();
            $categorie->setId($_POST["categorie_id"]);
            $tags = [];
            foreach ($_POST["tags"] as $tagId) {
                $tag = new Tag();
                $tag->setId($tagId);
                array_push($tags, $tag);
            }
            $this->Coursmodel->setTag($tags);
            $this->Coursmodel->setcontenu($_POST['contenu']);
            $this->Coursmodel->setDescription($_POST['description']);
            $this->Coursmodel->setTitre($_POST['titre']);
            $this->Coursmodel->setPhoto($_POST['imageUrl']);
            $this->Coursmodel->setCategorie($categorie);
            $this->Coursmodel->setId($_GET['id']);
            $this->Coursmodel->update();

            header('location:./?route=dashboard');
        }
    }
    public function cours()
    {
        $cat = new CoursControllers();
        $courses = $cat->findAll();
        ob_start();
        include "./app/view/cours.php";
        $body = ob_get_clean();
        include "./app/view/nav.php";
    }
    public function inscritInCours(){
        $cours = new Cours(); 
        $cours->setId($_POST["id_cours"]);
        $etudiant =  $_SESSION["authUser"];
        $this->Coursmodel->setEnseignant($etudiant);
    }
   

}



?>