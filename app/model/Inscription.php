<?php
namespace app\Model;

use app\Config\Database;
class Inscription
{
    public $user_id;
    public $cours_id;

    public function insecrireInCpurs()
    {

        $query = "INSERT INTO etudiant_cours  (id_cours,id_etudiant) VALUES (:id_cours,:id_etudiant)";
        $stmt = Database::getInstance()->getConnection()->prepare($query);
        $stmt->bindParam(":id_etudiant", $this->user_id);
        $stmt->bindParam(":id_cours", $this->cours_id);
        $stmt->execute();

    }

}