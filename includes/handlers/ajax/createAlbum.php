<?php
/**
 * Created by PhpStorm.
 * User: sigilai
 * Date: 11/27/18
 * Time: 10:06 PM
 */

include ("../../config.php");

if (isset($_POST['title']) && isset($_POST['username'])){

    $title = $_POST['title'];
    $username = $_POST['username'];
    $date = date("Y-m-d");
    $artist=1;
    $genre=2;
    $artworkPath="assets/images/artwork/album.png";

    $checkUsernameQuery = mysqli_query($con,"SELECT title FROM albums WHERE title='$title'");
    if (mysqli_num_rows($checkUsernameQuery) != 0){

        echo "Album already exists!";
    }
    else{

        $query = mysqli_query($con,"INSERT INTO albums VALUES('','$title','$artist','$genre','$artworkPath')");
    }
}
else{
    echo "Name or username parameters not passed into file";
}


?>