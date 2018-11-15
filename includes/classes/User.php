<?php
/**
 * Created by PhpStorm.
 * User: sigilai
 * Date: 11/15/18
 * Time: 10:02 PM
 */

class User{

    private $con;
    private $username;

    public function __construct($con , $username){
        $this->con = $con;
        $this->username = $username;
    }

    public function getUsername(){
        return $this->username;
    }

}


?>