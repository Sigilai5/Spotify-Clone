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

    public function getUserId(){
        $query = mysqli_query($this->con,"SELECT id FROM users WHERE username='$this->username'");
        $row = mysqli_fetch_array($query);
        return $row['id'];
    }

    public function getEmail(){
       $query = mysqli_query($this->con,"SELECT email FROM users WHERE username='$this->username'");
        $row = mysqli_fetch_array($query);
        return $row['email'];
    }

    public function getProfile(){
        $query = mysqli_query($this->con,"SELECT profilePic FROM users WHERE username='$this->username'");
        $row = mysqli_fetch_array($query);
        return $row['profilePic'];
    }

    public function getFirstAndLastName(){
        $query = mysqli_query($this->con,"SELECT concat(firstName, ' ',lastName) as 'name' FROM users WHERE username='$this->username'");
        $row = mysqli_fetch_array($query);
        return $row['name'];
    }

}


?>