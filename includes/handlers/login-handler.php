<?php
/**
 * Created by PhpStorm.
 * User: sigilai
 * Date: 11/8/18
 * Time: 11:02 PM
 */

if(isset($_POST['loginButton'])){
    //Login button was pressed

    echo strip_tags($_POST['loginUsername']);

}

?>