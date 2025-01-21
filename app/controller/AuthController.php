<?php
namespace App\Controller;

use app\model\Utilisateur;
use app\model\Role;

class AuthController
{
    private $users;
    public function loginPage()
    {
        include "./app/view/login.php";
    }

    public function registerPage(){
        include "./app/view/register.php";
    }

    public function register()
    {
       
        $user = new Utilisateur();
        if (isset($_POST['submit'])) {
            if ($user->checkEmail($_POST["email"])) {
                $_SESSION["message_error"] = "email deja exist";
                header('location:http://localhost:8081/youdemy/?route=signup');
                exit;
            }
            $user->setFirstName($_POST["firstname"]);
            $user->setLastName($_POST["lastname"]);
            $user->setEmail($_POST["email"]);
            $user->setPassword($_POST["password"]);
            $role = new Role();
            $role = $role->findByName($_POST['role']);
            var_dump($role);
            $user->setRole($role);
            $user->create();
            header('location:http://localhost:8081/youdemy/?route=login');

        }
    }
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = new Utilisateur();
            $user = $user->checkEmail($email);
            if ($user && $user->getPassword() == $password) {

                $_SESSION["authUser"] = $user;
                if ($user->getStatus() == 'active' && $user->role_id != 3) {
                    header('location:./?route=dashboard');
                } else
                    header('location:./?route=home');
                die;
            }
        }

        header('location:http://localhost:8081/youdemy/?route=login');




    }

    public function logout()
    {

        session_destroy();
        header('location:./?route=home');
        exit();
    }

}
