<?php
namespace app\Model;

use app\Config\Database;
use PDO;
class Inscription
{
    private $user_id;
    private $cours_id;

    public function getUser_id():int {
        return $this->user_id;
    }
    public function getCours_id():int {
        return $this->cours_id;
    }
    public function setCours_id(int $cours_id):void{
        $this->cours_id = $cours_id;
    }
    public function setUser_id(int $user_id):void{
        $this->user_id = $user_id;
    }

    public function insecrireInCpurs()
    {

        $query = "INSERT INTO etudiant_cours  (id_cours,id_etudiant) VALUES (:id_cours,:id_etudiant)";
        $stmt = Database::getInstance()->getConnection()->prepare($query);
        var_dump($stmt);
        $stmt->bindParam(":id_etudiant", $this->user_id);
        $stmt->bindParam(":id_cours", $this->cours_id);
        $stmt->execute();
    }
    public function checkExistingEnrollment($cours_id, $user_id)
    {
        $query = "SELECT id_cours, id_etudiant FROM etudiant_cours 
                  WHERE id_cours = :cours_id AND id_etudiant = :user_id";
        $stmt = Database::getInstance()->getConnection()->prepare($query);
        $stmt->bindParam(":cours_id", $cours_id);
        $stmt->bindParam(":user_id", $user_id);
        $stmt->execute();
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultat ? true : false;
    }}

