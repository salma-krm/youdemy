<?php
namespace app\model;
use app\Config\Database;
use PDO;
class Tag extends Label {
    
    public function __construct(){
        parent::__construct();

}
    public function  findAll(){
        $query="SELECT id, name ,description FROM tag ;";
        $stmt=Database::getInstance()->getConnection()->prepare($query);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_OBJ);
        
    
    }
    public function create(){
        echo"test1";
        $query="INSERT INTO  tag (name,description) VALUES (:name,:description)";
        $stmt=Database::getInstance()->getConnection()->prepare($query);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":description",$this->description);
        echo"test2";
        return  $stmt->execute();  
    }
    
    
    public function findByName(string $name) {
        $query = "SELECT id , name , description FROM tag WHERE name = :name";
        $stmt = Database::getInstance()->getConnection()->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->execute();
        $result= $stmt->fetchObject(__CLASS__);
        return $result;
    }
    
    
    
    
    public function update () {
            
        $query= "UPDATE tag SET name = :name,description=:description WHERE id = :id";
        $stmt = Database::getInstance()->getConnection()->prepare($query);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam("id", $this->id);
         return $stmt->execute();
    
        }
    
    
    
    
    
        public function delete ($id) {
   
            $query = "DELETE FROM tag WHERE id = :id";
            $stmt = Database::getInstance()->getConnection()->prepare($query);
            $stmt->bindParam(":id", $id);
            return $stmt->execute();
        }
    
    
    
    
    public  function findByID() {
        $query = "SELECT * FROM tag WHERE id = :id";
            $stmt = Database::getInstance()->getConnection()->prepare($query);
            $stmt->bindParam(":id", $id);
           $stmt->execute();
           return  $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
