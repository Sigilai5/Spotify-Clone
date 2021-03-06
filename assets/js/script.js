var currentPlaylist = Array();   //or [];
var shufflePlaylist = []; //or Array();
var tempPlaylist = []; //or Array();
var audioElement;
var mouseDown = false;
var currentIndex = 0;
var repeat = false;
var shuffle = false;
var userLoggedIn;
var timer;

$(document).click(function (click) {
   var target = $(click.target);

   if (!target.hasClass("item") && !target.hasClass("optionsButton")) {
       hideOptionsMenu();
   }

});

$(window).scroll(function () {
  hideOptionsMenu();
});

//GET SONG ID AND PLAYLIST ID

$(document).on("change", "select.playlist",function () {
    var select = $(this);
    var playlistId = select.val();
    var songId = select.prev(".songId").val();

    $.post("includes/handlers/ajax/addToPlaylist.php",{playlistId:playlistId, songId:songId}).done(function (error) {

        if (error != ""){
            alert(error);
            return;
        }

        hideOptionsMenu();
        select.val("");

    });

});

function updateEmail(emailClass) {
    var emailValue = $("." + emailClass).val();

    $.post("includes/handlers/ajax/updateEmail.php",{email:emailValue,username:userLoggedIn}).done(function (response) {   //userLoggedIn comes from header
        $("." + emailClass).nextAll(".message").text(response);

    });

}

function updatePassword(oldPasswordClass,newPasswordClass1,newPasswordClass2) {
    var oldPassword =$("." + oldPasswordClass).val();
    var newPassword1 =$("." + newPasswordClass1).val();
    var newPassword2 =$("." + newPasswordClass2).val();

    console.log(oldPassword);
    console.log(newPassword1);
    console.log(newPassword2);

    $.post("includes/handlers/ajax/updatePassword.php",{
        oldPassword:oldPassword,
        newPassword1 : newPassword1,
        newPassword2:newPassword2,
        username:userLoggedIn})

        .done(function (response) {
            $("." + oldPasswordClass).nextAll(".message").text(response);
        });

}

function logout() {
    $.post("includes/handlers/ajax/logout.php",function () {
       location.reload(); //THIS WILL TRIGGER THE HEADER TO KNOW IF USER IS LOGGED IN OR NOT

    });
}


function openPage(url) {

    if (timer != null){
        clearTimeout(timer);
    }

    if (url.indexOf("?") == -1){
        url = url + "?";
    }

    var encodedUrl = encodeURI(url + "&userLoggedIn=" + userLoggedIn);
    console.log(encodedUrl);
    $("#mainContent").load(encodedUrl);
    $("body").scrollTop(0);
    history.pushState(null,null,url);
}

/**REMOVE SONG FROM PLAYLIST**/

function removeFromPlaylist(button,playlistId) {
    var songId = $(button).prevAll(".songId").val();

    $.post("includes/handlers/ajax/removeSongFromPlaylist.php", {playlistId: playlistId,songId: songId}).done(function(error) {
        //DO SOMETHING WHEN AJAX RETURNS

        // if (error != ""){
        //     alert(error);
        //     return;
        // }

        //TODO:resolve above error

        openPage("playlist.php?id=" + playlistId);
    });


}


/**CREATE ALBUM**/

function createAlbum(username) {
    $.post("includes/handlers/ajax/createArtist.php", {username: userLoggedIn}).done(function (error) {
        //DO SOMETHING WHEN AJAX RETURNS
        if (error != ""){
            alert(error);
            return;
        }

        openPage("yourAlbum.php")
    });

//Get
//     var bla = $('#txt_name').val();

//Set
//     $('#txt_name').val(bla);

    var album_name = $('.title').val();
    console.log(album_name)

    var genre = $('.genreDropdown').val();
    console.log(genre)

    if (album_name != null){

        $.post("includes/handlers/ajax/createAlbum.php", {title:album_name,username: userLoggedIn,genreName:genre}).done(function (error) {
            //DO SOMETHING WHEN AJAX RETURNS
            if (error != ""){
                alert(error);
                return;
            }

            openPage("yourAlbum.php")
        });

    }

}


/**UPLOAD MUSIC**/

