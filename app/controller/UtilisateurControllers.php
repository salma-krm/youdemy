<?php
namespace app\controller;
use app\model\Utilisateur;
class UtilisateurControllers
{
    private $Utilisateurmodel;

    public function __construct()
    {
        $this->Utilisateurmodel = new Utilisateur();

    }

    // public function index()
    // {
    //     $users =  $this->Utilisateurmodel->findAll();

    //     require  './app/view/users.php';
    // }

    public function findAll()
    {
        $user = $this->Utilisateurmodel->findAll();
        return $user;
    }
    public function delete()
    {
        if (isset($_POST['id'])) {
            $this->Utilisateurmodel->delete($_POST['id']);

            header('location:./?route=users');
        }
    }
    public function user()
    {
       
        $user = new UtilisateurControllers();
        $users = $user->findAll();
        ob_start();
        include "./app/view/Users.php";
        $body = ob_get_clean();
        include "./app/view/nav.php";
    }

   

}


?>