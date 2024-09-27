<?php

namespace App\Models\Loyalty\V1;

use App\Config;

//need to comment the parameters and return variables incl types for the below

class UserModel {
    
    public $dbConnection;

    public function __construct($connection) {
        $this->dbConnection = $connection;
    }

    public function getAll(){

               $sql = "select * from users";
               
               $stmt = $this->dbConnection->query($sql);
               
               return $stmt->fetchAll(\PDO::FETCH_OBJ);                 

    }
        
        
    public function createUser($userObj){
        
               //insert the user
               $sql = "insert into users (name,email,points) values(:name,:email,:points)";
               $sqlPrepare = $this->dbConnection->prepare($sql, [\PDO::ATTR_CURSOR => \PDO::CURSOR_FWDONLY]);
               $sqlPrepare->execute(array('name'=>$userObj->name, 'email'=>$userObj->email, 'points'=>0));
                            
               return $this->dbConnection->lastInsertId();    
            
        }
        
    //added this here as a possible use case to match up with a route
    public function getSpecificUser($userID){        
        
               $sql = "select * from users where id=:userID";
               $sqlPrepare = $this->dbConnection->prepare($sql, [\PDO::ATTR_CURSOR => \PDO::CURSOR_FWDONLY]);
               $sqlPrepare->execute(array('userID'=>$userID));
                            
               return $sqlPrepare->fetchAll();
        
    }
    
    public function deleteSpecificUser($userID){

               $sql = "DELETE FROM users WHERE id = :userID";
               $sqlPrepare = $this->dbConnection->prepare($sql, [\PDO::ATTR_CURSOR => \PDO::CURSOR_FWDONLY]);
               $sqlPrepare->execute(array('userID'=>$userID));
                            
               return $sqlPrepare->fetchAll();

    }
        
    public function earnPoints($user,$noPts){
            //to to flush out
        }

    public function redeemPoints($user,$noPts){
        //need to flush out
            
        }
}
        
        