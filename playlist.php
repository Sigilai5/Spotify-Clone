<?php
/**
 * Created by PhpStorm.
 * User: sigilai
 * Date: 11/16/18
 * Time: 12:16 AM
 */
include ("includes/includedFiles.php");
if(isset($_GET['id'])) {
    $playlistId = $_GET['id'];

}
else {
    header("Location: index.php");
}

//$albumQuery = mysqli_query($con, "SELECT * FROM albums WHERE id='$albumId'");
//$album = mysqli_fetch_array($albumQuery);

$playlist = new Playlist($con, $playlistId);

$owner = new User($con, $playlist->getOwner());

?>

<div class="entityInfo">

    <div class="leftSection">
         <div class="playlistImage">
        <img src="assets/images/icons/playlist.png">
         </div>
    </div>
    <div class="rightSection">
        <h2><?php echo $playlist->getName(); ?></h2>
        <p>By <?php echo $playlist->getOwner(); ?></p>
        <p><?php echo $playlist->getNumberOfSongs(); ?> songs</p>
        <button class="button" onclick="deletePlaylist('<?php echo $playlistId; ?>')">DELETE PLAYLIST</button>
    </div>


</div>


<div class="tracklistContainer">
    <ul class="tracklist">

        <?php
        $songIdArray = $playlist->getSongIds();

        $i = 1;
        foreach($songIdArray as $songId){

            $playlistSong = new Song($con, $songId);
            $songArtist = $playlistSong->getArtist();

            echo "<li class='tracklistRow'>
                    <div class='trackCount'>
                    <img class='play' src='assets/images/icons/play-white.png' onclick='setTrack(\"" . $playlistSong->getId() . "\", tempPlaylist,true)'>
                    <span class='trackNumber'>$i</span>              
                    </div>
                    
                    <div class='trackInfo'>
                    <span class='trackName'>" . $playlistSong->getTitle() ."</span>
                     <span class='artistName'>" . $songArtist->getname() ."</span>
                    </div>   
                    
                    <div class='trackOptions'>
                    <img class='optionsButton' src='assets/images/icons/more.png'>
                    </div> 
                    <div class='trackDuration'>
                    <span class='duration'>" . $playlistSong->getDuration() . "</span>
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

