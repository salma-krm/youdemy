<?php
namespace app\model;
use app\config\Database;
use PDO;
class Cours{
    private int  $id =0;
    private string  $titre= "";
    private string $description ="";
    private string $photo ="";
    private string $contenu ="";
    private Categorie $categorie ;
    private array  $tags = [];
    private  array $etudiants = [];
    private Utilisateur $enseignant;


    public function __call($name, $arguments){
        if($name=="construct"){
        if(count($arguments)== 1)
        {
            $this->titre=$arguments[0];
            
        }

        if(count($arguments)==2)
        {
            $this->titre=$arguments[0];
            $this->description=$arguments[1];
        }

        if(count($arguments)==3)
        {
            $this->titre=$arguments[0];
            $this->tags=$arguments[1];
            $this->categorie=$arguments[2];
        }

        if(count($arguments)==6)
        {

            $this->titre=$arguments[0];
            $this->description=$arguments[1];
            $this->photo=$arguments[2];
            $this->contenu=$arguments[3];
            $this->categorie=$arguments[4];
            $this->enseignant=$arguments[5];
        }
    }}
    public function getId(): int {
        return $this->id;
    }
    public function getTitre(): string{
        return $this->titre;
    }
    public function getCategorie(): Categorie{
        return $this->categorie;
    }
    public function getTag(): array {
        return $this->tags;
    }
    public function getEtudiant(): array {
        return $this->etudiants;
    }
    public function getEnseignant(): Utilisateur {
        return $this->enseignant;
    }
    public function setId($id): void{
        $this->id=$id;
    }
    public function setTitre($titre): void{
        $this->titre=$titre;
    }
    public function setCategorie($categorie): void{
        $this->categorie=$categorie;
    }
    public function setTag($tag): void{
        $this->tag=$tag;
    }
    public function setEtudiant($etudiants): void{
        $this->etudiants=$etudiants;
    }
    public function setEnseignant( Utilisateur $enseignant): void{
        $this->enseignant=$enseignant;
    }
    public function __toString()
    {
        return "(cours) => id :  " .$this->id . " , titre : ".$this->titre . 
                " , photo : " .$this->photo . " , description : ".$this->description . 
                " , contenu : " . $this->contenu . " ,categorie : " .$this->categorie . 
                " , tags : " .$this->tags . " , etudiants : ".$this->etudiants . " , enseignant : ".$this->enseignant. "." ;
    }
    public function create (){
        $categorieId = $this->categorie->getId();
        $enseignant = $this->getEnseignant()->getId();
        
        $query="INSERT INTO cours (titre ,  description, photo, contenu,id_categorie , id_enseignant ) VALUES (:titre,:photo,:description,:contenu,:categorieId,:idenseignant)";
        $stmt= Database::getInstance()->getConnection()->prepare($query);
        $stmt->bindParam(":titre", $this->titre);
        $stmt->bindParam(":photo",$this->photo);
        $stmt->bindParam(":description",$this->description);
        $stmt->bindParam (":contenu",$this->contenu);
        $stmt->bindParam (":categorieId",$categorieId);
        $stmt->bindParam (":idenseignant",$enseignant);
        return  $stmt->execute();
    }
    public function getAll(){
        echo'first';
        $query = "SELECT cours.titre AS titre ,cours.photo AS photo,cours.description AS description ,cours.contenu AS contenu,categories.name AS categorieNname,
         categories.description AS categorieDescription,utilisateurs.firstname AS enseignantFirstname FROM   cours
          LEFT JOIN categories ON cours.id_categorie = categories.id
          LEFT JOIN utilisateurs ON cours.id_enseignant = utilisateurs.id;";
           echo'first 2';
        $stmt = Database::getInstance()->getConnection()->prepare($query);
         echo'first 3';
         $stmt->execute();
          $resultat= $stmt->fetchAll(PDO::FETCH_ASSOC);
          return $resultat;
          
        
    }
    public function update () {
        $query= "UPDATE cours SET photo = :photo, titre=:titre,description=:description,contenu=:contenu WHERE id = :id";
        $stmt = Database::getInstance()->getConnection()->prepare($query);
        $stmt->bindParam(":firstname", $this->photo);
        $stmt->bindParam(":lastname", $this->titre);
        $stmt->bindParam(":email", $this->description);
        $stmt->bindParam(":password", $this->contenu);
        $stmt->bindParam("id", $this->id);
         return $stmt->execute();
    }
    public function delete ($id){
        $query = "SELECT * FROM Cours WHERE id = '" . $id . "';";
        $stmt = Database::getInstance()->getConnection()->prepare($query);
        return $stmt->execute();
    }
    public function findById ($id) {
        $query = "SELECT * FROM cours WHERE id = :id";
        $stmt = Database::getInstance()->getConnection()->prepare($query);
        $stmt->bindParam(":id", $id);
       $stmt->execute();
       return  $stmt->fetch(PDO::FETCH_ASSOC);
    }
}  

?>

