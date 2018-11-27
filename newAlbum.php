<?php
/**
 * Created by PhpStorm.
 * User: sigilai
 * Date: 11/27/18
 * Time: 8:58 PM
 */

include ("includes/includedFiles.php");
?>


<?php

$albumQuery = mysqli_query($con, "SELECT * FROM genres");

echo "<select name='username'>";
while ($row = mysqli_fetch_array($albumQuery)){

    echo "<option value='" . $row['id'] ."'>" . $row['name'] ."</option>";


}

echo "</select>";

?>

<?php
$username = $userLoggedIn->getUserId();
echo $username;
?>
