<?php
/**
 * Created by PhpStorm.
 * User: sigilai
 * Date: 11/29/18
 * Time: 1:16 AM
 */
include ("includes/includedFiles.php");

?>


<div class="playlistsContainer">

    <div class="gridViewContainer">
        <h2>YOUR MUSIC</h2>


        <?php
        $username = $userLoggedIn->getUsername();

        $albumsQuery = mysqli_query($con, "SELECT * FROM albums WHERE artist='$username'");

        if (mysqli_num_rows($albumsQuery) == 0){
            echo "<span class='noResults'>You don't have any albums yet.Click <a href='newAlbum.php'>here</a> to create one. </span> ";

        }

        else{

            echo "<div class='buttonItems'>
            <button class='button green'><a href='uploadMusic.php'> ADD NEW MUSIC</a></button>
        </div>";
        }



        ?>

    </div>

</div>

