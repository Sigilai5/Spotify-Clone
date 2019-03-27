<?php
/**
 * Created by PhpStorm.
 * User: sigilai
 * Date: 11/16/18
 * Time: 6:54 PM
 */

include("../../config.php");

if (isset($_POST['playlistId'])  && isset($_POST['songId'])){
    $playlistId = $_POST['playlistId'];
    $songId = $_POST['songId'];

    $query = mysqli_query($con,"DELETE FROM playlistSongs WHERE playlistId='$playlistId' AND songId='$songId'");

}else{
    echo "PlaylistId or songId was not passed into removeSongFromPlaylist.php";
}


?>



