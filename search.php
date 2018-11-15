<?php
/**
 * Created by PhpStorm.
 * User: sigilai
 * Date: 11/15/18
 * Time: 4:23 PM
 */
include ("includes/includedFiles.php");

if (isset($_GET['term'])){
    $term = urldecode($_GET['term']);  //url decode removes %20 in our search terms e.g brian%20sigilai
}else{
    $term = "";
}

?>

<div class="searchContainer">
    <h4>Search for an artist, album or song</h4>
    <input type="search" class="searchInput" value="<?php echo $term?>" placeholder="Search..." onfocus="this.value=this.value">

</div>

<script>

$(".searchInput").focus();

$(function () {

    $(".searchInput").keyup(function () {
        clearTimeout(timer);

        timer = setTimeout(function () {
            var val = $(".searchInput").val();
            openPage("search.php?term=" + val);
        }, 2000);
    });

});


</script>

<?php if($term == "") exit(); ?>
<div class="tracklistContainer borderBottom">
    <h2>SONGS</h2>
    <ul class="tracklist">

        <?php
        $songQuery = mysqli_query($con,"SELECT id FROM Songs WHERE title LIKE '$term%' LIMIT 10");

        if (mysqli_num_rows($songQuery) == 0) {
            echo "<span class='noResults'> No songs found matching " . $term . "</span>";
        }

        $songIdArray = array();

        $i = 1;
        while($row = mysqli_fetch_array($songQuery)){

            if($i > 15){
                break;    //THE IF STATEMENT ONLY SELECTS 15 MOST POPULAR SONGS BY THE ARTIST IND DESCENDING ORDER
            }

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
                    <img class='optionsButton' src='assets/images/icons/more.png'>
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

<div class="gridViewContainer borderBottom">
    <h2>ALBUMS</h2>
    <?php
    $albumQuery = mysqli_query($con, "SELECT * FROM albums WHERE title LIKE '$term%' LIMIT 10");

    if (mysqli_num_rows($albumQuery) == 0){
        echo "<span class='noResults'>No album found named " . $term . "</span> ";
    }

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




<div class="artistsContainer borderBottom">
    <h2>ARTISTS</h2>

    <style>
        .searchResultRow{
            padding: 15px 10px;
        }
        .searchResultRow:hover{
            background-color: #282828;
        }

        .searchResultRow .artistName span{
            color: #fff;
        }
    </style>

    <?php
    $artistQuery = mysqli_query($con, "SELECT id FROM artists WHERE name LIKE '$term%' LIMIT 10");

    if (mysqli_num_rows($artistQuery) == 0){
        echo "<span class='noResults'>No artists found named " . $term . "</span> ";
    }

    while ($row = mysqli_fetch_array($artistQuery)){
        $artistFound = new Artist($con, $row['id']);

        echo "<div class='searchResultRow'>
                <div class='artistName'>
                
                <span role='link' tabindex='0' onclick='openPage(\"artist.php?id=" . $artistFound->getId() ."\")'>
                
                "
            . $artistFound->getname() .
            "
                
                </span>
        
        ";

    }

    ?>


</div>