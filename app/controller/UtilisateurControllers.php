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
    public function delete($id)
    {
        $this->Utilisateurmodel->delete($id);
    }

    public function registre()
    {
        $this->Utilisateurmodel->create();
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit'] == 'login') {
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);
            $errors = [];

            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL) || empty($password)) {
                $errors['general'] = "Veuillez remplir tous les champs correctement.";
            }
            if (empty($errors)) {
                $Utilisateur = $this->Utilisateurmodel->login($email, $password);
                echo "hhhh";
                if ($Utilisateur) {
                    echo "hiho";
                    $_SESSION['nom'] = $Utilisateur->getFirstName();
                    $_SESSION['prenom'] = $Utilisateur->getLastName();
                    $_SESSION['email'] = $Utilisateur->getEmail();
                    $_SESSION['role'] = $Utilisateur->getRole();
                    $_SESSION['user_id'] = $Utilisateur->getId();
                    $_SESSION['Utilisateur'] = $Utilisateur;
                    echo "salma tergui ";
                    header('location:./app/view/cours.php');
                }
            }
        }
    }

}


?>