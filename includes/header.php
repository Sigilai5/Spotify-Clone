<?php
include ("includes/config.php");
include ("classes/Artist.php");
include ("classes/Album.php");
include ("classes/Song.php");

//session_destroy();

if(isset($_SESSION['userLoggedIn'])){
    $userLoggedIn = $_SESSION['userLoggedIn'];
    echo "<script>userLoggedIn = '$userLoggedIn';</script>";
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="assets/js/script.js"></script>

</head>
<body>

<script>
    // var audioElement = new Audio();
    // audioElement.setTrack("assets/music/bensound-acousticbreeze.mp3");
    // audioElement.audio.play();

</script>


<div id="mainContainer">
    <div id="topContainer">

        <?php include "includes/navBarContainer.php"?>

        <div id="mainViewContainer">

            <div id="mainContent">