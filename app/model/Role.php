<?php
namespace app\model;
use app\config\Database;
use PDO;
class Role{
    public  int $id = 0;
    public string  $roleName = "";
    public  string $roleDescription = "";

    public function __call($name, $arguments)
    {   if($name == "construct"){
        if(count($arguments)== 1)
        {
            $this->id=$arguments[0];
           
        }
            if(count($arguments)== 2)
            {
                $this->roleName=$arguments[0];
                $this->roleDescription=$arguments[1];
            }
            if(count ($arguments)== 3){
               
                $this->roleName=$arguments[0];     
                $this->roleDescription=$arguments[1];
                $this->id=$arguments[2];


                
            }
            if(count ($arguments)== 1){
                $this->roleName=$arguments[0];
          }}
        }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function setRoleName(string $roleName) : void {
        $this->roleName = $roleName;
    }

    public function setDescription(string $description) : void {
        $this->role_description = $description;
    }

    

    public function getId(): int {
        return $this->id;
    }

    public function getRoleName() : string {
        return $this->roleName;
    }

    public function getDescription(): string {
        return $this->roleDescription;
    }
    public function __toString(): string {
        return "Role: {$this->roleName}, Description: {$this->roleDescription}";
    }
    public function create (){
        $query = "INSERT INTO roles (roleName , roleDescription) VALUES (:roleName,:role_Description);";
        $stmt=Database::getInstance()->getConnection()->prepare($query);
        $stmt->bindParam(':roleName', $this->roleName);
        $stmt->bindParam(':role_Description', $this->roleDescription);
          $stmt->execute();
          return $this->setId(Database::getInstance()
          ->getConnection()
          ->lastInsertId());
        
        }
   
        public function findByName(string $name) {
            $query = "SELECT id , roleName , roleDescription FROM roles WHERE rolename = :name";
            $stmt = Database::getInstance()->getConnection()->prepare($query);
            $stmt->bindParam(':name', $name);
            $stmt->execute();
            $result= $stmt->fetchObject(__CLASS__);
            return $result;
        }
        public function findRoleByid($id)  {
            $query = "SELECT id , roleName , roleDescription From roles WHERE id = :id";
            $stmt = Database::getInstance()->getConnection()->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetchObject(__CLASS__);
        }
}