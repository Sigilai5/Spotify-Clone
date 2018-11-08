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
    $inputText = ucfirst(strtolower($inputText));//convert the first letter to uppercase and convert the reast to lower
    return $inputText;
}

function sanitizeFormPassword($inputText){
    $inputText = strip_tags($inputText);
    return $inputText;
}

function validateUsername($un){

}

function validateFirstName($fn){

}
function validateLastName($ln){

}
function validateEmails($em, $em2){

}
function validatePasswords($pw, $pw2){

}

if(isset($_POST['registerButton'])){
    //Register button was pressed

    $username = sanitizeFormUsername($_POST['username']);
    $firstName = sanitizeFormString($_POST['firstName']);
    $lastName = sanitizeFormString($_POST['lastName']);
    $email = sanitizeFormString($_POST['email']);
    $email2 = sanitizeFormString($_POST['email2']);
    $password = sanitizeFormPassword($_POST['password']);
    $password2 = sanitizeFormPassword($_POST['password2']);

    validateUsername($username);
    validateFirstName($firstName);
    validateLastName($lastName);
    validateEmails($email, $email2);
    validatePasswords($password, $password2);

}



?>