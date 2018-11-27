<?php
/**
 * Created by PhpStorm.
 * User: sigilai
 * Date: 11/15/18
 * Time: 8:51 PM
 */
include ("../../config.php");

if (isset($_POST['name']) && isset($_POST['username'])){

    $name = $_POST['name'];
    $username = $_POST['username'];
    $date = date("Y-m-d");

    $checkUsernameQuery = mysqli_query($con,"SELECT name FROM playlists WHERE name='$name'");
    if (mysqli_num_rows($checkUsernameQuery) != 0){

        echo "Playlist already exists!";
    }
    else{

    $query = mysqli_query($con,"INSERT INTO playlists VALUES('','$name','$username','$date')");
    }
}
else{
    echo "Name or username parameters not passed into file";
}


?>