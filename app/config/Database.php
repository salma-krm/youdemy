<?php 
namespace App\Config;
use PDO;
use PDOException;
class Database {
    private static $servername = "localhost";
    private static $username = "root";
    private static $password = "";
    private static $dbname = "youdemy";
    private static $connexion;
    private static $instance;
  


    function __construct(){
        if (!self::$connexion) {
            try {
                self::$connexion = new PDO(
                    "mysql:host=" . self::$servername . ";dbname=" . self::$dbname . ";charset=UTF8",self::$username ,self::$password
                );
                self::$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
            } catch (PDOException $e) {
                die("Connection failed: " . $e->getMessage());
            }
        }
        
    }

    public static function getInstance() {
        if(!self::$instance){
            self::$instance = new Database();
            
            
        }
            return self::$instance ;
        }
        
        public function getConnection(){
            return self::$connexion;
        }



       
}
$conn= new Database();
?>
