<div id="navBarContainer">
    <nav class="navBar">

        <span role="link" tabindex="0" onclick="openPage('index.php')" class="logo">
            <img src="assets/images/jukwaa.jpg">
        </span>

        <div class="group">

            <div class="navItem">
                <span role="link" tabindex="0" onclick="openPage('search.php')" class="navItemLink">
                    Search
                    <img src="assets/images/icons/search.png" class="icon" alt="Search">
                </span>
            </div>

        </div>

        <div class="group">

            <div class="navItem">
                <span role="link" tabindex="0" onclick="openPage('browse.php')" class="navItemLink">Browse</span>
            </div>
            <div class="navItem">
                <span role="link" tabindex="0" onclick="openPage('popular.php')" class="navItemLink">Popular Songs</span>
            </div>
            <div class="navItem">
                <span role="link" tabindex="0" onclick="openPage('yourMusic.php')" class="navItemLink">My Playlist</span>
            </div>
            <div class="navItem">
                <span role="link" tabindex="0" onclick="openPage('yourAlbum.php')" class="navItemLink">My Albums</span>
            </div>
            <div class="navItem">
                <span role="link" tabindex="0" onclick="openPage('addMusic.php')" class="navItemLink">Add New Music</span>
            </div>
            <div class="navItem">
                <span role="link" tabindex="0" onclick="openPage('settings.php')" class="navItemLink"><?php echo $userLoggedIn->getFirstAndLastName(); ?></span>
            </div>


        </div>

    </nav>

</div>
