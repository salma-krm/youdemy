<?php
namespace app\view;
use app\model\Categorie;

use app\model\Role;
use app\model\Utilisateur;
use app\controller\CoursControllers;


echo "test";

class Test
{
    public static function test(): void
    {

        $role = new Role();
        $role->findByName("ADMIN");
        $role=$role->findByName("ADMIN");
        $user = new Utilisateur();
        $user->construct("salwaw", "teruii", "beleesaol@gmail.com", "1234567salma", $role);
        $user->setRole($role);
        var_dump($user);
        $user->create();
       
    }

    public static function testcours(): void{
        $user = new Utilisateur();
        $user->setId(10);
        $categorie = new Categorie() ;
        $Categorie = $categorie->findByName(name:"salma");
        $cours = new Cours ();
        $cours->construct("black ","je suis book ","photobook.png","black mild sehr wichtige ",$Categorie,$user);
        var_dump($cours);

        $cours->setEnseignant($user);
        $cours->setCategorie($Categorie);
        $cours->create();
        

    }
    public function testcourses(){
        $user = new CoursControllers();
        $user->getAll();
    }

    


}