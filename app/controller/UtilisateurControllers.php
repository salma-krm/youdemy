<?php 
namespace app\controller;
use app\model\Utilisateur;
class UtilisateurControllers{
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

    public function findAll(){
        $user = $this->Utilisateurmodel->findAll();
        return $user;
    }
   public function create (){
    $this->Utilisateurmodel->create();
}

public function registre(){
    $this->Utilisateurmodel->create();
}

    
    public function login(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
        
        if(!empty($_POST['email']) && !empty($_POST['password'])){
        
        $check=$this->Utilisateurmodel->checkEmail($_POST['email']);
        if($check!= null){
            if ($check['password']==$_POST['password']) {
                $_SESSION['Utilisateur']=$check;
            }
        }
        }
        
        }}

}

?>