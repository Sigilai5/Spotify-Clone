<?php
/**
 * Created by PhpStorm.
 * User: sigilai
 * Date: 11/8/18
 * Time: 11:02 PM
 */

if(isset($_POST['loginButton'])){
    //Login button was pressed

   $username = $_POST['loginUsername'];
   $password = $_POST['loginPassword'];

   $result = $account->login($username,$password);

   if ($result == true){
       $_SESSION['userLoggedIn'] = $username;
       header("Location: index.php");
   }

}

?>