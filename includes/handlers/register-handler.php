<?php
//Sanitization
function sanitizeFormUsername($inputText) {
    $inputText = strip_tags($inputText);//remove html tags to prevent injections
    $inputText = str_replace(" ","",$inputText);//remove empty spaces
    return $inputText;
}

function sanitizeFormString($inputText) {
    $inputText = strip_tags($inputText);//remove html tags to prevent injections
    $inputText = str_replace(" ","",$inputText);//remove empty spaces
    $inputText = ucfirst(strtolower($inputText));//convert the first letter to uppercase and convert the first to lower
    return $inputText;
}

function sanitizeEmailString($inputText) {
    $inputText = strip_tags($inputText);//remove html tags to prevent injections
    $inputText = str_replace(" ","",$inputText);//remove empty spaces
    $inputText = strtolower($inputText);//convert to lower
    return $inputText;
}

function sanitizeFormPassword($inputText){
    $inputText = strip_tags($inputText);
    return $inputText;
}



if(isset($_POST['registerButton'])){
    //Register button was pressed

    $username = sanitizeFormUsername($_POST['username']);
    $firstName = sanitizeFormString($_POST['firstName']);
    $lastName = sanitizeFormString($_POST['lastName']);
    $email = sanitizeEmailString($_POST['email']);
    $email2 = sanitizeEmailString($_POST['email2']);
    $password = sanitizeFormPassword($_POST['password']);
    $password2 = sanitizeFormPassword($_POST['password2']);

    $wasSuccessful = $account->register($username,$firstName,$lastName,$email,$email2,$password,$password2);

    if ($wasSuccessful == true) {
        $_SESSION['userLoggedIn'] = $username;
        header("Location: index.php");
    }

}



?>