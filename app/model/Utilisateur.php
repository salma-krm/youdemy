<?php
namespace app\model;
use app\config\Database;
use PDO;
class Utilisateur{
    private  int   $id = 0;
    private string  $firstname = "";
    private  string  $lastname ="";
    private string  $email = "";
    private string  $password="";
    private  string $passwordConfig;
    private string $photo ;
    private Role $role ;
    private $cours  = [];
    public function __call($name, $arguments)
    {   if($name == "construct"){
            if(count($arguments)== 1)
            {
                $this->role=$arguments[0];
                $this->id=$arguments[1];  

            }
            if(count ($arguments)== 6){
                $this->firstname=$arguments[0];
                $this->lastname=$arguments[1];     
                $this->email=$arguments[2];
                $this->password =$arguments[3];
                $this->photo =$arguments[4];
                $this->role=$arguments[5];  
            }
            if(count ($arguments)== 6){
                $this->firstname=$arguments[0];
                $this->lastname=$arguments[1];     
                $this->email=$arguments[2];
                $this->password =$arguments[3];
                $this->role=$arguments[4]; 
                $this->cours =$arguments[5];
            }
            if($name == "instanceWidthPasswordAndEmail"){
            if(count ($arguments)== 2){
                $this->email=$arguments[0];     
                $this->password=$arguments[1];
            } }
    }}
    public function setId( int $id): void{
        $this->id=$id;
    }
    public function setPhoto( string $photo): void{
        $this->photo=$photo;
    }
    public function setFirstName(string $firstname): void{
        $this->firstname=$firstname;
    }
    public function setLastName(string $lastname): void{
        $this->lastname=$lastname;
    }
    public function setEmail(string $email): void{
        $this->email=$email;
    }
    public function setPassword(string $password): void{
        $this->password=$password;
    }
    public function setPasswordCOonfig(string $passwordConfig): void{  
        $this->passwordConfig=$passwordConfig;
    }
    
    public function setRole(Role $role):void {
        $this->role = $role;
    }

    public function getID(): int{
        return $this->id;
    }
    public function getFirstName(): string{
        return $this->firstname;
    }
    public function get(): string{
        return $this->lastname;
    }
    public function getEmail(): string{
        return $this->email;
    }
    public function getPasswordCOonfig(): string{
        return $this->passwordConfig;
    }
    public function getRole(): Role{    
        return $this->role;
    }

    public function getPhoto(): string{    
        return $this->photo;
    }
   public function __tostring() {
    
        return "(Utilisateur) => id : " . $this->id . " , firstname : " . $this->firstname . " , lastname : " . $this->lastname.",, email : " . $this->email  . " , password : " . $this->password . " , Role : " . $this->role. "" ;
    
   }



   public function findAll() {
        $query = "SELECT id ,photo,firstname, lastname, email, password, roleName, roledescription 
        FROM utilisateurs  LEFT JOIN roles ON utilisateurs.role_id = roles.id";
        $stmt = Database::getInstance()->getConnection()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
}
   public function create() {
    $roleId = $this->getRole()->getId(); 
    var_dump($this->getRole());
    $query = "INSERT INTO utilisateurs (firstname , lastname, email, password, role_id) 
              VALUES (:firstname, :lastname, :email, :password, :id_role)";
    $stmt = Database::getInstance()->getConnection()->prepare($query);
    $stmt->bindParam(':firstname', $this->firstname);
    $stmt->bindParam(':lastname', $this->lastname);
    $stmt->bindParam(':email', $this->email);
    $stmt->bindParam(':password', $this->password);
    $stmt->bindParam(':id_role', $roleId, );
    return $stmt->execute();
    
} 
    public function update () {
        
    $query= "UPDATE utilisateurs SET firstname = :firtsname, lastname=:lastname,email=:email,password=:password WHERE id = :id";
    $stmt = Database::getInstance()->getConnection()->prepare($query);
    $stmt->bindParam(":firstname", $this->firstname);
    $stmt->bindParam(":lastname", $this->lastname);
    $stmt->bindParam(":email", $this->email);
    $stmt->bindParam(":password", $this->password);
    $stmt->bindParam("id", $this->id);
     return $stmt->execute();

    }
    public function findById ($id) {
        $query = "SELECT * FROM utilisateurs WHERE id = :id";
        $stmt = Database::getInstance()->getConnection()->prepare($query);
        $stmt->bindParam(":id", $id);
       $stmt->execute();
       return  $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function delete ($id) {
        $query = "SELECT * FROM roles WHERE id = '" . $id . "';";
        $stmt = Database::getInstance()->getConnection()->prepare($query);
        return $stmt->execute();
    }

    public function checkEmail($email){
        $query='SELECT  firstname, lastname, email ,password  from Users where email = :email';
        $stmt = Database::getInstance()->getConnection()->prepare($query);
        $stmt->bindParam(':email',$email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
   
}


?>