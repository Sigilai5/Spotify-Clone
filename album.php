<?php include('includes/includedFiles.php');
/**
 * Created by PhpStorm.
 * User: sigilai
 * Date: 11/13/18
 * Time: 2:00 PM
 */

if(isset($_GET['id'])) {
    $albumId = $_GET['id'];

}
else {
    header("Location: index.php");
}

//$albumQuery = mysqli_query($con, "SELECT * FROM albums WHERE id='$albumId'");
//$album = mysqli_fetch_array($albumQuery);

$album = new Album($con, $albumId);

$artist = $album->getArtist();



?>

<div class="entityInfo">

    <div class="leftSection">

        <img src="<?php echo $album->getArtworkPath(); ?>">

    </div>
    <div class="rightSection">
        <h2><?php echo $album->getAlbumId(); ?></h2>
        <h2><?php echo $album->getTitle(); ?></h2>
        <p>By <?php echo $artist->getname(); ?></p>
        <p><?php echo $album->getNumberOfSongs(); ?> songs</p>
    </div>


</div>


<div class="tracklistContainer">
    <ul class="tracklist">

        <?php
        $songIdArray = $album->getSongIds();

        $i = 1;
        foreach ($songIdArray as $songId){

            $albumSong = new Song($con, $songId);
            $albumArtist = $albumSong->getArtist();

            echo "<li class='tracklistRow'>
                    <div class='trackCount'>
                    <img class='play' src='assets/images/icons/play-white.png' onclick='setTrack(\"" . $albumSong->getId() . "\", tempPlaylist,true)'>
                    <span class='trackNumber'>$i</span>              
                    </div>
                    
                    <div class='trackInfo'>
                    <span class='trackName'>" . $albumSong->getTitle() ."</span>
                     <span class='artistName'>" . $albumArtist->getname() ."</span>
                    </div>   
                    
                    <div class='trackOptions'>
                    <input type='hidden' class='songId' value='" . $albumSong->getId() . "'>
                    <img class='optionsButton' src='assets/images/icons/more.png' onclick='showOptionsMenu(this)'>
                    </div> 
                    <div class='trackDuration'>
                    <span class='duration'>" . $albumSong->getDuration() . "</span>
                    </div> 
                            
            
            </li>";

            $i = $i + 1;

        }


        ?>

<script>
    var tempSongIds = '<?php echo json_encode($songIdArray); ?>';
    tempPlaylist = JSON.parse(tempSongIds);
</script>


    </ul>

</div>

<nav class="optionsMenu">
    <input type="hidden" class="songId">
    <?php echo Playlist::getPlaylistsDropdown($con, $userLoggedIn->getUsername());?>
    <div class="item">Item 2</div>
    <div class="item">Item 3 </div>
</nav>



