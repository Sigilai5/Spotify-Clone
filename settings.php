<?php
/**
 * Created by PhpStorm.
 * User: sigilai
 * Date: 11/16/18
 * Time: 7:44 PM
 */
include ("includes/includedFiles.php");

?>

<div class="entityInfo">

<div class="centerSection">
    <div class="userInfo">
        <h1><?php echo $userLoggedIn->getFirstAndLastName(); ?></h1>
    </div>

    <div class="buttonItems">
        <button class="button" onclick="openPage('updateDetails.php')">USER DETAILS</button>
        <button class="button" onclick="logout()">LOGOUT</button>
    </div>

</div>

</div>