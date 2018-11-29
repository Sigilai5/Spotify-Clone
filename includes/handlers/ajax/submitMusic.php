<?php
/**
 * Created by PhpStorm.
 * User: sigilai
 * Date: 11/29/18
 * Time: 3:13 AM
 */

include ("../../config.php");

if (isset($_POST['title']) && isset($_POST['description']) && isset($_POST['artist']) && isset($_POST['album'])&& isset($_POST['genre'])&& isset($_POST['path'])){

    $title = $_POST['title'];
    $description = $_POST['description'];
    $artist = $_POST['artist'];
    $album=$_POST['album'];
    $genre=$_POST['genre'];
    $duration='3.12';
    $path=$_POST['path'];
    $albumOrder=1;
    $plays=0;


    $query = mysqli_query($con,"INSERT INTO Songs VALUES('','$title','$description','$artist','$album','$genre','$duration','$path','$albumOrder','$plays')");

}
else{
    echo "Name or username parameters not passed into file";
}

?>