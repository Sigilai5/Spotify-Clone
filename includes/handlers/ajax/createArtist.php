<?php
/**
 * Created by PhpStorm.
 * User: sigilai
 * Date: 11/27/18
 * Time: 10:47 PM
 */

include ("../../config.php");

if (isset($_POST['username'])){

    $username = $_POST['username'];

    $checkUsernameQuery = mysqli_query($con,"SELECT name FROM artists WHERE name='$username'");
    if (mysqli_num_rows($checkUsernameQuery) != 0){

        return;
    }
    else{

        $query = mysqli_query($con,"INSERT INTO artists VALUES('','$username')");
    }
}
else{
    echo "Name or username parameters not passed into file";
}


?>