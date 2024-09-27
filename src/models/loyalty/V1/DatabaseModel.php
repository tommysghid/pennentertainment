<?php

namespace App\Models\Loyalty\V1;

require dirname(__DIR__, 4).'/config/database.php';

use PDO;

class DatabaseModel {
    private $host;
    private $port;
    private $user;
    private $password;
    private $dbname;
    private static $connection = null;
    
    public function __construct(){
        
        global $CFG;
        
        $this->host = $CFG->dbhost;
        $this->port = $CFG->dbport;
        $this->user = $CFG->dbuser;
        $this->password = $CFG->dbpassword;
        $this->dbname = $CFG->dbname;  
        
        //$this->connection = $this->getConnection();
        
    }

   public function getConnection(){
        $connString = "mysql:host=".$this->host.";port=".$this->port.";dbname=".$this->dbname;
        $conn = new PDO($connString, $this->user, $this->password);
        $conn->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, FALSE);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        
        return $conn;
    }
    
    /*public static function getConnection(){
        if(!isset(self::$connection)){
              $db = new DatabaseModel();
              self::$connection = $db->connect();
        }
    
        return self::$connection; 
     }*/

}