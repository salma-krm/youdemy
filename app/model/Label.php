<?php
namespace app\model;
abstract class Label{
    public $id ;
    public $name ;
    public  $description ;

    public function __construct(){}
    
    public function getId(): int{
        return $this->id;
    }
    public function getName(): string{
        return $this->name;

    }
    public function getDescription(): string{
        return $this->description;
   }
   public function setId ( int $id): void{
    $this->id=$id;
   }
   public function setName( string $name): void{    
    $this->name=$name;
   }
   public function setDescription( string $description): void{
    $this->description=$description;
   }
   public function __tostring(){
    return "id:".$this->getId().",name:".$this->getName().",description:".$this->getDescription()."";


}
}

?>