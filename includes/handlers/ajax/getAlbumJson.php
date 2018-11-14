<?php
/**
 * Created by PhpStorm.
 * User: sigilai
 * Date: 11/14/18
 * Time: 9:06 AM
 */

include ("../../config.php");

if (isset($_POST['albumId'])){
    $albumId = $_POST['albumId'];

    $query = mysqli_query($con,"SELECT * FROM albums WHERE  id='$albumId'");

    //convert to array
    $resultArray = mysqli_fetch_array($query);

    //convert to json
    echo json_encode($resultArray);

}

?>