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


if(isset($_POST['loginButton'])){
    //Login button was pressed

    echo strip_tags($_POST['loginUsername']);

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

}



?>



<html>
<head>
    <title>Welcome to Spotify</title>
</head>
<body>

<div id="inputContainer">
<form id="loginForm" action="register.php" method="POST">
    <h2>Login To your account!</h2>
    <p>
        <label for="loginUsername">Username</label>
        <input id="loginUsername" name="loginUsername" type="text" placeholder="Username" required>

    </p>

    <p>
        <label for="loginPassword">Password</label>
        <input id="loginPassword" name="loginPassword" type="password" required>
    </p>

    <button type="submit" name="loginButton">LOG IN</button>

</form>


    <form id="registerForm" action="register.php" method="POST">
        <h2>Register To your account!</h2>
        <p>
            <label for="username">Username</label>
            <input id="username" name="username" type="text" placeholder="Username" required>

        </p>
        <p>
            <label for="firstName">First Name</label>
            <input id="firstName" name="firstName" type="text" placeholder="First Name" required>

        </p>
        <p>
            <label for="lastName">Last Name</label>
            <input id="lastName" name="lastName" type="text" placeholder="Last Name" required>

        </p>
        <p>
            <label for="email">Email</label>
            <input id="email" name="email" type="email" placeholder="Email" required>

        </p>
        <p>
            <label for="confirmEmail">Confirm Email</label>
            <input id="confirmEmail" name="email2" type="email" placeholder=" Confirm Email" required>

        </p>

        <p>
            <label for="registerPassword">Password</label>
            <input id="registerPassword" name="password" type="password" placeholder="Password" required>
        </p>
        <p>
            <label for="confirmPassword">Confirm Password</label>
            <input id="confirmPassword" name="password2" type="password" placeholder="Password" required>
        </p>

        <button type="submit" name="registerButton">SIGN UP</button>

    </form>

</div>


</body>

</html>
