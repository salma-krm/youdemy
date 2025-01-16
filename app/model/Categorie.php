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
public function update (){}
public function delete (){}
public  function findByID() {}

}

?>



