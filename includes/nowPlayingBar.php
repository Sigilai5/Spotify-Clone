<?php
$songQuery = mysqli_query($con,"SELECT id FROM Songs ORDER BY RAND() LIMIT 10");

$resultArray = array();

while ($row = mysqli_fetch_array($songQuery)){
    array_push($resultArray, $row['id']);
}

//Convert to json
$jsonArray = json_encode($resultArray);
?>

<script>

    $(document).ready(function() {
        var newPlaylist = <?php echo $jsonArray; ?>;
        audioElement = new Audio();
        setTrack(newPlaylist[0], newPlaylist, false);
        updateVolumeProgressBar(audioElement.audio);

        $("#nowPlayingBarContainer").on("mousedown touchstart mousemove touchmove", function (e) {
            e.preventDefault();

        });

        $(".playbackBar .progressBar").mousedown(function() {
           mouseDown = true;
        });

        $(".playbackBar .progressBar").mousemove(function(e) {
            if (mouseDown == true) {
                //Set time of song, depending on position of mouse
                timeFromOffset(e,this);
            }
        });

        $(".playbackBar .progressBar").mouseup(function(e) {
                timeFromOffset(e,this);
        });


                //VOLUME

        $(".volumeBar .progressBar").mousedown(function() {
            mouseDown = true;
        });

        $(".volumeBar .progressBar").mousemove(function(e) {
            if (mouseDown == true) {

               var percentage = e.offsetX / $(this).width();

               if(percentage>= 0 && percentage <= 1){
                   audioElement.audio.volume = percentage;
               }

            }
        });

        $(".volumeBar .progressBar").mouseup(function(e) {
            var percentage = e.offsetX / $(this).width();

            if (percentage >= 0 && percentage <= 1 ){
               audioElement.audio.volume = percentage;

            }
        });

        //when mouse is removed,it will still continue
        $(document).mouseup(function () {
            mouseDown = false;
        })

    });


    function timeFromOffset(mouse, progressBar) {
        var percentage = mouse.offsetX / $(progressBar).width() * 100;
        var seconds = audioElement.audio.duration * (percentage / 100);
        audioElement.setTime(seconds);
    }

    function prevSong() {
        if (audioElement.audio.currentTime >= 3 || currentIndex ==0){
            audioElement.setTime(0);
        }
        else {
            currentIndex = currentIndex -1;
            setTrack(currentPlaylist[currentIndex], currentPlaylist, true);
        }
    }

    function nextSong() {

        if (repeat == true){
            audioElement.setTime(0);
            playSong();
            return;
        }

        if (currentIndex == currentPlaylist.length - 1) {
            currentIndex = 0
        } else {
            currentIndex++;
        }

        var trackToPlay = shuffle ? shufflePlaylist[currentIndex] : currentPlaylist[currentIndex];
        setTrack(trackToPlay, currentPlaylist, true);
    }

    function setRepeat() {
        repeat = !repeat;
        var imageName = repeat ? "repeat-active.png" : "repeat.png";
        $(".controlButton.repeat img").attr("src", "assets/images/icons/" + imageName);
    }

    function setMute() {
        audioElement.audio.muted = !audioElement.audio.muted;
        var imageName = audioElement.audio.muted ? "volume-mute.png" : "volume.png";
        $(".controlButton.volume img").attr("src", "assets/images/icons/" + imageName);
    }

    function setShuffle() {
        shuffle = !shuffle;
        var imageName = shuffle ? "shuffle-active.png" : "shuffle.png";
        $(".controlButton.shuffle img").attr("src", "assets/images/icons/" + imageName);


        if (shuffle == true){
            //Randomize playlist
            shuffleArray(shufflePlaylist);
            currentIndex = shufflePlaylist.indexOf(audioElement.currentlyPlaying.id);
        }
        else {
            //shuffle has been deactivated
            //go back to regular playlist
            currentIndex = currentPlaylist.indexOf(audioElement.currentlyPlaying.id);
        }

    }

    /**
     * Shuffles array in place.
     * @param {Array} a items An array containing the items.
     */
    function shuffleArray(a) {
        var j, x, i;
        for (i = a.length; i; i--) {
            j = Math.floor(Math.random() * i);
            x = a[i-1];
            a[i - 1] = a[j];
            a[j] = x;
        }
    }

    function setTrack(trackId, newPlaylist, play) {

        if (newPlaylist != currentPlaylist){
            currentPlaylist = newPlaylist;
            shufflePlaylist = currentPlaylist.slice();
            shuffleArray(shufflePlaylist);
        }

        if (shuffle == true){
            currentIndex = currentPlaylist.indexOf(trackId);
        } else {
            currentIndex = currentPlaylist.indexOf(trackId);
        }

        // audioElement.setTrack("assets/music/bensound-acousticbreeze.mp3");
         pauseSong();

        // GET TRACK
        $.post("includes/handlers/ajax/getSongJson.php", {songId: trackId},function (data) {

            //convert string data to object
            var track = JSON.parse(data)


            $(".trackName span").text(track.title);
            $(".trackPlays span").text(track.plays);

                                   // GET ARTIST
            $.post("includes/handlers/ajax/getArtistJson.php", {artistId: track.artist},function (data) {

                //convert string data to object
                var artist = JSON.parse(data);

                $(".trackinfo .artistName span").text(artist.name);
                $(".trackinfo .artistName span").attr("onclick", "openPage('artist.php?id=" + artist.id + "')");

            });
                                 // GET ALBUM
            $.post("includes/handlers/ajax/getAlbumJson.php", {albumId: track.album},function (data) {

                //convert string data to object
                var album = JSON.parse(data);


                $(".content .albumLink img").attr("src",album.artworkPath);
                $(".content .albumLink img").attr("onclick", "openPage('album.php?id=" + album.id + "')");
                $(".trackinfo .trackName span").attr("onclick", "openPage('album.php?id=" + album.id + "')");

            });

            audioElement.setTrack(track);

            if (play == true){
                playSong();
            }

        });

    }

    function playSong() {
        console.log(audioElement.audio.currentTime);
        if (audioElement.audio.currentTime == 0){
            $.post("includes/handlers/ajax/updatePlays.php", { songId: audioElement.currentlyPlaying.id });
        }

        $(".controlButton.play").hide();
        $(".controlButton.pause").show();
        audioElement.play();
    }

    function pauseSong() {
        $(".controlButton.play").show();
        $(".controlButton.pause").hide();
        audioElement.pause();
    }