function uploadMusic(username) {

    var title = $('.title').val();
    console.log(title)
    var description = $('.description').val();
    console.log(description)
    var album = $('.albumDropdown').val();
    console.log(album)
    var genre = $('.genreDropdown').val();
    console.log(genre)
    var path ="assets/music/" + $('input[type=file]').val().split('\\').pop();
    console.log(path)

    var fd = new FormData(this);
    fd.append('file',$('#file')[0].files[0]);
    console.log(fd)


    if (title != null){

        $.post("includes/handlers/ajax/submitMusic.php", {title:title,description: description,artist:userLoggedIn,album:album,genre:genre,path:path}).done(function (error) {
            //DO SOMETHING WHEN AJAX RETURNS
            if (error != ""){
                alert(error);
                return;
            }

            openPage("uploadMusic.php")
        });

    }

}

/**CREATE PLAYLIST**/

function createPlaylist(username) {
    var playlist_name = prompt("Please enter the name of your playlist");
    if (playlist_name != null){

        $.post("includes/handlers/ajax/createPlaylist.php", {name:playlist_name,username: userLoggedIn}).done(function (error) {
            //DO SOMETHING WHEN AJAX RETURNS
            if (error != ""){
                alert(error);
                return;
            }

            openPage("yourMusic.php")
        });

    }

}


/**DELETE PLAYLIST**/

function deletePlaylist(playlistId) {
    var prompt = confirm("Are you sure you want to delete this playlist?");

    if (prompt == true){

        $.post("includes/handlers/ajax/deletePlaylist.php", {playlistId:playlistId}).done(function (error) {
            //DO SOMETHING WHEN AJAX RETURNS
            if (error != ""){
                alert(error);
                return;
            }

            openPage("yourMusic.php")
        });

    }

}

/**OPTIONS MENU**/

function hideOptionsMenu() {
    var menu = $(".optionsMenu");
    if (menu.css("display") != "none") {
        menu.css("display", "none");
    }
}


function showOptionsMenu(button) {
var songId = $(button).prevAll(".songId").val(); //prevAll gets previous classes of .songId

var menu =$(".optionsMenu");
var menuWidth = menu.width();
menu.find(".songId").val(songId);

var scrollTop = $(window).scrollTop();  //Distance from top of window to top of document
var elementOffset = $(button).offset().top; //Distance from top of document

var top = elementOffset - scrollTop;
var left = $(button).position().left;

menu.css({"top": top + "px", "left": left - menuWidth + "px", "display": "inline"});

}

function formatTime(seconds) {
    var time = Math.round(seconds);
    var minutes = Math.floor(time/60); //Rounds down
    var seconds = time - (minutes * 60);

    var extraZero;

    if (seconds < 10) {
        extraZero = "0";
    }else {
        extraZero = "";
    }

    // var extraZero = (seconds < 10) ? "0" : "";  /** IF STATEMENT IN ONE LINE **/

    return minutes + ":" + extraZero + seconds;
}

function updateTimeProgressBar(audio) {
    $(".progressTime.current").text(formatTime(audio.currentTime));
    $(".progressTime.remaining").text(formatTime(audio.duration - audio.currentTime));

    var progress = audio.currentTime / audio.duration * 100;
    $(".playbackBar .progress").css("width", progress + "%");

}

function updateVolumeProgressBar(audio) {
    var volume = audio.volume * 100;
    $(".volumeBar .progress").css("width", volume + "%");

}

function playFirstSong() {
    setTrack(tempPlaylist[0],tempPlaylist, true); //This function wil play songs in artsist page
}


function Audio() {

    this.currentlyPlaying;
    this.audio = document.createElement('audio');

    this.audio.addEventListener("ended",function () {
       nextSong();
    });

    this.audio.addEventListener("canplay", function () {
       //'this' refers to the object that the event was called on
        var duration = formatTime(this.duration);
        $(".progressTime.remaining").text(duration);


    });

    this.audio.addEventListener("timeupdate", function () {
      if(this.duration){
          updateTimeProgressBar(this)
      }
    });

    this.audio.addEventListener("volumechange", function () {
        updateVolumeProgressBar(this);
    });

    this.setTrack = function (track) {
        this.currentlyPlaying = track;
        this.audio.src = track.path;
    }

    this.play = function () {
        this.audio.play();
    }

    this.pause = function () {
        this.audio.pause();
    }

    this.setTime = function (seconds) {
        this.audio.currentTime = seconds;
    }

}