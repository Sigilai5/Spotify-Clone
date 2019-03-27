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
        <form method="POST" action="uploadMusic.php"  enctype="multipart/form-data">
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
            <button class="button" type="submit" name="upload">UPLOAD</button>
        </form>
    </div>


</div>


<?php

// Initialize message variable
$msg = "";

// If upload button is clicked ...
if (isset($_POST['upload'])) {

    // Get details
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $artist = mysqli_real_escape_string($con, $_POST['artist']);
    $album = mysqli_real_escape_string($con, $_POST['album']);
    $genre = mysqli_real_escape_string($con, $_POST['genre']);
    $duration = '3.12';
    $path ="assets/music/" . $_FILES['song']['name'];
    $albumOrder = 1;
    $plays = 0;

    // song file directory
    $target = "assets/music/".basename($path);

    $query = "INSERT INTO Songs (title,description,artist,album,genre,duration,path,albumOrder,plays) VALUES ('$title','$description','$artist','$album','$genre','$duration','$path','$albumOrder','$plays')";

    // execute query
    mysqli_query($con, $query);

    if (move_uploaded_file($_FILES['song']['tmp_name'], $target)) {
        $msg = "Song uploaded successfully";
    }else{
        $msg = "Failed to song";
    }

}

?>



