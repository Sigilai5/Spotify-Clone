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
    <h2>My Album</h2>

    <div class="buttonItems">
        <button class="button green" onclick="createAlbum('Brian')">NEW ALBUM</button>
    </div>

    <?php
    $user_id = $userLoggedIn->getUserId();

    $albumQuery = mysqli_query($con, "SELECT * FROM albums WHERE artist='$user_id'"); //LIMIT 3

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


