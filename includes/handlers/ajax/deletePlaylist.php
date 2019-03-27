<?php
/**
 * Created by PhpStorm.
 * User: sigilai
 * Date: 11/16/18
 * Time: 1:52 AM
 */
include("../../config.php");

if (isset($_POST['playlistId'])){
    $playlistId = $_POST['playlistId'];

    $playlistQuery = mysqli_query($con,"DELETE FROM playlists WHERE id='$playlistId'");
    $songsQuery = mysqli_query($con,"DELETE FROM playlistSong WHERE playlistId='$playlistId'");

}else{
    echo "Playlist ID was not passed";
}


?>