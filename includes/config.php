<?php
/**
 * Created by PhpStorm.
 * User: sigilai
 * Date: 11/12/18
 * Time: 12:04 PM
 */

ob_start();

$timezone = date_default_timezone_set("Africa/Nairobi");

$con = mysqli_connect("localhost","root","","juk");

if(mysqli_connect_errno()){
    echo "Failed to connect: " . mysqli_connect_error();
}

?>