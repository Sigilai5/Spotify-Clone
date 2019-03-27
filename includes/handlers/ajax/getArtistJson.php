<?php
/**
 * Created by PhpStorm.
 * User: sigilai
 * Date: 11/14/18
 * Time: 8:51 AM
 */

include ("../../config.php");

if (isset($_POST['artistId'])){
    $artistId = $_POST['artistId'];

    $query = mysqli_query($con,"SELECT * FROM artists WHERE  id='$artistId'");

    //convert to array
    $resultArray = mysqli_fetch_array($query);

    //convert to json
    echo json_encode($resultArray);

}

?>