</script>


<div id="nowPlayingBarContainer">
    <div id="nowPlayingBar">

        <div id="nowPlayingLeft">
            <div class="content">
<span class="albumLink">
    <img role="link" tabindex="0" src="assets/images/jukwaa.jpg" class="albumArtwork">
</span>

                <div class="trackinfo">
                    <span class="trackName">
                        <span role="link" tabindex="0"></span>

                    </span>
<!--                    <span class="trackPlays">-->
<!--                        <span role="link" tabindex="0">plays</span><br>-->
<!---->
<!--                    </span>-->

                    <span class="artistName">
                        <span role="link" tabindex="0"></span>
                    </span>

                </div>

            </div>
        </div>

        <div id="nowPlayingCenter">

            <div class="content playerControls">
                <div class="buttons">
                    <button class="controlButton shuffle" title="Shuffle button" onclick="setShuffle()">
                        <img src="assets/images/icons/shuffle.png" alt="Shuffle">
                    </button>
                    <button class="controlButton previous" title="Previous button" onclick="prevSong()">
                        <img src="assets/images/icons/previous.png" alt="Previous">
                    </button>
                    <button class="controlButton play" title="Play button" onclick="playSong()">
                        <img src="assets/images/icons/play.png" alt="Play">
                    </button>
                    <button class="controlButton pause" title="Pause button" onclick="pauseSong()" style="display: none">
                        <img src="assets/images/icons/pause.png" alt="Pause">
                    </button>
                    <button class="controlButton next" title="Next button" onclick="nextSong()">
                        <img src="assets/images/icons/next.png" alt="Next">
                    </button>
                    <button class="controlButton repeat" title="Repeat button">
                        <img src="assets/images/icons/repeat.png" alt="Repeat" onclick="setRepeat()">
                    </button>

                </div>

                <div class="playbackBar">

                    <span class="progressTime current">0.00</span>
                    <div class="progressBar">
                        <div class="progressBarBg">
                            <div class="progress"></div>
                        </div>


                    </div>
                    <span class="progressTime remaining">0.00</span>

                </div>

            </div>
            <button class="controlButton tip" title="Tip Artist" id="tip">
                <a href="www.paypal.com"><img src="assets/images/icons/tip.png" alt="Tip Artist"></a>
            </button>
            <button class="controlButton like" title="Like" id="like">
                <img src="assets/images/icons/like1.png" alt="Like">
            </button>
            <button class="controlButton love" title="Love" id="love">
                <img src="assets/images/icons/love1.png" alt="Love">
            </button>

        </div>



        <div id="nowPlayingRight">
            <div class="volumeBar">

                <button class="controlButton volume" title="Volume button" onclick="setMute()">
                    <img src="assets/images/icons/volume.png" alt="Volume">
                </button>

                <div class="progressBar">
                    <div class="progressBarBg">
                        <div class="progress"></div>
                    </div>


                </div>

            </div>

        </div>

    </div>

</div>