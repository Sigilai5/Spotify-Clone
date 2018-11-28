<?php
/**
 * Created by PhpStorm.
 * User: sigilai
 * Date: 11/28/18
 * Time: 1:08 PM
 */
include('includes/includedFiles.php');

?>

<div class="tracklistContainer">
    <h2>ALL SONGS</h2>
    <ul class="tracklist">

        <?php
        $songIdArray = $albumArtist->getSongIds();

        $i = 1;
        foreach ($songIdArray as $songId){


            $albumSong = new Song($con, "SELECT * FROM Songs ORDER BY plays");
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
