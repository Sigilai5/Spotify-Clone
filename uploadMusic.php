<?php
/**
 * Created by PhpStorm.
 * User: sigilai
 * Date: 11/29/18
 * Time: 1:40 AM
 */

include ("includes/includedFiles.php");
$username = $userLoggedIn->getUsername();
echo $username;
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

            echo "<select class='albumDropdown' name='album'>";
            while ($row = mysqli_fetch_array($albumQuery)){
                echo "<option value='" . $row['id'] ."' name='album'>" . $row['title'] ."</option>";

            }

            echo "</select>";

            ?>
            <label>Select Genre:</label>
            <?php

            $albumQuery = mysqli_query($con, "SELECT * FROM genres");

            echo "<select class='genreDropdown' name='genre'>";
            while ($row = mysqli_fetch_array($albumQuery)){
                echo "<option value='" . $row['id'] ."' name='genre'>" . $row['name'] ."</option>";
            }

            echo "</select>";

            ?>

            <input type="file" name="song" id="file">
            <button class="button" name="upload" onclick="uploadMusic('bria')">UPLOAD</button>
        </form>
    </div>


</div>




