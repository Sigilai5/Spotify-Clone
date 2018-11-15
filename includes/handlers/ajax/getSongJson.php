<?php
/**
 * Created by PhpStorm.
 * User: sigilai
 * Date: 11/13/18
 * Time: 11:31 PM
 */
include ("../../config.php");

if (isset($_POST['songId'])){
    $songid = $_POST['songId'];

    $query = mysqli_query($con,"SELECT * FROM Songs WHERE  id='$songid'");


    //convert to array
    $resultArray = mysqli_fetch_array($query);

    //convert to json
    echo json_encode($resultArray);

}

?>