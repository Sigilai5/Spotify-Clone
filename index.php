<?php
include ("includes/config.php");

//session_destroy();

if(isset($_SESSION['userLoggedIn'])){
    $userLoggedIn = $_SESSION['userLoggedIn'];
}
else{
    header("Location: register.php");
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jukwaa</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div id="mainContainer">
    <div id="topContainer">



    </div>

    <div id="nowPlayingBarContainer">
        <div id="nowPlayingBar">

            <div id="nowPlayingLeft">
                <div class="content">
<span class="albumLink">
    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAkFBMVEX4kx8AAAD/mCD9lSG3bRp2RhXykCHdgx/jhx+zaxpkPROGTxb/mSBDKQuDThS0bRlLLQ0iFAqmYhadXhVVMw0AAAfQfR8bEgpsQRNLMA6gYBgeEwg3IgxDKQ3FdRxUMhAzHgySVxbKeRyVWxVmPxDsjSJ/TBYsGwoSCwQ3IA1YNRJeORG/chpuQhAoGQn0kCE7FVdiAAAE/0lEQVR4nO2Z7XLiOBBF7RZgnChAQjCECZAvk+wCyfu/3XZLNpAZdqq3YKq1Vff8SIwwt/ogWZJNlgEAAAAAAPDnced9vF+kT32OI83y9CnPMuxal6+gA0MYJg8MVYbd6xTZXNCwpgTxnQsa9s/I+GNQCUNNCAwtgaEuBIaWwFAXAkNLYKgLgaElMNSFwNASGOpCYGgJDHUhMLQEhroQGFoCQ10IDC2BoS4EhpbAUBcCQ0tgqAuBoSUw1IXA0BIY6kJgaAkMdSEwtASGuhAYWgJDXQgMLYGhLgSGlsBQFwJDS2CoC4GhJTDUhcDQEhjqQmBoCQx1ITC0BIa6EBhaAkNdCAwtgaEuBIaWwFAXAkNLYKgLgaElMNSFwNASGOpCYGgJDHUhMLQEhroQGFoCQ10IDC2BoS4EhpbAUBcCQ0tgqAuBoSUw1IXA0BIY6kJgaAkMdSEwtASGuhAYWgJDXQgMLYGhLgSGlsBQFwJDS2CoC4GhJTDUhcDQEhjqQmBoCQx1ITC0BIa6EBhaAkNdCAwtuahh7Sk9fOeChpurFBld0DBpYAjD9IHh7w3frMtXUJ5jmPX+B5zjBwAAAAAAAEgJR957cv/WQERt877N7RvjccD99ProHFtouXvKp5v5V1Mh9eabaf64rmJ9RTksw4HrlMMqnuOq4bBsnsK67bBh2XPNey1lGk9q/27vRV9C+e2T2jy/l4rdHR+F8/wkz9fRmm65sdscP+5vZid33ETro9vb7Vm3t5fBXx3qKbgeGh9e37JiMAx1etYaBCtXBJ8YQDdHRh3KaJCWYSh2nnnX4R7acH0v/Pp96X3vWXqRTho2ErF8MbzadjqlfGDiw5vvd+PAa2HpFiEWuPd84MXEZ57r/RGuJz8OA/eUYTbNcx6bs6jLn7iWnw1CQuHEcOTTmWlozsV6qaQuS55R+vJsKBbmpnKtnTB03M8fS24Oz1iCYWiW4VBl0dDK51ecVLrgOS9+5dRpC49Txq0/YSgPKbu+/SpiHzrnaBs+GwybZ2BfdmIH6CNcU5+7uz7X68bhWgq4uYxbOtGHcg161nyQM8Ww2y+KqvwR5tfjmWaXwjB1/du2nivugGfpt/hOWDZOGDrp59hjdfZ9Lr36yr4ZdlMw5C3IsvsZC/okMfxo+zDMPb+OUr+RQUokkzB9M4zrIRtON/fC6tV+sWCc7LL62wGvFvnQ732ywg/E9mjFbwxrbnhebl8e+AJuDO/n8/nr4rAe8lzqZeOXRBcWVSVbK6IeT53Pvsrj3sa95cWTLAhhrIa5R/Y0bBiG7dEeoZ1pSObeXWOYhFqEeMhtwrD0bzLri8aK621+gt6SLA152I5+8cGYDUZHhs90WC1k9K4ovdVCJswlj6fQeyWF1+uMfNidPvEZPf6/4j7266gqK+bgTuBh+uQOhjTj2TUa3tT9SG1rJzjpmfyx25WraCJdJQcf3cFK2sfcF34mDbPdu0xFPu5bM+L1L3wJlTsY7sL68W1f+pDAcKVqsp8KizAYj0ehTJZff+1P4CvWT9vtWphy1kSLdiMgaj8Z3idgmFF9HVbE6aCOkyiV4X5oMuBr8SE0vb4fTigeR4ttc9+0uxk9EM1uFuNguF2MHreOXhejlpt1CoZcWlYXRZ3tiyFXV1XBl97LqG3oHU6go7t/Lzta/tvcF8e3nD+QhuApXKjZpVsgAAAAAAAAAPwn/gHtZ2pLe9qF7AAAAABJRU5ErkJggg==" class="albumArtwork">
</span>

                    <div class="trackinfo">
                    <span class="trackName">
                        <span>Happy Birthday</span>

                    </span>

                        <span class="artistName">
                        <span>Brian Sigilai</span>
                    </span>

                    </div>

                </div>
            </div>

            <div id="nowPlayingCenter">

                <div class="content playerControls">
                    <div class="buttons">
                        <button class="controlButton shuffle" title="Shuffle button">
                            <img src="assets/images/icons/shuffle.png" alt="Shuffle">
                        </button>
                        <button class="controlButton previous" title="Previous button">
                            <img src="assets/images/icons/previous.png" alt="Previous">
                        </button>
                        <button class="controlButton play" title="Play button">
                            <img src="assets/images/icons/play.png" alt="Play">
                        </button>
                        <button class="controlButton pause" title="Pause button" style="display: none">
                            <img src="assets/images/icons/pause.png" alt="Pause">
                        </button>
                        <button class="controlButton next" title="Next button">
                            <img src="assets/images/icons/next.png" alt="Next">
                        </button>
                        <button class="controlButton repeat" title="Repeat button">
                            <img src="assets/images/icons/repeat.png" alt="Repeat">
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

            </div>

            <div id="nowPlayingRight">
                <div class="volumeBar">

                    <button class="controlButton volume" title="Volume button">
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


</div>





</body>
</html>
