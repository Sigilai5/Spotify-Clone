<?php
/**
 * Created by PhpStorm.
 * User: sigilai
 * Date: 11/16/18
 * Time: 6:21 PM
 */

include("../../config.php");

if (isset($_POST['playlistId'])  && isset($_POST['songId'])){
    $playlistId = $_POST['playlistId'];
    $songId = $_POST['songId'];

    $orderidQUery = mysqli_query($con, "SELECT MAX(playlistOrder) + 1 as playlistOrder FROM playlistSongs"); //MAX gets the playlist with the higest order then add 1 to create a new one for us
    $row = mysqli_fetch_array($orderidQUery);
    $order = $row['playlistOrder'];

    $query = mysqli_query($con,"INSERT INTO playlistSongs VALUES ('','$songId','$playlistId','$order')");

}else{
    echo "PlaylistId or songId was not passed into addToPlaylist.php";
}


?>