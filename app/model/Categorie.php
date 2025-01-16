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
        if(count($arguments)== 3)
        {
            $this->id=$arguments[0];

            $this->name=$arguments[1];
            $this->description=$arguments[2];
        }
}}


public function  findAll(){
    $query="SELECT name ,description FROM categories ;";
    $stmt=Database::getInstance()->getConnection()->prepare($query);
    $stmt->execute();
    echo "test";
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    

}
public function create(){
    $query="INSERT INTO  categories (name,description) VALUES ('".$this->name."',".$this->description.")";
    $stmt=Database::getInstance()->getConnection()->prepare($query);
    $stmt->execute();
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
        
    $query= "UPDATE utilisateurs SET name = :name,description=:description WHERE id = :id";
    $stmt = Database::getInstance()->getConnection()->prepare($query);
    $stmt->bindParam(":name", $this->name);
    $stmt->bindParam(":description", $this->description);
    $stmt->bindParam("id", $this->id);
     return $stmt->execute();

    }





public function delete ($id){
    $query = "SELECT * FROM categories WHERE id = '" . $id . "';";
    $stmt = Database::getInstance()->getConnection()->prepare($query);
    return $stmt->execute();
}





public  function findByID() {
    $query = "SELECT * FROM categories WHERE id = :id";
        $stmt = Database::getInstance()->getConnection()->prepare($query);
        $stmt->bindParam(":id", $id);
       $stmt->execute();
       return  $stmt->fetch(PDO::FETCH_ASSOC);
}

}

?>



