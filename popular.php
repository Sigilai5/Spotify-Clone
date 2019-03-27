<?php
/**
 * Created by PhpStorm.
 * User: sigilai
 * Date: 11/28/18
 * Time: 1:08 PM
 */
include('includes/includedFiles.php');

?>
<script src="assets/js/script.js"></script>

<div class="tracklistContainer borderBottom">
    <h2>POPULAR SONGS</h2>
    <ul class="tracklist">

        <?php
        $songQuery = mysqli_query($con,"SELECT * FROM Songs ORDER BY plays DESC ");

        $songIdArray = array();

        $i = 1;
        while($row = mysqli_fetch_array($songQuery)){

            array_push($songIdArray,$row['id']);

            $albumSong = new Song($con, $row['id']);
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
						<span class='duration'>" . $albumSong->getPlays() . " views</span>
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
