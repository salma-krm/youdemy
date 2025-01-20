<?php 
namespace app\model;
use app\config\Database;
use PDO;
class Categorie extends Label{
public function __call($name, $arguments)
{   if($name == "construct"){
    if(count($arguments)== 1)
    {
        $this->name=$arguments[0];
        
    }
        if(count($arguments)== 2)
        {
            $this->name=$arguments[1];
            $this->description=$arguments[2];
        }
}}


public function  findAll(){
    $query="SELECT id , name ,description FROM categories ;";
    $stmt=Database::getInstance()->getConnection()->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
    

}
public function create(){
    echo"test1";
    $query="INSERT INTO  categories (name,description) VALUES (:name,:description)";
    $stmt=Database::getInstance()->getConnection()->prepare($query);
    $stmt->bindParam(":name", $this->name);
    $stmt->bindParam(":description",$this->description);
    echo"test2";
    return  $stmt->execute();
     
      
     
}


public function findByName(string $name) {
    
    $query = "SELECT id , name , description FROM categories WHERE name = :name";
    $stmt = Database::getInstance()->getConnection()->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->execute();
    $result= $stmt->fetchObject(__CLASS__);
    return $result;
}




public function update () {
        $query = "UPDATE categories SET name = :name, description = :description WHERE id = :id";
        $stmt = Database::getInstance()->getConnection()->prepare($query);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":id", $this->id);
        return $stmt->execute();
}

public function delete ($id) {
   
    $query = "DELETE FROM categories WHERE id = :id";
    $stmt = Database::getInstance()->getConnection()->prepare($query);
    
    
    $stmt->bindParam(":id", $id);
    
   
    return $stmt->execute();
}

public function findByID($id) {
    
    $query = "SELECT * FROM categories WHERE id = :id";
    $stmt = Database::getInstance()->getConnection()->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_OBJ); 
}
public function getTotalCategorie(){
    $query="SELECT 
    COUNT(*) as total_count FROM categories";
    $stmt = Database::getInstance()->getConnection()->prepare($query);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_OBJ);
    
    

    }
}

?>



