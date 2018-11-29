<?php
/**
 * Created by PhpStorm.
 * User: sigilai
 * Date: 11/29/18
 * Time: 1:40 AM
 */

include ("includes/includedFiles.php");
$username = $userLoggedIn->getUsername();
?>
<div class="userDetails">

    <div class="container">
        <h2>NEW MUSIC</h2>
        <form method="post" action="uploadMusic.php" enctype="multipart/form-data">
            <label>Song Title:</label>
            <input type="text" class="title" name="title" placeholder="Song title... ">

            <label>Enter Description:</label><br>
            <input type="text" maxlength="140" class="description" name="description" placeholder="Description... ">


            <label>Select Album:</label>
            <?php

            $albumQuery = mysqli_query($con, "SELECT * FROM albums WHERE artist='$username'");

            echo "<select class='albumDropdown'>";
            while ($row = mysqli_fetch_array($albumQuery)){
                echo "<option value='" . $row['id'] ."' name='" . $row['id'] ."'>" . $row['title'] ."</option>";

            }

            echo "</select>";

            ?>
            <label>Select Genre:</label>
            <?php

            $albumQuery = mysqli_query($con, "SELECT * FROM genres");

            echo "<select class='genreDropdown'>";
            while ($row = mysqli_fetch_array($albumQuery)){
                echo "<option value='" . $row['id'] ."' name='" . $row['id'] ."'>" . $row['name'] ."</option>";
            }

            echo "</select>";

            ?>

            <input type="file" name="uploaded_file">
            <button class="button" onclick="uploadMusic('Brian')">UPLOAD</button>
        </form>
    </div>


</div>

<?php
$userId = $userLoggedIn->getUserId();
echo $userId;
?>
