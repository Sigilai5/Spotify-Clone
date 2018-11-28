<?php
/**
 * Created by PhpStorm.
 * User: sigilai
 * Date: 11/27/18
 * Time: 8:58 PM
 */

include ("includes/includedFiles.php");
?>

<!---->


<div class="userDetails">

    <div class="container">
        <h2>NEW ALBUM</h2>
        <form method="post" action="newAlbum.php" enctype="multipart/form-data">
        <input type="text" class="title" name="title" placeholder="Album title... ">

        <?php

    $albumQuery = mysqli_query($con, "SELECT * FROM genres");

        echo "<select class='genreDropdown'>";
        while ($row = mysqli_fetch_array($albumQuery)){
           echo "<option value='" . $row['id'] ."' name='" . $row['id'] ."'>" . $row['name'] ."</option>";
        }

        echo "</select>";

        ?>
        <button onclick="createAlbum('Brian')" name="upload" class="button">CREATE</button>
        </form>
    </div>


</div>

<?php
$userId = $userLoggedIn->getUserId();
echo $userId;
?>

<?php
//// If upload button is clicked ...
//if (isset($_POST['upload'])) {
//    $title = mysqli_real_escape_string($con, $_POST['title']);
//    $genre = mysqli_real_escape_string($con, $_POST['genre']);
//    $artworkPath = "assets/images/profile-pics/album.png";
//    $result = mysqli_query($con,"INSERT INTO albums VALUES ('','$title','$userId','$genre','$artworkPath')");
//
//    $final_result=mysqli_query($con,$result);
//    if($final_result==TRUE){
//        echo "<p style='color:chocolate'>Your album was successfully created!</p>";
//    }
//
//}
//
//
//?>