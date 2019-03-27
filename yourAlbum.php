<?php
/**
 * Created by PhpStorm.
 * User: sigilai
 * Date: 11/27/18
 * Time: 8:01 PM
 */
include ("includes/includedFiles.php");
?>

<div class="gridViewContainer">
    <div class="buttonItems">
        <button class="button green" ><a href="newAlbum.php">NEW ALBUM</a></button>
    </div>
    <h2>My Albums</h2>

    <?php
    $user_name = $userLoggedIn->getUsername();

    $albumQuery = mysqli_query($con, "SELECT * FROM albums WHERE artist='$user_name'"); //LIMIT 3

    while ($row = mysqli_fetch_array($albumQuery)){

        echo "<div class='gridViewItem'>
    <span role='link' tabindex='0' onclick='openPage(\"album.php?id=" . $row['id'] ."\")'>
    <img src='" . $row['artworkPath'] . "'>
    
    <div class='gridViewInfo'>"
            . $row['title'] .
            "</div>
    </span>
    </div>";

    }


    ?>


</div>


