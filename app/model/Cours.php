<?php
namespace app\model;
use app\config\Database;
use PDO;
#[\AllowDynamicProperties]

class Cours
{
    private int $id = 0;
    private string $titre = "";
    private string $description = "";
    private string $photo = "";
    private string $contenu = "";
    private Categorie $categorie;
    private array $tags = [];
    private array $etudiants;
    private Utilisateur $enseignant;


    public function __call($name, $arguments)
    {
        if ($name == "construct") {
            if (count($arguments) == 1) {
                $this->titre = $arguments[0];

            }

            if (count($arguments) == 2) {
                $this->titre = $arguments[0];
                $this->description = $arguments[1];
            }

            if (count($arguments) == 3) {
                $this->titre = $arguments[0];
                $this->tags = $arguments[1];
                $this->categorie = $arguments[2];
            }

            if (count($arguments) == 7) {

                $this->titre = $arguments[0];
                $this->description = $arguments[1];
                $this->photo = $arguments[2];
                $this->contenu = $arguments[3];
                $this->categorie = $arguments[4];
                $this->enseignant = $arguments[5];
                $this->tags = $arguments[6];
            }
        }
    }
    public function getcontenu(): string
    {
        return $this->contenu;

    }
    public function getDescription(): string
    {
        return $this->description;
    }
    public function getPhoto(): string
    {
        return $this->photo;
    }
    public function getId(): int
    {
        return $this->id;
    }
    public function getTitre(): string
    {
        return $this->titre;
    }
    public function getCategorie(): Categorie
    {
        return $this->categorie;
    }
    public function getTag(): array
    {
        return $this->tags;
    }
    public function getEtudiant(): array
    {
        return $this->etudiants;
    }
    public function getEnseignant(): Utilisateur
    {
        return $this->enseignant;
    }
    public function setId($id): void
    {
        $this->id = $id;
    }
    public function setTitre($titre): void
    {
        $this->titre = $titre;
    }
    public function setCategorie($categorie): void
    {
        $this->categorie = $categorie;
    }
    public function setTag($tag): void
    {
        $this->tags = $tag;
    }
    public function setEtudiant($etudiants): void
    {
        $this->etudiants = $etudiants;
    }
    public function setEnseignant(Utilisateur $enseignant): void
    {
        $this->enseignant = $enseignant;
    }
    public function setPhoto($photo): void
    {
        $this->photo = $photo;
    }
    public function setcontenu($contenu): void
    {
        $this->contenu = $contenu;
    }
    public function setDescription($description): void
    {
        $this->description = $description;
    }
    public function __toString()
    {
        return "(cours) => id :  " . $this->id . " , titre : " . $this->titre .
            " , photo : " . $this->photo . " , description : " . $this->description .
            " , contenu : " . $this->contenu . " ,categorie : " . $this->categorie .
            " , tags : " . $this->tags . " , etudiants : " . $this->etudiants . " , enseignant : " . $this->enseignant . ".";
    }
    public function create()
    {
        $categorieId = $this->categorie->getId();
        $enseignant = $this->getEnseignant()->getId();
        $query = "INSERT INTO cours (titre ,  description, photo, contenu,id_categorie , id_enseignant ) VALUES (:titre,:photo,:description,:contenu,:categorieId,:idenseignant)";
        $stmt = Database::getInstance()->getConnection()->prepare($query);
        $stmt->bindParam(":titre", $this->titre);
        $stmt->bindParam(":photo", $this->photo);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":contenu", $this->contenu);
        $stmt->bindParam(":categorieId", $categorieId);
        $stmt->bindParam(":idenseignant", $enseignant);
        if ($stmt->execute()) {
            $id = Database::getInstance()->getConnection()->lastInsertId();
            foreach ($this->tags as $tag) {
                $tagId = $tag->getId();
                $query = "INSERT INTO `courstags`(`id_tags`, `id_cours`) VALUES  ('$tagId' ,'$id')";
                $stmt = Database::getInstance()->getConnection()->prepare($query);
                $stmt->execute();
            }
        }


    }
    public function findAll()
    {
        $query = 'select  cours.id as id ,cours.titre  as titre ,cours.photo as photo ,cours.description as description ,
        cours.contenu as contenu , utilisateurs.firstname as user , categories.name as cat 
         FROM cours join utilisateurs  on 
         cours.id_enseignant=utilisateurs.id join categories  on cours.id_categorie=categories.id;';
        $stmt = Database::getInstance()->getConnection()->prepare($query);
        $stmt->execute();
        $cours = $stmt->fetchAll(PDO::FETCH_CLASS, Cours::class);

        foreach ($cours as $cour):
            $sql = "select t.name  from tag t  join courstags c on t.id=c.id_tags  where c.id_cours=:id";
            $stmt = Database::getInstance()->getConnection()->prepare($sql);
            $stmt->bindParam(':id', $cour->id);
            $stmt->execute();
            $cour->tags = $stmt->fetchAll(PDO::FETCH_CLASS, Tag::class);
        endforeach;
        return $cours;
    }

    function findInscriCours($id) {
        $query = 'select  cours.id as id ,cours.titre  as titre ,cours.photo as photo ,cours.description as description ,
        cours.contenu as contenu , utilisateurs.firstname as user , categories.name as cat 
         FROM cours join utilisateurs  on 
         cours.id_enseignant=utilisateurs.id join categories  on cours.id_categorie=categories.id join etudiant_cours on etudiant_cours.id_etudiant =  utilisateurs.id where etudiant_cours.id_etudiant = :id ; ';
        $stmt = Database::getInstance()->getConnection()->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $cours = $stmt->fetchAll(PDO::FETCH_CLASS, Cours::class);

        foreach ($cours as $cour):
            $sql = "select t.name  from tag t  join courstags c on t.id=c.id_tags  where c.id_cours=:id";
            $stmt = Database::getInstance()->getConnection()->prepare($sql);
            $stmt->bindParam(':id', $cour->id);
            $stmt->execute();
            $cour->tags = $stmt->fetchAll(PDO::FETCH_CLASS, Tag::class);
        endforeach;
        return $cours;
    }


    public function update()
    {
        $categorieId = $this->categorie->getId();
        $query = "UPDATE cours SET photo = :photo, titre = :titre, description = :description, contenu = :contenu, id_categorie = :id_categorie WHERE id = :id";
        $stmt = Database::getInstance()->getConnection()->prepare($query);
        $stmt->bindParam(":photo", $this->photo);
        $stmt->bindParam(":titre", $this->titre);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":contenu", $this->contenu);
        $stmt->bindParam(":id_categorie", $categorieId);
        $stmt->bindParam(":id", $this->id);

        if ($stmt->execute()) {

            $stmt = Database::getInstance()->getConnection()->prepare("DELETE FROM courstags WHERE id_cours = :id");
            $stmt->bindParam(":id", $this->id);
            $stmt->execute();


            foreach ($this->tags as $tag) {
                $tagId = $tag->getId();

                $query = "INSERT INTO courstags (id_tags, id_cours) VALUES (:id_tags, :id_cours)";
                $stmt = Database::getInstance()->getConnection()->prepare($query);
                $stmt->bindParam(":id_tags", $tagId);
                $stmt->bindParam(":id_cours", $this->id);
                $stmt->execute();
            }

            return true;
        }

        return false;
    }

    public function delete($id)
    {
        $query = "DELETE  FROM Cours WHERE id = '" . $id . "';";
        $stmt = Database::getInstance()->getConnection()->prepare($query);
        return $stmt->execute();
    }
    public function findById($id)
    {
        $query = "SELECT * FROM cours WHERE id = :id";
        $stmt = Database::getInstance()->getConnection()->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getTotalCours()
    {
        $query = "SELECT 
    COUNT(*) as total_count FROM cours";
        $stmt = Database::getInstance()->getConnection()->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);



    }
    public function searchParName(){
        $query = "";
    }

}


interface   Human
{
     function test();
}

class Man implements Human
{
    public function test()
    {
        echo "test";
    }
}

class women implements Human
{
    public function test()
    {
        echo "test 2";
    }


}


?>